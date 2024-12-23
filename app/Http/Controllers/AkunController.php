<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Tarian;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $tarians = Tarian::all();
        $akuns = Akun::all();
        return view('jadwal', compact('tarians', 'akuns'));
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'waktu' => 'required|string',
            'tarian_id' => 'required|exists:tarians,id',
            'pelatih' => 'required|string',
            'anggota' => 'required|string'
        ]);

        $post = new Akun();
        $post->tanggal = $request->input('tanggal');
        $post->waktu = $request->input('waktu');
        $post->tarian_id = $request->input('tarian_id');
        $post->pelatih = $request->input('pelatih');
        $post->anggota = $request->input('anggota');
        $post->save();

        return redirect()->route('jadwal');
    }

    public function showEditScreen(Akun $akun)
    {
        $tarians = Tarian::all();
        $akuns = Akun::all(); // Mengambil semua data akun untuk validasi
        return view('edit-posts', compact('akun', 'tarians', 'akuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'tarian_id' => 'required|exists:tarians,id',
            'pelatih' => 'required',
            'anggota' => 'required',
        ]);

        $akun = Akun::findOrFail($id);
        $akun->tanggal = $request->input('tanggal');
        $akun->waktu = $request->input('waktu');
        $akun->tarian_id = $request->input('tarian_id');
        $akun->pelatih = $request->input('pelatih');
        $akun->anggota = $request->input('anggota');
        $akun->save();

        return redirect('/jadwal')->with('success', 'Jadwal berhasil diupdate!');
    }

    public function deletePost(Akun $akun)
    {
        $akun->delete();
        return redirect('/jadwal');
    }
}
