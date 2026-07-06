<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin — SIPEMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">🏛️ SIPEMA — Admin</span>
    <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
</nav>
<div class="container mt-4">
    <div class="alert alert-success">
        Selamat datang, <strong><?= session()->get('nama') ?></strong>! 
        Anda login sebagai <strong>Admin</strong>.
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Permohonan Masuk</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Sedang Diproses</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Perlu Revisi</h5>
                    <h2>0</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>