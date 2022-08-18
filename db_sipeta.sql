-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2022 pada 17.25
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipeta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peta`
--

CREATE TABLE `tb_peta` (
  `id_peta` int(11) NOT NULL,
  `Nama_Proyek_Kegiatan` varchar(255) NOT NULL,
  `Nomor` varchar(255) NOT NULL,
  `Tahun` varchar(255) NOT NULL,
  `Kecamatan` varchar(255) NOT NULL,
  `Desa` varchar(255) NOT NULL,
  `Kondisi_Fisik_Peta` varchar(255) NOT NULL,
  `file_gambar` varchar(255) NOT NULL,
  `File_dwg` varchar(255) NOT NULL,
  `File_geojson` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peta`
--

INSERT INTO `tb_peta` (`id_peta`, `Nama_Proyek_Kegiatan`, `Nomor`, `Tahun`, `Kecamatan`, `Desa`, `Kondisi_Fisik_Peta`, `file_gambar`, `File_dwg`, `File_geojson`) VALUES
(1, 'TRANS_UPT_TANJUNG_DEWA', '27', '1994', 'Takisung', 'Tanjung Dewa', 'Baik', '', 'file dwg', 'file json'),
(15, 'ubah dengan gambar cek error', '21', '2019', 'pelaihari', 'pelaihari', 'Rusak', '21_2019_ubah dengan gambar_pelaihari_pelaihari.jpg', '0', '0'),
(17, 'ptsl', '1', '2121', 'tambahng ulang', 'kayu habang', 'Baik', '1_2121_ptsl_tambahng ulang_kayu habang.jpg', '0', '0'),
(18, 'trans', '2', '2018', 'batu utngku', 'batu ampar', 'Baik', '2_2018_trans_batu utngku_batu ampar.jpg', '', ''),
(19, 'l', 'j', 'a', 'k', 'l', 'Baik', 'j_a_l_k_l.jpg', 'Array', ''),
(20, 'tcssp', '201', '2019', 'pelaihari', 'ambungan', 'Baik', '201_2019_tcssp_pelaihari_ambungan.jpg', 'PBT 305.dwg', 'heo.geojson'),
(21, 'j', 'kA', 'F', 'E', 'W', 'Baik', 'kA_F_j_E_W.', '', ''),
(22, 'tes ubah tanpa gambar', '1.4.1.1', '2022', 'pelaihari', 'kuringkit', 'Rusak', '1.4.1_2022_tes ubah_pelaihari_kuringkit.jpg', 'PBT 304.dwg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(3) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'coba', 'admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_peta`
--
ALTER TABLE `tb_peta`
  ADD PRIMARY KEY (`id_peta`),
  ADD KEY `id_peta` (`id_peta`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_peta`
--
ALTER TABLE `tb_peta`
  MODIFY `id_peta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
