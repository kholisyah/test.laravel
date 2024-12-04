<?php

namespace App\Http\Controllers;

use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\DropboxTokenProvider;

class DropBoxController extends Controller
{
//
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

//Membuat Folder
public function createFolder($path)
{
$this->client->createFolder($path);
return back()->with('status', 'Folder created successfully!');
}

//Melihat Daftar File dalam Folder
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

//Mengunggah File
 public function uploadFile(Request $request)
 {
// Validasi input
 $request->validate([
// 'folder_path' => 'required|string', // Folder tujuan
'file' => 'required|file', // File yang dipilih
 ]);

// Mendapatkan folder tujuan dari input
$folderPath = 'saya';
// $request->input('folder_path'); // Folder tujuan di Dropbox
$file = $request->file('file'); // File yang diunggah
$fileName = $file->getClientOriginalName(); // Nama asli file

// Tentukan path lengkap untuk file di Dropbox

$dropboxFilePath = $folderPath . '/' . $fileName;
// Mengecek apakah file sudah ada di folder Dropbox

 if ($this->isFileExists($dropboxFilePath)) {
 return back()->withErrors(['error' => 'File already exists in the folder.']);
 }

try {
// Mengunggah file ke Dropbox 
 $content = file_get_contents($file->getRealPath());
 $this->client->upload($dropboxFilePath, $content);

return back()->with('status', 'File uploaded successfully!');
 } catch (\Exception $e) {
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

 //Mendapatkan Link Sementara untuk File
public function getTemporaryLink($filePath)
 {
$link = $this->client->getTemporaryLink($filePath);
 return view('dropbox.link', ['link' => $link]);
 }

 //Memindahkan File
 public function moveFile($from, $to)
{
$this->client->move($from, $to, true);
 return back()->with('status', 'File moved successfully!');
}
}