<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order')->get();
        return view('admin.pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,wmv|max:102400',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'shopee_url' => 'nullable|url',
            'tokopedia_url' => 'nullable|url',
        ]);
        $data = $request->only(['name', 'name_en', 'description', 'description_en', 'shopee_url', 'tokopedia_url']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $product = Product::create($data);
        // Simpan multiple gallery files (gambar dan video)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryFile) {
                if ($galleryFile) {
                    // Tentukan folder berdasarkan tipe file
                    $mimeType = $galleryFile->getMimeType();
                    if (strpos($mimeType, 'video') !== false) {
                        $galleryPath = $galleryFile->store('products/gallery/videos', 'public');
                    } else {
                        $galleryPath = $galleryFile->store('products/gallery', 'public');
                    }
                    $product->galleries()->create([
                        'image' => $galleryPath,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.pages.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'gallery.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi,mov,wmv|max:102400',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'shopee_url' => 'nullable|url',
            'tokopedia_url' => 'nullable|url',
            'button_label' => 'nullable|string|max:50',
            'button_label_en' => 'nullable|string|max:50',
            'order' => 'nullable|integer',
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($data);

        // Handle gallery images/videos update
        if ($request->has('remove_gallery')) {
            // Remove selected gallery files (IDs in remove_gallery[])
            foreach ($request->input('remove_gallery') as $galleryId) {
                $gallery = $product->galleries()->find($galleryId);
                if ($gallery) {
                    \Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryFile) {
                if ($galleryFile) {
                    // Tentukan folder berdasarkan tipe file
                    $mimeType = $galleryFile->getMimeType();
                    if (strpos($mimeType, 'video') !== false) {
                        $galleryPath = $galleryFile->store('products/gallery/videos', 'public');
                    } else {
                        $galleryPath = $galleryFile->store('products/gallery', 'public');
                    }
                    $product->galleries()->create([
                        'image' => $galleryPath,
                        'product_id' => $product->id,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}