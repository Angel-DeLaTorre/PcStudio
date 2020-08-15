-- En este archivo se encuentran recopilados los procedientos necesarios de la aplicación
USE pcstudiodb;

-- ACTUALIZAR CLIENTE MORAL

DELIMITER $$

DROP PROCEDURE IF EXISTS sp_actualizarClienteMoral;

CREATE PROCEDURE sp_actualizarClienteMoral(
-- Persona
    IN var_idPersona INT(12),
    IN var_nameInstitucion VARCHAR(151), -- 1
    IN var_telefonoIntitucion VARCHAR(21), -- 2
    IN var_rfc VARCHAR(11), -- 3

-- Contacto
    IN var_nameContacto VARCHAR(151), -- 4
    IN var_telContacto VARCHAR(16), -- 5
    IN var_ext VARCHAR(16), -- 6
    IN var_emailContacto VARCHAR(51) -- 7

)

BEGIN

    DECLARE var_validacion INT(12);

    START TRANSACTION;

    IF var_idPersona > 1 THEN

        UPDATE persona
        SET nombre   = var_nameInstitucion,
            telefono = var_telefonoIntitucion,
            rfc      = var_rfc
        WHERE idPersona = var_idPersona;

        UPDATE contacto
        SET nombre   = var_nameContacto,
            telefono = var_telContacto,
            ext      = var_ext,
            email    = var_emailContacto
        WHERE idPersona = var_idPersona;

        SET var_validacion
            = 2;
        SELECT var_validacion;

        COMMIT;

    ELSE

        SET var_validacion
            = 1;
        SELECT var_validacion;

        ROLLBACK;

    END
        IF;

END;

$$


DELIMITER ;


-- ACTUALIZAR EMPLEADO
-- call sp_actualizarEmpleado(2, 'jose jose', 'salas', 'ornelas', '2000-07-07', '47788939', '');


DROP PROCEDURE IF EXISTS sp_actualizarEmpleado;

DELIMITER $$

CREATE PROCEDURE sp_actualizarEmpleado(IN var_idEmpleado INT(12), -- 1

                                       IN var_nombre VARCHAR(151), -- 2
                                       IN var_apellidoP VARCHAR(151), -- 3
                                       IN var_apellidoM VARCHAR(151), -- 4
                                       IN var_fechaN DATE, -- 6
                                       IN var_telefono VARCHAR(21), -- 6
                                       IN var_rfc VARCHAR(11) -- 7

)

BEGIN

    DECLARE var_idPersona INT(12);
    DECLARE var_validacion INT(12);

    -- Iniciamos la transaccion por si algo sale mal
    START TRANSACTION;

    -- Recuperamos el id de persona segun el empleado
    SET var_idPersona = (select idPersona from empleados where idEmpleado = var_idEmpleado);


    -- SI ENCUETRA EL ID DE LA PERSONA EN BASE A LA DEL EMPLEADO
    -- SE REALIZA LA ACTUALIZACION, DE LO CONTRARIO SE ECHA PARA ATRAS
    IF var_idPersona > 1 THEN


        UPDATE persona
        SET nombre          = var_nombre,
            apellidoPaterno = var_apellidoP,
            apellidoMaterno = var_apellidoM,
            fechaNacimiento = var_fechaN,
            telefono        = var_telefono,
            rfc             = var_rfc
        WHERE idPersona = var_idPersona;


        SET var_validacion = 2;
        SELECT var_validacion;

        COMMIT;

    ELSE

        SET var_validacion = 1;

        SELECT var_validacion;

        ROLLBACK;

    END IF;

END


$$


DELIMITER ;


-- ACTUALIZAR USUARIO

DROP PROCEDURE IF EXISTS sp_actualizarUsuario;

DELIMITER $$

CREATE PROCEDURE sp_actualizarUsuario(IN var_idUsuario INT(12),
                                      IN var_nombre VARCHAR(256),
                                      IN var_email VARCHAR(256),
                                      IN var_password VARCHAR(256),
                                      IN var_rol VARCHAR(101))

BEGIN

    DECLARE var_idRol INT(12);
    DECLARE var_verificacion INT(12);

    START TRANSACTION;

    SET var_idRol = (SELECT idRol FROM rol WHERE rol = var_rol);


    IF var_idRol > 1 THEN


        IF var_password is not null THEN

            UPDATE users
            SET name       = var_nombre,
                email      = var_email,
                password   = var_password,
                updated_at = NOW(),
                idRol      = var_idRol
            WHERE id = var_idUsuario;

            SET var_verificacion = 2;

            SELECT var_verificacion;

            COMMIT;

        ELSE

            UPDATE users
            SET name       = var_nombre,
                email      = var_email,
                updated_at = NOW(),
                idRol      = var_idRol
            WHERE id = var_idUsuario;

            SET var_verificacion = 2;

            SELECT var_verificacion;

            COMMIT;


        END IF;

    ELSE

        SET var_verificacion = 1;

        SELECT var_verificacion;

        ROLLBACK;

    END IF;

END;

$$

DELIMITER ;


-- INSERTAR EMPLEADO

DROP PROCEDURE IF EXISTS sp_insertarEmpleado;

DELIMITER $$

CREATE PROCEDURE sp_insertarEmpleado(IN var_nombre VARCHAR(256), -- 1
                                     IN var_email VARCHAR(256), -- 2
                                     IN var_password VARCHAR(256), -- 3
                                     IN var_rol INT(12), -- 4


                                     IN var_apellidoP VARCHAR(151), -- 5
                                     IN var_apellidoM VARCHAR(151), -- 6
                                     IN var_fechaN DATE, -- 8
                                     IN var_telefono VARCHAR(21), -- 8
                                     IN var_rfc VARCHAR(11), -- 9
                                     IN var_estatus INT(12) -- 10
)

BEGIN

    DECLARE var_idUsuario INT(12);
    DECLARE var_idPersona INT(12);
    DECLARE var_codEmpleado VARCHAR(31);
    DECLARE var_idEmpleados INT(12);

    START TRANSACTION;

    -- REALIZAMOS EL REGISTRO DEL USUARIO
    INSERT INTO users(name, email, email_verified_at, password, remember_token, created_at, updated_at, idRol)
        value (var_nombre, var_email, null, var_password, null, NOW(), NOW(), 2);

    -- RECUPERAMOS EL ID DEL USUARIO
    SET var_idUsuario = LAST_INSERT_ID();

    INSERT INTO persona (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, telefono, rfc, tipo)
        VALUE (var_nombre, var_apellidoP, var_apellidoM, var_fechaN, var_telefono, var_rfc, 1);


    SET var_idPersona = LAST_INSERT_ID();

    SET var_codEmpleado =
            CONCAT('EN', SUBSTRING(UPPER(var_nombre), 2, 2), SUBSTRING(UPPER(var_apellidoP), 1, 2), var_idPersona,
                   CAST(UNIX_TIMESTAMP() AS CHAR));

    INSERT INTO empleado (codigoEmpleado, estatus, idPersona, idUsuario) VALUE (var_codEmpleado, var_estatus, var_idPersona, var_idUsuario);

    SET var_idEmpleados = LAST_INSERT_ID();

    IF var_idEmpleados > 1 AND var_idPersona > 0 AND var_idEmpleados > 0 THEN

        commit;

    ELSE

        rollback;


    END IF;

END

$$

DELIMITER ;

-- INSERTAR CLIENTE (PERSONA FÍSICA)

DELIMITER $$

DROP PROCEDURE IF EXISTS sp_insertarCliente;


CREATE PROCEDURE sp_insertarCliente(IN var_nombre VARCHAR(256), -- 1
                                    IN var_apellidoP VARCHAR(151), -- 2
                                    IN var_apellidoM VARCHAR(151), -- 3
                                    IN var_fechaN DATE, -- 5
                                    IN var_telefono VARCHAR(21), -- 5
                                    IN var_rfc VARCHAR(11), -- 6
                                    IN var_idUsuario INT(12), -- 7
                                    IN var_tag VARCHAR(16) -- 8
)
BEGIN

    DECLARE var_validacion INT(12);
    DECLARE var_idTag INT(12);
    DECLARE var_idPersona INT(12);
    DECLARE var_codCliente VARCHAR(31);
    DECLARE var_idCliente INT(12);

    START TRANSACTION;

    SET var_idTag = (SELECT idTag FROM tag WHERE tag = var_tag);


    INSERT INTO persona (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, telefono, rfc, tipo)
        VALUE (var_nombre, var_apellidoP, var_apellidoM, var_fechaN, var_telefono, var_rfc, 2);

    SET var_idPersona = LAST_INSERT_ID();

    SET var_codCliente = CONCAT('CLI', SUBSTRING(UPPER(var_nombre), 2, 2),
                                SUBSTRING(UPPER(var_apellidoP), 2, 2), var_idPersona, CAST(UNIX_TIMESTAMP() AS CHAR));

    INSERT INTO cliente(codigoCliente, estatus, idTag, idPersona, idUsuario)
        VALUE (var_codCliente, 2, var_idTag, var_idPersona, var_idUsuario);

    SET var_idCliente = LAST_INSERT_ID();

    IF var_idCliente > 1 THEN

        SET var_validacion = 2;
        SELECT var_validacion;
        COMMIT;

    ELSE

        SET var_validacion = 1;
        SELECT var_validacion;

        ROLLBACK;

    END IF;


END

$$

DELIMITER ;


-- INSERTAR CLIENTE (PERSONA MORAL)

DROP PROCEDURE IF EXISTS sp_insertarClienteMoral;

USE pcstudiodb;

DELIMITER $$

CREATE PROCEDURE sp_insertarClienteMoral(
-- Persona
    IN var_nameInstitucion VARCHAR(151), -- 1
    IN var_telefonoIntitucion VARCHAR(21), -- 2
    IN var_rfc VARCHAR(11), -- 3

-- Contacto
    IN var_nameContacto VARCHAR(151), -- 4
    IN var_telContacto VARCHAR(16), -- 5
    IN var_ext VARCHAR(16), -- 6
    IN var_emailContacto VARCHAR(51), -- 7

-- User
    IN var_emailRegistro VARCHAR(256), -- 8
    IN var_password VARCHAR(256) -- 9

)

BEGIN

    DECLARE var_idUsuario INT(12);
    DECLARE var_idPersona INT(12);
    DECLARE var_codCliente VARCHAR(31);
    DECLARE var_idCliente INT(12);
    DECLARE var_rol INT(12);
    DECLARE var_tag INT(12);
    DECLARE var_idContacto INT(12);
    DECLARE var_validacion INT(12);

    START TRANSACTION;

    SET var_tag = (SELECT idTag FROM tag WHERE tag = 'Avanzado');

    SET var_rol = (SELECT idRol FROM rol WHERE rol = 'CLIENTE');

    -- insertamos en la tabla persona
    INSERT INTO persona (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, telefono, rfc, tipo)
        VALUE (var_nameInstitucion, null, null, null, var_telefonoIntitucion, var_rfc, 3);

    -- RECUPERAMOS EL ID DEL PERSONA
    SET var_idPersona = LAST_INSERT_ID();

    -- REALIZAMOS EL REGISTRO DEL USUARIO
    INSERT INTO users(name, email, email_verified_at, password, remember_token, created_at, updated_at, idRol)
        VALUE (var_nameInstitucion, var_emailRegistro, null, var_password, null, NOW(), NOW(), var_rol);

    -- RECUPERAMOS EL ID DEL USUARIO
    SET var_idUsuario = LAST_INSERT_ID();

    -- SE CREA EL CODIGO DEL CLIENTE MORAL
    SET var_codCliente = CONCAT('CLI', 'M', SUBSTRING(UPPER(var_nameInstitucion), 2, 2),
                                SUBSTRING(UPPER(var_rfc), 2, 2), var_idPersona, CAST(UNIX_TIMESTAMP() AS CHAR));

    --  REALIZAMOS EL REGISTRO DEL CLIENTE
    INSERT INTO cliente(codigoCliente, estatus, idTag, idPersona, idUsuario)
        VALUE (var_codCliente, 2, var_tag, var_idPersona, var_idUsuario);

    -- RECUPERAMOS EL ID DEL CLIENTE
    SET var_idCliente = LAST_INSERT_ID();

    -- REALIZAMOS EL REGISTRO DEL CONTACTO
    INSERT INTO contacto (nombre, telefono, ext, email, idPersona)
        VALUE (var_nameContacto, var_telContacto, var_ext, var_emailContacto, var_idPersona);

    -- RECUPERAMOS EL ID DEL CLIENTE
    SET var_idContacto = LAST_INSERT_ID();

    IF var_idPersona > 1 AND var_idUsuario > 0 AND var_idCliente > 0 AND var_idContacto > 0 THEN

        SET var_validacion = 2;
        SELECT var_validacion;
        COMMIT;

    ELSE

        SET var_validacion = 1;
        SELECT var_validacion;
        ROLLBACK;

    END IF;


END;

$$

DELIMITER ;


-- PRODUCTOS

DROP PROCEDURE IF EXISTS sp_InsertarProducto;
CREATE PROCEDURE sp_InsertarProducto(IN titulo VARCHAR(101),
                                     IN descripcion VARCHAR(401),
                                     IN marca VARCHAR(201),
                                     IN precioC FLOAT,
                                     IN precioV FLOAT,
                                     IN cantidad INT,
                                     IN descuento FLOAT,
                                     IN estatus INT,
                                     IN created_at TIMESTAMP,
                                     IN tag INT,
                                     IN categoria INT,
                                     IN proveedor INT,
                                     IN atributos TEXT,
                                     IN imagenes TEXT,
                                     OUT id INT)
BEGIN
    DECLARE items TEXT DEFAULT '';
    DECLARE titul TEXT DEFAULT '';
    DECLARE descr TEXT DEFAULT '';
    DECLARE ruta TEXT DEFAULT '';
    DECLARE lon INT DEFAULT 1;
    DECLARE pos INT DEFAULT 1;
    DECLARE v INT DEFAULT 1;

    INSERT INTO producto (titulo, descripcion, marca, precioCompra, precioVenta, cantidad, descuentoVenta, estatus,
                          created_at, idTag, idCategoria, idProveedor)
    VALUES (titulo, descripcion, marca, precioC, precioV, cantidad, descuentoVenta, estatus, created_at, tag, categoria,
            proveedor);
    SET id = LAST_INSERT_ID();

    SET pos = (SELECT POSITION('-' IN atributos));
    WHILE v = 1
        DO
            SET items = (SELECT SUBSTRING(atributos, 2, pos - 1));

            SET pos = (SELECT POSITION('*' IN items));
            SET lon = (LENGTH(items));

            SET titul = (SELECT SUBSTRING(items, 2, pos - 1));
            SET descr = (SELECT SUBSTRING(items, pos + 2, lon - 1));

            INSERT INTO atributoproducto (titulo, descripcion, idproducto)
            values (titul, descr, id);

            SET lon = (LENGTH(atributos));
            SET pos = (SELECT POSITION('-' IN atributos));
            SET atributos = (SELECT SUBSTRING(atributos, pos + 2, lon - 1));
            SET pos = (SELECT POSITION('-' IN atributos));
            IF pos <= 1 THEN
                SET v = 2;
            END IF;
        END WHILE;
    SET v = 1;
    WHILE v = 1
        DO
            SET ruta = SUBSTRING_INDEX(imagenes, ',', 2);

            INSERT INTO imagenproducto (imagenUrl, idProducto) values (ruta, id);

            SET pos = (LENGTH(ruta) + 3);
            SET lon = (LENGTH(imagenes) - 2);
            SET imagenes = (SELECT SUBSTRING(imagenes, pos, lon));
            SET pos = (SELECT POSITION(',' IN imagenes));
            IF pos <= 1 THEN
                SET v = 2;
            END IF;
        END WHILE;

END;


-- ACTUALIZAR PRODUCTO
DROP PROCEDURE IF EXISTS sp_ActualizarProducto;
CREATE PROCEDURE sp_ActualizarProducto(INOUT id INT,
                                       IN titulo VARCHAR(101),
                                       IN descripcion VARCHAR(401),
                                       IN marca VARCHAR(201),
                                       IN precioC FLOAT,
                                       IN precioV FLOAT,
                                       IN cantidad INT,
                                       IN descuento FLOAT,
                                       IN estatus INT,
                                       IN updated_at TIMESTAMP,
                                       IN tag INT,
                                       IN categoria INT,
                                       IN proveedor INT,
                                       IN atributos TEXT,
                                       IN imagenes TEXT)
BEGIN
    DECLARE items TEXT DEFAULT '';
    DECLARE titul TEXT DEFAULT '';
    DECLARE descr TEXT DEFAULT '';
    DECLARE idAtr INT DEFAULT 1;
    DECLARE ruta TEXT DEFAULT '';
    DECLARE lon INT DEFAULT 1;
    DECLARE pos INT DEFAULT 1;
    DECLARE v INT DEFAULT 1;

    UPDATE producto
    set titulo         = titulo,
        descripcion    = descripcion,
        marca          = marca,
        precioCompra   = precioC,
        precioVenta= precioV,
        cantidad       = cantidad,
        descuentoVenta = descuentoVenta,
        estatus        = estatus,
        updated_at     = updated_at,
        idTag          = tag,
        idCategoria    = categoria,
        idProveedor    = proveedor
    where idProducto = id;

    DELETE FROM atributoproducto where idProducto = id;

    WHILE v = 1
        DO
            SET items = SUBSTRING_INDEX(atributos, '-', 2);

            SET pos = (SELECT POSITION('*' IN items));
            SET lon = (LENGTH(items));

            SET titul = SUBSTRING_INDEX(items, '*', 2);
            SET descr = SUBSTRING_INDEX(items, '*', 0);

            INSERT INTO atributoproducto (titulo, descripcion, idproducto) values (titul, descr, id);

            SET pos = (LENGTH(items) + 3);
            SET lon = (LENGTH(atributos) - 2);
            SET atributos = (SELECT SUBSTRING(atributos, pos, lon));
            SET pos = (SELECT POSITION('-' IN atributos));
            IF pos <= 1 THEN
                SET v = 2;
            END IF;
        END WHILE;
    DELETE FROM imagenproducto where idProducto = id;
    SET v = 1;
    WHILE v = 1
        DO
            SET ruta = SUBSTRING_INDEX(imagenes, ',', 2);

            INSERT INTO imagenproducto (imagenUrl, idProducto) values (ruta, id);

            SET pos = (LENGTH(ruta) + 3);
            SET lon = (LENGTH(imagenes) - 2);
            SET imagenes = (SELECT SUBSTRING(imagenes, pos, lon));
            SET pos = (SELECT POSITION(',' IN imagenes));
            IF pos <= 1 THEN
                SET v = 2;
            END IF;
        END WHILE;
END;


-- ACTUALIZAR PRODUCTO
DROP PROCEDURE IF EXISTS sp_ActualizarProducto;
CREATE PROCEDURE sp_ActualizarProducto(INOUT id INT,
                                       IN titulo VARCHAR(101),
                                       IN descripcion VARCHAR(401),
                                       IN marca VARCHAR(201),
                                       IN precioC FLOAT,
                                       IN precioV FLOAT,
                                       IN cantidad INT,
                                       IN descuento FLOAT,
                                       IN estatus INT,
                                       IN updated_at TIMESTAMP,
                                       IN tag INT,
                                       IN categoria INT,
                                       IN proveedor INT,
                                       IN atributos TEXT,
                                       IN imagenes TEXT)
BEGIN
    DECLARE items TEXT DEFAULT '';
    DECLARE titul TEXT DEFAULT '';
    DECLARE descr TEXT DEFAULT '';
    DECLARE idAtr INT DEFAULT 1;
    DECLARE ruta TEXT DEFAULT '';
    DECLARE lon INT DEFAULT 1;
    DECLARE pos INT DEFAULT 1;
    DECLARE v INT DEFAULT 1;

    UPDATE producto
    set titulo         = titulo,
        descripcion    = descripcion,
        marca          = marca,
        precioCompra   = precioC,
        precioVenta= precioV,
        cantidad       = cantidad,
        descuentoVenta = descuentoVenta,
        estatus        = estatus,
        updated_at     = updated_at,
        idTag          = tag,
        idCategoria    = categoria,
        idProveedor    = proveedor
    where idProducto = id;

    DELETE FROM atributoproducto where idProducto = id;

    WHILE v = 1
        DO
            SET items = SUBSTRING_INDEX(atributos, '-', 2);

            SET pos = (SELECT POSITION('*' IN items));
            SET lon = (LENGTH(items));

            SET titul = SUBSTRING_INDEX(items, '*', 2);
            SET descr = SUBSTRING_INDEX(items, '*', 0);

            INSERT INTO atributoproducto (titulo, descripcion, idproducto) values (titul, descr, id);

            SET pos = (LENGTH(items) + 3);
            SET lon = (LENGTH(atributos) - 2);
            SET atributos = (SELECT SUBSTRING(atributos, pos, lon));
            SET pos = (SELECT POSITION('-' IN atributos));
            IF pos <= 1 THEN
                SET v = 2;
            END IF;
        END WHILE;
    DELETE FROM imagenproducto where idProducto = id;
<<<<<<< HEAD
    SET v = 1;
    WHILE v = 1
        DO
            SET ruta = SUBSTRING_INDEX(imagenes, ',', 2);

            INSERT INTO imagenproducto (imagenUrl, idProducto) values (ruta, id);

            SET pos = (LENGTH(ruta) + 3);
            SET lon = (LENGTH(imagenes) - 2);
            SET imagenes = (SELECT SUBSTRING(imagenes, pos, lon));
            SET pos = (SELECT POSITION(',' IN imagenes));
            IF pos <= 1 THEN
                SET v = 2;
            END IF;
        END WHILE;
END;
=======
    SET v = 0;
    WHILE v = 0 DO
        SET ruta = SUBSTRING_INDEX(imagenes,',',1);

        INSERT INTO imagenproducto (imagenUrl, idProducto) values (ruta,id);

        SET pos = (LENGTH(ruta) +2);
        SET lon = (LENGTH(imagenes) - 1);
        SET imagenes = (SELECT SUBSTRING(imagenes,pos,lon));
        SET pos = (SELECT POSITION(',' IN imagenes));
        IF pos <= 0 THEN
            SET v = 1;
        END IF;
    END WHILE;
END;

-- INSERTAR COMPRA --
drop PROCEDURE if exists sp_InsertarCompra;
delimiter //
CREATE PROCEDURE sp_InsertarCompra(
-- CLIENTE --
	IN var_nombre VARCHAR(150),
    IN var_apellidoPaterno VARCHAR(150),
    IN var_apellidoMaterno VARCHAR(150),
    IN var_telefono VARCHAR(20),
    IN var_codigoPostal INT(11),
    IN var_colonia VARCHAR(200),
    IN var_calle VARCHAR(200),
    IN var_municipio VARCHAR(200),
    IN var_descripcion VARCHAR(200),
    IN var_numero VARCHAR(10),
    IN var_numeroExterno VARCHAR(10),
-- COMPRA --
    IN var_fechaCompra DATETIME,
    IN var_idEmpleado INT(11),
    IN var_idCliente INT(11),
-- DETALLE COMPRA --
	IN var_detalle TEXT,
-- DATOS DE SALIDA --
    OUT var_idPersonaPedido INT,
    OUT var_idDireccionPedido INT,
    OUT var_idCompra INT,
    OUT var_idDetalleCompra INT
)
BEGIN
    DECLARE items TEXT DEFAULT '';
    DECLARE idProd TEXT DEFAULT '';
    DECLARE canti TEXT DEFAULT '';
    DECLARE preci TEXT DEFAULT '';
    DECLARE lon INT DEFAULT 0;
    DECLARE pos INT DEFAULT 0;
    DECLARE pos2 INT DEFAULT 0;
    DECLARE v INT DEFAULT 0;

    INSERT INTO personapedido (nombre, apellidoPaterno, apellidoMaterno, telefono) 
    VALUES (var_nombre, var_apellidoPaterno, var_apellidoMaterno, var_telefono);
	SET var_idPersonaPedido = LAST_INSERT_ID();
    
    INSERT INTO direccionpedido (codigoPostal, colonia, calle, municipio, descripcion, numero, numeroExterno, idPersonaPedido) 
    VALUES (var_codigoPostal, var_colonia, var_calle, var_municipio, var_descripcion, var_numero, var_numeroExterno, var_idPersonaPedido);
	SET var_idDireccionPedido = LAST_INSERT_ID();
    
	INSERT INTO compra (fechaCompra, idEmpleado, idCliente, estatus) 
    VALUES (var_fechaCompra, var_idEmpleado, var_idCliente, 1);
    SET var_idCompra = LAST_INSERT_ID();

    -- SET pos = (SELECT POSITION('-' IN var_detalle)); -- (pos=30)
    WHILE v = 0 DO
		SET items = SUBSTRING_INDEX(var_detalle,'-',1);
        
        SET pos = (SELECT POSITION('<' IN items)); -- (pos=12)
        SET pos2 = (SELECT POSITION('*' IN items)); -- (pos=22)
        SET lon = (LENGTH(items)); -- (pos=29)

       
        SET idProd = SUBSTRING_INDEX(items,'*',1);
		Set canti = SUBSTRING_INDEX(SUBSTRING_INDEX(items,'*',-2),'*',1);
		SET preci = SUBSTRING_INDEX(items,'*',-1);

        INSERT INTO detalleCompra (idCompra, idProducto, cantidad, costo) 
        VALUES (var_idCompra, idProd, canti, preci);
        
        SET lon = (LENGTH(var_detalle));
        SET pos = (SELECT POSITION('-' IN var_detalle));
        SET var_detalle = (SELECT SUBSTRING(var_detalle, pos+1, lon-1));
        SET pos = (SELECT POSITION('-' IN var_detalle));
        IF pos <= 0 THEN
            SET v = 1;
        END IF;
    END WHILE;
END //
delimiter ;

Call sp_InsertarCompra('Paola','Lopez','','4771234567',37804,'Leon II','Josefina Camarena #404','Leon','Muy bonita la casa'
						,null,'404','2020-08-03',null,1,'1*4*171156-1*4*171156-'
                        ,@var_idPersonaPedido, @var_idDireccionPedido, @var_idCompra, @var_idDetalleCompra);
SELECT @var_idPersonaPedido as idPersonaPedido;
SELECT @var_idDireccionPedido as idDireccionPedido;
SELECT @var_idCompra as idCompra;
SELECT @var_idDetalleCompra as idDetalleCompra;


SELECT categoria.nombre, SUM(detalleCompra.cantidad) FROM detalleCompra INNER JOIN producto on detalleCompra.idProducto = producto.idProducto
INNER JOIN categoria  on producto.idCategoria = categoria.idCategoria
GROUP BY detalleCompra.idProducto, detalleCompra.cantidad ORDER BY detalleCompra.cantidad DESC

DESCRIBE producto