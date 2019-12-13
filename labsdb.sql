-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 10:44 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labsdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_votos` (IN `param_votos1` VARCHAR(255), IN `param_votos2` VARCHAR(255))  BEGIN
	SET @S = CONCAT("UPDATE votos SET votos1=", param_votos1, ", votos2=",param_votos2);
    
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consul_sumatorias` ()  BEGIN
SELECT
        *
    FROM
        parcial2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_conversiones` (IN `param_kg` FLOAT(10,7), IN `param_lb` FLOAT(10,7), IN `param_conv` VARCHAR(300))  BEGIN
   
           SET @s = CONCAT("INSERT INTO parcial2 (Kg, Lb, Conversion) VALUES ('" , param_kg , "', '" , param_lb , "', '", param_conv , "');");
            
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ins_sumatoria` (IN `num` VARCHAR(255), IN `res` VARCHAR(255))  BEGIN
	SET @S = CONCAT("insert into parcial2(ID,n,resultado) values(0,", num, ",", res, ")");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias` ()  BEGIN
	SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_filtro` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))  BEGIN
    SET    @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen 
                    FROM noticias WHERE ", param_campo ," LIKE CONCAT('%",param_valor,"%')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_votos` ()  BEGIN
    SELECT
        votos1, votos2
    FROM
        votos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_conversiones` ()  BEGIN
  SELECT * FROM parcial2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_paginacion` (IN `pagina` VARCHAR(2))  BEGIN
DECLARE inicio INT DEFAULT 0;
DECLARE fin INT DEFAULT 0;
SET inicio =pagina*5;
SET fin =inicio+5;
SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen
FROM noticias limit ", inicio," , ",fin);
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_actualizar` (IN `param_id_obra` INT, IN `param_id` SMALLINT(5), IN `param_titulo` VARCHAR(255), IN `param_cuerpo` TEXT, IN `param_categoria` ENUM('Prosa Poetíca','Haiku','Himno','Epigrama'), IN `param_fecha` DATE)  BEGIN 
    SET @s = CONCAT("UPDATE obras SET ", 
                    "titulo = '", param_titulo, "'" , " , " ,
                    "cuerpo = '", param_cuerpo, "'" , " , " ,
                    "categoria = '", param_categoria, "'" , " , " ,
                    "fecha = '", param_fecha, "'",
                    "WHERE id = '", param_id, "'" ,
                    " AND id_obra = '", param_id_obra, "'" , ";");

    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_consultar_usuario` (IN `param_user` VARCHAR(255))  BEGIN

	SET @s = CONCAT("SELECT * FROM usuarios WHERE usuarios = '",param_user,"'");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_eliminar` (IN `param_id_obra` INT)  BEGIN
    SET @s = CONCAT("DELETE FROM obras WHERE id_obra = '",param_id_obra,"'");
    PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_filtrar` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))  BEGIN
    SET @s = CONCAT("SELECT titulo, cuerpo, categoria, fecha \r\n    FROM obras WHERE ", param_campo ," LIKE CONCAT('%",param_valor,"%')");
    PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_insertar` (IN `param_id` SMALLINT(5), IN `param_titulo` VARCHAR(255), IN `param_cuerpo` TEXT, IN `param_tipo` VARCHAR(100), IN `param_fecha` DATE)  BEGIN
SET @s = CONCAT("INSERT INTO obras (id, titulo, cuerpo, categoria, fecha) VALUES ('" , param_id , "', '" , param_titulo , "', '", param_cuerpo , "','", param_tipo , "', '" , param_fecha,"');");

PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_paginacion` (IN `pagina` VARCHAR(2))  BEGIN
DECLARE inicio INT DEFAULT 0;
DECLARE fin INT DEFAULT 0;
SET inicio =pagina*5;
SET fin =inicio+5;
SET @s = CONCAT("SELECT * FROM obras limit ", inicio," , ",fin);
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_seleccionar` (IN `param_id` INT)  BEGIN
    SET @s = CONCAT("SELECT * FROM obras WHERE id = " ,param_id);
    PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_pf_seleccionar_obra` (IN `param_id_obra` INT)  BEGIN
    SET @s = CONCAT("SELECT * FROM obras WHERE id_obra=" , param_id_obra);
    PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_usuario` (IN `param_user` VARCHAR(255), IN `param_pass` VARCHAR(255))  BEGIN

	SET @s = CONCAT("SELECT count(*) FROM usuarios\r\n                    WHERE usuarios = '",param_user,"' AND clave='", param_pass,"'");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costas') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Ultimas viviendas junto al rio', 'Apartamentos de 1 y 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(3, 'Apartamentos en el Puerto de San Martin', 'En la Playa del Sol, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(6, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(7, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(8, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(9, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(10, 'Ultimas viviendas junto al rio', 'Apartamentos de 1 y 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(11, 'Apartamentos en el Puerto de San Martin', 'En la Playa del Sol, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(12, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(13, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(14, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(15, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(16, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id_obra` int(11) NOT NULL,
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuerpo` text DEFAULT NULL,
  `categoria` enum('Prosa Poetica','Haiku','Himno','Epigrama') DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id_obra`, `id`, `titulo`, `cuerpo`, `categoria`, `fecha`) VALUES
(96, 2, 'PequeÃ±a Flor de Lirio', 'Tus pequeÃ±os pÃ©talos captan mi mirada, cuando tu reflejo pasa distante\r\npor aquel riachuelo que guÃ­a el sendero de mis pensamientos.\r\n\r\nEl otoÃ±o ya estÃ¡ por pasar y lo que fue un claro aromatizado de tu fragancia es un espiral de hojas marchitadas que cubren mi horizonte.\r\n\r\nÂ¡Oh! dama de invierno, entrada sollozante\r\nque nubla todos mis sentidos y me abates hasta el Ãºltimo suspiro.\r\n\r\nAÃºn en mi lecho, cubierto por este manto gris sombrÃ­o,\r\nveo a mi pequeÃ±a flor de Lirio florecer,\r\nComo aquella fragante maÃ±ana que me robÃ³ un suspiro.\r\n', 'Prosa Poetica', '2019-12-08'),
(97, 2, 'Memorias Grises', 'Pensamientos frÃ­os, lubres y susurrantes\r\nasedian mi cabeza delirante\r\ndramaturgo de mis propias tragedias\r\npreso de mis sentidos inherentes\r\nde mi ser ya vacÃ­o.\r\n\r\nMis memorias son un recuerdo nostÃ¡lgico\r\nde tu mirada y aroma\r\nLo que alguna vez fue un deseo\r\nreposa en un mar turbio de recuerdos\r\nextravÃ­o decadente del pasado venturado\r\n\r\nverdad inmutable la cual acepto sin rumbo\r\ndÃ¡ndole un fin al exterminar mis propias maquinaciones\r\ndesapareciendo en un titilante ruedo albero\r\nafortunado de contemplar tu sonrisa escarlata\r\nuna vez mÃ¡s....\r\n', 'Prosa Poetica', '2019-12-08'),
(98, 2, 'Himno IstmeÃ±o', 'Coro\r\n\r\nAlcanzamos por fin la victoria\r\nEn el campo feliz de la uniÃ³n;\r\nCon ardientes fulgores de gloria\r\nSe ilumina la nueva naciÃ³n!\r\n\r\nEs preciso cubrir con un velo\r\nDel pasado el calvario y la cruz;\r\nY que adorne el azul de tu cielo\r\nDe concordia la esplÃ©ndida luz.\r\n\r\nEl progreso acaricia tus lares.\r\nAl compÃ¡s de sublime canciÃ³n,\r\nVes rugir a tus pies ambos mares\r\nQue dan rumbo a tu noble misiÃ³n.\r\n\r\n(Coro)\r\n\r\nEn tu suelo cubierto de flores\r\nA los besos del tibio terral,\r\nTerminaron guerreros fragores;\r\nSÃ­ lo reina el amor fraternal.\r\n\r\nAdelante la pica y la pala,\r\nAl trabajo sin mÃ¡s dilaciÃ³n,\r\nY seremos asÃ­ prez y gala\r\nDe este mundo feraz de ColÃ³n.\r\n\r\n(Coro)', 'Himno', '2019-12-08'),
(99, 2, 'El Samurai', 'Incluso si se cae, En medio de una batalla, Su nombre permanecerÃ¡', 'Haiku', '2019-12-08'),
(100, 2, 'Norma Samurai', 'Es un alma valiente,\r\nExtrayendo sangre solo por la paz,\r\nNunca por venganza.\r\n', 'Haiku', '2019-12-08'),
(704, 2, 'Prueba Web2', 'adwqeqweqweqw', 'Haiku', '2019-12-09'),
(706, 2, 'Prueba79', 'sdqweqwdadssad', 'Epigrama', '2019-12-10'),
(709, 2, 'Eian Nidan', 'Ba Sai Dai', 'Haiku', '2019-12-12'),
(713, 2, 'Prueba Web2', 'adwqeqweqweqw', 'Haiku', '2019-12-09'),
(714, 2, 'Prueba79', 'sdqweqwdadssad', 'Epigrama', '2019-12-10'),
(716, 2, 'Haiku', 'saddwe', 'Haiku', '2019-12-10'),
(717, 2, 'Prueba Web2', 'adwqeqweqweqw', 'Haiku', '2019-12-09'),
(718, 2, 'Prueba79', 'sdqweqwdadssad', 'Epigrama', '2019-12-10'),
(720, 2, 'Haiku', 'saddwe', 'Haiku', '2019-12-10'),
(721, 2, 'Prueba Web2', 'adwqeqweqweqw', 'Haiku', '2019-12-09'),
(722, 2, 'Prueba79', 'sdqweqwdadssad', 'Epigrama', '2019-12-10'),
(724, 2, 'Haiku', 'saddwe', 'Haiku', '2019-12-10'),
(728, 2, 'Prueba usando GIT', 'GIT GIT CAT', 'Haiku', '2019-12-11'),
(729, 2, 'Prueba', 'Â¿EstÃ¡s redundando?', 'Epigrama', '2019-12-11'),
(730, 1, 'SVGTYPE', 'SVGTPYE\r\nEL TEST ESLT', 'Epigrama', '2019-12-12'),
(733, 2, 'Prueba desde BS4', 'El verso,\r\n\r\nAdverso que te verso,\r\n\r\nPruebas mÃ¡s pruebas xd', 'Haiku', '2019-12-12'),
(734, 1, 'El girafoide', 'Grande de corazÃ³n\r\nTorpe de razÃ³n\r\ny con un gran vozarrÃ³n\r\na todo mundo a de espantar \r\n', 'Epigrama', '2019-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `parcial2`
--

CREATE TABLE `parcial2` (
  `ID` int(6) UNSIGNED NOT NULL,
  `n` float(10,2) DEFAULT NULL,
  `resultado` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcial2`
--

INSERT INTO `parcial2` (`ID`, `n`, `resultado`) VALUES
(45, 3.00, 0.33),
(46, 2.00, 3.50),
(47, 3.00, 4.17),
(48, 4.00, 4.38);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `usuarios` varchar(20) NOT NULL DEFAULT '',
  `clave` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuarios`, `clave`) VALUES
(1, 'testuser', 'teXB5LK3JWG6g'),
(2, 'armando', 'arjbBnt64UpqU');

-- --------------------------------------------------------

--
-- Table structure for table `votos`
--

CREATE TABLE `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 54, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id_obra`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `parcial2`
--
ALTER TABLE `parcial2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=735;

--
-- AUTO_INCREMENT for table `parcial2`
--
ALTER TABLE `parcial2`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votos`
--
ALTER TABLE `votos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
