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

    // Kirim ke email tujuan
    // Wrap validated data under the 'data' key so the view can access $data['...']
    Mail::send('emails.contact', ['data' => $validated], function ($message) use ($validated) {
        $message->to('intisemai@gmail.com', 'Admin Intisemai')  // <-- Email tujuan
            ->subject('Pesan Baru: ' . $validated['subjek'])
            ->from($validated['email'], $validated['nama']); // Nama pengirim dari form
    });

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

        // Map English keys to the data shape expected by the email view (Indonesian keys)
        $data = [
            'nama' => $validated['name'],
            'institusi' => $validated['institution'],
            'telepon' => $validated['phone'],
            'email' => $validated['email'],
            'subjek' => $validated['subject'],
            'pesan' => $validated['message'],
        ];

        // Send using the same Mail::send pattern as the Indonesian handler so the
        // email view receives ['data' => $data] and renders the same template.
        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->to('intisemai@gmail.com', 'Admin Intisemai')
                ->subject('Pesan Baru: ' . $data['subjek'])
                ->from($data['email'], $data['nama']);
        });

        return back()->with('success', 'Pesan berhasil dikirim ke admin!');
    }

}
