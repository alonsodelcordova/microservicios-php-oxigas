
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
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


insert into clientes (nombre, apellido, email, telefono, fecha_registro) values ('Juan', 'Perez', 'juan.perez@gmail.com', '123456789', '2022-01-01');
insert into clientes (nombre, apellido, email, telefono, fecha_registro) values ('Maria', 'Gomez', 'maria.gomez@gmail.com', '123456789', '2022-01-01');
insert into clientes (nombre, apellido, email, telefono, fecha_registro) values ('Pedro', 'Lopez', 'pedro.lopez@gmail.com', '123456789', '2022-01-01');

insert into usuarios (nombre, password, email) values ('Juan', '123456', 'juan@email.com');
insert into usuarios (nombre, password, email) values ('Maria', '123456', 'maria@email.com');