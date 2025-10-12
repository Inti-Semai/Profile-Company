
@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }
    .product-form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .product-form-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        border: none;
        margin-bottom: 32px;
        overflow: hidden;
    }
    .product-form-header {
        background: #3B5B18;
        color: #fff;
        padding: 32px 40px;
        border-bottom: none;
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .product-form-header i {
        font-size: 2.2rem;
        background: rgba(255,255,255,0.2);
        color: #fff;
        border-radius: 12px;
        padding: 16px;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-form-header h1 {
        font-size: 1.85rem;
        font-weight: 700;
        margin: 0;
        color: #fff;
        letter-spacing: 0.3px;
    }
    .product-form-body {
        padding: 48px 40px;
        background: #f8f9fa;
    }
    .form-section {
        background: #fff;
        border-radius: 12px;
        padding: 32px;
        margin-bottom: 24px;
        border: 1px solid #e8e8e8;
    }
    .form-section-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #3B5B18;
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid #3B5B18;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-section-title i {
        font-size: 1.2rem;
    }
    .form-row {
        display: flex;
        gap: 24px;
        margin-bottom: 0;
    }
    .form-group {
        flex: 1;
        margin-bottom: 28px;
        position: relative;
    }
    .form-group.full-width {
        flex: 1 1 100%;
    }
    .form-group label {
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .form-group label i {
        font-size: 0.85rem;
        color: #3B5B18;
    }
    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 14px 18px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #fff;
        width: 100%;
        font-family: inherit;
    }
    .form-control:hover {
        border-color: #b8b8b8;
    }
    .form-control:focus {
        border-color: #3B5B18;
        box-shadow: 0 0 0 4px rgba(59,91,24,0.12);
        outline: none;
        background: #fafffe;
    }
    .form-control.is-invalid {
        border-color: #dc3545;
        background: #fff5f5;
    }
    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(220,53,69,0.12);
    }
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
        line-height: 1.6;
    }
    .form-control::placeholder {
        color: #a0a0a0;
        font-style: italic;
    }
    .input-icon {
        position: relative;
    }
    .input-icon i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1rem;
    }
    .input-icon .form-control {
        padding-left: 46px;
    }
    .invalid-feedback {
        display: block;
        margin-top: 8px;
        font-size: 0.875rem;
        color: #dc3545;
        font-weight: 500;
    }
    .form-text {
        margin-top: 8px;
        font-size: 0.85rem;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .form-text i {
        font-size: 0.8rem;
    }
    .text-danger {
        color: #dc3545;
    }
    .file-upload-wrapper {
        position: relative;
    }
    .file-upload-wrapper input[type="file"] {
        padding: 36px 18px;
        border: 2px dashed #d0d0d0;
        border-radius: 10px;
        cursor: pointer;
        background: #fafafa;
        transition: all 0.3s;
    }
    .file-upload-wrapper input[type="file"]:hover {
        border-color: #3B5B18;
        background: #f0f7f0;
    }
    .file-upload-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
        text-align: center;
        color: #6c757d;
    }
    .file-upload-label i {
        display: block;
        font-size: 2rem;
        margin-bottom: 8px;
        color: #3B5B18;
    }
    .product-form-footer {
        background: #fff;
        padding: 24px 40px;
        border-top: 1px solid #e8e8e8;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .footer-info {
        color: #6c757d;
        font-size: 0.9rem;
    }
    .footer-actions {
        display: flex;
        gap: 12px;
    }
    .btn {
        border: none;
        border-radius: 10px;
        padding: 13px 32px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }
    .btn i {
        font-size: 1rem;
    }
    .btn-primary {
        background: #3B5B18;
        color: #fff;
        box-shadow: 0 4px 12px rgba(59,91,24,0.2);
    }
    .btn-primary:hover {
        background: #2d4612;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59,91,24,0.3);
    }
    .btn-primary:active {
        transform: translateY(0);
    }
    .btn-secondary {
        background: #6c757d;
        color: #fff;
    }
    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108,117,125,0.3);
    }
    .alert {
        border-radius: 12px;
        padding: 18px 24px;
        margin-bottom: 24px;
        border: none;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
    }
    .alert i {
        font-size: 1.2rem;
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        .product-form-header {
            padding: 24px 20px;
        }
        .product-form-body {
            padding: 24px 20px;
        }
        .form-section {
            padding: 20px;
        }
        .product-form-footer {
            padding: 20px;
            flex-direction: column;
            gap: 16px;
        }
        .footer-actions {
            width: 100%;
            flex-direction: column;
        }
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="product-form-container">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="product-form-card">
            <div class="product-form-header">
                <i class="fas fa-box"></i>
                <h1>Edit Product</h1>
            </div>
            <div class="product-form-body">
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-info-circle"></i>
                        <span>Product Info</span>
                    </div>
                    <div class="form-row" style="gap:40px;">
                        <div class="form-group" style="flex:1;">
                            <label for="name">
                                <i class="fas fa-globe-asia"></i>
                                Product Name (ID) <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name ?? '') }}" required placeholder="Nama produk">
                            @error('name')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group" style="flex:1;">
                            <label for="name_en">
                                <i class="fas fa-globe"></i>
                                Product Name (EN)
                            </label>
                            <input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ old('name_en', $product->name_en ?? '') }}" placeholder="Product name (English)">
                            @error('name_en')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-row" style="gap:40px;">
                        <div class="form-group full-width" style="flex:1;">
                            <label for="specification">
                                <i class="fas fa-list"></i>
                                Spesifikasi Produk (ID)
                            </label>
                            <textarea name="specification" id="specification" class="form-control @error('specification') is-invalid @enderror" rows="5" placeholder="Tulis spesifikasi produk...">{{ old('specification', $product->specification ?? '') }}</textarea>
                            @error('specification')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group full-width" style="flex:1;">
                            <label for="specification_en">
                                <i class="fas fa-list"></i>
                                Product Specification (EN)
                            </label>
                            <textarea name="specification_en" id="specification_en" class="form-control @error('specification_en') is-invalid @enderror" rows="5" placeholder="Product specification (English)">{{ old('specification_en', $product->specification_en ?? '') }}</textarea>
                            @error('specification_en')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-image"></i>
                        <span>Product Images</span>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="image">
                                <i class="fas fa-image"></i>
                                Cover Image <span class="text-danger">*</span>
                            </label>
                            <div class="file-upload-wrapper">
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" {{ isset($product) ? '' : 'required' }}>
                                <div class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div>Upload cover image</div>
                                </div>
                            </div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i>
                                Hanya gambar utama/cover produk
                            </small>
                            @if(isset($product) && $product->image)
                                <div style="margin-top:10px;">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Current Cover" style="max-width:180px;max-height:180px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                                    <div style="font-size:0.9rem;color:#888;">Current cover image</div>
                                </div>
                            @endif
                            @error('image')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>
                                <i class="fas fa-images"></i>
                                Gallery Images (multiple)
                            </label>
                            <div id="gallery-inputs">
                                @if(isset($product) && $product->galleries && count($product->galleries))
                                    @foreach($product->galleries as $gallery)
                                        <div class="file-upload-wrapper gallery-input-row">
                                            <input type="file" name="gallery[]" class="form-control gallery-input" accept="image/*" onchange="previewSingleGalleryImage(this)">
                                            <div class="file-upload-label">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <div>Upload gallery image</div>
                                            </div>
                                            <button type="button" class="btn btn-danger" style="margin-left:10px;" onclick="removeGalleryInput(this)"><i class="fas fa-trash"></i></button>
                                            <div style="margin-top:10px;">
                                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image" style="max-width:120px;max-height:120px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                                                <div style="font-size:0.85rem;color:#888;">Current gallery image</div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="file-upload-wrapper gallery-input-row">
                                        <input type="file" name="gallery[]" class="form-control gallery-input @error('gallery') is-invalid @enderror" accept="image/*" onchange="previewSingleGalleryImage(this)">
                                        <div class="file-upload-label">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <div>Upload gallery image</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" class="btn btn-secondary" style="margin-top:10px;" onclick="addGalleryInput()"><i class="fas fa-plus"></i> Tambah Gambar</button>
                            <div id="gallery-preview" style="display:flex;gap:10px;flex-wrap:wrap;margin-top:10px;"></div>
                            <small class="form-text text-muted">
                                <i class="fas fa-info-circle"></i>
                                Opsional, untuk galeri produk (tidak tampil di landing utama)
                            </small>
                            @error('gallery')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Marketplace Links</span>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="shopee_url">
                                <i class="fab fa-shopify"></i>
                                Shopee URL
                            </label>
                            <input type="url" name="shopee_url" id="shopee_url" class="form-control @error('shopee_url') is-invalid @enderror" value="{{ old('shopee_url', $product->shopee_url ?? '') }}" placeholder="https://shopee.co.id/...">
                            @error('shopee_url')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="tokopedia_url">
                                <i class="fas fa-store"></i>
                                Tokopedia URL
                            </label>
                            <input type="url" name="tokopedia_url" id="tokopedia_url" class="form-control @error('tokopedia_url') is-invalid @enderror" value="{{ old('tokopedia_url', $product->tokopedia_url ?? '') }}" placeholder="https://tokopedia.com/...">
                            @error('tokopedia_url')<div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-form-footer">
                <div class="footer-info">
                    <i class="fas fa-asterisk text-danger"></i> Required fields
                </div>
                <div class="footer-actions">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Product
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
function addGalleryInput() {
    const galleryInputs = document.getElementById('gallery-inputs');
    const row = document.createElement('div');
    row.className = 'file-upload-wrapper gallery-input-row';
    row.innerHTML = `
        <input type="file" name="gallery[]" class="form-control gallery-input" accept="image/*" onchange="previewSingleGalleryImage(this)">
        <div class="file-upload-label">
            <i class="fas fa-cloud-upload-alt"></i>
            <div>Upload gallery image</div>
        </div>
        <button type="button" class="btn btn-danger" style="margin-left:10px;" onclick="removeGalleryInput(this)"><i class="fas fa-trash"></i></button>
    `;
    galleryInputs.appendChild(row);
}
function removeGalleryInput(btn) {
    btn.parentElement.remove();
    updateGalleryPreview();
}
function previewSingleGalleryImage(input) {
    updateGalleryPreview();
}
function updateGalleryPreview() {
    const preview = document.getElementById('gallery-preview');
    preview.innerHTML = '';
    const inputs = document.querySelectorAll('.gallery-input');
    inputs.forEach(input => {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '90px';
                img.style.maxHeight = '90px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '8px';
                img.style.border = '1px solid #e0e0e0';
                preview.appendChild(img);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
}
</script>
@endsection
