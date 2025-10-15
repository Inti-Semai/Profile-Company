@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <div>
    <h1>Manajemen Galeri</h1>
    <p>Kelola gambar galeri untuk halaman utama</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Gambar Baru
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
                            <h4>{{ $gallery->title ?? 'Tanpa Judul' }}</h4>
                        </div>
                        <div class="gallery-actions">
                            <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" style="display: inline;"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-images"></i>
                <h3>Belum Ada Gambar</h3>
                <p>Mulai tambahkan gambar ke galeri Anda</p>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Gambar Pertama
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
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .page-header p {
        color: var(--text-light);
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
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .order-badge {
        display: inline-block;
        padding: 4px 12px;
        background: var(--light-green);
        color: var(--primary-green);
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
        background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 91, 24, 0.3);
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
        color: var(--text-light);
        margin-bottom: 10px;
    }

    .empty-state p {
        color: var(--text-light);
        margin-bottom: 25px;
    }
@media (max-width: 1200px) {
    .card-body {
        padding: 18px;
    }
    .gallery-grid {
        gap: 14px;
    }
}
@media (max-width: 992px) {
    .page-header h1 {
        font-size: 20px;
    }
    .gallery-info h4 {
        font-size: 14px;
    }
    .btn {
        font-size: 12px;
        padding: 8px 10px;
    }
}
@media (max-width: 768px) {
    .card-body {
        padding: 8px;
    }
    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    .gallery-image {
        height: 140px;
    }
    .btn {
        width: 100%;
        padding: 10px 0;
    }
    .empty-state {
        padding: 30px 4px;
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
    .gallery-image {
        height: 90px;
    }
    .btn {
        font-size: 11px;
        padding: 8px 0;
    }
}
</style>
@endsection
