<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class LihatProfilController extends Controller
{
    public function index()
    {
        // Menyediakan data profil secara langsung
        $profil = (object)[
            'deskripsi' => 'Sanggar Galuh didirikan pada tahun 2010 oleh Maulida, S.Pd, dengan tujuan untuk melestarikan dan mengembangkan seni tari tradisional Indonesia, khususnya tari-tarian daerah Kalimantan Selatan. Sanggar ini tidak hanya berfokus pada pembelajaran tari, tetapi juga memberikan ruang bagi generasi muda untuk mengenal, mencintai, dan melestarikan budaya lokal. Kami menyediakan berbagai pelatihan untuk berbagai usia, mulai dari anak-anak hingga dewasa, dengan pengajaran yang berbasis pada teknik dan filosofi tari tradisional yang mendalam. Sanggar Galuh berlokasi di Komplek Perumahan Hamparan Permai No.68 Blok.4, Desa Atu Atu, depan RTH, samping kolam renang',
            'visi' => 'Sanggar Galuh adalah menjadi pusat pelatihan seni tari tradisional terkemuka yang tidak hanya melestarikan seni budaya Indonesia, tetapi juga memperkenalkan keindahan seni tari lokal kepada dunia, serta berperan aktif dalam pengembangan seni budaya dengan memperdayakan generasi muda melalui pendidikan seni yang berkualitas.',
            'misi' => "1. Menyelenggarakan pelatihan seni tari tradisional yang berkualitas dengan pendekatan yang sesuai dengan perkembangan zaman namun tetap menjaga kelestarian nilai-nilai budaya asli.\n
                        2. Membuka peluang bagi generasi muda untuk menggali potensi diri dalam bidang seni tari melalui berbagai program pelatihan dan pertunjukan.\n
                        3. Menjadi media pembelajaran yang mendalam mengenai seni tari tradisional bagi masyarakat luas, baik di tingkat lokal maupun nasional.\n
                        4. Berperan serta dalam meningkatkan penghargaan dan kecintaan masyarakat terhadap budaya dan seni tari tradisional Indonesia.\n
                        5. Mengadakan acara dan pertunjukan seni tari untuk mempromosikan hasil karya peserta dan memperkenalkan seni tari kepada publik lebih luas."
            ];

        // Mengirimkan data profil ke view
        return view('lihat-profil', compact('profil'));
    }

    public function show($id)
    {
        $lihatProfil = Profil::find($id);
        return view('lihat_profil', compact('lihatProfil'));
    }
}
