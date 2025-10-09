@extends('admin.layouts.app')

@section('title', 'Edit About Us Content')

@section('content')
<style>
    .about-us-form {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(59, 91, 24, 0.3);
    }

    .page-header h1 {
        margin: 0 0 10px 0;
        font-size: 32px;
        font-weight: 700;
    }

    .page-header p {
        margin: 0;
        opacity: 0.9;
        font-size: 16px;
    }

    .info-banner {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
        opacity: 0.15;
        border-left: 4px solid var(--primary-green);
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .info-banner i {
        font-size: 24px;
        color: var(--primary-green);
    }

    .info-banner-content {
        flex: 1;
    }

    .info-banner-content strong {
        color: var(--primary-green);
        font-size: 16px;
    }

    .info-banner a {
        color: var(--primary-green);
        text-decoration: underline;
        font-weight: 600;
    }

    .section-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: 1px solid #e8e8e8;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid #f0f0f0;
    }

    .section-header i {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
        color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .section-header h3 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #2c3e50;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 14px;
    }

    .form-group label i {
        margin-right: 5px;
        color: var(--primary-green);
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e8e8e8;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(59, 91, 24, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .image-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-top: 20px;
    }

    .image-upload-box {
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .image-upload-box:hover {
        border-color: var(--primary-green);
        background: var(--bg-light);
    }

    .image-upload-box label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        color: #495057;
        font-weight: 600;
    }

    .image-preview {
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .image-preview img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
    }

    .file-input-wrapper {
        position: relative;
    }

    .file-input-wrapper input[type="file"] {
        font-size: 13px;
    }

    .form-hint {
        display: block;
        margin-top: 8px;
        font-size: 12px;
        color: #6c757d;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 2px solid #f0f0f0;
    }

    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(59, 91, 24, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 91, 24, 0.5);
    }

    .btn-secondary {
        background: #e9ecef;
        color: #495057;
    }

    .btn-secondary:hover {
        background: #dee2e6;
    }

    .alert-success {
        background: linear-gradient(135deg, #00b09b15 0%, #9615b215 100%);
        border-left: 4px solid #00b09b;
        color: #00b09b;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    @media (max-width: 768px) {
        .image-grid {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 24px;
        }
    }
</style>

<div class="about-us-form">
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-info-circle"></i> About Us Content Management</h1>
        <p>Customize the content and images displayed on your About Us page</p>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.about-us.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Info Banner -->
        <div class="info-banner">
            <i class="fas fa-lightbulb"></i>
            <div class="info-banner-content">
                <strong>Important Note:</strong><br>
                Hero background image and footer settings are managed in <a href="{{ route('admin.company-settings.edit') }}">Company Settings</a>. Here you can customize the hero text, content card, and gallery images.
            </div>
        </div>

        <!-- Hero Text Section -->
        <div class="section-card">
            <div class="section-header">
                <i class="fas fa-heading"></i>
                <h3>Hero Section Text</h3>
            </div>

            <div class="form-group">
                <label for="hero_text">
                    <i class="fas fa-font"></i> Hero Title Text
                </label>
                <input type="text"
                       name="hero_text"
                       id="hero_text"
                       class="form-control @error('hero_text') is-invalid @enderror"
                       value="{{ old('hero_text', $aboutUs->hero_text) }}"
                       placeholder="Tentang Kami">
                <small class="form-hint">This text will be displayed on the hero section of About Us page</small>
                @error('hero_text')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Content Card Section -->
        <div class="section-card">
            <div class="section-header">
                <i class="fas fa-file-alt"></i>
                <h3>Content Card</h3>
            </div>

            <div class="form-group">
                <label for="main_title">
                    <i class="fas fa-heading"></i> Main Title
                </label>
                <input type="text"
                       name="main_title"
                       id="main_title"
                       class="form-control @error('main_title') is-invalid @enderror"
                       value="{{ old('main_title', $aboutUs->main_title) }}"
                       placeholder="KENALI KAMI LEBIH DEKAT">
                <small class="form-hint">The main heading for the about us content section</small>
                @error('main_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="intro_text">
                    <i class="fas fa-align-left"></i> Introduction Text
                </label>
                <textarea name="intro_text"
                          id="intro_text"
                          rows="8"
                          class="form-control @error('intro_text') is-invalid @enderror"
                          placeholder="Ceritakan tentang perusahaan Anda...">{{ old('intro_text', $aboutUs->intro_text) }}</textarea>
                <small class="form-hint">Tulis pengenalan atau deskripsi lengkap tentang perusahaan Anda</small>
                @error('intro_text')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Gallery Images Section -->
        <div class="section-card">
            <div class="section-header">
                <i class="fas fa-images"></i>
                <h3>Gallery Images</h3>
            </div>

            <div class="image-grid">
                <!-- Image 1 -->
                <div class="image-upload-box">
                    <label for="image_1">
                        <i class="fas fa-image"></i> Image 1
                    </label>
                    @if($aboutUs->image_1)
                        <div class="image-preview">
                            <img src="{{ $aboutUs->image_1_url }}" alt="Gallery Image 1">
                        </div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file"
                               name="image_1"
                               id="image_1"
                               class="form-control @error('image_1') is-invalid @enderror"
                               accept="image/*">
                        <small class="form-hint">Recommended: 600x400px, Max 10MB</small>
                        @error('image_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="image-upload-box">
                    <label for="image_2">
                        <i class="fas fa-image"></i> Image 2
                    </label>
                    @if($aboutUs->image_2)
                        <div class="image-preview">
                            <img src="{{ $aboutUs->image_2_url }}" alt="Gallery Image 2">
                        </div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file"
                               name="image_2"
                               id="image_2"
                               class="form-control @error('image_2') is-invalid @enderror"
                               accept="image/*">
                        <small class="form-hint">Recommended: 600x400px, Max 10MB</small>
                        @error('image_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="image-upload-box">
                    <label for="image_3">
                        <i class="fas fa-image"></i> Image 3
                    </label>
                    @if($aboutUs->image_3)
                        <div class="image-preview">
                            <img src="{{ $aboutUs->image_3_url }}" alt="Gallery Image 3">
                        </div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file"
                               name="image_3"
                               id="image_3"
                               class="form-control @error('image_3') is-invalid @enderror"
                               accept="image/*">
                        <small class="form-hint">Recommended: 600x400px, Max 10MB</small>
                        @error('image_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Image 4 -->
                <div class="image-upload-box">
                    <label for="image_4">
                        <i class="fas fa-image"></i> Image 4
                    </label>
                    @if($aboutUs->image_4)
                        <div class="image-preview">
                            <img src="{{ $aboutUs->image_4_url }}" alt="Gallery Image 4">
                        </div>
                    @endif
                    <div class="file-input-wrapper">
                        <input type="file"
                               name="image_4"
                               id="image_4"
                               class="form-control @error('image_4') is-invalid @enderror"
                               accept="image/*">
                        <small class="form-hint">Recommended: 600x400px, Max 10MB</small>
                        @error('image_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update About Us
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </form>
</div>
@endsection
