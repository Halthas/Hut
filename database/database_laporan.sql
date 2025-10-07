USE djamil_gases;

CREATE OR REPLACE VIEW view_daily_usage AS
  SELECT
    tanggal,
    gases,
    SUM(CASE WHEN waktu = 'Pagi' THEN usages ELSE 0 END) AS Pagi,
    SUM(CASE WHEN waktu = 'Siang' THEN usages ELSE 0 END) AS Siang,
    SUM(CASE WHEN waktu = 'Malam' THEN usages ELSE 0 END) AS Malam,
    SUM(usages) AS total_usages
  FROM tabel_pemakaian
  GROUP BY tanggal, gases
  ORDER BY tanggal, gases;

CREATE OR REPLACE VIEW view_monthly_usage AS
  SELECT
    DATE_FORMAT(tanggal, '%Y-%m') AS bulan,
    gases,
    SUM(CASE WHEN waktu = 'Pagi' THEN usages ELSE 0 END) AS Pagi,
    SUM(CASE WHEN waktu = 'Siang' THEN usages ELSE 0 END) AS Siang,
    SUM(CASE WHEN waktu = 'Malam' THEN usages ELSE 0 END) AS Malam,
    SUM(usages) AS total_usages
  FROM tabel_pemakaian
  GROUP BY DATE_FORMAT(tanggal, '%Y-%m'), gases
  ORDER BY bulan, gases;

CREATE OR REPLACE VIEW view_yearly_usage AS
  SELECT
    YEAR(tanggal) AS tahun,
    gases,
    SUM(CASE WHEN waktu = 'Pagi' THEN usages ELSE 0 END) AS Pagi,
    SUM(CASE WHEN waktu = 'Siang' THEN usages ELSE 0 END) AS Siang,
    SUM(CASE WHEN waktu = 'Malam' THEN usages ELSE 0 END) AS Malam,
    SUM(usages) AS total_usages
  FROM tabel_pemakaian
  GROUP BY YEAR(tanggal), gases
  ORDER BY tahun, gases;