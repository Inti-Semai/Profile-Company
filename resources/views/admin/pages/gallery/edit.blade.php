@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <div>
    <h1>Edit Gambar Galeri</h1>
    <p>Perbarui detail gambar galeri</p>
    </div>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali ke Galeri
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul (Opsional)</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title', $gallery->title) }}"
                       placeholder="Masukkan judul gambar">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                @if($gallery->image)
                    <div class="current-image">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}">
                    </div>
                @endif
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                       id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Unggah gambar baru untuk mengganti gambar saat ini. Maksimal 10MB</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="imagePreview" class="image-preview" style="display: none;">
                    <img id="preview" src="" alt="Pratinjau">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Perbarui Gambar
                </button>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    .page-header {
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-header h1 {
        font-size: 28px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .page-header p {
        color: var(--text-light);
        font-size: 14px;
    }

    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-body {
        padding: 30px;
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    label {
        display: block;
        font-weight: 500;
        color: var(--text-dark);
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
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(59, 91, 24, 0.1);
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

    .form-text {
        display: block;
        margin-top: 5px;
        font-size: 13px;
    }

    .text-muted {
        color: var(--text-light);
    }

    .current-image {
        margin-bottom: 15px;
        border-radius: 10px;
        overflow: hidden;
        max-width: 400px;
        border: 2px solid #E5E7EB;
    }

    .current-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .image-preview {
        margin-top: 15px;
        border-radius: 10px;
        overflow: hidden;
        max-width: 400px;
        border: 2px solid var(--primary-green);
    }

    .image-preview img {
        width: 100%;
        height: auto;
        display: block;
    }

    .form-actions {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #E5E7EB;
        display: flex;
        gap: 15px;
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
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 91, 24, 0.3);
    }

    .btn-secondary {
        background: var(--light-green);
        color: var(--text-dark);
    }

    .btn-secondary:hover {
        background: var(--dark-green);
        color: white;
    }
@media (max-width: 1200px) {
    .card-body {
        padding: 18px;
    }
}
@media (max-width: 992px) {
    .page-header h1 {
        font-size: 20px;
    }
    .btn {
        font-size: 12px;
        padding: 8px 10px;
    }
}
@media (max-width: 768px) {
    .card-body {
        padding: 8px;
        max-width: 100vw;
    }
    .form-actions {
        flex-direction: column;
        gap: 8px;
        align-items: stretch;
    }
    .btn {
        width: 100%;
        padding: 10px 0;
    }
    .image-preview, .current-image {
        max-width: 100vw;
    }
}
@media (max-width: 480px) {
    .page-header {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
    }
    .card-body {
        padding: 2px;
    }
    .btn {
        font-size: 11px;
        padding: 8px 0;
    }
}
</style>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
