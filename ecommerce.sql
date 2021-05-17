-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: tuferia
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner_home`
--

DROP TABLE IF EXISTS `banner_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `titulo` text NOT NULL,
  `subtitulo` text NOT NULL,
  `oferta` int(11) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `link` text NOT NULL,
  `link_texto` text NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_home`
--

LOCK TABLES `banner_home` WRITE;
/*!40000 ALTER TABLE `banner_home` DISABLE KEYS */;
INSERT INTO `banner_home` VALUES (1,'neveraLg.jpg','Nevecon LG 592LT','Recibe 50% de Descuento Hoy!',4000000,5000000,'productos','Ver más',1),(3,'1599284067.jpg','Televisor QLED 8K','Vive esta gran experiencia!',5500000,NULL,'productos','ver mas',2);
/*!40000 ALTER TABLE `banner_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `talla_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (1,1,1,1,3,5,'2020-07-06 02:05:10'),(4,5,1,1,3,1,'2020-07-08 21:52:49');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text,
  `ruta` text,
  `icono` text,
  `fecha` datetime DEFAULT '1970-01-02 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'ROPA','ropa','fas fa-tshirt',NULL),(2,'CALZADO','calzado','fas fa-shoe-prints',NULL),(3,'ACCESORIOS','accesorios','fas fa-socks',NULL),(4,'TECNOLOGÍA','tecnologia','fas fa-desktop',NULL),(5,'CURSOS','cursos','fas fa-book-reader',NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros_comerciales`
--

DROP TABLE IF EXISTS `centros_comerciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centros_comerciales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros_comerciales`
--

LOCK TABLES `centros_comerciales` WRITE;
/*!40000 ALTER TABLE `centros_comerciales` DISABLE KEYS */;
INSERT INTO `centros_comerciales` VALUES (1,'CC. Portal del Prado',1),(2,'CC. VIVA',1),(3,'CC. Panorama',1),(4,'CC. Unico',1),(5,'CC. Americano',1);
/*!40000 ALTER TABLE `centros_comerciales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'Barranquilla',1),(2,'Soledad',1),(3,'Cartagena',1),(4,'Santa Marta',1),(5,'Sincelejo',1);
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `hex` text,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (1,'ROJO','#ff0000',1),(2,'VERDE','#00FF00',1),(3,'AZUL','#0000FF',1),(4,'NEGRO','#000000',1),(5,'BLANCO','#ffffff',0),(6,'AMARILLO','#FFF000',1),(11,'ROSADOS','#ffc7f3',1),(12,'MORADO','#8b00c7',1);
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercio`
--

DROP TABLE IF EXISTS `comercio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `impuesto` int(11) NOT NULL,
  `envioNal` int(11) NOT NULL,
  `envioInt` int(11) NOT NULL,
  `tasaMinimaNal` int(11) NOT NULL,
  `tasaMinimaInt` int(11) NOT NULL,
  `pais` text NOT NULL,
  `modo` text NOT NULL,
  `privateKey` int(11) NOT NULL,
  `account` int(11) NOT NULL,
  `pubApiKey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercio`
--

LOCK TABLES `comercio` WRITE;
/*!40000 ALTER TABLE `comercio` DISABLE KEYS */;
INSERT INTO `comercio` VALUES (1,19,1,2,10000,15,'CO','sandbox',855042,862592,'pub_test_Thx7KS8ly4vsXuvfn8OfiFeWPVbWCC0W');
/*!40000 ALTER TABLE `comercio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercios`
--

DROP TABLE IF EXISTS `comercios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` text NOT NULL,
  `nit` text NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL,
  `ciudad_id` int(11) NOT NULL,
  `telefono` text NOT NULL,
  `telefono_fijo` text,
  `local` int(11) NOT NULL,
  `centro_comercial_id` int(11) DEFAULT NULL,
  `logo` text,
  `facebook` text,
  `instagram` text,
  `twitter` text,
  `video_promocional` text,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercios`
--

LOCK TABLES `comercios` WRITE;
/*!40000 ALTER TABLE `comercios` DISABLE KEYS */;
INSERT INTO `comercios` VALUES (1,'comercio prueba','12345678','andresgabrielbarrosgonzalez@gmail.com','calle 123',1,'3006962605','',1,1,'12345678_1597210609.jpg','','','','',2),(2,'tienda tales','800003546','tienda@mail.com','calle 1234',1,'3006962604',NULL,1,3,NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `comercios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `total_compra` int(11) NOT NULL,
  `metodo` text NOT NULL,
  `envio` int(11) NOT NULL,
  `direccion` text,
  `pais` text NOT NULL,
  `referencia` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (32,4,NULL,35700,'Wompi',0,NULL,'co','4268323570000','2020-08-22 18:36:34'),(33,4,NULL,1808800,'Wompi',0,NULL,'co','1598104659338','2020-08-22 18:52:13'),(34,4,NULL,23800,'Wompi',0,NULL,'co','1598123280417','2020-08-23 00:02:14'),(35,4,NULL,59500,'Wompi',0,NULL,'co','1598124506755','2020-08-23 00:20:02'),(36,4,NULL,71400,'Wompi',0,NULL,'co','1598125348440','2020-08-23 00:41:36');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterios_ficha_tecnica`
--

DROP TABLE IF EXISTS `criterios_ficha_tecnica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterios_ficha_tecnica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterios_ficha_tecnica`
--

LOCK TABLES `criterios_ficha_tecnica` WRITE;
/*!40000 ALTER TABLE `criterios_ficha_tecnica` DISABLE KEYS */;
INSERT INTO `criterios_ficha_tecnica` VALUES (1,'material',1),(2,'estampado',1),(3,'resistente al agua',1),(4,'genero',1);
/*!40000 ALTER TABLE `criterios_ficha_tecnica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterios_productos`
--

DROP TABLE IF EXISTS `criterios_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterios_productos` (
  `id_criterios_productos` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `criterio_id` int(11) NOT NULL,
  `valor` text,
  PRIMARY KEY (`id_criterios_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterios_productos`
--

LOCK TABLES `criterios_productos` WRITE;
/*!40000 ALTER TABLE `criterios_productos` DISABLE KEYS */;
INSERT INTO `criterios_productos` VALUES (1,1,1,'algodon'),(2,1,2,'si'),(3,1,4,'masculino');
/*!40000 ALTER TABLE `criterios_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` VALUES (5,3,1,1,30000),(7,3,2,2,30000);
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_deseos`
--

DROP TABLE IF EXISTS `lista_deseos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_deseos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_deseos`
--

LOCK TABLES `lista_deseos` WRITE;
/*!40000 ALTER TABLE `lista_deseos` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_deseos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mega_promo_home`
--

DROP TABLE IF EXISTS `mega_promo_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mega_promo_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `titulo` text NOT NULL,
  `subtitulo` text NOT NULL,
  `link` text NOT NULL,
  `link_texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mega_promo_home`
--

LOCK TABLES `mega_promo_home` WRITE;
/*!40000 ALTER TABLE `mega_promo_home` DISABLE KEYS */;
INSERT INTO `mega_promo_home` VALUES (1,'1599288305.jpg','Mega Sale','30% de descuento','productos','Comprar Ahora');
/*!40000 ALTER TABLE `mega_promo_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantilla`
--

DROP TABLE IF EXISTS `plantilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_dark` varchar(500) NOT NULL,
  `logo_light` varchar(500) NOT NULL,
  `favicon` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantilla`
--

LOCK TABLES `plantilla` WRITE;
/*!40000 ALTER TABLE `plantilla` DISABLE KEYS */;
INSERT INTO `plantilla` VALUES (1,'vistas/img/plantilla/logo_dark.png','vistas/img/plantilla/logo_light.png','vistas/img/plantilla/favicon.png');
/*!40000 ALTER TABLE `plantilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_color`
--

DROP TABLE IF EXISTS `producto_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_color` (
  `id_producto_color` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_color`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_color`
--

LOCK TABLES `producto_color` WRITE;
/*!40000 ALTER TABLE `producto_color` DISABLE KEYS */;
INSERT INTO `producto_color` VALUES (2,1,4,1),(4,1,3,1),(5,2,3,1),(8,1,1,1);
/*!40000 ALTER TABLE `producto_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_imagen`
--

DROP TABLE IF EXISTS `producto_imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_imagen`
--

LOCK TABLES `producto_imagen` WRITE;
/*!40000 ALTER TABLE `producto_imagen` DISABLE KEYS */;
INSERT INTO `producto_imagen` VALUES (1,1,'KFEFIJF9_1.jpg',1),(2,1,'KFEFIJF9_2.jpg',1),(3,1,'KFEFIJF9_3.jpg',1),(4,1,'KFEFIJF9_4.jpg',1),(5,9,'TPRUEBA_1596173455_1.jpeg',1),(6,9,'TPRUEBA_1596173656_2.jpeg',1);
/*!40000 ALTER TABLE `producto_imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_talla`
--

DROP TABLE IF EXISTS `producto_talla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_talla` (
  `id_producto_talla` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `talla_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_talla`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_talla`
--

LOCK TABLES `producto_talla` WRITE;
/*!40000 ALTER TABLE `producto_talla` DISABLE KEYS */;
INSERT INTO `producto_talla` VALUES (3,1,5,1),(4,2,1,1),(5,2,2,1),(6,1,3,1),(7,1,4,1);
/*!40000 ALTER TABLE `producto_talla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `descripcion_corta` text NOT NULL,
  `descripcion_larga` text NOT NULL,
  `precio` int(11) NOT NULL,
  `oferta` int(11) DEFAULT NULL,
  `sku` text NOT NULL,
  `rating` int(11) DEFAULT '0',
  `total_votos` int(11) DEFAULT '0',
  `garantia` text NOT NULL,
  `devolucion_dinero` int(11) NOT NULL,
  `contra_entrega` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `tipo` enum('servicio','fisico') NOT NULL,
  `estado` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `id_comercio` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'sueter cuello V','descripcion corta','descripcion larga',10000,NULL,'KFEFIJF9',20,5,'30 Dias',30,1,1,2,'fisico',1,'sueter-cuello-v','1'),(2,'Blusa de mujer','descripcion corta','descripcion larga blusa',20000,18000,'KFEFDSF9',18,6,'60 Dias',10,0,1,1,'fisico',1,'blusa','2'),(3,'zapatos tenis','descripcion corta','descripcion larga',50000,NULL,'DKFLOSKDL',20,4,'30 Dias',20,1,2,6,'fisico',1,'zapatos-tenis','1'),(4,'PC gamer','descripcion corta','descripcion larga',2000000,1600000,'PCGFKDJ1',21,7,'365 Dias',30,0,4,16,'fisico',1,'pc-gamer','1'),(5,'PC portatil 14\"','descripcion corta','descripcion larga',1500000,NULL,'HJDS3RU',24,6,'365 Dias',30,0,4,16,'fisico',1,'pc-portatil-14','1'),(6,'Pantalon Hombre','descripcion corta','descripcion larga',70000,NULL,'LDKFLDK',10,2,'30 Dias',10,1,1,2,'fisico',1,'pantalon-hombre','2'),(7,'Zapatos clasicos','descripcion corta','descripcion larga',100000,80000,'ZKSLLDKSLS',0,0,'60 Dias',20,1,2,6,'fisico',1,'zapatos-clasicos','1'),(8,'Zapatos Hombre','descripcion corta','descripcion latga',60000,NULL,'SKDLSKKDL',12,3,'30 Dias',30,1,2,6,'fisico',1,'zapatos-hombre','1'),(9,'tenis prueba ','tenis de prueba','tenis de prueba',120000,NULL,'TPRUEBA',0,0,'60 Dias',30,0,2,6,'fisico',1,'tenis-prueba--1596173455','1');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_tags`
--

DROP TABLE IF EXISTS `productos_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos_tags` (
  `id_producto_tag` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_tags`
--

LOCK TABLES `productos_tags` WRITE;
/*!40000 ALTER TABLE `productos_tags` DISABLE KEYS */;
INSERT INTO `productos_tags` VALUES (1,1,3,1),(2,1,5,1),(3,1,8,1),(4,2,5,1),(5,2,9,1);
/*!40000 ALTER TABLE `productos_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promociones_home`
--

DROP TABLE IF EXISTS `promociones_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promociones_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `titulo` text NOT NULL,
  `subtitulo` text NOT NULL,
  `link` text NOT NULL,
  `link_texto` text NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promociones_home`
--

LOCK TABLES `promociones_home` WRITE;
/*!40000 ALTER TABLE `promociones_home` DISABLE KEYS */;
INSERT INTO `promociones_home` VALUES (1,'celulares.jpg','Celulares','Super Descuentos en','productos','ver más.',1),(2,'1599342388.jpg','Zapatos','En oferta por este mes.','zapatos','ver oferta',2),(3,'accesorios.jpg','Accesorios','Los mejores','productos','ver todo.',3);
/*!40000 ALTER TABLE `promociones_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategoria` text,
  `id_categoria` int(11) DEFAULT NULL,
  `ruta` text,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategoria_categoria` (`id_categoria`),
  CONSTRAINT `subcategoria_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorias`
--

LOCK TABLES `subcategorias` WRITE;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` VALUES (1,'ROPA PARA DAMA',1,'ropa-para-dama',NULL),(2,'ROPA PARA HOMBRE',1,'ropa-para-hombre',NULL),(3,'ROPA DEPORTIVA',1,'ropa-deportiva',NULL),(4,'ROPA INFANTIL',1,'ropa-infantil',NULL),(5,'CALZADO PARA DAMA',2,'calzado-para-dama',NULL),(6,'CALZADO PARA HOMBRE',2,'calzado-para-hombre',NULL),(7,'CALZADO DEPORTIVO',2,'calzado-deportivo',NULL),(8,'CALZADO INFANTIL',2,'calzado-infantil',NULL),(9,'BOLSOS',3,'bolsos',NULL),(10,'RELOJES',3,'relojes',NULL),(11,'PULSERAS',3,'pulseras',NULL),(12,'COLLARES',3,'collares',NULL),(13,'GAFAS DE SOL',3,'gafas-de-sol',NULL),(14,'TELÉFONOS MÓVIL',4,'telefonos-movil','2017-10-05 20:49:56'),(15,'TABLETAS ELECTRÓNICAS',4,'tabletas-electronicas','2017-10-05 20:50:02'),(16,'COMPUTADORAS',4,'computadoras',NULL),(17,'AURICULARES',4,'auriculares',NULL),(18,'DESARROLLO WEB',5,'desarrollo-web',NULL),(19,'APLICACIONES MÓVILES',5,'aplicaciones-moviles',NULL),(20,'DISEÑO GRÁFICO',5,'diseno-grafico','2017-10-05 20:50:17'),(21,'MARKETING DIGITAL',5,'marketing-digital',NULL);
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `ruta` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'tag 1','tag1',1),(2,'tag 2','tag2',1),(3,'tag 3','tag3',1),(4,'tag 4','tag4',1),(5,'tag 5','tag5',1),(6,'tag 6','tag6',1),(7,'tag 7','tag7',1),(8,'tag 8','tag8',1),(9,'tag 9','tag9',1),(10,'tag 10','tag10',1),(11,'TAG NUEVO','tag-nuevo',1);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tallas`
--

DROP TABLE IF EXISTS `tallas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tallas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tallas`
--

LOCK TABLES `tallas` WRITE;
/*!40000 ALTER TABLE `tallas` DISABLE KEYS */;
INSERT INTO `tallas` VALUES (1,'XS',1),(2,'S',1),(3,'M',1),(4,'L',1),(5,'XL',1),(7,'XXL',1);
/*!40000 ALTER TABLE `tallas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` text,
  `referencia` text,
  `currency` text,
  `valor` text,
  `metodo` text,
  `status` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
INSERT INTO `transacciones` VALUES (13,'15821-1598103424-46161','4268323570000','COP','35700','PSE','APPROVED','2020-08-22 18:37:15'),(14,'15821-1598122955-15398','1598123280417','COP','23800','PSE','DECLINED','2020-08-23 00:02:41'),(15,'15821-1598124017-24465','1598124506755','COP','59500','PSE','APPROVED','2020-08-23 00:22:52');
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `telefono` text,
  `direccion` text,
  `ciudad_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `comercio_id` int(11) NOT NULL,
  `rol` enum('comercio','usuario','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'andres barros','andresgabrielbarrosgonzalez@gmail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220','3006962605','calle 1234',1,1,0,'usuario'),(2,'comercio prueba','andres@mail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',NULL,NULL,NULL,1,1,'comercio'),(3,'Administrador','admin@admin.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',NULL,NULL,NULL,1,0,'admin'),(4,'tienda tales','tienda@mail.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',NULL,NULL,NULL,0,2,'comercio');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-05 17:25:32
