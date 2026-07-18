<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Profil Admin — SIPEMA</title>
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
.sc{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:hidden;margin-bottom:14px;}
.sh{background:var(--navy);color:#fff;padding:10px 16px;}
.sh h6{margin:0;font-size:13px;font-weight:700;}
.fl{font-size:12px;font-weight:600;margin-bottom:4px;display:block;}
.fi{border:1px solid #ccc;border-radius:2px;padding:7px 10px;font-size:13px;width:100%;}
.fi:focus{outline:none;border-color:var(--navy);}
.btn-nv{background:var(--navy);color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.btn-ok{background:var(--success);color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.alert-ok{background:#d1fae5;border-left:4px solid var(--success);color:#065f46;padding:10px 16px;border-radius:3px;margin-bottom:14px;font-size:13px;display:flex;align-items:center;gap:8px;}
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
    <a href="/admin/users" class="ni"><i class="bi bi-people"></i> Manajemen User</a>
    <a href="/admin/profil" class="ni active"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/logout" class="ni" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);"><i class="bi bi-box-arrow-left"></i> Keluar</a>
  </nav>
</aside>
<div class="topbar"><div class="topbar-title">Profil Saya</div></div>
<div class="mc">
  <?php if(session()->getFlashdata('success')): ?>
  <div class="alert-ok"><i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <div class="row g-3">
    <div class="col-md-4">
      <div class="sc">
        <div style="background:var(--navy);padding:24px;text-align:center;">
          <div style="width:64px;height:64px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:24px;font-weight:800;color:var(--navy);margin:0 auto 10px;"><?= strtoupper(substr($user['nama'],0,2)) ?></div>
          <div style="color:#fff;font-size:15px;font-weight:700;"><?= esc($user['nama']) ?></div>
          <div style="color:rgba(255,255,255,0.5);font-size:12px;margin-top:2px;">Administrator</div>
        </div>
        <div style="padding:14px 16px;font-size:12.5px;display:flex;flex-direction:column;gap:10px;">
          <div style="display:flex;gap:8px;"><i class="bi bi-envelope" style="color:#999;"></i><?= esc($user['email']) ?></div>
          <div style="display:flex;gap:8px;"><i class="bi bi-phone" style="color:#999;"></i><?= esc($user['no_hp'] ?? '-') ?></div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="sc">
        <div class="sh"><h6>Edit Profil</h6></div>
        <form method="POST" action="/admin/profil" style="padding:16px;">
          <?= csrf_field() ?>
          <div class="row g-2 mb-3">
            <div class="col-md-6"><label class="fl">Nama Lengkap</label><input type="text" name="nama" class="fi" value="<?= esc($user['nama']) ?>"></div>
            <div class="col-md-6"><label class="fl">No. HP</label><input type="text" name="no_hp" class="fi" value="<?= esc($user['no_hp'] ?? '') ?>"></div>
            <div class="col-12"><label class="fl">Email</label><input type="email" class="fi" value="<?= esc($user['email']) ?>" disabled style="background:#f5f5f5;"></div>
          </div>
          <button type="submit" class="btn-nv"><i class="bi bi-check2"></i> Simpan</button>
        </form>
      </div>
      <div class="sc">
        <div class="sh"><h6>Ganti Password</h6></div>
        <form method="POST" action="/admin/ganti-password" style="padding:16px;">
          <?= csrf_field() ?>
          <div class="row g-2 mb-3">
            <div class="col-md-4"><label class="fl">Password Lama</label><input type="password" name="password_lama" class="fi" placeholder="••••••••"></div>
            <div class="col-md-4"><label class="fl">Password Baru</label><input type="password" name="password_baru" class="fi" placeholder="Min 8 karakter"></div>
            <div class="col-md-4"><label class="fl">Konfirmasi</label><input type="password" name="password_konfirmasi" class="fi" placeholder="Ulangi"></div>
          </div>
          <button type="submit" class="btn-ok"><i class="bi bi-lock"></i> Ganti Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>