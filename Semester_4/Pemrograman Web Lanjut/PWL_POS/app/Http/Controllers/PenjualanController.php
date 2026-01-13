<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\PenjualanDetailModel;
use App\Models\BarangModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        $activeMenu = 'penjualan';
        $breadcrumb = (object) [
            'title' => 'Data Penjualan',
            'list' => ['Home', 'Penjualan']
        ];

        $user = UserModel::all();
        return view('penjualan.index', compact('activeMenu', 'breadcrumb', 'user'));
    }

    public function list(Request $request)
    {
        $penjualan = PenjualanModel::with('user')
            ->select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal', 'pembeli', 'user_id');

        if ($request->filled('filter_user')) {
            $penjualan->where('user_id', $request->input('filter_user'));
        }

        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                return '<div class="btn-group" role="group">
                    <button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm" title="Detail"><i class="fas fa-eye"></i></button>
                    <button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                    <button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                </div>';
            })
            ->editColumn('penjualan_tanggal', function ($penjualan) {
                return date('d-m-Y H:i', strtotime($penjualan->penjualan_tanggal));
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create_ajax()
    {
        $user = UserModel::select('user_id', 'username')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama', 'harga_jual')->get();
        return view('penjualan.create_ajax', compact('user', 'barang'));
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'penjualan_kode' => ['required', 'string', 'max:20', 'unique:t_penjualan,penjualan_kode'],
                'penjualan_tanggal' => ['required', 'date'],
                'pembeli' => ['required', 'string', 'max:50'],
                'user_id' => ['required', 'integer', 'exists:m_user,user_id'],
                'barang_id' => ['required', 'array'],
                'barang_id.*' => ['required', 'integer', 'exists:m_barang,barang_id'],
                'jumlah' => ['required', 'array'],
                'jumlah.*' => ['required', 'integer', 'min:1'],
                'harga' => ['required', 'array'],
                'harga.*' => ['required', 'numeric', 'min:0'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }

            // Validasi stok tersedia
            foreach ($request->barang_id as $key => $barang_id) {
                $stokTersedia = DB::table('t_stok')
                    ->where('barang_id', $barang_id)
                    ->sum('stok_jumlah');
                
                $stokTerjual = DB::table('t_penjualan_detail')
                    ->where('barang_id', $barang_id)
                    ->sum('jumlah');
                
                $stokAkhir = $stokTersedia - $stokTerjual;
                $jumlahBeli = $request->jumlah[$key];
                
                if ($stokAkhir < $jumlahBeli) {
                    $barang = BarangModel::find($barang_id);
                    return response()->json([
                        'status' => false,
                        'message' => 'Stok tidak mencukupi untuk barang: ' . $barang->barang_nama . '. Stok tersedia: ' . $stokAkhir
                    ]);
                }
            }

            DB::beginTransaction();
            try {
                $penjualan = PenjualanModel::create([
                    'penjualan_kode' => $request->penjualan_kode,
                    'penjualan_tanggal' => $request->penjualan_tanggal,
                    'pembeli' => $request->pembeli,
                    'user_id' => $request->user_id,
                ]);

                foreach ($request->barang_id as $key => $barang_id) {
                    PenjualanDetailModel::create([
                        'penjualan_id' => $penjualan->penjualan_id,
                        'barang_id' => $barang_id,
                        'harga' => $request->harga[$key],
                        'jumlah' => $request->jumlah[$key],
                    ]);
                }

                DB::commit();
                return response()->json(['status' => true, 'message' => 'Data berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => 'Gagal menyimpan data: ' . $e->getMessage()]);
            }
        }

        return redirect('/');
    }

    public function show_ajax($id)
    {
        $penjualan = PenjualanModel::with(['user', 'penjualanDetail.barang'])->find($id);
        return view('penjualan.show_ajax', compact('penjualan'));
    }

    public function edit_ajax($id)
    {
        $penjualan = PenjualanModel::with('penjualanDetail')->find($id);
        $user = UserModel::select('user_id', 'username')->get();
        $barang = BarangModel::select('barang_id', 'barang_nama', 'harga_jual')->get();
        return view('penjualan.edit_ajax', compact('penjualan', 'user', 'barang'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'penjualan_kode' => ['required', 'string', 'max:20', 'unique:t_penjualan,penjualan_kode,' . $id . ',penjualan_id'],
                'penjualan_tanggal' => ['required', 'date'],
                'pembeli' => ['required', 'string', 'max:50'],
                'user_id' => ['required', 'integer', 'exists:m_user,user_id'],
                'barang_id' => ['required', 'array'],
                'barang_id.*' => ['required', 'integer', 'exists:m_barang,barang_id'],
                'jumlah' => ['required', 'array'],
                'jumlah.*' => ['required', 'integer', 'min:1'],
                'harga' => ['required', 'array'],
                'harga.*' => ['required', 'numeric', 'min:0'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors(),
                ]);
            }

            $penjualan = PenjualanModel::find($id);

            if ($penjualan) {
                // Get old details untuk mengembalikan stok
                $oldDetails = PenjualanDetailModel::where('penjualan_id', $id)->get();
                
                // Validasi stok tersedia dengan mempertimbangkan stok yang dikembalikan
                foreach ($request->barang_id as $key => $barang_id) {
                    $stokTersedia = DB::table('t_stok')
                        ->where('barang_id', $barang_id)
                        ->sum('stok_jumlah');
                    
                    $stokTerjual = DB::table('t_penjualan_detail')
                        ->where('barang_id', $barang_id)
                        ->sum('jumlah');
                    
                    // Kembalikan stok dari transaksi yang akan diupdate
                    $stokDikembalikan = $oldDetails->where('barang_id', $barang_id)->sum('jumlah');
                    
                    $stokAkhir = $stokTersedia - $stokTerjual + $stokDikembalikan;
                    $jumlahBeli = $request->jumlah[$key];
                    
                    if ($stokAkhir < $jumlahBeli) {
                        $barang = BarangModel::find($barang_id);
                        return response()->json([
                            'status' => false,
                            'message' => 'Stok tidak mencukupi untuk barang: ' . $barang->barang_nama . '. Stok tersedia: ' . $stokAkhir
                        ]);
                    }
                }

                DB::beginTransaction();
                try {
                    $penjualan->update([
                        'penjualan_kode' => $request->penjualan_kode,
                        'penjualan_tanggal' => $request->penjualan_tanggal,
                        'pembeli' => $request->pembeli,
                        'user_id' => $request->user_id,
                    ]);

                    // Delete old details
                    PenjualanDetailModel::where('penjualan_id', $id)->delete();

                    // Insert new details
                    foreach ($request->barang_id as $key => $barang_id) {
                        PenjualanDetailModel::create([
                            'penjualan_id' => $id,
                            'barang_id' => $barang_id,
                            'harga' => $request->harga[$key],
                            'jumlah' => $request->jumlah[$key],
                        ]);
                    }

                    DB::commit();
                    return response()->json(['status' => true, 'message' => 'Data berhasil diupdate']);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Gagal mengupdate data: ' . $e->getMessage()]);
                }
            }

            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);
        }

        return redirect('/');
    }

    public function confirm_ajax($id)
    {
        $penjualan = PenjualanModel::find($id);
        return view('penjualan.confirm_ajax', compact('penjualan'));
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax()) {
            $penjualan = PenjualanModel::find($id);

            if ($penjualan) {
                DB::beginTransaction();
                try {
                    PenjualanDetailModel::where('penjualan_id', $id)->delete();
                    $penjualan->delete();
                    DB::commit();
                    return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Gagal menghapus data: ' . $e->getMessage()]);
                }
            }

            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);
        }

        return redirect('/');
    }
}
