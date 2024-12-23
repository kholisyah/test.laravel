<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SawAhpController extends Controller
{
    public function index()
    {
        // Data Input (Nama, Harga Sewa, Jumlah Sewa, Banyak Aksesoris)
        $data = [
            ["Baju Dayak Cowo", 60000, 62, 4],
            ["Baju Dayak Cewe", 60000, 62, 5],
            ["Baju Galuh", 75000, 29, 4],
            ["Baju Kebaya", 60000, 24, 1], 
            ["Baju Jas Cowo", 50000, 15, 1],
            ["Baju Jas Cewe", 50000, 10, 1],
            ["Baju Adat Jawa Cowo", 50000, 15, 2],
            ["Baju Adat Jawa Cewe", 50000, 15, 5],
            ["Baju Adat Bali Cowo", 60000, 7, 1],
            ["Baju Adat Bali Cewe", 60000, 7, 2],
            ["Baju Nanang", 75000, 6, 1],
            ["Baju adat NTT", 70000, 4, 4],
            ["Baju Radap Rahayu", 100000, 3, 5],
            ["Baju Adat Betawi", 70000, 8, 2],
            ["Baju Giring-Giring", 75000, 2, 2],
            ["Baju Adat Banjar Cowo", 50000, 4, 3],
            ["Baju Adat Banjar Cewe", 50000, 4, 5],
            ["Baju Adat Sunda", 50000, 2, 2],
            ["Baju Adat Sumsel", 50000, 2, 1],
            ["Baju Adat Batak", 60000, 2, 2],
        ];

        // Kriteria (1: benefit, -1: cost)
        $kriteria = [1, 1, -1];  // Harga Sewa (cost), Jumlah Sewa (benefit), Banyak Aksesoris (benefit)

        // Matriks Keputusan
        $matriks = array_map(function ($row) {
            return [$row[1], $row[2], $row[3]];
        }, $data);

        // Normalisasi Matriks (Metode SAW)
        $normalisasi = $matriks;
        for ($i = 0; $i < count($kriteria); $i++) {
            if ($kriteria[$i] == 1) {  // Benefit
                $max = max(array_column($matriks, $i));
                foreach ($normalisasi as &$row) {
                    $row[$i] = $row[$i] / $max;
                }
            } elseif ($kriteria[$i] == -1) {  // Cost
                $min = min(array_column($matriks, $i));
                foreach ($normalisasi as &$row) {
                    $row[$i] = $min / $row[$i];
                }
            }
        }

        // Bobot Kriteria
        $bobot = [0.3, 0.5, 0.2];  // Sesuaikan dengan kebutuhan

        // Nilai Preferensi SAW
        $nilai_saw = array_map(function ($row) use ($bobot) {
            return array_sum(array_map(function ($x, $w) {
                return $x * $w;
            }, $row, $bobot));
        }, $normalisasi);

        // Menyiapkan data untuk view
        $results = [];
        foreach ($data as $index => $row) {
            $results[] = [
                'nama' => $row[0],
                'hasil_saw' => number_format($nilai_saw[$index], 4)
            ];
        }

        return view('index', compact('results'));
    }
}
