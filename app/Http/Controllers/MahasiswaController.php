<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')->orderby('id', 'desc')->get();
        return view('pages.mahasiswa', ['tb_mahasiswa' => $mahasiswa, 'title' => 'Tabel Mahasiswa']);
    }

    public function store(Request $request)
    {
        # code...

        DB::table('mahasiswa')->insert([
            'nim' => $request->tmbh_nim,
            'nama' => $request->tmbh_nama,
            'jk' => $request->tmbh_jk,
            'jurusan' => $request->tmbh_jurusan
        ]);

        return back()->with('success', 'Data mahasiswa berhasil ditambah!');
    }

    public function update(Request $request, $id)
    {
        DB::table('mahasiswa')->where('id', $id)->update([
            'nim' => $request->tmbh_nim,
            'nama' => $request->tmbh_nama,
            'jk' => $request->tmbh_jk,
            'jurusan' => $request->tmbh_jurusan
        ]);

        return back()->with('success', 'Data mahasiswa berhasil di perbahrui!');
    }

    public function destroy($id)
    {
        Alert::error('Data mahasiswa berhasil dihapus!');
        DB::table('mahasiswa')->where('id', $id)->delete();
        

        return back()->with('flash_message_danger', 'Data mahasiswa berhasil di hapus!');
    }
}
