<?php

namespace Database\Seeders;

use App\Models\Baju;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $bajus = [
            ['nama' => 'Baju Dayak Cowo', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 4, 'harga_sewa' => 60000, 'foto' => 'Dayak cowo.jpg'],
            ['nama' => 'Baju Dayak Cewe', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 5, 'harga_sewa' => 60000, 'foto' => 'Dayak.jpg'],
            ['nama' => 'Baju Galuh', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 4, 'harga_sewa' => 75000, 'foto' => 'banjar galuh.jpg'],
            ['nama' => 'Baju Kebaya', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 60000, 'foto' => 'Kebaya.jpg'],
            ['nama' => 'Baju Jas Cowo', 'kategori' => 'Baju Jas', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'Jas cowo.jpg'],
            ['nama' => 'Baju Jas Cewe', 'kategori' => 'Baju Jas', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'jas cewe.jpg'],
            ['nama' => 'Baju Adat Jawa Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'jawa.jpg'],
            ['nama' => 'Baju Adat Jawa Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'jawa cewe.jpg'],
            ['nama' => 'Baju Adat Bali Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 60000, 'foto' => 'bali.jpg'],
            ['nama' => 'Baju Adat Bali Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 60000, 'foto' => 'bali cewe.jpg'],
            ['nama' => 'Baju Nanang', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 75000, 'foto' => 'baju nanang.jpg'],
            ['nama' => 'Baju Adat NTT', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 4, 'harga_sewa' => 70000, 'foto' => 'ntt.jpg'],
            ['nama' => 'Baju Radap Rahayu', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 5, 'harga_sewa' => 100000, 'foto' => 'Radap Rahayuu.jpg'],
            ['nama' => 'Baju Adat Betawi', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 70000, 'foto' => 'betawi.webp'],
            ['nama' => 'Baju Giring-Giring', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 2, 'harga_sewa' => 75000, 'foto' => 'Giring giring.jpg'],
            ['nama' => 'Baju Adat Banjar Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 3, 'harga_sewa' => 50000, 'foto' => 'banjarrrr.jpg'],
            ['nama' => 'Baju Adat Banjar Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'Banjar Cewe.jpg'],
            ['nama' => 'Baju Adat Sunda', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'sunda.jpg'],
            ['nama' => 'Baju Adat Sumsel', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'sumsel.jpg'],
            ['nama' => 'Baju Adat Batak', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 60000, 'foto' => 'batak.jpg'],
        ];

        foreach ($bajus as $baju) {
            Baju::create(array_merge($baju, ['stok' => 15]));
        }
    }
}