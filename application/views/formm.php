<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= isset($row)?'Edit':'Tambah' ?> Data Siswa</title>
  <style>
    body{margin:0;font-family:Segoe UI,Arial,sans-serif;background:#0f172a;color:#e2e8f0}
    header{background:#1e293b;padding:16px}
    header h1{margin:0;color:#38bdf8}
    a{color:#38bdf8;text-decoration:none}
    a:hover{text-decoration:underline}
    .container{max-width:800px;margin:24px auto;padding:0 16px}
    .card{background:#0e1525;border:1px solid #334155;border-radius:10px;padding:18px}
    .grid{display:grid;grid-template-columns:160px 1fr;gap:12px 16px}
    input[type=text],input[type=date]{width:100%;padding:10px;border-radius:8px;border:1px solid #334155;background:#0b1220;color:#e2e8f0}
    .radio{display:flex;gap:16px;align-items:center}
    .hint{color:#94a3b8}
    .err{color:#fda4af;display:block;margin-top:6px}
    .actions{margin-top:16px;display:flex;gap:10px}
    .btn{padding:8px 12px;border-radius:8px;border:1px solid #334155;text-decoration:none;color:#e2e8f0;background:#0b1220}
    .btn:hover{background:#111827}
    .btn-primary{border-color:#0284c7;background:#0ea5e9;color:#fff}
    .btn-danger{border-color:#b91c1c;background:#ef4444;color:#fff}
  </style>
</head>
<body>
<header>
  <h1><?= isset($row)?'Edit':'Tambah' ?> Data Siswa</h1>
</header>
<div class="container">
  <p><a href="<?= site_url('siswa'); ?>">← Kembali</a></p>

  <div class="card">
    <?php
      $is_edit = isset($row) && is_object($row);
      $action  = current_url();
      // closure HARUS membawa variabel lewat "use"
      $v = function($k,$d='') use ($is_edit, $row) {
        return set_value($k, ($is_edit && isset($row->$k)) ? $row->$k : $d);
      };
      $jk = $v('jenis_kelamin');
    ?>

    <?= form_open($action, ['autocomplete'=>'off']) ?>

      <div class="grid">
        <label for="nis">NIS</label>
        <div>
          <input type="text" id="nis" name="nis" maxlength="15" value="<?= $v('nis') ?>">
          <?= form_error('nis','<small class="err">','</small>'); ?>
        </div>

        <label for="nama">Nama</label>
        <div>
          <input type="text" id="nama" name="nama" maxlength="30" value="<?= $v('nama') ?>">
          <?= form_error('nama','<small class="err">','</small>'); ?>
        </div>

        <label>Jenis Kelamin</label>
        <div class="radio">
          <label><input type="radio" name="jenis_kelamin" value="PRIA"   <?= $jk=='PRIA'?'checked':''; ?>> PRIA</label>
          <label><input type="radio" name="jenis_kelamin" value="WANITA" <?= $jk=='WANITA'?'checked':''; ?>> WANITA</label>
          <?= form_error('jenis_kelamin','<small class="err">','</small>'); ?>
        </div>

        <label for="tempat_lahir">Tempat Lahir</label>
        <div>
          <input type="text" id="tempat_lahir" name="tempat_lahir" maxlength="50" value="<?= $v('tempat_lahir') ?>">
          <?= form_error('tempat_lahir','<small class="err">','</small>'); ?>
        </div>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <div>
          <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $v('tanggal_lahir') ?>">
          <small class="hint">Format yyyy-mm-dd (contoh: 2007-12-15)</small>
          <?= form_error('tanggal_lahir','<small class="err">','</small>'); ?>
        </div>

        <label for="alamat">Alamat</label>
        <div>
          <input type="text" id="alamat" name="alamat" maxlength="100" value="<?= $v('alamat') ?>">
          <?= form_error('alamat','<small class="err">','</small>'); ?>
        </div>
      </div>

      <div class="actions">
        <button type="submit" class="btn btn-primary"><?= $is_edit ? 'Simpan Perubahan' : 'Tambah Data' ?></button>
        <a class="btn" href="<?= site_url('siswa'); ?>">Batal</a>
      </div>

    <?= form_close() ?>
  </div>
</div>
</body>
</html>
