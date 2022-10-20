-- --------------------------------------------------------
-- Host:                         192.168.1.50
-- Versión del servidor:         5.7.39-0ubuntu0.18.04.2 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para datosphp
CREATE DATABASE IF NOT EXISTS `datosphp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `datosphp`;

-- Volcando estructura para tabla datosphp.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla datosphp.productos: ~3 rows (aproximadamente)
INSERT IGNORE INTO `productos` (`id`, `nombre`, `categoria`, `cantidad`, `precio`) VALUES
	(14, 'Ruben', 'Persona', 20, 1),
	(16, 'Helado de Mango', 'Helados', 20, 8),
	(17, 'Pizza Barbakoa', 'Pizza', 20, 10);

-- Volcando estructura para tabla datosphp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `passwd` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `carrito` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla datosphp.users: ~12 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `user`, `nombre`, `apellidos`, `email`, `passwd`, `admin`, `carrito`) VALUES
	(2, 'rulexloco123', 'Ruben', 'Lechosa', 'ruaaben@gn.com', '2882f38e575101ba615f725af5e59bf2333a9a68', 0, '[]'),
	(3, 'rulex52', 'Ruben', 'Lechosa', 'aben@gn.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '[]'),
	(5, 'Alexander', 'Alex', 'madrihal', 'skdn@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '[]'),
	(6, 'Ruben', 'Ruben', 'Lechosa Cervantes', 'rubensdsdlechosa@gmail.com', '5f52c9d9abe6ef798221feb2b574296ceeb0ee4e', 0, '[]'),
	(7, 'Gerard', 'Ruben', 'Lechosa Cervantes', 'rubenlechosdasdsa@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '[]'),
	(8, 'Rulexloko13', 'Ruben', 'Lechosa', 'rubenlechosa@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 1, '["17", "14", "16"]'),
	(9, 'rulex12', 'Ruben', 'Lechosa', 'rubengerard135@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '[]'),
	(10, 'quimetdasdasd', 'Ruben', 'Lechosa Cervantes', 'rubenlechasdasdosa@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '["14"]'),
	(11, 'Rulexloko13a', 'Ruben', 'Lechosa Cervantes', 'rasdasdubenlechosa@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '["14", "14", "14"]'),
	(12, 'quisadmet', 'Ruben', 'Lechosa Cervantes', 'rubasdasdasdenlechosa@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '["15", "15", "15", "14"]'),
	(13, 'quimetasdasdasdad', 'Ruben', 'Lechosa Cervantes', 'rubenasdasdlechosaas@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '[]'),
	(14, 'ismael', 'Isma', 'Cherfouwi', 'isam@gmail.com', '8fcc572251ca81b9a47586d5855b6304ae745440', 0, '["14"]');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
