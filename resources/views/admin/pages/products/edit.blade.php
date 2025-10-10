@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
@include('admin.pages.products._form', ['mode' => 'edit', 'product' => $product])
@endsection
