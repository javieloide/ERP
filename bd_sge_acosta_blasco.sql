-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2021 a las 13:40:52
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sge_acosta_blasco`
--
CREATE DATABASE IF NOT EXISTS `bd_sge_acosta_blasco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_sge_acosta_blasco`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `id_cliente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nif` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `varon` tinyint(1) NOT NULL,
  `numcta` char(24) COLLATE utf8_spanish2_ci NOT NULL,
  `como_nos_conocio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `id_cliente`, `id_usuario`, `nombre`, `apellido1`, `apellido2`, `nif`, `varon`, `numcta`, `como_nos_conocio`, `activo`) VALUES
(1, '000000000', '000000000', 'José Antonio', 'Guijarro', 'Guijarro', '123456', 1, '123546', 'Por internet', 1),
(2, '060010002', '060010002', 'Juan Luis', 'López', 'Iglesias', '112322', 1, '4564', 'Por internet', 1),
(3, '060010003', '060010003', 'José Antonio', 'Guijarro', 'Guijarro', '112322', 1, '4564', 'Por internet', 1),
(4, '060010004', '060010004', 'José Antonio', 'Guijarro', 'Guijarro', '112322', 1, '4564', 'Por internet', 1),
(5, '0009', '0009', '', '', '', '', 0, '', 'Por Internet', 1),
(6, 'kk0009', 'kk0009', 'ss', 'k', 'k', 'kk', 0, 'kk', 'Por Internet', 1),
(7, '0007', '0007', '', '', '', '', 1, '', 'Por Internet', 0),
(8, 'cLuis0001', 'cLuis0001', 'El luis', 'El apellido del Luis', 'El segundo apellido ', 'El nif de', 1, 'El numero de el Luis', 'Por Internet', 0),
(9, '060070001', '060070001', 'adminasdasd', 'Acosta ', 'Blasco', '80233241H', 1, '1234-1234-1234', 'Por internet', 1),
(15, 'asdad0001', 'asdad0001', 'sadaas', 'asdsada', 'asdasd', 'asdsad', 1, 'asdsad', 'Por internet', 1),
(16, '060070002', '060070002', 'Alex', 'Terinte', 'Terinte', 'Xasfdasd2', 0, '1234-1234-1234', 'Por internet', 1),
(17, '060070003', '060070003', 'xxAlexxx', 'xxxAlexxxx', 'xxxAlexxxx', '80233241H', 1, '1234-1234-1234', 'Por internet', 1),
(18, '060070004', '060070004', 'xxAlexxx', 'xxxAlexxxx', 'xxxAlexxxx', '80233241H', 1, '1234-1234-1234', 'Por internet', 1),
(19, '060070005', '060070005', 'xxAlexxx', 'xxxAlexxxx', 'xxxAlexxxx', '80233241H', 1, '1234-1234-1234', 'Por internet', 1),
(20, 'asda0002', 'asda0002', 'asdasdas', 'sadad', 'asdad', 'asdsad', 1, 'asdsad', 'Por internet', 1),
(21, 'dasd0001', 'dasd0001', 'sadasd', 'asdasd', 'asdsad', 'asdsad', 1, 'asdsa', 'Por internet', 1),
(22, 'asasda000', 'asasda000', 'dasdsa', 'sadasd', 'asdas', 'sadasds', 1, 'asdsad', 'Por internet', 1),
(23, '060070006', '060070006', 'javixd', 'javixd', 'javixd', '80233241H', 1, '1234-1234-1234', 'Por internet', 1),
(25, 'dadsa0001', 'dadsa0001', 'asdasda', 'asdsad', 'sadsa', 'asdsa', 1, 'sadsads', 'Por Internet', 0),
(26, 'dadsa0002', 'dadsa0002', 'asdasda', 'asdsad', 'sadsa', 'asdsa', 1, 'sadsads', 'Por Internet', 0),
(27, 'dadsa0003', 'dadsa0003', 'asdasda', 'asdsad', 'sadsa', 'asdsa', 1, 'sadsads', 'Por Internet', 0),
(28, 'dadsa0004', 'dadsa0004', 'asdasda', 'asdsad', 'sadsa', 'asdsa', 1, 'sadsads', 'Por Internet', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `id_departamento` varchar(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `id_departamento`, `nombre`, `activo`) VALUES
(1, '01', 'ddd', 0),
(2, '02', 'eeee', 0),
(3, '03', 'informatica', 0),
(4, '04', 'sss', 0),
(5, '05', 'sdads', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_clientes`
--

CREATE TABLE `direcciones_clientes` (
  `id` int(11) NOT NULL,
  `id_cliente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `codpostal` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `direcciones_clientes`
--

INSERT INTO `direcciones_clientes` (`id`, `id_cliente`, `id_usuario`, `direccion`, `codpostal`, `localidad`, `provincia`, `pais`, `activo`) VALUES
(1, '060010001', '060010001', 'C/ Sol, 3', '06001', 'Badajoz', 'B0', 'España', 1),
(2, '060010002', '060010002', 'C/ Mirlo, 33', '06001', 'Badajoz', '06', '54656', 1),
(3, '060010003', '060010003', 'C/ La luna, 23', '06001', 'Barcarrota', '06', '54656', 1),
(4, '060010004', '060010004', 'C/ La luna, 23', '06001', 'Barcarrota', '06', '54656', 1),
(5, '0007', '0007', '', '', '', '04', '', 1),
(10, 'asdad0001', 'asdad0001', 'asdad', 'asdad', 'asdad', 'asdad', 'asdds', 1),
(11, '060070002', '060070002', 'Rumania', 'RUMAN', '06007', 'RUMANIA', 'RUMANIA', 1),
(12, '060070003', '060070003', 'Badajoz', '06007', 'asdad', 'Badajoz', 'España', 1),
(13, '060070004', '060070004', 'Badajoz', '06007', 'asdad', 'Badajoz', 'España', 1),
(14, '060070005', '060070005', 'Badajoz', '06007', 'asdad', 'Badajoz', 'España', 1),
(15, 'asda0002', 'asda0002', 'asd', 'asda', 'asda', 'asda', 'asda', 1),
(16, 'dasd0001', 'dasd0001', 'asdd', 'dasd', 'asda', 'asda', 'asdad', 1),
(17, 'asasda000', 'asasda000', 'dasdsad', 'asasd', 'asdas', 'Badajoz', 'asdad', 1),
(18, '060070006', '060070006', 'Badajoz', '06007', 'asdad', 'Badajoz', 'España', 1),
(20, 'dadsa0001', 'dadsa0001', 'sadsad', 'dadsa', 'asdasd', 'Almeria', 'sadsa', 1),
(21, 'dadsa0002', 'dadsa0002', 'sadsad', 'dadsa', 'asdasd', 'Almeria', 'sadsa', 1),
(22, 'dadsa0003', 'dadsa0003', 'sadsad', 'dadsa', 'asdasd', 'Almeria', 'sadsa', 1),
(23, 'dadsa0004', 'dadsa0004', 'sadsad', 'dadsa', 'asdasd', 'Almeria', 'sadsa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_empleado` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `numcta` char(24) COLLATE utf8_spanish2_ci NOT NULL,
  `movil` char(12) COLLATE utf8_spanish2_ci NOT NULL,
  `localidad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_postal` char(5) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_departamento` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `nif` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ruta_foto` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_empleado`, `id_usuario`, `nombre`, `apellido1`, `apellido2`, `numcta`, `movil`, `localidad`, `cod_postal`, `provincia`, `activo`, `id_departamento`, `nif`, `direccion`, `pais`, `ruta_foto`) VALUES
(1, '01', '01', 'aaasdsad', 'aab', 'aa', 'adad', '123124', 'dsada', 'asdda', 'sadad', 1, '01', '80233241H', 'dadsd', 'asdas', NULL),
(2, '02', '02', 'bbb', 'bb', 'aa', '123145', '63345687', 'Badajoz', '06009', 'Badajoz', 1, '03', 'aaaaaaaaa', 'aaaa', 'aaaa', NULL),
(3, '03', '03', 'dasdasd', 'adsad', 'adad', '1315435', '5343657', 'asdad', 'adsda', 'asdsads', 1, '02', 'asdadasda', 'adsadda', 'sadadad', NULL),
(5, '04', '04', 'dadasdas', 'asdadasd', 'sadsad', '00110011', '65543678', 'daasdaggggh', '08997', 'bbbbbb', 1, '03', 'xxxxxdddd', 'fffffffff', 'gggggg', NULL),
(6, '05', '05', 'asdsad', 'sadsad', 'asdsad', 'asdsad', 'asdad', 'asdad', 'asdsa', 'sadad', 1, '03', 'asdasd', 'asdsad', 'asdsad', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias_productos`
--

CREATE TABLE `familias_productos` (
  `id` int(11) NOT NULL,
  `id_familia` char(4) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `familias_productos`
--

INSERT INTO `familias_productos` (`id`, `id_familia`, `nombre`, `descripcion`, `activo`) VALUES
(1, '0001', 'Congelados', 'Congelados', 1),
(2, '0002', 'Verduras', 'Verduras', 1),
(3, '0003', 'Panaderia', 'Panadería', 1),
(4, '0004', 'Bebidas', 'Bebidas', 1),
(5, '0005', 'Cocidos', 'Cocidos', 1),
(6, '0006', 'Frutas', 'Frutas', 1),
(7, '0007', 'Postres', 'Postres', 1),
(8, '0008', 'Aliños', 'Aliños', 1),
(9, '0009', 'dsadsa', 'adssadsa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `id_producto` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `unidades` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `pvp` decimal(10,2) NOT NULL,
  `tipo_iva` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `lineas_pedidos`
--

INSERT INTO `lineas_pedidos` (`id`, `id_pedido`, `id_producto`, `unidades`, `descripcion`, `pvp`, `tipo_iva`, `activo`) VALUES
(1, '2020-000001', '000300002', 225, 'Pan de molde integra', '1.00', 10, 1),
(2, '2020-000001', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(3, '2020-000001', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(4, '2020-000001', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(5, '2020-000001', '000300002', 2, 'Pan de molde integra', '1.00', 10, 1),
(6, '2020-000001', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(7, '2020-000001', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(8, '2020-000002', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(9, '2020-000002', '000400001', 152, 'Caña de cerveza', '1.20', 10, 1),
(10, '2020-000003', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(11, '2020-000003', '000400003', 1, 'Cerveza borda rubia', '2.00', 10, 1),
(12, '2020-000003', '000400007', 2, 'Coca cola 500 ml', '2.00', 10, 1),
(13, '2020-000004', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(14, '2020-000004', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(15, '2020-000004', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(16, '2020-000004', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(17, '2020-000004', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(18, '2020-000004', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(19, '2020-000004', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(20, '2020-000004', '000400001', 5, 'Caña de cerveza', '1.20', 10, 1),
(21, '2020-000004', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(22, '2020-000004', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(23, '2020-000004', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(24, '2020-000004', '000400005', 0, 'Cerveza mahou limón', '1.75', 10, 1),
(25, '2020-000004', '000400002', 0, 'Cerveza borda negra', '2.00', 10, 1),
(26, '2020-000004', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(27, '2020-000004', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(28, '2020-000005', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(29, '2020-000005', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(30, '2020-000005', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(31, '2020-000005', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(32, '2020-000005', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(33, '2020-000005', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(34, '2020-000005', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(35, '2020-000005', '000400001', 5, 'Caña de cerveza', '1.20', 10, 1),
(36, '2020-000005', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(37, '2020-000005', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(38, '2020-000005', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(39, '2020-000005', '000400005', 0, 'Cerveza mahou limón', '1.75', 10, 1),
(40, '2020-000005', '000400002', 0, 'Cerveza borda negra', '2.00', 10, 1),
(41, '2020-000005', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(42, '2020-000005', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(43, '2020-000005', '000400003', 0, 'Cerveza borda rubia', '2.00', 10, 1),
(44, '2020-000006', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(45, '2020-000006', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(46, '2020-000006', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(47, '2020-000006', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(48, '2020-000006', '000400002', 3, 'Cerveza borda negra', '2.00', 10, 1),
(49, '2020-000006', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(50, '2020-000006', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(51, '2020-000006', '000400001', 5, 'Caña de cerveza', '1.20', 10, 1),
(52, '2020-000006', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(53, '2020-000006', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(54, '2020-000006', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(55, '2020-000006', '000400005', 0, 'Cerveza mahou limón', '1.75', 10, 1),
(56, '2020-000006', '000400002', 0, 'Cerveza borda negra', '2.00', 10, 1),
(57, '2020-000006', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(58, '2020-000006', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(59, '2020-000006', '000400003', 0, 'Cerveza borda rubia', '2.00', 10, 1),
(60, '2020-000007', '000400001', 0, 'Caña de cerveza', '1.20', 10, 1),
(61, '2020-000008', '000400001', 0, 'Caña de cerveza', '1.20', 10, 1),
(62, '2020-000009', '000400001', 0, 'Caña de cerveza', '1.20', 10, 1),
(63, '2020-000010', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(64, '2020-000011', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(65, '2020-000012', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(66, '2020-000012', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(67, '2020-000013', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(68, '2020-000013', '000400002', 1, 'Cerveza borda negra', '2.00', 10, 1),
(69, '2020-000014', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(70, '2020-000014', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(71, '2020-000015', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(72, '2020-000015', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(73, '2020-000016', '000400001', 4, 'Caña de cerveza', '1.20', 10, 1),
(74, '2020-000016', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(75, '2020-000017', '000400001', 8, 'Caña de cerveza', '1.20', 10, 1),
(76, '2020-000017', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(77, '2020-000018', '000400001', 10, 'Caña de cerveza', '1.20', 10, 1),
(78, '2020-000018', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(79, '2020-000018', '000100001', 1, 'Acelgas', '12.00', 4, 1),
(80, '2020-000019', '000400001', 10, 'Caña de cerveza', '1.20', 10, 1),
(81, '2020-000019', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(82, '2020-000019', '000100001', 1, 'Acelgas', '12.00', 4, 1),
(83, '2020-000019', '000400009', 1, 'Jarra de cerveza', '1.75', 10, 1),
(84, '2020-000020', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(85, '2020-000021', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(86, '2021-000001', '000400007', 3, 'Coca cola 500 ml', '2.00', 10, 1),
(87, '2021-000002', '000400004', 1, 'Cerveza estrella gal', '1.50', 10, 1),
(88, '2021-000003', '000400004', 1, 'Cerveza estrella gal', '1.50', 10, 1),
(89, '2021-000004', '000400005', 2, 'Cerveza mahou limón', '1.75', 10, 1),
(90, '2021-000005', '000400005', 2, 'Cerveza mahou limón', '1.75', 10, 1),
(91, '2021-000006', '000400005', 2, 'Cerveza mahou limón', '1.75', 10, 1),
(92, '2021-000006', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(93, '2021-000007', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(94, '2021-000008', '000400001', 1, 'Caña de cerveza', '1.20', 10, 1),
(95, '2021-000029', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(96, '2021-000030', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(97, '2021-000031', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(98, '2021-000032', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(99, '2021-000033', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1),
(100, '2021-000034', '000400001', 13, 'Caña de cerveza', '1.20', 10, 1),
(101, '2021-000035', '000400001', 16, 'Caña de cerveza', '1.20', 10, 1),
(102, '2021-000036', '000400001', 16, 'Caña de cerveza', '1.20', 10, 1),
(103, '2021-000037', '000400001', 16, 'Caña de cerveza', '1.20', 10, 1),
(104, '2021-000037', '000400002', 2, 'Cerveza borda negra', '2.00', 10, 1),
(105, '2021-000038', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(106, '2021-000039', '000400001', 2, 'Caña de cerveza', '1.20', 10, 1),
(107, '2021-000040', '000400001', 3, 'Caña de cerveza', '1.20', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empleado_empaqueta` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empresa_transporte` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_envio` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `facturado` tinyint(1) NOT NULL,
  `id_factura` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_factura` date NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha_pago` date NOT NULL,
  `metodo_pago` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id_cliente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_pedido`, `id_empleado_empaqueta`, `id_empresa_transporte`, `fecha_pedido`, `fecha_envio`, `fecha_entrega`, `facturado`, `id_factura`, `fecha_factura`, `pagado`, `fecha_pago`, `metodo_pago`, `id_cliente`, `activo`) VALUES
(1, '2020-000001', '01', '01', '2020-09-07', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-09-07', '', '000000000', 1),
(2, '2020-000002', '04', '04', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-09-07', '', '000000000', 1),
(3, '2020-000003', '04', '04', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-09-07', '', '000000000', 1),
(4, '2020-000004', '02', '02', '2021-01-16', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(5, '2020-000005', '03', '03', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(6, '2020-000006', '01', '01', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(7, '2020-000007', '04', '04', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(8, '2020-000008', '02', '02', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(9, '2020-000009', '03', '03', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(10, '2020-000010', '03', '03', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(11, '2020-000011', '01', '01', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(12, '2020-000012', '02', '02', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(13, '2020-000013', '02', '02', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-12', '', '000000000', 1),
(14, '2020-000014', '01', '01', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-13', '', '000000000', 1),
(15, '2020-000015', '03', '03', '2021-01-16', '2021-03-10', '2021-04-16', 1, '03', '2021-04-16', 1, '2020-12-13', '', '000000000', 1),
(16, '2020-000016', '02', '02', '2021-01-16', '2021-03-10', '2021-04-16', 1, '01', '2021-04-16', 1, '2021-04-16', '', '000000000', 1),
(17, '2020-000017', '04', '04', '2021-01-15', '2021-01-17', '2021-01-24', 1, '04', '2021-01-24', 1, '2021-01-24', '', '000000000', 1),
(18, '2020-000018', '01', '01', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-13', '', '000000000', 1),
(19, '2020-000019', '04', '04', '2021-01-15', '2021-01-17', '2021-01-24', 0, '0', '0000-00-00', 1, '2020-12-13', '', '000000000', 1),
(20, '2020-000020', '02', '02', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2020-12-26', '', '000000000', 1),
(21, '2020-000021', '01', '01', '2021-01-15', '2021-01-17', '2021-01-24', 0, '0', '0000-00-00', 1, '2020-12-27', '', '000000000', 1),
(22, '2021-000001', '', '', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-02', '', '000000000', 1),
(23, '2021-000002', '', '', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-02', '', '000000000', 1),
(24, '2021-000003', '', '', '2021-01-16', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-02', '', '000000000', 1),
(25, '2021-000004', '', '', '2021-01-15', '2021-01-17', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-15', '', '000000000', 1),
(26, '2021-000005', '', '', '2021-01-15', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-15', '', '000000000', 1),
(27, '2021-000006', '', '', '2021-01-15', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-15', '', '000000000', 1),
(28, '2021-000007', '', '', '2021-01-15', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-15', '', '000000000', 1),
(29, '2021-000008', '02', '01', '2021-01-15', '2021-01-17', '2021-01-24', 1, '02', '2021-01-24', 1, '2021-01-24', '', '000000000', 1),
(30, '2021-000029', '', '', '2021-01-21', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-21', '', '000000000', 1),
(31, '2021-000030', '', '', '2021-01-21', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-21', '', '000000000', 1),
(32, '2021-000031', '', '', '2021-01-21', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-21', '', '000000000', 1),
(33, '2021-000032', '', '', '2021-01-21', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-01-21', '', '000000000', 1),
(34, '2021-000033', '', '', '2021-02-18', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-18', '', '060070002', 1),
(35, '2021-000034', '', '', '2021-02-18', '0000-00-00', '0000-00-00', 0, '0', '0000-00-00', 1, '2021-02-18', '', 'dasd0001', 1),
(36, '2021-000035', '', '', '2021-02-18', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-18', '', 'dasd0001', 1),
(37, '2021-000036', '', '', '2021-02-18', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-18', '', 'dasd0001', 1),
(38, '2021-000037', '', '', '2021-02-18', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-18', '', 'dasd0001', 1),
(39, '2021-000038', '', '', '2021-02-22', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-22', '', 'dasd0001', 1),
(40, '2021-000039', '', '', '2021-02-22', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-22', '', 'dasd0001', 1),
(41, '2021-000040', '', '', '2021-02-27', '0000-00-00', '0000-00-00', 1, '0', '0000-00-00', 1, '2021-02-27', '', 'dasd0001', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_producto` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_familia` char(4) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_iva` decimal(10,2) NOT NULL,
  `precio_coste` decimal(10,2) NOT NULL,
  `pvp` decimal(10,2) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_barras` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_proveedor` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_maximo` int(11) NOT NULL,
  `ruta_foto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_producto`, `id_familia`, `tipo_iva`, `precio_coste`, `pvp`, `descripcion`, `codigo_barras`, `id_proveedor`, `stock_actual`, `stock_minimo`, `stock_maximo`, `ruta_foto`, `activo`) VALUES
(1, '000400001', '0004', '10.00', '0.80', '1.20', 'Caña de cerveza', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000400001.png', 1),
(2, '000400002', '0004', '10.00', '1.10', '2.00', 'Cerveza borda negra', '23132', '1', 55, 50, 60, 'fotos/productos/pro_000400002.jpg', 1),
(3, '000400003', '0004', '10.00', '1.10', '2.00', 'Cerveza borda rubia', '13212356', '1', 95, 80, 100, 'fotos/productos/pro_000400003.jpg', 1),
(4, '000400004', '0004', '10.00', '0.80', '1.50', 'Cerveza estrella galicia', '4546', '1', 110, 100, 120, 'fotos/productos/pro_000400004.png', 1),
(5, '000400005', '0004', '10.00', '1.10', '1.75', 'Cerveza mahou limón', '123123', '1', 18, 15, 20, 'fotos/productos/pro_000400005.gif', 1),
(6, '000400006', '0004', '10.00', '0.80', '1.30', 'Cervez Monts', '5646', '1', 125, 100, 150, 'fotos/productos/pro_000400006.png', 1),
(7, '000400007', '0004', '10.00', '1.10', '2.00', 'Coca cola 500 ml', '1231', '1', 125, 100, 150, 'fotos/productos/pro_000400007.jpg', 1),
(8, '000400008', '0004', '10.00', '0.80', '1.20', 'Lata coca-cola light', '3213', '1', 125, 100, 150, 'fotos/productos/pro_000400008.png', 1),
(9, '000100006', '0001', '10.00', '1.00', '99999999.99', 'Jarra de cerveza--->MODIFICADO', '23123', '1', 158, 120, 250, 'fotos/productos/pro_000100006.png', 1),
(10, '000100008', '0001', '10.00', '1.00', '1.56', 'Lata coca-cola 250ml', '225654', '1', 125, 100, 150, 'fotos/productos/pro_000100008.jpg', 1),
(11, '000100007', '0001', '1000.00', '3000.00', '500000.00', 'aaaaaaDDDDDD', '21558', 'xxx', 20, 15, 25, 'fotos/productos/pro_000100007.jpg', 1),
(12, '000400012', '0004', '10.00', '1.00', '1.80', 'Refresco Seven-up 25', '12135', '1', 125, 100, 150, 'fotos/productos/pro_000400012.png', 1),
(13, '000400013', '0004', '10.00', '2.00', '3.00', 'Zumo de naranja natural', '2135', '1', 12, 10, 15, 'fotos/productos/pro_000400013.png', 1),
(14, '000400014', '0004', '10.00', '1.00', '2.00', 'Zumo de tomate natural', '13288', '1', 8, 10, 15, 'fotos/productos/pro_000400014.png', 1),
(15, '000100001', '0001', '4.00', '11.00', '12.00', 'Acelgas', '11223123123', '0', 11, 12, 33, 'fotos/productos/pro_000100001.jpg', 1),
(16, '000100002', '0001', '4.00', '11.00', '12.00', 'Acelgas', '11223123123', '0', 11, 12, 33, 'fotos/productos/pro_000100002.jpg', 1),
(17, '000100003', '0001', '4.00', '11.00', '12.00', 'Rabanos', '', '0', 0, 0, 0, 'fotos/productos/pro_000100003.jpg', 1),
(18, '000300001', '0003', '10.00', '0.50', '1.00', 'Pan de molde integral', '1212121', '0', 12, 22, 222, 'fotos/productos/pro_000300001.web', 1),
(19, '000300002', '0003', '10.00', '0.50', '1.00', 'Pan de molde integral', '1212121', '0', 12, 22, 222, 'fotos/productos/pro_000300002.web', 1),
(20, '000100004', '0001', '223334.00', '2222.00', '232.00', 'dedrddrrdr', '2245533332', 'Bjdads', 23, 22, 25, 'fotos/productos/pro_000100004.png', 1),
(21, '000300003', '0003', '10.00', '0.80', '1.20', 'Caña de cervezaMODIFICADO', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000300003.jpg', 1),
(22, '000300004', '0003', '10.00', '0.80', '1.20', 'Caña de cervezaMODIFICADO', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000300004.jpg', 1),
(23, '000400015', '0004', '10.00', '0.80', '1.20', 'Caña de cervezaMODIFICADO', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000400015.png', 1),
(24, '000300005', '0003', '10.00', '0.80', '1.22', 'Caña de cervezaMODIFICADO', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000300005.png', 1),
(25, '000600001', '0006', '10.00', '0.80', '1.20', 'Caña de cervezaMODIFICADO2', '123139128', '3321', 40, 5, 18, 'fotos/productos/pro_000600001.jpg', 1),
(26, '000200001', '0002', '10.00', '0.80', '1.20', 'Caña de cervezaMODIFICADO', '123139128', '3', 40, 5, 18, 'fotos/productos/pro_000200001.jpg', 1),
(27, '000100007', '0001', '10.00', '0.80', '20.00', 'Caña de cervezaMODIFICADO6', '123139128wfwef', '3321', 40, 5, 18, 'fotos/productos/pro_000100007.', 1),
(28, '000100010', '0001', '20.00', '800.00', '1000.00', 'un producto de bebidasMODIFICA', 'adasdasd23123131', 'sdasdasda', 11, 10, 15, 'fotos/productos/pro_000100010.gif', 1),
(29, '000200002', '0002', '0.00', '0.00', '0.00', 'dsaad', 'asda', 'dassa', 0, 0, 0, 'fotos/productos/pro_000200002.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `id_rol` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `id_rol`, `nombre`) VALUES
(3, '03', 'Empleado'),
(6, '06', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `id_rol` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `login` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_usuario`, `id_rol`, `login`, `password`, `activo`) VALUES
(21, 'dasd0001', '04', 'javieloide', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(23, '060070006', '04', 'javixd', '4d1971504c9b09b8473c6f6515f9b12ae9745e00c5c558b304edbe0a07044a0a', 1),
(24, '060070007', '06', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
(25, '05', '04', 'javieloide', 'sadsasada', 1),
(26, '06', '03', 'javieloide', 'sadsasada', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direcciones_clientes`
--
ALTER TABLE `direcciones_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias_productos`
--
ALTER TABLE `familias_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `direcciones_clientes`
--
ALTER TABLE `direcciones_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `familias_productos`
--
ALTER TABLE `familias_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
