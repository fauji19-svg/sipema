<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Notifikasi — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;}
body{background:var(--cream);font-family:'Segoe UI',sans-serif;}
.sidebar{width:220px;background:var(--navy);min-height:100vh;position:fixed;top:0;left:0;}
.sidebar-brand{padding:20px;border-bottom:1px solid rgba(255,255,255,0.08);}
.sidebar-brand .brand{color:var(--gold);font-size:18px;font-weight:700;}
.sidebar-brand .sub{color:rgba(255,255,255,0.4);font-size:11px;}
.sidebar-user{padding:14px 20px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.avatar{width:36px;height:36px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--navy);font-size:14px;}
.user-name{color:#fff;font-size:13px;font-weight:600;}
.user-role{color:rgba(255,255,255,0.4);font-size:11px;}
.nav-label{color:rgba(255,255,255,0.3);font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:12px 20px 4px;}
.nav-link-item{display:flex;align-items:center;gap:10px;padding:9px 20px;color:rgba(255,255,255,0.65);font-size:13px;text-decoration:none;border-left:3px solid transparent;transition:all .15s;}
.nav-link-item:hover{background:rgba(255,255,255,0.06);color:#fff;}
.nav-link-item.active{background:rgba(201,168,76,0.12);color:var(--gold);border-left-color:var(--gold);font-weight:600;}
.nav-link-item i{font-size:15px;width:18px;}
.main-content{margin-left:220px;padding:24px;}
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.section-card{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:hidden;margin-bottom:16px;}
.section-header{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;}
.section-header h6{margin:0;font-size:13px;font-weight:700;}
.notif-item{display:flex;gap:12px;padding:14px 16px;border-bottom:1px solid #eee;align-items:flex-start;}
.notif-item:last-child{border-bottom:none;}
.notif-item.unread{background:#fffbf0;border-left:3px solid var(--gold);}
.notif-icon{width:36px;height:36px;border-radius:4px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0;}
.notif-icon.info{background:#dbeafe;color:#1d4ed8;}
.notif-icon.warn{background:#fef3c7;color:#92400e;}
.notif-icon.success{background:#d1fae5;color:#065f46;}
.notif-title{font-size:13px;font-weight:700;color:var(--navy);margin-bottom:3px;}
.notif-body{font-size:12px;color:#666;line-height:1.5;}
.notif-time{font-size:11px;color:#999;white-space:nowrap;margin-left:auto;}
.kode-banner{background:var(--navy);border-radius:4px;padding:14px 20px;margin-bottom:16px;display:flex;align-items:center;justify-content:space-between;}
.kode-big{font-family:monospace;font-size:24px;font-weight:900;color:var(--gold);letter-spacing:4px;}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand">🏛️ SIPEMA</div>
    <div class="sub">Kantor PPAT Eliana, S.H., M.Kn</div>
  </div>
  <div class="sidebar-user">
    <div class="avatar"><?= strtoupper(substr(session()->get('nama'), 0, 2)) ?></div>
    <div>
      <div class="user-name"><?= esc(session()->get('nama')) ?></div>
      <div class="user-role">Pemohon</div>
    </div>
  </div>
  <nav>
    <div class="nav-label">Menu Utama</div>
    <a href="/pemohon/dashboard" class="nav-link-item"><i class="bi bi-house-door"></i> Beranda</a>
    <a href="/pemohon/dashboard" class="nav-link-item"><i class="bi bi-file-earmark-plus"></i> Ajukan Permohonan</a>
    <a href="/pemohon/riwayat" class="nav-link-item"><i class="bi bi-clock-history"></i> Riwayat Permohonan</a>
    <div class="nav-label">Informasi</div>
    <a href="/pemohon/notifikasi" class="nav-link-item active"><i class="bi bi-bell"></i> Notifikasi</a>
    <a href="/pemohon/profil" class="nav-link-item"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/pemohon/panduan" class="nav-link-item"><i class="bi bi-question-circle"></i> Panduan</a>
    <a href="/logout" class="nav-link-item" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);">
      <i class="bi bi-box-arrow-left"></i> Keluar
    </a>
  </nav>
</aside>
<div class="topbar"><div class="topbar-title">Notifikasi</div></div>
<div class="main-content">

  <?php if (!empty($notifikasi)): ?>
  <div class="kode-banner">
    <div>
      <div style="font-size:11px;color:rgba(255,255,255,0.5);text-transform:uppercase;letter-spacing:0.8px;margin-bottom:4px;">Kode Unik Permohonan Terakhir</div>
      <div class="kode-big"><?= esc($notifikasi[0]['permohonan_id'] ?? '—') ?></div>
    </div>
    <div style="font-size:11px;color:rgba(255,255,255,0.5);">Gunakan kode ini untuk lacak berkas</div>
  </div>
  <?php endif; ?>

  <div class="section-card">
    <div class="section-header">
      <h6>Daftar Notifikasi</h6>
      <span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($notifikasi) ?> notifikasi</span>
    </div>
    <?php if (empty($notifikasi)): ?>
    <div style="text-align:center;padding:40px;color:#999;">
      <i class="bi bi-bell-slash" style="font-size:36px;display:block;margin-bottom:10px;"></i>
      Belum ada notifikasi.
    </div>
    <?php else: ?>
    <?php foreach ($notifikasi as $n): ?>
    <div class="notif-item <?= !$n['dibaca'] ? 'unread' : '' ?>">
      <div class="notif-icon info"><i class="bi bi-bell"></i></div>
      <div style="flex:1;">
        <div class="notif-title"><?= esc($n['pesan']) ?></div>
        <div class="notif-body">Permohonan terkait kode aktif Anda</div>
      </div>
      <div class="notif-time"><?= $n['created_at'] ? date('d/m H:i', strtotime($n['created_at'])) : '-' ?></div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
</body>
</html>