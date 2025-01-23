<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Tarian;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function index()
    {
        $tarians = Tarian::all();
        $akuns = Akun::all();
        $pendaftarans = Pendaftaran::all();
        return view('jadwal', compact('tarians', 'pendaftarans', 'akuns'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'waktu' => 'required|string',
            'tarian_id' => 'required|exists:tarians,id',
            'pendaftarans' => 'required|array', // Pastikan ini adalah array
            'pendaftarans.*' => 'exists:pendaftarans,id', // Validasi setiap anggota
        ]);

        // Ambil pelatih dari model Tarian
        $pelatih = Tarian::find($request->tarian_id);

        // Simpan data jadwal ke tabel akuns
        $akun = new Akun();
        $akun->tanggal = $request->input('tanggal');
        $akun->waktu = $request->input('waktu');
        $akun->tarian_id = $request->input('tarian_id');
        $akun->pelatih = $pelatih->pelatih;
        $akun->save();

        // Simpan anggota ke tabel pivot
        $akun->pendaftarans()->sync($request->pendaftarans);

        return redirect()->route('jadwal')->with('success', 'Jadwal berhasil dibuat!');
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'waktu' => 'required|string',
            'tarian_id' => 'required|exists:tarians,id',
            'pendaftaran_id' => 'required|exists:pendaftarans,id',
        ]);

        $pelatih = Tarian::find($request->tarian_id);

        $post = new Akun();
        $post->tanggal = $request->input('tanggal');
        $post->waktu = $request->input('waktu');
        $post->tarian_id = $request->input('tarian_id');
        $post->pelatih = $pelatih->pelatih;
        $post->pendaftaran_id = $request->input('pendaftaran_id');
        $post->save();

        return redirect()->route('jadwal');
    }

    public function showEditScreen(Akun $akun)
    {
        $tarians = Tarian::all();
        $akuns = Akun::all(); // Mengambil semua data akun untuk validasi
        $pendaftarans = Pendaftaran::all();
        return view('edit-posts', compact('akun', 'tarians', 'akuns', 'pendaftarans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'tarian_id' => 'required|exists:tarians,id',
            'pendaftarans' => 'required|array', // Validasi array
            'pendaftarans.*' => 'exists:pendaftarans,id', // Validasi setiap anggota
        ]);

        $pelatih = Tarian::find($request->tarian_id);

        $akun = Akun::findOrFail($id);
        $akun->tanggal = $request->input('tanggal');
        $akun->waktu = $request->input('waktu');
        $akun->tarian_id = $request->input('tarian_id');
        $akun->pelatih = $pelatih->pelatih;
        $akun->save();

        // Update anggota di tabel pivot
        $akun->pendaftarans()->sync($request->pendaftarans);

        return redirect('/jadwal')->with('success', 'Jadwal berhasil diupdate!');
    }

    public function deletePost(Akun $akun)
    {
        $akun->delete();
        return redirect('/jadwal');
    }
}
