@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <h1>Company Settings</h1>
    <p>Manage your company information and images</p>
</div>

@if(session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.company-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-section">
                <h3><i class="fas fa-building"></i> Company Information</h3>

                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                           id="company_name" name="company_name"
                           value="{{ old('company_name', $setting->company_name ?? 'PT. INTI SEMAI KALANDRA') }}" required>
                    @error('company_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                               id="phone" name="phone"
                               value="{{ old('phone', $setting->phone ?? '') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email"
                               value="{{ old('email', $setting->email ?? '') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror"
                              id="address" name="address" rows="3">{{ old('address', $setting->address ?? '') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-section">
                <h3><i class="fas fa-image"></i> Hero Section</h3>

                <div class="form-group">
                    <label for="hero_title">Hero Title</label>
                    <input type="text" class="form-control @error('hero_title') is-invalid @enderror"
                           id="hero_title" name="hero_title"
                           value="{{ old('hero_title', $setting->hero_title ?? '') }}">
                    @error('hero_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hero_subtitle">Hero Subtitle</label>
                    <input type="text" class="form-control @error('hero_subtitle') is-invalid @enderror"
                           id="hero_subtitle" name="hero_subtitle"
                           value="{{ old('hero_subtitle', $setting->hero_subtitle ?? '') }}">
                    @error('hero_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="hero_image">Hero Background Image</label>
                    @if($setting && $setting->hero_image)
                        <div class="current-image">
                            <img src="{{ $setting->hero_image_url }}" alt="Hero Image">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('hero_image') is-invalid @enderror"
                           id="hero_image" name="hero_image" accept="image/*">
                    <small class="form-text text-muted">Upload a new image to replace the current one. Max size: 2MB</small>
                    @error('hero_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-section">
                <h3><i class="fas fa-eye"></i> Vision Section</h3>

                <div class="form-group">
                    <label for="vision_text">Vision Text</label>
                    <textarea class="form-control @error('vision_text') is-invalid @enderror"
                              id="vision_text" name="vision_text" rows="4">{{ old('vision_text', $setting->vision_text ?? '') }}</textarea>
                    @error('vision_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vision_image">Vision Image</label>
                    @if($setting && $setting->vision_image)
                        <div class="current-image">
                            <img src="{{ $setting->vision_image_url }}" alt="Vision Image">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('vision_image') is-invalid @enderror"
                           id="vision_image" name="vision_image" accept="image/*">
                    <small class="form-text text-muted">Upload a new image to replace the current one. Max size: 2MB</small>
                    @error('vision_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-section">
                <h3><i class="fas fa-bullseye"></i> Mission Section</h3>

                <div class="form-group">
                    <label for="mission_text">Mission Text</label>
                    <textarea class="form-control @error('mission_text') is-invalid @enderror"
                              id="mission_text" name="mission_text" rows="4">{{ old('mission_text', $setting->mission_text ?? '') }}</textarea>
                    @error('mission_text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mission_image">Mission Image</label>
                    @if($setting && $setting->mission_image)
                        <div class="current-image">
                            <img src="{{ $setting->mission_image_url }}" alt="Mission Image">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('mission_image') is-invalid @enderror"
                           id="mission_image" name="mission_image" accept="image/*">
                    <small class="form-text text-muted">Upload a new image to replace the current one. Max size: 2MB</small>
                    @error('mission_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Footer Settings Section -->
            <div class="section-header">
                <h2>Footer Settings</h2>
            </div>

            <div class="form-group">
                <label for="maps_embed_url">
                    <i class="fas fa-map-marked-alt"></i> Google Maps Embed URL
                </label>
                <textarea name="maps_embed_url" id="maps_embed_url" rows="3" class="form-control @error('maps_embed_url') is-invalid @enderror" placeholder="<iframe src='https://www.google.com/maps/embed...'></iframe>">{{ old('maps_embed_url', $setting->maps_embed_url) }}</textarea>
                <small class="form-text">Paste the complete iframe embed code from Google Maps</small>
                @error('maps_embed_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="section-header">
                <h2>Social Media Links</h2>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="facebook_url">
                        <i class="fab fa-facebook"></i> Facebook URL
                    </label>
                    <input type="url" name="facebook_url" id="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url', $setting->facebook_url) }}" placeholder="https://facebook.com/yourpage">
                    @error('facebook_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="twitter_url">
                        <i class="fab fa-twitter"></i> Twitter URL
                    </label>
                    <input type="url" name="twitter_url" id="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url', $setting->twitter_url) }}" placeholder="https://twitter.com/yourprofile">
                    @error('twitter_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="instagram_url">
                        <i class="fab fa-instagram"></i> Instagram URL
                    </label>
                    <input type="url" name="instagram_url" id="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url', $setting->instagram_url) }}" placeholder="https://instagram.com/yourprofile">
                    @error('instagram_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="youtube_url">
                        <i class="fab fa-youtube"></i> YouTube URL
                    </label>
                    <input type="url" name="youtube_url" id="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror" value="{{ old('youtube_url', $setting->youtube_url) }}" placeholder="https://youtube.com/yourchannel">
                    @error('youtube_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="telegram_url">
                        <i class="fab fa-telegram"></i> Telegram URL
                    </label>
                    <input type="url" name="telegram_url" id="telegram_url" class="form-control @error('telegram_url') is-invalid @enderror" value="{{ old('telegram_url', $setting->telegram_url) }}" placeholder="https://t.me/yourgroup">
                    @error('telegram_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tiktok_url">
                        <i class="fab fa-tiktok"></i> TikTok URL
                    </label>
                    <input type="url" name="tiktok_url" id="tiktok_url" class="form-control @error('tiktok_url') is-invalid @enderror" value="{{ old('tiktok_url', $setting->tiktok_url) }}" placeholder="https://tiktok.com/@yourprofile">
                    @error('tiktok_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .page-header {
        margin-bottom: 30px;
    }

    .page-header h1 {
        font-size: 28px;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 5px;
    }

    .page-header p {
        color: #6B7280;
        font-size: 14px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-success {
        background: #D1FAE5;
        color: #065F46;
        border: 1px solid #A7F3D0;
    }

    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-body {
        padding: 30px;
    }

    .form-section {
        margin-bottom: 35px;
        padding-bottom: 35px;
        border-bottom: 1px solid #E5E7EB;
    }

    .form-section:last-of-type {
        border-bottom: none;
    }

    .form-section h3 {
        font-size: 18px;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section h3 i {
        color: #4F46E5;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: 500;
        color: #374151;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #D1D5DB;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #4F46E5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-control.is-invalid {
        border-color: #EF4444;
    }

    .invalid-feedback {
        color: #EF4444;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    textarea.form-control {
        resize: vertical;
        font-family: inherit;
    }

    .current-image {
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
        max-width: 400px;
    }

    .current-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .form-text {
        display: block;
        margin-top: 5px;
        font-size: 13px;
    }

    .text-muted {
        color: #6B7280;
    }

    .form-actions {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #E5E7EB;
    }

    .btn {
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 14px;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4F46E5, #7C3AED);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
    }
</style>
@endsection
