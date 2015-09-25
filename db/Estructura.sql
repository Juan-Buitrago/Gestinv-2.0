DROP DATABASE Gestinv;

CREATE DATABASE Gestinv;

USE Gestinv;

DROP TABLE IF EXISTS permisos;
CREATE TABLE IF NOT EXISTS permisos(
    pk_per_id INT AUTO_INCREMENT,
    per_tipo VARCHAR(50) NOT NULL,
    per_descripcion VARCHAR(120) NOT NULL,
    PRIMARY KEY(pk_per_id)
);

DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles(
    pk_rol_id INT AUTO_INCREMENT,
    rol_descripcion VARCHAR(80) NOT NULL,
    fk_per_id INT NOT NULL,
    PRIMARY KEY(pk_rol_id),
    FOREIGN KEY(fk_per_id) REFERENCES permisos(pk_per_id)
);

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    pk_usu_id INT AUTO_INCREMENT,
    usu_primer_nombre VARCHAR(30) NOT NULL,
    usu_segundo_nombre VARCHAR(30),
    usu_primer_apellido VARCHAR(30) NOT NULL,
    usu_segundo_apellido VARCHAR(30),
    usu_extension VARCHAR(15),
    usu_cargo VARCHAR(80),
    usu_correo VARCHAR(100),
    usu_username VARCHAR(30) NOT NULL,
    usu_password VARCHAR(20) NOT NULL,
    fk_rol_id INT NOT NULL,
    PRIMARY KEY(pk_usu_id),
    FOREIGN KEY(fk_rol_id) REFERENCES roles(pk_rol_id)
);

DROP TABLE IF EXISTS placas;
CREATE TABLE IF NOT EXISTS placas(
pk_pla_id varchar(10) NOT NULL,
pla_nombre_conductor varchar (50) NOT NULL,
pla_cedula varchar (20) NOT NULL,
PRIMARY KEY (pk_pla_id)
);

DROP TABLE IF EXISTS remisiones;
CREATE TABLE IF NOT EXISTS remisiones(
pk_rem_id int AUTO_INCREMENT,
fk_pla_id varchar(10),
rem_fecha date NOT NULL,
rem_id_sak varchar (20),
rem_observacion VARCHAR(200),
fk_usu_id int NOT NULL,
PRIMARY KEY (pk_rem_id),
FOREIGN KEY (fk_pla_id) REFERENCES placas (pk_pla_id),
FOREIGN KEY (fk_usu_id) REFERENCES usuarios(pk_usu_id)
);

DROP TABLE IF EXISTS remisiones_articulos;
CREATE TABLE IF NOT EXISTS remisiones_articulos(
pk_rem_art_id int AUTO_INCREMENT,
fk_rem_id int NOT NULL,
rem_art_codigo varchar (50),
rem_art_descripcion varchar (50),
rem_art_cantidad int NOT NULL,
PRIMARY KEY (pk_rem_art_id),
FOREIGN KEY (fk_rem_id) REFERENCES remisiones(pk_rem_id)
);

DROP TABLE IF EXISTS empleados;
CREATE TABLE IF NOT EXISTS empleados(
pk_emp_id int AUTO_INCREMENT,
emp_primer_nombre varchar (30),
emp_segundo_nombre varchar (30),
emp_primer_apellido varchar (30),
emp_segundo_apellido varchar (30),
PRIMARY KEY (pk_emp_id)
);

DROP TABLE IF EXISTS destinos;
CREATE TABLE IF NOT EXISTS destinos(
pk_des_id INT AUTO_INCREMENT,
des_nombre VARCHAR(100) NOT NULL,
PRIMARY KEY (pk_des_id)
);

DROP TABLE IF EXISTS aprovicionadores;
CREATE TABLE IF NOT EXISTS aprovicionadores(
pk_apr_id INT AUTO_INCREMENT,
apr_nombre VARCHAR (100) NOT NULL,
PRIMARY KEY (pk_apr_id)
);

DROP TABLE IF EXISTS viajes;
CREATE TABLE IF NOT EXISTS viajes(
pk_via_id INT AUTO_INCREMENT,
fk_pla_id VARCHAR(10) NOT NULL,
via_fecha DATE NOT NULL,
via_turno VARCHAR (20),
fk_emp_id INT NOT NULL,
fk_usu_id INT NOT NULL,
PRIMARY KEY (pk_via_id),
FOREIGN KEY (fk_pla_id) REFERENCES placas (pk_pla_id),
FOREIGN KEY (fk_emp_id) REFERENCES empleados (pk_emp_id),
FOREIGN KEY (fk_usu_id) REFERENCES usuarios (pk_usu_id)
);

DROP TABLE IF EXISTS viajes_pedidos;
CREATE TABLE IF NOT EXISTS viajes_pedidos(
pk_via_ped_id int AUTO_INCREMENT,
fk_via_id int NOT NULL,
via_ped_doc_mercurio VARCHAR (20),
via_ped_condicion VARCHAR (20),
fk_apr_id INT NOT NULL,
fk_des_id INT NOT NULL,
via_ped_hora_pedido DATETIME,
via_ped_hora_salida DATETIME,
via_ped_hora_llegada DATETIME,
via_ped_observacion VARCHAR (150),
PRIMARY KEY (pk_via_ped_id),
FOREIGN KEY (fk_via_id) REFERENCES viajes (pk_via_id),
FOREIGN KEY (fk_des_id) REFERENCES destinos (pk_des_id),
FOREIGN KEY (fk_apr_id) REFERENCES aprovicionadores (pk_apr_id)
);


insert  into `permisos`(`pk_per_id`,`per_tipo`,`per_descripcion`) values (1,'Administrador','Acceso total al sistema');
insert  into `roles`(`pk_rol_id`,`rol_descripcion`,`fk_per_id`) values (1,'Administrador',1);
insert  into `usuarios`(`pk_usu_id`,`usu_primer_nombre`,`usu_segundo_nombre`,`usu_primer_apellido`,`usu_segundo_apellido`,`usu_extension`,`usu_cargo`,`usu_correo`,`usu_username`,`usu_password`,`fk_rol_id`) values (1,'Juan','Camilo','Buitrago','Valencia','6292','Auxiliar de sistemas','juan.buitrago@mabe.com.co','juan.buitrago','barcelona',1);
insert into `placas` (`pk_pla_id`, `pla_nombre_conductor`, `pla_cedula`) values('STO-611','Luis Heyner Orozco','15959347');
insert into `placas` (`pk_pla_id`, `pla_nombre_conductor`, `pla_cedula`) values('KUL-510','Cesar Andrey Cardozo','9971275');
insert into `empleados` VALUES ('','Luis','Alberto','Buitrago','Tabares');
insert into `empleados` VALUES ('','Daniel','Felipe','Mesa','Tangarife');    
insert into `destinos` (`pk_des_id`, `des_nombre`) VALUES (1,'Linea 1'),(2,'Linea 2'),(3,'Linea 3'),(4,'Linea 4'),(5,'Auxiliar Linea 1'),(6,'Auxiliar Linea 2'),(7,'Auxiliar Linea 3'),(8,'Auxiliar Metales'),(9,'Caja Control'),(10,'Compresores'),(11,'Spin Five'),(12,'Andres Herrera'),(13,'Reprocesos'),(14,'Lamina');
insert  into `aprovicionadores`(`pk_apr_id`,`apr_nombre`) values (1,'Carlos Montes'),(2,'Andres Montoya'),(3,'Andres Herrera'),(4,'Angel Gonzales'),(5,'Jorge Jimenez'),(6,'Henry Cardona');
