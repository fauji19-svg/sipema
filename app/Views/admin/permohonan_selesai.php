<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Permohonan Selesai — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;--danger:#C0392B;}
body{background:var(--cream);font-family:'Segoe UI',sans-serif;}
.sidebar{width:220px;background:var(--navy);min-height:100vh;position:fixed;top:0;left:0;}
.sb{padding:20px;border-bottom:1px solid rgba(255,255,255,0.08);}
.sb .brand{color:var(--gold);font-size:17px;font-weight:700;}
.sb .sub{color:rgba(255,255,255,0.4);font-size:11px;}
.su{padding:14px 20px;border-bottom:1px solid rgba(255,255,255,0.08);display:flex;align-items:center;gap:10px;}
.av{width:36px;height:36px;background:var(--gold);border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--navy);font-size:14px;}
.un{color:#fff;font-size:13px;font-weight:600;}
.ur{color:rgba(255,255,255,0.4);font-size:11px;}
.nl{color:rgba(255,255,255,0.3);font-size:10px;font-weight:700;letter-spacing:1px;text-transform:uppercase;padding:12px 20px 4px;}
.ni{display:flex;align-items:center;gap:10px;padding:9px 20px;color:rgba(255,255,255,0.65);font-size:13px;text-decoration:none;border-left:3px solid transparent;transition:all .15s;}
.ni:hover{background:rgba(255,255,255,0.06);color:#fff;}
.ni.active{background:rgba(201,168,76,0.12);color:var(--gold);border-left-color:var(--gold);font-weight:600;}
.ni i{font-size:15px;width:18px;}
.nbadge{margin-left:auto;background:#e74c3c;color:#fff;font-size:10px;font-weight:700;padding:1px 6px;border-radius:10px;}
.nbadge-g{margin-left:auto;background:var(--success);color:#fff;font-size:10px;font-weight:700;padding:1px 6px;border-radius:10px;}
.mc{margin-left:220px;padding:24px;}
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.section-card{background:#fff;border:1px solid #e5e0d8;border-radius:4px;margin-bottom:16px;}
.sh{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;border-radius:4px 4px 0 0;}
.sh h6{margin:0;font-size:13px;font-weight:700;}
table.t{width:100%;border-collapse:collapse;font-size:12.5px;}
table.t thead th{background:#3D5080;color:#fff;padding:9px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.t tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
table.t tbody tr:hover{background:#f0fdf4;}
.kode{font-family:monospace;font-weight:800;font-size:12px;color:var(--navy);background:#EEF3FF;padding:3px 8px;border:1px solid #c7d7f5;border-radius:2px;letter-spacing:1.5px;}
.bs{background:#d1fae5;color:#065f46;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.btn-nv{background:var(--navy);color:#fff;border:none;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:5px;}
.btn-sm{padding:4px 10px;font-size:11px;}
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
    <div><div class="un"><?= esc(session()->get('nama')) ?></div><div class="ur">Administrator</div></div>
  </div>
  <nav>
    <div class="nl">Menu Utama</div>
    <a href="/admin/dashboard" class="ni"><i class="bi bi-house-door"></i> Beranda</a>
    <a href="/admin/permohonan-masuk" class="ni"><i class="bi bi-file-earmark-arrow-down"></i> Permohonan Masuk</a>
    <a href="/admin/permohonan-selesai" class="ni active"><i class="bi bi-file-earmark-check"></i> Permohonan Selesai <span class="nbadge-g"><?= count($permohonan) ?></span></a>
    <a href="/admin/audit-trail" class="ni"><i class="bi bi-clock-history"></i> Audit Trail</a>
    <div class="nl">Pengaturan</div>
    <a href="/admin/users" class="ni"><i class="bi bi-people"></i> Manajemen User</a>
    <a href="/admin/profil" class="ni"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/logout" class="ni" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);"><i class="bi bi-box-arrow-left"></i> Keluar</a>
  </nav>
</aside>

<div class="topbar"><div class="topbar-title">Permohonan Selesai</div></div>

<div class="mc">
  <div class="section-card">
    <div class="sh">
      <h6><i class="bi bi-file-earmark-check" style="color:var(--gold);margin-right:6px;"></i>Daftar Permohonan Selesai</h6>
      <span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($permohonan) ?> permohonan selesai</span>
    </div>
    <table class="t">
      <thead>
        <tr><th>No</th><th>Kode Unik</th><th>Nama Pemohon</th><th>No. HP</th><th>Jenis Akta</th><th>Tgl Masuk</th><th>Nilai Transaksi</th><th>Status</th><th style="text-align:center;">Aksi</th></tr>
      </thead>
      <tbody>
        <?php if(empty($permohonan)): ?>
        <tr><td colspan="9" style="text-align:center;padding:28px;color:#999;"><i class="bi bi-inbox" style="font-size:28px;display:block;margin-bottom:8px;"></i>Belum ada permohonan yang selesai.</td></tr>
        <?php else: ?>
        <?php foreach($permohonan as $i => $p): ?>
        <tr>
          <td style="text-align:center;"><?= $i+1 ?></td>
          <td><span class="kode"><?= esc($p['kode_unik']) ?></span></td>
          <td><?= esc($p['nama_pemohon']) ?></td>
          <td><?= esc($p['no_hp']) ?></td>
          <td><?= esc($p['nama_akta']) ?></td>
          <td><?= date('d/m/Y', strtotime($p['tanggal_pengajuan'])) ?></td>
          <td><?= $p['nilai_transaksi'] ? 'Rp '.number_format($p['nilai_transaksi'],0,',','.') : '-' ?></td>
          <td><span class="bs">● Selesai</span></td>
          <td style="text-align:center;">
            <div class="aw">
              <button class="bdots" onclick="td(this)">···</button>
              <div class="ddbox">
                <a href="/admin/detail/<?= esc($p['kode_unik']) ?>"><i class="bi bi-eye"></i> Lihat Detail</a>
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