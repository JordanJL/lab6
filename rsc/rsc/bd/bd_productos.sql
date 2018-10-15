
--
-- Database: `bd_productos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(8) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `tbl_productos`
--

INSERT INTO `tbl_productos` (`id`, `codigo`, `nombre`, `precio`, `cantidad`) VALUES
(1, 'PQ-0015', 'Sal Diamante Verde', 95, 200),
(2, 'PQ-0008', 'Galletas Saladitas', 200, 16),
(3, 'PQ-0006', 'Esponja la Negrita', 334, 200),
(4, 'PQ-0009', 'Jabon Protex', 280, 30),
(5, 'PQ-0011', 'Meneitos Jacks CremiDulce', 261, 15),
(6, 'PQ-0012', 'Natilla del Prado Especial', 300, 30),
(7, 'PQ-0016', 'Tortiricas Gruesitas', 375, 23),
(8, 'PQ-0004', 'Coca Cola', 900, 10),
(9, 'PQ-0003', 'Café 1820', 1340, 200),
(10, 'PQ-0014', 'Pepsi', 850, 10);
