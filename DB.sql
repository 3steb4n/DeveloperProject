
DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE proyecto;
USE proyecto;
DROP TABLE IF EXISTS reporte;
CREATE TABLE reporte (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(50) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `registro` varchar(100) NOT NULL,
  `registro_ant` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_mod` varchar(100) NOT NULL,
  `fecha_mod` date NOT NULL,
  PRIMARY KEY (`id_reporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS usuario;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO usuario (nombre, apellido, correo, clave) VALUES ('Pepe', 'pepe', 'test@gmail.com', '123');