@extends('layouts.app')

@section('title', 'Masuk Admin')

@section('content')
<main class="admin-auth-page">
    <a class="brand auth-brand" href="{{ route('profile.show') }}">
        <span class="brand-mark">B</span>
        <span class="brand-copy"><strong>Ruang Admin</strong><small>PERSONAL SPACE</small></span>
    </a>
    <div class="auth-layout">
        <section class="auth-copy">
            <p class="eyebrow"><span class="eyebrow-dot"></span> AREA TERBATAS</p>
            <h1>Selamat datang<br><span>kembali.</span></h1>
            <p>Masuk untuk mengatur cerita dan informasi yang tampil di halaman biodata.</p>
            <a class="text-link" href="{{ route('profile.show') }}">← Kembali ke halaman publik</a>
        </section>
        <section class="auth-card">
            <div class="auth-card-icon">✳</div>
            <p class="eyebrow">AKSES ADMIN</p>
            <h2>Masuk ke dashboard</h2>
            <p class="form-intro">Gunakan akun admin untuk melanjutkan.</p>
            @if ($errors->any())
                <div class="form-alert" role="alert">{{ $errors->first() }}</div>
            @endif
            <form method="POST" action="{{ route('admin.login.store') }}" class="admin-form">
                @csrf
                <label class="form-field">
                    <span>Alamat email</span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="username" required autofocus>
                    @error('email')<small class="field-error">{{ $message }}</small>@enderror
                </label>
                <label class="form-field">
                    <span>Kata sandi</span>
                    <input type="password" name="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required>
                    @error('password')<small class="field-error">{{ $message }}</small>@enderror
                </label>
                <label class="remember-field"><input type="checkbox" name="remember" value="1"><span>Ingat saya</span></label>
                <button class="button button-dark button-full" type="submit">Masuk dashboard <span>↗</span></button>
            </form>
            <p class="auth-footnote"><span>⌑</span> Halaman ini hanya bisa diakses oleh admin.</p>
        </section>
    </div>
</main>
@endsection
