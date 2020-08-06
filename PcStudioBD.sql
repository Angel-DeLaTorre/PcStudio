CREATE DATABASE pcstudiodb;

use pcstudiodb;
<<<<<<< HEAD
=======

DROP DATABASE IF EXISTS pcstudiodb;

SELECT * FROM persona;

select * from empleados;
DESCRIBE PERSONA;
>>>>>>> c3f8d17ba3392c0e1a8541dfbec95314ea9ccd0f
-- PERSONA
CREATE TABLE persona(
    idPersona INT  AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(150) NOT NULL,
    apellidoPaterno VARCHAR(150),
    apellidoMaterno VARCHAR(150),
    fechaNacimiento DATE,
    telefono VARCHAR(20) NOT NULL,
    rfc VARCHAR(10),
    tipo boolean not null,    
    CONSTRAINT Pk_idPersona PRIMARY KEY(idPersona)
);

-- CONTACTO
CREATE TABLE contacto(
    idContacto INT  AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(150) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    ext VARCHAR(5) NOT NULL,
    email VARCHAR(50) NOT NULL,
    idPersona INT NOT NULL,
    CONSTRAINT Fk_idContacto PRIMARY KEY (idContacto),
    CONSTRAINT Fk_idPersona_Contacto FOREIGN KEY(idPersona) REFERENCES persona(idPersona)
);

-- DIRECCION
CREATE TABLE direccion(
    idDireccion INT NOT NULL AUTO_INCREMENT,
    codigoPostal INT NOT NULL,
    calle VARCHAR(200) NOT NULL,
    colonia VARCHAR(200) NOT NULL,
    estado VARCHAR(40) NOT NULL,
    municipio VARCHAR(200) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    numeroExterno VARCHAR(10) NOT NULL,
    idPersona INT NOT NULL,
    CONSTRAINT Pk_idDireccion PRIMARY KEY(idDireccion),
    CONSTRAINT Fk_idPersona_Direccion FOREIGN KEY(idPersona) REFERENCES persona(idPersona)
);

-- EMPLEADO
CREATE TABLE empleados(
    idEmpleado INT NOT NULL AUTO_INCREMENT,
    codigoEmpleado VARCHAR(30) NOT NULL, 
    estatus INT NOT NULL,
    idPersona INT NOT NULL,
    idUsuario bigint NOT NULL,
    CONSTRAINT Pk_idEmpleado PRIMARY KEY(idEmpleado),
    CONSTRAINT Fk_idPersona_Empleado FOREIGN KEY(idPersona) REFERENCES persona(idPersona),
    CONSTRAINT Fk_idUsuario_Empleado FOREIGN KEY(idUsuario) REFERENCES users(id)
);

-- BITACORAEMPLEADO
CREATE TABLE bitacoraEmpleado(
    idBitacoraEmpleado INT NOT NULL AUTO_INCREMENT,
    fecha DATETIME NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    idEmpleado INT NOT NULL,
    CONSTRAINT Pk_idBitacoraEmpleado PRIMARY KEY(idBitacoraEmpleado),
    CONSTRAINT Fk_idEmpleado_bitacoraEmpleado FOREIGN KEY(idEmpleado) REFERENCES empleado(idEmpleado)
);

-- CLIENTE
CREATE TABLE cliente(
    idCliente INT NOT NULL AUTO_INCREMENT,
    codigoCliente VARCHAR(30) NOT NULL,
    estatus INT NOT NULL,
    idTag INT NOT NULL,
    idPersona INT NOT NULL,
    idUsuario BIGINT NOT NULL,
    CONSTRAINT Pk_idCliente PRIMARY KEY(idCliente),
    CONSTRAINT Fk_idTag_Cliente FOREIGN KEY(idTag) REFERENCES tag(idTag),
    CONSTRAINT Fk_idPersona_Cliente FOREIGN KEY(idPersona) REFERENCES persona(idPersona),
    CONSTRAINT Fk_idUsuario_Cliente FOREIGN KEY(idUsuario) REFERENCES users(id)
);

-- BITACORACLIENTE
CREATE TABLE bitacoraCliente(
    idBitacoraCliente INT NOT NULL AUTO_INCREMENT,
    fecha DATETIME NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    idCliente INT NOT NULL,
    CONSTRAINT Pk_idBitacoraCliente PRIMARY KEY(idBitacoraCliente),
    CONSTRAINT Fk_idCliente_bitacoraCliente FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
);

-- PRODUCTO
CREATE TABLE producto(
    idProducto INT NOT NULL AUTO_INCREMENT,
    codigoProducto VARCHAR(60) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion VARCHAr(400) NOT NULL,
    marca VARCHAR(200) NOT NULL,
    precioCompra FLOAT NOT NULL,
    precioVenta FLOAT NOT NULL,
    cantidad INT NOT NULL,
    descuentoVenta FLOAT NOT NULL,
    estatus INT NOT NULL,
    idTag INT NOT NULL,
    idCategoria INT NOT NULL,
    idProveedor INT NOT NULL,
    CONSTRAINT Pk_idProducto PRIMARY KEY(idProducto),
    CONSTRAINT Fk_idTag_Cliente FOREIGN KEY(idTag) REFERENCES tag(idTag),
    CONSTRAINT Fk_idCategoria_producto FOREIGN KEY(idCategoria) REFERENCES categoria(idCategoria),
    CONSTRAINT Fk_idProveedor_producto FOREIGN KEY(idProveedor) REFERENCES proveedor(idProveedor)
);

-- ATRIBUTOPRODUCTO
CREATE TABLE atributoProducto(
    idAtributoProducto INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion VARCHAR(300) NOT NULL,
    idProducto INT NOT NULL,
    CONSTRAINT Pk_idAtributoProducto PRIMARY KEY(idAtributoProducto),
    CONSTRAINT Fk_idProducto_atributoProducto FOREIGN KEY(idProducto) REFERENCES producto(idProducto)
);

-- CATEGORIA
    -- Laptops
    -- Perifericos
    -- pc de escritorio
    -- Accesorios
    -- Componentes de hardware
CREATE TABLE categoria(
    idCategoria INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100),
    descripcion VARCHAR(300),
    updated_at timestamp null,
    created_at timestamp null,
    CONSTRAINT Pk_idCategoria PRIMARY KEY(idCategoria)
)

-- IMAGENPRODUCTO
CREATE TABLE imagenProducto(
    idImagenProducto INT NOT NULL AUTO_INCREMENT,
    imagenUrl VARCHAR(100) NOT NULL,
    idProducto INT NOT NULL,
    CONSTRAINT Pk_idImagenProducto PRIMARY KEY(idImagenProducto),
    CONSTRAINT Fk_idProducto_imagenProducto FOREIGN KEY(idProducto) REFERENCES producto(idProducto)
)

CREATE TABLE proveedor(
    idProveedor INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    estatus INT NOT NULL,
    updated_at timestamp null,
    created_at timestamp null,
    CONSTRAINT Pk_idProveedor PRIMARY KEY(idProveedor)
)

-- CARRITO
CREATE TABLE carrito(
    idCarrito INT NOT NULL AUTO_INCREMENT,
    idUsuario BIGINT NOT NULL,
    idProducto INT NOT NULL,
    cantidadProducto INT NOT NULL,
    estatus INT NOT NULL,
    CONSTRAINT Pk_idCarrito PRIMARY KEY(idCarrito),
    CONSTRAINT Fk_idProducto_carrito FOREIGN KEY(idProducto) REFERENCES producto(idProducto),
    CONSTRAINT Fk_idUsuario_carrito FOREIGN KEY(idUsuario) REFERENCES users(id)
)

-- COMPRA
CREATE TABLE compra(
    idCompra INT NOT NULL AUTO_INCREMENT,
    fechaCompra DATETIME NOT NULL,
    idEmpleado INT NOT NULL,
    idCliente INT NOT NULL,
    CONSTRAINT Pk_idCompra PRIMARY KEY(idCompra),
    CONSTRAINT Fk_idEmpleado_compra FOREIGN KEY(idEmpleado) REFERENCES empleado(idEmpleado),
    CONSTRAINT Fk_idCliente_compra FOREIGN KEY(idCliente) REFERENCES cliente(idCliente)
)

-- DETALLE COMPRA
CREATE TABLE detalleCompra(
    idDetalleCompra INT NOT NULL AUTO_INCREMENT,
    idCompra INT NOT NULL,
    idProducto INT NOT NULL,
    cantidad INT NOT NULL,
    costo INT NOT NULL,
    CONSTRAINT Pk_idDetalleCompra PRIMARY KEY(idDetalleCompra),
    CONSTRAINT Fk_idProducto_detalleCompra FOREIGN KEY(idProducto) REFERENCES producto(idProducto),
    CONSTRAINT Fk_idCompra_detalleCompra FOREIGN KEY(idCompra) REFERENCES compra(idCompra)
)


-- USUARIO
CREATE TABLE users(
    id bigint(20) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,	
    email varchar(255) NOT	NULL,
    email_verified_at timestamp null,	
    password varchar(255) NOT NULL,	
    remember_token	varchar(100),
    created_at	timestamp null,
    updated_at	timestamp null,
    idRol INT NOT NULL,
    CONSTRAINT Pk_idUsuario PRIMARY KEY(id),
    CONSTRAINT Fk_idRol_usuario FOREIGN KEY(idRol) REFERENCES rol(idRol)
)

-- ROL
CREATE TABLE rol(
    idRol INT AUTO_INCREMENT not null,
    rol varchar(30) not null,
    CONSTRAINT Pk_idRol PRIMARY KEY(idRol)
)

-- TAG
    -- Alta (Entretenimiento, edicion de video, programas 18000)    --11 - 13
    -- Medio (area de ciencia, 8000 a 15000)                        --7 - 10
    -- Bajo1 (estandares de office 8000-10000)                      --4 - 6
    -- Bajo2 (No sabe ni madres de computadora)                     --3
CREATE TABLE tag(
    idTag INT AUTO_INCREMENT not null,
    tag varchar(30) not null,
    CONSTRAINT Pk_idTag PRIMARY KEY(idTag)
)