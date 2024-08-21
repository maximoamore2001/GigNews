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

-- Volcando datos para la tabla terranova.blogs: ~1 rows (aproximadamente)
INSERT INTO `blogs` (`idblog`, `titulo`, `fecha`, `descripcion`, `imagen`, `segundo_titulo`, `segunda_descripcion`) VALUES
	(1, 'Ofertas imperdibles en la ciudad de Chicago, IL', '2024-08-15', 'Descubre las mejores oportunidades inmobiliarias en Chicago con nuestras ofertas imperdibles. Mantente al tanto de las últimas tendencias del mercado, propiedades destacadas, y consejos exclusivos para encontrar tu hogar ideal en la Ciudad de los Vientos. Ya sea que estés buscando comprar, vender, o invertir, nuestro blog te brinda la información más actualizada y valiosa para tomar decisiones inteligentes. No te pierdas ninguna oportunidad en una de las ciudades más vibrantes de Estados Unidos.', '2024082110084208.jpg', 'Aprovecha las Mejores Oportunidades Inmobiliarias en Chicago', 'En nuestro blog de noticias, te mantenemos al día con las ofertas más atractivas del mercado inmobiliario en Chicago. Desde elegantes apartamentos en el centro hasta acogedoras casas en los barrios más codiciados, aquí encontrarás las mejores oportunidades para comprar, vender o invertir. Exploramos las tendencias actuales, compartimos análisis detallados y te ofrecemos consejos prácticos para ayudarte a tomar decisiones bien informadas. No dejes pasar estas ofertas exclusivas y haz realidad tu sueño de encontrar la propiedad perfecta en esta increíble ciudad');

-- Volcando datos para la tabla terranova.clientes: ~5 rows (aproximadamente)
INSERT INTO `clientes` (`idcliente`, `nombre`, `apellido`, `telefono`, `direccion`, `dni`, `clave`, `correo`) VALUES
	(45, 'Maximo', 'Amore', '3412297991', 'aymara 8025', '4323235522', '$2y$10$dirDaE43TXrbBF2u8LYr4uvBSEGkyaEu.x9Tt22DcC4/IqneyM8kC', 'maxi@gmail.com'),
	(46, 'samuel', 'lopez', '3413433540', 'Ovidio lagos 1618', '23980355', '$2y$10$ueyNz.VYQpZupLUSgk7ZEuEJvUhfz6.PbZS5L/uwIWUzA6gK/iKB2', 'samuellopez@gmail.com'),
	(47, 'agustin', 'gonzalez', '32423423423', 'san martin 2230', '35555992', '$2y$10$KaqjHpKHpJ5XermUrd8YNeKXAF3zRDv29yolu5RYAnO8PaDkDXA.C', 'agustin@gmail.com'),
	(49, 'martin', 'fernandez', '341341341', 'aymara 8028', '4323235522', '$2y$10$j0SF0/2RGrk/.f3.NmvwQutH2bLq3Xkcq9S6lPUfgi7diRSFSZM2O', 'martinfernandez@gmail.com'),
	(50, 'antony', 'martinez', '1231313', 'aymara 8028', '4323235522', '$2y$10$ltacuzJOKJG5a4p1Fw2YM.4Yk3miWYOeS5fzh4yfWubzU8nPsqNyy', 'antony@gmail.com');

-- Volcando datos para la tabla terranova.imagenes: ~0 rows (aproximadamente)

-- Volcando datos para la tabla terranova.postulaciones: ~2 rows (aproximadamente)
INSERT INTO `postulaciones` (`idpostulacion`, `nombre`, `apellido`, `whatsapp`, `correo`, `linkcv`) VALUES
	(26, 'samuel', 'benitez', '3413433540', 'maxi@gmail.com', '2024010609014011.doc'),
	(27, 'maximo', 'torres', '3413433540', 'maxi@gmail.com', '2024011211012054.pdf');

-- Volcando datos para la tabla terranova.propiedades: ~0 rows (aproximadamente)
INSERT INTO `propiedades` (`idpropiedad`, `titulo`, `precio`, `cantidad`, `descripcion`, `imagen`, `cantidadhabitaciones`, `cantidadbanios`, `cantidadplantas`, `pais`, `ciudad`, `direccion`, `garage`, `areapropiedad`, `fk_idtipopropiedad`) VALUES
	(60, 'Moderna Casa Familiar en Lincoln Park', 850000.00, 0, 'Esta casa moderna en Lincoln Park ofrece un diseño contemporáneo con acabados de alta calidad. Cuenta con amplios espacios abiertos, cocina gourmet, y un patio trasero ideal para entretener. Ubicada cerca de parques, escuelas, y tiendas, es perfecta para una familia que busca vivir en uno de los barrios más deseados de Chicago.', '2024082110085054.jpg', 4, 3, 2, 'Estados Unidos', 'Chicago, IL', '2451 N Halsted St, Chicago, IL 60614', 2, '1100', 1),
	(61, 'Lujoso Apartamento en el Centro de Chicago', 1200000.00, 0, 'Esta encantadora casa de campo ofrece el refugio perfecto en las afueras de Chicago. Con un amplio jardín, una cocina renovada y múltiples áreas de estar, es ideal para una familia que busca espacio y tranquilidad. La propiedad también cuenta con un sótano terminado y un garaje doble.', '2024082110082258.webp', 3, 2, 1, 'Estados Unidos', 'Naperville, IL', '1204 S Washington St, Naperville, IL 60540', 2, '2000', 1);

-- Volcando datos para la tabla terranova.sistema_areas: ~0 rows (aproximadamente)
INSERT INTO `sistema_areas` (`idarea`, `ncarea`, `descarea`, `activo`) VALUES
	(1, 'SISTEMAS', 'Sistemas', 1);

-- Volcando datos para la tabla terranova.sistema_familias: ~7 rows (aproximadamente)
INSERT INTO `sistema_familias` (`idfamilia`, `nombre`, `descripcion`) VALUES
	(1, 'Administrador total', 'Administrador total'),
	(2, 'Cliente', 'Cliente'),
	(3, 'Administrador de la Empresa', 'Administrador de la Empresa'),
	(4, 'Administrativo', 'Administrador Parcial'),
	(5, 'Usuario', 'Usuario'),
	(9, 'Administrador', 'administrador total'),
	(10, 'admin', 'sdasd');

-- Volcando datos para la tabla terranova.sistema_menues: ~30 rows (aproximadamente)
INSERT INTO `sistema_menues` (`idmenu`, `url`, `orden`, `nombre`, `id_padre`, `fk_idpatente`, `css`, `activo`) VALUES
	(7, '', 100, 'Sistema', 0, NULL, 'fas fa-wrench', 1),
	(8, '/admin/grupos', 3, 'Áreas de trabajo', 7, NULL, '', 1),
	(9, '/admin/usuarios', 1, 'Usuarios', 7, NULL, 'fas fa-users', 1),
	(10, '/admin/permisos', 2, 'Permisos', 7, NULL, '', 1),
	(85, '/admin/sistema/menu', 1, 'Menú', 7, NULL, '', 1),
	(137, '/admin/patentes', 2, 'Patentes', 7, NULL, '', 1),
	(140, '/admin/cliente/nuevo', 2, 'Nuevo cliente', 168, NULL, '', 1),
	(158, '/admin', -1, 'Inicio', 0, NULL, 'fas fa-home', 1),
	(168, NULL, 1, 'Clientes', 0, NULL, 'fas fa-users', 1),
	(169, '/admin/clientes', 0, 'Listado de clientes', 168, NULL, '', 1),
	(198, '/admin/propiedades', 1, 'Listado de Propiedades', 200, NULL, 'fas fa-home', 1),
	(200, '', 2, 'Propiedades', 0, NULL, 'fas fa-hotel', 1),
	(201, '/admin/propiedad/nuevo', 2, 'Nueva propiedad', 200, NULL, 'fas fa-home', 1),
	(203, '/admin/pedidos', 1, 'Listado de pedidos', 202, NULL, NULL, 1),
	(204, NULL, 4, 'Postulaciones', 0, NULL, 'fas fa-user-plus', 1),
	(206, '/admin/postulaciones', 1, 'Listado de postulaciones', 204, NULL, NULL, 1),
	(208, NULL, 6, 'Sucursales', NULL, NULL, 'fas fa-store', 1),
	(209, '/admin/sucursales', 1, 'Listado de sucursales', 208, NULL, NULL, 1),
	(211, '/admin/proveedores', 1, 'Listado de proveedores', 210, NULL, '', 1),
	(212, '/admin/provedor/nuevo', 2, 'Nuevo proveedor', 210, NULL, NULL, 1),
	(213, '/admin/proveedor/nuevo', 2, 'Nuevo proveedor', 210, NULL, NULL, 1),
	(215, '/admin/rubros', 1, 'Listado de rubros', 214, NULL, NULL, 1),
	(216, '/admin/rubro/nuevo', 2, 'Nuevo rubro', 214, NULL, NULL, 1),
	(217, '/admin/sucursal/nuevo', 2, 'Nueva sucursal', 208, NULL, NULL, 1),
	(218, '/admin/pedido/nuevo', 2, 'Nuevo pedido', 202, NULL, '', 1),
	(223, '/admin/categorias', 1, 'Listado de Categorías', 226, NULL, '', 1),
	(224, '/admin/categoria/nuevo', 2, 'Nueva Categoría', 226, NULL, '', 1),
	(225, '/admin/postulacion/nuevo', 2, 'Nueva Postulación', 204, NULL, NULL, 1),
	(227, NULL, 5, 'Blog', NULL, NULL, 'fas fa-comments', 1),
	(228, '/admin/blog', 1, 'Listado de blogs', 227, NULL, '', 1),
	(229, '/admin/blog/nuevo', 2, 'Nuevo post', 227, NULL, NULL, 1);

-- Volcando datos para la tabla terranova.sistema_menu_area: ~38 rows (aproximadamente)
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
	(224, 1),
	(227, 1),
	(228, 1),
	(229, 1);

-- Volcando datos para la tabla terranova.sistema_patentes: ~79 rows (aproximadamente)
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
	(238, 'BAJA', 'Nuevo proveedor', 'PROVEEDORBAJA', 'Proveedores', 1, 'Dar de baja el proveedor'),
	(239, 'CONSULTA', 'listado de blogs', 'BLOGCONSULTA', 'blog', 1, 'Consulta un blog'),
	(240, 'ALTA', 'Nuevo blog', 'BLOGALTA', 'blog', 1, 'Alta de blog'),
	(241, 'EDITAR', 'Nuevo blog', 'BLOGEDITAR', 'blog', 1, 'Edición de blog'),
	(242, 'BAJA', 'Nuevo blog', 'BLOGELIMINAR', 'blog', 1, 'Baja de blog');

-- Volcando datos para la tabla terranova.sistema_patente_familia: ~118 rows (aproximadamente)
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
	(18, 10),
	(19, 10),
	(176, 10),
	(177, 10),
	(178, 10),
	(179, 10),
	(209, 10),
	(5, 9),
	(6, 9),
	(7, 9),
	(8, 9),
	(239, 9),
	(240, 9),
	(241, 9),
	(242, 9),
	(176, 9),
	(177, 9),
	(178, 9),
	(179, 9),
	(209, 9),
	(1, 9),
	(2, 9),
	(3, 9),
	(4, 9),
	(18, 9),
	(19, 9),
	(9, 9),
	(10, 9),
	(11, 9),
	(12, 9),
	(13, 9),
	(14, 9),
	(15, 9),
	(16, 9),
	(17, 9),
	(20, 9),
	(240, 1),
	(239, 1),
	(241, 1),
	(242, 1),
	(232, 1),
	(234, 1),
	(231, 1),
	(233, 1),
	(91, 1),
	(94, 1),
	(92, 1),
	(93, 1),
	(185, 1),
	(8, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(154, 1),
	(158, 1),
	(153, 1),
	(155, 1),
	(71, 1),
	(70, 1),
	(73, 1),
	(72, 1),
	(209, 1),
	(176, 1),
	(177, 1),
	(179, 1),
	(178, 1),
	(214, 1),
	(216, 1),
	(181, 1),
	(215, 1),
	(225, 1),
	(18, 1),
	(2, 1),
	(4, 1),
	(1, 1),
	(19, 1),
	(3, 1),
	(221, 1),
	(224, 1),
	(222, 1),
	(223, 1),
	(102, 1),
	(101, 1),
	(100, 1),
	(99, 1),
	(236, 1),
	(238, 1),
	(235, 1),
	(237, 1),
	(229, 1),
	(230, 1),
	(227, 1),
	(228, 1),
	(144, 1),
	(145, 1),
	(143, 1),
	(148, 1),
	(13, 1),
	(10, 1),
	(9, 1),
	(20, 1),
	(11, 1),
	(16, 1),
	(17, 1),
	(15, 1),
	(12, 1);

-- Volcando datos para la tabla terranova.sistema_usuarios: ~0 rows (aproximadamente)
INSERT INTO `sistema_usuarios` (`idusuario`, `usuario`, `nombre`, `apellido`, `mail`, `clave`, `ultimo_ingreso`, `token`, `root`, `created_at`, `cantidad_bloqueo`, `areapredeterminada`, `activo`) VALUES
	(1, 'admin', 'Administrador', '', 'admin@correo.com', '$2y$10$FeFXjlupKImULPF.aVRNueCALrpj55n.fotONLQ1QY3YvlYTelRP2', '2024-08-21 12:52:25', 'current_timestamp()', 1, '2021-09-17 19:05:57', 0, 1, 1);

-- Volcando datos para la tabla terranova.sistema_usuario_familia: ~0 rows (aproximadamente)
INSERT INTO `sistema_usuario_familia` (`fk_idusuario`, `fk_idfamilia`, `fk_idarea`) VALUES
	(1, 1, 1);

-- Volcando datos para la tabla terranova.sucursales: ~4 rows (aproximadamente)
INSERT INTO `sucursales` (`idsucursal`, `nombre`, `direccion`, `telefono`, `mapa`, `horario`) VALUES
	(7, 'Bogotá', 'Colombres 223', '45122345', 'https://maps.app.goo.gl/cVFNvpYchHkUyA566', '08:00 AM a 21:00 PM'),
	(8, 'Rosario', 'Baigorria 913', '23445432', 'http://maps.com', '11:30 AM a 23:30 PM'),
	(9, 'Palermo', 'Ovidio lagos 1622', '34366788', 'http://maps.com', '11:00 AM a 00:00 AM'),
	(10, 'Córdoba', 'Santa cruz 1345', '011235644', 'http://maps.com', '12:00 AM a 23:00 PM');

-- Volcando datos para la tabla terranova.tipo_propiedad: ~5 rows (aproximadamente)
INSERT INTO `tipo_propiedad` (`idtipopropiedad`, `nombre`) VALUES
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
