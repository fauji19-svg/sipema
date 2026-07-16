<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tracking Berkas — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;}
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
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;display:flex;align-items:center;gap:12px;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.section-card{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:hidden;margin-bottom:16px;}
.section-header{background:var(--navy);color:#fff;padding:10px 16px;}
.section-header h6{margin:0;font-size:13px;font-weight:700;}
.detail-row{display:grid;grid-template-columns:140px 1fr;padding:9px 16px;border-bottom:1px solid #eee;font-size:12.5px;}
.detail-row:last-child{border-bottom:none;}
.detail-label{color:#666;font-weight:600;}
.detail-value{color:#222;font-weight:600;}
.kode-chip{font-family:monospace;font-weight:800;font-size:13px;color:var(--navy);background:#EEF3FF;padding:3px 8px;border:1px solid #c7d7f5;border-radius:2px;letter-spacing:1.5px;}
.badge-pengajuan{background:#dbeafe;color:#1d4ed8;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-validasi{background:#fef3c7;color:#92400e;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-proses{background:#dcfce7;color:#166534;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-revisi{background:#fee2e2;color:#991b1b;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.badge-selesai{background:#d1fae5;color:#065f46;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.btn-navy{background:var(--navy);color:#fff;border:none;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;text-decoration:none;}
.btn-outline{background:#fff;color:var(--navy);border:1px solid #ccc;padding:7px 16px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;}
.tracking-search{background:#fff;border:1px solid #e5e0d8;border-radius:4px;padding:12px 16px;margin-bottom:14px;display:flex;align-items:center;gap:10px;}
.tracking-input{border:1px solid #ccc;padding:7px 12px;font-size:13px;font-family:monospace;font-weight:700;letter-spacing:2px;border-radius:2px;width:180px;}
/* TIMELINE */
.timeline{list-style:none;padding:16px;margin:0;}
.tl-item{display:flex;gap:14px;padding-bottom:20px;position:relative;}
.tl-item:last-child{padding-bottom:0;}
.tl-left{display:flex;flex-direction:column;align-items:center;flex-shrink:0;}
.tl-dot{width:14px;height:14px;border-radius:50%;background:#ddd;border:2px solid #bbb;margin-top:3px;}
.tl-dot.done{background:var(--success);border-color:var(--success);}
.tl-dot.active{background:var(--gold);border-color:var(--gold);box-shadow:0 0 0 4px rgba(201,168,76,0.2);}
.tl-line{width:2px;flex:1;background:#ddd;margin-top:3px;}
.tl-line.done{background:var(--success);}
.tl-body{flex:1;}
.tl-title{font-size:13.5px;font-weight:700;color:var(--navy);margin-bottom:3px;}
.tl-title.active-t{color:#92400e;}
.tl-title.done-t{color:var(--success);}
.tl-desc{font-size:12px;color:#666;}
.tl-time{font-size:11px;color:#999;margin-top:3px;font-style:italic;}
.not-found-box{background:#fff;border:1px solid #e5e0d8;border-radius:4px;padding:48px;text-align:center;}
.not-found-box i{font-size:48px;color:#ddd;display:block;margin-bottom:14px;}
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
  <a href="/pemohon/riwayat" class="btn-outline btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
  <div class="topbar-title">Tracking Status Berkas</div>
</div>

<!-- MAIN -->
<div class="main-content">

  <!-- SEARCH BAR -->
  <div class="tracking-search">
    <i class="bi bi-search" style="color:var(--navy);font-size:16px;"></i>
    <label style="font-size:12.5px;font-weight:700;color:var(--navy);white-space:nowrap;">Lacak Kode :</label>
    <input type="text" class="tracking-input" id="kode-input" placeholder="Contoh: ABG56UZ" value="<?= esc($kode) ?>" maxlength="7" style="text-transform:uppercase;">
    <button class="btn-navy" onclick="lacak()"><i class="bi bi-search"></i> Cari</button>
  </div>

  <?php if ($kode && !$permohonan): ?>
  <!-- TIDAK DITEMUKAN -->
  <div class="not-found-box">
    <i class="bi bi-search"></i>
    <p style="font-size:15px;font-weight:700;color:#333;margin-bottom:6px;">Kode tidak ditemukan</p>
    <p style="font-size:13px;color:#666;margin:0;">Kode <strong><?= esc($kode) ?></strong> tidak terdaftar di sistem. Pastikan kode sudah benar.</p>
  </div>

  <?php elseif ($permohonan): ?>
  <!-- DETAIL + TIMELINE -->
  <div class="row g-3">
    <div class="col-md-4">
      <div class="section-card">
        <div class="section-header"><h6>Detail Berkas</h6></div>
        <div class="detail-row">
          <span class="detail-label">Kode Unik</span>
          <span class="detail-value"><span class="kode-chip"><?= esc($permohonan['kode_unik']) ?></span></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Jenis Akta</span>
          <span class="detail-value"><?= esc($permohonan['nama_akta']) ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Tgl Pengajuan</span>
          <span class="detail-value"><?= date('d/m/Y H:i', strtotime($permohonan['tanggal_pengajuan'])) ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Status</span>
          <span class="detail-value">
            <?php
            $badgeClass = match($permohonan['status']) {
              'Pengajuan'        => 'badge-pengajuan',
              'Validasi Dokumen' => 'badge-validasi',
              'Revisi'           => 'badge-revisi',
              'Selesai'          => 'badge-selesai',
              default            => 'badge-proses',
            };
            ?>
            <span class="<?= $badgeClass ?>">● <?= esc($permohonan['status']) ?></span>
          </span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Dokumen</span>
          <span class="detail-value" style="color:<?= count($dokumen) > 0 ? 'var(--success)' : '#c0392b' ?>;">
            <?= count($dokumen) ?> file terupload
          </span>
        </div>
        <div style="padding:12px 16px;">
          <a href="#" class="btn-outline" style="width:100%;justify-content:center;">
            <i class="bi bi-download"></i> Download Tanda Terima
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="section-card">
        <div class="section-header"><h6>Riwayat Status Berkas</h6></div>

        <?php
        // Urutan status dan detailnya
        $statuses = [
          'Pengajuan'          => ['label'=>'Permohonan Diterima',        'detail'=>'Permohonan diproses'],
          'Validasi Dokumen'   => ['label'=>'Dokumen Diperiksa',          'detail'=>'Proses pemeriksaan dokumen'],
          'Revisi'             => ['label'=>'Dokumen Perlu Dilengkapi',    'detail'=>'Lengkapi dokumen'],
          'Perhitungan Pajak'  => ['label'=>'Perhitungan Pajak',          'detail'=>'Proses pajak'],
          'Draft Akta'         => ['label'=>'Penyusunan Draft Akta',      'detail'=>'Proses AJB'],
          'Review Notaris'     => ['label'=>'Review Proses',              'detail'=>'Persetujuan proses berkas'],
          'Selesai'            => ['label'=>'Akta Selesai & Siap Diambil','detail'=>'Selesai'],
        ];

        $currentStatus = $permohonan['status'];
        $statusKeys    = array_keys($statuses);
        $currentIdx    = array_search($currentStatus, $statusKeys);
        if ($currentIdx === false) $currentIdx = 0;
        ?>

        <ul class="timeline">
          <?php foreach ($statuses as $key => $s):
            $idx = array_search($key, $statusKeys);
            $isDone   = $idx < $currentIdx;
            $isActive = $idx === $currentIdx;
            $isLast   = $idx === count($statusKeys) - 1;
          ?>
          <li class="tl-item">
            <div class="tl-left">
              <div class="tl-dot <?= $isDone ? 'done' : ($isActive ? 'active' : '') ?>"></div>
              <?php if (!$isLast): ?>
              <div class="tl-line <?= $isDone ? 'done' : '' ?>"></div>
              <?php endif; ?>
            </div>
            <div class="tl-body">
              <div class="tl-title <?= $isDone ? 'done-t' : ($isActive ? 'active-t' : '') ?>" style="<?= (!$isDone && !$isActive) ? 'color:#aaa;' : '' ?>">
                <?= $isDone ? '✓ ' : ($isActive ? '⏳ ' : '') ?><?= $s['label'] ?>
              </div>
              <div class="tl-desc" style="<?= (!$isDone && !$isActive) ? 'color:#bbb;' : '' ?>">
                <?= $s['detail'] ?>
              </div>
              <?php if ($isActive): ?>
              <div class="tl-time"><?= date('d/m/Y H:i', strtotime($permohonan['tanggal_pengajuan'])) ?> WIB · Sedang diproses</div>
              <?php endif; ?>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

  <?php else: ?>
  <!-- BELUM SEARCH -->
  <div class="not-found-box">
    <i class="bi bi-search"></i>
    <p style="font-size:15px;font-weight:700;color:#333;margin-bottom:6px;">Masukkan Kode Unik</p>
    <p style="font-size:13px;color:#666;margin:0;">Masukkan kode unik yang diterima saat pengajuan permohonan untuk melihat status berkas.</p>
  </div>
  <?php endif; ?>

</div>

<script>
function lacak() {
  const kode = document.getElementById('kode-input').value.toUpperCase();
  if (kode.length < 5) { alert('Masukkan kode unik yang valid (min. 5 karakter)'); return; }
  window.location.href = '/pemohon/tracking/' + kode;
}
document.getElementById('kode-input').addEventListener('keydown', function(e) {
  if (e.key === 'Enter') lacak();
});
</script>
</body>
</html>