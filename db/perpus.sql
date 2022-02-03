-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2022 pada 19.39
-- Versi server: 10.1.37-MariaDB
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
-- Database: `uasputri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `kota_terbit` varchar(64) NOT NULL,
  `status` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_masuk` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `pengarang`, `penerbit`, `kategori`, `tahun_terbit`, `kota_terbit`, `status`, `deskripsi`, `tgl_masuk`) VALUES
(1, 'Nadiem Makarim', 'Andi Darmawan, dkk', 'Andaliman Books', 'Biografi', '2019', 'Yogyakarta', 'Dipinjam', 'Usia Nadiem baru 34 tahun saat Gojek meraih predikat decacorn, dan dia telah duduk sebagai salah satu orang terkaya di Indonesia versi majalah Globe Asia. Pencapaian tentu bukan sebatas nilai materi. Tahun 2019, Nadiem mendapat tugas sebagai Menteri Pendidikan dan Kebudayaan RI pada kabinet Indonesia Maju.  Bagaimana masa kecil dan dunia pendidikan membentuk Nadiem menjadi pribadi yang penuh inovasi? Bagaimana cerita seorang pemuda lulusan harvard memulai mimpinya dari obrolan di pangkalan ojek? Ada kegagalan dan kepahitan yang harus dilalui berkali-kali untuk sampai ke puncak pencapaian!', '2022-02-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `username_peminjam` varchar(128) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` varchar(64) NOT NULL,
  `tgl_pengembalian` varchar(64) NOT NULL,
  `tgl_kembali` varchar(64) NOT NULL,
  `denda_terlambat` int(11) NOT NULL,
  `denda_total` varchar(32) NOT NULL,
  `status_pinjaman` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `username_peminjam`, `id_buku`, `tgl_pinjam`, `tgl_pengembalian`, `tgl_kembali`, `denda_terlambat`, `denda_total`, `status_pinjaman`) VALUES
(20, 'saswita', 1, '2022-02-02', '2022-02-05', '2022-02-02', 2000, '0', 'Sudah Dikembalikan'),
(21, 'admin', 1, '2022-02-01', '2022-02-04', 'Belum Kembali', 2000, 'Belum Kembali', 'Belum Kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'devk@gmail.com', 'Developer Kampoeng', 1, 'Staff Perpustakaann'),
('saswita', 'bcd724d15cde8c47650fda962968f102', 'siswa@siswa.com', 'Putri Dewantika', 2, 'Saya siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
