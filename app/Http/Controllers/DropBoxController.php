<?php

namespace App\Http\Controllers;

use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\DropboxTokenProvider;

class DropBoxController extends Controller
{
    protected $client;

    public function __construct()
    {
        // Ambil token akses yang valid (dapat dari token yang sudah diperbarui)
        $this->client = new Client($this->getValidAccessToken());
    }

    private function getValidAccessToken()
    {
        // Ambil token akses dari DropboxTokenProvider
        $tokenProvider = new DropboxTokenProvider();
        return $tokenProvider->getToken();
    }

    // Membuat Folder
    public function createFolder($path)
    {
        $this->client->createFolder($path);
        return back()->with('status', 'Folder created successfully!');
    }

    // Melihat Daftar File dalam Folder
    public function listFolder($path = '/')
    {
        $response = $this->client->listFolder($path);
        return view('dropbox.list', ['files' => $response['entries']]);
    }

    // Menampilkan form untuk memilih file
    public function showUploadForm()
    {
        return view('dropbox.upload'); // Nama view sesuai dengan file blade
    }

    // Mengunggah File
    public function uploadFile(Request $request)
    {
        // Validasi input dengan pesan kesalahan kustom
        $request->validate([
            'file' => 'required|file|mimes:pdf', // Hanya file PDF yang diizinkan
        ], [
            'file.mimes' => 'File yang diunggah harus berupa file PDF.',
            'file.required' => 'File harus diunggah.',
        ]);

        // Mendapatkan folder tujuan
        $folderPath = 'saya';
        $file = $request->file('file'); // File yang diunggah
        $fileName = $file->getClientOriginalName(); // Nama asli file
        $fileExtension = $file->getClientOriginalExtension(); // Ekstensi file
        $fileBaseName = pathinfo($fileName, PATHINFO_FILENAME); // Nama file tanpa ekstensi
        $dropboxFilePath = $folderPath . '/' . $fileName;

        // Jika file dengan nama yang sama sudah ada, tambahkan suffix angka berurutan
        $counter = 1;
        while ($this->isFileExists($dropboxFilePath)) {
            $fileName = $fileBaseName . '_(' . $counter . ').' . $fileExtension;
            $dropboxFilePath = $folderPath . '/' . $fileName;
            $counter++;
        }

        try {
            // Mengunggah file ke Dropbox
            $content = file_get_contents($file); // Membaca isi file
            $this->client->upload($dropboxFilePath, $content); // Mengunggah ke Dropbox
            return view('project'); // Mengembalikan tampilan jika unggahan berhasil
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembali ke halaman sebelumnya dengan pesan error
            return back()->withErrors(['error' => 'Failed to upload file: ' . $e->getMessage()]);
        }
    }

    // Mengecek apakah file sudah ada di folder Dropbox
    private function isFileExists($dropboxFilePath)
    {
        try {
            // Mendapatkan daftar file dari folder
            $response = $this->client->listFolder(dirname($dropboxFilePath));

            // Mengecek apakah file ada dalam daftar
            foreach ($response['entries'] as $entry) {
                if ($entry['name'] === basename($dropboxFilePath)) {
                    return true; // File ditemukan
                }
            }

            return false; // File tidak ditemukan
        } catch (\Exception $e) {
            // Jika terjadi kesalahan saat pengecekan file
            return false;
        }
    }

    // Mendapatkan Link Sementara untuk File
    public function getTemporaryLink($filePath)
    {
        $link = $this->client->getTemporaryLink($filePath);
        return view('dropbox.link', ['link' => $link]);
    }

    // Memindahkan File
    public function moveFile($from, $to)
    {
        $this->client->move($from, $to, true);
        return back()->with('status', 'File moved successfully!');
    }
}
