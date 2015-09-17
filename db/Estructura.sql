

CREATE TABLE IF NOT EXISTS permisos(
    pk_per_id INT AUTO_INCREMENT,
    per_tipo VARCHAR(50) NOT NULL,
    per_descripcion VARCHAR(120) NOT NULL,
    PRIMARY KEY(pk_per_id)
);

CREATE TABLE IF NOT EXISTS roles(
    pk_rol_id INT AUTO_INCREMENT,
    rol_descripcion VARCHAR(80) NOT NULL,
    fk_per_id INT NOT NULL,
    PRIMARY KEY(pk_rol_id),
    FOREIGN KEY(fk_per_id) REFERENCES permisos(pk_per_id)
);

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

CREATE TABLE IF NOT EXISTS placas(
pk_pla_id varchar(10) NOT NULL,
pla_nombre_conductor varchar (50) NOT NULL,
pla_cedula varchar (20) NOT NULL,
PRIMARY KEY (pk_pla_id)
);

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

CREATE TABLE IF NOT EXISTS remisiones_articulos(
pk_rem_art_id int AUTO_INCREMENT,
fk_rem_id int NOT NULL,
rem_art_codigo varchar (50),
rem_art_descripcion varchar (50),
rem_art_cantidad int NOT NULL,
PRIMARY KEY (pk_rem_art_id),
FOREIGN KEY (fk_rem_id) REFERENCES remisiones(pk_rem_id)
);

insert  into `permisos`(`pk_per_id`,`per_tipo`,`per_descripcion`) values (1,'Administrador','Acceso total al sistema');
insert  into `roles`(`pk_rol_id`,`rol_descripcion`,`fk_per_id`) values (1,'Administrador',1);
insert  into `usuarios`(`pk_usu_id`,`usu_primer_nombre`,`usu_segundo_nombre`,`usu_primer_apellido`,`usu_segundo_apellido`,`usu_extension`,`usu_cargo`,`usu_correo`,`usu_username`,`usu_password`,`fk_rol_id`) values (1,'Juan','Camilo','Buitrago','Valencia','6292','Auxiliar de sistemas','juan.buitrago@mabe.com.co','juan.buitrago','barcelona',1);
insert into `placas` (`pk_pla_id`, `pla_nombre_conductor`, `pla_cedula`) values('STO-611','Luis Heyner Orozco','15959347');
