-- phpMyAdmin SQL Dump
-- version 5.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- Base de datos: `agrosechura`
-- --------------------------------------------------------

use agrosechura;


CREATE TABLE configuracion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cod_prim INT NOT NULL,
    cod_sec VARCHAR(10) NULL,
    nombre VARCHAR(50)  NULL,
    descripcion VARCHAR(255)  NULL,
    valor_int INT  NULL,
    valor_decimal DECIMAL(10,2)  NULL,
    valor_str VARCHAR(255)  NULL,
    estado BOOLEAN DEFAULT TRUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE empresa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    ident_fiscal VARCHAR(15) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    moneda_base VARCHAR(10) NOT NULL,
    zona_horaria VARCHAR(10) NOT NULL,
    is_alert_inventar_bajo BOOLEAN DEFAULT FALSE,
    is_modo_offline BOOLEAN DEFAULT FALSE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Estructura de tabla para la tabla `clientes`
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(15),
    ultimo_visita DATETIME NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    rol VARCHAR(10) NOT NULL,
    sucursal VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    url_imagen VARCHAR(255) NULL,
    descripcion VARCHAR(255) NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    codigo VARCHAR(15) NOT NULL,
    categoria_id INT NOT NULL,
    costo DECIMAL(10,2) NOT NULL,
    precio_venta DECIMAL(10,2) NOT NULL,
    stock_inicial INT DEFAULT 0,
    url_imagen VARCHAR(255) NULL,
    usuario_id INT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)



CREATE TABLE ingresos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    proveedor VARCHAR(100) NOT NULL,
    tipo_documento VARCHAR(10) NOT NULL,
    codigo_documento VARCHAR(20) NOT NULL,
    fecha DATETIME NOT NULL,
    notas_adicionales VARCHAR(255) NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    IGV DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE ingresos_productos (
    ingreso_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    costo_unitario DECIMAL(10,2) NOT NULL,
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



-- ventas
CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nombre_cliente VARCHAR(50) NULL,
    tipo_documento VARCHAR(10) NOT NULL,
    codigo_documento VARCHAR(20) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    IGV DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) DEFAULT 0,
    notas_adicionales VARCHAR(255) NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE ventas_productos (
    venta_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (venta_id) REFERENCES ventas(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- ventas_productos tiene clave primaria (venta_id, producto_id)
ALTER TABLE ventas_productos ADD CONSTRAINT ventas_productos_pk PRIMARY KEY (venta_id, producto_id);
ALTER TABLE ventas_productos ADD CONSTRAINT cantidad_positiva_pprod CHECK (cantidad > 0);


CREATE TABLE movimientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    cantidad INT NOT NULL,
    producto_id INT NOT NULL,
    tipo_movimiento VARCHAR(10) NOT NULL,
    fecha_movimiento DATETIME NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- poner restriccion en tipo de movimiento: solo es ingreso o egreso
ALTER TABLE movimientos ADD CONSTRAINT movimientos_tipo_movimiento CHECK (tipo_movimiento IN ('ingreso', 'egreso'));


-- crear proceso almacenado para insertar un detalle de pedido
CREATE PROCEDURE insertarDetalle(
    IN in_venta_id INT, 
    IN in_producto_id INT, 
    IN in_cantidad INT, 
    IN in_precio DECIMAL(10,2)  ,
    OUT out_id INT
) 
BEGIN
    -- calcular subtotal
    DECLARE v_total DECIMAL(10,2);
    DECLARE v_existeVenta INT;
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
    SELECT v_existeVenta = COUNT(*) FROM ventas WHERE id = in_venta_id;
    IF v_existeVenta = 0 THEN
        -- Raise a custom error
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Pedido no valido',
                MYSQL_ERRNO = 1001;
    END IF;

    -- insertar pedido
    INSERT INTO ventas_productos (venta_id, producto_id, cantidad, precio, subtotal) 
    VALUES (in_venta_id, in_producto_id, in_cantidad, in_precio, v_total);
    
    UPDATE ventas SET total = total + v_total WHERE id = in_venta_id;

    SELECT LAST_INSERT_ID() INTO out_id;
END;



insert into configuracion (cod_prim, cod_sec, nombre, descripcion, valor_int, valor_decimal, valor_str) 
values 
(1, null, 'MONEDAS', 'Monedas soportadas', null, null, null),
(1, 'PEN', 'Nuevo Sol', 'Sol (S/.)', null, null, 'S/.'),
(1, 'DOL', 'Dólar Estadounidense', 'Dólar Estadounidense (USD)', null, null, '$/. '),
(1, 'EUR', 'Euro', 'Euro (EUR)', null, null, '€ '),
(2, null, 'ZONA HORARIA', 'Zona horaria soportada', null, null, null),
(2, 'GMT-5', '(GMT-05:00) Bogota', '(GMT-05:00) Bogotá', null, null, null),
(2, 'GMT-6', '(GMT-06:00) Mexico City', '(GMT-06:00) Ciudad de México', null, null, null),
(2, 'GMT+1', '(GMT+01:00) Madrid', '(GMT+01:00) Madrid', null, null, null),
(3, null, 'TIPO DOCUMENTO', 'Tipo de documento soportado', null, null, null),
(3, 'FACTURA', 'Factura', 'Factura', null, null, null),
(3, 'BOLETA', 'Boleta', 'Boleta', null, null, null),
(3, 'N_CREDITO', 'Nota de Crédito', 'Nota de Crédito', null, null, null),
(3, 'N_DEBITO', 'Nota de Débito', 'Nota de Débito', null, null, null),
(4, null, 'TIPO MOVIMIENTO', 'Tipo de movimiento soportado', null, null, null),
(4, 'INGRESO', 'Ingreso', 'Ingreso', null, null, null),
(4, 'EGRESO', 'Egreso', 'Egreso', null, null, null),
(4, 'DEVOLUCION', 'Devolución', 'Devolución', null, null, null),
(5, null, 'Rol', 'Rol de usuario', null, null, null),
(5, 'CAJERO', 'Cajero', 'Cajero', null, null, null),
(5, 'GERENTE', 'Gerente', 'Gerente', null, null, null),
(5, 'ADMIN', 'Administrador', 'Administrador', null, null, null)
;

insert into empresa (nombre, ident_fiscal, direccion, moneda_base, zona_horaria) 
values 
('Soluciones Tech S.A. de C.V.', 'ABC123456XYZ', 'Av. Reforma 450, Piso 12, Ciudad de México, CP 06600', 'PEN', 'GMT-5');

insert into clientes (nombre, apellido, email, telefono) 
values 
('Juan', 'Perez', 'juan.perez@gmail.com', '123456789'),
('Maria', 'Gomez', 'maria.gomez@gmail.com', '123456789'),
('Pedro', 'Lopez', 'pedro.lopez@gmail.com', '123456789');

insert into usuarios (nombre, email, rol, sucursal, password)
values 
('Juan', 'juan@email.com', 'CAJERO', 'CENTRO', '123456'),
('Maria', 'maria@email.com', 'GERENTE', 'NORTE', '123456'),
('Pedro', 'pedro@email.com', 'ADMIN', 'SUR', '123456');

insert into categorias (nombre, descripcion)
values 
('Ropa y Accesorios', 'Ropa y Accesorios'),
('Electrónica', 'Electrónica'),
('Hogar', 'Hogar'),
('Deportes', 'Deportes');
