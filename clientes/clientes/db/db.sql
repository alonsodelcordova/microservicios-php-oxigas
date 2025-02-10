
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(15),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



CREATE PROCEDURE InsertarClientes(IN num_clientes INT)
BEGIN
    DECLARE i INT DEFAULT 0;
    DECLARE nombre VARCHAR(50);
    DECLARE apellido VARCHAR(50);
    DECLARE email VARCHAR(100);
    DECLARE telefono VARCHAR(15);

    -- Listas de nombres y apellidos para generar datos aleatorios
    DECLARE nombres TEXT DEFAULT 'Juan,Maria,Pedro,Laura,Carlos,Ana,Luis,Sofia,Diego,Elena';
    DECLARE apellidos TEXT DEFAULT 'Gomez,Perez,Lopez,Martinez,Gonzalez,Rodriguez,Fernandez,Sanchez,Ramirez,Diaz';

    WHILE i < num_clientes DO
        -- Generar nombre y apellido aleatorio
        SET nombre = SUBSTRING_INDEX(SUBSTRING_INDEX(nombres, ',', FLOOR(1 + RAND() * 10)), ',', -1);
        SET apellido = SUBSTRING_INDEX(SUBSTRING_INDEX(apellidos, ',', FLOOR(1 + RAND() * 10)), ',', -1);

        -- Generar email único
        SET email = CONCAT(nombre, '.', apellido, i, '@example.com');

        -- Generar teléfono aleatorio
        SET telefono = CONCAT('6', FLOOR(RAND() * 900000000) + 100000000);

        -- Insertar el cliente en la tabla
        INSERT INTO clientes (nombre, apellido, email, telefono)
        VALUES (nombre, apellido, email, telefono);

        SET i = i + 1;
    END WHILE;
END;

call InsertarClientes(100);