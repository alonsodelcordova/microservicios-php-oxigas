-- phpMyAdmin SQL Dump
-- version 5.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `agrosechura`
--
-- --------------------------------------------------------

use agrosechura;
--
-- Estructura de tabla para la tabla `clientes`
--
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(15),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    url_imagen VARCHAR(255) NULL,
    usuario_id INT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    total DECIMAL(10,2) DEFAULT 0,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE pedidos_productos (
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- pedidos_productos tiene clave primaria (pedido_id, producto_id)
ALTER TABLE pedidos_productos ADD CONSTRAINT pedidos_productos_pk PRIMARY KEY (pedido_id, producto_id);
ALTER TABLE pedidos_productos ADD CONSTRAINT cantidad_positiva_pprod CHECK (cantidad > 0);

CREATE TABLE ingresos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha DATETIME NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE ingresos_productos (
    ingreso_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY (ingreso_id) REFERENCES ingresos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- ingresos_productos tiene clave primaria (ingreso_id, producto_id)
ALTER TABLE ingresos_productos ADD CONSTRAINT ingresos_productos_pk PRIMARY KEY (ingreso_id, producto_id);
ALTER TABLE ingresos_productos ADD CONSTRAINT cantidad_positiva CHECK (cantidad > 0);

-- para el manejos de stocks de productos
CREATE TABLE stocks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    fecha DATETIME NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- restringir el stock de un producto a un valor mayor a 0
ALTER TABLE stocks ADD CONSTRAINT stocks_cantidad CHECK (cantidad > 0);

CREATE TABLE movimientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    cantidad INT NOT NULL,
    producto_id INT NOT NULL,
    tipo_movimiento VARCHAR(50) NOT NULL,
    fecha_movimiento DATETIME NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- poner restriccion en tipo de movimiento: solo es ingreso o egreso
ALTER TABLE movimientos ADD CONSTRAINT movimientos_tipo_movimiento CHECK (tipo_movimiento IN ('ingreso', 'egreso'));



insert into clientes (nombre, apellido, email, telefono, fecha_registro) values ('Juan', 'Perez', 'juan.perez@gmail.com', '123456789', '2022-01-01');
insert into clientes (nombre, apellido, email, telefono, fecha_registro) values ('Maria', 'Gomez', 'maria.gomez@gmail.com', '123456789', '2022-01-01');
insert into clientes (nombre, apellido, email, telefono, fecha_registro) values ('Pedro', 'Lopez', 'pedro.lopez@gmail.com', '123456789', '2022-01-01');

insert into usuarios (nombre, password, email) values ('Juan', '123456', 'juan@email.com');
insert into usuarios (nombre, password, email) values ('Maria', '123456', 'maria@email.com');



-- crear proceso almacenado para insertar un detalle de pedido
CREATE PROCEDURE insertarDetallePedido(
    IN in_pedido_id INT, 
    IN in_producto_id INT, 
    IN in_cantidad INT, 
    IN in_precio DECIMAL(10,2)  ,
    OUT out_id INT
) 
BEGIN
    -- calcular subtotal
    DECLARE v_total DECIMAL(10,2);
    DECLARE v_existePedido INT;
    SET v_total = in_cantidad * in_precio;

    if in_cantidad <= 0 then
        -- Raise a custom error
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Cantidad no valido',
                MYSQL_ERRNO = 1001;
    end if;

    if in_precio <= 0 then
        -- Raise a custom error
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Precio no valido',
                MYSQL_ERRNO = 1001;
    end if;

    -- comprobar existencia del pedido
    SELECT v_existePedido = COUNT(*) FROM pedidos WHERE id = in_pedido_id;
    IF v_existePedido = 0 THEN
        -- Raise a custom error
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Pedido no valido',
                MYSQL_ERRNO = 1001;
    END IF;

    -- insertar pedido
    INSERT INTO pedidos_productos (pedido_id, producto_id, cantidad, precio, subtotal) 
    VALUES (in_pedido_id, in_producto_id, in_cantidad, in_precio, v_total);
    
    UPDATE pedidos SET total = total + v_total WHERE id = in_pedido_id;

    SELECT LAST_INSERT_ID() INTO out_id;
END;
