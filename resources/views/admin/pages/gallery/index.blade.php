@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1>Gallery Management</h1>
        <p>Manage gallery images for the landing page</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Image
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        @if($galleries->count() > 0)
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                    <div class="gallery-card">
                        <div class="gallery-image">
                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}">
                        </div>
                        <div class="gallery-info">
                            <h4>{{ $gallery->title ?? 'Untitled' }}</h4>
                            <span class="order-badge">Order: {{ $gallery->order }}</span>
                        </div>
                        <div class="gallery-actions">
                            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" style="display: inline;" 
                                  onsubmit="return confirm('Are you sure you want to delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-images"></i>
                <h3>No Images Yet</h3>
                <p>Start adding images to your gallery</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add First Image
                </a>
            </div>
        @endif
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

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }

    .gallery-card {
        background: #F9FAFB;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s;
        border: 1px solid #E5E7EB;
    }

    .gallery-card:hover {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .gallery-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: #E5E7EB;
    }

    .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-info {
        padding: 15px;
    }

    .gallery-info h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1F2937;
        margin-bottom: 8px;
    }

    .order-badge {
        display: inline-block;
        padding: 4px 12px;
        background: #E0E7FF;
        color: #4F46E5;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .gallery-actions {
        padding: 15px;
        padding-top: 0;
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 10px 20px;
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
        background: linear-gradient(135deg, #4F46E5, #7C3AED);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
    }

    .btn-sm {
        padding: 8px 14px;
        font-size: 13px;
        flex: 1;
    }

    .btn-warning {
        background: #FBBF24;
        color: #78350F;
    }

    .btn-warning:hover {
        background: #F59E0B;
    }

    .btn-danger {
        background: #EF4444;
        color: white;
    }

    .btn-danger:hover {
        background: #DC2626;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 64px;
        color: #D1D5DB;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 20px;
        font-weight: 600;
        color: #6B7280;
        margin-bottom: 10px;
    }

    .empty-state p {
        color: #9CA3AF;
        margin-bottom: 25px;
    }
</style>
@endsection
