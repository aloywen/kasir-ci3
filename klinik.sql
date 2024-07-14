-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 06:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE `bidan` (
  `id` int(255) NOT NULL,
  `kode_bidan` varchar(15) NOT NULL,
  `nama_bidan` varchar(255) NOT NULL,
  `ket` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidan`
--

INSERT INTO `bidan` (`id`, `kode_bidan`, `nama_bidan`, `ket`) VALUES
(6, '000001', 'TES', 'b'),
(7, '000002', 'ANA', 'b'),
(9, '000003', 'TES', 'p'),
(10, '000004', 'AER', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(50) NOT NULL,
  `kode_dokter` varchar(15) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `kode_dokter`, `nama_dokter`) VALUES
(16, '000001', 'DRG.TES'),
(17, '000002', 'DR.FAHRUL');

-- --------------------------------------------------------

--
-- Table structure for table `fee_dokter`
--

CREATE TABLE `fee_dokter` (
  `id` int(11) NOT NULL,
  `dokter` varchar(50) NOT NULL,
  `kode_jasa` varchar(50) NOT NULL,
  `fee` bigint(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_dokter`
--

INSERT INTO `fee_dokter` (`id`, `dokter`, `kode_jasa`, `fee`, `total`, `tgl`) VALUES
(99, '', '', 0, '0', '2023-10-17'),
(125, '000002', 'UANG JAGA 24 JAM', 175000, '', '2023-10-18'),
(126, '000002', 'Jasa ', 25000, '', '2023-10-18'),
(127, '000002', 'Jasa Konsultasi', 125900, '', '2023-10-18'),
(144, '000001', 'UANG JAGA 24 JAM', 175000, '', '2023-10-20'),
(145, '000001', 'Jasa Konsultasi', 0, '', '2023-10-20'),
(146, '000001', 'Jasa Konsultasi OT-1', 15500, '', '2023-10-20'),
(147, '000001', 'Jasa Tindakan Dengan Alat', 62000, '', '2023-10-20'),
(160, '000001', 'UANG JAGA 24 JAM', 175000, '', '2023-10-23'),
(161, '000001', 'Jasa Konsultasi', 13800, '', '2023-10-23'),
(162, '000001', 'Jasa Konsultasi OT-1', 15500, '', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` int(100) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_jasa` varchar(100) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `fee` varchar(50) NOT NULL,
  `ket` varchar(10) NOT NULL,
  `persen` varchar(11) NOT NULL,
  `induk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `kode`, `nama`, `harga_jasa`, `harga_beli`, `harga_jual`, `fee`, `ket`, `persen`, `induk`) VALUES
(1, 'ZADM0001', 'Administrasi', '10000', 0, 0, '1000', 'J', '', ''),
(2, 'ZKON0002', 'Jasa Konsultasi Dr. Umum', '23000', 0, 0, '6900', 'J', '30', 'Konsultasi'),
(3, '00000001', 'PARACETAMOL ', '1200', 0, 0, '111', 'O', '', ''),
(4, '00000002', 'OMEPRAZOLE', '2000', 0, 0, '11', 'O', '', ''),
(13, '00000003', 'OMENEURON TAB', '2700', 0, 0, '', 'O', '', ''),
(14, '00000004', 'CEFADROXYL KAPSUL', '2000', 0, 0, '', 'O', '', ''),
(15, 'ZMED0010', 'MEDICAL CHECKUP', '100000', 0, 0, '25000', 'J', '', ''),
(40, 'ZAAN0011', 'UANG JAGA 24 JAM', '175000', 0, 0, '0', 's', '', ''),
(41, '00000005', 'ADROME TAB', '1200', 0, 0, '', 'O', '', ''),
(42, '00000006', 'ALPARA TAB', '1300', 0, 0, '', 'O', '', ''),
(44, '00000007', 'AMBROXOL TAB 30', '1200', 0, 0, '', 'O', '', ''),
(45, '00000008', 'ASPILETS TAB', '1300', 0, 0, '', 'O', '', ''),
(46, '00000009', 'BETAMETASON CREAM', '1500', 0, 0, '', 'O', '', ''),
(47, '00000010', 'CEFIXIME 100 MG', '', 0, 0, '', 'O', '', ''),
(48, '00000011', 'CEFIXIME 200 MG', '', 0, 0, '', 'O', '', ''),
(49, '00000012', 'CEK ASAM URAT', '', 0, 0, '', 'O', '', ''),
(50, '00000013', 'CEK COLESTROL', '', 0, 0, '', 'O', '', ''),
(51, '00000014', 'CEK GDS', '', 0, 0, '', 'O', '', ''),
(52, '00000015', 'CTM', '', 0, 0, '', 'O', '', ''),
(53, '00000016', 'CYCLOGESTIN', '', 0, 0, '', 'O', '', ''),
(54, '00000017', 'DEXA 0,5 MG', '1500', 0, 0, '', 'O', '', ''),
(55, '00000018', 'DEXYCOL', '', 0, 0, '', 'O', '', ''),
(58, '00000021', 'ETAMOX TAB 500', '', 0, 0, '', 'O', '', ''),
(59, '00000022', 'FLOXIGRA TAB', '', 0, 0, '', 'O', '', ''),
(60, '00000023', 'FUROSEMIDE TAB', '', 0, 0, '', 'O', '', ''),
(61, '00000024', 'GASTRUCID TAB', '', 0, 0, '', 'O', '', ''),
(62, '00000025', 'GENTAMICIN CREAM', '', 0, 0, '', 'O', '', ''),
(63, '00000026', 'GLIBENCLAMID TAB', '', 0, 0, '', 'O', '', ''),
(64, '00000027', 'GRAFACHLOR TAB', '', 0, 0, '', 'O', '', ''),
(65, '00000028', 'GRATAZON TAB', '', 0, 0, '', 'O', '', ''),
(66, '00000029', 'HANDSCOON', '', 0, 0, '', 'O', '', ''),
(67, '00000030', 'HISTIGO TAB', '1000', 0, 0, '', 'O', '', ''),
(68, '00000031', 'HUFADON TAB', '', 0, 0, '', 'O', '', ''),
(69, '00000032', 'HUFAGESIC TAB', '', 0, 0, '', 'O', '', ''),
(70, '00000033', 'IBUPROFEN TAB', '', 0, 0, '', 'O', '', ''),
(71, '00000034', 'INTUNAL-F', '', 0, 0, '', 'O', '', ''),
(72, '00000035', 'LIBROZYM', '', 0, 0, '', 'O', '', ''),
(73, '00000036', 'LORATADINE 10MG', '', 0, 0, '', 'O', '', ''),
(74, '00000037', 'METFORMIN', '1.000', 0, 0, '', 'O', '', ''),
(75, '00000038', 'METHYLPREDNISOL 4MG', '', 0, 0, '', 'O', '', ''),
(76, '00000039', 'MIKONAZOLE ZALF', '', 0, 0, '', 'O', '', ''),
(77, '00000040', 'NEDDLE NO 24', '', 0, 0, '', 'O', '', ''),
(78, '00000041', 'NEUROBION INJ', '', 0, 0, '', 'O', '', ''),
(79, '00000042', 'OMEGESIC TAB', '', 0, 0, '', 'O', '', ''),
(81, '00000044', 'OMEPRAZOLE TAB', '', 0, 0, '', 'O', '', ''),
(82, '00000045', 'OPISTAN TAB', '', 0, 0, '', 'O', '', ''),
(83, '00000046', 'PARATUSIN TAB', '', 0, 0, '', 'O', '', ''),
(84, '00000047', 'PRIMADEX TAB', '', 0, 0, '', 'O', '', ''),
(85, '00000048', 'RANITIDINE TAB', '', 0, 0, '', 'O', '', ''),
(86, '00000049', 'RENADINAC TAB', '', 0, 0, '', 'O', '', ''),
(87, '00000050', 'SACCARIN', '', 0, 0, '', 'O', '', ''),
(88, '00000051', 'SALBUTAMOL 2 MG', '', 0, 0, '', 'O', '', ''),
(89, '00000052', 'SCABIMID SALEP', '', 0, 0, '', 'O', '', ''),
(90, '00000053', 'SELKOM C TAB', '', 0, 0, '', 'O', '', ''),
(91, '00000054', 'SIMVASTATIN 10MG TAB', '', 0, 0, '', 'O', '', ''),
(92, '00000055', 'SPASMINAL TAB', '', 0, 0, '', 'O', '', ''),
(93, '00000056', 'SPUIT 3CC TERRU', '', 0, 0, '', 'O', '', ''),
(94, '00000057', 'VIT C TAB', '', 0, 0, '', 'O', '', ''),
(95, '00000058', 'DEXA 0,75 MG', '', 0, 0, '', 'O', '', ''),
(99, 'ZWT 0011', 'WT SEDANG', '33000', 0, 0, '20000', 'J', '', 'Tindakan Dengan Alat'),
(100, '00000059', 'AMOXILIN', '', 0, 0, '', 'O', '', ''),
(101, '00000060', 'PULVERES', '500', 0, 0, '', 'O', '', ''),
(102, 'ZJAS0012', 'JASA KONSULTASI JAM 21.00-00.00 WIB', '31000', 0, 0, '15500', 'J', '', 'Konsultasi OT-1'),
(103, '00000061', 'CURCUMA', '', 0, 0, '', 'O', '', ''),
(104, 'ZEKS0013', 'EKSTRAKSI KUKU', '150000', 0, 0, '60000', 'J', '', 'Tindakan Tanpa Alat'),
(106, 'ZJAS0014', 'JASA KONSULTASI 00.00-07.00', '34000', 0, 0, '17000', 'J', '50', 'Konsultasi OT-2'),
(107, '00000062', 'LOPAMID', '', 0, 0, '', 'O', '', ''),
(108, '00000063', 'DEXTRAL', '', 0, 0, '', 'O', '', ''),
(109, '00000064', 'ANTALGIN TAB', '', 0, 0, '', 'O', '', ''),
(110, '00000065', 'ALLERON TAB', '', 0, 0, '', 'O', '', ''),
(111, '00000066', 'DEXTEEM PLUS TAB', '', 0, 0, '', 'O', '', ''),
(112, '00000067', 'BISACODYL TAB', '', 0, 0, '', 'O', '', ''),
(113, '00000068', 'NEPHROLITE TAB', '', 0, 0, '', 'O', '', ''),
(114, '00000069', 'ERYRA TAB', '', 0, 0, '', 'O', '', ''),
(115, '00000070', 'PRIMADEX FORTE', '', 0, 0, '', 'O', '', ''),
(116, '00000071', 'GRAFAZOL TAB', '', 0, 0, '', 'O', '', ''),
(117, '00000072', 'KETOKONAZOLE TAB', '', 0, 0, '', 'O', '', ''),
(118, '00000073', 'CAPTOPRIL 12.5 TAB', '', 0, 0, '', 'O', '', ''),
(119, '00000074', 'CAPTOPRIL 25 MG TAB', '', 0, 0, '', 'O', '', ''),
(120, '00000075', 'AMBEVEN KAPS', '', 0, 0, '', 'O', '', ''),
(121, '00000076', 'PIROXICAM TAB', '', 0, 0, '', 'O', '', ''),
(122, '00000077', 'FG TROCHES', '', 0, 0, '', 'O', '', ''),
(123, '00000078', 'ETABION', '', 0, 0, '', 'O', '', ''),
(124, '00000079', 'ORALIT', '', 0, 0, '', 'O', '', ''),
(125, '00000080', 'DIATABS TAB', '', 0, 0, '', 'O', '', ''),
(126, '00000081', 'GRISEOFULVIN TAB', '', 0, 0, '', 'O', '', ''),
(127, '00000082', 'DEMACOLIN TAB', '', 0, 0, '', 'O', '', ''),
(128, '00000083', 'VITAZYM TAB', '', 0, 0, '', 'O', '', ''),
(129, '00000084', 'PAPAVERIN TAB', '', 0, 0, '', 'O', '', ''),
(130, '00000085', 'KETOROLAC TAB', '', 0, 0, '', 'O', '', ''),
(131, '00000086', 'AZITHROMYCIN TAB', '', 0, 0, '', 'O', '', ''),
(132, '00000087', 'MELOXICAM TAB', '', 0, 0, '', 'O', '', ''),
(133, '00000088', 'TEAMIC TAB', '', 0, 0, '', 'O', '', ''),
(134, '00000089', 'BIMACYL TAB', '', 0, 0, '', 'O', '', ''),
(135, '00000090', 'CLINDAMICYN KAPS', '', 0, 0, '', 'O', '', ''),
(136, '00000091', 'HUFAGESIC FORTE TAB', '', 0, 0, '', 'O', '', ''),
(137, '00000092', 'ACYCLOVIR 400MG', '', 0, 0, '', 'O', '', ''),
(138, '00000093', 'ACYCLOVIR 200MG', '', 0, 0, '', 'O', '', ''),
(139, '00000094', 'ASAM TRANEXAMAT', '', 0, 0, '', 'O', '', ''),
(140, '00000095', 'ZINC TAB', '', 0, 0, '', 'O', '', ''),
(141, '00000096', 'TEOSAL TAB', '', 0, 0, '', 'O', '', ''),
(142, '00000097', 'SALBUTAMOL 4MG TAB', '', 0, 0, '', 'O', '', ''),
(143, '00000098', 'CINARIZINE TAB', '', 0, 0, '', 'O', '', ''),
(144, '00000099', 'GLIMEPIRIDE TAB', '', 0, 0, '', 'O', '', ''),
(145, '00000100', 'CETERIZINE TAB', '', 0, 0, '', 'O', '', ''),
(146, '00000101', 'AMLODIPINE 5MG', '', 0, 0, '', 'O', '', ''),
(147, '00000102', 'AMLODIPINE 10MG', '', 0, 0, '', 'O', '', ''),
(148, '00000103', 'SIMVASTATIN 20MG TAB', '', 0, 0, '', 'O', '', ''),
(149, '00000104', 'METHYLPRED 8MG', '', 0, 0, '', 'O', '', ''),
(150, '00000105', 'ASAM FOLAT', '', 0, 0, '', 'O', '', ''),
(151, '00000106', 'ALLOPURINOL 100MG', '', 0, 0, '', 'O', '', ''),
(152, '00000107', 'ALLOPURINOL 300MG', '', 0, 0, '', 'O', '', ''),
(153, '00000108', 'DIAFORM TAB', '', 0, 0, '', 'O', '', ''),
(154, '00000109', 'HOMOCLOMIN', '', 0, 0, '', 'O', '', ''),
(155, '00000110', 'ISDN TAB', '', 0, 0, '', 'O', '', ''),
(156, '00000111', 'NIFEDIPIN TAB', '', 0, 0, '', 'O', '', ''),
(157, '00000112', 'KAFLAM 50MG', '', 0, 0, '', 'O', '', ''),
(158, '00000113', 'PRIMOLUTV N', '', 0, 0, '', 'O', '', ''),
(159, '00000114', 'THROMBOPHOB SLP', '', 0, 0, '', 'O', '', ''),
(160, '00000115', 'BIOPLACENTON SLP', '', 0, 0, '', 'O', '', ''),
(161, '00000116', 'TRIFAMYCETIN SLP', '', 0, 0, '', 'O', '', ''),
(162, '00000117', 'MICONAZOLE SLP', '', 0, 0, '', 'O', '', ''),
(163, '00000118', 'KETOKONAZOLE SLP', '', 0, 0, '', 'O', '', ''),
(164, '00000119', 'SCABIMITE SLP', '', 0, 0, '', 'O', '', ''),
(165, '00000120', 'MOLAKRIM SLP', '', 0, 0, '', 'O', '', ''),
(166, '00000121', 'ACYCLOVIR SLP', '', 0, 0, '', 'O', '', ''),
(167, '00000122', 'BUFACOMB SLP', '', 0, 0, '', 'O', '', ''),
(168, '00000123', 'BETAMETASHONE SLP', '', 0, 0, '', 'O', '', ''),
(169, '00000124', 'ERLA SALEP MATA', '', 0, 0, '', 'O', '', ''),
(170, '00000125', 'GENTAMICIN SLP', '', 0, 0, '', 'O', '', ''),
(171, '00000126', 'HYDROCORTISONE SLP', '', 0, 0, '', 'O', '', ''),
(172, '00000127', 'KLORFESONE SLP', '', 0, 0, '', 'O', '', ''),
(173, '00000128', 'MAZOL SLP', '', 0, 0, '', 'O', '', ''),
(174, '00000129', 'CH SALEP', '', 0, 0, '', 'O', '', ''),
(175, '00000130', 'ERLA TETES MATA', '', 0, 0, '', 'O', '', ''),
(176, '00000131', 'ERLA TETES TELINGA', '', 0, 0, '', 'O', '', ''),
(177, '00000132', 'CENDO XITROL', '', 0, 0, '', 'O', '', ''),
(178, '00000133', 'GOM', '', 0, 0, '', 'O', '', ''),
(179, '00000134', 'AQUABIDES', '', 0, 0, '', 'O', '', ''),
(180, '00000135', 'RIVANOL ', '', 0, 0, '', 'O', '', ''),
(181, '00000136', 'SALICYL BEDAK', '', 0, 0, '', 'O', '', ''),
(182, '00000137', 'LEXAPRAM SYR', '', 0, 0, '', 'O', '', ''),
(183, '00000138', 'ITRAMOL SYR', '', 0, 0, '', 'O', '', ''),
(184, '00000139', 'HUFAVIT SYR', '', 0, 0, '', 'O', '', ''),
(185, '00000140', 'LISOVIT SYR', '', 0, 0, '', 'O', '', ''),
(186, '00000141', 'CAVICUR SYR', '', 0, 0, '', 'O', '', ''),
(187, '00000142', 'SANMOL DROP', '', 0, 0, '', 'O', '', ''),
(188, '00000143', 'PRIMADEX SYR', '', 0, 0, '', 'O', '', ''),
(189, '00000144', 'BUFAGAN SYR', '', 0, 0, '', 'O', '', ''),
(190, '00000145', 'CEFADROXIL 125MG SYR', '', 0, 0, '', 'O', '', ''),
(191, '00000146', 'CEFADROXIL 250MG SYR', '', 0, 0, '', 'O', '', ''),
(192, '00000147', 'HUFAGRIP HIJAU SYR', '', 0, 0, '', 'O', '', ''),
(193, '00000148', 'FARSIFEN SYR', '', 0, 0, '', 'O', '', ''),
(194, '00000149', 'WIBROW SYR', '', 0, 0, '', 'O', '', ''),
(195, '00000150', 'YUSIMOX 125MG SYR', '', 0, 0, '', 'O', '', ''),
(196, '00000151', 'YUSIMOX 250MG SYR', '', 0, 0, '', 'O', '', ''),
(197, '00000152', 'ZENICLOR SYR', '', 0, 0, '', 'O', '', ''),
(198, '00000153', 'HUFAMYCETIN SYR', '', 0, 0, '', 'O', '', ''),
(199, '00000154', 'ERYRA SYR', '', 0, 0, '', 'O', '', ''),
(200, '00000155', 'CEFIXIME SYR', '', 0, 0, '', 'O', '', ''),
(201, '00000156', 'FASGO FORTE SYR', '', 0, 0, '', 'O', '', ''),
(202, '00000157', 'GUANISTREP SYR', '', 0, 0, '', 'O', '', ''),
(203, '00000158', 'COLFIN SYR', '', 0, 0, '', 'O', '', ''),
(204, '00000159', 'LERZIN SYR', '', 0, 0, '', 'O', '', ''),
(205, '00000160', 'AMBROXOL DROP', '', 0, 0, '', 'O', '', ''),
(206, '00000161', 'AMOXILIN DROP', '', 0, 0, '', 'O', '', ''),
(207, '00000162', 'NYSTATIN DROP', '', 0, 0, '', 'O', '', ''),
(208, '00000163', 'GASTRUCID SYR', '', 0, 0, '', 'O', '', ''),
(209, '00000164', 'AMBROXOL SYR', '', 0, 0, '', 'O', '', ''),
(210, '00000165', 'ZINC KID SYR', '', 0, 0, '', 'O', '', ''),
(211, '00000166', 'ZINC SYR', '', 0, 0, '', 'O', '', ''),
(212, '00000167', 'HUFADON SYR', '', 0, 0, '', 'O', '', ''),
(213, '00000168', 'KETOROLAC INJEC', '', 0, 0, '', 'O', '', ''),
(214, '00000169', 'MERSIBION INJEC', '', 0, 0, '', 'O', '', ''),
(215, '00000170', 'CORTISON INJEC', '', 0, 0, '', 'O', '', ''),
(216, '00000171', 'ADYDRIL INJEC', '', 0, 0, '', 'O', '', ''),
(217, '00000172', 'BENODON INJEC', '', 0, 0, '', 'O', '', ''),
(218, '00000173', 'DEXA INJEC', '', 0, 0, '', 'O', '', ''),
(219, '00000174', 'ONDANCENTRON INJEC', '', 0, 0, '', 'O', '', ''),
(220, '00000175', 'KANAMYCIN INJEC', '', 0, 0, '', 'O', '', ''),
(221, '00000176', 'RANITIDINE INJEC', '', 0, 0, '', 'O', '', ''),
(222, '00000177', 'SOTATIC INJEC', '', 0, 0, '', 'O', '', ''),
(223, '00000178', 'SCOPAMIN INJEC', '', 0, 0, '', 'O', '', ''),
(224, '00000179', 'DEPO INJEC', '', 0, 0, '', 'O', '', ''),
(225, '00000180', 'CYCLO INEJC', '', 0, 0, '', 'O', '', ''),
(226, '00000181', 'YRINS', '', 0, 0, '', 'O', '', ''),
(227, '00000182', 'LACTO B', '', 0, 0, '', 'O', '', ''),
(228, '00000183', 'FLUTROP TAB', '', 0, 0, '', 'O', '', ''),
(229, '00000184', 'KETOPROFEN SUPP', '', 0, 0, '', 'O', '', ''),
(230, '00000185', 'SUPERHOID SUPP', '', 0, 0, '', 'O', '', ''),
(231, '00000186', 'PRORIS SUPP', '', 0, 0, '', 'O', '', ''),
(232, '00000187', 'SANMOL SUPP 125MG', '', 0, 0, '', 'O', '', ''),
(233, '00000188', 'SANMOL 250MG SUPP', '', 0, 0, '', 'O', '', ''),
(234, '00000189', 'DULCOLAX 10MG SUPP', '', 0, 0, '', 'O', '', ''),
(235, '00000190', 'DULCOLAX 5MG SUPP', '', 0, 0, '', 'O', '', ''),
(236, '00000191', 'SPUIT 5CC ', '', 0, 0, '', 'O', '', ''),
(237, '00000192', 'SPUIT 1CC', '', 0, 0, '', 'O', '', ''),
(238, '00000193', 'NEDDLE NO 27', '', 0, 0, '', 'O', '', ''),
(239, '00000194', 'KASSA STERIL', '', 0, 0, '', 'O', '', ''),
(240, '00000195', 'KASSA GULUNG', '', 0, 0, '', 'O', '', ''),
(241, '00000196', 'LIDOCAIN INJEC', '', 0, 0, '', 'O', '', ''),
(242, '00000197', 'DEXA POT', '', 0, 0, '', 'O', '', ''),
(243, '00000198', 'CTM POT', '', 0, 0, '', 'O', '', ''),
(244, '00000199', 'GG POT', '', 0, 0, '', 'O', '', ''),
(245, '00000200', 'VIT C POT', '', 0, 0, '', 'O', '', ''),
(246, '00000201', 'VIT B POT', '', 0, 0, '', 'O', '', ''),
(247, '00000202', 'BICNAT POT', '', 0, 0, '', 'O', '', ''),
(248, '00000203', 'SACARIN POT', '', 0, 0, '', 'O', '', ''),
(249, '00000204', 'POT OBAT', '', 0, 0, '', 'O', '', ''),
(250, '00000205', 'KALENDER', '', 0, 0, '', 'O', '', ''),
(251, '00000206', 'BRONKIS TAB', '', 0, 0, '', 'O', '', ''),
(252, 'ZOBS0015', 'OBS TINDAKAN ', '11000', 0, 0, '5500', 'J', '', 'Tindakan Tanpa Alat'),
(253, 'ZHEC0016', 'HECTING 1-5 JAHITAN ', '55000', 0, 0, '22000', 'J', '', 'Tindakan Tanpa Alat'),
(254, 'ZHEC0017', 'HECTING 6-10 JAHITAN ', '110000', 0, 0, '44000', 'J', '', 'Tindakan Dengan Alat'),
(255, 'ZHEC0018', 'HECTING 11-15 JAHITAN ', '165000', 0, 0, '66000', 'J', '', ''),
(256, 'ZHEC0019', 'HECTING TINGKAT SULIT 1', '132000', 0, 0, '52800', 'J', '', ''),
(257, 'ZHEC0020', 'HECTING TINGKAT SULIT 2', '187000', 0, 0, '74800', 'J', '', 'Tindakan Dengan Alat'),
(258, 'ZHEC0021', 'HECTING TINGKAT SULIT 3', '220000', 0, 0, '88000', 'J', '', ''),
(259, 'ZINC0022', 'INCISI ABSES', '55000', 0, 0, '22000', 'J', '', ''),
(260, 'ZTIN0023', 'TINDAKAN GO', '330000', 0, 0, '165000', 'J', '', ''),
(261, 'ZAFF0024', 'AFF CATETER ', '82500', 0, 0, '41250', 'J', '', ''),
(262, 'ZEKS0025', 'EKSISI CLAVUS BESAR ', '550000', 0, 0, '220000', 'J', '', ''),
(263, 'ZEKS0026', 'EKSISI CLAVUS KECIL ', '100000', 0, 0, '40000', 'J', '', ''),
(264, 'ZEKS0027', 'EKSISI CLAVUS SEDANG ', '150000', 0, 0, '60000', 'J', '', ''),
(265, 'ZEKS0028', 'EKSISI LIPOMA BESAR ', '600000', 0, 0, '240000', 'J', '', ''),
(266, 'ZEKS0029', 'EKSISI LIPOMA KECIL ', '110000', 0, 0, '44000', 'J', '', ''),
(267, 'ZEKS0030', 'EKSISI LIPOMA SEDANG ', '320000', 0, 0, '128000', 'J', '', ''),
(269, 'ZWT 0032', 'WT BESAR', '55000', 0, 0, '22000', 'J', '', 'Tindakan Dengan Alat'),
(270, 'ZWT 0033', 'WT KECIL ', '22000', 0, 0, '8800', 'J', '', 'Tindakan Dengan Alat'),
(271, 'ZSKB0034', 'SKBS', '26000', 0, 0, '13000', '', '', ''),
(272, 'ZSKB0034', 'SKBS', '26000', 0, 0, '13000', 'J', '', ''),
(273, 'ZAFF0035', 'AFF HECTING 1-10', '33000', 0, 0, '13200', 'J', '', ''),
(274, 'ZAFF0036', 'AFF HECTING 11-20', '55000', 0, 0, '22000', 'J', '', ''),
(275, 'ZTES0037', 'TES jasa persen', '50000', 0, 0, '25000', 'J', '50', 'Jasa'),
(277, 'ZDHE0038', 'DHE', '30000', 0, 0, '', 'J', '', 'Tindakan Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_pasien`
--

CREATE TABLE `jasa_pasien` (
  `id` int(11) NOT NULL,
  `no_kwitansi` varchar(100) NOT NULL,
  `rm_pasien` varchar(15) NOT NULL,
  `dokter` varchar(15) NOT NULL,
  `kodejasa` varchar(15) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `tgl` datetime NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapobat`
--

CREATE TABLE `lapobat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(50) NOT NULL,
  `jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id` int(100) NOT NULL,
  `nomor_transaksi` varchar(15) NOT NULL,
  `jns_transaksi` varchar(10) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `masuk` int(10) NOT NULL,
  `keluar` int(10) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id`, `nomor_transaksi`, `jns_transaksi`, `tgl_transaksi`, `kode_obat`, `masuk`, `keluar`, `ket`) VALUES
(122, '10/19/001', 'KELUAR', '2023-10-19 19:56:24', '00000001', 0, 10, 'O'),
(123, '10/19/001', 'KELUAR', '2023-10-19 19:56:24', '00000002', 0, 10, 'O'),
(124, '10/19/001', 'KELUAR', '2023-10-19 19:56:24', '00000003', 0, 10, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `obat_pasien`
--

CREATE TABLE `obat_pasien` (
  `id` int(255) NOT NULL,
  `no_kwitansi` varchar(50) NOT NULL,
  `rm_pasien` varchar(255) NOT NULL,
  `dokter` varchar(15) NOT NULL,
  `kode_obat` varchar(255) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `fee` int(100) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(15) NOT NULL,
  `induk` varchar(50) NOT NULL,
  `posting` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_pasien`
--

INSERT INTO `obat_pasien` (`id`, `no_kwitansi`, `rm_pasien`, `dokter`, `kode_obat`, `qty`, `total_harga`, `fee`, `tgl`, `ket`, `induk`, `posting`) VALUES
(439, '10/23/001', '99', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(440, '10/23/001', '99', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(445, '10/24/004', '99', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(446, '10/24/004', '99', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(447, '10/24/004', '99', '000001', '00000001', '10', 12000, 111, '2023-10-24', 'O', '', 'sudah'),
(448, '10/24/004', '99', '000001', '00000002', '10', 20000, 11, '2023-10-24', 'O', '', 'sudah'),
(449, '10/24/005', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(450, '10/24/005', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(451, '10/24/005', '100', '000001', '00000001', '10', 12000, 111, '2023-10-24', 'O', '', 'sudah'),
(452, '10/24/005', '100', '000001', '00000003', '10', 27000, 0, '2023-10-24', 'O', '', 'sudah'),
(456, '10/24/006', '99', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(457, '10/24/006', '99', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(458, '10/24/007', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(459, '10/24/007', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(460, '10/24/008', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(461, '10/24/008', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(462, '10/24/009', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(463, '10/24/009', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(464, '10/24/010', '101', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(465, '10/24/010', '101', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(466, '10/24/011', '99', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(467, '10/24/011', '99', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(468, '10/24/012', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(469, '10/24/012', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-24', 'J', 'Konsultasi', 'sudah'),
(470, '10/24/012', '100', '000001', '00000001', '10', 12000, 111, '2023-10-24', 'O', '', 'sudah'),
(471, '10/24/012', '100', '000001', '00000002', '10', 20000, 11, '2023-10-24', 'O', '', 'sudah'),
(484, '10/24/014', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-24', 'J', '', 'sudah'),
(485, '10/24/014', '100', '000001', 'ZJAS0012', '1', 31000, 15500, '2023-10-24', 'J', 'Konsultasi OT-1', 'sudah'),
(486, '10/24/014', '100', '000001', '00000001', '10', 12000, 111, '2023-10-24', 'O', '', 'sudah'),
(487, '10/24/014', '100', '000001', '00000003', '10', 27000, 0, '2023-10-24', 'O', '', 'sudah'),
(498, '10/25/015', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-25', 'J', '', 'sudah'),
(499, '10/25/015', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-25', 'J', 'Konsultasi', 'sudah'),
(500, '10/25/015', '100', '000001', 'ZHEC0016', '3', 165000, 22000, '2023-10-25', 'J', 'Tindakan Tanpa Alat', 'sudah'),
(501, '10/25/015', '100', '000001', 'ZAFF0024', '3', 247500, 41250, '2023-10-25', 'J', '', 'sudah'),
(502, '10/25/015', '100', '000001', '00000001', '10', 12000, 111, '2023-10-25', 'O', '', 'sudah'),
(503, '10/25/015', '100', '000001', '00000002', '10', 20000, 11, '2023-10-25', 'O', '', 'sudah'),
(504, '10/25/015', '100', '000001', '00000003', '10', 27000, 0, '2023-10-25', 'O', '', 'sudah'),
(529, '10/24/003', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-25', 'J', '', 'sudah'),
(530, '10/24/003', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-25', 'J', 'Konsultasi', 'sudah'),
(531, '10/25/001', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-25', 'J', '', 'sudah'),
(532, '10/25/001', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-25', 'J', 'Konsultasi', 'sudah'),
(533, '10/25/001', '100', '000001', '00000001', '10', 12000, 111, '2023-10-25', 'O', '', 'sudah'),
(534, '10/25/001', '100', '000001', '00000002', '10', 20000, 11, '2023-10-25', 'O', '', 'sudah'),
(552, '10/26/000', '100', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-26', 'J', '', 'sudah'),
(553, '10/26/000', '100', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-26', 'J', 'Konsultasi', 'sudah'),
(554, '10/26/000', '100', '000001', 'ZWT 0011', '2', 66000, 40000, '2023-10-26', 'J', 'Tindakan Dengan Alat', 'sudah'),
(555, '10/26/000', '100', '000001', 'ZHEC0016', '3', 165000, 66000, '2023-10-26', 'J', 'Tindakan Tanpa Alat', 'sudah'),
(556, '10/28/000', '99', '000001', 'ZADM0001', '1', 10000, 1000, '2023-10-28', 'J', '', 'belum'),
(557, '10/28/000', '99', '000001', 'ZKON0002', '1', 23000, 6900, '2023-10-28', 'J', 'Konsultasi', 'belum'),
(558, '10/28/000', '99', '000001', '00000001', '10', 12000, 1110, '2023-10-28', 'O', '', 'belum'),
(559, '10/28/000', '99', '000001', '00000002', '10', 20000, 110, '2023-10-28', 'O', '', 'belum');

--
-- Triggers `obat_pasien`
--
DELIMITER $$
CREATE TRIGGER `hapus_obat_pasien` AFTER DELETE ON `obat_pasien` FOR EACH ROW UPDATE stok_akhir
SET
  stok = stok+OLD.qty
WHERE
  kode_obat = OLD.kode_obat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurang_obat` AFTER INSERT ON `obat_pasien` FOR EACH ROW UPDATE stok_akhir
SET
  stok = stok-NEW.qty
WHERE
  kode_obat = NEW.kode_obat
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obat_pembelian`
--

CREATE TABLE `obat_pembelian` (
  `id` int(11) NOT NULL,
  `nomor_transaksi` varchar(20) NOT NULL,
  `kode_obat` varchar(20) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_pembelian`
--

INSERT INTO `obat_pembelian` (`id`, `nomor_transaksi`, `kode_obat`, `jenis`, `jumlah`, `harga_beli`, `harga_jual`) VALUES
(45, 'BEL0000001', '00000001', '', 50, 0, 1200),
(46, 'BEL0000001', '00000002', '', 50, 0, 2000),
(47, 'BEL0000001', '00000003', '', 50, 0, 2700),
(48, 'BEL0000001', '00000004', '', 50, 0, 2000),
(49, 'BEL0000001', '00000005', '', 50, 0, 1200),
(50, 'BEL0000001', '00000006', '', 50, 0, 1300),
(51, 'BEL0000001', '00000007', '', 50, 0, 1200),
(52, 'BEL0000001', '00000008', '', 50, 0, 1300),
(53, 'BEL0000001', '00000009', '', 50, 0, 1500),
(54, 'BEL0000001', '00000017', '', 50, 0, 1500);

--
-- Triggers `obat_pembelian`
--
DELIMITER $$
CREATE TRIGGER `hapus_obat_pembelian` AFTER DELETE ON `obat_pembelian` FOR EACH ROW UPDATE stok_akhir
SET
  stok = stok-OLD.jumlah
WHERE
  kode_obat = OLD.kode_obat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_obat` BEFORE INSERT ON `obat_pembelian` FOR EACH ROW UPDATE stok_akhir  
SET 
  stok = stok+NEW.jumlah
WHERE 
  kode_obat = NEW.kode_obat
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_beli_obat` AFTER UPDATE ON `obat_pembelian` FOR EACH ROW UPDATE stok_akhir  
SET 
  stok = stok+(NEW.jumlah-OLD.jumlah)
WHERE 
  kode_obat = NEW.kode_obat
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `omzet`
--

CREATE TABLE `omzet` (
  `id` int(10) NOT NULL,
  `kasir` varchar(50) NOT NULL,
  `total` bigint(20) NOT NULL,
  `mcu` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `omzet`
--

INSERT INTO `omzet` (`id`, `kasir`, `total`, `mcu`, `tgl`) VALUES
(10, '', 135000, 0, '2023-10-16'),
(12, 'AER', 257000, 0, '2023-10-18'),
(16, 'ANA', 579000, 0, '2023-10-23'),
(17, 'ANA', 833500, 0, '2023-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(15) NOT NULL,
  `medical_record` int(100) NOT NULL,
  `nama_pasien` varchar(150) NOT NULL,
  `alamat` longtext NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_area` varchar(100) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `bln_lahir` varchar(10) NOT NULL,
  `tahun_lahir` varchar(10) NOT NULL,
  `kelamin` varchar(3) NOT NULL,
  `kebangsaan` varchar(120) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `perusahaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `medical_record`, `nama_pasien`, `alamat`, `kota`, `kode_area`, `kontak`, `tgl_lahir`, `bln_lahir`, `tahun_lahir`, `kelamin`, `kebangsaan`, `ktp`, `agama`, `email`, `tgl_masuk`, `status`, `pekerjaan`, `perusahaan`) VALUES
(34, 99, 'TES1', 'TES1', '', '', '', 'Tgl...', 'Bulan...', '', 'L', '', '', '', '', '2023-10-19', '', '', ''),
(35, 100, 'TES2', 'TES2', '', '', '', 'Tgl...', 'Bulan...', '', 'P', '', '', '', '', '2023-10-19', '', '', ''),
(36, 101, 'TES3', 'TES3', '', '', '', 'Tgl...', 'Bulan...', '', '', '', '', '', '', '2023-10-19', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id` int(11) NOT NULL,
  `kode_perawat` varchar(10) NOT NULL,
  `nama_perawat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id`, `kode_perawat`, `nama_perawat`) VALUES
(1, '000001', 'YUNI');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan_obat`
--

CREATE TABLE `persediaan_obat` (
  `id` int(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `lepas` int(10) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok_akhir`
--

CREATE TABLE `stok_akhir` (
  `id` int(100) NOT NULL,
  `kode_obat` varchar(15) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_akhir`
--

INSERT INTO `stok_akhir` (`id`, `kode_obat`, `stok`) VALUES
(4, '00000004', 50),
(5, '00000003', 20),
(6, '00000001', -20),
(7, '00000002', 0),
(8, '00000005', 50),
(9, '00000006', 50),
(10, '00000007', 50),
(11, '00000008', 50),
(12, '00000009', 50),
(13, '00000010', 0),
(14, '00000011', 0),
(15, '00000012', 0),
(16, '00000013', 0),
(17, '00000014', 0),
(18, '00000015', 0),
(19, '00000016', 0),
(20, '00000017', 50),
(21, '00000018', 0),
(22, '00000019', 0),
(23, '00000020', 0),
(24, '00000021', 0),
(25, '00000022', 0),
(26, '00000023', 0),
(27, '00000024', 0),
(28, '00000025', 0),
(29, '00000026', 0),
(30, '00000027', 0),
(31, '00000028', 0),
(32, '00000029', 0),
(33, '00000030', 0),
(34, '00000031', 0),
(35, '00000032', 0),
(36, '00000033', 0),
(37, '00000034', 0),
(38, '00000035', 0),
(39, '00000036', 0),
(40, '00000037', 0),
(41, '00000038', 0),
(42, '00000039', 0),
(43, '00000040', 0),
(44, '00000041', 0),
(45, '00000042', 0),
(46, '00000043', 0),
(47, '00000044', 0),
(48, '00000045', 0),
(49, '00000046', 0),
(50, '00000047', 0),
(51, '00000048', 0),
(52, '00000049', 0),
(53, '00000050', 0),
(54, '00000051', 0),
(55, '00000052', 0),
(56, '00000053', 0),
(57, '00000054', 0),
(58, '00000055', 0),
(59, '00000056', 0),
(60, '00000057', 0),
(61, '00000058', 0),
(62, '00000059', 0),
(63, '00000060', 0),
(64, '00000061', 0),
(65, '00000062', 0),
(66, '00000063', 0),
(67, '00000064', 0),
(68, '00000065', 0),
(69, '00000066', 0),
(70, '00000067', 0),
(71, '00000068', 0),
(72, '00000069', 0),
(73, '00000070', 0),
(74, '00000071', 0),
(75, '00000072', 0),
(76, '00000073', 0),
(77, '00000074', 0),
(78, '00000075', 0),
(79, '00000076', 0),
(80, '00000077', 0),
(81, '00000078', 0),
(82, '00000079', 0),
(83, '00000080', 0),
(84, '00000081', 0),
(85, '00000082', 0),
(86, '00000083', 0),
(87, '00000084', 0),
(88, '00000085', 0),
(89, '00000086', 0),
(90, '00000087', 0),
(91, '00000088', 0),
(92, '00000089', 0),
(93, '00000090', 0),
(94, '00000091', 0),
(95, '00000092', 0),
(96, '00000093', 0),
(97, '00000094', 0),
(98, '00000095', 0),
(99, '00000096', 0),
(100, '00000097', 0),
(101, '00000098', 0),
(102, '00000099', 0),
(103, '00000100', 0),
(104, '00000101', 0),
(105, '00000102', 0),
(106, '00000103', 0),
(107, '00000104', 0),
(108, '00000105', 0),
(109, '00000106', 0),
(110, '00000107', 0),
(111, '00000108', 0),
(112, '00000109', 0),
(113, '00000110', 0),
(114, '00000111', 0),
(115, '00000112', 0),
(116, '00000113', 0),
(117, '00000114', 0),
(118, '00000115', 0),
(119, '00000116', 0),
(120, '00000117', 0),
(121, '00000118', 0),
(122, '00000119', 0),
(123, '00000120', 0),
(124, '00000121', 0),
(125, '00000122', 0),
(126, '00000123', 0),
(127, '00000124', 0),
(128, '00000125', 0),
(129, '00000126', 0),
(130, '00000127', 0),
(131, '00000128', 0),
(132, '00000129', 0),
(133, '00000130', 0),
(134, '00000131', 0),
(135, '00000132', 0),
(136, '00000133', 0),
(137, '00000134', 0),
(138, '00000135', 0),
(139, '00000136', 0),
(140, '00000137', 0),
(141, '00000138', 0),
(142, '00000139', 0),
(143, '00000140', 0),
(144, '00000141', 0),
(145, '00000142', 0),
(146, '00000143', 0),
(147, '00000144', 0),
(148, '00000145', 0),
(149, '00000146', 0),
(150, '00000147', 0),
(151, '00000148', 0),
(152, '00000149', 0),
(153, '00000150', 0),
(154, '00000151', 0),
(155, '00000152', 0),
(156, '00000153', 0),
(157, '00000154', 0),
(158, '00000155', 0),
(159, '00000156', 0),
(160, '00000157', 0),
(161, '00000158', 0),
(162, '00000159', 0),
(163, '00000160', 0),
(164, '00000161', 0),
(165, '00000162', 0),
(166, '00000163', 0),
(167, '00000164', 0),
(168, '00000165', 0),
(169, '00000166', 0),
(170, '00000167', 0),
(171, '00000168', 0),
(172, '00000169', 0),
(173, '00000170', 0),
(174, '00000171', 0),
(175, '00000172', 0),
(176, '00000173', 0),
(177, '00000174', 0),
(178, '00000175', 0),
(179, '00000176', 0),
(180, '00000177', 0),
(181, '00000178', 0),
(182, '00000179', 0),
(183, '00000180', 0),
(184, '00000181', 0),
(185, '00000182', 0),
(186, '00000183', 0),
(187, '00000184', 0),
(188, '00000185', 0),
(189, '00000186', 0),
(190, '00000187', 0),
(191, '00000188', 0),
(192, '00000189', 0),
(193, '00000190', 0),
(194, '00000191', 0),
(195, '00000192', 0),
(196, '00000193', 0),
(197, '00000194', 0),
(198, '00000195', 0),
(199, '00000196', 0),
(200, '00000197', 0),
(201, '00000198', 0),
(202, '00000199', 0),
(203, '00000200', 0),
(204, '00000201', 0),
(205, '00000202', 0),
(206, '00000203', 0),
(207, '00000204', 0),
(208, '00000205', 0),
(209, '00000206', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pasien`
--

CREATE TABLE `transaksi_pasien` (
  `id` int(100) NOT NULL,
  `register` varchar(100) NOT NULL,
  `medical_record` varchar(100) NOT NULL,
  `no_kwitansi` varchar(100) NOT NULL,
  `tgl_kwitansi` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `jns_pasien` varchar(15) NOT NULL,
  `penanggung` varchar(50) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `asuransi` varchar(100) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `bidan` varchar(15) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `icd` varchar(15) NOT NULL,
  `grand_total` varchar(100) NOT NULL,
  `posting` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pasien`
--

INSERT INTO `transaksi_pasien` (`id`, `register`, `medical_record`, `no_kwitansi`, `tgl_kwitansi`, `status`, `jns_pasien`, `penanggung`, `perusahaan`, `asuransi`, `dokter`, `bidan`, `diagnosa`, `icd`, `grand_total`, `posting`) VALUES
(122, '01/231023/1/01', '99', '10/23/001', '2023-10-23', '', '', '', '', '', '000001', '', '', '', '33000', 'sudah'),
(125, '01/231024/1/03', '100', '10/24/003', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(126, '01/231024/1/04', '99', '10/24/004', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '65000', 'sudah'),
(127, '01/231024/1/05', '100', '10/24/005', '2023-10-24', '', '', '', '', '', '000001', '000001', '', '', '72000', 'sudah'),
(130, '01/231024/1/06', '99', '10/24/006', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(131, '01/231024/1/07', '100', '10/24/007', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(132, '01/231024/1/08', '100', '10/24/008', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(133, '01/231024/1/09', '100', '10/24/009', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(134, '01/231024/1/10', '101', '10/24/010', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(135, '01/231024/1/11', '99', '10/24/011', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '33000', 'sudah'),
(136, '01/231024/1/12', '100', '10/24/012', '2023-10-24', '', '', '', '', '', '000001', '000002', '', '', '65000', 'sudah'),
(139, '01/231024/1/14', '100', '10/24/014', '2023-10-24', '', '', '', '', '', '000001', '000001', 'ASA', '', '80000', 'sudah'),
(144, '01/231025/1/15', '100', '10/25/015', '2023-10-25', '', '', '', '', '', '000001', '000002', '', '', '504500', 'sudah'),
(145, '', '', '10/25/HABIS', '2023-10-25', '', '', '', '', '', '', '', '', '', '', ''),
(147, '01/231025/1/16', '100', '10/25/001', '2023-10-25', '', '', '', '', '', '000001', '000002', '', '', '65000', 'sudah'),
(149, '01/231026/1/17', '100', '10/26/000', '2023-10-26', '', '', '', '', '', '000001', '000002', '', '', '264000', 'sudah'),
(150, '', '', 'T0', '0000-00-00', '', '', '', '', '', '', '', '', '', '', ''),
(151, '01/231028/1/18', '99', '10/28/000', '2023-10-28', '', '', '', '', '', '000001', '000002', 'ISPA', '', '65000', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian_obat`
--

CREATE TABLE `transaksi_pembelian_obat` (
  `id` int(50) NOT NULL,
  `nomor_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pembelian_obat`
--

INSERT INTO `transaksi_pembelian_obat` (`id`, `nomor_transaksi`, `tgl_transaksi`, `nama_supplier`) VALUES
(16, 'BEL0000001', '2023-10-19 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_dokter`
--
ALTER TABLE `fee_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_pasien`
--
ALTER TABLE `jasa_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapobat`
--
ALTER TABLE `lapobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat_pembelian`
--
ALTER TABLE `obat_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `omzet`
--
ALTER TABLE `omzet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persediaan_obat`
--
ALTER TABLE `persediaan_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_akhir`
--
ALTER TABLE `stok_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pasien`
--
ALTER TABLE `transaksi_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pembelian_obat`
--
ALTER TABLE `transaksi_pembelian_obat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidan`
--
ALTER TABLE `bidan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fee_dokter`
--
ALTER TABLE `fee_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `jasa_pasien`
--
ALTER TABLE `jasa_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `lapobat`
--
ALTER TABLE `lapobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `obat_pasien`
--
ALTER TABLE `obat_pasien`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `obat_pembelian`
--
ALTER TABLE `obat_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `omzet`
--
ALTER TABLE `omzet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persediaan_obat`
--
ALTER TABLE `persediaan_obat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_akhir`
--
ALTER TABLE `stok_akhir`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `transaksi_pasien`
--
ALTER TABLE `transaksi_pasien`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `transaksi_pembelian_obat`
--
ALTER TABLE `transaksi_pembelian_obat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
