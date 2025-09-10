<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= isset($title)?html_escape($title).' | ':'' ?>Diabict — CI3 CRUD</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
<div class="container">
  <header class="card" style="display:flex;align-items:center;justify-content:space-between">
    <h1>Diabict — Data Siswa</h1>
    <nav>
      <a href="<?= site_url('siswa'); ?>">Beranda</a>
      <a href="<?= site_url('siswa/tambah'); ?>">Tambah</a>
    </nav>
  </header>
  <div style="height:12px"></div>
  <div class="card">
