<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::firstOrCreate(
            [],
            [
                'hero_text' => 'Tentang Kami',
                'main_title' => 'KENALI KAMI LEBIH DEKAT',
                'intro_text' => 'PT. Inti Semai Kaliandra adalah perusahaan yang bergerak di bidang pertanian dan perkebunan.',
            ]
        );
        $setting = CompanySetting::first();

        return view('about', compact('aboutUs', 'setting'));
    }
}
