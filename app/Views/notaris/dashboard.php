<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Notaris — SIPEMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">🏛️ SIPEMA — Notaris</span>
    <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
</nav>
<div class="container mt-4">
    <div class="alert alert-warning">
        Selamat datang, <strong><?= session()->get('nama') ?></strong>! 
        Anda login sebagai <strong>Notaris</strong>.
    </div>
    <p class="text-muted">Fitur Notaris akan segera tersedia.</p>
</div>
</body>
</html>