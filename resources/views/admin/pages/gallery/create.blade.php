@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1>Add New Gallery Image</h1>
        <p>Upload a new image to the gallery</p>
    </div>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Gallery
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title (Optional)</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title') }}"
                       placeholder="Enter image title">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image <span class="required">*</span></label>
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                       id="image" name="image" accept="image/*" required>
                <small class="form-text text-muted">Upload an image. Max size: 10MB. Formats: JPEG, PNG, JPG, GIF</small>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="imagePreview" class="image-preview" style="display: none;">
                    <img id="preview" src="" alt="Preview">
                </div>
            </div>

            <div class="form-group">
                <label for="order">Display Order</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror"
                       id="order" name="order" value="{{ old('order', 0) }}"
                       placeholder="0">
                <small class="form-text text-muted">Lower numbers appear first</small>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Image
                </button>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
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

    .required {
        color: #EF4444;
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

    .image-preview {
        margin-top: 15px;
        border-radius: 10px;
        overflow: hidden;
        max-width: 400px;
        border: 2px solid #E5E7EB;
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
