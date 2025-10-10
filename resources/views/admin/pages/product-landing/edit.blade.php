@extends('admin.layouts.app')

@section('content')
<style>
    .product-landing-card {
        background: #A6B37D;
        border-radius: 18px;
        box-shadow: 0 2px 16px rgba(49,70,11,0.08);
        border: 2.5px solid #31460B;
        max-width: 520px;
        margin: 40px auto 0 auto;
        padding: 36px 32px 32px 32px;
    }
    .product-landing-card h2 {
        color: #31460B;
        font-weight: 700;
        margin-bottom: 28px;
        text-align: center;
    }
    .product-landing-label {
        color: #31460B;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 1.08rem;
    }
    .product-landing-input {
        border-radius: 10px;
        border: 2px solid #31460B;
        background: #F6FBEA;
        color: #31460B;
        font-size: 1.08rem;
        padding: 12px 18px;
        margin-bottom: 8px;
        font-weight: 500;
        box-shadow: none;
        transition: border-color 0.2s;
    }
    .product-landing-input:focus {
        border-color: #3B5B18;
        outline: none;
        background: #fff;
    }
    .product-landing-btn {
        background: #31460B;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 12px 36px;
        font-size: 1.1rem;
        font-weight: 700;
        margin-top: 18px;
        transition: background 0.2s;
    }
    .product-landing-btn:hover {
        background: #3B5B18;
    }
    .product-landing-success {
        background: #e6f7e6;
        color: #31460B;
        border: 1.5px solid #A6B37D;
        border-radius: 8px;
        padding: 10px 18px;
        margin-bottom: 18px;
        text-align: center;
        font-weight: 600;
    }
</style>
<div class="product-landing-card">
    <h2>Edit Product Landing</h2>
    @if(session('success'))
        <div class="product-landing-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.product-landing.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hero_subtitle_top" class="product-landing-label">Hero Subtitle Top</label>
            <input type="text" class="product-landing-input @error('hero_subtitle_top') is-invalid @enderror" id="hero_subtitle_top" name="hero_subtitle_top" value="{{ old('hero_subtitle_top', $landing->hero_subtitle_top ?? '') }}">
            @error('hero_subtitle_top')
                <div class="invalid-feedback" style="color:#b94a48;">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hero_subtitle_bottom" class="product-landing-label">Hero Subtitle Bottom</label>
            <input type="text" class="product-landing-input @error('hero_subtitle_bottom') is-invalid @enderror" id="hero_subtitle_bottom" name="hero_subtitle_bottom" value="{{ old('hero_subtitle_bottom', $landing->hero_subtitle_bottom ?? '') }}">
            @error('hero_subtitle_bottom')
                <div class="invalid-feedback" style="color:#b94a48;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="product-landing-btn">Simpan</button>
    </form>
</div>
@endsection
