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
            ['nama' => 'Baju Anak Dayak Cowo', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 4, 'harga_sewa' => 50000, 'foto' => 'anak_dayak_cowo.jpg'],
            ['nama' => 'Baju Dayak Cewe', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 5, 'harga_sewa' => 60000, 'foto' => 'Dayak.jpg'],
            ['nama' => 'Baju Anak Dayak Cewe', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'anak_dayak_cewe.jpg'],
            ['nama' => 'Baju Galuh', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 4, 'harga_sewa' => 75000, 'foto' => 'banjar galuh.jpg'],
            ['nama' => 'Baju Anak Galuh', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 4, 'harga_sewa' => 50000, 'foto' => 'anak_galuh.jpg'],
            ['nama' => 'Baju Kebaya', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 60000, 'foto' => 'Kebaya.jpg'],
            ['nama' => 'Baju Anak Kebaya', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'anak_kebaya.jpg'],
            ['nama' => 'Baju Jas Cowo', 'kategori' => 'Baju Jas', 'jumlah_aksesoris' => 1, 'harga_sewa' => 60000, 'foto' => 'Jas cowo.jpg'],
            ['nama' => 'Baju Anak Jas Cowo', 'kategori' => 'Baju Jas', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'anak_jas_cowo.jpg'],
            ['nama' => 'Baju Jas Cewe', 'kategori' => 'Baju Jas', 'jumlah_aksesoris' => 1, 'harga_sewa' => 60000, 'foto' => 'jas cewe.jpg'],
            ['nama' => 'Baju Anak Jas Cewe', 'kategori' => 'Baju Jas', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'anak_jas_cewe.jpg'],
            ['nama' => 'Baju Adat Jawa Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'jawa.jpg'],
            ['nama' => 'Baju Anak Adat Jawa Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'anak_jawa_cowo.jpg'],
            ['nama' => 'Baju Adat Jawa Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'jawa cewe.jpg'],
            ['nama' => 'Baju Anak Adat Jawa Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'anak_jawa_cewe.jpg'],
            ['nama' => 'Baju Adat Bali Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 60000, 'foto' => 'bali.jpg'],
            ['nama' => 'Baju Anak Adat Bali Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'anak_bali_cowo.jpg'],
            ['nama' => 'Baju Adat Bali Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 60000, 'foto' => 'bali cewe.jpg'],
            ['nama' => 'Baju Anak Adat Bali Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'anak_bali_cewe.webp'],
            ['nama' => 'Baju Nanang', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 75000, 'foto' => 'baju nanang.jpg'],
            ['nama' => 'Baju Anak Nanang', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'anak_nanang.jpg'],
            ['nama' => 'Baju Adat NTT', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 4, 'harga_sewa' => 70000, 'foto' => 'ntt.jpg'],
            ['nama' => 'Baju Anak Adat NTT', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 4, 'harga_sewa' => 50000, 'foto' => 'anak_ntt.jpg'],
            ['nama' => 'Baju Radap Rahayu', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 5, 'harga_sewa' => 100000, 'foto' => 'Radap Rahayuu.jpg'],
            ['nama' => 'Baju Anak Radap Rahayu', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'anak_radap_rahayu.jpg'],
            ['nama' => 'Baju Adat Betawi', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 70000, 'foto' => 'betawi.webp'],
            ['nama' => 'Baju Anak Adat Betawi', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'anak_betawi.jpg'],
            ['nama' => 'Baju Giring-Giring', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 2, 'harga_sewa' => 75000, 'foto' => 'Giring giring.jpg'],
            ['nama' => 'Baju Anak Giring-Giring', 'kategori' => 'Baju Tarian', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'anak_giring_giring.jpg'],
            ['nama' => 'Baju Adat Banjar Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 3, 'harga_sewa' => 50000, 'foto' => 'banjarrrr.jpg'],
            ['nama' => 'Baju Anak Adat Banjar Cowo', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 3, 'harga_sewa' => 50000, 'foto' => 'anak_banjar_cowo.jpg'],
            ['nama' => 'Baju Adat Banjar Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'Banjar Cewe.jpg'],
            ['nama' => 'Baju Anak Adat Banjar Cewe', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 5, 'harga_sewa' => 50000, 'foto' => 'anak_banjar_cewe.jpg'],
            ['nama' => 'Baju Adat Sunda', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'sunda.jpg'],
            ['nama' => 'Baju Anak Adat Sunda', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'anak_sunda.jpg'],
            ['nama' => 'Baju Adat Sumsel', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'sumsel.webp'],
            ['nama' => 'Baju Anak Adat Sumsel', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 1, 'harga_sewa' => 50000, 'foto' => 'anak_sumsel.jpg'],
            ['nama' => 'Baju Adat Batak', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 60000, 'foto' => 'batak.jpg'],
            ['nama' => 'Baju Anak Adat Batak', 'kategori' => 'Baju Adat', 'jumlah_aksesoris' => 2, 'harga_sewa' => 50000, 'foto' => 'anak_batak.jpg'] 
        ];

        foreach ($bajus as $baju) {
            Baju::create($baju);
        }
    }
}
