CREATE DATABASE IF NOT EXISTS diabict_db
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE diabict_db;

CREATE TABLE IF NOT EXISTS tabel_siswa (
  id INT(10) NOT NULL AUTO_INCREMENT,
  nis VARCHAR(15) NOT NULL,
  nama VARCHAR(30) NOT NULL,
  jenis_kelamin ENUM('PRIA','WANITA') NOT NULL,
  tempat_lahir VARCHAR(50) NOT NULL,
  tanggal_lahir DATE NOT NULL,
  alamat VARCHAR(100) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY unik_nis (nis)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- (opsional) seed contoh
INSERT INTO tabel_siswa (nis,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat) VALUES
('12345','Dika','PRIA','Bms','2007-05-12','Ajibarang'),
('67890','Naira','WANITA','Purwokerto','2007-08-03','Karanglewas');
