<section class="card">
  <div class="card-head">
    <div>
      <h1>Data Siswa</h1>
      <p class="muted">Jumlah data: <b><?= (int)$total ?></b></p>
    </div>
    <a class="btn btn-primary" href="<?= site_url('siswa/tambah'); ?>">+ Tambah Data</a>
  </div>

  <div class="table-wrap">
    <table class="table">
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th style="width:140px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($rows)): ?>
          <tr><td colspan="7" class="empty">Belum ada data.</td></tr>
        <?php else: foreach($rows as $r): ?>
          <tr>
            <td><?= html_escape($r->nis) ?></td>
            <td><?= html_escape($r->nama) ?></td>
            <td>
              <span class="badge <?= $r->jenis_kelamin=='PRIA'?'blue':'pink' ?>">
                <?= html_escape($r->jenis_kelamin) ?>
              </span>
            </td>
            <td><?= html_escape($r->tempat_lahir) ?></td>
            <td><?= html_escape($r->tanggal_lahir) ?></td>
            <td><?= html_escape($r->alamat) ?></td>
            <td class="actions">
              <a class="btn btn-light" href="<?= site_url('siswa/edit/'.$r->id); ?>">Edit</a>
              <a class="btn btn-danger" href="<?= site_url('siswa/hapus/'.$r->id); ?>"
                 onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</section>
