CREATE TABLE roles (
    id_rol          INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol      VARCHAR(255) NOT NULL UNIQUE KEY,
    fyh_creacion    DATETIME DEFAULT CURRENT_TIMESTAMP, -- Asignar fecha y hora actuales por defecto
    fyh_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Actualización automática
    estado          VARCHAR(11) DEFAULT 'activo' -- Valor por defecto 'activo'
) 
ENGINE=InnoDB;

INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('ADMINISTRADOR','2024-12-23 06:08:25','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('DIRECTOR ACADEMICO','2024-12-23 06:08:25','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('DIRECTOR ADMINISTRATIVO','2024-12-23 06:08:25','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('CONTADOR','2024-12-23 06:08:25','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES ('SECRETARIA','2024-12-23 06:08:25','1');

CREATE TABLE usuarios (

   id_usuario   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nombres      VARCHAR (255) NOT NULL,
   rol_id        INT (11) NOT NULL,
   email        VARCHAR (255) NOT NULL UNIQUE KEY,
   password     TEXT NOT NULL,

   fyh_creacion DATETIME NULL,
   fyh_actualizacion DATETIME NULL,
   estado       VARCHAR (11),

   FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade

)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,rol_id,email,password,fyh_creacion,estado)
VALUES ('Jhon Alexander','1','jalexito2005@hotmail.com','$2y$10$LibdQFXTRAs8ERTXxjaogerKpX56kH6r1K97YL5oAkflewbEH6BA.','2024-12-11 15:01:23','1');

CREATE TABLE configuracion_instituciones (

   id_config_institucion   INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   nombre_institucion      VARCHAR (255) NOT NULL,
   logo                    VARCHAR (255) NULL,
   direccion               VARCHAR (255) NOT NULL,
   telefono                VARCHAR (100) NULL,
   celular                 VARCHAR (100) NULL,
   correo                  VARCHAR (100) NULL,

   fyh_creacion DATETIME NULL,
   fyh_actualizacion DATETIME NULL,
   estado       VARCHAR (11)

   

)ENGINE=InnoDB;

INSERT INTO configuracion_instituciones (nombre_institucion,logo,direccion,telefono,celular,correo,fyh_creacion,estado)
VALUES ('Houston Rockets','logo.jpg','1510 Polk Streeth, Houston, Texas 77002, Estados Unidos','(713) 758-7300','(713) 758-7300','htcguestservices@axs.com','2024-12-11 15:01:23','1');

CREATE TABLE gestiones (

   id_gestion  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   gestion    VARCHAR (255) NOT NULL,
   

   fyh_creacion DATETIME NULL,
   fyh_actualizacion DATETIME NULL,
   estado       VARCHAR (11)

   

)ENGINE=InnoDB;

INSERT INTO gestiones (gestion,fyh_creacion,estado)
VALUES ('GESTION 2024','2024-12-11 15:01:23','1');

CREATE TABLE niveles (

  id_nivel       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion_id     INT (11) NOT NULL,
  nivel          VARCHAR (255) NOT NULL,
  turno          VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO niveles (gestion_id,nivel,turno,fyh_creacion,estado)
VALUES ('1','INICIAL','MAÑANA','2024-12-11 20:29:10','1');

CREATE TABLE grados (

  id_grado       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel_id       INT (11) NOT NULL,
  curso          VARCHAR (255) NOT NULL,
  paralelo       VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO grados (nivel_id,curso,paralelo,fyh_creacion,estado)
VALUES ('1','INICIAL - 1','A','2024-12-11 20:29:10','1');

CREATE TABLE materias (

  id_materia      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_materia         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO materias (nombre_materia,fyh_creacion,estado)
VALUES ('MATEMÁTICA','2023-12-28 20:29:10','1');



