<h2>DATA SISWA</h2>
<form method="post">
  <p>NIS: <input type="text" name="nis" value="<?= isset($row)?$row->nis:set_value('nis') ?>"></p>
  <p>Nama: <input type="text" name="nama" value="<?= isset($row)?$row->nama:set_value('nama') ?>"></p>
  <p>Jenis Kelamin:
    <input type="radio" name="jenis_kelamin" value="PRIA" <?= isset($row)&&$row->jenis_kelamin=='PRIA'?'checked':''; ?>> PRIA
    <input type="radio" name="jenis_kelamin" value="WANITA" <?= isset($row)&&$row->jenis_kelamin=='WANITA'?'checked':''; ?>> WANITA
  </p>
  <p>Tempat Lahir: <input type="text" name="tempat_lahir" value="<?= isset($row)?$row->tempat_lahir:set_value('tempat_lahir') ?>"></p>
  <p>Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?= isset($row)?$row->tanggal_lahir:set_value('tanggal_lahir') ?>"></p>
  <p>Alamat: <input type="text" name="alamat" value="<?= isset($row)?$row->alamat:set_value('alamat') ?>"></p>
  <p>
    <button type="submit"><?= isset($row)?'Update':'Tambah' ?></button>
    <a href="<?= site_url('siswa'); ?>">Batal</a>
  </p>
</form>
