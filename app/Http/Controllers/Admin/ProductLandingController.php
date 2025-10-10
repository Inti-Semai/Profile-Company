<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductLanding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductLandingController extends Controller
{
    public function edit()
    {
        $landing = ProductLanding::firstOrCreate([]);
        $admin = Auth::guard('admin')->user();
        return view('admin.pages.product-landing.edit', compact('landing', 'admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_subtitle_top' => 'nullable|string|max:255',
            'hero_subtitle_bottom' => 'nullable|string|max:255',
        ]);
        $landing = ProductLanding::firstOrCreate([]);
        $landing->update($request->only(['hero_subtitle_top', 'hero_subtitle_bottom']));
        return redirect()->route('admin.product-landing.edit')->with('success', 'Product landing updated successfully!');
    }
}
