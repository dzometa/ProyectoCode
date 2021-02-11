-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para vacalola
CREATE DATABASE IF NOT EXISTS `vacalola` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `vacalola`;

-- Volcando estructura para tabla vacalola.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` smallint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla vacalola.categorias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
	(1, 'Liquidos2', 1, '2020-11-13 21:14:08', '2020-11-13 21:14:08'),
	(2, 'BC', 0, '2020-10-22 07:36:36', '2020-10-22 08:36:36'),
	(3, 'prueba', 1, '2020-10-27 21:32:37', '2020-10-27 22:32:37'),
	(4, 'Lácteos', 0, '2021-01-21 21:16:04', '2021-01-21 21:16:04');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla vacalola.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL DEFAULT 0.00,
  `prec_compra` decimal(10,2) NOT NULL DEFAULT 0.00,
  `existencia` int(11) NOT NULL DEFAULT 0,
  `stock_minimo` int(11) NOT NULL DEFAULT 0,
  `inventariable` tinyint(4) NOT NULL,
  `id_unidad` smallint(6) NOT NULL,
  `id_categoria` smallint(6) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_unidad` (`id_unidad`),
  KEY `fk_producto_categoria` (`id_categoria`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_producto_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla vacalola.productos: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `codigo`, `nombre`, `precio_venta`, `prec_compra`, `existencia`, `stock_minimo`, `inventariable`, `id_unidad`, `id_categoria`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
	(2, '03', 'papata', 10.00, 5.00, 2, 1, 1, 14, 2, 0, '2020-11-13 21:13:46', '2020-11-13 21:13:46'),
	(3, '123456', 'queso', 4.00, 3.00, 0, 10, 1, 16, 4, 1, '2020-10-28 00:00:44', '2020-10-28 00:00:44'),
	(4, '00001', 'Crema', 2.00, 1.00, 0, 10, 1, 14, 4, 1, '2020-10-28 00:02:50', '2020-10-28 00:02:50'),
	(5, '00012', 'pan', 10.00, 20.00, 0, 10, 1, 9, 1, 1, '2020-10-28 22:44:32', '2020-10-28 22:44:32'),
	(6, '02', 'dasd', 10.00, 10.00, 0, 10, 1, 10, 1, 1, '2020-10-28 22:48:27', '2020-10-28 22:48:27'),
	(7, '04', 'adadasdasda', 50.00, 10.00, 0, 10, 1, 12, 1, 1, '2020-10-28 22:48:59', '2020-10-28 22:48:59'),
	(8, '09', 'dpafdskmm', 89.00, 89.00, 0, 50, 1, 9, 1, 1, '2020-10-28 22:49:38', '2020-10-28 22:49:38'),
	(9, '09', 'asdasd', 89.00, 10.00, 0, 5, 1, 9, 1, 1, '2020-10-28 22:53:46', '2020-10-28 22:53:46'),
	(10, '078', 'fsafssvwds', 50.00, 89.00, 0, 50, 1, 16, 3, 1, '2020-10-28 22:54:15', '2020-10-28 22:54:15'),
	(11, '0254', 'asdasdasdas', 45.00, 45.00, 0, 10, 1, 12, 3, 1, '2020-10-28 22:54:56', '2020-10-28 22:54:56'),
	(12, '989898', 'asdñlasñld,asldña', 56.00, 56.00, 0, 59, 1, 11, 4, 0, '2020-12-11 14:34:37', '2020-12-11 14:34:37'),
	(13, '89789', 'ADASDADD', 56.00, 656.00, 0, 10, 1, 12, 3, 1, '2020-10-28 22:55:54', '2020-10-28 22:55:54'),
	(14, '02', 'galleta', 10.00, 10.00, 0, 2, 1, 9, 1, 1, '2020-12-11 14:34:29', '2020-12-11 14:34:29');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla vacalola.unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_corto` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla vacalola.unidades: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` (`id`, `nombre`, `nombre_corto`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
	(9, 'otrooaosad', 'Btokokok', 1, '2021-02-09 06:57:24', '2021-02-09 06:57:24'),
	(10, 'Liss', 'KG TM', 1, '2020-10-22 18:45:42', '2020-10-22 19:45:42'),
	(11, 'Prueba', 'p', 1, '2020-10-20 16:26:28', '2020-10-20 16:26:28'),
	(12, 'David', 'DB', 1, '2020-10-20 20:13:44', '2020-10-20 20:13:44'),
	(13, 'Pedo', 'pd', 1, '2020-10-27 21:25:17', '2020-10-27 22:25:17'),
	(14, 'Bote', 'BT', 1, '2020-10-23 15:31:30', '2020-10-23 16:31:30'),
	(16, 'Libra', 'LB', 1, '2020-10-27 23:38:55', '2020-10-27 23:38:55'),
	(17, 'asa', 'sdsa', 1, '2020-10-27 23:54:47', '2020-10-27 23:54:47'),
	(18, 'kdaloaksd', 'aldsasd', 0, '2021-02-09 09:07:07', '2021-02-09 09:07:07'),
	(19, 'Ok', '', 0, '2021-02-09 06:57:15', '2021-02-09 06:57:15');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
