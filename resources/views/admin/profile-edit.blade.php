@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="dashboard">
    <aside class="dashboard-sidebar">
        <a class="brand dashboard-brand" href="{{ route('profile.show') }}">
            <span class="brand-mark">{{ $profile->initials() }}</span>
            <span class="brand-copy"><strong>Ruang Admin</strong><small>PERSONAL SPACE</small></span>
        </a>
        <div class="sidebar-label">MENU UTAMA</div>
        <a class="sidebar-item sidebar-item-active" href="{{ route('admin.profile.edit') }}"><span>✳</span> Biodata</a>
        <a class="sidebar-item" href="{{ route('profile.show') }}"><span>↗</span> Lihat halaman publik</a>
        <div class="sidebar-bottom">
            <div class="sidebar-user"><span class="sidebar-avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>ADMIN</small></span></div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="logout-button" type="submit">Keluar <span>↗</span></button>
            </form>
        </div>
    </aside>

    <main class="dashboard-main">
        <header class="dashboard-header">
            <div><p class="eyebrow">PENGELOLAAN KONTEN</p><h1>Biodata <span>dan cerita.</span></h1></div>
            <a class="preview-button" href="{{ route('profile.show') }}" target="_blank">Pratinjau halaman <span>↗</span></a>
        </header>

        @if (session('status'))
            <div class="success-alert" role="status"><span>✓</span> {{ session('status') }}</div>
        @endif

        <div class="editor-layout">
            <form class="editor-form" method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('PUT')
                <section class="editor-card">
                    <div class="editor-card-heading"><span class="editor-step">01</span><div><h2>Identitas</h2><p>Informasi utama yang tampil di bagian pembuka.</p></div></div>
                    <div class="form-grid">
                        <label class="form-field"><span>Nama lengkap</span><input name="name" value="{{ old('name', $profile->name) }}" maxlength="100" required>@error('name')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>Profesi / headline</span><input name="title" value="{{ old('title', $profile->title) }}" maxlength="180" required>@error('title')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>Lokasi</span><input name="location" value="{{ old('location', $profile->location) }}" maxlength="120" required>@error('location')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>Email publik</span><input type="email" name="email" value="{{ old('email', $profile->email) }}" required>@error('email')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>Nomor telepon <small>OPSIONAL</small></span><input name="phone" value="{{ old('phone', $profile->phone) }}" maxlength="40" placeholder="+62 812 3456 7890">@error('phone')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>Foto profil <small>URL GAMBAR</small></span><input type="url" name="avatar_url" value="{{ old('avatar_url', $profile->avatar_url) }}" placeholder="https://...">@error('avatar_url')<small class="field-error">{{ $message }}</small>@enderror</label>
                    </div>
                    <label class="form-field"><span>Tentang saya</span><textarea name="about" rows="4" maxlength="5000" required>{{ old('about', $profile->about) }}</textarea>@error('about')<small class="field-error">{{ $message }}</small>@enderror</label>
                </section>

                <section class="editor-card">
                    <div class="editor-card-heading"><span class="editor-step">02</span><div><h2>Keahlian</h2><p>Pisahkan setiap keahlian dengan tanda koma.</p></div></div>
                    <label class="form-field"><span>Daftar keahlian</span><input name="skills" value="{{ old('skills', $profile->skills) }}" maxlength="1000" required placeholder="Desain, Menulis, Komunikasi">@error('skills')<small class="field-error">{{ $message }}</small>@enderror</label>
                </section>

                <section class="editor-card">
                    <div class="editor-card-heading"><span class="editor-step">03</span><div><h2>Perjalanan</h2><p>Tulis pengalaman dan pendidikan. Baris baru akan dipertahankan.</p></div></div>
                    <label class="form-field"><span>Pengalaman</span><textarea name="experience" rows="6" maxlength="5000" required>{{ old('experience', $profile->experience) }}</textarea>@error('experience')<small class="field-error">{{ $message }}</small>@enderror</label>
                    <label class="form-field"><span>Pendidikan</span><textarea name="education" rows="4" maxlength="5000" required>{{ old('education', $profile->education) }}</textarea>@error('education')<small class="field-error">{{ $message }}</small>@enderror</label>
                </section>

                <section class="editor-card">
                    <div class="editor-card-heading"><span class="editor-step">04</span><div><h2>Tautan</h2><p>Bagikan situs dan akun sosial yang ingin ditampilkan.</p></div></div>
                    <div class="form-grid">
                        <label class="form-field"><span>Situs web</span><input type="url" name="website" value="{{ old('website', $profile->website) }}" placeholder="https://...">@error('website')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>GitHub</span><input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" placeholder="https://github.com/...">@error('github_url')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>LinkedIn</span><input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" placeholder="https://linkedin.com/in/...">@error('linkedin_url')<small class="field-error">{{ $message }}</small>@enderror</label>
                        <label class="form-field"><span>Instagram</span><input type="url" name="instagram_url" value="{{ old('instagram_url', $profile->instagram_url) }}" placeholder="https://instagram.com/...">@error('instagram_url')<small class="field-error">{{ $message }}</small>@enderror</label>
                    </div>
                </section>

                <div class="editor-actions"><span>Perubahan langsung tampil di halaman publik.</span><button class="button button-dark" type="submit">Simpan perubahan <span>↗</span></button></div>
            </form>
            <aside class="editor-aside">
                <div class="aside-card">
                    <p class="eyebrow">STATUS HALAMAN</p>
                    <div class="status-live"><span></span> Tayang dan dapat dilihat</div>
                    <p>Profil ini ditampilkan kepada siapa saja yang membuka halaman utama.</p>
                    <a href="{{ route('profile.show') }}" target="_blank">Buka halaman publik ↗</a>
                </div>
                <div class="aside-tip"><span>✳</span><div><strong>Tip kecil</strong><p>Gunakan foto dengan pencahayaan baik dan deskripsi yang terasa seperti dirimu sendiri.</p></div></div>
            </aside>
        </div>
    </main>
</div>
@endsection
