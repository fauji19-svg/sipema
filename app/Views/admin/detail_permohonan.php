<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Permohonan — SIPEMA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--navy:#1B2A4A;--gold:#C9A84C;--cream:#F7F5F0;--success:#2D7A4F;--danger:#C0392B;--warning:#D97706;}
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
.bp{background:#dbeafe;color:#1d4ed8;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bv{background:#fef3c7;color:#92400e;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.br{background:#fee2e2;color:#991b1b;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bs{background:#d1fae5;color:#065f46;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bpj{background:#ede9fe;color:#5b21b6;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
.bd{background:#dcfce7;color:#166534;padding:3px 9px;border-radius:2px;font-size:11px;font-weight:700;}
table.t{width:100%;border-collapse:collapse;font-size:12.5px;}
table.t thead th{background:#3D5080;color:#fff;padding:9px 12px;text-align:left;font-size:11.5px;font-weight:700;}
table.t tbody td{padding:10px 12px;border-bottom:1px solid #eee;vertical-align:middle;}
table.t tbody tr:hover{background:#f5f8ff;}
.dv{background:#d1fae5;color:#065f46;padding:2px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.dm{background:#fef3c7;color:#92400e;padding:2px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.drs{background:#fee2e2;color:#991b1b;padding:2px 8px;border-radius:2px;font-size:11px;font-weight:700;}
.btn-nv{background:var(--navy);color:#fff;border:none;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;text-decoration:none;}
.btn-gd{background:var(--gold);color:var(--navy);border:none;padding:7px 14px;font-size:12px;font-weight:700;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.btn-ok{background:var(--success);color:#fff;border:none;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:5px;}
.btn-dk{background:var(--danger);color:#fff;border:none;padding:5px 10px;font-size:11px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:4px;}
.btn-ok-sm{background:var(--success);color:#fff;border:none;padding:5px 10px;font-size:11px;font-weight:600;border-radius:3px;cursor:pointer;display:inline-flex;align-items:center;gap:4px;}
.btn-ol{background:#fff;color:var(--navy);border:1px solid #ccc;padding:7px 14px;font-size:12px;font-weight:600;border-radius:3px;text-decoration:none;display:inline-flex;align-items:center;gap:5px;}
.flabel{font-size:12px;font-weight:600;margin-bottom:4px;display:block;}
.finput{border:1px solid #ccc;border-radius:2px;padding:7px 10px;font-size:13px;width:100%;}
.finput:focus{outline:none;border-color:var(--navy);}
.pajak-box{background:#EEF3FF;border:1px solid #c7d7f5;border-radius:3px;padding:14px 16px;}
.prow{display:flex;justify-content:space-between;padding:5px 0;font-size:13px;border-bottom:1px solid #dde;}
.prow:last-child{border-bottom:none;font-weight:800;color:var(--navy);font-size:14px;padding-top:10px;}
.plabel{color:#666;}
.ati{display:flex;gap:12px;padding:10px 16px;border-bottom:1px solid #eee;font-size:12.5px;}
.ati:last-child{border-bottom:none;}
.atdot{width:8px;height:8px;border-radius:50%;background:var(--gold);margin-top:5px;flex-shrink:0;}
.attime{font-size:11px;color:#999;white-space:nowrap;}
.alert-ok{background:#d1fae5;border-left:4px solid var(--success);color:#065f46;padding:10px 16px;border-radius:3px;margin-bottom:14px;font-size:13px;display:flex;align-items:center;gap:8px;}
.alert-err{background:#fee2e2;border-left:4px solid var(--danger);color:#991b1b;padding:10px 16px;border-radius:3px;margin-bottom:14px;font-size:13px;}
.mo{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;}
.mo.open{display:flex;}
.mbox{background:#fff;border-radius:4px;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,0.2);width:460px;max-width:95vw;}
.mhead{background:var(--navy);color:#fff;padding:12px 16px;display:flex;align-items:center;justify-content:space-between;}
.mhead h6{margin:0;font-size:14px;font-weight:700;}
.mcls{background:none;border:none;color:rgba(255,255,255,0.6);font-size:20px;cursor:pointer;}
.mbody{padding:18px 16px;}
.mfoot{padding:10px 16px;border-top:1px solid #eee;background:#fafafa;display:flex;gap:8px;justify-content:flex-end;}
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
    <a href="/admin/permohonan-masuk" class="ni active"><i class="bi bi-file-earmark-arrow-down"></i> Permohonan Masuk</a>
    <a href="/admin/permohonan-selesai" class="ni"><i class="bi bi-file-earmark-check"></i> Permohonan Selesai</a>
    <a href="/admin/audit-trail" class="ni"><i class="bi bi-clock-history"></i> Audit Trail</a>
    <div class="nl">Pengaturan</div>
    <a href="/admin/users" class="ni"><i class="bi bi-people"></i> Manajemen User</a>
    <a href="/admin/profil" class="ni"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <a href="/logout" class="ni" style="position:absolute;bottom:0;left:0;right:0;border-top:1px solid rgba(255,255,255,0.08);"><i class="bi bi-box-arrow-left"></i> Keluar</a>
  </nav>
</aside>

<div class="topbar">
  <a href="/admin/permohonan-masuk" class="btn-ol"><i class="bi bi-arrow-left"></i> Kembali</a>
  <div class="topbar-title">Detail Permohonan — <span class="kode"><?= esc($permohonan['kode_unik']) ?></span></div>
</div>

<div class="mc">

  <?php if(session()->getFlashdata('success')): ?>
  <div class="alert-ok"><i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')): ?>
  <div class="alert-err"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <div class="row g-3">
    <!-- KOLOM KIRI -->
    <div class="col-md-4">

      <!-- INFO PERMOHONAN -->
      <div class="sc">
        <div class="sh"><h6>Informasi Permohonan</h6></div>
        <div class="drow"><span class="dlabel">Kode Unik</span><span class="dval"><span class="kode"><?= esc($permohonan['kode_unik']) ?></span></span></div>
        <div class="drow"><span class="dlabel">Jenis Akta</span><span class="dval"><?= esc($permohonan['nama_akta']) ?></span></div>
        <div class="drow"><span class="dlabel">Tgl Pengajuan</span><span class="dval"><?= date('d/m/Y H:i', strtotime($permohonan['tanggal_pengajuan'])) ?> WIB</span></div>
        <div class="drow"><span class="dlabel">Nilai Transaksi</span><span class="dval"><?= $permohonan['nilai_transaksi'] ? 'Rp '.number_format($permohonan['nilai_transaksi'],0,',','.') : '-' ?></span></div>
        <div class="drow">
          <span class="dlabel">Status</span>
          <span class="dval">
            <?php
            $badgeClass = match($permohonan['status']) {
              'Pengajuan'        => 'bp',
              'Validasi Dokumen' => 'bv',
              'Revisi'           => 'br',
              'Selesai'          => 'bs',
              'Perhitungan Pajak'=> 'bpj',
              default            => 'bd',
            };
            ?>
            <span class="<?= $badgeClass ?>">● <?= esc($permohonan['status']) ?></span>
          </span>
        </div>
        <div class="drow"><span class="dlabel">Dokumen</span><span class="dval"><?= count($dokumen) ?> file terupload</span></div>
        <div style="padding:12px 16px;display:flex;gap:8px;flex-wrap:wrap;">
          <?php if($permohonan['status'] !== 'Selesai'): ?>
          <button class="btn-nv" style="font-size:11px;padding:5px 10px;" onclick="document.getElementById('mo-status').classList.add('open')">
            <i class="bi bi-arrow-repeat"></i> Ubah Status
          </button>
          <button class="btn-gd" style="font-size:11px;padding:5px 10px;" onclick="document.getElementById('mo-pajak').classList.add('open')">
            <i class="bi bi-calculator"></i> Hitung Pajak
          </button>
          <?php endif; ?>
        </div>
      </div>

      <!-- INFO PEMOHON -->
      <div class="sc">
        <div class="sh"><h6>Data Pemohon</h6></div>
        <div class="drow"><span class="dlabel">Nama</span><span class="dval"><?= esc($pemohon['nama']) ?></span></div>
        <div class="drow"><span class="dlabel">Email</span><span class="dval"><?= esc($pemohon['email']) ?></span></div>
        <div class="drow"><span class="dlabel">No. HP</span><span class="dval"><?= esc($pemohon['no_hp'] ?? '-') ?></span></div>
      </div>

      <!-- HASIL PAJAK -->
      <?php if($pembayaran): ?>
      <div class="sc">
        <div class="sh"><h6>Hasil Perhitungan Pajak</h6></div>
        <div style="padding:14px 16px;">
          <div class="pajak-box">
            <div class="prow"><span class="plabel">Nilai Transaksi</span><span>Rp <?= number_format($permohonan['nilai_transaksi'],0,',','.') ?></span></div>
            <div class="prow"><span class="plabel">NPOPTKP</span><span>Rp 80.000.000</span></div>
            <div class="prow"><span class="plabel">BPHTB (5%)</span><span style="color:var(--success);font-weight:700;">Rp <?= number_format($pembayaran['bphtb'],0,',','.') ?></span></div>
            <div class="prow"><span class="plabel">PPH (2.5%)</span><span style="color:var(--success);font-weight:700;">Rp <?= number_format($pembayaran['pph'],0,',','.') ?></span></div>
            <div class="prow"><span>Total Pajak</span><span>Rp <?= number_format($pembayaran['bphtb']+$pembayaran['pph'],0,',','.') ?></span></div>
          </div>
          <div style="margin-top:10px;font-size:12px;">
            Status Bayar:
            <strong style="color:<?= $pembayaran['status_bayar']==='Lunas'?'var(--success)':'var(--danger)' ?>;">
              <?= esc($pembayaran['status_bayar']) ?>
            </strong>
          </div>
        </div>
      </div>
      <?php endif; ?>

    </div>

    <!-- KOLOM KANAN -->
    <div class="col-md-8">

      <!-- DOKUMEN -->
      <div class="sc">
        <div class="sh">
          <h6>Dokumen yang Diunggah</h6>
          <span style="font-size:11px;color:rgba(255,255,255,0.6);"><?= count($dokumen) ?> file</span>
        </div>
        <?php if(empty($dokumen)): ?>
        <div style="text-align:center;padding:28px;color:#999;">Belum ada dokumen yang diunggah.</div>
        <?php else: ?>
        <table class="t">
          <thead>
            <tr><th>No</th><th>Jenis Dokumen</th><th>Nama File</th><th>Versi</th><th>Status</th><?php if($permohonan['status']!=='Selesai'): ?><th style="text-align:center;">Aksi Validasi</th><?php endif; ?></tr>
          </thead>
          <tbody>
            <?php
            $namaDoc = [
              'ktp'=>'KTP','kk'=>'Kartu Keluarga','npwp'=>'NPWP','buku_nikah'=>'Buku Nikah',
              'akta_lahir'=>'Akta Lahir','ajb'=>'AJB','sppt_pbb'=>'SPPT/PBB',
              'bukti_bayar_sppt'=>'Bukti Bayar SPPT/PBB','dasar_pengalihan'=>'Dasar Pengalihan Hak',
              'akta_kematian'=>'Akta Kematian','bukti_transaksi'=>'Bukti Transaksi',
              'bukti_kepemilikan'=>'Bukti Kepemilikan','surat_kuasa_waris'=>'Surat Kuasa Waris',
              'foto_lokasi'=>'Foto Lokasi','dokumen_lainnya'=>'Dokumen Pendukung Lainnya',
            ];
            foreach($dokumen as $i => $dok):
              $statusClass = match($dok['status_validasi']) {
                'Valid'  => 'dv', 'Revisi' => 'drs', default => 'dm',
              };
            ?>
            <tr>
              <td style="text-align:center;"><?= $i+1 ?></td>
              <td><?= esc($namaDoc[$dok['tipe_dokumen']] ?? $dok['tipe_dokumen']) ?></td>
              <td style="font-size:11px;color:#666;"><?= esc($dok['nama_file']) ?></td>
              <td style="text-align:center;">v<?= $dok['versi'] ?></td>
              <td><span class="<?= $statusClass ?>"><?= esc($dok['status_validasi']) ?></span></td>
              <?php if($permohonan['status']!=='Selesai'): ?>
              <td style="text-align:center;">
                <div style="display:flex;gap:5px;justify-content:center;">
                  <form method="POST" action="/admin/validasi-dokumen/<?= $dok['id'] ?>" style="display:inline;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="status_validasi" value="Valid">
                    <input type="hidden" name="kode_unik" value="<?= esc($permohonan['kode_unik']) ?>">
                    <input type="hidden" name="permohonan_id" value="<?= $permohonan['id'] ?>">
                    <button type="submit" class="btn-ok-sm"><i class="bi bi-check2"></i> Valid</button>
                  </form>
                  <form method="POST" action="/admin/validasi-dokumen/<?= $dok['id'] ?>" style="display:inline;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="status_validasi" value="Revisi">
                    <input type="hidden" name="kode_unik" value="<?= esc($permohonan['kode_unik']) ?>">
                    <input type="hidden" name="permohonan_id" value="<?= $permohonan['id'] ?>">
                    <button type="submit" class="btn-dk"><i class="bi bi-x"></i> Revisi</button>
                  </form>
                </div>
              </td>
              <?php endif; ?>
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
        <div style="padding:14px 16px;font-size:12.5px;color:#999;">Belum ada aktivitas tercatat.</div>
        <?php else: ?>
        <?php foreach($auditTrail as $log): ?>
        <div class="ati">
          <div class="atdot"></div>
          <div style="flex:1;"><?= esc($log['aktivitas']) ?></div>
          <div class="attime"><?= date('d/m H:i', strtotime($log['waktu'])) ?></div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>

<!-- MODAL UBAH STATUS -->
<div class="mo" id="mo-status">
  <div class="mbox">
    <div class="mhead"><h6>Ubah Status Permohonan</h6><button class="mcls" onclick="document.getElementById('mo-status').classList.remove('open')">×</button></div>
    <form method="POST" action="/admin/ubah-status/<?= $permohonan['id'] ?>">
      <?= csrf_field() ?>
      <input type="hidden" name="kode_unik" value="<?= esc($permohonan['kode_unik']) ?>">
      <div class="mbody">
        <p style="font-size:13px;color:#666;margin-bottom:14px;">Kode: <strong><?= esc($permohonan['kode_unik']) ?></strong> | Status saat ini: <strong><?= esc($permohonan['status']) ?></strong></p>
        <div style="margin-bottom:12px;">
          <label class="flabel">Status Baru <span style="color:red;">*</span></label>
          <select name="status" class="finput" required>
            <option value="">-- Pilih Status --</option>
            <?php foreach(['Pengajuan','Validasi Dokumen','Revisi','Perhitungan Pajak','Draft Akta','Review Notaris','Selesai'] as $s): ?>
            <option value="<?= $s ?>" <?= $permohonan['status']===$s?'selected':'' ?>><?= $s ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label class="flabel">Catatan (opsional)</label>
          <textarea name="catatan" class="finput" rows="3" placeholder="Catatan untuk pemohon..."></textarea>
        </div>
      </div>
      <div class="mfoot">
        <button type="submit" class="btn-nv"><i class="bi bi-check2"></i> Simpan</button>
        <button type="button" class="btn-ol" onclick="document.getElementById('mo-status').classList.remove('open')"><i class="bi bi-x"></i> Batal</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL KALKULATOR PAJAK -->
<div class="mo" id="mo-pajak">
  <div class="mbox" style="width:500px;">
    <div class="mhead"><h6>Kalkulator Pajak — BPHTB & PPH</h6><button class="mcls" onclick="document.getElementById('mo-pajak').classList.remove('open')">×</button></div>
    <form method="POST" action="/admin/hitung-pajak/<?= $permohonan['id'] ?>">
      <?= csrf_field() ?>
      <input type="hidden" name="kode_unik" value="<?= esc($permohonan['kode_unik']) ?>">
      <div class="mbody">
        <div class="row g-2 mb-3">
          <div class="col-md-6">
            <label class="flabel">Nilai Transaksi (Rp) *</label>
            <input type="number" name="nilai_transaksi" class="finput" placeholder="Contoh: 800000000" value="<?= $permohonan['nilai_transaksi'] ?? '' ?>" required>
          </div>
          <div class="col-md-6">
            <label class="flabel">NJOP (Rp)</label>
            <input type="number" name="njop" class="finput" id="inp-njop" placeholder="Opsional">
            <small style="font-size:11px;color:#999;">Sistem pakai nilai tertinggi antara keduanya</small>
          </div>
        </div>
        <div id="preview-pajak" style="display:none;">
          <div class="pajak-box">
            <div class="prow"><span class="plabel">Dasar Pengenaan Pajak</span><span id="pv-dasar">-</span></div>
            <div class="prow"><span class="plabel">NPOPTKP</span><span>Rp 80.000.000</span></div>
            <div class="prow"><span class="plabel">BPHTB (5%)</span><span id="pv-bphtb" style="color:var(--success);font-weight:700;">-</span></div>
            <div class="prow"><span class="plabel">PPH (2.5%)</span><span id="pv-pph" style="color:var(--success);font-weight:700;">-</span></div>
            <div class="prow"><span>Total Pajak</span><span id="pv-total">-</span></div>
          </div>
        </div>
      </div>
      <div class="mfoot">
        <button type="button" class="btn-gd" onclick="previewPajak()"><i class="bi bi-calculator"></i> Preview</button>
        <button type="submit" class="btn-nv"><i class="bi bi-check2"></i> Simpan & Hitung</button>
        <button type="button" class="btn-ol" onclick="document.getElementById('mo-pajak').classList.remove('open')"><i class="bi bi-x"></i> Batal</button>
      </div>
    </form>
  </div>
</div>

<script>
function fmt(n){return 'Rp '+Math.round(n).toLocaleString('id-ID');}
function previewPajak(){
  const n=parseFloat(document.querySelector('[name=nilai_transaksi]').value)||0;
  const j=parseFloat(document.getElementById('inp-njop').value)||0;
  const d=Math.max(n,j);
  const b=Math.max(0,(d-80000000)*0.05);
  const p=d*0.025;
  document.getElementById('pv-dasar').textContent=fmt(d);
  document.getElementById('pv-bphtb').textContent=fmt(b);
  document.getElementById('pv-pph').textContent=fmt(p);
  document.getElementById('pv-total').textContent=fmt(b+p);
  document.getElementById('preview-pajak').style.display='block';
}
// Auto buka modal jika ada hash
if(window.location.hash==='#ubah-status') document.getElementById('mo-status').classList.add('open');
if(window.location.hash==='#hitung-pajak') document.getElementById('mo-pajak').classList.add('open');
</script>
</body>
</html>