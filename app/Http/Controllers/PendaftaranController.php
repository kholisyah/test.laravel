<?php
namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function lihatPendaftaran()
{
    $pendaftarans = Pendaftaran::all();
    return view('lihat-pendaftaran', compact('pendaftarans'));
}

    // Fungsi untuk menghapus pendaftaran berdasarkan instance model Pendaftaran
    public function deletePendaftaran(Pendaftaran $pendaftaran) {
        $pendaftaran->delete();
        return redirect('/lihat-pendaftaran');
    }

    // Fungsi untuk memperbarui data pendaftaran
    public function actuallyUpdatePendaftaran(Pendaftaran $pendaftaran, Request $request) {
        try {
            $incomingField = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_telepon' => 'required',
                'kategori' => 'required|in:dewasa,anak-anak',
                'dropbox_link' => 'required|url',
            ]);

            $pendaftaran->update($incomingField);
            return redirect('/lihat-pendaftaran');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        }
    }

    // Fungsi untuk menampilkan halaman edit pendaftaran
    public function showEditScreen(Pendaftaran $pendaftaran) {
        return view('edit-pendaftaran', ['pendaftaran' => $pendaftaran]);
    }

    // Fungsi untuk membuat pendaftaran baru
    public function createPendaftaran(Request $request) {
        try {
            $incomingField = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_telepon' => 'required',
                'kategori' => 'required|in:dewasa,anak-anak',
            ]);

            $pendaftaran = Pendaftaran::create($incomingField);

            if ($request->ajax()) {
                return response()->json($pendaftaran);
            }

            return redirect('/sukses');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        }
    }

    // Fungsi untuk menampilkan semua pendaftaran
    public function index() {
        $pendaftarans = Pendaftaran::all();
        return view('project', compact('pendaftarans'));
    }
}