/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - proyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `proyecto`;

/*Table structure for table `asigna_permisos_perfiles` */

DROP TABLE IF EXISTS `asigna_permisos_perfiles`;

CREATE TABLE `asigna_permisos_perfiles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERFIL` int(11) NOT NULL,
  `ID_ICONO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `asigna_permisos_perfiles` */

insert  into `asigna_permisos_perfiles`(`ID`,`ID_PERFIL`,`ID_ICONO`,`ID_MENU`,`ESTATUS`) values (1,1,1,1,1),(2,1,2,1,1),(3,1,3,1,1),(4,1,1,2,1),(5,1,2,2,1),(6,1,3,2,1);

/*Table structure for table `iconos` */

DROP TABLE IF EXISTS `iconos`;

CREATE TABLE `iconos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) NOT NULL,
  `IMAGEN` varchar(100) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `iconos` */

insert  into `iconos`(`ID`,`DESCRIPCION`,`IMAGEN`,`ESTATUS`) values (1,'Editar','assets/img/acciones/editar.png',1),(2,'Eliminar','assets/img/acciones/eliminar.png',1),(3,'Modificar','assets/img/acciones/modificar.png',1);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `IMAGEN` varchar(50) NOT NULL DEFAULT 'assets/img/menu/not_found.png',
  `URL` varchar(50) NOT NULL,
  `ORDENAMIENTO` int(11) NOT NULL DEFAULT 0,
  `ESTATUS` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`ID`,`DESCRIPCION`,`IMAGEN`,`URL`,`ORDENAMIENTO`,`ESTATUS`) values (0,'Nodo Raíz','assets/img/menu/not_found.png','#',0,1),(1,'Rol','assets/img/menu/rol.png','rol.php',1,1),(2,'Usuario','assets/img/menu/usuario.png','usuario.php',2,1);

/*Table structure for table `perfiles` */

DROP TABLE IF EXISTS `perfiles`;

CREATE TABLE `perfiles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(30) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `perfiles` */

insert  into `perfiles`(`ID`,`DESCRIPCION`,`ESTATUS`) values (1,'Administrador',1);

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `permisos` */

insert  into `permisos`(`ID`,`ID_USUARIO`,`ID_MENU`,`ESTATUS`) values (1,1,1,1),(2,1,2,1);

/*Table structure for table `permisos_iconos` */

DROP TABLE IF EXISTS `permisos_iconos`;

CREATE TABLE `permisos_iconos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ICONO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `permisos_iconos` */

insert  into `permisos_iconos`(`ID`,`ID_USUARIO`,`ID_ICONO`,`ID_MENU`,`ESTATUS`) values (1,1,1,0,1),(2,1,2,0,1),(3,1,1,1,1),(4,1,2,1,1),(5,1,3,1,1),(6,1,1,2,1),(7,1,2,2,1);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDOS` varchar(50) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `FECHA_REGISTRO` varchar(20) NOT NULL,
  `FECHA_ACTIVACION` varchar(20) NOT NULL,
  `FECHA_ACTUALIZACION` varchar(20) NOT NULL,
  `VERIFICADO` int(11) NOT NULL DEFAULT 1,
  `ESTATUS` int(11) NOT NULL DEFAULT 0,
  `ACCESO` int(11) NOT NULL DEFAULT 0,
  `TIPO_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios` */

insert  into `usuarios`(`ID`,`NOMBRE`,`APELLIDOS`,`CORREO`,`USUARIO`,`PASSWORD`,`FECHA_REGISTRO`,`FECHA_ACTIVACION`,`FECHA_ACTUALIZACION`,`VERIFICADO`,`ESTATUS`,`ACCESO`,`TIPO_USUARIO`) values (1,'Juan','O','test@gmail.com','admin','admin','','','',1,1,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
