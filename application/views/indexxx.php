<?php if($this->session->flashdata('ok')): ?>
  <div class="flash"><?= $this->session->flashdata('ok'); ?></div>
<?php endif; ?>

<p>Jumlah data: <b><?= (int)$total ?></b></p>

<p>
  <a class="btn" href="<?= site_url('siswa/tambah'); ?>">+ Tambah Data</a>
</p>

<table>
  <tr>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Alamat</th>
    <th>Aksi</th>
  </tr>
  <?php foreach($rows as $r): ?>
  <tr>
    <td><?= html_escape($r->nis) ?></td>
    <td><?= html_escape($r->nama) ?></td>
    <td><?= html_escape($r->jenis_kelamin) ?></td>
    <td><?= html_escape($r->tempat_lahir) ?></td>
    <td><?= html_escape($r->tanggal_lahir) ?></td>
    <td><?= html_escape($r->alamat) ?></td>
    <td style="white-space:nowrap">
      <a class="btn" href="<?= site_url('siswa/edit/'.$r->id); ?>">Edit</a>
      <a class="btn btn-danger" href="<?= site_url('siswa/hapus/'.$r->id); ?>"
         onclick="return confirm('Yakin hapus data ini?')">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
