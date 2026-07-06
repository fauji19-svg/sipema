<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pemohon — SIPEMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-primary px-4">
    <span class="navbar-brand">🏛️ SIPEMA — Pemohon</span>
    <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
</nav>
<div class="container mt-4">
    <div class="alert alert-primary">
        Selamat datang, <strong><?= session()->get('nama') ?></strong>! 
        Anda login sebagai <strong>Pemohon</strong>.
    </div>
    <p class="text-muted">Fitur Pemohon akan segera tersedia.</p>
</div>
</body>
</html>