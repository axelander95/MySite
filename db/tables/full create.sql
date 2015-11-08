DROP SCHEMA IF EXISTS db_andresleondoylet;

CREATE SCHEMA db_andresleondoylet;

ALTER DATABASE db_andresleondoylet CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE db_andresleondoylet;

DROP TABLE IF EXISTS tb_contacto;
DROP TABLE IF EXISTS tb_publicacion_etiqueta;
DROP TABLE IF EXISTS tb_galeria;
DROP TABLE IF EXISTS tb_publicacion;
DROP TABLE IF EXISTS tb_usuario;
DROP TABLE IF EXISTS tb_rol;
DROP TABLE IF EXISTS tb_imagen;
DROP TABLE IF EXISTS tb_etiqueta;
DROP TABLE IF EXISTS tb_categoria;

CREATE TABLE tb_categoria (
	id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL,
    estado BIT NOT NULL
);

CREATE TABLE tb_etiqueta (
	id_etiqueta INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL,
    estado BIT NOT NULL
);

CREATE TABLE tb_imagen (
	id_imagen INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL,
    UNIQUE KEY ix_imagen (descripcion)
);

CREATE TABLE tb_rol (
	id_rol INT PRIMARY KEY AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL,
    estado BIT NOT NULL
);

CREATE TABLE tb_usuario (
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    id_rol INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    nombre_usuario VARCHAR(30) NOT NULL,
    correo_electronico VARCHAR(100) NOT NULL,
    credencial TEXT NOT NULL,
    fecha_creacion DATETIME NOT NULL,
    fecha_modificacion DATETIME NULL,
    estado CHAR(1) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES tb_rol(id_rol)
);

CREATE TABLE tb_publicacion (
	id_publicacion INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_categoria INT NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha_creacion DATETIME NOT NULL,
    fecha_modificacion DATETIME NULL,
    estado BIT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario),
    FOREIGN KEY (id_categoria) REFERENCES tb_categoria(id_categoria)
);

CREATE TABLE tb_galeria (
	id_publicacion INT NOT NULL,
    id_imagen INT NOT NULL,
    FOREIGN KEY (id_publicacion) REFERENCES tb_publicacion(id_publicacion),
    FOREIGN KEY (id_imagen) REFERENCES tb_imagen(id_imagen)
);

CREATE TABLE tb_publicacion_etiqueta (
	id_publicacion INT NOT NULL,
    id_etiqueta INT NOT NULL,
    FOREIGN KEY (id_publicacion) REFERENCES tb_publicacion(id_publicacion),
    FOREIGN KEY (id_etiqueta) REFERENCES tb_etiqueta(id_etiqueta)
);

CREATE TABLE tb_contacto (
	id_contacto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    correo_electronico_remitente VARCHAR(100) NOT NULL,
    asunto VARCHAR(100) NULL,
    telefono VARCHAR(10) NULL,
    mensaje VARCHAR(150) NOT NULL,
    fecha_creacion DATETIME NOT NULL,
    correo_electronico_destinatario VARCHAR(100) NOT NULL
);
