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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `proyecto`;

/*Table structure for table `asigna_permiso_rol` */

DROP TABLE IF EXISTS `asigna_permiso_rol`;

CREATE TABLE `asigna_permiso_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_icono` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `asigna_permiso_rol` */

insert  into `asigna_permiso_rol`(`id`,`id_rol`,`id_icono`,`id_menu`,`estado`) values (1,1,1,1,1),(2,1,2,1,1),(3,1,3,1,1),(4,1,1,2,1),(5,1,2,2,1),(6,1,3,2,1);

/*Table structure for table `icono` */

DROP TABLE IF EXISTS `icono`;

CREATE TABLE `icono` (
  `id_icono` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_icono`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `icono` */

insert  into `icono`(`id_icono`,`descripcion`,`imagen`,`estado`) values (1,'Editar','assets/img/acciones/editar.png',1),(2,'Eliminar','assets/img/acciones/eliminar.png',1),(3,'Modificar','assets/img/acciones/modificar.png',1);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`descripcion`,`imagen`,`url`,`orden`,`estado`) values (0,'Nodo Raiz','assets/img/menu/not_found.png','#',0,1),(1,'Rol','assets/img/menu/rol.png','rol.php',1,1),(2,'Usuario','assets/img/menu/usuario.png','usuario.php',2,1);

/*Table structure for table `permiso` */

DROP TABLE IF EXISTS `permiso`;

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `permiso` */

insert  into `permiso`(`id_permiso`,`id_usuario`,`id_menu`,`estado`) values (1,1,1,1),(2,1,2,1);

/*Table structure for table `permiso_icono` */

DROP TABLE IF EXISTS `permiso_icono`;

CREATE TABLE `permiso_icono` (
  `id_permiso_icono` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_icono` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso_icono`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `permiso_icono` */

insert  into `permiso_icono`(`id_permiso_icono`,`id_usuario`,`id_icono`,`id_menu`,`estado`) values (1,1,1,0,1),(2,1,2,0,1),(3,1,1,1,1),(4,1,2,1,1),(5,1,3,1,1),(6,1,1,2,1),(7,1,2,2,1);

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `rol` */

insert  into `rol`(`id_rol`,`descripcion`,`estado`) values (1,'Administrador',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `fecha_registro` varchar(20) NOT NULL,
  `fecha_actualizacion` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `acceso` int(11) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`nombre`,`apellido`,`correo`,`usuario`,`contrasena`,`fecha_registro`,`fecha_actualizacion`,`estado`,`acceso`,`tipo_usuario`) values (1,'Juan','O','prueba@test.com','admin','admin','','',1,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
