-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2021 pada 17.28
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gereja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` varchar(3) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
('ad', 'admin'),
('jem', 'jemaat'),
('kw', 'ketua wilayah'),
('mj', 'majelis'),
('tu', 'tata usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_kematian`
--

CREATE TABLE `role_kematian` (
  `id_roleK` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_kematian`
--

INSERT INTO `role_kematian` (`id_roleK`, `nama`) VALUES
(1, 'Makamkan'),
(2, 'Kremasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_atestasikeluar`
--

CREATE TABLE `tbl_atestasikeluar` (
  `idAtestasiK` int(11) NOT NULL,
  `noAtestasi` varchar(20) NOT NULL,
  `tglPengajuan` date NOT NULL,
  `id_jemaat` int(11) NOT NULL,
  `jemaatAlamatBaru` varchar(100) NOT NULL,
  `id_gereja` varchar(11) DEFAULT NULL,
  `namaGereja` varchar(50) DEFAULT NULL,
  `alamatGereja` varchar(100) DEFAULT NULL,
  `alasan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `statusJemaat` varchar(20) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `tgl_Persetujuan` date NOT NULL,
  `buktiAK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_atestasikeluar`
--

INSERT INTO `tbl_atestasikeluar` (`idAtestasiK`, `noAtestasi`, `tglPengajuan`, `id_jemaat`, `jemaatAlamatBaru`, `id_gereja`, `namaGereja`, `alamatGereja`, `alasan`, `status`, `statusJemaat`, `id_user`, `tgl_Persetujuan`, `buktiAK`) VALUES
(1, '2106220100', '2021-06-23', 1, 'Jl Asia Afrika Bandung', '3', '', '', 'Pekerjaan', 'Disetujui', 'Aktif', 'USR00003', '2021-06-23', 'picture/BAB IV.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_atestasimasuk`
--

CREATE TABLE `tbl_atestasimasuk` (
  `idAtestasiM` int(11) NOT NULL,
  `noAtestasi` varchar(20) NOT NULL,
  `tglPengajuan` date NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `noWA` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `gerejaAsal` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `pasFoto` varchar(50) NOT NULL,
  `scanAkteBaptisSidi` varchar(50) DEFAULT NULL,
  `suratKeterangan` varchar(50) DEFAULT NULL,
  `tgl_Persetujuan` date NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `statusJemaat` varchar(20) NOT NULL,
  `buktiAM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_atestasimasuk`
--

INSERT INTO `tbl_atestasimasuk` (`idAtestasiM`, `noAtestasi`, `tglPengajuan`, `namaLengkap`, `alamat`, `email`, `noTelp`, `noWA`, `agama`, `gerejaAsal`, `status`, `pasFoto`, `scanAkteBaptisSidi`, `suratKeterangan`, `tgl_Persetujuan`, `id_user`, `statusJemaat`, `buktiAM`) VALUES
(1, '2106220100', '2021-06-22', 'Dinda Ayu', 'Jl Pahlawan, Jakarta', 'dindaayuf8@gmail.com', '085156385827', '085156385827', 'Kristen', 'GKI Jakarta', 'Disetujui', 'picture/ContohFoto.png', 'picture/contohSuratSidi.jpg', 'picture/contohSuratAM.png', '2021-06-22', 'USR00003', '', 'picture/93sample-bootstrap.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gereja`
--

CREATE TABLE `tbl_gereja` (
  `id_gereja` varchar(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gereja`
--

INSERT INTO `tbl_gereja` (`id_gereja`, `nama`, `alamat`) VALUES
('1', 'GKI Maulana Yusuf', 'Jl. Maulana Yusuf No.20, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115'),
('10', 'GKP Dayeuhkolot', 'Jl. Sukabirus No.9, Citeureup, Kec. Dayeuhkolot, Bandung, Jawa Barat 40257'),
('2', 'Gereja Kristen Pasundan Jemaat Bandung', 'Jl Kebon Jati No 108'),
('3', 'Gereja Kristen Pasundan', 'Jl Gatot Subroto No 24'),
('4', 'Gereja Kristen Pasundan Cimahi', 'Jl. Gatot Subroto No.24, Karangmekar, Cimahi Tengah, Kota Cimahi, Jawa Barat'),
('5', 'GKI Kebonjati', 'Jl. Kebon Jati No.100, Kb. Jeruk, Kec. Andir, Kota Bandung, Jawa Barat 40181'),
('6', 'GKI Sudirman', 'Jl. Jend. Sudirman No.638, Dungus Cariang, Kec. Andir, Kota Bandung, Jawa Barat 40183'),
('7', 'GKI Pasirkoja', 'Jl. Terusan Pasirkoja No.57, Panjunan, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40233'),
('8', 'GKI Pasteur', 'Jl. Pasteur No.12A, Cipaganti, Kecamatan Coblong, Kota Bandung, Jawa Barat 40131'),
('9', 'GKP Ujungberung', 'Yonzipur Ujung Berung, Jl. A.H. Nasution No.KM.10, Pakemitan, Cinambo, Kota Bandung, Jawa Barat 45474');

--
-- Trigger `tbl_gereja`
--
DELIMITER $$
CREATE TRIGGER `tbl_gereja_BEFORE_INSERT` BEFORE INSERT ON `tbl_gereja` FOR EACH ROW BEGIN
	declare max_code varchar(11);
	declare new_code varchar(11);
	SELECT MAX(id_gereja) INTO max_code 
    FROM tbl_gereja;
	if isnull(max_code) THEN SET new_code=1;
	else SET new_code=max_code+1;
	END if;
	SET new.id_gereja=new_code;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelahiran`
--

CREATE TABLE `tbl_kelahiran` (
  `IdKelahiran` int(11) NOT NULL,
  `noAkte` int(30) NOT NULL,
  `namaAyah` varchar(50) NOT NULL,
  `namaIbu` varchar(50) NOT NULL,
  `namaAnak` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tglLahir` date NOT NULL,
  `goldar` varchar(10) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `tglPelapor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelahiran`
--

INSERT INTO `tbl_kelahiran` (`IdKelahiran`, `noAkte`, `namaAyah`, `namaIbu`, `namaAnak`, `jk`, `tglLahir`, `goldar`, `id_user`, `tglPelapor`) VALUES
(1, 2147483647, 'AyahTest', 'IbuTest', 'AnakTest', 'P', '2021-06-13', 'AB', 'USR00005', '2021-06-15'),
(2, 2147483645, 'AyahTest', 'IbuTest', 'AnakTest', 'L', '2021-06-19', 'AB', 'USR00005', '2021-06-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kematian`
--

CREATE TABLE `tbl_kematian` (
  `IdKematian` int(11) NOT NULL,
  `roleKematian` int(11) NOT NULL,
  `namaJemaat` varchar(50) NOT NULL,
  `alamatJemaat` varchar(100) NOT NULL,
  `tglMeninggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lokasiPemakaman` varchar(100) NOT NULL,
  `tglPemakaman` date NOT NULL,
  `yangMelayani` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kematian`
--

INSERT INTO `tbl_kematian` (`IdKematian`, `roleKematian`, `namaJemaat`, `alamatJemaat`, `tglMeninggal`, `keterangan`, `lokasiPemakaman`, `tglPemakaman`, `yangMelayani`) VALUES
(1, 1, 'JemaatTest', 'JemaatTest', '2021-06-19', 'Sakit', 'Lokasi Test', '2021-06-21', 'Pdt Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masterjemaat`
--

CREATE TABLE `tbl_masterjemaat` (
  `id_jemaat` int(11) NOT NULL,
  `jemaatNomor` int(50) NOT NULL,
  `idAtestasiM` int(11) NOT NULL,
  `jemaatTglLahir` date DEFAULT NULL,
  `jemaatAyahID` varchar(50) DEFAULT NULL,
  `jemaatAyahNama` varchar(100) DEFAULT NULL,
  `jemaatIbuID` varchar(50) DEFAULT NULL,
  `jemaatIbuNama` varchar(100) DEFAULT NULL,
  `jemaatStatusNikah` varchar(50) DEFAULT NULL,
  `jemaatGender` varchar(10) DEFAULT NULL,
  `jemaatGoldar` varchar(10) DEFAULT NULL,
  `jemaatKeanggotaan` varchar(50) DEFAULT NULL,
  `iduser` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_masterjemaat`
--

INSERT INTO `tbl_masterjemaat` (`id_jemaat`, `jemaatNomor`, `idAtestasiM`, `jemaatTglLahir`, `jemaatAyahID`, `jemaatAyahNama`, `jemaatIbuID`, `jemaatIbuNama`, `jemaatStatusNikah`, `jemaatGender`, `jemaatGoldar`, `jemaatKeanggotaan`, `iduser`) VALUES
(1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'USR00005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL DEFAULT 'USR00001',
  `nama` varchar(35) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `id_role` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `foto`, `status`, `id_role`) VALUES
('USR00001', 'Amir', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Aktif', 'ad'),
('USR00002', 'James', 'kw', '6ae36186a6c97b017319bc5ec47fe5d0', NULL, 'Aktif', 'kw'),
('USR00003', 'Made', 'majelis', '6375d4cda4127202fb101f21daca5175', NULL, 'Aktif', 'mj'),
('USR00004', 'Jessica', 'tata usaha', '4301c7a3297ae3928e22129fea253fa9', NULL, 'Aktif', 'tu'),
('USR00005', 'Dinda Ayu', '2106220100', 'f6473c16da840038fcee41374013f964', NULL, 'Aktif', 'jem');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `autonumber` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
	declare max_code varchar(8);
    declare old_code varchar(8);
    declare old_code1 varchar(8);
	declare new_code varchar(8);
	SELECT MAX(id_user)INTO max_code FROM user;
	if isnull(max_code) THEN SET new_code=concat("USR","00001");
	else  
    SET old_code=right(max_code,3)+1;
    SET old_code1=concat("00000",old_code);
    SET new_code =concat('USR',RIGHT(old_code1,5));
	END if;
	SET new.id_user=new_code;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `role_kematian`
--
ALTER TABLE `role_kematian`
  ADD PRIMARY KEY (`id_roleK`);

--
-- Indeks untuk tabel `tbl_atestasikeluar`
--
ALTER TABLE `tbl_atestasikeluar`
  ADD PRIMARY KEY (`idAtestasiK`),
  ADD KEY `FK_AK_master` (`id_jemaat`),
  ADD KEY `FK_AK_gereja` (`id_gereja`);

--
-- Indeks untuk tabel `tbl_atestasimasuk`
--
ALTER TABLE `tbl_atestasimasuk`
  ADD PRIMARY KEY (`idAtestasiM`);

--
-- Indeks untuk tabel `tbl_gereja`
--
ALTER TABLE `tbl_gereja`
  ADD PRIMARY KEY (`id_gereja`);

--
-- Indeks untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD PRIMARY KEY (`IdKelahiran`);

--
-- Indeks untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD PRIMARY KEY (`IdKematian`),
  ADD KEY `FK_kematian_roleK` (`roleKematian`);

--
-- Indeks untuk tabel `tbl_masterjemaat`
--
ALTER TABLE `tbl_masterjemaat`
  ADD PRIMARY KEY (`id_jemaat`),
  ADD KEY `FK_master_AM` (`idAtestasiM`),
  ADD KEY `FK_master_user` (`iduser`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `role_kematian`
--
ALTER TABLE `role_kematian`
  MODIFY `id_roleK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_atestasikeluar`
--
ALTER TABLE `tbl_atestasikeluar`
  MODIFY `idAtestasiK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_atestasimasuk`
--
ALTER TABLE `tbl_atestasimasuk`
  MODIFY `idAtestasiM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  MODIFY `IdKelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  MODIFY `IdKematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_masterjemaat`
--
ALTER TABLE `tbl_masterjemaat`
  MODIFY `id_jemaat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_atestasikeluar`
--
ALTER TABLE `tbl_atestasikeluar`
  ADD CONSTRAINT `FK_AK_gereja` FOREIGN KEY (`id_gereja`) REFERENCES `tbl_gereja` (`id_gereja`),
  ADD CONSTRAINT `FK_AK_master` FOREIGN KEY (`id_jemaat`) REFERENCES `tbl_masterjemaat` (`id_jemaat`);

--
-- Ketidakleluasaan untuk tabel `tbl_kematian`
--
ALTER TABLE `tbl_kematian`
  ADD CONSTRAINT `FK_kematian_roleK` FOREIGN KEY (`roleKematian`) REFERENCES `role_kematian` (`id_roleK`);

--
-- Ketidakleluasaan untuk tabel `tbl_masterjemaat`
--
ALTER TABLE `tbl_masterjemaat`
  ADD CONSTRAINT `FK_master_AM` FOREIGN KEY (`idAtestasiM`) REFERENCES `tbl_atestasimasuk` (`idAtestasiM`),
  ADD CONSTRAINT `FK_master_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
