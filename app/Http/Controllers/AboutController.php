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

        return view('landing.about', compact('aboutUs', 'setting'));
    }

    public function english()
    {
        $aboutUs = AboutUs::firstOrCreate(
            [],
            [
                'hero_text_en' => 'About Us',
                'main_title_en' => 'GET TO KNOW US BETTER',
                'intro_text_en' => 'PT. Inti Semai Kaliandra is a company engaged in agriculture and plantation.',
            ]
        );
        $setting = CompanySetting::first();

        return view('landing.en.about', compact('aboutUs', 'setting'));
    }
}