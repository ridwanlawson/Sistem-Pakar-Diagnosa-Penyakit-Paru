-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2021 pada 12.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `idGambar` int(11) NOT NULL,
  `namaPelelang` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`idGambar`, `namaPelelang`, `email`, `gambar`) VALUES
(1, 'Ardiansyah', 'admin@admin.com', '28-02-2021-IMG20201212164322.jpg'),
(2, 'Rahmani', 'carlopicazzo@gmail.com', '28-02-2021-IMG20201212164317.jpg'),
(3, 'Ardiansyah', 'admin@admin.com', '28-02-2021-IMG_20200929_144410.jpg'),
(4, 'Suardinata', 'suardinata@gmail.com', '28-02-2021-sawit1.jpg'),
(5, 'Firman', 'firman@gmail.com', '28-02-2021-sawit1.jpg'),
(6, 'Eko', 'eko@gmail.com', '28-02-2021-sawit1.jpg'),
(7, 'Eko', 'eko@gmail.com', '28-02-2021-sawit2.jpg'),
(8, 'Eko', 'eko@gmail.com', '28-02-2021-sawit3.jpeg'),
(9, 'Doyok ', 'doyok@gmail.com', '28-02-2021-sawit1.jpg'),
(10, 'Doyok ', 'doyok@gmail.com', '28-02-2021-sawit2.jpg'),
(11, 'Doyok ', 'doyok@gmail.com', '28-02-2021-sawit3.jpeg'),
(12, 'egy', 'egy@gmail.com', '28-02-2021-sawit1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nm_gejala` text NOT NULL,
  `gambar_gej` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nm_gejala`, `gambar_gej`) VALUES
(1, 'peradangan kronis yang terjadi pada usus besar (kolon) dan rektum.', ''),
(2, 'saat diraba pada pinggiran tumor terasa keras.', ''),
(3, 'adanya kerak atau keropeng pada tepi merah bibir', ''),
(4, 'adanya penebalan atau adanya bercak putih pada mukosa bibir.', ''),
(5, 'adanya ruam berwarna merah(erythroplakia).', ''),
(6, 'adanya luka yang muncul pada bagian bawah lidah atau gusi', ''),
(7, 'adanya bercak mirip luka yang cekung di bagian tengah dan disertai rasa sakit\r\n', ''),
(8, 'rasa sakit pada tenggorokan', ''),
(9, 'lidah terasa nyeri berkepanjangan yang biasanya sampai terasa pada rahang', ''),
(10, 'lidah mati rasa dan sulit digerakkan', ''),
(11, 'dasar tukak berwarna merah kelabu, lemas menampakkan permukaan butiran kecil', ''),
(12, 'adasdasda', '03-03-2021-gambar3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `idLelang` int(11) NOT NULL,
  `desk` text NOT NULL,
  `stat` varchar(20) NOT NULL,
  `timestampp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`idLelang`, `desk`, `stat`, `timestampp`) VALUES
(3, 'Kali ini kita membutuhkan 2 ribu ton sawit usia 3 bulan dengan warna sudah membiru', 'aktif', '2021-01-16'),
(4, 'Lelang Tahun 2021 Membutuhkan Sawit usia 6 bulan dengan tingkat kematangan 20% sebanyak 2000 ton', 'nonaktif', '2021-02-28'),
(5, 'lelang tahun 2023 butuh sebanyak 2 ton kelapa sawit segar', 'nonaktif', '2021-02-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelelang`
--

CREATE TABLE `pelelang` (
  `idPelelang` int(11) NOT NULL,
  `idLelang` int(11) NOT NULL,
  `namaPelelang` varchar(100) NOT NULL,
  `nohpPelelang` varchar(20) NOT NULL,
  `emailPelelang` text NOT NULL,
  `alamat` text NOT NULL,
  `hargaLelang` double NOT NULL,
  `jumlahDisanggupi` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `timestampp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelelang`
--

INSERT INTO `pelelang` (`idPelelang`, `idLelang`, `namaPelelang`, `nohpPelelang`, `emailPelelang`, `alamat`, `hargaLelang`, `jumlahDisanggupi`, `status`, `timestampp`) VALUES
(1, 3, 'Ardiansyah', '081270389862', 'admin@admin.com', 'Jl Pulang', 50000, 200, 'selesai', '2021-02-28'),
(5, 3, 'Rahmani', '081270389862', 'carlopicazzo@gmail.com', 'Jl Pulang', 5000, 200, 'gagal', '2021-02-28'),
(6, 3, 'Ardiansyah', '081270389862', 'carlopicazzo@gmail.com', 'Jl Pulang', 5000, 200, 'gagal', '2021-02-28'),
(7, 3, 'Rahman', '081270389862', 'carlopicazzo@gmail.com', 'Jl Pulang', 5000, 200, 'selesai', '2021-02-28'),
(8, 3, 'Suardinata', '08123989891879', 'suardinata@gmail.com', 'Jl Pariaman 08', 80000, 1000, 'masuk', '2021-02-28'),
(11, 3, 'Firman', '08282112219321', 'firman@gmail.com', 'jl Bungus ', 3100, 2000, 'masuk', '2021-02-28'),
(12, 3, 'Eko', '0827868768768', 'eko@gmail.com', 'Jl Belimbing Wuluh No.1', 2500, 2000, 'masuk', '2021-02-28'),
(13, 4, 'Doyok ', '081262626726', 'doyok@gmail.com', 'Jl Kaki', 2500, 5000, 'selesai', '2021-02-28'),
(14, 3, 'egy', '082355467890', 'egy@gmail.com', 'jln.asrama', 2000, 1000, 'selesai', '2021-02-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemenang`
--

CREATE TABLE `pemenang` (
  `idPemenang` int(11) NOT NULL,
  `idPelelang` int(11) NOT NULL,
  `jumlahDisepakati` int(11) NOT NULL,
  `hargaDisepakati` double NOT NULL,
  `timestamppPemenang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemenang`
--

INSERT INTO `pemenang` (`idPemenang`, `idPelelang`, `jumlahDisepakati`, `hargaDisepakati`, `timestamppPemenang`) VALUES
(1, 1, 52000, 15600, '1975-00-00'),
(2, 2, 100000, 30000, '1975-00-00'),
(3, 3, 39000, 11700, '1975-00-00'),
(4, 7, 104000, 0, '2010-00-00'),
(5, 5, 75000, 22500, '1975-00-00'),
(6, 3, 250, 51000, '2021-02-28'),
(7, 1, 300, 49000, '2021-02-28'),
(8, 13, 5100, 2600, '2021-02-28'),
(9, 14, 1100, 2100, '2021-02-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `pencegahan` text NOT NULL,
  `penanggulangan` text NOT NULL,
  `gambar_pen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `ket`, `pencegahan`, `penanggulangan`, `gambar_pen`) VALUES
(2, 'kakap merah', '8', '29000', '', ''),
(3, 'cumi', '10', '50000', '', ''),
(4, 'karsinoma pada bibir', '-	kebiasaan merokok dan menghisap pipa\r\n-	terlihat terutama diantara pekerja yang bekerja di udara terbuka\r\n', 'makan timun', 'berobat ke dokter', '03-03-2021-gambar3.jpg'),
(5, 'karsinoma pada bibir', '-	kebiasaan merokok dan menghisap pipa\r\n-	terlihat terutama diantara pekerja yang bekerja di udara terbuka\r\n', 'makan timun', 'berobat ke dokter', '03-03-2021-gambar3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `init_perusahaan` varchar(10) NOT NULL,
  `desk_perusahaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nm_perusahaan`, `init_perusahaan`, `desk_perusahaan`) VALUES
(1, 'Sistem Pakar Diagnosa Kanker Mulut', 'SPDKM', 'Sistem Pakar Diagnosa Kanker Mulut adalah sebuah alat yang digunakan untuk mendeteksi penyakit kanker mulut \r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'admin2', 'carlopicazzo@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2'),
(3, 'aryo', 'aryo@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(4, 'cindy', 'cindy@gmail.com', '202cb962ac59075b964b07152d234b70', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`idGambar`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`idLelang`);

--
-- Indeks untuk tabel `pelelang`
--
ALTER TABLE `pelelang`
  ADD PRIMARY KEY (`idPelelang`);

--
-- Indeks untuk tabel `pemenang`
--
ALTER TABLE `pemenang`
  ADD PRIMARY KEY (`idPemenang`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `idGambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `lelang`
--
ALTER TABLE `lelang`
  MODIFY `idLelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelelang`
--
ALTER TABLE `pelelang`
  MODIFY `idPelelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemenang`
--
ALTER TABLE `pemenang`
  MODIFY `idPemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
