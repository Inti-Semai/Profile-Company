<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;

class ContactController extends Controller
{
    public function index()
    {
        $setting = CompanySetting::first();
        return view('landing.contact', compact('setting'));
    }

    public function english()
    {
        $setting = CompanySetting::first();
        return view('landing.en.contact', compact('setting'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        // Here you can add logic to send email or save to database
        // For now, we'll just redirect back with success message

        return back()->with('success', 'Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
    }

    public function submitEnglish(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Here you can add logic to send email or save to database
        // For now, we'll just redirect back with success message

        return back()->with('success', 'Your message has been sent. We will contact you soon.');
    }
}