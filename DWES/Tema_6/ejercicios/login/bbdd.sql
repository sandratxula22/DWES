CREATE DATABASE datos_login;

USE datos_login;

CREATE TABLE login (
    id_usuario INT(10) PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(30) UNIQUE NOT NULL,
    pass VARCHAR(30) NOT NULL
);