<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Panduan — SIPEMA</title>
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
.step-item{display:flex;gap:16px;padding:18px 20px;border-bottom:1px solid #eee;}
.step-item:last-child{border-bottom:none;}
.step-num{width:36px;height:36px;background:var(--navy);border-radius:3px;display:flex;align-items:center;justify-content:center;color:var(--gold);font-size:16px;font-weight:800;flex-shrink:0;}
.step-num.done{background:#2D7A4F;color:#fff;}
.step-title{font-size:13.5px;font-weight:700;color:var(--navy);margin-bottom:5px;}
.step-body{font-size:12.5px;color:#666;line-height:1.65;}
.faq-item{padding:14px 20px;border-bottom:1px solid #eee;}
.faq-item:last-child{border-bottom:none;}
.faq-q{font-size:13px;font-weight:700;color:var(--navy);margin-bottom:5px;}
.faq-a{font-size:12.5px;color:#666;line-height:1.6;}
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
    <a href="/pemohon/profil" class="nav-link-item"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/pemohon/panduan" class="nav-link-item active"><i class="bi bi-question-circle"></i> Panduan</a>
    <a href="/logout" class="nav-link-item" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);">
      <i class="bi bi-box-arrow-left"></i> Keluar
    </a>
  </nav>
</aside>
<div class="topbar"><div class="topbar-title">Panduan Penggunaan</div></div>
<div class="main-content">
  <div class="row g-3">
    <div class="col-md-6">
      <div class="section-card">
        <div class="section-header"><h6>Alur Penggunaan SIPEMA</h6></div>
        <div class="step-item">
          <div class="step-num">1</div>
          <div>
            <div class="step-title">Ajukan Permohonan</div>
            <div class="step-body">Klik menu <strong>Ajukan Permohonan</strong> di sidebar, pilih jenis akta, klik <strong>+ Ajukan Baru</strong>, konfirmasi, lalu isi form data diri dan upload dokumen persyaratan.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div>
            <div class="step-title">Simpan Kode Unik</div>
            <div class="step-body">Setelah permohonan berhasil dikirim, simpan <strong>kode unik</strong> yang muncul. Gunakan kode ini untuk melacak status berkas kapan saja melalui kolom <strong>Lacak Berkas</strong> di halaman Beranda.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div>
            <div class="step-title">Pantau Status Berkas</div>
            <div class="step-body">Status berkas diperbarui otomatis. Pantau di menu <strong>Riwayat Permohonan</strong> atau Beranda. Notifikasi juga akan masuk ke menu <strong>Notifikasi</strong>.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div>
            <div class="step-title">Lengkapi Dokumen Jika Diminta</div>
            <div class="step-body">Jika status berubah menjadi <strong>Revisi</strong>, buka <strong>Lihat Detail</strong> dari menu Riwayat untuk melihat dokumen mana yang perlu dilengkapi.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num done">✓</div>
          <div>
            <div class="step-title">Akta Selesai — Ambil Dokumen</div>
            <div class="step-body">Saat status <strong>Selesai</strong>, datang langsung ke <strong>Kantor PPAT Eliana, S.H., M.Kn</strong> di Perum Kota Tigaraksa Blok AF 26/29, Kab. Tangerang untuk mengambil akta.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="section-card">
        <div class="section-header"><h6>Pertanyaan Umum (FAQ)</h6></div>
        <div class="faq-item">
          <div class="faq-q">Apakah perlu datang ke kantor untuk mendaftar?</div>
          <div class="faq-a">Tidak. Pendaftaran dan upload dokumen dilakukan online via SIPEMA. Anda hanya perlu datang saat penandatanganan akta dan pengambilan dokumen akhir.</div>
        </div>
        <div class="faq-item">
          <div class="faq-q">Format file apa yang bisa diupload?</div>
          <div class="faq-a">PDF, JPG, atau PNG maksimal 5MB per file. Pastikan dokumen jelas dan tidak blur.</div>
        </div>
        <div class="faq-item">
          <div class="faq-q">Notifikasi tidak muncul, apa yang harus dilakukan?</div>
          <div class="faq-a">Pantau status langsung di menu <strong>Riwayat Permohonan</strong> atau gunakan fitur <strong>Lacak Berkas</strong> di Beranda dengan kode unik Anda.</div>
        </div>
        <div class="faq-item">
          <div class="faq-q">Berapa lama proses akta diselesaikan?</div>
          <div class="faq-a">Bervariasi tergantung jenis akta dan kelengkapan dokumen. Umumnya 7–14 hari kerja setelah dokumen lengkap dan pajak dilunasi.</div>
        </div>
        <div class="faq-item">
          <div class="faq-q">Siapa yang bisa dihubungi?</div>
          <div class="faq-a">Kantor PPAT Eliana, S.H., M.Kn — Perum Kota Tigaraksa Blok AF 26/29, Kel. Kaduagung, Kec. Tigaraksa, Kab. Tangerang, Banten 15720.</div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>