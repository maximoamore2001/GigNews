-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla burgers.carritos
CREATE TABLE IF NOT EXISTS `carritos` (
  `idcarrito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idcliente` int(11) unsigned NOT NULL,
  `fk_idproducto` int(11) unsigned NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcarrito`) USING BTREE,
  KEY `fk_idcliente` (`fk_idcliente`),
  KEY `fk_idproducto` (`fk_idproducto`),
  CONSTRAINT `FK_carritos_clientes` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_carritos_productos` FOREIGN KEY (`fk_idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.carritos: ~9 rows (aproximadamente)
INSERT INTO `carritos` (`idcarrito`, `fk_idcliente`, `fk_idproducto`, `cantidad`) VALUES
	(79, 46, 58, 1),
	(80, 46, 31, 1),
	(81, 46, 34, 1),
	(82, 46, 45, 1),
	(83, 46, 56, 1),
	(84, 46, 30, 1),
	(85, 46, 32, 2),
	(86, 49, 30, 1),
	(87, 49, 34, 1),
	(88, 49, 51, 1),
	(89, 49, 30, 1);

-- Volcando estructura para tabla burgers.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.categorias: ~1 rows (aproximadamente)
INSERT INTO `categorias` (`idcategoria`, `nombre`) VALUES
	(1, 'menu');

-- Volcando estructura para tabla burgers.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `dni` varchar(150) NOT NULL,
  `clave` varchar(350) NOT NULL,
  `correo` varchar(150) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.clientes: ~5 rows (aproximadamente)
INSERT INTO `clientes` (`idcliente`, `nombre`, `apellido`, `telefono`, `direccion`, `dni`, `clave`, `correo`) VALUES
	(45, 'Maximo', 'Amore', '3412297991', 'aymara 8025', '4323235522', '$2y$10$dirDaE43TXrbBF2u8LYr4uvBSEGkyaEu.x9Tt22DcC4/IqneyM8kC', 'maxi@gmail.com'),
	(46, 'samuel', 'lopez', '3413433540', 'Ovidio lagos 1618', '23980355', '$2y$10$ueyNz.VYQpZupLUSgk7ZEuEJvUhfz6.PbZS5L/uwIWUzA6gK/iKB2', 'samuellopez@gmail.com'),
	(47, 'agustin', 'gonzalez', '32423423423', 'san martin 2230', '35555992', '$2y$10$KaqjHpKHpJ5XermUrd8YNeKXAF3zRDv29yolu5RYAnO8PaDkDXA.C', 'agustin@gmail.com'),
	(49, 'martin', 'fernandez', '341341341', 'aymara 8028', '4323235522', '$2y$10$j0SF0/2RGrk/.f3.NmvwQutH2bLq3Xkcq9S6lPUfgi7diRSFSZM2O', 'martinfernandez@gmail.com'),
	(50, 'antony', 'martinez', '1231313', 'aymara 8028', '4323235522', '$2y$10$ltacuzJOKJG5a4p1Fw2YM.4Yk3miWYOeS5fzh4yfWubzU8nPsqNyy', 'antony@gmail.com');

-- Volcando estructura para tabla burgers.estado_pedidos
CREATE TABLE IF NOT EXISTS `estado_pedidos` (
  `idestadopedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`idestadopedido`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.estado_pedidos: ~5 rows (aproximadamente)
INSERT INTO `estado_pedidos` (`idestadopedido`, `nombre`) VALUES
	(1, 'pendiente de preparación'),
	(2, 'en preparación'),
	(3, 'entregado'),
	(4, 'Pedido cancelado'),
	(5, 'pendiente(pagado por MP)');

-- Volcando estructura para tabla burgers.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idcliente` int(11) unsigned NOT NULL,
  `fk_idsucursal` int(11) unsigned NOT NULL,
  `fk_idestadopedido` int(11) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pago` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `fk_idcliente` (`fk_idcliente`),
  KEY `fk_idsucursal` (`fk_idsucursal`),
  KEY `fk_idestadopedido` (`fk_idestadopedido`),
  CONSTRAINT `FK_pedidos_clientes` FOREIGN KEY (`fk_idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_estado_pedidos` FOREIGN KEY (`fk_idestadopedido`) REFERENCES `estado_pedidos` (`idestadopedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedidos_sucursales` FOREIGN KEY (`fk_idsucursal`) REFERENCES `sucursales` (`idsucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.pedidos: ~6 rows (aproximadamente)
INSERT INTO `pedidos` (`idpedido`, `fk_idcliente`, `fk_idsucursal`, `fk_idestadopedido`, `fecha`, `total`, `pago`) VALUES
	(83, 46, 8, 1, '2024-01-13 00:00:00', 3250.00, 'Efectivo'),
	(84, 46, 8, 3, '2024-01-13 12:35:02', 3250.00, 'Efectivo'),
	(85, 46, 8, 1, '2024-01-14 00:00:00', 8600.00, 'Efectivo'),
	(86, 46, 8, 1, '2024-01-15 00:00:00', 12650.00, 'Efectivo'),
	(87, 50, 7, 2, '2024-01-15 00:00:00', 2950.00, 'Efectivo'),
	(88, 50, 8, 1, '2024-01-15 00:00:00', 950.00, NULL),
	(89, 46, 8, 1, '2024-01-22 00:00:00', 16649.00, 'Efectivo'),
	(90, 49, 9, 1, '2024-01-23 00:00:00', 2900.00, 'Efectivo'),
	(91, 49, 7, 1, '2024-01-26 00:00:00', 4400.00, NULL);

-- Volcando estructura para tabla burgers.pedido_productos
CREATE TABLE IF NOT EXISTS `pedido_productos` (
  `idpedidoproducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fk_idproducto` int(11) unsigned NOT NULL,
  `fk_idpedido` int(11) unsigned NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpedidoproducto`),
  KEY `fk_idproducto` (`fk_idproducto`),
  KEY `fk_idpedido` (`fk_idpedido`),
  CONSTRAINT `FK_pedido_productos_pedidos` FOREIGN KEY (`fk_idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_pedido_productos_productos` FOREIGN KEY (`fk_idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.pedido_productos: ~30 rows (aproximadamente)
INSERT INTO `pedido_productos` (`idpedidoproducto`, `fk_idproducto`, `fk_idpedido`, `cantidad`) VALUES
	(126, 31, 83, 1),
	(127, 35, 83, 1),
	(128, 31, 84, 1),
	(129, 35, 84, 1),
	(130, 31, 85, 2),
	(131, 34, 85, 3),
	(132, 37, 85, 1),
	(133, 31, 86, 3),
	(134, 34, 86, 3),
	(135, 37, 86, 2),
	(136, 30, 87, 1),
	(137, 41, 87, 1),
	(138, 58, 87, 1),
	(139, 43, 87, 1),
	(140, 41, 88, 1),
	(141, 43, 88, 1),
	(142, 58, 89, 1),
	(143, 31, 89, 1),
	(144, 34, 89, 1),
	(145, 45, 89, 1),
	(146, 56, 89, 1),
	(147, 30, 89, 1),
	(148, 32, 89, 2),
	(149, 30, 90, 1),
	(150, 34, 90, 1),
	(151, 51, 90, 1),
	(152, 30, 91, 1),
	(153, 34, 91, 1),
	(154, 51, 91, 1),
	(155, 30, 91, 1);

-- Volcando estructura para tabla burgers.postulaciones
CREATE TABLE IF NOT EXISTS `postulaciones` (
  `idpostulacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `whatsapp` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `linkcv` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idpostulacion`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.postulaciones: ~2 rows (aproximadamente)
INSERT INTO `postulaciones` (`idpostulacion`, `nombre`, `apellido`, `whatsapp`, `correo`, `linkcv`) VALUES
	(26, 'samuel', 'benitez', '3413433540', 'maxi@gmail.com', '2024010609014011.doc'),
	(27, 'maximo', 'torres', '3413433540', 'maxi@gmail.com', '2024011211012054.pdf');

-- Volcando estructura para tabla burgers.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cantidad` int(10) unsigned NOT NULL DEFAULT 0,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `fk_idtipoproducto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idproducto`) USING BTREE,
  KEY `fk_idtipoproducto` (`fk_idtipoproducto`),
  CONSTRAINT `FK_productos_tipo_producto` FOREIGN KEY (`fk_idtipoproducto`) REFERENCES `tipo_producto` (`idtipoproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.productos: ~30 rows (aproximadamente)
INSERT INTO `productos` (`idproducto`, `titulo`, `precio`, `cantidad`, `descripcion`, `imagen`, `fk_idtipoproducto`) VALUES
	(30, 'hamburguesa simple', 1500.00, 500, 'medallon de carne con lechuga, tomate, salsa feane y aderezos a elección.', '2024011011013532.png', 1),
	(31, 'Hamburguesa whooper Feane', 2150.00, 1000, 'Medallon de carne con queso parmesano, guacamole y salsa gourmet , sin papas ni bebida.', '2024011011013535.png', 1),
	(32, '2 combos hamburguesa doble + papas fritas + bebidas', 4500.00, 100, 'doble medallon de carne con lechuga, tomate, salsa feane y aderezos a elección.', '2023122308125736.jpg', 6),
	(33, 'hamburguesa simple con queso', 1800.00, 2000, 'sin papas', '2023122203121535.webp', 1),
	(34, 'Cerveza Heineken 334 ml', 800.00, 100, 'Cerveza en lata', '2024011011010131.jpg', 4),
	(35, 'Coca cola 1.5L', 1100.00, 200, 'gaseosa coca cola común', '2024011011013126.jpg', 4),
	(36, 'Combo Big feane + papas fritas + vaso de gaseosa', 2200.00, 2000, 'Medallon de carne con lechuga y tomate/queso cheddar + salsa feane.', '2023122308120044.jpg', 6),
	(37, 'Combo stacker feane + papas fritas + bebida', 1900.00, 2000, 'Medallon de carne con queso cheddar y bacon ahumado.', '2024011011013012.png', 6),
	(38, 'Combo feliz simple Feane + papas + bebida + Among us', 2800.00, 2000, 'cajita feliz feane con jueguete sorpresa de among us', '2024011011014910.png', 6),
	(39, 'Long de hamburguesa de pollo clásico', 1000.00, 2000, 'hamburguesa de pollo XL con tomate y lechuga', '2024011010010658.png', 1),
	(40, 'Fanta 323ml', 400.00, 9000, 'Fanta sabor naranja', '2024011011015207.png', 4),
	(41, 'Sprite 323ml', 400.00, 9000, 'Sprite de limonada clásica', '2024011011013405.png', 4),
	(42, 'Aros de cebolla', 600.00, 2000, 'Tamaño mediano', '2024011011013400.png', 5),
	(43, 'Papas fritas medianas', 550.00, 2000, 'papas fritas medianas sin sal', '2024011205013041.png', 5),
	(44, 'Combo extra Feane + bebida + papas', 2800.00, 400, 'Hamburguesa feane extra XL clásica con papas medianas y bebida en lata', '2024011011011508.png', 6),
	(45, 'Papas fritas cheddar y bacon', 999.00, 2000, 'Bandeja de papas fritas grandes con cheddar y bacon + aderezos', '2024011011011338.png', 5),
	(46, 'Hamburguesa Feane especial', 1950.00, 2000, 'Hamburguesa con salsa feane, pepinos, cebolla y mostaza', '2024011011015707.png', 1),
	(47, 'Block paleta helada', 700.00, 2000, 'Sabor chocolate con maní', '2024011011015412.jpg', 7),
	(48, 'Palito helado Arcor', 500.00, 2000, 'Sabor chocolate y leche', '2024011011013913.jpg', 7),
	(49, 'Helado de agua Slice', 450.00, 2000, 'Sabor limón', '2024011011014014.jpg', 7),
	(50, 'Torta helada Águila premium', 4800.00, 100, 'Torta helada chocolate águila, americana y dulce de leche repostero', '2024011011010316.jpg', 7),
	(51, 'Palito bombón Arcor', 600.00, 2000, 'Relleno de crema americana con cobertura de chocolate bombón', '2024011011013717.jpg', 7),
	(52, 'Agua Evian 500ml', 800.00, 5000, 'Agua sin gas', '2024011205014030.webp', 4),
	(53, 'Combo extra Pollo + bebida + papas', 2900.00, 100, 'Medallon de pollo frito con lechuga y tomate/queso cheddar + salsa feane.', '2024011205015234.jpg', 6),
	(54, 'Papas fritas crocantes', 680.00, 500, 'Papas fritas rusticas crocantes', '2024011205010641.png', 5),
	(55, 'Ensalada de lechuga + tomate + choclo (vegana)', 1300.00, 500, 'Ensalada vegana de tomate, lechuga y choclo sin condimentos', '2024011205013445.png', 5),
	(56, 'Ensalada de pollo + lechuga + zanahoria', 1700.00, 2000, 'Ensalada de pollo cocido, lechuga y zanahoria sin condimentos + salsa césar', '2024011205015444.png', 5),
	(57, 'hamburguesa vegana simple', 1200.00, 2000, 'Medallon de arroz especial con pimientos + cebolla morada + vegan salsa feane.', '2024011205010049.avif', 1),
	(58, 'Helado ouch de Los simpsons', 500.00, 2500, 'Helado de crema y banana com-com', '2024011205011253.png', 7),
	(59, 'Aquarius 500ml sabor pera', 600.00, 2000, 'Bedida saborizada de pera sin gas', '2024011205014754.webp', 4);

-- Volcando estructura para tabla burgers.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idproveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `cuit` varchar(150) DEFAULT NULL,
  `fk_idrubro` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idproveedor`),
  KEY `fk_idrubro` (`fk_idrubro`),
  CONSTRAINT `FK_proveedores_rubros` FOREIGN KEY (`fk_idrubro`) REFERENCES `rubros` (`idrubro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.proveedores: ~1 rows (aproximadamente)
INSERT INTO `proveedores` (`idproveedor`, `nombre`, `domicilio`, `cuit`, `fk_idrubro`) VALUES
	(3, 'Milkaut', 'gonzalez del solar 994', '29928974639', 1);

-- Volcando estructura para tabla burgers.rubros
CREATE TABLE IF NOT EXISTS `rubros` (
  `idrubro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idrubro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.rubros: ~6 rows (aproximadamente)
INSERT INTO `rubros` (`idrubro`, `nombre`) VALUES
	(1, 'panadería'),
	(2, 'frigorificos'),
	(3, 'Aderezos'),
	(4, 'Envasados'),
	(5, 'Fiambrería'),
	(6, 'Refrescos');

-- Volcando estructura para tabla burgers.sistema_areas
CREATE TABLE IF NOT EXISTS `sistema_areas` (
  `idarea` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ncarea` varchar(50) NOT NULL,
  `descarea` varchar(50) NOT NULL,
  `activo` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idarea`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_areas: ~1 rows (aproximadamente)
INSERT INTO `sistema_areas` (`idarea`, `ncarea`, `descarea`, `activo`) VALUES
	(1, 'SISTEMAS', 'Sistemas', 1);

-- Volcando estructura para tabla burgers.sistema_familias
CREATE TABLE IF NOT EXISTS `sistema_familias` (
  `idfamilia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idfamilia`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_familias: ~7 rows (aproximadamente)
INSERT INTO `sistema_familias` (`idfamilia`, `nombre`, `descripcion`) VALUES
	(1, 'Administrador total', 'Administrador total'),
	(2, 'Cliente', 'Cliente'),
	(3, 'Administrador de la Empresa', 'Administrador de la Empresa'),
	(4, 'Administrativo', 'Administrador Parcial'),
	(5, 'Usuario', 'Usuario'),
	(9, 'Administrador', 'administrador total'),
	(10, 'admin', 'sdasd');

-- Volcando estructura para tabla burgers.sistema_menues
CREATE TABLE IF NOT EXISTS `sistema_menues` (
  `idmenu` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(250) DEFAULT '',
  `orden` int(11) DEFAULT 0,
  `nombre` varchar(200) NOT NULL DEFAULT '0',
  `id_padre` int(11) DEFAULT 0,
  `fk_idpatente` int(11) DEFAULT NULL,
  `css` varchar(255) DEFAULT '0',
  `activo` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`idmenu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_menues: ~32 rows (aproximadamente)
INSERT INTO `sistema_menues` (`idmenu`, `url`, `orden`, `nombre`, `id_padre`, `fk_idpatente`, `css`, `activo`) VALUES
	(7, '', 100, 'Sistema', 0, NULL, 'fa fa-lock fa-fw', 1),
	(8, '/admin/grupos', 3, 'Áreas de trabajo', 7, NULL, '', 1),
	(9, '/admin/usuarios', 1, 'Usuarios', 7, NULL, 'fas fa-users', 1),
	(10, '/admin/permisos', 2, 'Permisos', 7, NULL, '', 1),
	(85, '/admin/sistema/menu', 1, 'Menú', 7, NULL, '', 1),
	(137, '/admin/patentes', 2, 'Patentes', 7, NULL, '', 1),
	(140, '/admin/cliente/nuevo', 2, 'Nuevo cliente', 168, NULL, '', 1),
	(158, '/admin', -1, 'Inicio', 0, NULL, 'fas fa-home', 1),
	(168, NULL, 1, 'Clientes', 0, NULL, 'fas fa-user', 1),
	(169, '/admin/clientes', 0, 'Listado de clientes', 168, NULL, '', 1),
	(198, '/admin/productos', 1, 'Listado de Productos', 200, NULL, 'fas fa-hamburger', 1),
	(200, '', 2, 'Productos', 0, NULL, 'fas fa-hamburger', 1),
	(201, '/admin/producto/nuevo', 2, 'Nuevo producto', 200, NULL, 'fas fa-hamburger', 1),
	(202, NULL, 3, 'Pedidos', 0, NULL, 'fas fa-shopping-cart', 1),
	(203, '/admin/pedidos', 1, 'Listado de pedidos', 202, NULL, NULL, 1),
	(204, NULL, 4, 'Postulaciones', 0, NULL, 'fas fa-user-plus', 1),
	(206, '/admin/postulaciones', 1, 'Listado de postulaciones', 204, NULL, NULL, 1),
	(208, NULL, 6, 'Sucursales', NULL, NULL, 'fas fa-store', 1),
	(209, '/admin/sucursales', 1, 'Listado de sucursales', 208, NULL, NULL, 1),
	(210, NULL, 7, 'proveedores', NULL, NULL, 'fas fa-truck', 1),
	(211, '/admin/proveedores', 1, 'Listado de proveedores', 210, NULL, '', 1),
	(212, '/admin/provedor/nuevo', 2, 'Nuevo proveedor', 210, NULL, NULL, 1),
	(213, '/admin/proveedor/nuevo', 2, 'Nuevo proveedor', 210, NULL, NULL, 1),
	(214, NULL, 8, 'Rubros', NULL, NULL, 'fas fa-landmark', 1),
	(215, '/admin/rubros', 1, 'Listado de rubros', 214, NULL, NULL, 1),
	(216, '/admin/rubro/nuevo', 2, 'Nuevo rubro', 214, NULL, NULL, 1),
	(217, '/admin/sucursal/nuevo', 2, 'Nueva sucursal', 208, NULL, NULL, 1),
	(218, '/admin/pedido/nuevo', 2, 'Nuevo pedido', 202, NULL, '', 1),
	(223, '/admin/categorias', 1, 'Listado de Categorías', 226, NULL, '', 1),
	(224, '/admin/categoria/nuevo', 2, 'Nueva Categoría', 226, NULL, '', 1),
	(225, '/admin/postulacion/nuevo', 2, 'Nueva Postulación', 204, NULL, NULL, 1),
	(226, NULL, 8, 'Categorias', NULL, NULL, 'fas fa-list', 1);

-- Volcando estructura para tabla burgers.sistema_menu_area
CREATE TABLE IF NOT EXISTS `sistema_menu_area` (
  `fk_idmenu` int(11) unsigned NOT NULL,
  `fk_idarea` int(11) unsigned NOT NULL,
  KEY `fk_idmenu` (`fk_idmenu`) USING BTREE,
  KEY `fk_idarea` (`fk_idarea`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_menu_area: ~35 rows (aproximadamente)
INSERT INTO `sistema_menu_area` (`fk_idmenu`, `fk_idarea`) VALUES
	(10, 1),
	(8, 1),
	(17, 1),
	(85, 1),
	(9, 1),
	(137, 1),
	(140, 1),
	(147, 1),
	(157, 1),
	(7, 1),
	(158, 1),
	(168, 1),
	(169, 1),
	(177, 1),
	(200, 1),
	(198, 1),
	(201, 1),
	(202, 1),
	(203, 1),
	(204, 1),
	(206, 1),
	(208, 1),
	(209, 1),
	(210, 1),
	(213, 1),
	(214, 1),
	(215, 1),
	(216, 1),
	(217, 1),
	(218, 1),
	(225, 1),
	(211, 1),
	(226, 1),
	(223, 1),
	(224, 1);

-- Volcando estructura para tabla burgers.sistema_patentes
CREATE TABLE IF NOT EXISTS `sistema_patentes` (
  `idpatente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL DEFAULT '',
  `submodulo` varchar(50) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT '',
  `modulo` varchar(50) DEFAULT '',
  `log_operacion` smallint(6) NOT NULL DEFAULT 0,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idpatente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_patentes: ~79 rows (aproximadamente)
INSERT INTO `sistema_patentes` (`idpatente`, `tipo`, `submodulo`, `nombre`, `modulo`, `log_operacion`, `descripcion`) VALUES
	(1, 'CONSULTA', 'Permisos', 'PERMISOSCONSULTA', 'Sistema', 1, 'Consulta de permisos'),
	(2, 'ALTA', 'Permisos', 'PERMISOSALTA', 'Sistema', 1, 'Alta de familia'),
	(3, 'EDITAR', 'Permisos', 'PERMISOSMODIFICACION', 'Sistema', 1, 'Modificación de familia de permisos'),
	(4, 'BAJA', 'Permisos', 'PERMISOSBAJA', 'Sistema', 1, 'Baja de familia de permisos'),
	(5, 'BAJA', 'Grupo de usuarios', 'GRUPOBAJA', 'Sistema', 1, 'Baja de grupo de usuarios'),
	(6, 'CONSULTA', 'Grupo de usuarios', 'GRUPOCONSULTA', 'Sistema', 1, 'Consulta de grupo de usuarios'),
	(7, 'EDITAR', 'Grupo de usuarios', 'GRUPOMODIFICACION', 'Sistema', 1, 'Modificación de grupos de usuarios'),
	(8, 'ALTA', 'Grupo de usuarios', 'GRUPOALTA', 'Sistema', 1, 'Alta de grupos de usuarios'),
	(9, 'EDITAR', 'Usuario', 'USUARIOASIGNARGRUPO', 'Sistema', 1, 'Agrega grupos a un usuario'),
	(10, 'ALTA', 'Usuario', 'USUARIOALTA', 'Sistema', 1, 'Nuevo usuario'),
	(11, 'BAJA', 'Usuario', 'USUARIOELIMINAR', 'Sistema', 1, 'Eliminar usuario'),
	(12, 'EDITAR', 'Usuario', 'USUARIOMODIFICAR', 'Sistema', 1, 'Modificar usuario'),
	(13, 'EDITAR', 'Usuario', 'USUARIOAGREGARPERMISO', 'Sistema', 1, 'Agrega permisos dentro de la pantalla del usuario'),
	(14, 'BAJA', 'Usuario', 'USUARIOELIMINARPERMISO', 'Sistema', 1, 'Eliminar un permiso del usuario'),
	(15, 'CONSULTA', 'Usuario', 'USUARIOGRUPOGRILLA', 'Sistema', 1, 'Muestra la grilla de grupos de un usuario'),
	(16, 'EDITAR', 'Usuario', 'USUARIOGRUPOAGREGAR', 'Sistema', 1, 'Agrega un grupo para el usuario'),
	(17, 'BAJA', 'Usuario', 'USUARIOGRUPOELIMINAR', 'Sistema', 1, 'Elimina un grupo del usuario'),
	(18, 'EDITAR', 'Permisos', 'PERMISOSAGREGARPATENTE', 'Sistema', 1, 'Agrega patente a un permiso'),
	(19, 'BAJA', 'Permisos', 'PERMISOSELIMINARPATENTE', 'Sistema', 1, 'Elimina patente a un permiso'),
	(20, 'CONSULTA', 'Usuaurio', 'USUARIOCONSULTA', 'Sistema', 1, 'Consulta la lista de usuarios'),
	(30, 'EDITAR', 'Persona', 'PERSONAMODIFICACION', 'Panel de control ', 1, 'Modificar  una persona'),
	(31, 'ALTA', 'Persona', 'PERSONAALTA', 'Panel de control', 1, 'Agrega una nueva persona'),
	(32, 'CONSULTA', 'Persona', 'PERSONACONSULTA', 'Panel de control', 1, 'Listado de Personas'),
	(70, 'CONSULTA', 'Menu', 'MENUCONSULTA', 'Sistema', 1, 'Listado del menu del sistema'),
	(71, 'ALTA', 'Menu', 'MENUALTA', 'Sistema', 1, 'Agrega un nuevo elemento de menu'),
	(72, 'EDITAR', 'Menu', 'MENUMODIFICACION', 'Sistema', 1, 'Modifica un elemento de menu'),
	(73, 'BAJA', 'Menu', 'MENUELIMINAR', 'SIstema', 1, 'Elimina un elemento de menu'),
	(74, 'CONSULTA', 'Sistema', 'SIMULARALUMNO', 'Sistema', 1, 'Permite al administrador simular el login como alu'),
	(77, 'EDITAR', 'Tipo de cliente', 'TIPOCLIENTEMODIFICACIONES', 'Cliente', 1, 'Modificaciones tipo cliente'),
	(78, 'CONSULTA', 'Tipo de cliente', 'TIPOCLIENTECONSULTA', 'Cliente', 1, 'Consulta tipo de cliente'),
	(79, 'ALTA', 'Tipo de cliente', 'TIPOCLIENTEALTA', 'Cliente', 1, 'Altas de tipos de clientes'),
	(82, 'BAJA', 'Tipo de cliente', 'BAJATIPODECLIENTE', 'Cliente', 1, 'Bajas de tipos de clientes'),
	(91, 'ALTA', 'Nuevo cliente', 'CLIENTEALTA', 'Clientes', 0, 'Alta de nuevos clientes'),
	(92, 'EDITAR', 'Nuevo cliente', 'CLIENTEEDITAR', 'Clientes', 0, 'Editar clientes'),
	(93, 'BAJA', 'Nuevo cliente', 'CLIENTEELIMINAR', 'Clientes', 0, 'Eliminar clientes'),
	(94, 'CONSULTA', 'Listado de Clientes', 'CLIENTECONSULTA', 'Clientes', 0, 'Consulta de listado de clientes'),
	(99, 'ALTA', 'Productos', 'PRODUCTOSALTA', 'Productos', 1, 'Alta de productos'),
	(100, 'BAJA', 'Productos', 'PRODUCTOELIMINAR', 'Productos', 1, 'Baja de productos'),
	(101, 'EDITAR', 'Productos', 'PRODUCTOEDITAR', 'Productos', 1, 'Editar productos'),
	(102, 'CONSULTA', 'Productos', 'PRODUCTOCONSULTA', 'Productos', 1, 'Consulta de productos'),
	(143, 'CONSULTA', 'sucursales', 'SUCURSALCONSULTA', 'sucursales', 0, 'Consulta de sucursales'),
	(144, 'ALTA', 'sucursales', 'SUCURSALALTA', 'sucursales', 0, 'Alta de sucursales'),
	(145, 'BAJA', 'sucursales ', 'SUCURSALBAJA', 'sucursales', 0, 'baja de sucursales'),
	(148, 'EDITAR', 'sucursales', 'SUCURSALEDITAR', 'sucursales', 1, 'Modificacion de sucursal'),
	(153, 'CONSULTA', 'Inscripcion', 'INSCRIPCIONCONSULTA', 'Inscripcion', 1, 'Consulta de inscripciones'),
	(154, 'ALTA', 'Inscripcion', 'INSCRIPCIONALTA', 'Inscripcion', 1, 'Alta de inscripciones'),
	(155, 'EDITAR', 'Inscripcion', 'INSCRIPCIONMODIFICACION', 'Inscripcion', 1, 'Modificacion de inscripciones'),
	(158, 'BAJA', 'Permisos', 'INSCRIPCIONBAJA', 'Sistema', 1, 'Baja de inscripciones'),
	(176, 'ALTA', 'Patentes', 'PATENTESALTA', 'Patentes', 0, 'Registra nuevas patentes'),
	(177, 'BAJA', 'Patentes', 'PATENTESBAJA', 'Patentes', 0, 'Da de baja patentes'),
	(178, 'EDITAR', 'Patentes', 'PATENTESMODIFICACION', 'Patentes', 0, 'Modifica patentes existentes'),
	(179, 'CONSULTA', 'Patentes', 'PATENTESCONSULTA', 'Patentes', 0, 'Consulta patentes'),
	(181, 'CONSULTA', 'Pedido', 'PEDIDOCONSULTA', 'Pedido', 1, 'Permite listar los pedidos'),
	(184, 'Eliminar', 'Listar categorias', 'CATEGORIAELIMINAR', 'Categorias', 0, 'Elimina una categoria'),
	(185, 'CONSULTA', 'Listar consultas', 'CONSULTACONSULTA', 'Consultas', 1, 'Consultar las consultas'),
	(186, 'ALTA', 'Nueva consulta', 'CONSULTAALTA', 'Consultas', 1, 'Alta de categorias'),
	(187, 'BAJA', 'Listar consultas', 'CONSULTAELIMINAR', 'Consultas', 1, 'Elimina una consulta'),
	(188, 'EDITAR', 'Listar consultas', 'CONSULTAMODIFICACION', 'Consultas', 1, 'Modifica una consulta'),
	(209, 'ALTA', 'Patentes', 'PATENTEALTA', 'Patentes', 0, 'Permite ingresar una nueva patente'),
	(214, 'ALTA', 'Pedido', 'PEDIDOALTA', 'Pedido', 1, 'permite ingresar un nuevo pedido'),
	(215, 'EDITAR', 'Pedido', 'PEDIDOEDITAR', 'Pedido', 1, 'permite editar un pedido existente'),
	(216, 'BAJA', 'Pedido', 'PEDIDOBAJA', 'Pedido', 1, 'permite eliminar un pedido'),
	(221, 'ALTA', 'Postulacion', 'POSTULANTEALTA', 'Postulacion', 1, 'permite agregar un nuevo postulante'),
	(222, 'CONSULTA', 'Postulacion', 'POSTULANTECONSULTA', 'Postulacion', 1, 'permite modificar un nuevo postulante'),
	(223, 'EDITAR', 'Postulacion', 'POSTULANTEEDITAR', 'Postulacion', 1, 'permite modificar un nuevo postulante'),
	(224, 'BAJA', 'Postulacion', 'POSTULANTEBAJA', 'Postulacion', 1, 'permite dar de baja un postulante'),
	(225, 'CONSULTA', 'Pedido', 'PEDIDOVER', 'Pedido', 1, 'Permite ver por pedido'),
	(227, 'CONSULTA', 'Listado de rubros', 'RUBROCONSULTA', 'Rubros', 0, 'Consulta de listado de rubros'),
	(228, 'EDITAR', 'Nuevo rubro', 'RUBROEDITAR', 'Rubros', 0, 'Editar rubros'),
	(229, 'ALTA', 'Nuevo rubro', 'RUBROALTA', 'Rubros', 0, 'Dar de alta el rubro'),
	(230, 'BAJA', 'Nuevo rubro', 'RUBROBAJA', 'Rubros', 0, 'Dar de baja el rubro'),
	(231, 'CONSULTA', 'Listado de categorias', 'CATEGORIACONSULTA', 'Categorias', 0, 'Consulta de categorias'),
	(232, 'ALTA', 'Nueva categoria', 'CATEGORIAALTA', 'Categorias', 0, 'dar de alta la categoria'),
	(233, 'EDITAR', 'Nueva categoria', 'CATEGORIAEDITAR', 'Categorias', 0, 'Editar la categoria'),
	(234, 'BAJA', 'Nueva categoria', 'CATEGORIABAJA', 'Categorias', 0, 'Dar de baja la categoría'),
	(235, 'CONSULTA', 'Listado de proveedores', 'PROVEEDORCONSULTA', 'Proveedores', 1, 'consulta de proveedor'),
	(236, 'ALTA', 'Nuevo proveedor', 'PROVEEDORALTA', 'Proveedores', 1, 'dar de alta el proveedor'),
	(237, 'EDITAR', 'Nuevo proveedor', 'PROVEEDOREDITAR', 'Proveedores', 1, 'Editar proveedor'),
	(238, 'BAJA', 'Nuevo proveedor', 'PROVEEDORBAJA', 'Proveedores', 1, 'Dar de baja el proveedor');

-- Volcando estructura para tabla burgers.sistema_patente_familia
CREATE TABLE IF NOT EXISTS `sistema_patente_familia` (
  `fk_idpatente` int(11) unsigned NOT NULL,
  `fk_idfamilia` int(11) unsigned NOT NULL,
  KEY `fk_idpatente` (`fk_idpatente`) USING BTREE,
  KEY `fk_idfamilia` (`fk_idfamilia`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_patente_familia: ~110 rows (aproximadamente)
INSERT INTO `sistema_patente_familia` (`fk_idpatente`, `fk_idfamilia`) VALUES
	(10, 5),
	(12, 5),
	(10, 3),
	(12, 3),
	(128, 7),
	(129, 7),
	(130, 7),
	(131, 7),
	(10, 4),
	(11, 4),
	(12, 4),
	(20, 4),
	(1, 9),
	(2, 9),
	(3, 9),
	(4, 9),
	(5, 9),
	(6, 9),
	(7, 9),
	(8, 9),
	(9, 9),
	(10, 9),
	(11, 9),
	(12, 9),
	(13, 9),
	(14, 9),
	(15, 9),
	(16, 9),
	(17, 9),
	(18, 9),
	(19, 9),
	(20, 9),
	(176, 9),
	(177, 9),
	(178, 9),
	(179, 9),
	(209, 9),
	(18, 10),
	(19, 10),
	(176, 10),
	(177, 10),
	(178, 10),
	(179, 10),
	(209, 10),
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(91, 1),
	(92, 1),
	(93, 1),
	(94, 1),
	(99, 1),
	(100, 1),
	(101, 1),
	(102, 1),
	(143, 1),
	(144, 1),
	(145, 1),
	(148, 1),
	(153, 1),
	(154, 1),
	(155, 1),
	(158, 1),
	(176, 1),
	(177, 1),
	(178, 1),
	(179, 1),
	(181, 1),
	(185, 1),
	(209, 1),
	(214, 1),
	(215, 1),
	(216, 1),
	(221, 1),
	(222, 1),
	(223, 1),
	(224, 1),
	(225, 1),
	(227, 1),
	(228, 1),
	(229, 1),
	(230, 1),
	(231, 1),
	(232, 1),
	(233, 1),
	(234, 1),
	(235, 1),
	(236, 1),
	(237, 1),
	(238, 1);

-- Volcando estructura para tabla burgers.sistema_usuarios
CREATE TABLE IF NOT EXISTS `sistema_usuarios` (
  `idusuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `clave` varchar(250) NOT NULL,
  `ultimo_ingreso` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(50) NOT NULL DEFAULT 'current_timestamp()',
  `root` smallint(6) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `cantidad_bloqueo` int(11) DEFAULT NULL,
  `areapredeterminada` smallint(6) DEFAULT NULL,
  `activo` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idusuario`) USING BTREE,
  UNIQUE KEY `usuario` (`usuario`) USING BTREE,
  UNIQUE KEY `email` (`mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_usuarios: ~1 rows (aproximadamente)
INSERT INTO `sistema_usuarios` (`idusuario`, `usuario`, `nombre`, `apellido`, `mail`, `clave`, `ultimo_ingreso`, `token`, `root`, `created_at`, `cantidad_bloqueo`, `areapredeterminada`, `activo`) VALUES
	(1, 'admin', 'Administrador', '', 'admin@correo.com', '$2y$10$FeFXjlupKImULPF.aVRNueCALrpj55n.fotONLQ1QY3YvlYTelRP2', '2024-01-29 19:44:02', 'current_timestamp()', 1, '2021-09-17 19:05:57', 0, 1, 1);

-- Volcando estructura para tabla burgers.sistema_usuario_familia
CREATE TABLE IF NOT EXISTS `sistema_usuario_familia` (
  `fk_idusuario` int(11) unsigned NOT NULL,
  `fk_idfamilia` int(11) unsigned NOT NULL,
  `fk_idarea` int(11) unsigned NOT NULL,
  KEY `fk_idusuario` (`fk_idusuario`) USING BTREE,
  KEY `fk_idfamilia` (`fk_idfamilia`) USING BTREE,
  KEY `fk_idarea` (`fk_idarea`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla burgers.sistema_usuario_familia: ~1 rows (aproximadamente)
INSERT INTO `sistema_usuario_familia` (`fk_idusuario`, `fk_idfamilia`, `fk_idarea`) VALUES
	(1, 1, 1);

-- Volcando estructura para tabla burgers.sucursales
CREATE TABLE IF NOT EXISTS `sucursales` (
  `idsucursal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `mapa` varchar(150) DEFAULT NULL,
  `horario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.sucursales: ~4 rows (aproximadamente)
INSERT INTO `sucursales` (`idsucursal`, `nombre`, `direccion`, `telefono`, `mapa`, `horario`) VALUES
	(7, 'Bogotá', 'Colombres 223', '45122345', 'https://maps.app.goo.gl/cVFNvpYchHkUyA566', '08:00 AM a 21:00 PM'),
	(8, 'Rosario', 'Baigorria 913', '23445432', 'http://maps.com', '11:30 AM a 23:30 PM'),
	(9, 'Palermo', 'Ovidio lagos 1622', '34366788', 'http://maps.com', '11:00 AM a 00:00 AM'),
	(10, 'Córdoba', 'Santa cruz 1345', '011235644', 'http://maps.com', '12:00 AM a 23:00 PM');

-- Volcando estructura para tabla burgers.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `idtipoproducto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idtipoproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla burgers.tipo_producto: ~5 rows (aproximadamente)
INSERT INTO `tipo_producto` (`idtipoproducto`, `nombre`) VALUES
	(1, 'Hamburguesas'),
	(4, 'Bebidas'),
	(5, 'guarnición'),
	(6, 'Combos'),
	(7, 'Helados');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
