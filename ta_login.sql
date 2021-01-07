-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 07:01 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `id_bom` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_cm` int(11) NOT NULL,
  `kebutuhan` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `altered` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`id_bom`, `id_mobil`, `id_cm`, `kebutuhan`, `satuan`, `keterangan`, `altered`) VALUES
(3, 4, 2, 600, 'ML', 'Sekali Pakai', '2020-10-27 18:24:40'),
(6, 3, 2, 900, 'ML', 'Sekali Pakai', '2020-10-27 18:24:40'),
(7, 4, 1, 150, '', '', '2020-10-27 23:41:49'),
(10, 5, 1, 300, '', '', '2020-10-27 18:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `data_cm`
--

CREATE TABLE `data_cm` (
  `id_cm` int(11) NOT NULL,
  `part_number` varchar(12) NOT NULL,
  `part_name` varchar(50) NOT NULL,
  `komposisi` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(12) NOT NULL,
  `supplier` varchar(20) NOT NULL,
  `leadtime` int(11) NOT NULL,
  `ohi` int(11) NOT NULL,
  `keterangan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_cm`
--

INSERT INTO `data_cm` (`id_cm`, `part_number`, `part_name`, `komposisi`, `satuan`, `harga`, `supplier`, `leadtime`, `ohi`, `keterangan`) VALUES
(1, 'A0099897871', 'Sikaflex 250 DM5', 300, 'ML', 300000, 'S00918', 3, 0, ''),
(2, 'A0129891971', 'Efbond DA 620', 300, 'ML', 330000, 'S00918', 0, 0, ''),
(3, 'A0099897871', 'Efbond DA217', 300, 'ML', 250000, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

CREATE TABLE `data_mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(30) NOT NULL,
  `kode_mobil` varchar(15) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `jenis_mobil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`id_mobil`, `nama_mobil`, `kode_mobil`, `id_tipe`, `jenis_mobil`) VALUES
(2, 'GLE250d', 'W166', 3, 'SUV'),
(3, 'C300', 'W205', 1, 'sedan'),
(4, 'C200', 'W205', 1, 'sedan'),
(5, 'E350', 'W213', 2, 'sedan'),
(7, 'GLS400 AMG', 'X166', 3, 'SUV'),
(8, 'GLC200 AMG', 'X253', 3, 'SUV'),
(9, 'GLC200', 'X253', 3, 'SUV'),
(11, 'S400', 'S480', 4, 'Sedan');

-- --------------------------------------------------------

--
-- Table structure for table `data_supplier`
--

CREATE TABLE `data_supplier` (
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_supplier`
--

INSERT INTO `data_supplier` (`kode_supplier`, `nama_supplier`, `address`, `phone`) VALUES
('ad12', 'toko', 'jakarta', '123456789'),
('S00918', 'PT Grokindo', 'Jakarta', '021-5659340');

-- --------------------------------------------------------

--
-- Table structure for table `mrp`
--

CREATE TABLE `mrp` (
  `id_mrp` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `id_cm` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ro`
--

CREATE TABLE `ro` (
  `id_ro` int(11) NOT NULL,
  `id_mrp` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mpp`
--

CREATE TABLE `tb_mpp` (
  `id_mpp` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_bulan` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_mpp`
--

INSERT INTO `tb_mpp` (`id_mpp`, `tahun`, `id_bulan`, `id_mobil`, `jumlah`, `keterangan`) VALUES
(1, 2019, 1, 4, 10, ''),
(2, 2019, 2, 4, 20, ''),
(3, 2019, 3, 4, 30, ''),
(4, 2019, 4, 4, 20, ''),
(5, 2019, 1, 3, 10, ''),
(6, 2019, 2, 3, 20, ''),
(7, 2019, 3, 3, 0, ''),
(8, 2019, 4, 3, 0, ''),
(11, 2019, 5, 4, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe`
--

CREATE TABLE `tb_tipe` (
  `id_tipe` int(11) NOT NULL,
  `tipe_mobil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipe`
--

INSERT INTO `tb_tipe` (`id_tipe`, `tipe_mobil`) VALUES
(1, 'C-Class'),
(2, 'E-Class'),
(3, 'G-Class'),
(4, 'S-Class'),
(5, 'V-Class');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `departement` varchar(128) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `email`, `departement`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'PPC', 'ppc', 'ppc@email.com', 'PPC', 'default.jpg', '$2y$10$G4gmEpz4w8gH6vOMB244AeMhx17csMlKWoXdmoMsMtd2DbIUWy3ni', 2, 1, 1599402626),
(5, 'admin', 'admin', 'admin@mail.com', 'admin', 'default.jpg', '$2y$10$Mhm8DWzx4itMaVV9OyV7bePVujmFrd4RyGAysfAYPaTlJ5BfQWRjK', 1, 1, 1600235745),
(6, 'Quality', 'quality', 'quality@m.com', 'Quality', 'default.jpg', '$2y$10$u3iW15h0xzyoEMSyVMdTV.vFulJeFve1DaVq3g4IovETxU2HBXGoe', 3, 1, 1600336305),
(7, 'Engineering', 'engineering', 'engineering@mail.com', 'Engineering', 'default.jpg', '$2y$10$nArNURkIqhvkoRjOehsoWeakqrCavsEI8KlWQ4cD1JrJcK.PLfG7e', 4, 1, 1600338444);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'PPC'),
(3, 'Quality'),
(4, 'Engineering');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`id_bom`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_cm` (`id_cm`);

--
-- Indexes for table `data_cm`
--
ALTER TABLE `data_cm`
  ADD PRIMARY KEY (`id_cm`);

--
-- Indexes for table `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `mrp`
--
ALTER TABLE `mrp`
  ADD PRIMARY KEY (`id_mrp`);

--
-- Indexes for table `ro`
--
ALTER TABLE `ro`
  ADD PRIMARY KEY (`id_ro`);

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `tb_mpp`
--
ALTER TABLE `tb_mpp`
  ADD PRIMARY KEY (`id_mpp`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_bulan` (`id_bulan`);

--
-- Indexes for table `tb_tipe`
--
ALTER TABLE `tb_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `id_bom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `data_cm`
--
ALTER TABLE `data_cm`
  MODIFY `id_cm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mrp`
--
ALTER TABLE `mrp`
  MODIFY `id_mrp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ro`
--
ALTER TABLE `ro`
  MODIFY `id_ro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_mpp`
--
ALTER TABLE `tb_mpp`
  MODIFY `id_mpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_tipe`
--
ALTER TABLE `tb_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bom`
--
ALTER TABLE `bom`
  ADD CONSTRAINT `bom_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `data_mobil` (`id_mobil`),
  ADD CONSTRAINT `bom_ibfk_2` FOREIGN KEY (`id_cm`) REFERENCES `data_cm` (`id_cm`);

--
-- Constraints for table `tb_mpp`
--
ALTER TABLE `tb_mpp`
  ADD CONSTRAINT `tb_mpp_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `data_mobil` (`id_mobil`),
  ADD CONSTRAINT `tb_mpp_ibfk_2` FOREIGN KEY (`id_bulan`) REFERENCES `tb_bulan` (`id_bulan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
