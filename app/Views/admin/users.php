<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Manajemen User — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;}
body{background:var(--cream);font-family:'Segoe UI',sans-serif;}
.sidebar{width:220px;background:var(--navy);min-height:100vh;position:fixed;top:0;left:0;}
.sb{padding:20px;border-bottom:1px solid rgba(255,255,255,0.08);}
.brand{color:var(--gold);font-size:17px;font-weight:700;}
.sub{color:rgba(255,255,255,0.4);font-size:11px;}
.su{padding:14px 20px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.av{width:36px;height:36px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--navy);font-size:14px;}
.un{color:#fff;font-size:13px;font-weight:600;}
.ur{color:rgba(255,255,255,0.4);font-size:11px;}
.nl{color:rgba(255,255,255,0.3);font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:12px 20px 4px;}
.ni{display:flex;align-items:center;gap:10px;padding:9px 20px;color:rgba(255,255,255,0.65);font-size:13px;text-decoration:none;border-left:3px solid transparent;transition:all .15s;}
.ni:hover{background:rgba(255,255,255,0.06);color:#fff;}
.ni.active{background:rgba(201,168,76,0.12);color:var(--gold);border-left-color:var(--gold);font-weight:600;}
.ni i{font-size:15px;width:18px;}
.mc{margin-left:220px;padding:24px;}
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.sc{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:hidden;}
.sh{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;}
.sh h6{margin:0;font-size:13px;font-weight:700;}
table.t{width:100%;border-collapse:collapse;font-size:12.5px;}
table.t thead th{background:#3D5080;color:#fff;padding:9px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.t tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
table.t tbody tr:hover{background:#f5f8ff;}
.role-admin{background:#dbeafe;color:#1d4ed8;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.role-staff{background:#dcfce7;color:#166534;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.role-notaris{background:#ede9fe;color:#5b21b6;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.role-pemohon{background:#f3f4f6;color:#374151;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.btn-gd{background:var(--gold);color:var(--navy);border:none;padding:6px 14px;font-size:12px;font-weight:700;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.btn-ol{background:#fff;color:var(--navy);border:1px solid #ccc;padding:5px 10px;font-size:11px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:4px;}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sb"><div class="brand">🏛️ SIPEMA</div><div class="sub">Kantor PPAT Eliana, S.H., M.Kn</div></div>
  <div class="su">
    <div class="av"><?= strtoupper(substr(session()->get('nama'),0,2)) ?></div>
    <div><div class="un"><?= esc(session()->get('nama')) ?></div><div class="ur">Administrator</div></div>
  </div>
  <nav>
    <div class="nl">Menu Utama</div>
    <a href="/admin/dashboard" class="ni"><i class="bi bi-house-door"></i> Beranda</a>
    <a href="/admin/permohonan-masuk" class="ni"><i class="bi bi-file-earmark-arrow-down"></i> Permohonan Masuk</a>
    <a href="/admin/permohonan-selesai" class="ni"><i class="bi bi-file-earmark-check"></i> Permohonan Selesai</a>
    <a href="/admin/audit-trail" class="ni"><i class="bi bi-clock-history"></i> Audit Trail</a>
    <div class="nl">Pengaturan</div>
    <a href="/admin/users" class="ni active"><i class="bi bi-people"></i> Manajemen User</a>
    <a href="/admin/profil" class="ni"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/logout" class="ni" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);"><i class="bi bi-box-arrow-left"></i> Keluar</a>
  </nav>
</aside>
<div class="topbar"><div class="topbar-title">Manajemen User</div></div>
<div class="mc">
  <div class="sc">
    <div class="sh">
      <h6><i class="bi bi-people" style="color:var(--gold);margin-right:6px;"></i>Daftar User</h6>
      <button class="btn-gd"><i class="bi bi-plus"></i> Tambah User</button>
    </div>
    <table class="t">
      <thead><tr><th>No</th><th>Nama</th><th>Email</th><th>No. HP</th><th>Role</th><th style="text-align:center;">Aksi</th></tr></thead>
      <tbody>
        <?php if(empty($users)): ?>
        <tr><td colspan="6" style="text-align:center;padding:28px;color:#999;">Belum ada user.</td></tr>
        <?php else: ?>
        <?php foreach($users as $i => $u): ?>
        <tr>
          <td style="text-align:center;"><?= $i+1 ?></td>
          <td><?= esc($u['nama']) ?></td>
          <td><?= esc($u['email']) ?></td>
          <td><?= esc($u['no_hp'] ?? '-') ?></td>
          <td><span class="role-<?= $u['role'] ?>"><?= ucfirst($u['role']) ?></span></td>
          <td style="text-align:center;"><button class="btn-ol"><i class="bi bi-pencil"></i> Edit</button></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>