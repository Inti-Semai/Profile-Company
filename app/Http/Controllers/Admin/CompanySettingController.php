<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanySettingController extends Controller
{
    public function edit()
    {
        $setting = CompanySetting::firstOrCreate([]);
        $admin = Auth::guard('admin')->user();
        return view('admin.pages.company-settings.edit', compact('setting', 'admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_title_en' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'hero_subtitle_en' => 'nullable|string',
            'hero_subtitle_top' => 'nullable|string|max:255',
            'hero_subtitle_bottom' => 'nullable|string|max:255',
            'vision_section' => 'nullable|string|max:255',
            'vision_section_en' => 'nullable|string|max:255',
            'vision_text' => 'nullable|string',
            'vision_text_en' => 'nullable|string',
            'mission_section' => 'nullable|string|max:255',
            'mission_section_en' => 'nullable|string|max:255',
            'mission_text' => 'nullable|string',
            'mission_text_en' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'maps_embed_url' => 'nullable|string',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'telegram_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'whatsapp_enabled' => 'nullable|boolean',
        ]);

        $setting = CompanySetting::firstOrCreate([]);

        $data = $request->except(['hero_image', 'vision_image', 'mission_image']);

        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($setting->hero_image) {
                Storage::disk('public')->delete($setting->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('company/hero', 'public');
        }

        // Handle vision image upload
        if ($request->hasFile('vision_image')) {
            // Delete old image if exists
            if ($setting->vision_image) {
                Storage::disk('public')->delete($setting->vision_image);
            }
            $data['vision_image'] = $request->file('vision_image')->store('company/vision', 'public');
        }

        // Handle mission image upload
        if ($request->hasFile('mission_image')) {
            // Delete old image if exists
            if ($setting->mission_image) {
                Storage::disk('public')->delete($setting->mission_image);
            }
            $data['mission_image'] = $request->file('mission_image')->store('company/mission', 'public');
        }

        $setting->update($data);

        return redirect()->route('admin.company-settings.edit')->with('success', 'Company settings updated successfully!');
    }
}
