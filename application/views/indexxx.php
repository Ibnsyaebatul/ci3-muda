<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Siswa</title>
  <style>
    body{margin:0;font-family:Segoe UI,Arial,sans-serif;background:#0f172a;color:#e2e8f0}
    header{background:#1e293b;padding:16px}
    header h1{margin:0;color:#38bdf8}
    a{color:#38bdf8;text-decoration:none}
    a:hover{text-decoration:underline}
    .container{max-width:1000px;margin:24px auto;padding:0 16px}
    .btn{padding:6px 12px;border-radius:6px;border:1px solid #334155;display:inline-block;font-size:14px}
    .btn-primary{background:#0ea5e9;border-color:#0284c7;color:#fff}
    .btn-primary:hover{background:#0284c7}
    .btn-danger{background:#ef4444;border-color:#b91c1c;color:#fff}
    .btn-danger:hover{background:#b91c1c}
    .btn-light{background:#334155;color:#e2e8f0}
    table{width:100%;border-collapse:collapse;margin-top:16px}
    th,td{padding:10px;border-bottom:1px solid #334155;text-align:left}
    th{background:#1e293b;color:#94a3b8}
    tr:hover td{background:#1e293b}
    .badge{padding:2px 8px;border-radius:12px;font-size:12px}
    .blue{background:#1d4ed8;color:#fff}
    .pink{background:#db2777;color:#fff}
    .flash{padding:10px;border-radius:6px;margin:10px 0;background:#064e3b;color:#a7f3d0}
    .empty{color:#94a3b8;text-align:center;padding:20px}
  </style>
</head>
<body>
  <header>
    <h1>Data Siswa</h1>
  </header>
  <div class="container">

    <?php if($this->session->flashdata('ok')): ?>
      <div class="flash"><?= $this->session->flashdata('ok'); ?></div>
    <?php endif; ?>

    <p>Jumlah data: <b><?= (int)$total ?></b></p>
    <a class="btn btn-primary" href="<?= site_url('siswa/tambah'); ?>">+ Tambah Data</a>

    <table>
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if(empty($rows)): ?>
          <tr><td colspan="7" class="empty">Belum ada data</td></tr>
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
            <td>
              <a class="btn btn-light" href="<?= site_url('siswa/edit/'.$r->id); ?>">Edit</a>
              <a class="btn btn-danger" href="<?= site_url('siswa/hapus/'.$r->id); ?>"
                 onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
