<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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
            'nama' => 'required',
            'institusi' => 'required',
            'telepon' => 'required',
            'email' => 'required|email',
            'subjek' => 'required',
            'pesan' => 'required',
        ]);

        // Kirim ke email tujuan dengan error handling
        try {
            Mail::send('emails.contact', ['data' => $validated], function ($message) use ($validated) {
                $message->to('intisemai@gmail.com', 'Admin Intisemai')
                    ->subject('Pesan Baru: ' . $validated['subjek'])
                    ->from($validated['email'], $validated['nama']);
            });
        } catch (\Exception $e) {
            \Log::error('Email send error: ' . $e->getMessage());
        }

        return back()->with('success', 'Pesan berhasil dikirim ke admin!');
    }

    public function submitEnglish(Request $request)
    {
        // Validate English form field names
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send using the English email template with error handling
        try {
            Mail::send('emails.contact_en', ['data' => $validated], function ($message) use ($validated) {
                $message->to('intisemai@gmail.com', 'Admin Intisemai')
                    ->subject('New Message: ' . $validated['subject'])
                    ->from($validated['email'], $validated['name']);
            });
        } catch (\Exception $e) {
            \Log::error('Email send error: ' . $e->getMessage());
        }

        return back()->with('success', 'Message successfully sent to admin!');
    }

}