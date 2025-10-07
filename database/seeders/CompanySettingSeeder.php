<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySetting::create([
            'company_name' => 'PT. INTI SEMAI KALANDRA',
            'hero_title' => 'Inovasi untuk Hasil yang',
            'hero_subtitle' => 'Lebih Baik, dan Berkelanjutan',
            'vision_text' => 'Menghadirkan solusi pertanian berbasis inovasi, produktivitas, dan keberlanjutan untuk meningkatkan kesejahteraan petani melalui pendekatan yang ramah lingkungan dan berorientasi pada hasil jangka panjang dengan fokus pada diversifikasi dan nilai tambah yang tinggi untuk pertanian yang berkelanjutan dan menguntungkan.',
            'mission_text' => 'Menyediakan produk dan layanan pertanian berkualitas tinggi yang mendukung peningkatan produktivitas pertanian, membangun kemitraan strategis dengan petani lokal, serta menerapkan teknologi modern untuk menghasilkan hasil panen yang berkelanjutan dan ramah lingkungan yang dapat meningkatkan nilai ekonomi pertanian Indonesia.',
            'address' => "Ruko Kembaran Square\nBlok B No. 4, Jl. Lingkar Sumur Ulo,\nSumur Kuning Kec. Kembaran, Kab. Banyumas",
            'phone' => '081076302053',
            'email' => 'intisemai@gmail.com',
        ]);
    }
}