USE djamil_gases;

DROP TABLE IF EXISTS `tabel_gases`;
CREATE TABLE `tabel_gases` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  gases,
  unit VARCHAR,
  stock INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at TIMESTAMP NULL,
  deleted_by VARCHAR(100) NULL,
  UNIQUE KEY `unique_gases` (`gases`),
  KEY `index_deleted_at` (`deleted_at`)

);

DROP TABLE IF EXISTS `tabel_kerjasama`;

DROP TABLE IF EXISTS `tabel_kerjasama_itemset`;

DROP TABLE IF EXISTS `tabel_konsolidasi`;

DROP TABLE IF EXISTS `tabel_konsolidasi_itemset`;

DROP TABLE IF EXISTS `tabel_pemesanan`;

DROP TABLE IF EXISTS `tabel_pemesanan_itemset`;
CREATE TABLE

DROP TABLE IF EXISTS `tabel_penerimaan`;
CREATE TABLE `tabel_penerimaan` (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  tanggal DATETIME NOT NULL,
  pesanan,
);

DROP TABLE IF EXISTS `tabel_penerimaan_itemset`;

-- Melakukan Definisi Tabel Pemakaian
-- Terdapat Ketentuan Unik : Kombinasi Unik : Tanggal + Waktu + Gas
DROP TABLE IF EXISTS `tabel_pemakaian`;
CREATE TABLE `tabel_pemakaian` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tanggal DATE NOT NULL,
  waktu ENUM('Pagi', 'Siang', 'Malam') NOT NULL,
  gases VARCHAR(50) NOT NULL,
  awal INT NOT NULL DEFAULT 0,
  akhir INT NOT NULL DEFAULT 0,
  usages INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_by VARCHAR(100),
  UNIQUE KEY unik_tanggal_waktu_gas (tanggal, waktu, gases)
);