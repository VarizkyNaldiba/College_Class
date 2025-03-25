<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level dalam sistem'
        ];

        $activeMenu = 'level'; // Set menu yang aktif

        // Ambil data level dari database
        $level = LevelModel::select('level_id', 'level_kode', 'level_nama')->get();

        return view('level.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'level' => $level // Kirim ke view
        ]);
    }

    public function list(Request $request)
{
    $levels = LevelModel::select('level_id', 'level_kode', 'level_nama')
        ->with('user');

    // Pastikan level_id hanya digunakan jika tidak kosong
    if ($request->has('level_id') && !empty($request->level_id)) {
        $levels->where('level_id', $request->level_id);
    }

    return DataTables::of($levels)
        ->addIndexColumn() // Menambahkan kolom index / no urut (DT_RowIndex)
        ->addColumn('aksi', function ($level) {
            $btn  = '<button onclick="modalAction(\''.url('/level/' . $level->level_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\''.url('/level/' . $level->level_id . '/edit_ajax').'\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\''.url('/level/' . $level->level_id . '/delete_ajax').'\')" class="btn btn-danger btn-sm">Hapus</button> ';
            
            return $btn;
        })
        ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi mengandung HTML
        ->make(true);
}

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah level baru'
        ];

        $level = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.create',['breadcrumb'=> $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|min:1|unique:m_level,level_kode',
            'level_nama'     => 'required|string|max:100',
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    public function show($level_id)
    {
        $level = LevelModel::find($level_id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list'  => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Level'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.show', [
            'level'      => $level,
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list'  => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit level'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode' => 'required|string|min:1|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:100',
        ]);

        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id);  // Cari level berdasarkan ID
        
        if (!$check) { // Cek level ada atau nggak
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            LevelModel::destroy($id);  // Hapus level
            
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
            
        } catch (\Illuminate\Database\QueryException $e) { // Jika gagal delete (biasanya FK constraint)
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    } 

    public function create_ajax()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('level.create_ajax')
                    ->with('level', $level);

    }

    public function store_ajax(Request $request) {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode'  => 'required|string|min:3|unique:m_level,level_kode',
                'level_nama'  => 'required|string|min:3|unique:m_level,level_nama',                                                                                                                              
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi Gagal',
                    'errors'   => $validator->errors()
                ], 422);
            }
    
            LevelModel::create([
                'level_kode' => $request->level_kode,
                'level_nama' => $request->level_nama,
            ]);
    
            return response()->json([
                'status'  => true,
                'message' => 'Data level berhasil disimpan'
            ]);
        }
    
        return redirect('/level')->with('error', 'Request tidak valid');
    }
    

    public function edit_ajax(string $id) {
        $level = LevelModel::find($id);
        return view('level.edit_ajax')->with('level', $level);
    }
    
    
    public function update_ajax(Request $request, $id){ 
    if ($request->ajax() || $request->wantsJson()) {   
        // Tambahkan level_id ke request
        $request->merge(['level_id' => $id]);

        $rules = [ 
            'level_id' => 'required|integer', 
            'level_kode' => 'required|max:20|unique:m_level,level_kode,'.$id.',level_id',    
            'level_nama' => 'required|max:20|unique:m_level,level_nama,'.$id.',level_id', 
        ]; 

        $validator = Validator::make($request->all(), $rules); 
        if ($validator->fails()) {             
            return response()->json([ 
                'status'   => false,    
                'message'  => 'Validasi gagal.', 
                'msgField' => $validator->errors()  
            ]); 
        }

        $check = LevelModel::find($id);         
        if ($check) { 
            if(!$request->filled('password')){ 
                $request->request->remove('password'); 
            } 
            $check->update($request->all());             
            return response()->json([ 
                'status'  => true, 
                'message' => 'Data berhasil diupdate' 
            ]);         
        } else { 
            return response()->json([ 
                'status'  => false, 
                'message' => 'Data tidak ditemukan' 
            ]); 
        }     
    } 
    return redirect('/'); 
}


    public function confirm_ajax(string $id) {
        $level = LevelModel::find($id);
        return view('level.confirm_ajax')
                    ->with('level', $level);
    }
    
    public function delete_ajax(Request $request, $id) { 
        if ($request->ajax() || $request->wantsJson()) {
            $level = LevelModel::find($id);
            if ($level) {
                $level->delete();
                return response()->json([
                    'status'  => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
}
    
    
}