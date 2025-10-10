<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::firstOrCreate([]);
        $admin = Auth::guard('admin')->user();
        return view('admin.pages.about-us.edit', compact('aboutUs', 'admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_text' => 'nullable|string|max:255',
            'hero_title_text_en' => 'nullable|string|max:255',
            'main_title' => 'nullable|string|max:255',
            'main_title_en' => 'nullable|string|max:255',
            'intro_text' => 'nullable|string',
            'intro_text_en' => 'nullable|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $aboutUs = AboutUs::firstOrCreate([]);

        $data = $request->except(['image_1', 'image_2', 'image_3', 'image_4']);

        // Handle image 1 upload
        if ($request->hasFile('image_1')) {
            if ($aboutUs->image_1) {
                Storage::disk('public')->delete($aboutUs->image_1);
            }
            $data['image_1'] = $request->file('image_1')->store('about-us/images', 'public');
        }

        // Handle image 2 upload
        if ($request->hasFile('image_2')) {
            if ($aboutUs->image_2) {
                Storage::disk('public')->delete($aboutUs->image_2);
            }
            $data['image_2'] = $request->file('image_2')->store('about-us/images', 'public');
        }

        // Handle image 3 upload
        if ($request->hasFile('image_3')) {
            if ($aboutUs->image_3) {
                Storage::disk('public')->delete($aboutUs->image_3);
            }
            $data['image_3'] = $request->file('image_3')->store('about-us/images', 'public');
        }

        // Handle image 4 upload
        if ($request->hasFile('image_4')) {
            if ($aboutUs->image_4) {
                Storage::disk('public')->delete($aboutUs->image_4);
            }
            $data['image_4'] = $request->file('image_4')->store('about-us/images', 'public');
        }

        $aboutUs->update($data);

        return redirect()->route('admin.about-us.edit')->with('success', 'About Us content updated successfully!');
    }
}
