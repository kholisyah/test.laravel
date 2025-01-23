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
    $request->validate([
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'nama_tarian' => 'required|string',
        'id_anggota' => 'required|array', // Pastikan ini array
    ]);

    $jadwal = akun::create([
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'nama_tarian' => $request->nama_tarian,
    ]);

    // Menyimpan anggota yang dipilih ke jadwal
    $jadwal->anggotas()->attach($request->id_anggota);

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
}

public function createPost(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'waktu' => 'required|string',
        'tarian_id' => 'required|exists:tarians,id',
        'pendaftaran_id' => 'required|array', // Pastikan ini array
        'pendaftaran_id.*' => 'exists:pendaftarans,id', // Validasi setiap ID anggota
    ]);

    // Ambil data pelatih berdasarkan tarian
    $pelatih = Tarian::findOrFail($request->tarian_id)->pelatih;

    // Loop melalui setiap pendaftaran_id untuk menyimpan data
    foreach ($request->pendaftaran_id as $pendaftaranId) {
        $post = new Akun();
        $post->tanggal = $request->input('tanggal');
        $post->waktu = $request->input('waktu');
        $post->tarian_id = $request->input('tarian_id');
        $post->pelatih = $pelatih;
        $post->pendaftaran_id = $pendaftaranId;
        $post->save();
    }

    // Redirect setelah selesai
    return redirect()->route('jadwal')->with('success', 'Data jadwal dan anggota berhasil disimpan.');
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