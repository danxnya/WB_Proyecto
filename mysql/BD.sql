CREATE TABLE datospersonales (
    boleta VARCHAR(10) NOT NULL PRIMARY KEY,
    correo VARCHAR(50) NOT NULL,
    contrasena VARCHAR(50) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellido_paterno VARCHAR(30) NOT NULL,
    apellido_materno VARCHAR(30) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    semestre VARCHAR(20) NOT NULL,
    carrera VARCHAR(30) NOT NULL,
    genero_tutor CHAR(1) NOT NULL

);


CREATE TABLE tutores (
    tutor_id SERIAL PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    genero CHAR(1) NOT NULL
);



INSERT INTO datospersonales (boleta, correo, contrasena, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, genero_tutor)
	VALUES 
    	(1, 'admin@ipn.mx', 'admin', 'admin', 'admin', 'admin', '1234567890', '0', 'admin', 'M')
