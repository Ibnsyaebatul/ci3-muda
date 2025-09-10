<h2>Data Siswa</h2>
<p>Jumlah data: <?= $total ?> | <a href="<?= site_url('siswa/tambah'); ?>">[Tambah Data]</a></p>
<table border="1" cellpadding="5">
  <tr>
    <th>NIS</th><th>Nama</th><th>Jenis Kelamin</th>
    <th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Alamat</th><th>Aksi</th>
  </tr>
  <?php foreach($rows as $r): ?>
  <tr>
    <td><?= $r->nis ?></td>
    <td><?= $r->nama ?></td>
    <td><?= $r->jenis_kelamin ?></td>
    <td><?= $r->tempat_lahir ?></td>
    <td><?= $r->tanggal_lahir ?></td>
    <td><?= $r->alamat ?></td>
    <td>
      <a href="<?= site_url('siswa/edit/'.$r->id); ?>">Edit</a> |
      <a href="<?= site_url('siswa/hapus/'.$r->id); ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
