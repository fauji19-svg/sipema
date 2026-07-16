<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Saya — SIPEMA</title>
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
.section-header{background:var(--navy);color:#fff;padding:10px 16px;}
.section-header h6{margin:0;font-size:13px;font-weight:700;}
.profile-banner{background:var(--navy);padding:24px;text-align:center;}
.profile-avatar{width:64px;height:64px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:800;color:var(--navy);margin:0 auto 10px;}
.profile-name{color:#fff;font-size:15px;font-weight:700;}
.profile-role{color:rgba(255,255,255,0.5);font-size:12px;margin-top:2px;}
.form-label-custom{font-size:12px;font-weight:600;color:#333;margin-bottom:4px;display:block;}
.form-control-custom{border:1px solid #ccc;border-radius:2px;padding:8px 12px;font-size:13px;width:100%;}
.form-control-custom:focus{outline:none;border-color:var(--navy);}
.btn-navy{background:var(--navy);color:#fff;border:none;padding:8px 20px;font-size:13px;font-weight:600;border-radius:3px;cursor:pointer;}
.btn-success{background:#2D7A4F;color:#fff;border:none;padding:8px 20px;font-size:13px;font-weight:600;border-radius:3px;cursor:pointer;}
.alert-success-custom{background:#d1fae5;border:1px solid #6ee7b7;color:#065f46;padding:10px 16px;border-radius:3px;margin-bottom:14px;font-size:13px;}
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
    <a href="/pemohon/notifikasi" class="nav-link-item"><i class="bi bi-bell"></i> Notifikasi</a>
    <a href="/pemohon/profil" class="nav-link-item active"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/pemohon/panduan" class="nav-link-item"><i class="bi bi-question-circle"></i> Panduan</a>
    <a href="/logout" class="nav-link-item" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);">
      <i class="bi bi-box-arrow-left"></i> Keluar
    </a>
  </nav>
</aside>
<div class="topbar"><div class="topbar-title">Profil Saya</div></div>
<div class="main-content">

  <?php if (session()->getFlashdata('success')): ?>
  <div class="alert-success-custom"><i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div class="row g-3">
    <div class="col-md-4">
      <div class="section-card">
        <div class="profile-banner">
          <div class="profile-avatar"><?= strtoupper(substr($user['nama'], 0, 2)) ?></div>
          <div class="profile-name"><?= esc($user['nama']) ?></div>
          <div class="profile-role">Pemohon</div>
        </div>
        <div style="padding:14px 16px;">
          <div style="display:flex;flex-direction:column;gap:10px;font-size:12.5px;">
            <div style="display:flex;gap:8px;align-items:center;">
              <i class="bi bi-envelope" style="color:#999;width:16px;"></i>
              <?= esc($user['email']) ?>
            </div>
            <div style="display:flex;gap:8px;align-items:center;">
              <i class="bi bi-phone" style="color:#999;width:16px;"></i>
              <?= esc($user['no_hp'] ?? '-') ?>
            </div>
            <div style="display:flex;gap:8px;align-items:center;">
              <i class="bi bi-calendar3" style="color:#999;width:16px;"></i>
              Terdaftar <?= date('d/m/Y', strtotime($user['created_at'] ?? now())) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8" style="display:flex;flex-direction:column;gap:14px;">

      <!-- EDIT PROFIL -->
      <div class="section-card">
        <div class="section-header"><h6>Edit Profil</h6></div>
        <form method="POST" action="/pemohon/profil" style="padding:16px;">
          <?= csrf_field() ?>
          <div class="row g-2 mb-3">
            <div class="col-md-6">
              <label class="form-label-custom">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control-custom" value="<?= esc($user['nama']) ?>" required>
            </div>
            <div class="col-md-6">
              <label class="form-label-custom">No. HP / WhatsApp</label>
              <input type="text" name="no_hp" class="form-control-custom" value="<?= esc($user['no_hp'] ?? '') ?>">
              <small style="font-size:11px;color:#999;">Notifikasi status berkas dikirim ke nomor ini</small>
            </div>
            <div class="col-12">
              <label class="form-label-custom">Email</label>
              <input type="email" class="form-control-custom" value="<?= esc($user['email']) ?>" disabled style="background:#f5f5f5;color:#999;">
              <small style="font-size:11px;color:#999;">Email tidak dapat diubah</small>
            </div>
          </div>
          <button type="submit" class="btn-navy"><i class="bi bi-check2"></i> Simpan Perubahan</button>
        </form>
      </div>

      <!-- GANTI PASSWORD -->
      <div class="section-card">
        <div class="section-header"><h6>Ganti Password</h6></div>
        <form method="POST" action="/pemohon/gantipassword" style="padding:16px;">
          <?= csrf_field() ?>
          <div class="row g-2 mb-3">
            <div class="col-md-4">
              <label class="form-label-custom">Password Lama</label>
              <input type="password" name="password_lama" class="form-control-custom" placeholder="••••••••" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom">Password Baru</label>
              <input type="password" name="password_baru" class="form-control-custom" placeholder="Min. 8 karakter" required>
            </div>
            <div class="col-md-4">
              <label class="form-label-custom">Konfirmasi Password</label>
              <input type="password" name="password_konfirmasi" class="form-control-custom" placeholder="Ulangi password baru" required>
            </div>
          </div>
          <button type="submit" class="btn-success"><i class="bi bi-lock"></i> Ganti Password</button>
        </form>
      </div>

    </div>
  </div>
</div>
</body>
</html>