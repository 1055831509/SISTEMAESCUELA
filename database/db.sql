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


