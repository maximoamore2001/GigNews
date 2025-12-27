-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para vista terra-nova.blogs
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `blogs` (
	`idblog` INT(11) UNSIGNED NOT NULL,
	`titulo` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`fecha` DATE NULL,
	`descripcion` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`imagen` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`segundo_titulo` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`segunda_descripcion` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci'
);

-- Volcando estructura para vista terra-nova.clientes
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `clientes` (
	`idcliente` INT(11) UNSIGNED NOT NULL,
	`nombre` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`apellido` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`telefono` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`direccion` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`dni` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`correo` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`clave` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci'
);

-- Volcando estructura para vista terra-nova.imagenes
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `imagenes` (
	`idimagen` INT(11) UNSIGNED NOT NULL,
	`imagen` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`nombre` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`fk_idpropiedad` INT(11) UNSIGNED NOT NULL
);

-- Volcando estructura para vista terra-nova.postulaciones
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `postulaciones` (
	`idpostulacion` INT(11) UNSIGNED NOT NULL,
	`nombre` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`apellido` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`whatsapp` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`correo` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`linkcv` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci'
);

-- Volcando estructura para vista terra-nova.propiedades
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `propiedades` (
	`idpropiedad` INT(11) UNSIGNED NOT NULL,
	`titulo` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`precio` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`descripcion` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`imagen` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`fk_idtipopropiedad` INT(11) UNSIGNED NOT NULL,
	`cantidadhabitaciones` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`cantidadbanios` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`cantidadplantas` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`pais` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`ciudad` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`direccion` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`garage` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`areapropiedad` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`cantidad` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci'
);

-- Volcando estructura para vista terra-nova.sistema_areas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_areas` (
	`idarea` INT(11) UNSIGNED NOT NULL,
	`ncarea` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`descarea` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`activo` SMALLINT(6) NOT NULL
);

-- Volcando estructura para vista terra-nova.sistema_familias
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_familias` (
	`idfamilia` INT(11) UNSIGNED NOT NULL,
	`nombre` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`descripcion` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci'
);

-- Volcando estructura para vista terra-nova.sistema_menu_area
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_menu_area` (
	`fk_idmenu` INT(11) UNSIGNED NOT NULL,
	`fk_idarea` INT(11) UNSIGNED NOT NULL
);

-- Volcando estructura para vista terra-nova.sistema_menues
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_menues` (
	`idmenu` INT(11) UNSIGNED NOT NULL,
	`url` VARCHAR(1) NULL COLLATE 'utf8_spanish_ci',
	`orden` INT(11) NULL,
	`nombre` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`id_padre` INT(11) NULL,
	`fk_idpatente` INT(11) NULL,
	`css` VARCHAR(1) NULL COLLATE 'utf8_spanish_ci',
	`activo` TINYINT(1) NULL
);

-- Volcando estructura para vista terra-nova.sistema_patente_familia
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_patente_familia` (
	`fk_idpatente` INT(11) UNSIGNED NOT NULL,
	`fk_idfamilia` INT(11) UNSIGNED NOT NULL
);

-- Volcando estructura para vista terra-nova.sistema_patentes
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_patentes` (
	`idpatente` INT(11) UNSIGNED NOT NULL,
	`tipo` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`submodulo` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`nombre` VARCHAR(1) NULL COLLATE 'utf8_spanish_ci',
	`modulo` VARCHAR(1) NULL COLLATE 'utf8_spanish_ci',
	`log_operacion` SMALLINT(6) NOT NULL,
	`descripcion` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci'
);

-- Volcando estructura para vista terra-nova.sistema_usuario_familia
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_usuario_familia` (
	`fk_idusuario` INT(11) UNSIGNED NOT NULL,
	`fk_idfamilia` INT(11) UNSIGNED NOT NULL,
	`fk_idarea` INT(11) UNSIGNED NOT NULL
);

-- Volcando estructura para vista terra-nova.sistema_usuarios
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sistema_usuarios` (
	`idusuario` INT(11) UNSIGNED NOT NULL,
	`usuario` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`nombre` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`apellido` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`mail` VARCHAR(1) NULL COLLATE 'utf8_spanish_ci',
	`clave` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`ultimo_ingreso` TIMESTAMP NULL,
	`token` VARCHAR(1) NOT NULL COLLATE 'utf8_spanish_ci',
	`root` SMALLINT(6) NULL,
	`created_at` TIMESTAMP NULL,
	`cantidad_bloqueo` INT(11) NULL,
	`areapredeterminada` SMALLINT(6) NULL,
	`activo` SMALLINT(6) NULL
);

-- Volcando estructura para vista terra-nova.sucursales
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `sucursales` (
	`idsucursal` INT(11) UNSIGNED NOT NULL,
	`nombre` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`direccion` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`telefono` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`mapa` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`horario` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci'
);

-- Volcando estructura para vista terra-nova.tipo_propiedad
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `tipo_propiedad` (
	`idtipopropiedad` INT(11) UNSIGNED NOT NULL,
	`nombre` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci'
);

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `blogs`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `clientes`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `imagenes`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `postulaciones`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `propiedades`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_areas`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_familias`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_menu_area`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_menues`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_patente_familia`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_patentes`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_usuario_familia`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sistema_usuarios`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `sucursales`;

;

-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `tipo_propiedad`;

;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
