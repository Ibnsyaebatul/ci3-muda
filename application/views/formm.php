<?php
  $is_edit   = isset($row);
  $title_btn = $is_edit ? 'Simpan Perubahan' : 'Tambah Data';
  $action    = current_url();
  $v = function($k,$d=''){ return set_value($k, $is_edit ? $row->$k : $d); };
?>
<section class="card">
  <div class="card-head">
    <h1><?= $is_edit ? 'Edit Data Siswa' : 'Tambah Data Siswa' ?></h1>
    <a class="btn btn-light" href="<?= site_url('siswa'); ?>">← Kembali</a>
  </div>

  <?= form_open($action, ['autocomplete'=>'off', 'class'=>'form']) ?>

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
      <div class="radio-row">
        <label><input type="radio" name="jenis_kelamin" value="PRIA"   <?= $v('jenis_kelamin')=='PRIA'?'checked':'' ?>> PRIA</label>
        <label><input type="radio" name="jenis_kelamin" value="WANITA" <?= $v('jenis_kelamin')=='WANITA'?'checked':'' ?>> WANITA</label>
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

    <div class="form-actions">
      <button class="btn btn-primary" type="submit"><?= $title_btn ?></button>
      <a class="btn btn-light" href="<?= site_url('siswa'); ?>">Batal</a>
    </div>

  <?= form_close() ?>
</section>
