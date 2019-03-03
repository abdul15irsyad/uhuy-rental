-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2019 pada 19.12
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil_table`
--

CREATE TABLE `mobil_table` (
  `id_mobil` int(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `model` varchar(100) DEFAULT NULL,
  `jenis` varchar(100) NOT NULL,
  `transmisi` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `harga` int(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `mobil_table`
--

INSERT INTO `mobil_table` (`id_mobil`, `merk`, `model`, `jenis`, `transmisi`, `tahun`, `harga`, `foto`, `status`) VALUES
(1, 'Daihatsu', 'Terios R', 'MPV', 'Manual', 2016, 300000, 'img/gambar_mobil/daihatsuteriosr.jpg', 'available'),
(2, 'Toyota ', 'Alphard 2.5X', 'MPV', 'Automatic', 2018, 400000, 'img/gambar_mobil/alphard.png', 'available'),
(3, 'Toyota', 'Camry 2.5 G', 'Sedan', 'Manual', 2018, 300000, 'img/gambar_mobil/camry.jpg', 'available'),
(4, 'Toyota', 'Avanza 1.3 E', 'MPV', 'Manual', 2018, 150000, 'img/gambar_mobil/avanza.png', 'available'),
(5, 'Toyota ', 'Vellfire 2.5 G Limited', 'MPV', 'Manual', 2018, 400000, 'img/gambar_mobil/vellfire.png', 'available'),
(6, 'Toyota', 'Sienta E', 'MPV', 'Manual', 2018, 175000, 'img/gambar_mobil/sienta.png', 'available'),
(7, 'Toyota ', '86', 'Sport', 'Manual', 2018, 500000, 'img/gambar_mobil/toyota86.png', 'available'),
(9, 'Daihatsu', 'Xenia', 'MPV', 'Manual', 2017, 150000, 'img/gambar_mobil/daihatsuxenia.jpg', 'available'),
(10, 'Daihatsu ', 'Grand max Pickup', 'Pick up ', 'Manual', 2017, 200000, 'img/gambar_mobil/daihatsupickup.jpg', 'available'),
(11, 'Daihatsu ', 'Terios', 'MPV', 'Manual', 2017, 150000, 'img/gambar_mobil/daihatsuterios.jpg', 'available'),
(12, 'Daihatsu ', 'Sirion', 'MPV', 'Manual', 2017, 130000, 'img/gambar_mobil/daihatsusirion.jpg', 'available'),
(13, 'Daihatsu ', 'Sigra', 'MPV', 'Manual', 2017, 130000, 'img/gambar_mobil/daihatsusigra.jpg', 'available'),
(14, 'Daihatsu ', 'Grand max D', 'APV', 'Manual', 2017, 150000, 'img/gambar_mobil/daihatsugranmax.jpg', 'available'),
(15, 'Daihatsu ', 'Luxio X', 'APV', 'Manual', 2017, 150000, 'img/gambar_mobil/daihatsuluxio.jpg', 'available'),
(16, 'Honda ', 'Mobilia RS', 'MPV', 'Manual', 2018, 150000, 'img/gambar_mobil/hondamobilio.jpg', 'available'),
(17, 'Honda ', 'Jazz RS', 'MPV', 'Manual', 2018, 150000, 'img/gambar_mobil/hondajazz.jpg', 'available'),
(18, 'Honda ', 'Brio RS', 'MPV', 'Automatic', 2018, 150000, 'img/gambar_mobil/hondabrio.jpg', 'available'),
(19, 'Honda ', 'City E', 'Sedan', 'Manual', 2018, 150000, 'img/gambar_mobil/hondacity.jpg', 'available'),
(20, 'Honda  ', 'Accord Vti-L', 'Sedan', 'Automatic', 2017, 180000, 'img/gambar_mobil/hondaaccord.jpg', 'available'),
(21, 'Honda ', 'Odyssey Prestige', 'MPV', 'Automatic', 2017, 300000, 'img/gambar_mobil/hondaodyssey.jpg', 'available'),
(22, 'Honda  ', 'Brv E', 'MPV', 'Automatic', 2018, 200000, 'img/gambar_mobil/hondabrv.jpg', 'available'),
(23, 'Honda ', 'HRV 1.5 tipe S', 'MPV', 'Automatic', 2015, 130000, 'img/gambar_mobil/hondahrv.jpg', 'available'),
(24, 'Honda ', 'CRV 2.4 Prestige', 'MPV', 'Automatic', 2013, 100000, 'img/gambar_mobil/hondacrv.jpg', 'available'),
(25, 'Honda ', 'Freed Facelift psd E', 'SUV', 'Automatic', 2012, 100000, 'img/gambar_mobil/hondafreed.jpg', 'available'),
(26, 'Chevrolet', 'Orlando', 'MPV', 'Manual', 2018, 150000, 'img/gambar_mobil/chevorlando.jpg', 'available'),
(27, 'Chevrolet', 'Colorado', 'Truck', 'Manual', 2018, 250000, 'img/gambar_mobil/chevcolorado.jpg', 'rented'),
(28, 'Chevrolet', 'Trax', 'SUV', 'Manual', 2018, 200000, 'img/gambar_mobil/chevtrax.jpg', 'available'),
(29, 'Chevrolet', 'Trailblazer', 'SUV', 'Manual', 2018, 300000, 'img/gambar_mobil/chevtrailblazer.jpg', 'available'),
(30, 'Chevrolet', 'Spark', 'SUV', 'Manual', 2018, 160000, 'img/gambar_mobil/chevspark.jpg', 'available'),
(31, 'Chevrolet', 'Captiva', 'SUV', 'Manual', 2018, 160000, 'img/gambar_mobil/chevcaptiva.jpg', 'rented'),
(32, 'Toyota', 'Yaris', 'MPV', 'Manual', 2018, 250000, 'img/gambar_mobil/yaris.png', 'available'),
(33, 'suzuki', 'ertiga', 'mPV', 'Manual', 2017, 350000, 'img/gambar_mobil/ertiga.jpg', 'available');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_table`
--

CREATE TABLE `peminjaman_table` (
  `id_peminjaman` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_mobil` int(100) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman_table`
--

INSERT INTO `peminjaman_table` (`id_peminjaman`, `id_user`, `id_mobil`, `tgl_sewa`, `tgl_selesai`, `status_bayar`) VALUES
(27, 1, 31, '2019-01-02', '2019-01-29', 'belum'),
(28, 1, 27, '2019-01-02', '2019-01-29', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_table`
--

CREATE TABLE `user_table` (
  `id_user` int(100) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_table`
--

INSERT INTO `user_table` (`id_user`, `nama_depan`, `nama_belakang`, `username`, `password`, `no_telp`, `email`) VALUES
(1, 'Irsyad', 'Abdul', 'lubda', '123', '123456789012', 'abdulirsyad15@gmail.com'),
(2, 'Fathan', 'Radhiyan', 'fradhiyan', '123', '098765432111', 'fradhiyan@gmail.com'),
(3, 'Fildzah', 'Waalidein', 'fildzah', '123', '098767898765', 'waalidein@gmail.com'),
(4, 'Diana', 'Nur Yastin', 'diana', '123', '091234345890', 'nuryastin@gmail.com'),
(5, 'Tuanku', 'Raihan', 'tm.raihan', '123', '123123456789', 'tew@gmail.com'),
(6, 'Ghifary', 'Roosfadhila', 'dazen', '123', '321456987135', 'dazen@gmail.com'),
(7, 'Adi', 'Bangkit', 'adi.bangkai', '123', '098765432123', 'bangkit@gmail.com'),
(8, 'Naufal', 'Herdyputra', 'naufalhrd', '123', '123345679898', 'naufalhrd@gmail.com'),
(9, 'Amirul', 'Fathoni', 'kinsou', '123', '098765432152', 'kinsou@gmail.com'),
(10, 'Thoriq', 'Alkautsar', 'thor', '123', '123456789098', 'thor@gmail.com'),
(11, 'Septian', 'Puji', 'septianpuji', '123', '098765432124', 'septian@gmail.com'),
(12, 'Fikri', 'Islamy', 'bebem', '123', '123456786759', 'bebem@gmail.com'),
(13, 'Rahmat', 'Aziman', 'jimans', '123', '098765656543', 'jimans@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mobil_table`
--
ALTER TABLE `mobil_table`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `peminjaman_table`
--
ALTER TABLE `peminjaman_table`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mobil_table`
--
ALTER TABLE `mobil_table`
  MODIFY `id_mobil` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_table`
--
ALTER TABLE `peminjaman_table`
  MODIFY `id_peminjaman` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
