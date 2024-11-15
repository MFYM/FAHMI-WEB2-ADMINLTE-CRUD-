-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 04:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan_0051`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertTransaksi` (IN `p_kode_barang` VARCHAR(25), IN `p_id_pelanggan` VARCHAR(25), IN `p_jumlah` INT)   BEGIN
    DECLARE v_total_harga DECIMAL(15,2);
    DECLARE v_harga DECIMAL(10,2);
    
    
    SELECT harga INTO v_harga FROM produk WHERE kode_barang = p_kode_barang;
    
    
    SET v_total_harga = v_harga * p_jumlah;
    
    
    INSERT INTO transaksi (kode_barang, id_pelanggan, jumlah, total_harga)
    VALUES (p_kode_barang, p_id_pelanggan, p_jumlah, v_total_harga);
    
    
    SET @last_id = LAST_INSERT_ID();
    
    
    INSERT INTO items (id_transaksi, kode_barang, nama_barang, jumlah, harga, total_harga)
    VALUES (@last_id, p_kode_barang, (SELECT nama_barang FROM produk WHERE kode_barang = p_kode_barang), p_jumlah, v_harga, v_total_harga);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `id_transaksi`, `kode_barang`, `nama_barang`, `jumlah`, `harga`, `total_harga`, `deskripsi`, `tanggal`) VALUES
(1, 1, 'A0054', 'ANGGUR MERAH', 10, 90000.00, 900000.00, 'ANGGUR SEHAT', '2024-11-15 22:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`) VALUES
('P-001', 'Fahmi Yusuf', 'Medono, Kota Pekalongan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `foto_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`foto_barang`, `kode_barang`, `nama_barang`, `harga`, `stok`, `deskripsi`) VALUES
('672aef9b7da98_sale_daster_vneck.jpg', 'A-002', 'DASTERR', 135000.00, 18, 'Daster nyaman dipakai'),
('6728a6a40d622_WhatsApp Image 2024-11-03 at 03.24.23_41bd66a2.jpg', 'A001', 'Batik V-Neck', 125000.00, 100, 'Lebar dada 70'),
('67375e277e50c_WhatsApp Image 2024-11-03 at 03.24.22_3624251d.jpg', 'A0022', 'Korek Api ', 5000.00, 0, 'Korek Gas'),
('67348d29cb549_Daster Kekinian 3.jpg', 'A0039', 'ROKOK SIGNATURE', 25000.00, 40, 'ROKOK COWO PEKERJA KERAS'),
('67348c3be1596_Daster Kekinian 5.jpeg', 'A0054', 'ANGGUR MERAH', 90000.00, 4, 'ANGGUR SEHAT'),
('67348c1054165_Daster Kekinian 4.jpeg', 'A0055', 'KAWA - KAWA', 900000.00, 46, 'ENAK'),
('67348d515acaf_Daster Kekinian 2.jpeg', 'A0066', 'ROKOK LA ICE', 38000.00, 20, 'ROKOK CEWE SOLEHOT'),
('67348c9fe76df_WhatsApp Image 2024-11-03 at 03.24.35_e61e6590.jpg', 'A0076', 'ROKOK SURYA 16', 38000.00, 33, 'ROKOK COWO GANTENG'),
('67348cc63aff0_batik ciri khas.jpg', 'A0088', 'ROKOK SAMPOERNA MILD', 39000.00, 55, 'ROKOK BOS BATIK'),
('67332ca1b2ffc_Daster Kekinian 4.jpeg', 'A0089', 'Dompet', 250000.00, 43, 'Dompet Halus tebal dan nyaman'),
('67348cfc440ef_sale_daster_vneck.jpg', 'A0093', 'ROKOK DIO', 10000.00, 30, 'ROKOK TEMBAKAU KETAPANG'),
('67348c6b90ac1_Daster Kekinian 4.jpeg', 'A0097', 'TOPI MIRING', 95000.00, 42, 'MINUMAN SEHAT BERKHASIAT');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `id_pelanggan` varchar(25) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` decimal(15,2) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_barang`, `id_pelanggan`, `jumlah`, `total_harga`, `tanggal`) VALUES
(1, 'A0054', 'P-001', 10, 900000.00, '2024-11-15 22:08:59');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `after_insert_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
    INSERT INTO items (id_transaksi, kode_barang, nama_barang, jumlah, harga, total_harga, deskripsi)
    VALUES (
        NEW.id_transaksi,
        NEW.kode_barang,
        (SELECT nama_barang FROM produk WHERE kode_barang = NEW.kode_barang),
        NEW.jumlah,
        (SELECT harga FROM produk WHERE kode_barang = NEW.kode_barang),
        NEW.total_harga,
        (SELECT deskripsi FROM produk WHERE kode_barang = NEW.kode_barang)
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_keluar` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk set stok = stok - NEW.jumlah
    WHERE kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
    DECLARE harga DECIMAL(10, 2);
    SELECT p.harga
    INTO harga
    FROM produk p
    WHERE p.kode_barang = NEW.kode_barang;
    SET NEW.total_harga = harga * NEW.jumlah;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_detail_transaksi` (
`id_transaksi` int(11)
,`kode_barang` varchar(25)
,`nama_barang` varchar(100)
,`id_pelanggan` varchar(25)
,`nama_pelanggan` varchar(50)
,`alamat` text
,`jumlah` int(11)
,`total_harga` decimal(20,2)
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`tanggal` datetime
,`id_transaksi` int(11)
,`nama_barang` varchar(100)
,`nama_pelanggan` varchar(50)
,`jumlah` int(11)
,`total_harga` decimal(20,2)
);

-- --------------------------------------------------------

--
-- Structure for view `view_detail_transaksi`
--
DROP TABLE IF EXISTS `view_detail_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_transaksi`  AS SELECT `t`.`id_transaksi` AS `id_transaksi`, `p`.`kode_barang` AS `kode_barang`, `p`.`nama_barang` AS `nama_barang`, `c`.`id_pelanggan` AS `id_pelanggan`, `c`.`nama_pelanggan` AS `nama_pelanggan`, `c`.`alamat` AS `alamat`, `t`.`jumlah` AS `jumlah`, `t`.`jumlah`* `p`.`harga` AS `total_harga`, `t`.`tanggal` AS `tanggal` FROM ((`transaksi` `t` join `produk` `p` on(`t`.`kode_barang` = `p`.`kode_barang`)) join `pelanggan` `c` on(`t`.`id_pelanggan` = `c`.`id_pelanggan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `t`.`tanggal` AS `tanggal`, `t`.`id_transaksi` AS `id_transaksi`, `p`.`nama_barang` AS `nama_barang`, `pl`.`nama_pelanggan` AS `nama_pelanggan`, `t`.`jumlah` AS `jumlah`, `t`.`jumlah`* `p`.`harga` AS `total_harga` FROM ((`transaksi` `t` join `produk` `p` on(`t`.`kode_barang` = `p`.`kode_barang`)) join `pelanggan` `pl` on(`t`.`id_pelanggan` = `pl`.`id_pelanggan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `items_ibfk_1` (`id_transaksi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `transaksi_ibfk_2` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `produk` (`kode_barang`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `produk` (`kode_barang`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
