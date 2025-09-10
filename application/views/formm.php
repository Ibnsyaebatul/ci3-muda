<?php
  $is_edit   = isset($row);
  $title_btn = $is_edit ? 'Update' : 'Tambah';
  $action    = current_url();
  $v = function($k,$d=''){ return set_value($k, $is_edit ? $row->$k : $d); };
?>
<h2 style="margin-top:0"><?= $is_edit ? 'Edit Data Siswa' : 'Tambah Data Siswa' ?></h2>

<?= form_open($action, ['autocomplete'=>'off']) ?>

  <div class="form-row">
    <label for="nis">NIS</label>
    <input type="text" id="nis" name="nis" maxlength="15" value="<?= $v('nis') ?>">
    <?= form_error('nis'); ?>
  </div>

  <div class="form-row">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" maxlength="30" value="<?= $v('nama') ?>">
    <?= form_error('nama'); ?>
  </div>

  <div class="form-row">
    <label>Jenis Kelamin</label>
    <label><input type="radio" name="jenis_kelamin" value="PRIA"   <?= $v('jenis_kelamin')=='PRIA'?'checked':'' ?>> PRIA</label>
    <label><input type="radio" name="jenis_kelamin" value="WANITA" <?= $v('jenis_kelamin')=='WANITA'?'checked':'' ?>> WANITA</label>
    <?= form_error('jenis_kelamin'); ?>
  </div>

  <div class="form-row">
    <label for="tempat_lahir">Tempat Lahir</label>
    <input type="text" id="tempat_lahir" name="tempat_lahir" maxlength="50" value="<?= $v('tempat_lahir') ?>">
    <?= form_error('tempat_lahir'); ?>
  </div>

  <div class="form-row">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $v('tanggal_lahir') ?>">
    <div class="error"><?= form_error('tanggal_lahir'); ?></div>
    <small class="error" style="display:block;margin-left:150px;">Format yyyy-mm-dd (contoh: 2007-12-15)</small>
  </div>

  <div class="form-row">
    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" maxlength="100" value="<?= $v('alamat') ?>">
    <?= form_error('alamat'); ?>
  </div>

  <div class="form-row">
    <button class="btn" type="submit"><?= $title_btn ?></button>
    <a class="btn" href="<?= site_url('siswa'); ?>">Batal</a>
  </div>

<?= form_close() ?>
