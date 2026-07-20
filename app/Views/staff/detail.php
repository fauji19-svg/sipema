<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Permohonan — Staff SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;--danger:#C0392B;}
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
.topbar{background:#fff;border-bottom:1px solid #e5e0d8;padding:12px 24px;margin-left:220px;position:sticky;top:0;z-index:50;display:flex;align-items:center;gap:12px;}
.topbar-title{font-size:15px;font-weight:700;color:var(--navy);}
.sc{background:#fff;border:1px solid #e5e0d8;border-radius:4px;overflow:hidden;margin-bottom:14px;}
.sh{background:var(--navy);color:#fff;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;}
.sh h6{margin:0;font-size:13px;font-weight:700;}
.drow{display:grid;grid-template-columns:160px 1fr;padding:9px 16px;border-bottom:1px solid #eee;font-size:13px;}
.drow:last-child{border-bottom:none;}
.dlabel{color:#666;font-weight:600;}
.dval{color:#222;font-weight:600;}
.kode{font-family:monospace;font-weight:800;font-size:13px;color:var(--navy);background:#EEF3FF;padding:3px 8px;border:1px solid #c7d7f5;border-radius:2px;letter-spacing:1.5px;}
.bpj{background:#ede9fe;color:#5b21b6;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bd{background:#dcfce7;color:#166534;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.brv{background:#dbeafe;color:#1d4ed8;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bs{background:#d1fae5;color:#065f46;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
table.t{width:100%;border-collapse:collapse;font-size:12.5px;}
table.t thead th{background:#3D5080;color:#fff;padding:9px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.t tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
.dv{background:#d1fae5;color:#065f46;padding:2px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.dm{background:#fef3c7;color:#92400e;padding:2px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.drs{background:#fee2e2;color:#991b1b;padding:2px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.btn-nv{background:var(--navy);color:#fff;border:none;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.btn-ok{background:var(--success);color:#fff;border:none;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.btn-ol{background:#fff;color:var(--navy);border:1px solid #ccc;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:5px;}
.flabel{font-size:12px;font-weight:600;margin-bottom:4px;display:block;}
.finput{border:1px solid #ccc;border-radius:2px;padding:7px 10px;font-size:13px;width:100%;}
.finput:focus{outline:none;border-color:var(--navy);}
.pajak-box{background:#EEF3FF;border:1px solid #c7d7f5;border-radius:3px;padding:14px 16px;}
.prow{display:flex;justify-content:space-between;padding:5px 0;font-size:13px;border-bottom:1px solid #dde;}
.prow:last-child{border-bottom:none;font-weight:800;color:var(--navy);}
.plabel{color:#666;}
.ati{display:flex;gap:12px;padding:10px 16px;border-bottom:1px solid #eee;font-size:12.5px;}
.ati:last-child{border-bottom:none;}
.atdot{width:8px;height:8px;border-radius:50%;background:var(--gold);margin-top:5px;flex-shrink:0;}
.attime{font-size:11px;color:#999;white-space:nowrap;}
.alert-ok{background:#d1fae5;border-left:4px solid var(--success);color:#065f46;padding:10px 16px;border-radius:3px;margin-bottom:14px;font-size:13px;display:flex;align-items:center;gap:8px;}
.info-box{background:#fffbf0;border:1px solid #f0d68a;border-left:4px solid var(--gold);padding:10px 14px;border-radius:3px;font-size:12.5px;color:#7a5c00;margin-bottom:14px;}
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
  <a href="/staff/dashboard" class="btn-ol"><i class="bi bi-arrow-left"></i> Kembali</a>
  <div class="topbar-title">Detail Permohonan — <span class="kode"><?= esc($permohonan['kode_unik']) ?></span></div>
</div>

<div class="mc">
  <?php if(session()->getFlashdata('success')): ?>
  <div class="alert-ok"><i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <div class="row g-3">
    <div class="col-md-4">
      <!-- INFO -->
      <div class="sc">
        <div class="sh"><h6>Informasi Permohonan</h6></div>
        <div class="drow"><span class="dlabel">Kode Unik</span><span class="dval"><span class="kode"><?= esc($permohonan['kode_unik']) ?></span></span></div>
        <div class="drow"><span class="dlabel">Jenis Akta</span><span class="dval"><?= esc($permohonan['nama_akta']) ?></span></div>
        <div class="drow"><span class="dlabel">Tgl Pengajuan</span><span class="dval"><?= date('d/m/Y H:i', strtotime($permohonan['tanggal_pengajuan'])) ?></span></div>
        <div class="drow"><span class="dlabel">Nilai Transaksi</span><span class="dval"><?= $permohonan['nilai_transaksi'] ? 'Rp '.number_format($permohonan['nilai_transaksi'],0,',','.') : '-' ?></span></div>
        <div class="drow">
          <span class="dlabel">Status</span>
          <span class="dval">
            <?php $bc = match($permohonan['status']) {
              'Perhitungan Pajak'=>'bpj','Draft Akta'=>'bd','Review Notaris'=>'brv','Selesai'=>'bs',default=>'bd'
            }; ?>
            <span class="<?= $bc ?>">● <?= esc($permohonan['status']) ?></span>
          </span>
        </div>
      </div>

      <!-- PAJAK -->
      <?php if($pembayaran): ?>
      <div class="sc">
        <div class="sh"><h6>Data Pajak</h6></div>
        <div style="padding:14px 16px;">
          <div class="pajak-box">
            <div class="prow"><span class="plabel">BPHTB (5%)</span><span style="color:var(--success);font-weight:700;">Rp <?= number_format($pembayaran['bphtb'],0,',','.') ?></span></div>
            <div class="prow"><span class="plabel">PPH (2.5%)</span><span style="color:var(--success);font-weight:700;">Rp <?= number_format($pembayaran['pph'],0,',','.') ?></span></div>
            <div class="prow"><span>Total</span><span>Rp <?= number_format($pembayaran['bphtb']+$pembayaran['pph'],0,',','.') ?></span></div>
          </div>
          <div style="margin-top:8px;font-size:12px;">Status: <strong style="color:<?= $pembayaran['status_bayar']==='Lunas'?'var(--success)':'var(--danger)' ?>;"><?= esc($pembayaran['status_bayar']) ?></strong></div>
        </div>
      </div>
      <?php endif; ?>

      <!-- SUBMIT DRAFT -->
      <?php if(in_array($permohonan['status'], ['Perhitungan Pajak', 'Draft Akta'])): ?>
      <div class="sc" id="submit-draft">
        <div class="sh"><h6>Submit Draft Akta ke Notaris</h6></div>
      <form method="POST" action="/staff/submit-draft/<?= $permohonan['id'] ?>" enctype="multipart/form-data" style="padding:16px;">
          <?= csrf_field() ?>
          <input type="hidden" name="kode_unik" value="<?= esc($permohonan['kode_unik']) ?>">
          <div style="margin-bottom:12px;">
            <label class="flabel">Catatan untuk Notaris (opsional)</label>
            <label style="font-size:12px;font-weight:600;display:block;margin-bottom:4px;">File Draft Akta (PDF) *</label>
            <input type="file" name="file_draft" class="finput" accept=".pdf" required style="margin-bottom:10px;">
            <textarea name="catatan" class="finput" rows="3" placeholder="Catatan tambahan..."></textarea>
          </div>
          <button type="submit" class="btn-ok" onclick="return confirm('Kirim draft akta ke Notaris?')">
            <i class="bi bi-file-earmark-arrow-up"></i> Submit ke Notaris
          </button>
        </form>
      </div>
      <?php elseif($permohonan['status'] === 'Review Notaris'): ?>
      <div class="info-box">
        <i class="bi bi-info-circle"></i> Draft akta sudah dikirim ke Notaris dan sedang dalam proses review.
      </div>
      <?php endif; ?>
    </div>

    <div class="col-md-8">
      <!-- DOKUMEN -->
      <div class="sc">
        <div class="sh"><h6>Dokumen Pemohon</h6><span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($dokumen) ?> file</span></div>
        <?php if(empty($dokumen)): ?>
        <div style="padding:20px;text-align:center;color:#999;">Belum ada dokumen.</div>
        <?php else: ?>
        <table class="t">
          <thead><tr><th>No</th><th>Jenis Dokumen</th><th>Nama File</th><th>Status Validasi</th></tr></thead>
          <tbody>
            <?php
            $namaDoc=['ktp'=>'KTP','kk'=>'Kartu Keluarga','npwp'=>'NPWP','buku_nikah'=>'Buku Nikah','akta_lahir'=>'Akta Lahir','ajb'=>'AJB','sppt_pbb'=>'SPPT/PBB','bukti_bayar_sppt'=>'Bukti Bayar SPPT/PBB','dasar_pengalihan'=>'Dasar Pengalihan Hak','akta_kematian'=>'Akta Kematian','bukti_transaksi'=>'Bukti Transaksi','bukti_kepemilikan'=>'Bukti Kepemilikan','surat_kuasa_waris'=>'Surat Kuasa Waris','foto_lokasi'=>'Foto Lokasi','dokumen_lainnya'=>'Dokumen Pendukung Lainnya'];
            foreach($dokumen as $i => $dok):
              $sc=match($dok['status_validasi']){'Valid'=>'dv','Revisi'=>'drs',default=>'dm'};
            ?>
            <tr>
              <td style="text-align:center;"><?= $i+1 ?></td>
              <td><?= esc($namaDoc[$dok['tipe_dokumen']]??$dok['tipe_dokumen']) ?></td>
              <td style="font-size:11px;color:#666;"><?= esc($dok['nama_file']) ?></td>
              <td><span class="<?= $sc ?>"><?= esc($dok['status_validasi']) ?></span></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php endif; ?>
      </div>

      <!-- AUDIT TRAIL -->
      <div class="sc">
        <div class="sh"><h6>Riwayat Aktivitas</h6></div>
        <?php if(empty($auditTrail)): ?>
        <div style="padding:14px 16px;font-size:12.5px;color:#999;">Belum ada aktivitas.</div>
        <?php else: ?>
        <?php foreach($auditTrail as $log): ?>
        <div class="ati">
          <div class="atdot"></div>
          <div style="flex:1;"><?= esc($log['aktivitas']) ?></div>
          <div class="attime"><?= date('d/m H:i',strtotime($log['waktu'])) ?></div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>