<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f5f5f1">
    <title>@yield('title', 'Biodata') — {{ $profile->name ?? 'Personal site' }}</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit($profile->about ?? 'Profil personal dan portofolio.', 155) }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @yield('content')
</body>
</html>
