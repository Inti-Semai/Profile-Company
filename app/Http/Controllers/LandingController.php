<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use App\Models\Gallery;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $setting = CompanySetting::first();
        $galleries = Gallery::orderBy('order')->take(4)->get();

        return view('landing.index', compact('setting', 'galleries'));
    }

    public function english()
    {
        $setting = CompanySetting::first();
        $galleries = Gallery::orderBy('order')->take(4)->get();

        return view('landing.en.index', compact('setting', 'galleries'));
    }
}
