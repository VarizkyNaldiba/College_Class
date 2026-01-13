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
        $query = LevelModel::select('level_id', 'level_kode', 'level_nama', 'created_at', 'updated_at');

        // Tambahkan filter jika level_code dikirimkan
        if (!empty($request->level_kode)) {
            $query->where('level_kode', $request->level_kode);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                return '<div class="btn-group" role="group">
                    <button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/show_ajax') . '\')" class="btn btn-info btn-sm" title="Detail"><i class="fas fa-eye"></i></button>
                    <button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button>
                    <button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                </div>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }













    public function create_ajax() {
        $level = LevelModel::select('level_id', 'level_kode', 'level_nama')->get();
        return view('level.create_ajax')->with('level', $level);
    }

    public function store_ajax(Request $request) {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
                'level_nama' => 'required|string|max:100',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgfield' => $validator->errors()
                ]);
            }
    
            LevelModel::create($request->all());
            return response()->json([
                'status' => true,
                'success' => 'Data level Berhasil disimpan'
            ]);
    
        }
        redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $level = LevelModel::find($id);

        return view('level.edit_ajax', ['level' => $level]);
    }

    public function update_ajax(Request $request, string $id)
    {
        // Pastikan request dari AJAX
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_kode' => 'sometimes|string|min:3|unique:m_level,level_kode,'.$id.',level_id',
                'level_nama' => 'sometimes|string|max:100',
            ];
    
            // Validasi hanya untuk input yang dikirim
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json([
                    'status'   => false,
                    'message'  => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
    
            // Cari data level berdasarkan ID
            $level = LevelModel::find($id);
            if (!$level) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
    
            // Update hanya field yang dikirim
            $level->update($request->only(['level_kode', 'level_nama']));
    
            return response()->json([
                'status'  => true,
                'message' => 'Data berhasil diupdate'
            ]);
        }
        return redirect('/');
    }
    

    public function confirm_ajax(string $id)
    {
        $level = LevelModel::find($id);
        return view ('level.confirm_ajax', ['level' => $level]);
    }

    public function delete_ajax(Request $request, $id)
    {
        // cek apakah requset dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $level = LevelModel::find($id);
            if ($level) {
                $level->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data level berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data level tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
}