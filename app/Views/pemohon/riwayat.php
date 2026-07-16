<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Permohonan — SIPEMA</title>
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
.section-card{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:visible;margin-bottom:16px;}
.section-header{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;}
.section-header h6{margin:0;font-size:13px;font-weight:700;}
.filter-bar{background:#fff;border:1px solid #e5e0d8;border-radius:4px;padding:14px 16px;margin-bottom:14px;}
.filter-label{font-size:12px;font-weight:600;color:#333;margin-bottom:4px;display:block;}
.filter-input{border:1px solid #ccc;border-radius:2px;padding:7px 10px;font-size:13px;width:100%;}
.filter-input:focus{outline:none;border-color:var(--navy);}
.btn-navy{background:var(--navy);color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;}
.btn-cari{background:#2980b9;color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;}
table.main-table{width:100%;border-collapse:collapse;font-size:12.5px;}
table.main-table thead th{background:#3D5080;color:#fff;padding:8px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.main-table tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
table.main-table tbody tr:hover{background:#f5f8ff;}
.kode-chip{font-family:monospace;font-weight:800;font-size:12px;color:var(--navy);background:#EEF3FF;padding:3px 8px;border:1px solid #c7d7f5;border-radius:2px;letter-spacing:1.5px;}
.badge-pengajuan{background:#dbeafe;color:#1d4ed8;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-validasi{background:#fef3c7;color:#92400e;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-proses{background:#dcfce7;color:#166534;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-revisi{background:#fee2e2;color:#991b1b;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-selesai{background:#d1fae5;color:#065f46;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.action-wrap{position:relative;display:inline-block;}
.btn-dots{background:#fff;border:1px solid #ccc;border-radius:2px;width:30px;height:28px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:16px;color:#666;font-weight:700;}
.btn-dots:hover{border-color:var(--navy);color:var(--navy);}
.dropdown-box{display:none;position:fixed;background:#fff;border:1px solid #ddd;box-shadow:0 4px 12px rgba(0,0,0,0.12);z-index:9000;min-width:170px;border-radius:2px;}
.dropdown-box.open{display:block;}
.dropdown-box a{display:flex;align-items:center;gap:8px;padding:9px 14px;font-size:12.5px;color:#333;text-decoration:none;border-bottom:1px solid #eee;}
.dropdown-box a:last-child{border-bottom:none;}
.dropdown-box a:hover{background:#f0f4ff;color:var(--navy);}
.dropdown-box a i{color:#666;}
</style>
</head>
<body>

<!-- SIDEBAR -->
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
    <a href="/pemohon/riwayat" class="nav-link-item active"><i class="bi bi-clock-history"></i> Riwayat Permohonan</a>
    <div class="nav-label">Informasi</div>
    <a href="/pemohon/notifikasi" class="nav-link-item"><i class="bi bi-bell"></i> Notifikasi</a>
    <a href="/pemohon/profil" class="nav-link-item"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/pemohon/panduan" class="nav-link-item"><i class="bi bi-question-circle"></i> Panduan</a>
    <a href="/logout" class="nav-link-item" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);">
      <i class="bi bi-box-arrow-left"></i> Keluar
    </a>
  </nav>
</aside>

<!-- TOPBAR -->
<div class="topbar">
  <div class="topbar-title">Riwayat Permohonan</div>
</div>

<!-- MAIN -->
<div class="main-content">

  <!-- FILTER BAR -->
  <form method="GET" action="/pemohon/riwayat">
    <div class="filter-bar">
      <div class="row g-2 align-items-end">
        <div class="col-md-5">
          <label class="filter-label">Jenis Permohonan :</label>
          <select name="jenis_akta_id" class="filter-input">
            <option value="">-- Semua Jenis --</option>
            <?php foreach ($jenisAkta as $ja): ?>
            <option value="<?= $ja['id'] ?>" <?= ($filter_jenis == $ja['id']) ? 'selected' : '' ?>>
              <?= esc($ja['nama_akta']) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label class="filter-label">Kode Akta :</label>
          <input type="text" name="kode" class="filter-input" placeholder="Masukkan kode akta..." value="<?= esc($filter_kode) ?>" style="text-transform:uppercase;font-family:monospace;font-weight:700;letter-spacing:1px;">
        </div>
        <div class="col-md-3 d-flex gap-2">
          <button type="submit" class="btn-cari"><i class="bi bi-search"></i> Cari</button>
          <a href="/pemohon/riwayat" class="btn-navy"><i class="bi bi-x"></i> Reset</a>
        </div>
      </div>
    </div>
  </form>

  <!-- TABEL RIWAYAT -->
  <div class="section-card">
    <div class="section-header">
      <h6><i class="bi bi-list-ul" style="color:var(--gold);margin-right:6px;"></i>Daftar Semua Permohonan</h6>
      <span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($permohonan) ?> data ditemukan</span>
    </div>
    <div style="padding:8px 14px;background:#fffbf0;border-bottom:1px solid #f0d68a;font-size:12px;color:#7a5c00;">
      <i class="bi bi-info-circle"></i> Perbaikan dokumen dapat dilakukan hingga hari ke-5 setelah tanggal pengajuan
    </div>
    <table class="main-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Unik</th>
          <th>Jenis Akta</th>
          <th>Tgl Pengajuan</th>
          <th>Nilai Transaksi</th>
          <th>Status</th>
          <th style="text-align:center;">Pilihan</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($permohonan)): ?>
        <tr>
          <td colspan="7" style="text-align:center;padding:28px;color:#999;">
            <i class="bi bi-inbox" style="font-size:28px;display:block;margin-bottom:8px;"></i>
            Tidak ada data permohonan.
          </td>
        </tr>
        <?php else: ?>
        <?php foreach ($permohonan as $i => $p): ?>
        <tr>
          <td style="text-align:center;"><?= $i + 1 ?></td>
          <td><span class="kode-chip"><?= esc($p['kode_unik']) ?></span></td>
          <td><?= esc($p['nama_akta']) ?></td>
          <td><?= date('d/m/Y', strtotime($p['tanggal_pengajuan'])) ?></td>
          <td><?= $p['nilai_transaksi'] ? 'Rp ' . number_format($p['nilai_transaksi'], 0, ',', '.') : '-' ?></td>
          <td>
            <?php
            $badgeClass = match($p['status']) {
              'Pengajuan'        => 'badge-pengajuan',
              'Validasi Dokumen' => 'badge-validasi',
              'Revisi'           => 'badge-revisi',
              'Selesai'          => 'badge-selesai',
              default            => 'badge-proses',
            };
            ?>
            <span class="<?= $badgeClass ?>">● <?= esc($p['status']) ?></span>
          </td>
          <td style="text-align:center;">
            <div class="action-wrap">
              <button class="btn-dots" onclick="toggleDrop(this)">···</button>
              <div class="dropdown-box">
                <a href="/pemohon/tracking/<?= esc($p['kode_unik']) ?>">
                  <i class="bi bi-search"></i>
                  <?= $p['status'] === 'Selesai' ? 'Lihat Detail' : 'Tracking Berkas' ?>
                </a>
                <a href="/pemohon/detail/<?= esc($p['kode_unik']) ?>">
                    <i class="bi bi-eye"></i> Lihat Detail
                </a>
                <a href="#"><i class="bi bi-download"></i> Download Tanda Terima</a>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>

<script>
function toggleDrop(btn) {
  closeAllDropdowns();
  const menu = btn.nextElementSibling;
  const rect = btn.getBoundingClientRect();
  menu.style.top  = (rect.bottom + window.scrollY + 4) + 'px';
  menu.style.left = (rect.right + window.scrollX - 170) + 'px';
  menu.classList.toggle('open');
  event.stopPropagation();
}
function closeAllDropdowns() {
  document.querySelectorAll('.dropdown-box').forEach(m => m.classList.remove('open'));
}
document.addEventListener('click', closeAllDropdowns);
</script>
</body>
</html>