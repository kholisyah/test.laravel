<?php

namespace Database\Seeders;

use App\Models\MasterBaju;
use Illuminate\Database\Seeder;

class MasterBajuSeeder extends Seeder
{
    public function run()
    {
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Jawa', 'harga_sewa' => 50000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Bali', 'harga_sewa' => 60000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat NTT', 'harga_sewa' => 70000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Betawi', 'harga_sewa' => 70000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Banjar', 'harga_sewa' => 50000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Sunda', 'harga_sewa' => 50000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Sumsel', 'harga_sewa' => 50000]);
        MasterBaju::create(['jenis_baju_adat' => 'Baju Adat Batak', 'harga_sewa' => 60000]);


        MasterBaju::create(['jenis_baju' => 'Baju Tarian Dayak', 'harga_sewa' => 60000]);
        MasterBaju::create(['jenis_baju' => 'Baju Tarian Radap Rahayu', 'harga_sewa' => 100000]);
        MasterBaju::create(['jenis_baju' => 'Baju Tarian Baksa Kembang', 'harga_sewa' => 100000]);
        MasterBaju::create(['jenis_baju' => 'Baju Tarian Giring-giring', 'harga_sewa' => 75000]);
        
    }
}

