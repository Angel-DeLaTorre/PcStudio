DROP DATABASE IF EXISTS pcstudiodb;

CREATE DATABASE pcstudiodb;

USE pcstudiodb;

-- rol
DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- tag

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- categoria
DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


-- proveedor
DROP TABLE IF EXISTS `proveedor`;

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estatus` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


-- persona
DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellidoPaterno` varchar(150) DEFAULT NULL,
  `apellidoMaterno` varchar(150) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `rfc` varchar(10) DEFAULT NULL,
  `tipo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- users

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_idRol_usuario` (`idRol`),
  CONSTRAINT `Fk_idRol_usuario` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;


-- direccion
DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL AUTO_INCREMENT,
  `codigoPostal` int(11) NOT NULL,
  `calle` varchar(200) NOT NULL,
  `colonia` varchar(200) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `numeroExterno` varchar(10) NOT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idDireccion`),
  KEY `Fk_idPersona_Direccion` (`idPersona`),
  CONSTRAINT `Fk_idPersona_Direccion` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- contacto
DROP TABLE IF EXISTS `contacto`;

CREATE TABLE `contacto` (
  `idContacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ext` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idContacto`),
  KEY `Fk_idPersona_Contacto` (`idPersona`),
  CONSTRAINT `Fk_idPersona_Contacto` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- cliente
DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  idCliente int(11) NOT NULL AUTO_INCREMENT,
  codigoCliente varchar(30) NOT NULL,
  estatus int(11) NOT NULL,
  idTag int(11) NOT NULL,
  idPersona int(11) NOT NULL,
  idUsuario bigint(20) NOT NULL,
  PRIMARY KEY (idCliente),
  KEY idTag (idTag),
  KEY idPersona (idPersona),
  KEY idUsuario (idUsuario),
  CONSTRAINT Fk_idTag_Cliente FOREIGN KEY (idTag) REFERENCES tag(idTag),
  CONSTRAINT Fk_idPersona_Cliente FOREIGN KEY (idPersona) REFERENCES persona(idPersona),
  CONSTRAINT Fk_idUsuario_Cliente FOREIGN KEY (idUsuario) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- empleado
DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `codigoEmpleado` varchar(30) NOT NULL,
  `estatus` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idUsuario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `Fk_idPersona_Empleado` (`idPersona`),
  KEY `idUsuario` (`idUsuario`),
  CONSTRAINT `Fk_idPersona_Empleado` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- bitacoraCliente

DROP TABLE IF EXISTS `bitacoraCliente`;

CREATE TABLE `bitacoraCliente` (
  `idBitacoraCliente` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idBitacoraCliente`),
  KEY `Fk_idCliente_bitacoraCliente` (`idCliente`),
  CONSTRAINT `Fk_idCliente_bitacoraCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- bitacoraEmpleado

DROP TABLE IF EXISTS `bitacoraEmpleado`;

CREATE TABLE `bitacoraEmpleado` (
  `idBitacoraEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`idBitacoraEmpleado`),
  KEY `idEmpleado` (`idEmpleado`),
  CONSTRAINT `bitacoraEmpleado_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- producto
DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `precioCompra` float NOT NULL,
  `precioVenta` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuentoVenta` float NOT NULL,
  `estatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idTag` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `Fk_idTag_producto` (`idTag`),
  KEY `Fk_idCategoria_producto` (`idCategoria`),
  KEY `Fk_idProveedor_producto` (`idProveedor`),
  CONSTRAINT `Fk_idCategoria_producto` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  CONSTRAINT `Fk_idProveedor_producto` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`),
  CONSTRAINT `Fk_idTag_producto` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


-- atributoProducto

DROP TABLE IF EXISTS `atributoProducto`;

CREATE TABLE `atributoProducto` (
  `idAtributoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idAtributoProducto`),
  KEY `Fk_idProducto_atributoProducto` (`idProducto`),
  CONSTRAINT `Fk_idProducto_atributoProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- imagenProducto

DROP TABLE IF EXISTS `imagenProducto`;

CREATE TABLE `imagenProducto` (
  `idImagenProducto` int(11) NOT NULL AUTO_INCREMENT,
  `imagenUrl` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProducto`),
  CONSTRAINT `Fk_idProducto_imagenProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- carrito
DROP TABLE IF EXISTS `carrito`;

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `idUsuario` bigint(20) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCarrito`),
  KEY `Fk_idProducto_carrito` (`idProducto`),
  KEY `Fk_idUsuario_carrito` (`idUsuario`),
  CONSTRAINT `Fk_idProducto_carrito` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON UPDATE CASCADE,
  CONSTRAINT `Fk_idUsuario_carrito` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- compra
DROP TABLE IF EXISTS `compra`;

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `fechaCompra` datetime NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `Fk_idEmpleado_compra` (`idEmpleado`),
  KEY `Fk_idCliente_compra` (`idCliente`),
  CONSTRAINT `Fk_idCliente_compra` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `Fk_idEmpleado_compra` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- detalleCompra
DROP TABLE IF EXISTS `detalleCompra`;

CREATE TABLE `detalleCompra` (
  `idDetalleCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`idDetalleCompra`),
  KEY `Fk_idProducto_detalleCompra` (`idProducto`),
  KEY `Fk_idCompra_detalleCompra` (`idCompra`),
  CONSTRAINT `Fk_idCompra_detalleCompra` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`idCompra`),
  CONSTRAINT `Fk_idProducto_detalleCompra` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- migrations

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- password_resets

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- failed_jobs

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;