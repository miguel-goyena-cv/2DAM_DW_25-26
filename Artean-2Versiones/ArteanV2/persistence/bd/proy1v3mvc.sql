
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema proy1v3mvc
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `proy1v3mvc` ;

-- -----------------------------------------------------
-- Schema proy1v3mvc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proy1v3mvc` DEFAULT CHARACTER SET utf8 ;
USE `proy1v3mvc` ;


-- Volcando estructura para tabla proy1v3mvc.appliance
CREATE TABLE IF NOT EXISTS `appliance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `idOffer` int(11) DEFAULT NULL,
  `letter` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proy1v3mvc.offers
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `function` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proy1v3mvc.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

