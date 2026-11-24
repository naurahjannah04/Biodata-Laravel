@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<header class="site-header" id="top">
    <a class="brand" href="{{ route('profile.show') }}" aria-label="Kembali ke beranda">
        <span class="brand-mark">{{ $profile->initials() }}</span>
        <span class="brand-copy"><strong>{{ $profile->name }}</strong><small>PERSONAL SPACE</small></span>
    </a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="Buka navigasi">
        <span></span><span></span>
    </button>
    <nav class="site-nav" id="primary-navigation">
        <a href="#tentang">Tentang</a>
        <a href="#perjalanan">Perjalanan</a>
        <a href="#keahlian">Keahlian</a>
        <a class="nav-contact" href="mailto:{{ $profile->email }}">Hubungi saya <span>↗</span></a>
        <a class="admin-link" href="{{ route('admin.login') }}">Admin</a>
    </nav>
</header>

<main>
    <section class="hero page-shell">
        <div class="hero-copy">
            <p class="eyebrow"><span class="eyebrow-dot"></span> HALO, SAYA</p>
            <h1>{{ $profile->name }}<span class="hero-period">.</span></h1>
            <p class="hero-title">{{ $profile->title }}</p>
            <p class="hero-intro">Menciptakan hal-hal digital yang terasa <em>berbeda</em> — berangkat dari ide, tumbuh lewat rasa ingin tahu.</p>
            <div class="hero-actions">
                <a class="button button-dark" href="mailto:{{ $profile->email }}">Mari ngobrol <span>↗</span></a>
                <a class="text-link" href="#tentang">Kenali lebih dekat <span>↓</span></a>
            </div>
            <div class="hero-location"><span class="pin-icon">⌖</span> {{ $profile->location }} <span class="location-line"></span> TERBUKA UNTUK KOLABORASI</div>
        </div>

        <div class="hero-visual">
            <div class="visual-orbit orbit-one"></div>
            <div class="visual-orbit orbit-two"></div>
            <div class="portrait-card">
                <div class="portrait-topline"><span>PROFIL / 01</span><span>✳</span></div>
                @if ($profile->avatar_url)
                    <img class="portrait-image" src="{{ $profile->avatar_url }}" alt="Foto {{ $profile->name }}">
                @else
                    <div class="portrait-placeholder" aria-label="Inisial {{ $profile->initials() }}">
                        <span>{{ $profile->initials() }}</span>
                        <i class="portrait-spark spark-one">✳</i>
                        <i class="portrait-spark spark-two">✳</i>
                    </div>
                @endif
                <div class="portrait-caption">
                    <div><small>BERKENALAN DENGAN</small><strong>{{ $profile->name }}</strong></div>
                    <span class="portrait-arrow">↗</span>
                </div>
            </div>
            <div class="floating-note"><span class="note-icon">✳</span><span>Curious by nature,<br>creative by choice.</span></div>
            <span class="visual-index">01 <span>/</span> 04</span>
        </div>
    </section>

    <section class="intro-strip">
        <div class="page-shell strip-inner">
            <span>BERPIKIR KREATIF</span><i>✳</i><span>MEMBANGUN DENGAN TUJUAN</span><i>✳</i><span>TERUS BERTUMBUH</span>
        </div>
    </section>

    <section class="content-section page-shell" id="tentang">
        <div class="section-heading">
            <p class="eyebrow">01 / TENTANG SAYA</p>
            <h2>Senang bertemu<br><span>di ruang digital.</span></h2>
        </div>
        <div class="about-content">
            <p class="about-text">{{ $profile->about }}</p>
            <div class="about-details">
                @if ($profile->website)
                    <a href="{{ $profile->website }}" target="_blank" rel="noopener noreferrer"><span>SITUS WEB</span><strong>{{ parse_url($profile->website, PHP_URL_HOST) ?: $profile->website }} ↗</strong></a>
                @endif
                @if ($profile->phone)
                    <div><span>TELEPON</span><strong>{{ $profile->phone }}</strong></div>
                @endif
                <div><span>EMAIL</span><a href="mailto:{{ $profile->email }}"><strong>{{ $profile->email }} ↗</strong></a></div>
            </div>
        </div>
    </section>

    <section class="journey-section" id="perjalanan">
        <div class="page-shell journey-grid">
            <div class="section-heading">
                <p class="eyebrow">02 / PERJALANAN</p>
                <h2>Hal-hal yang<br><span>membentuk saya.</span></h2>
                <p class="section-note">Setiap langkah membawa perspektif baru. Inilah beberapa bab dari perjalanan saya sejauh ini.</p>
            </div>
            <div class="journey-cards">
                <article class="journey-card">
                    <div class="journey-card-head"><span class="journey-number">A</span><span class="journey-label">PENGALAMAN</span></div>
                    <p class="multiline-copy">{{ $profile->experience }}</p>
                </article>
                <article class="journey-card journey-card-alt">
                    <div class="journey-card-head"><span class="journey-number">B</span><span class="journey-label">PENDIDIKAN</span></div>
                    <p class="multiline-copy">{{ $profile->education }}</p>
                </article>
            </div>
        </div>
    </section>

    <section class="skills-section page-shell" id="keahlian">
        <div class="skills-top">
            <div class="section-heading">
                <p class="eyebrow">03 / YANG SAYA KERJAKAN</p>
                <h2>Rasa ingin tahu,<br><span>dengan arah.</span></h2>
            </div>
            <p class="section-note">Keahlian terus berkembang. Ini beberapa hal yang paling sering saya bawa ke meja kerja.</p>
        </div>
        <div class="skill-list">
            @foreach ($profile->skillsList() as $index => $skill)
                <div class="skill-item"><span class="skill-index">0{{ $index + 1 }}</span><span class="skill-name">{{ $skill }}</span><span class="skill-arrow">↗</span></div>
            @endforeach
        </div>
    </section>

    <section class="contact-section page-shell" id="kontak">
        <div class="contact-card">
            <div>
                <p class="eyebrow">04 / BERIKUTNYA</p>
                <h2>Punya ide menarik?<br><span>Yuk, wujudkan.</span></h2>
                <a class="button button-light" href="mailto:{{ $profile->email }}">Kirim pesan <span>↗</span></a>
            </div>
            <div class="contact-side">
                <span class="contact-star">✳</span>
                <p>Satu percakapan kecil bisa jadi awal dari sesuatu yang luar biasa.</p>
                <div class="social-links">
                    @if ($profile->github_url)<a href="{{ $profile->github_url }}" target="_blank" rel="noopener noreferrer">GitHub ↗</a>@endif
                    @if ($profile->linkedin_url)<a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener noreferrer">LinkedIn ↗</a>@endif
                    @if ($profile->instagram_url)<a href="{{ $profile->instagram_url }}" target="_blank" rel="noopener noreferrer">Instagram ↗</a>@endif
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer page-shell">
    <span>© {{ now()->year }} {{ $profile->name }}</span>
    <span>DIBUAT DENGAN RASA INGIN TAHU <i>✳</i></span>
    <a href="#top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' }); return false;">KEMBALI KE ATAS ↑</a>
</footer>
@endsection
