<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= isset($title)?html_escape($title).' | ':'' ?>Diabict — Data Siswa</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
<header class="topbar">
  <div class="wrapper">
    <div class="brand">🎓 Diabict</div>
    <nav>
      <a href="<?= site_url('siswa'); ?>">Beranda</a>
      <a class="btn btn-primary" href="<?= site_url('siswa/tambah'); ?>">+ Tambah</a>
    </nav>
  </div>
</header>
<main class="wrapper">
  <?php if($this->session->flashdata('ok')): ?>
    <div class="alert success"><?= $this->session->flashdata('ok'); ?></div>
  <?php endif; ?>
