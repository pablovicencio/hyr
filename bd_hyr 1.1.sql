-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-04-2019 a las 02:07:40
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hyr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE IF NOT EXISTS `documento` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nro_doc` int(11) NOT NULL,
  `monto_afecto_doc` int(11) DEFAULT NULL,
  `monto_exento_doc` int(11) DEFAULT NULL,
  `monto_iva_doc` int(11) DEFAULT NULL,
  `monto_total_doc` int(11) DEFAULT NULL,
  `fec_ven_doc` date DEFAULT NULL,
  `fec_emi_doc` date DEFAULT NULL,
  `tipo_doc` int(11) DEFAULT NULL,
  `est_doc` int(11) DEFAULT NULL,
  `fec_reg_doc` datetime DEFAULT NULL,
  `usu_reg_doc` int(11) DEFAULT NULL,
  `emp_doc` int(11) DEFAULT NULL,
  `periodo_doc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `fk_usu_doc_idx` (`usu_reg_doc`),
  KEY `fk_emp_doc_idx` (`emp_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_emp` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social_emp` varchar(150) NOT NULL,
  `rut_emp` varchar(10) NOT NULL,
  `cons_soc_emp` int(11) DEFAULT NULL,
  `monto_mensual_emp` int(11) NOT NULL,
  `monto_renta_emp` int(11) NOT NULL,
  `ciudad_emp` int(11) DEFAULT NULL,
  `comuna_emp` int(11) DEFAULT NULL,
  `dir_emp` varchar(150) DEFAULT NULL,
  `reg_trib_emp` int(11) DEFAULT NULL,
  `fec_ini_act_emp` date NOT NULL,
  `mail_emp` varchar(100) DEFAULT NULL,
  `nom_contacto_emp` varchar(150) DEFAULT NULL,
  `patente_comer_emp` int(11) DEFAULT NULL,
  `evaluacion_emp` int(11) DEFAULT NULL,
  `vig_emp` int(11) NOT NULL,
  `fec_cre_emp` datetime DEFAULT NULL,
  `usu_cre_emp` int(11) DEFAULT NULL,
  `clave_previred_emp` varchar(45) DEFAULT NULL,
  `clave_sii_emp` varchar(45) DEFAULT NULL,
  `fac_rea_emp` float DEFAULT NULL,
  `rta_at_emp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `fk_usu_emp_idx` (`usu_cre_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foma_pago`
--

DROP TABLE IF EXISTS `foma_pago`;
CREATE TABLE IF NOT EXISTS `foma_pago` (
  `id_formapago` int(11) NOT NULL AUTO_INCREMENT,
  `desc_formapago` varchar(50) NOT NULL,
  `vig_formapago` int(11) NOT NULL,
  PRIMARY KEY (`id_formapago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

DROP TABLE IF EXISTS `giro`;
CREATE TABLE IF NOT EXISTS `giro` (
  `id_giro` int(11) NOT NULL AUTO_INCREMENT,
  `desc_giro` varchar(150) DEFAULT NULL,
  `id_emp_giro` int(11) DEFAULT NULL,
  `vig_giro` int(11) DEFAULT NULL,
  `fec_cre_giro` datetime DEFAULT NULL,
  `usu_cre_giro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_giro`),
  KEY `fk_emp_giro_idx` (`id_emp_giro`),
  KEY `fk_usu_giro_idx` (`usu_cre_giro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_cambio`
--

DROP TABLE IF EXISTS `log_cambio`;
CREATE TABLE IF NOT EXISTS `log_cambio` (
  `id_cambio` int(11) NOT NULL AUTO_INCREMENT,
  `tabla_cambio` varchar(50) NOT NULL,
  `columna_cambio` varchar(50) NOT NULL,
  `valor_ant` varchar(100) NOT NULL,
  `valor_nuevo` varchar(100) NOT NULL,
  `fec_cambio` datetime NOT NULL,
  `usu_cambio` int(11) NOT NULL,
  PRIMARY KEY (`id_cambio`),
  KEY `fk_usu_cambio_idx` (`usu_cambio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_documento`
--

DROP TABLE IF EXISTS `mov_documento`;
CREATE TABLE IF NOT EXISTS `mov_documento` (
  `id_mov` int(11) NOT NULL AUTO_INCREMENT,
  `monto_mov` int(11) NOT NULL,
  `obs_mov` varchar(200) DEFAULT NULL,
  `fec_reg_mov` datetime NOT NULL,
  `usu_reg_mov` int(11) DEFAULT NULL,
  `id_doc_mov` int(11) DEFAULT NULL,
  `cod_formapago_mov` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mov`),
  KEY `fk_usu_mov_idx` (`usu_reg_mov`),
  KEY `fk_doc_mov_idx` (`id_doc_mov`),
  KEY `fk_formapago_mov_idx` (`cod_formapago_mov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto_social`
--

DROP TABLE IF EXISTS `objeto_social`;
CREATE TABLE IF NOT EXISTS `objeto_social` (
  `id_obj` int(11) NOT NULL AUTO_INCREMENT,
  `desc_obj` varchar(150) NOT NULL,
  `id_emp_obj` int(11) DEFAULT NULL,
  `vig_obj` int(11) DEFAULT NULL,
  `fec_cre_obj` datetime DEFAULT NULL,
  `usu_cre_obj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_obj`),
  KEY `fk_emp_obj_idx` (`id_emp_obj`),
  KEY `fk_usu_obj_idx` (`usu_cre_obj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `rut_per` varchar(10) NOT NULL,
  `nom_per` varchar(150) NOT NULL,
  `fec_nac_per` date DEFAULT NULL,
  `mail_per` varchar(100) DEFAULT NULL,
  `ciudad_per` int(11) DEFAULT NULL,
  `comuna_per` int(11) DEFAULT NULL,
  `dir_per` varchar(100) DEFAULT NULL,
  `fec_cre_per` datetime NOT NULL,
  `usu_cre_per` int(11) DEFAULT NULL,
  `pass_per` varchar(32) NOT NULL,
  `personacol` varchar(45) DEFAULT NULL,
  `vig_per` int(11) DEFAULT NULL,
  `clave_previred_per` varchar(45) DEFAULT NULL,
  `clave_sii_per` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_per`),
  KEY `fk_usu_per_idx` (`usu_cre_per`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociedad`
--

DROP TABLE IF EXISTS `sociedad`;
CREATE TABLE IF NOT EXISTS `sociedad` (
  `id_soc` int(11) NOT NULL AUTO_INCREMENT,
  `porc_part_soc` int(11) DEFAULT NULL,
  `monto_part_soc` int(11) DEFAULT NULL,
  `id_per_soc` int(11) DEFAULT NULL,
  `id_emp_soc` int(11) DEFAULT NULL,
  `vig_soc` int(11) DEFAULT NULL,
  `fec_cre_soc` datetime DEFAULT NULL,
  `usu_cre_soc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soc`),
  KEY `fk_emp_soc_idx` (`id_emp_soc`),
  KEY `fk_per_soc_idx` (`id_per_soc`),
  KEY `fk_usu_soc_idx` (`usu_cre_soc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE IF NOT EXISTS `sucursales` (
  `id_suc` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad_suc` int(11) NOT NULL,
  `comuna_suc` int(11) NOT NULL,
  `dir_suc` varchar(150) NOT NULL,
  `id_emp_suc` int(11) DEFAULT NULL,
  `vig_suc` int(11) DEFAULT NULL,
  `fec_cre_suc` datetime DEFAULT NULL,
  `usu_cre_suc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_suc`),
  KEY `fk_emp_suc_idx` (`id_emp_suc`),
  KEY `fk_usu_suc_idx` (`usu_cre_suc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_param`
--

DROP TABLE IF EXISTS `tab_param`;
CREATE TABLE IF NOT EXISTS `tab_param` (
  `id_param` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cod_grupo` varchar(45) DEFAULT NULL,
  `cod_item` varchar(45) DEFAULT NULL,
  `desc_item` varchar(100) DEFAULT NULL,
  `vig_item` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_param`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(50) NOT NULL,
  `apepat_usu` varchar(50) NOT NULL,
  `apemat_usu` varchar(50) NOT NULL,
  `rut_usu` varchar(10) NOT NULL,
  `mail_usu` varchar(100) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `fec_cre_usu` datetime NOT NULL,
  `cargo_usu` int(11) NOT NULL,
  `pass_usu` varchar(32) NOT NULL,
  `vig_usu` int(11) NOT NULL,
  `nick_usu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_anual`
--

DROP TABLE IF EXISTS `venta_anual`;
CREATE TABLE IF NOT EXISTS `venta_anual` (
  `id_venta` int(11) NOT NULL,
  `monto_venta` int(11) NOT NULL,
  `anio_venta` int(11) NOT NULL,
  `id_emp_venta` int(11) DEFAULT NULL,
  `vig_venta` int(11) DEFAULT NULL,
  `fec_cre_venta` datetime DEFAULT NULL,
  `usu_cre_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `fk_emp_venta_idx` (`id_emp_venta`),
  KEY `fk_usu_venta_idx` (`usu_cre_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_emp_doc` FOREIGN KEY (`emp_doc`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_doc` FOREIGN KEY (`usu_reg_doc`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_usu_emp` FOREIGN KEY (`usu_cre_emp`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `giro`
--
ALTER TABLE `giro`
  ADD CONSTRAINT `fk_emp_giro` FOREIGN KEY (`id_emp_giro`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_giro` FOREIGN KEY (`usu_cre_giro`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_cambio`
--
ALTER TABLE `log_cambio`
  ADD CONSTRAINT `fk_usu_cambio` FOREIGN KEY (`usu_cambio`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mov_documento`
--
ALTER TABLE `mov_documento`
  ADD CONSTRAINT `fk_doc_mov` FOREIGN KEY (`id_doc_mov`) REFERENCES `documento` (`id_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_formapago_mov` FOREIGN KEY (`cod_formapago_mov`) REFERENCES `foma_pago` (`id_formapago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_mov` FOREIGN KEY (`usu_reg_mov`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `objeto_social`
--
ALTER TABLE `objeto_social`
  ADD CONSTRAINT `fk_emp_obj` FOREIGN KEY (`id_emp_obj`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_obj` FOREIGN KEY (`usu_cre_obj`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_usu_per` FOREIGN KEY (`usu_cre_per`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sociedad`
--
ALTER TABLE `sociedad`
  ADD CONSTRAINT `fk_emp_soc` FOREIGN KEY (`id_emp_soc`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_per_soc` FOREIGN KEY (`id_per_soc`) REFERENCES `persona` (`id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_soc` FOREIGN KEY (`usu_cre_soc`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `fk_emp_suc` FOREIGN KEY (`id_emp_suc`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_suc` FOREIGN KEY (`usu_cre_suc`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta_anual`
--
ALTER TABLE `venta_anual`
  ADD CONSTRAINT `fk_emp_venta` FOREIGN KEY (`id_emp_venta`) REFERENCES `empresa` (`id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usu_venta` FOREIGN KEY (`usu_cre_venta`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
