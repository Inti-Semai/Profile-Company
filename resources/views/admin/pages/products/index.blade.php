@extends('admin.layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<style>
    .product-table-container { max-width: 1200px; margin: 0 auto; padding: 20px; }
    .product-table-card { background: #fff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: none; margin-bottom: 32px; overflow: hidden; }
    .product-table-header { background: #3B5B18; color: #fff; padding: 32px 40px; border-bottom: none; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .product-table-header h1 { font-size: 1.85rem; font-weight: 700; margin: 0; color: #fff; letter-spacing: 0.3px; }
    .product-table-body { padding: 32px 40px; background: #f8f9fa; }
    .table { width: 100%; border-collapse: collapse; background: #fff; }
    .table th, .table td { padding: 14px 18px; border-bottom: 1px solid #e0e0e0; text-align: left; }
    .table th { background: #f3f3f3; font-weight: 700; color: #3B5B18; }
    .table tr:last-child td { border-bottom: none; }
    .btn { border: none; border-radius: 10px; padding: 10px 24px; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 10px; text-decoration: none; }
    .btn-primary { background: #3B5B18; color: #fff; }
    .btn-primary:hover { background: #2d4612; }
    .btn-secondary { background: #6c757d; color: #fff; }
    .btn-secondary:hover { background: #5a6268; }
    .btn-edit { background: #FB8B23; color: #fff; }
    .btn-edit:hover { background: #d97706; }
    .product-image-thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #e0e0e0; }
    @media (max-width: 992px) {
        .product-table-header { padding: 18px 10px; }
        .product-table-header h1 { font-size: 1.1rem; }
        .product-table-body { padding: 18px 10px; }
        .btn { font-size: 12px; padding: 8px 10px; }
        .table th, .table td { padding: 10px 8px; }
    }
    @media (max-width: 768px) {
        .product-table-container { padding: 4px; }
        .product-table-header { flex-direction: column; align-items: flex-start; gap: 8px; }
        .product-table-body { padding: 8px 2px; }
        .btn { width: 100%; padding: 10px 0; }
        .table th, .table td { font-size: 12px; padding: 7px 4px; }
        .product-image-thumb { width: 40px; height: 40px; }
    }
    @media (max-width: 480px) {
        .product-table-header { padding: 8px 2px; }
        .product-table-header h1 { font-size: 1rem; }
        .btn { font-size: 11px; padding: 8px 0; }
        .product-image-thumb { width: 28px; height: 28px; }
    }
</style>
<div class="product-table-container">
    <div class="product-table-card">
        <div class="product-table-header">
            <h1>Daftar Produk</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
        </div>
        <div class="product-table-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Nama Produk</th>
                        <th>Spesifikasi</th>
                        <th>Shopee</th>
                        <th>Tokopedia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="product-image-thumb" alt="cover">
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td style="max-width:220px;white-space:pre-line;">{{ $product->specification }}</td>
                            <td>
                                @if($product->shopee_url)
                                    <a href="{{ $product->shopee_url }}" target="_blank" class="btn btn-secondary">Shopee</a>
                                @else - @endif
                            </td>
                            <td>
                                @if($product->tokopedia_url)
                                    <a href="{{ $product->tokopedia_url }}" target="_blank" class="btn btn-secondary">Tokopedia</a>
                                @else - @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" style="text-align:center;">Belum ada produk.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
