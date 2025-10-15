@extends('admin.layouts.app')

@section('title', 'Profil Saya')

@section('content')
<style>
    .profile-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        max-width: 480px;
        margin: 40px auto 0 auto;
        padding: 40px 36px 32px 36px;
        position: relative;
    }
    .profile-header {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 28px;
    }
    .profile-header .profile-icon {
        background: linear-gradient(135deg, #3B5B18, #A6B37D);
        color: #fff;
        border-radius: 50%;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        box-shadow: 0 2px 8px rgba(59,91,24,0.10);
    }
    .profile-header .profile-title {
        font-size: 1.6rem;
        font-weight: 700;
        color: #31460B;
        margin-bottom: 2px;
    }
    .profile-header .profile-desc {
        font-size: 1rem;
        color: #6B7280;
    }
    .profile-form .form-group {
        margin-bottom: 22px;
    }
    .profile-form label {
        font-weight: 600;
        color: #3B5B18;
        margin-bottom: 8px;
        display: block;
    }
    .profile-form input {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 13px 16px;
        font-size: 1rem;
        width: 100%;
        transition: border-color 0.3s;
        background: #f8f9fa;
    }
    .profile-form input:focus {
        border-color: #3B5B18;
        background: #fff;
        outline: none;
    }
    .profile-form .invalid-feedback {
        color: #dc3545;
        font-size: 0.92rem;
        margin-top: 6px;
    }
    .profile-form button {
        background: #3B5B18;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 13px 32px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        margin-top: 10px;
        box-shadow: 0 2px 8px rgba(59,91,24,0.10);
    }
    .profile-form button:hover {
        background: #2d4612;
        transform: translateY(-2px);
    }
    .alert-success {
        background: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
        border-radius: 8px;
        padding: 14px 18px;
        margin-bottom: 18px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    @media (max-width: 600px) {
        .profile-card {
            max-width: 100%;
            margin: 20px 6px 0 6px;
            padding: 18px 6px 16px 6px;
        }
        .profile-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        .profile-header .profile-icon {
            width: 48px;
            height: 48px;
            font-size: 1.3rem;
        }
        .profile-header .profile-title {
            font-size: 1.1rem;
        }
        .profile-header .profile-desc {
            font-size: 0.95rem;
        }
        .profile-form label {
            font-size: 0.98rem;
        }
        .profile-form input {
            padding: 10px 10px;
            font-size: 0.98rem;
        }
        .profile-form button {
            width: 100%;
            padding: 12px 0;
            font-size: 1rem;
        }
    }
</style>

<div class="profile-card">
    <div class="profile-header">
        <div class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <div>
            <div class="profile-title">Profil Saya</div>
            <div class="profile-desc">Kelola data akun admin Anda dengan aman.</div>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.profile.update') }}" method="POST" class="profile-form">
        @csrf
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name', $admin->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="@error('username') is-invalid @enderror" value="{{ old('username', $admin->username) }}" required>
            @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror" value="{{ old('email', $admin->email) }}" required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="password">Password Baru <small>(Opsional)</small></label>
            <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
@endsection
