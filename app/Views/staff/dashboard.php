<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Staff — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;--danger:#C0392B;--warning:#D97706;}
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
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;display:flex;align-items:center;justify-content:space-between;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.stat-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:20px;}
.sc{background:#fff;border:1px solid #e5e0d8;border-top:3px solid var(--navy);border-radius:4px;padding:16px;}
.sc.gold{border-top-color:var(--gold);}
.sc.green{border-top-color:var(--success);}
.sc.purple{border-top-color:#7c3aed;}
.sn{font-size:28px;font-weight:800;color:var(--navy);line-height:1;}
.sl{font-size:11px;color:#666;text-transform:uppercase;letter-spacing:.5px;margin-top:4px;}
.section-card{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:visible;margin-bottom:16px;}
.sh{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;border-radius:4px 4px 0 0;}
.sh h6{margin:0;font-size:13px;font-weight:700;}
table.t{width:100%;border-collapse:collapse;font-size:12.5px;}
table.t thead th{background:#3D5080;color:#fff;padding:9px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.t tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
table.t tbody tr:hover{background:#f5f8ff;}
.kode{font-family:monospace;font-weight:800;font-size:12px;color:var(--navy);background:#EEF3FF;padding:3px 8px;border:1px solid #c7d7f5;border-radius:2px;letter-spacing:1.5px;}
.bpj{background:#ede9fe;color:#5b21b6;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bd{background:#dcfce7;color:#166534;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.brv{background:#dbeafe;color:#1d4ed8;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.btn-nv{background:var(--navy);color:#fff;border:none;padding:6px 14px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:5px;}
.aw{position:relative;display:inline-block;}
.bdots{background:#fff;border:1px solid #ccc;border-radius:2px;width:30px;height:28px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:15px;color:#666;font-weight:700;}
.bdots:hover{border-color:var(--navy);color:var(--navy);}
.ddbox{display:none;position:fixed;background:#fff;border:1px solid #ddd;box-shadow:0 4px 12px rgba(0,0,0,0.12);z-index:9000;min-width:180px;border-radius:3px;}
.ddbox.open{display:block;}
.ddbox a{display:flex;align-items:center;gap:8px;padding:9px 14px;font-size:12.5px;color:#333;text-decoration:none;border-bottom:1px solid #eee;}
.ddbox a:last-child{border-bottom:none;}
.ddbox a:hover{background:#f0f4ff;color:var(--navy);}
.ddbox a i{color:#666;font-size:14px;width:16px;}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sb"><div class="brand">🏛️ SIPEMA</div><div class="sub">Kantor PPAT Eliana, S.H., M.Kn</div></div>
  <div class="su">
    <div class="av"><?= strtoupper(substr(session()->get('nama'),0,2)) ?></div>
    <div><div class="un"><?= esc(session()->get('nama')) ?></div><div class="ur">Staff</div></div>
  </div>
  <nav>
    <div class="nl">Menu Utama</div>
    <a href="/staff/dashboard" class="ni active"><i class="bi bi-house-door"></i> Beranda</a>
    <a href="/staff/profil" class="ni"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/logout" class="ni" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);"><i class="bi bi-box-arrow-left"></i> Keluar</a>
  </nav>
</aside>

<div class="topbar">
  <div class="topbar-title">Beranda Staff</div>
  <span style="font-size:12px;color:#666;"><?= date('l, d F Y') ?></span>
</div>

<div class="mc">
  <?php if(session()->getFlashdata('success')): ?>
  <div style="background:#d1fae5;border-left:4px solid var(--success);color:#065f46;padding:10px 16px;border-radius:3px;margin-bottom:14px;font-size:13px;display:flex;align-items:center;gap:8px;">
    <i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?>
  </div>
  <?php endif; ?>

  <div class="stat-grid">
    <div class="sc"><div class="sn"><?= $totalTugas ?></div><div class="sl">Tugas Aktif</div></div>
    <div class="sc gold"><div class="sn"><?= $totalDraft ?></div><div class="sl">Perlu Draft Akta</div></div>
    <div class="sc purple"><div class="sn"><?= $totalReview ?></div><div class="sl">Sedang Review Notaris</div></div>
    <div class="sc green"><div class="sn"><?= $totalSelesai ?></div><div class="sl">Selesai</div></div>
  </div>

  <div class="section-card">
    <div class="sh">
      <h6><i class="bi bi-file-earmark-text" style="color:var(--gold);margin-right:6px;"></i>Daftar Tugas Staff</h6>
      <span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($permohonan) ?> permohonan</span>
    </div>
    <table class="t">
      <thead>
        <tr><th>No</th><th>Kode Unik</th><th>Nama Pemohon</th><th>Jenis Akta</th><th>Tgl Masuk</th><th>Status</th><th style="text-align:center;">Aksi</th></tr>
      </thead>
      <tbody>
        <?php if(empty($permohonan)): ?>
        <tr><td colspan="7" style="text-align:center;padding:28px;color:#999;">
          <i class="bi bi-inbox" style="font-size:28px;display:block;margin-bottom:8px;"></i>
          Belum ada tugas. Menunggu Admin memvalidasi permohonan.
        </td></tr>
        <?php else: ?>
        <?php foreach($permohonan as $i => $p):
          $badgeClass = match($p['status']) {
            'Perhitungan Pajak' => 'bpj',
            'Draft Akta'        => 'bd',
            'Review Notaris'    => 'brv',
            default             => 'bd',
          };
        ?>
        <tr>
          <td style="text-align:center;"><?= $i+1 ?></td>
          <td><span class="kode"><?= esc($p['kode_unik']) ?></span></td>
          <td><?= esc($p['nama_pemohon']) ?></td>
          <td><?= esc($p['nama_akta']) ?></td>
          <td><?= date('d/m/Y', strtotime($p['tanggal_pengajuan'])) ?></td>
          <td><span class="<?= $badgeClass ?>">● <?= esc($p['status']) ?></span></td>
          <td style="text-align:center;">
            <div class="aw">
              <button class="bdots" onclick="td(this)">···</button>
              <div class="ddbox">
                <a href="/staff/detail/<?= esc($p['kode_unik']) ?>"><i class="bi bi-eye"></i> Lihat Detail</a>
                <?php if($p['status'] === 'Perhitungan Pajak'): ?>
                <a href="/staff/detail/<?= esc($p['kode_unik']) ?>#submit-draft"><i class="bi bi-file-earmark-arrow-up"></i> Submit Draft Akta</a>
                <?php endif; ?>
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
function td(btn){
  document.querySelectorAll('.ddbox').forEach(m=>m.classList.remove('open'));
  const m=btn.nextElementSibling;
  const r=btn.getBoundingClientRect();
  m.style.top=(r.bottom+window.scrollY+4)+'px';
  m.style.left=(r.right+window.scrollX-180)+'px';
  m.classList.toggle('open');
  event.stopPropagation();
}
document.addEventListener('click',()=>document.querySelectorAll('.ddbox').forEach(m=>m.classList.remove('open')));
</script>
</body>
</html>