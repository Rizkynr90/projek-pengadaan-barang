-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2021 pada 11.17
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rizkyn_pengadaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_barang` char(7) DEFAULT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_user`, `id_barang`, `jumlah_barang`, `tanggal_keluar`) VALUES
(1, 101, 'A001', 164, '2021-05-05'),
(2, 101, 'A001', 2121, '2021-09-29'),
(3, 101, 'B881', 455, '2021-05-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_barang` char(7) DEFAULT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_supplier`, `id_user`, `id_barang`, `jumlah_masuk`, `tanggal_masuk`) VALUES
(2, 55512, 101, 'A001', 124, '2021-03-03'),
(3, 0, 101, 'B881', 451, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(30) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
('B001', 'Minuman'),
('B002', 'Makanan'),
('G551', 'Alat Elektronik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanan_barang`
--

CREATE TABLE `penyimpanan_barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `id_satuan` varchar(20) DEFAULT NULL,
  `id_jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyimpanan_barang`
--

INSERT INTO `penyimpanan_barang` (`id_barang`, `nama_barang`, `stok_barang`, `id_satuan`, `id_jenis`) VALUES
('A001', 'Televisi', 200, 'S001', 'B001'),
('B881', 'Komputer', 56, 'B002', 'B002'),
('C556', 'Laptop', 325, 'S001', 'B002'),
('D335', 'Playstation 6', 64, 'H882', 'B001'),
('X441', 'Motor', 44, 'S001', 'G551');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id_satuan` varchar(20) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_satuan`, `nama_satuan`) VALUES
('B002', 'kilogram'),
('G663', 'Ton'),
('H882', 'Mile'),
('S001', 'Liter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(0, 'Afif Riagama', '08372232112', 'Kalimantan'),
(1341, 'Rico Aljabar', '0873212321', 'Tangerang'),
(15564, 'Winda Al Amanah', '024546435', 'Bandung'),
(55123, 'Saka Falevi', '053342333', 'Sulawesi'),
(55512, 'Nada Lesmana', '089434536', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(101, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `penyimpanan_barang`
--
ALTER TABLE `penyimpanan_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `penyimpanan_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `penyimpanan_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `penyimpanan_barang`
--
ALTER TABLE `penyimpanan_barang`
  ADD CONSTRAINT `penyimpanan_barang_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_barang` (`id_satuan`),
  ADD CONSTRAINT `penyimpanan_barang_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
