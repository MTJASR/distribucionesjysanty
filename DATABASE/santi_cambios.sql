-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2022 a las 00:52:10
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `santi_cambios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `telefono`, `email`, `direccion`) VALUES
(1, 'Sistema de ventas', '9254999999', 'antonio80@gamil.com', 'Barcelona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_producto`, `id_venta`, `cantidad`, `precio`) VALUES
(1, 48, 1, 2, '12800.00'),
(2, 49, 1, 1, '12800.00'),
(3, 48, 2, 2, '12800.00'),
(4, 49, 2, 2, '12800.00'),
(5, 42, 3, 1, '12000.00'),
(6, 44, 3, 1, '2166.00'),
(7, 119, 4, 1, '4303.00'),
(8, 124, 4, 1, '4303.00'),
(9, 252, 5, 1, '2132.00'),
(10, 52, 6, 1, '14500.00'),
(11, 325, 6, 1, '1666.00'),
(12, 34, 6, 1, '986.00'),
(13, 52, 7, 1, '14500.00'),
(14, 308, 7, 1, '1020.00'),
(15, 307, 7, 1, '7987.00'),
(16, 253, 8, 1, '2132.00'),
(17, 249, 11, 1, '2572.00'),
(18, 244, 15, 1, '2572.00'),
(19, 244, 16, 1, '2572.00'),
(20, 250, 17, 1, '2572.00'),
(21, 52, 18, 3, '14500.00'),
(22, 244, 18, 2, '2572.00'),
(23, 52, 19, 2, '14500.00'),
(24, 244, 19, 4, '2572.00'),
(25, 69, 20, 3, '8000.00'),
(26, 100, 20, 3, '13400.00'),
(30, 169, 21, 2, '1250.00'),
(40, 34, 21, 3, '986.00'),
(41, 52, 21, 1, '14500.00'),
(42, 244, 21, 1, '2572.00'),
(43, 246, 21, 1, '2572.00'),
(44, 247, 21, 1, '2572.00'),
(45, 248, 21, 1, '2572.00'),
(46, 249, 21, 1, '2572.00'),
(47, 250, 21, 1, '2572.00'),
(48, 252, 21, 1, '2132.00'),
(49, 253, 21, 1, '2132.00'),
(50, 254, 21, 1, '2132.00'),
(51, 255, 21, 1, '2132.00'),
(52, 256, 21, 1, '2132.00'),
(53, 288, 21, 1, '6500.00'),
(54, 320, 21, 1, '1666.00'),
(55, 321, 21, 1, '1666.00'),
(56, 323, 21, 1, '1666.00'),
(57, 325, 21, 1, '1666.00'),
(58, 327, 21, 1, '1980.00'),
(59, 35, 21, 1, '986.00'),
(60, 36, 21, 1, '986.00'),
(61, 37, 21, 1, '2333.00'),
(62, 38, 21, 1, '2333.00'),
(63, 39, 21, 2, '2333.00'),
(64, 40, 21, 1, '4200.00'),
(65, 41, 21, 1, '4200.00'),
(66, 188, 21, 1, '2552.00'),
(67, 271, 21, 1, '1083.00'),
(68, 310, 21, 1, '8000.00'),
(69, 218, 21, 1, '1261.00'),
(70, 275, 21, 1, '7030.00'),
(71, 279, 21, 1, '9490.00'),
(72, 296, 21, 1, '9622.00'),
(73, 297, 21, 1, '6745.00'),
(74, 298, 21, 1, '17100.00'),
(80, 34, 23, 1, '986.00'),
(81, 34, 24, 2, '986.00'),
(82, 35, 24, 1, '986.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `ido` int(11) NOT NULL,
  `opcion` varchar(20) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`ido`, `opcion`, `valor`, `fecha`) VALUES
(1, 'mpago', 'Contado', '2022-05-20 02:46:59'),
(2, 'mpago', 'Credito', '2022-05-20 02:46:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `custumer_id` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

CREATE TABLE `orden_articulos` (
  `id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id` int(50) NOT NULL,
  `nombre_cat` varchar(100) NOT NULL,
  `fecha_hora_cat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`id`, `nombre_cat`, `fecha_hora_cat`) VALUES
(10, 'Aromatizantes ', '2022-04-17 23:30:51'),
(11, 'EGO', '2022-04-17 23:50:51'),
(12, 'Rexona ', '2022-04-18 00:06:33'),
(13, 'Cremas dentales', '2022-04-18 00:16:00'),
(14, 'Pond\'s ', '2022-04-18 00:16:05'),
(15, 'Savital ', '2022-04-18 00:21:44'),
(16, 'Sedal ', '2022-04-18 00:33:17'),
(17, 'Detergentes ', '2022-04-18 00:33:23'),
(20, 'Dove ', '2022-04-18 00:33:43'),
(24, 'Boka ', '2022-04-18 03:15:18'),
(25, 'Suntea ', '2022-04-18 03:15:26'),
(26, 'Frutino', '2022-04-18 03:15:39'),
(27, 'Condimentos ', '2022-04-18 03:16:14'),
(28, 'Salsas ', '2022-04-18 03:16:32'),
(29, 'Bebidas ', '2022-04-18 03:16:47'),
(30, 'Nutribela ', '2022-04-18 03:17:12'),
(31, 'harinas ', '2022-04-18 04:08:23'),
(32, 'Prestobarba', '2022-04-18 04:23:29'),
(33, 'Lavalozas', '2022-04-18 04:25:27'),
(34, 'Desodorantes', '2022-04-18 04:40:57'),
(35, 'Desinfectantes ', '2022-04-18 05:24:44'),
(36, 'Jabon barra ', '2022-04-18 05:27:22'),
(37, 'Cuidado capilar ', '2022-04-18 05:48:02'),
(38, 'Cepillo de dientes', '2022-04-18 05:51:18'),
(39, 'Enlatados', '2022-04-18 06:38:25'),
(40, 'Jabon de baño', '2022-04-18 06:45:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(50) NOT NULL,
  `cc_clie` bigint(100) NOT NULL,
  `nombre_clie` varchar(100) NOT NULL,
  `apellido_clie` varchar(100) NOT NULL,
  `correo_clie` varchar(100) NOT NULL,
  `celular_clie` bigint(100) NOT NULL,
  `direccion_clie` varchar(100) NOT NULL,
  `barrio_clie` varchar(100) NOT NULL,
  `nombre_negocio_clie` varchar(100) NOT NULL,
  `fch_cada_compra_clie` varchar(100) NOT NULL,
  `fecha_hora_clie` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `cc_clie`, `nombre_clie`, `apellido_clie`, `correo_clie`, `celular_clie`, `direccion_clie`, `barrio_clie`, `nombre_negocio_clie`, `fch_cada_compra_clie`, `fecha_hora_clie`) VALUES
(6, 49663588, 'Elba rosa ', 'Bautista blanco', 'jsantidistribuciones@gmail.com', 3126633836, 'Carrera 17 # 16-12', 'Romero Díaz ', 'La mona ', 'Cada 8 días ', '2022-04-18 02:14:51'),
(7, 37332908, 'Edys ', 'Gutierrez Duarte ', 'jsantidistribuciones@gmail.com', 3126909982, 'Cra 13 # 12 bis - 46 ', 'Cañaveral ', 'Tienda Meily ', 'Cada 8 días ', '2022-04-18 02:22:44'),
(8, 49658315, 'Maria', 'Hernandez', 'jsanti@gmail.com', 3165486588, 'Calle 12  cra 12 bis - 04', 'Divino niño', 'Tienda de andrus', '8 días ', '2022-04-18 02:40:31'),
(9, 22528105, 'Lillis ', 'Pisiotti', 'jsanti@gmail.com', 5656017, 'Calle 2 norte 31-71', 'Floridablanca', 'Tienda junior', '8 días ', '2022-04-18 02:43:54'),
(10, 7780504, 'Yesid ', 'Mandon', 'jsanti@gmail.com', 3112149652, 'Cra 34 4 Norte - 03', 'Floridablanca', 'Tienda chilaco', '8 días ', '2022-04-18 02:46:31'),
(11, 1066092229, 'Ledis ', 'Rincon', 'jsanti@gmail.com', 3013136030, 'Cra 31 4 Norte - 03', 'Floridablanca', 'Tienda santi', '8 días ', '2022-04-18 02:48:27'),
(12, 9690735, 'Uri', 'Machado Rodríguez ', 'jsanti@gmail.com', 3136454857, 'Calle 14 norte 29-05', 'Barrio coordilera', 'El regalo de Dios ', '8 días ', '2022-04-18 02:53:31'),
(13, 49673476, 'Noralba ', 'Felizola bustos ', 'jsanti@gmail.com', 3166897551, ' Cra 31 11 norte a - 04', 'Cordillera ', 'Mi hermano y yo', '8 días ', '2022-04-18 02:56:39'),
(14, 1002276726, 'Cristian ', 'Trillos naira', 'jsanti@gmail.com', 3044759400, 'Cra 33 11 norte esquina', 'Floridablanca', 'Tienda la 33', '8 días ', '2022-04-18 03:01:24'),
(15, 1065886914, 'Sandra ', 'Osorio Rodríguez ', 'jsanti@gmail.com', 3234657093, 'Cra 34 11 norte- 20', 'Obregon', 'Tienda nani', '8 días ', '2022-04-18 03:10:40'),
(16, 18928731, 'Arturo ', 'Quintero bacca ', 'jsanti@gmail.com', 3178019916, 'Calle 9 Norte 36 - 05', 'María Eugenia ', 'Tienda la 36', '8 días ', '2022-04-18 03:16:47'),
(17, 3, 'Adriana ', 'Angarita', 'jsanti@gmail.com', 3217289218, 'cra 36 6 Norte -04', 'Maria Eugenia', 'Tienda corazon de jesus', '8 dias', '2022-04-18 03:19:47'),
(18, 1067406168, 'Dayana ', 'Ramírez ', 'jsanti@gmail.com', 3136570767, 'cra 36 4 Norte -03', 'Maria Eugenia', 'Tienda la puerta del sol', '8 dias', '2022-04-18 03:24:42'),
(19, 1065916537, 'Sandra ', 'Contreras ', 'jsanti@gmail.com', 3218851238, 'calle 4 36-06', 'Maria Eugenia', 'Tienda impacto luna', '8 dias', '2022-04-18 03:26:34'),
(20, 10658236551, 'Adriana ', 'Gamboa Gonzales', 'jsanti@gmail.com', 3108304277, 'Mzna Q casa 2', 'villa sol', 'Tienda la bendición de Dios', '8 dias', '2022-04-18 03:28:52'),
(21, 1033729451, 'Elizabeth ', 'Mendoza ', 'jsanti@gmail.com', 3202397091, 'Mzna J casa 3', 'villa sol', 'Tienda sofi', '8 dias', '2022-04-18 03:30:38'),
(22, 37372181, 'Rosalba ', 'Rios', 'jsanti@gmail.com', 3107306530, 'Mzna D casa 9', 'villa sol', 'Tienda la fortaleza ', '8 dias', '2022-04-18 03:33:05'),
(23, 1234567, 'Alexander ', 'Meneses Ramírez ', 'jsanti@gmail.com', 3106129719, 'Mzna J casa 4', 'villa sol', 'Tienda Geova Jireth', '8 dias', '2022-04-18 03:35:30'),
(24, 1091532503, 'Yeini ', 'Florez', 'jsanti@gmail.com', 3014695399, 'Mzna H casa 4', 'villa sol', 'Tienda Naira', '8 dias', '2022-04-18 03:37:47'),
(25, 49666974, 'Margo ', 'Afanador', 'jsanti@gmail.com', 3114029734, 'Mzna G casa 4', 'villa sol', 'Tienda Afanador', '8 dias', '2022-04-18 03:40:02'),
(26, 49666607, 'Yulieth ', 'Ávila Parra ', 'jsanti@gmail.com', 3127347455, 'calle 8 norte 45-70', 'Nueva Colombia ', 'Tienda yuli', '8 dias', '2022-04-18 03:42:51'),
(27, 49661162, 'Arelis ', 'Manosalva  Florez', 'jsanti@gmail.com', 3184895233, 'calle 8 norte 46-08', 'Nueva Colombia ', 'Tienda Geova Jireth ', '8 dias', '2022-04-18 03:45:00'),
(28, 1065896732, 'Jose ', 'Páez Trillos ', 'jsanti@gmail.com', 3117172458, 'calle 8 norte 48-35', 'Nueva Colombia ', 'Tienda el Resplandor ', '8 dias', '2022-04-18 03:48:00'),
(29, 3673037, 'Rosa', 'Rangel', 'jsanti@gmail.com', 123456789, 'cra 47 10 norte-04', 'Nueva Colombia ', 'Tienda el Desoro', '8 dias', '2022-04-18 03:49:41'),
(30, 1065867775, 'Edwin ', 'Solano Rodriguez', 'jsanti@gmail.com', 3223640603, 'calle 10 norte 44-46', 'Nueva Colombia ', 'Tienda Armando', '8 dias', '2022-04-18 03:52:06'),
(31, 1091653879, 'Alba', 'Qintero Ramirez ', 'jsanti@gmail.com', 3212907970, 'cra 45 9 norte-16', 'Nueva Colombia ', 'Tienda Daniela ', '8 dias', '2022-04-18 03:54:04'),
(32, 1003251239, 'Miladis ', 'Castro ', 'jsanti@gmail.com', 3204410948, 'cra 45 7 norte-99', 'Nueva Colombia ', 'Tienda JJ', '8 dias', '2022-04-18 03:55:45'),
(33, 1007406018, 'Rene ', 'Castro ', 'jsanti@gmail.com', 3128371474, 'calle 5 norte 45-55', 'Nueva Colombia ', 'Tienda la economía ', '8 dias', '2022-04-18 03:57:48'),
(34, 1065863075, 'Yaniris ', 'Quñones Ruz', 'jsanti@gmail.com', 3114045720, 'cra 45 4 norte-12 ', 'Nueva Colombia ', 'Tienda sebas ', '8 dias', '2022-04-18 03:59:36'),
(35, 36502876, 'Luz Dary ', 'Ortiz ', 'jsanti@gmail.com', 3215126561, 'calle 5 norte 43-44', 'Nueva Colombia ', 'Auto servicio Quintero ', '8 dias', '2022-04-18 04:02:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `id` int(100) NOT NULL,
  `codigo` bigint(100) NOT NULL,
  `nombre_pro` varchar(100) NOT NULL,
  `prc_compra` bigint(100) NOT NULL,
  `prc_venta_1` bigint(100) NOT NULL,
  `prc_venta_2` bigint(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `proveedor_fk` varchar(100) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_fk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`id`, `codigo`, `nombre_pro`, `prc_compra`, `prc_venta_1`, `prc_venta_2`, `stock`, `proveedor_fk`, `fecha_hora`, `categoria_fk`) VALUES
(34, 2712, 'Aromatel floral  x 36 x 180ml ', 868, 986, 986, 1299, 'Unilever', '2022-04-17 23:33:37', 'Aromatel'),
(35, 2699, 'Aromatel mzn verde x 36 x 180ml', 868, 986, 986, 527, 'Unilever', '2022-04-17 23:34:33', 'Aromatel'),
(36, 2729, 'Aromatel mandarina x 36 x 180ml ', 868, 986, 986, 221, 'Unilever', '2022-04-17 23:35:14', 'Aromatel'),
(37, 1517, 'Aromatel floral x 24 x 400ml ', 2083, 2333, 2333, 346, 'Unilever', '2022-04-17 23:37:41', 'Aromatel'),
(38, 1494, 'Aromatel mzn verde x 24 x 400ml ', 2083, 2333, 2333, 120, 'Unilever', '2022-04-17 23:39:21', 'Aromatel'),
(39, 2095, 'Aromatel mandarina x 24 x 400ml ', 2083, 2333, 2333, 142, 'Unilever', '2022-04-17 23:40:05', 'Aromatel'),
(40, 2873, 'Aromatel mzn verde x 10 x 45ml ', 3500, 4200, 4200, 13, 'Unilever', '2022-04-17 23:45:05', 'Aromatel'),
(41, 2804, 'Aromatel mandarina x 10 x 45ml', 3500, 4200, 4200, 22, 'Unilever', '2022-04-17 23:46:16', 'Aromatel'),
(42, 8964, 'EGO Gel atraction x 15 x 25ml ', 10700, 12000, 12000, 133, 'Unilever', '2022-04-17 23:51:49', 'EGO'),
(43, 5191, 'EGO Gel control caída x 15 x 25ml ', 8152, 10200, 10200, 107, 'Unilever', '2022-04-17 23:54:23', 'EGO'),
(44, 8940, 'EGO Gel atraction pote x 24 x 110ml', 1833, 2166, 2166, 55, 'Unilever', '2022-04-17 23:57:32', 'EGO'),
(45, 4040, 'EGO Gel atraction x 12 x 80ml ', 12500, 18000, 18000, 4, 'Unilever', '2022-04-17 23:59:08', 'EGO'),
(46, 8971, 'EGO Gel atraction x 10 x 10ml ', 3100, 4200, 4200, 87, 'Unilever', '2022-04-18 00:00:40', 'EGO'),
(47, 3777, 'EGO Cera x 10 x 18ml ', 7300, 8400, 8400, 29, 'Unilever', '2022-04-18 00:02:09', 'EGO'),
(48, 5450, 'Rexona rosado x 20 x 8.5 g ', 11600, 12800, 12800, 25, 'Unilever', '2022-04-18 00:07:10', 'Rexona'),
(49, 5467, 'Rexona azul x 20 x 8.5g ', 11600, 12800, 12800, 2, 'Unilever', '2022-04-18 00:07:53', 'Rexona'),
(50, 841, 'Rexona rollon v8 x 6 x 30ml ', 2100, 2500, 2500, 30, 'Unilever', '2022-04-18 00:08:54', 'Rexona'),
(51, 4222, 'Rexona rollon Bamboo x 6 x 30ml ', 2100, 2500, 2500, 25, 'Unilever', '2022-04-18 00:10:10', 'Rexona'),
(52, 1670, 'Jabón combo 5 Rexona+ 2 Dove ', 12150, 14500, 14500, 11, 'Unilever', '2022-04-18 00:13:09', 'Rexona'),
(53, 7383, 'Fortident lim profunda x 6 x 60ml ', 10000, 13000, 13000, 123, 'Unilever', '2022-04-18 00:16:50', 'Fortident'),
(54, 7385, 'Fortident lim profunda x 6 x 70ml ', 10000, 13000, 13000, 126, 'Unilever', '2022-04-18 00:17:30', 'Fortident'),
(55, 2569, 'Crema Pond\'s clarant b3 rosada ', 10500, 12500, 12500, 8, 'Unilever', '2022-04-18 00:20:10', 'Pond\'s'),
(56, 6969, 'Crema Pond\'s rejuveness roja ', 10500, 12500, 12500, 6, 'Unilever', '2022-04-18 00:21:22', 'Pond\'s'),
(57, 3399, 'Savital cp multioleos x 2 x 275ml ', 13750, 18000, 18000, 13, 'Unilever', '2022-04-18 00:23:26', 'Savital'),
(58, 7669, 'Sedal SH keratina x 12 x 24ml ', 5000, 7100, 7100, 112, 'Unilever', '2022-04-18 00:34:44', 'Sedal'),
(59, 7706, 'Sedal AC keratina x 12 x 24ml ', 5000, 7100, 7100, 58, 'Unilever', '2022-04-18 00:35:26', 'Sedal'),
(60, 5566, 'Sedal AC keratina x 20 x 16ml ', 9000, 13300, 13300, 7, 'Unilever', '2022-04-18 00:37:30', 'Sedal'),
(61, 482, 'Sedal SH ceramidas x 20 x 18ml  ', 9000, 13300, 13300, 4, 'Unilever', '2022-04-18 00:38:14', 'Sedal'),
(62, 345, 'Sedal AC ceramidas x 20 x 18ml ', 9000, 13300, 13300, 44, 'Unilever', '2022-04-18 00:38:59', 'Sedal'),
(63, 114, 'Sedal CP rizos definidos x 12 x 18ml ', 6556, 8000, 8000, 36, 'Unilever', '2022-04-18 00:41:50', 'Sedal'),
(64, 473, 'Dove AC rec completa x 12 x 15ml ', 6556, 8000, 8000, 43, 'Unilever', '2022-04-18 00:45:53', 'Dove'),
(65, 480, 'Dove SH rec completa x 12 x 15ml ', 6556, 8000, 8000, 39, 'Unilever', '2022-04-18 00:46:33', 'Dove'),
(66, 3245, 'Fab loza max x 48 x 150ml ', 551, 1200, 1200, 296, 'Unilever', '2022-04-18 00:48:01', 'Lavalozas '),
(67, 7591, 'Sedal SH células madre x 12 x 24ml ', 7000, 7000, 7000, 279, 'Unilever', '2022-04-18 00:49:22', 'Sedal'),
(68, 7553, 'Sedal CP células madre x 12 x 18ml ', 6556, 8000, 8000, 11, 'Unilever', '2022-04-18 00:52:14', 'Sedal'),
(69, 7607, 'Sedal AC células madre x 12 x 24ml ', 6556, 8000, 8000, 1, 'Unilever', '2022-04-18 00:54:00', 'Sedal'),
(70, 7676, 'Sedal DUO 2 en 1  x 12 x 24ml ', 5000, 7000, 7000, 31, 'Unilever', '2022-04-18 00:55:28', 'Sedal'),
(71, 3672, 'Fab líquido x 6 x 100ml ', 3600, 5100, 5100, 9, 'Unilever', '2022-04-18 01:03:29', 'Aromatizantes '),
(72, 8901, 'Fab barra limón  x 48 x 300g ', 1566, 2000, 2000, 112, 'Unilever', '2022-04-18 01:04:53', 'Jabón barra '),
(73, 3443, 'Fab barra limon x 48 x 200g ', 1272, 1666, 1666, 112, 'Unilever', '2022-04-18 01:06:10', 'Jabón barra '),
(74, 1739, 'Puro barra x 25 x 180g ', 837, 1166, 1166, 197, 'Unilever', '2022-04-18 01:07:45', 'Jabón barra '),
(75, 3627, 'Puro polvo floral x 12 x 1kg ', 5267, 5900, 5900, 50, 'Unilever', '2022-04-18 01:09:16', 'Detergentes '),
(76, 3610, 'Puro polvo floral x 22 x 450g ', 2666, 3000, 3000, 95, 'Unilever', '2022-04-18 01:10:19', 'Detergentes '),
(77, 3184, 'Fab polvo x 18 x 800g ', 4719, 5475, 5475, 146, 'Unilever', '2022-04-18 01:12:15', 'Detergentes '),
(78, 8871, 'Fab polvo x 28 x 450g ', 2363, 3001, 3001, 432, 'Unilever', '2022-04-18 01:13:49', 'Detergentes '),
(79, 7171, 'Fab polvo x 54 x 225g ', 1530, 1768, 1768, 153, 'Unilever', '2022-04-18 01:15:20', 'Detergentes '),
(80, 8758, 'Fab polvo x 112 x 100g ', 765, 918, 918, 278, 'Unilever', '2022-04-18 01:16:50', 'Detergentes '),
(81, 8512, '3D polvo x 22 x 500g ', 2512, 2985, 2985, 178, 'Unilever', '2022-04-18 01:28:26', '3d'),
(82, 8536, '3D polvo x 24 x 250g ', 1472, 1766, 1766, 222, 'Unilever', '2022-04-18 01:31:02', '3d'),
(83, 8611, '3D polvo x 60 x 125g ', 600, 882, 882, 301, 'Unilever', '2022-04-18 01:33:16', '3d'),
(84, 8611, '3D polvo x 60 x 125g ', 600, 882, 882, 301, 'Unilever', '2022-04-18 01:33:20', '3d'),
(85, 3498, '3D líquido x 12 x 240ml ', 1530, 1760, 1760, 30, 'Unilever', '2022-04-18 01:35:05', '3d'),
(86, 3535, '3D polvo eucalipto x 12 x 1kg ', 5026, 5905, 5905, 48, 'Unilever', '2022-04-18 01:37:13', '3d'),
(87, 3542, '3D polvo eucalipto x 22 x 500g ', 2512, 2965, 2965, 115, 'Unilever', '2022-04-18 01:39:04', '3d'),
(88, 3559, '3D polvo eucalipto x 24 x 250g', 1472, 1766, 1766, 114, 'Unilever', '2022-04-18 01:40:28', '3d'),
(89, 3580, '3D polvo eucalipto x 60 x 125g ', 600, 882, 882, 487, 'Unilever', '2022-04-18 01:42:12', '3d'),
(90, 9789, 'Poder x x 48 x 250g', 1117, 1333, 1333, 149, 'Yubimar', '2022-04-18 01:46:40', 'Detergentes '),
(91, 179, 'Ariel revitacolor x 24 x 450g', 2950, 3200, 3200, 76, 'P&G', '2022-04-18 01:49:24', 'Ariel'),
(92, 4683, 'Ariel x 24 x 450g ', 2950, 3200, 3200, 26, 'P&G', '2022-04-18 01:50:08', 'Ariel'),
(93, 1561, 'Dersa rey x 96 x 125g ', 916, 990, 990, 79, 'Gran abasto', '2022-04-18 01:52:46', 'Detergentes '),
(94, 1554, 'Dersa rey x 48 x 250g ', 1830, 1980, 1980, 2, 'Gran abasto', '2022-04-18 01:53:56', 'Detergentes '),
(95, 2978, 'Savital  SH multivitaminas x 20 x 25ml ', 11623, 13400, 13400, 21, 'Unilever', '2022-04-18 02:40:33', 'Savital'),
(96, 2954, 'Savital CP multivitaminas x 20 x 22ml', 11623, 13400, 13400, 11, 'Unilever', '2022-04-18 02:41:27', 'Savital'),
(97, 2961, 'Savital AC multivitaminas x 20 x 22ml ', 11623, 13400, 13400, 9, 'Unilever', '2022-04-18 02:42:32', 'Savital'),
(98, 1671, 'Savital SH fusión x 20 x 25ml ', 11623, 13400, 13400, 69, 'Unilever', '2022-04-18 02:45:46', 'Savital'),
(99, 4587, 'Savital CP fusion x 20 x 22ml ', 11623, 13400, 13400, 30, 'Unilever', '2022-04-18 02:46:53', 'Savital'),
(100, 1725, 'Savital AC fusion x 20 x 22ml ', 11623, 13400, 13400, 1, 'Unilever', '2022-04-18 02:47:35', 'Savital'),
(101, 5948, 'savital SH multioleos x 20 x 25ml ', 11623, 13400, 13400, 6, 'Unilever', '2022-04-18 02:48:55', 'Savital'),
(102, 6037, 'Savital CP multioleos x 20 x 22ml ', 11623, 13400, 13400, 16, 'Unilever', '2022-04-18 02:50:16', 'Savital'),
(103, 6013, 'Savital AC multioleos x 20 x 22ml ', 11623, 13400, 13400, 11, 'Unilever', '2022-04-18 02:51:04', 'Savital'),
(104, 9695, 'Savital SH argán x 20 x 25ml ', 11623, 13400, 13400, 11, 'Unilever', '2022-04-18 02:52:21', 'Savital'),
(105, 9732, 'Savital CP argan x 20 x 22ml ', 11623, 13400, 13400, 13, 'Unilever', '2022-04-18 02:53:30', 'Savital'),
(106, 9411, 'Savital SH colageno x 20 x 25ml ', 11623, 13400, 13400, 13, 'Unilever', '2022-04-18 02:55:24', 'Savital'),
(107, 5924, 'Savital SH multioleos x 12 x 350ml ', 7000, 8400, 8400, 8, 'Unilever', '2022-04-18 03:00:07', 'Savital'),
(108, 8344, 'Suntea limon *6 und ', 4850, 5238, 5238, 17, 'Quala', '2022-04-18 03:19:02', 'Suntea'),
(109, 798, 'Suntea fusion de frutas *6 und ', 4850, 5238, 5238, 40, 'Quala', '2022-04-18 03:20:52', 'Suntea'),
(110, 7989, 'Subtema limon-mandarina *6 und ', 4850, 5238, 5238, 25, 'Quala', '2022-04-18 03:23:54', 'Suntea'),
(111, 8382, 'Suntea mora *6 und ', 4850, 5238, 5238, 16, 'Quala', '2022-04-18 03:26:12', 'Suntea'),
(112, 8375, 'Suntea mandarina *6 und ', 4850, 5238, 5238, 52, 'Quala', '2022-04-18 03:27:39', 'Suntea'),
(113, 8412, 'Suntea frutos rojos *6 und ', 4850, 5238, 5238, 46, 'Quala', '2022-04-18 03:28:52', 'Suntea'),
(114, 8320, 'Suntea mzn verde *6 und ', 4850, 5238, 5238, 16, 'Quala', '2022-04-18 03:30:36', 'Suntea'),
(115, 8337, 'Suntea Durazno *6 und ', 4850, 5238, 5238, 85, 'Quala', '2022-04-18 03:32:59', 'Suntea'),
(116, 8399, 'Suntea Granadilla *6 und ', 4850, 5238, 5238, 9, 'Quala', '2022-04-18 03:33:50', 'Suntea'),
(117, 8405, 'Suntea manzana *6 und ', 4850, 5238, 5238, 64, 'Quala', '2022-04-18 03:37:33', 'Suntea'),
(118, 8368, 'Suntea Maracuya *6 und ', 4850, 5238, 5238, 38, 'Quala', '2022-04-18 03:38:27', 'Suntea'),
(119, 5626, 'Boka naranja Mandarina *10 und ', 3930, 4303, 4303, 28, 'Quala', '2022-04-18 03:41:56', 'Boka'),
(120, 3651, 'Boka guanabana * 10 und ', 3930, 4303, 4303, 27, 'Quala', '2022-04-18 03:43:42', 'Boka'),
(121, 2005, 'Boka pina * 10 und ', 3930, 4303, 4303, 21, 'Quala', '2022-04-18 03:49:28', 'Boka'),
(122, 2951, 'Bola Maracuya * 10 und ', 3930, 4303, 4303, 14, 'Quala', '2022-04-18 03:50:35', 'Boka'),
(123, 4122, 'Boka Mandarina * 10 und ', 3930, 4303, 4303, 29, 'Quala', '2022-04-18 03:51:37', 'Boka'),
(124, 1978, 'Boka Fresa * 10 und ', 3930, 4303, 4303, 30, 'Quala', '2022-04-18 03:53:08', 'Boka'),
(125, 8788, 'Boka Mora Fresa * 10 und ', 3930, 4303, 4303, 13, 'Quala', '2022-04-18 03:54:02', 'Boka'),
(126, 5573, 'Boka Melon * 10 und ', 3930, 4303, 4303, 20, 'Quala', '2022-04-18 03:54:52', 'Boka'),
(127, 6623, 'Boka Lima-Limon * 10 und ', 3930, 4303, 4303, 64, 'Quala', '2022-04-18 03:56:08', 'Boka'),
(128, 2036, 'Boka Sandia * 10 und ', 3930, 4303, 4303, 55, 'Quala', '2022-04-18 03:57:09', 'Boka'),
(129, 873, 'Boka Corozo * 10 und ', 3930, 4303, 4303, 131, 'Quala', '2022-04-18 03:58:21', 'Boka'),
(130, 1559, 'Boka Panelada * 10 und ', 3930, 4303, 4303, 71, 'Quala', '2022-04-18 03:59:14', 'Boka'),
(131, 2029, 'Boka Mango * 10 und ', 3930, 4303, 4303, 19, 'Quala', '2022-04-18 03:59:58', 'Boka'),
(132, 1992, 'Boka Naranja * 10 und ', 3930, 4303, 4303, 26, 'Quala', '2022-04-18 04:01:34', 'Boka'),
(133, 5559, 'Boka Durazno * 10 und ', 3930, 4303, 4303, 22, 'Quala', '2022-04-18 04:03:31', 'Boka'),
(134, 2047, 'crema de arroz ', 5833, 6532, 6532, 81, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:13:57', 'harinas'),
(135, 2425, 'Frutino Uva * 10 und ', 3920, 4272, 4272, 36, 'Quala', '2022-04-18 04:14:18', 'Fruti�o'),
(136, 880, 'Frutino Corozo * 10 und ', 3920, 4272, 4272, 48, 'Quala', '2022-04-18 04:15:25', 'Fruti�o'),
(137, 1059, 'siete cereales', 5833, 6534, 6534, 92, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:15:34', 'harinas'),
(138, 2401, 'Frutino Salpicon * 10 und ', 3920, 4272, 4272, 56, 'Quala', '2022-04-18 04:16:24', 'Fruti�o'),
(139, 4780, 'Frutino Frutos Rojos * 10 und ', 3920, 4272, 4272, 24, 'Quala', '2022-04-18 04:18:45', 'Fruti�o'),
(140, 2364, 'Frutino Maracuya * 10 und ', 3920, 4272, 4272, 22, 'Quala', '2022-04-18 04:20:06', 'Fruti�o'),
(141, 2340, 'Frutino Limon * 10 und ', 3920, 4272, 4272, 31, 'Quala', '2022-04-18 04:21:01', 'Fruti�o'),
(142, 2357, 'Frutino Lulo * 10 und ', 3920, 4272, 4272, 8, 'Quala', '2022-04-18 04:23:07', 'Fruti�o'),
(143, 5739, 'Prestobarba big confort ', 19200, 22000, 22000, 21, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:24:38', 'Prestobarba'),
(144, 8467, 'Frutino Mora Dulce * 10 und ', 3920, 4272, 4272, 19, 'Quala', '2022-04-18 04:25:33', 'Fruti�o'),
(145, 2395, 'Frutino Naranja * 10 und ', 3920, 4272, 4272, 22, 'Quala', '2022-04-18 04:26:19', 'Fruti�o'),
(146, 2432, 'Frutino Piña-Naranja * 10 und ', 3920, 4272, 4272, 6, 'Quala', '2022-04-18 04:27:31', 'Fruti�o'),
(147, 2808, 'Lavaloza limpia ya x 450gr', 2185, 2490, 2490, 814, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:27:52', 'Lavalozas'),
(148, 2319, 'Frutino Fresa * 10 und ', 3920, 4272, 4272, 78, 'Quala', '2022-04-18 04:28:36', 'Fruti�o'),
(149, 2723, 'Lavaloza limpia ya liquido x 500 ml', 2098, 2490, 2490, 41, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:29:32', 'Lavalozas'),
(150, 2418, 'Frutino Pina * 10 und ', 3920, 4272, 4272, 26, 'Quala', '2022-04-18 04:29:34', 'Fruti�o'),
(151, 2449, 'Frutino Mango * 10 und ', 3920, 4272, 4272, 46, 'Quala', '2022-04-18 04:30:31', 'Fruti�o'),
(152, 1009, 'Frutino Panelada * 10 und ', 5491, 5985, 5985, 130, 'Quala', '2022-04-18 04:33:30', 'Fruti�o'),
(153, 1752, 'Avena harina precocidad x 130gr', 750, 800, 800, 18, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:34:29', 'harinas'),
(154, 1578, 'Avena hojuelas precocida', 750, 800, 800, 18, 'Gustavo adolfo Iba�ez Solano', '2022-04-18 04:35:24', 'harinas'),
(155, 7768, 'Prestobarba gillette 10azul+2gris', 24000, 26500, 26500, 1, 'P&G', '2022-04-18 04:36:47', 'Prestobarba'),
(156, 8164, 'Prestobarba minora por 12 und', 16500, 18500, 18500, 5, 'P&G', '2022-04-18 04:37:43', 'Prestobarba'),
(157, 8164, 'Prestobarba minora por 12 und', 16500, 18500, 18500, 5, 'P&G', '2022-04-18 04:40:43', 'Prestobarba'),
(158, 101, 'Gelatina frutino limon * 48 und ', 730, 840, 840, 35, 'Quala', '2022-04-18 04:44:42', 'Fruti�o'),
(159, 95, 'Gelatina Frutino Cereza * 48 und ', 730, 840, 840, 56, 'Quala', '2022-04-18 04:45:46', 'Fruti�o'),
(160, 187, 'Gelatina Frutino Frambuesa* 48und ', 730, 840, 840, 62, 'Quala', '2022-04-18 04:47:24', 'Fruti�o'),
(161, 156, 'Gelatina Frutino Frutos rojos * 48und ', 730, 840, 840, 69, 'Quala', '2022-04-18 04:48:13', 'Fruti�o'),
(162, 125, 'Gelatina Frutino Naranja *48und ', 730, 840, 840, 21, 'Quala', '2022-04-18 04:49:34', 'Frutino'),
(163, 149, 'Gelatina Frutino Pina *48und ', 730, 840, 840, 35, 'Quala', '2022-04-18 04:50:23', 'Frutino'),
(164, 57, 'Gelatina Frutino Mango *48und ', 730, 840, 840, 31, 'Quala', '2022-04-18 04:51:13', 'Frutino'),
(165, 479, 'speed stick pote azul x 130gr', 2183, 2490, 2490, 21, 'Gran abasto', '2022-04-18 04:52:34', 'Desodorantes'),
(166, 486, 'lady speed pote rosado x 130gr', 2183, 2490, 2490, 7, 'Gran abasto', '2022-04-18 04:53:48', 'Desodorantes'),
(167, 1291, 'Fruco Tomate x 24 x 120g ', 1041, 1250, 1250, 105, 'Unilever', '2022-04-18 04:54:49', 'Fruco'),
(168, 6625, 'lady speed clinical x 9gr', 11840, 12990, 12990, 12, 'Gran abasto', '2022-04-18 04:56:26', 'Desodorantes'),
(169, 1284, 'Fruco Mayonesa x 24 x 120g ', 1041, 1250, 1250, 105, 'Unilever', '2022-04-18 04:56:42', 'Fruco'),
(170, 6618, 'speed stick clinical x 9gr', 11840, 12990, 12990, 34, 'Gran abasto', '2022-04-18 04:57:37', 'Desodorantes'),
(171, 1555, 'speed stick gel x 10gr', 11840, 12990, 12990, 39, 'Gran abasto', '2022-04-18 05:00:54', 'Desodorantes'),
(172, 2766, 'Bonif gel antibacterial x 58ml ', 1, 1, 1, 73, 'Unilever', '2022-04-18 05:01:30', 'Rexona'),
(173, 1531, 'lady speed gel x10gr', 11840, 12990, 12990, 53, 'Gran abasto', '2022-04-18 05:02:12', 'Desodorantes'),
(174, 607, 'Bonif knorr rinde mas ', 1, 1, 1, 73, 'Unilever', '2022-04-18 05:02:42', 'Fruco'),
(175, 7882, 'lady speed crema x 9gr', 11840, 12990, 12990, 30, 'Gran abasto', '2022-04-18 05:06:11', 'Desodorantes'),
(176, 9267, 'Fruco mostaza x 12 x 85gr ', 9151, 10200, 10200, 9, 'Unilever', '2022-04-18 05:07:58', 'Fruco'),
(177, 7837, 'speed stick crema 2 x 9gr c/u', 11840, 12990, 12990, 24, 'Gran abasto', '2022-04-18 05:09:55', 'Desodorantes'),
(178, 3864, 'Fruco Tomate x 12 x 85g ', 9151, 10500, 10500, 45, 'Unilever', '2022-04-18 05:11:25', 'Fruco'),
(179, 751, 'Fruco BBQ x 12 x 85g ', 9151, 10500, 10500, 4, 'Unilever', '2022-04-18 05:12:12', 'Fruco'),
(180, 3887, 'Ponds limpieza facial * 6 und ', 4000, 6000, 6000, 19, 'Unilever', '2022-04-18 05:13:19', 'Pond\'s'),
(181, 6106, 'Fruco Tomate x 24 x 150g ', 1400, 1596, 1596, 16, 'Unilever', '2022-04-18 05:19:05', 'Fruco'),
(182, 4095, 'crema colgate kids x50gr', 2678, 2999, 2999, 64, 'Gran abasto', '2022-04-18 05:19:15', 'Fortident'),
(183, 6090, 'Fruco Mayonesa x 24 x 150g ', 1400, 1596, 1596, 24, 'Unilever', '2022-04-18 05:20:07', 'Salsas'),
(184, 1464, 'crema colgate pequeña x 22ml', 1283, 1411, 1411, 186, 'Gran abasto', '2022-04-18 05:21:48', 'Cremas dentales'),
(185, 2139, 'crema colgate x60 menta', 2250, 2458, 2458, 222, 'Gran abasto', '2022-04-18 05:24:40', 'Cremas dentales'),
(186, 1501, 'crema colgate x60 tri accion', 2506, 2681, 2681, 684, 'Gran abasto', '2022-04-18 05:26:53', 'Cremas dentales'),
(187, 1382, 'crema+cepillo colgate tri accion', 2690, 3012, 3012, 57, 'Gran abasto', '2022-04-18 05:28:28', 'Cremas dentales'),
(188, 385, 'Aromax líquido x 24 x 500ml ', 2220, 2552, 2552, 50, 'Unilever', '2022-04-18 05:36:33', 'Desinfectantes'),
(189, 6271, 'balance rosado x 11,5gr', 9270, 10289, 10289, 72, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 05:37:04', 'Desodorantes'),
(190, 1224, 'balance azul x 11,5gr', 9270, 10289, 10289, 50, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 05:37:58', 'Desodorantes'),
(191, 6889, 'balance duo roj normal', 9270, 10289, 10289, 30, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 05:39:57', 'Desodorantes'),
(192, 6698, 'Mostaza San Jorge x 24 x 110ml', 1095, 1250, 1250, 59, 'Pastor julio delgado', '2022-04-18 05:41:51', 'Salsas'),
(193, 6681, 'Salsita negra San Jorge x 24 x 110ml ', 1095, 1250, 1250, 64, 'Pastor julio delgado', '2022-04-18 05:43:40', 'Salsas'),
(194, 2471, 'oferta konzil+balance p24 lle30', 12789, 14579, 14579, 6, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 05:44:28', 'Savital'),
(195, 8037, 'Mayonesa San Jorge x 24 x 170g ', 1245, 1420, 1420, 53, 'Pastor julio delgado', '2022-04-18 05:46:45', 'Salsas'),
(196, 245, 'Tomate San Jorge x 24 x 170g ', 1245, 1420, 1420, 62, 'Pastor julio delgado', '2022-04-18 05:47:37', 'Salsas'),
(197, 4854, 'Konzil pote sh+cp+ac', 16000, 18500, 18500, 4, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 05:49:03', 'Cuidado capilar'),
(198, 5040, 'Cepillo colgate x 12 und', 20500, 22140, 22140, 20, 'Gran abasto', '2022-04-18 05:51:02', 'Cremas dentales'),
(199, 2559, 'Axion disco por 130gr', 1031, 1166, 1166, 132, 'Gran abasto', '2022-04-18 05:52:28', 'Lavalozas'),
(200, 4273, 'Axion tasa x 150 gr', 1110, 1250, 1250, 181, 'Gran abasto', '2022-04-18 05:54:30', 'Lavalozas'),
(201, 1256, 'Axion tasa po 235gr', 2276, 2480, 2480, 13, 'Gran abasto', '2022-04-18 05:56:13', 'Lavalozas'),
(202, 4226, 'Supremo tasa x 150gr', 1021, 1174, 1174, 84, 'Pastor julio delgado', '2022-04-18 05:58:01', 'Lavalozas'),
(203, 2602, 'Fabuloso tira x100 ml alternativa clorox', 8734, 9782, 9782, 9, 'Gran abasto', '2022-04-18 06:03:05', 'Desinfectantes'),
(204, 9480, 'Fabuloso tira x40 ml morado clorox', 3100, 3990, 3990, 23, 'Gran abasto', '2022-04-18 06:05:29', 'Aromatizantes'),
(205, 2140, 'Cepillo niño fluocardent x12 und', 16883, 18990, 18990, 11, 'Yubimar', '2022-04-18 06:08:00', 'Cepillo de dientes'),
(206, 3894, 'Salsa Rosada San Jorge x 12 x 90g ', 8890, 9956, 9956, 3, 'Pastor julio delgado', '2022-04-18 06:08:25', 'Salsas'),
(207, 3900, 'Salsa BBQ San Jorge x 12 x 90g', 8890, 9956, 9956, 6, 'Pastor julio delgado', '2022-04-18 06:09:13', 'Salsas'),
(208, 2126, 'Cepillo adulto fluocardent x12und', 18117, 19928, 19928, 22, 'Yubimar', '2022-04-18 06:09:59', 'Cepillo de dientes'),
(209, 5841, 'Mayonesa San Jorge x 12 x 100g', 8890, 9956, 9956, 8, 'Pastor julio delgado', '2022-04-18 06:10:10', 'Salsas'),
(210, 5834, 'Tomate San Jorge x 12 x 100g ', 8890, 9956, 9956, 9, 'Pastor julio delgado', '2022-04-18 06:10:53', 'Salsas'),
(211, 1792, 'Crema+cepillo fluocardent ', 1925, 2166, 2166, 45, 'Yubimar', '2022-04-18 06:11:09', 'Cremas dentales'),
(212, 5995, 'Tomate San Jorge x 28 x 50g', 8757, 9895, 9895, 6, 'Pastor julio delgado', '2022-04-18 06:13:48', 'Salsas'),
(213, 5988, 'Mayonesa San Jorge x 28 x 50g ', 8757, 9895, 9895, 7, 'Pastor julio delgado', '2022-04-18 06:14:38', 'Salsas'),
(214, 5789, 'Fabuloso x200 morado clorox ', 1147, 1261, 1261, 185, 'Gran abasto', '2022-04-18 06:16:35', 'Desinfectantes'),
(215, 997, 'Fabuloso x200 lavanda', 1147, 1261, 1261, 635, 'Gran abasto', '2022-04-18 06:18:29', 'Desinfectantes'),
(216, 1017, 'Fabuloso x200 bebe', 1147, 1261, 1261, 355, 'Gran abasto', '2022-04-18 06:19:38', 'Desinfectantes'),
(217, 1406, 'Fabuloso x200 manzana', 1147, 1261, 1261, 218, 'Gran abasto', '2022-04-18 06:20:25', 'Desinfectantes'),
(218, 379, 'Fabuloso x200 ultra desinfectante ', 1147, 1261, 1261, 167, 'Gran abasto', '2022-04-18 06:21:18', 'Desinfectantes'),
(219, 6865, 'Salsita negra San Jorge x 24x 7 ml ', 2500, 2950, 2950, 40, 'Pastor julio delgado', '2022-04-18 06:21:20', 'Salsas'),
(220, 6841, 'Mostaza San Jorge x 24 x 8g ', 2500, 2950, 2950, 47, 'Pastor julio delgado', '2022-04-18 06:22:09', 'Salsas'),
(221, 883, 'Fabuloso x200 verde clorox', 1147, 1261, 1261, 252, 'Gran abasto', '2022-04-18 06:22:11', 'Desinfectantes'),
(222, 1604, 'Fabuloso x200 alternativas clorox ', 1147, 1261, 1261, 191, 'Gran abasto', '2022-04-18 06:23:19', 'Desinfectantes'),
(223, 1000, 'Fabuloso x200 floral', 1147, 1261, 1261, 329, 'Gran abasto', '2022-04-18 06:24:03', 'Desinfectantes'),
(224, 6872, 'Salsa ajo x 48 x 7g ', 5950, 6950, 6950, 59, 'Pastor julio delgado', '2022-04-18 06:24:56', 'Salsas'),
(225, 3123, 'Suavitel x200 fresas y chocolate ', 988, 1096, 1096, 690, 'Gran abasto', '2022-04-18 06:26:39', 'Aromatizantes'),
(226, 2904, 'Suavitel x200 lavanda', 988, 1096, 1096, 109, 'Gran abasto', '2022-04-18 06:27:35', 'Aromatizantes'),
(227, 3208, 'Suavitel x200 rosado todo en 1', 988, 1096, 1096, 205, 'Gran abasto', '2022-04-18 06:28:23', 'Aromatizantes'),
(228, 2620, 'Atun van camps en agua x 160g ', 2300, 2800, 2800, 13, 'Pastor julio delgado', '2022-04-18 06:29:25', 'Enlatados '),
(229, 96, 'Suavitel x200 blanco esencial', 988, 1096, 1096, 170, 'Gran abasto', '2022-04-18 06:29:28', 'Aromatizantes'),
(230, 3116, 'Suavitel x200 vainilla', 988, 1096, 1096, 213, 'Gran abasto', '2022-04-18 06:30:10', 'Aromatizantes'),
(231, 8827, 'Suavitel x360 azul', 1407, 1666, 1666, 164, 'Gran abasto', '2022-04-18 06:31:24', 'Aromatizantes'),
(232, 8810, 'Suavitel x360 lavanda', 1407, 1666, 1666, 80, 'Gran abasto', '2022-04-18 06:32:38', 'Aromatizantes'),
(233, 2430, 'Suavitel tira azul x 50ml', 4072, 4804, 4804, 16, 'Gran abasto', '2022-04-18 06:34:44', 'Aromatizantes'),
(234, 2539, 'Suavitel tira azul x 110ml', 6544, 7852, 7852, 30, 'Gran abasto', '2022-04-18 06:36:14', 'Aromatizantes'),
(235, 2485, 'Suavitel x430 azul', 2280, 2508, 2508, 3, 'Gran abasto', '2022-04-18 06:38:46', 'Aromatizantes'),
(236, 2638, 'Suavitel x430 vainilla ', 2280, 2508, 2508, 23, 'Gran abasto', '2022-04-18 06:39:33', 'Aromatizantes'),
(237, 7615, 'Arveja sabanera x 24 x 300g ', 2250, 2520, 2520, 38, 'Pastor julio delgado', '2022-04-18 06:39:48', 'Enlatados'),
(238, 2751, 'Suavitel x430 fresa chocolate ', 2280, 2508, 2508, 84, 'Gran abasto', '2022-04-18 06:40:32', 'Aromatizantes'),
(239, 7714, 'Arveja con zanahoria x 24 x 300g', 2550, 2833, 2833, 48, 'Pastor julio delgado', '2022-04-18 06:41:33', 'Enlatados'),
(240, 119, 'Suavitel x400 blanco esencial', 2280, 2508, 2508, 34, 'Gran abasto', '2022-04-18 06:41:52', 'Aromatizantes'),
(241, 2898, 'Suavitel x400 lavanda', 2280, 2508, 2508, 5, 'Gran abasto', '2022-04-18 06:42:44', 'Aromatizantes'),
(242, 1817, 'Maíz tierno x 24 x 300g ', 3763, 4250, 4250, 7, 'Pastor julio delgado', '2022-04-18 06:43:48', 'Enlatados'),
(243, 7608, 'Arveja sabanera x 48x 180g ', 1963, 2200, 2200, 11, 'Pastor julio delgado', '2022-04-18 06:47:13', 'Enlatados'),
(244, 1006, 'Jabón protex x120gr herbal', 2382, 2572, 2572, 93, 'Gran abasto', '2022-04-18 06:47:50', 'Jab�n de ba�o'),
(245, 7691, 'Arveja con zanahoria x 48x 180g', 2136, 2400, 2400, 23, 'Pastor julio delgado', '2022-04-18 06:49:21', 'Enlatados'),
(246, 1020, 'Jabón protex x120gr vitamina E', 2382, 2572, 2572, 83, 'Gran abasto', '2022-04-18 06:49:34', 'Jab�n de ba�o'),
(247, 993, 'Jabón protex x120gr macadamia', 2382, 2572, 2572, 7, 'Gran abasto', '2022-04-18 06:50:29', 'Jab�n de ba�o'),
(248, 955, 'Jabón protex x120gr avena', 2382, 2572, 2572, 77, 'Gran abasto', '2022-04-18 06:51:43', 'Jab�n de ba�o'),
(249, 979, 'Jabón protex x120gr complete 12', 2392, 2572, 2572, 3, 'Gran abasto', '2022-04-18 06:52:34', 'Jab�n de ba�o'),
(250, 962, 'Jabón protex x120gr limpieza profunda', 2382, 2572, 2572, 71, 'Gran abasto', '2022-04-18 06:53:29', 'Jab�n de ba�o'),
(251, 347, 'Panela 1.5 L panel - limon * 16 und ', 13000, 13975, 13975, 30, 'Quala', '2022-04-18 06:56:11', 'Suntea'),
(252, 871, 'Jabón palmolive x120gr azul ', 1904, 2132, 2132, 120, 'Gran abasto', '2022-04-18 06:56:32', 'Jab�n de ba�o'),
(253, 6341, 'Jabón palmolive x120gr carbon', 1904, 2132, 2132, 112, 'Gran abasto', '2022-04-18 06:57:56', 'Jab�n de ba�o'),
(254, 840, 'Jabón palmolive x120gr verde', 1904, 2132, 2132, 38, 'Gran abasto', '2022-04-18 06:59:16', 'Jab�n de ba�o'),
(255, 857, 'Jabón palmolive x120gr rosado yogur ', 1904, 2132, 2132, 71, 'Gran abasto', '2022-04-18 07:00:39', 'Jab�n de ba�o'),
(256, 864, 'Jabón palmolive x120gr rojo granada', 1904, 2132, 2132, 71, 'Gran abasto', '2022-04-18 07:02:04', 'Jab�n de ba�o'),
(257, 4791, 'Konzil cp rizos verde', 7500, 8925, 8925, 16, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:04:12', 'Cuidado capilar'),
(258, 2653, 'Maizena colad fresa x 9 und x 28g ', 8538, 9250, 9250, 4, 'Unilever', '2022-04-18 07:05:38', 'harinas'),
(259, 7135, 'Saviloe x420ml', 9600, 10410, 10410, 20, 'Quala', '2022-04-18 07:06:42', 'Vevidas'),
(260, 2654, 'Maizena colad vainilla x 9 und x 28g ', 8538, 9250, 9250, 6, 'Unilever', '2022-04-18 07:07:14', 'harinas'),
(261, 447, 'Konzil acondicionador x18und', 7500, 8925, 8925, 26, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:07:59', 'Cuidado capilar'),
(262, 5335, 'Konzil cp x18und', 7500, 8925, 8925, 29, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:09:01', 'Cuidado capilar'),
(263, 868, 'Konzil sh x18 und', 7500, 8925, 8925, 43, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:09:59', 'Cuidado capilar'),
(264, 8580, 'Nutribelas rep internsiva', 9769, 10310, 10310, 18, 'Quala', '2022-04-18 07:10:59', 'Cuidado capilar'),
(265, 9556, 'Ricostilla cubo * 60 und ', 15094, 17100, 17100, 47, 'Quala', '2022-04-18 07:11:06', 'Condimentos'),
(266, 8528, 'Nutribelas nutrición x12 und', 9769, 10310, 10310, 21, 'Quala', '2022-04-18 07:11:50', 'Cuidado capilar'),
(267, 8528, 'Nutribelas enzimoterapia x12 und', 9769, 10310, 10310, 16, 'Quala', '2022-04-18 07:13:04', 'Cuidado capilar'),
(268, 6609, 'Nutribelas cauterizacion x12und', 9769, 10310, 10310, 13, 'Quala', '2022-04-18 07:14:02', 'Cuidado capilar'),
(269, 5442, 'Nutribelas termo protección x12und', 9769, 10310, 10310, 11, 'Quala', '2022-04-18 07:15:06', 'Cuidado capilar'),
(270, 5435, 'Nutribelas repolarizacion x12 und', 9769, 10310, 10310, 16, 'Quala', '2022-04-18 07:16:06', 'Cuidado capilar'),
(271, 378, 'Aromax liquido x180 ml', 960, 1083, 1083, 713, 'Quala', '2022-04-18 07:17:45', 'Desinfectantes'),
(272, 9373, 'Trifogon  60*24', 1112, 1246, 1246, 157, 'Quala', '2022-04-18 07:19:30', 'Condimentos'),
(273, 6210, 'Saviloe x320ml x 6 und', 10500, 11445, 11445, 23, 'Quala', '2022-04-18 07:20:21', 'Bebidas'),
(274, 3466, 'Maizena fecula del maíz *90g ', 1150, 1800, 1800, 15, 'Unilever', '2022-04-18 07:23:12', 'harinas'),
(275, 6463, 'Spartan lata x6 unidades', 6480, 7030, 7030, 25, 'Quala', '2022-04-18 07:23:58', 'Bebidas'),
(276, 9785, 'Doña gallina x48 und', 11500, 13100, 13100, 23, 'Quala', '2022-04-18 07:26:42', 'Condimentos'),
(277, 3807, 'Trifogon x12x24', 9270, 10100, 10100, 10, 'Quala', '2022-04-18 07:28:01', 'Condimentos'),
(278, 9815, 'Doña gallina x200 und', 49500, 53500, 53500, 3, 'Quala', '2022-04-18 07:29:13', 'Condimentos'),
(279, 9199, 'Doña gallina desmenuzado x36 und', 7485, 9490, 9490, 21, 'Quala', '2022-04-18 07:31:05', 'Condimentos'),
(280, 8085, 'Sabifrut Naranja x 4 x 6 und ', 7000, 8000, 8000, 5, 'Quala', '2022-04-18 07:32:44', 'Bebidas'),
(281, 8342, 'Sanpic x200 ml lavanda', 1021, 1166, 1166, 64, 'Pastor julio delgado', '2022-04-18 07:33:52', 'Desinfectantes'),
(282, 9240, 'Sanpic x200 ml vainilla ', 1021, 1166, 1166, 54, 'Pastor julio delgado', '2022-04-18 07:35:04', 'Desinfectantes'),
(283, 1320, 'Tratamiento Pantene x 12 x 30ml ', 8333, 10000, 10000, 7, 'P&G', '2022-04-18 07:35:26', 'Cuidado capilar'),
(284, 5287, 'Lavaloza don pastor x500gr', 2490, 2960, 2960, 13, 'Pastor julio delgado', '2022-04-18 07:36:35', 'Lavalozas'),
(285, 6217, 'H&S fuerza Raiz x 12 x 33ml ', 8333, 10000, 10000, 12, 'P&G', '2022-04-18 07:36:47', 'Cuidado capilar'),
(286, 2568, 'H&S lim profunda x 12 x 18ml ', 5800, 6500, 6500, 18, 'P&G', '2022-04-18 07:38:27', 'Cuidado capilar'),
(287, 9930, 'Don gustico x12 und', 5143, 5965, 5965, 23, 'Quala', '2022-04-18 07:39:09', 'Condimentos'),
(288, 2243, 'H&S suave y manejable 2 en 1 x 12 x 18ml ', 5800, 6500, 6500, 11, 'P&G', '2022-04-18 07:39:45', 'Cuidado capilar'),
(289, 9893, 'Don gustico x50 und', 2150, 2310, 2310, 239, 'Quala', '2022-04-18 07:40:07', 'Condimentos'),
(290, 2010, 'Crema fluocardent * 67g ', 1590, 1833, 1833, 50, 'Yubimar', '2022-04-18 07:41:58', 'Cremas dentales'),
(291, 8092, 'Quipitos x24 und', 9460, 10098, 10098, 19, 'Quala', '2022-04-18 07:42:10', 'Boka'),
(292, 6104, 'Cerebrit cajita x8 und', 3800, 4180, 4180, 36, 'Quala', '2022-04-18 07:43:58', 'Boka'),
(293, 3781, 'Balance tubo women 24* 32g ', 1963, 2500, 2500, 8, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:44:15', 'Desodorantes'),
(294, 9382, 'Balance tubo men  24*32g', 1963, 2500, 2500, 47, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:45:01', 'Desodorantes'),
(295, 7138, 'Salsa bbq San Jorge x200ml', 3000, 3310, 3310, 24, 'Pastor julio delgado', '2022-04-18 07:46:49', 'Salsas'),
(296, 9212, 'Ricostilla desme * 36 und ', 8367, 9622, 9622, 10, 'Quala', '2022-04-18 07:49:22', 'Condimentos'),
(297, 9230, 'Zucaritas x8 unidades', 6077, 6745, 6745, 62, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:50:35', 'Boka'),
(298, 4872, 'Ricostilla desme * 60 und ', 13944, 17100, 17100, 1, 'Quala', '2022-04-18 07:50:41', 'Condimentos'),
(299, 3364, 'Chococrispi x8 unidades', 6077, 6745, 6745, 75, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:51:41', 'Boka'),
(300, 963, 'Froops loots x8 unidades', 6077, 6745, 6745, 21, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:53:00', 'Boka'),
(301, 4277, 'Sasones pimienta * 50und ', 1337, 1750, 1750, 9, 'Quala', '2022-04-18 07:54:40', 'Condimentos'),
(302, 5106, 'Club social original x9 unidades', 4096, 4490, 4490, 215, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:55:41', 'Boka'),
(303, 9013, 'Galleta oreo grande x6 und', 5100, 5600, 5600, 4, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:56:45', 'Boka'),
(304, 3838, 'Color del fogón * 50und ', 910, 1020, 1020, 14, 'Quala', '2022-04-18 07:57:42', 'Condimentos'),
(305, 414, 'Sosones comino * 50und ', 1138, 1274, 1274, 17, 'Quala', '2022-04-18 07:58:22', 'Condimentos'),
(306, 1110, 'Galleta oreo x12 unidades', 6800, 7530, 7530, 65, 'Ibanez castilla distribuci�nes S. A', '2022-04-18 07:59:05', 'Boka'),
(307, 3172, 'Color costa x500 unidades', 7200, 7987, 7987, 30, 'Quala', '2022-04-18 08:00:31', 'Condimentos'),
(308, 1222, 'Sasones color * 50und ', 910, 1020, 1020, 47, 'Quala', '2022-04-18 08:00:59', 'Condimentos'),
(309, 1302, 'Gelatina frutiño sin sabor ', 840, 960, 960, 23, 'Quala', '2022-04-18 08:01:42', 'Boka'),
(310, 408, 'Aromax líquido x 24 x 40ml ', 7272, 8000, 8000, 9, 'Quala', '2022-04-18 08:02:29', 'Desinfectantes'),
(311, 6601, 'H&S lim profunda x 8 x 33ml ', 6000, 6750, 6750, 5, 'P&G', '2022-04-18 08:03:42', 'Cuidado capilar'),
(312, 675, 'Cerebrit tira x 10 unidades ', 7710, 8403, 8403, 11, 'Quala', '2022-04-18 08:05:07', 'Boka'),
(313, 3683, 'Pantene Acond 3 min  x 12 x 18ml ', 5700, 6500, 6500, 36, 'P&G', '2022-04-18 08:06:55', 'Cuidado capilar'),
(314, 5367, 'Cerebrit pote x330gr', 10300, 11747, 11747, 6, 'Quala', '2022-04-18 08:08:28', 'Boka'),
(315, 4361, 'Vive 100 grande x6 und', 9520, 10430, 10430, 5, 'Quala', '2022-04-18 08:10:07', 'Bebidas'),
(316, 9503, 'Vive 100 x240 x6 unid', 8300, 9166, 9166, 6, 'Quala', '2022-04-18 08:11:23', 'Bebidas'),
(317, 5008, 'Vive 100 x190 x 6 unid', 5700, 6968, 6968, 6, 'Quala', '2022-04-18 08:12:29', 'Bebidas'),
(318, 3683, 'Pantene Acond 3 min  x 12 x 18ml ', 5700, 6500, 6500, 36, 'P&G', '2022-04-18 08:18:34', 'Cuidado capilar'),
(319, 155, 'Supremo barra x200gr ', 1416, 1586, 1586, 21, 'Pastor julio delgado', '2022-04-18 08:20:06', 'Lavalozas'),
(320, 1321, 'Jabón Deseo coco almen 72* 110g ', 1480, 1666, 1666, 52, 'Pastor julio delgado', '2022-04-18 08:20:44', 'Jab�n de ba�o'),
(321, 2168, 'Jabón Deseo Avena 72*110g ', 1480, 1666, 1666, 138, 'Pastor julio delgado', '2022-04-18 08:21:42', 'Jab�n de ba�o'),
(322, 186, 'Supremo barra x100gr', 785, 887, 887, 176, 'Pastor julio delgado', '2022-04-18 08:21:42', 'Lavalozas'),
(323, 1307, 'Jabon Deseo algas marinas 72*110g ', 1480, 1666, 1666, 126, 'Pastor julio delgado', '2022-04-18 08:23:02', 'Jab�n de ba�o'),
(324, 9035, 'Dersa barra x250 azul', 1830, 1980, 1980, 27, 'Gran abasto', '2022-04-18 08:23:36', 'Jab�n barra'),
(325, 2205, 'Jabon Deseo mzn verde 72*110g ', 1480, 1666, 1666, 66, 'Pastor julio delgado', '2022-04-18 08:23:49', 'Jab�n de ba�o'),
(326, 5525, 'Único barra morada x220gr', 1530, 1790, 1790, 34, 'Gran abasto', '2022-04-18 08:25:35', 'Jab�n barra'),
(327, 6003, 'Jabón rey', 1830, 1980, 1980, 30, 'Gran abasto', '2022-04-18 08:27:02', 'Jab�n barra'),
(328, 5440, 'Jabon lemon 36*115g', 1590, 1749, 1749, 242, 'Gran abasto', '2022-04-18 08:27:33', 'Jab�n de ba�o'),
(329, 9659, 'Dersa barra loza x250gr', 1570, 1750, 1750, 3, 'Gran abasto', '2022-04-18 08:28:12', 'Lavalozas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedor`
--

CREATE TABLE `tb_proveedor` (
  `id` int(50) NOT NULL,
  `cc_prv` bigint(100) NOT NULL,
  `nombre_prv` varchar(100) NOT NULL,
  `correo_prv` varchar(100) NOT NULL,
  `celular_prv` bigint(100) NOT NULL,
  `direccion_prv` varchar(100) NOT NULL,
  `fecha_hora_prv` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_proveedor`
--

INSERT INTO `tb_proveedor` (`id`, `cc_prv`, `nombre_prv`, `correo_prv`, `celular_prv`, `direccion_prv`, `fecha_hora_prv`) VALUES
(7, 123456789, 'Unilever ', 'cesarangarita1998@gmail.com', 3182614507, 'Abcd', '2022-04-17 23:22:45'),
(8, 123456789, 'Yubimar ', 'cesarangarita1998@gmail.com', 3182614507, 'Mammamal', '2022-04-18 01:45:33'),
(9, 1233477, 'P&G', 'cesarangarita1998@gmail.com', 3182164507, 'Jajakksk', '2022-04-18 01:47:19'),
(10, 804007120, 'Gran abasto', 'Facturación@granabastos.co', 6761348, 'Carrera 3 no 2 - 186 zona industrial chimita giron', '2022-04-18 01:51:38'),
(11, 1152626727, 'Quala', 'jsantidistribuciones@gmail.com', 3182614507, 'Jajjaja', '2022-04-18 03:15:05'),
(12, 5471931, 'Gustavo adolfo Ibañez Solano', 'distribucioneselservidorocana@gmail.com', 3176651117, 'cra 10D 16-18', '2022-04-18 04:07:26'),
(13, 890207299, 'Ibanez castilla distribuciónes S. A', 'Ibanezcastilla@icdistribuciones.com', 6531970, 'Giron', '2022-04-18 05:35:31'),
(14, 12234484, 'Pastor julio delgado ', 'jsantidistribuciones@gmail.com', 3182614507, 'Lsllslsls', '2022-04-18 05:39:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `id` int(50) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_usuario` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `usuario`, `password`, `nombre`, `tipo_usuario`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Alejandro Suarez', 1),
(2, 'vendedor', '88d6818710e371b461efff33d271e0d2fb6ccf47', 'vendedor', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `obs` text NOT NULL COMMENT 'Observaciones',
  `metodo` varchar(30) NOT NULL COMMENT 'Metod de pago',
  `estado` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_cliente`, `total`, `id_usuario`, `fecha`, `obs`, `metodo`, `estado`) VALUES
(1, 35, '38400.00', 1, '2022-05-02 16:26:51', '', '', 'A'),
(2, 8, '51200.00', 1, '2022-05-07 18:37:24', '', '', 'A'),
(3, 8, '14166.00', 1, '2022-05-08 04:15:47', '', '', 'A'),
(4, 8, '8606.00', 2, '2022-05-07 22:36:30', '', '', 'A'),
(5, 15, '2132.00', 1, '2022-05-08 01:00:44', '', '', 'A'),
(6, 35, '17152.00', 1, '2022-05-08 01:14:40', '', '', 'A'),
(7, 25, '23507.00', 1, '2022-05-08 04:22:34', '', '', 'A'),
(8, 25, '2132.00', 1, '2022-05-08 04:23:07', '', '', 'A'),
(9, 25, '0.00', 1, '2022-05-08 04:23:10', '', '', 'A'),
(10, 25, '0.00', 1, '2022-05-08 04:23:40', '', '', 'A'),
(11, 25, '2572.00', 1, '2022-05-08 04:24:01', '', '', 'A'),
(12, 25, '0.00', 1, '2022-05-08 04:24:56', '', '', 'A'),
(13, 25, '0.00', 1, '2022-05-08 04:25:10', '', '', 'A'),
(14, 25, '0.00', 1, '2022-05-08 04:29:31', 'vvvv', '', 'A'),
(15, 25, '2572.00', 1, '2022-05-09 04:29:52', 'dada', '', 'A'),
(16, 8, '2572.00', 1, '2022-05-09 04:38:18', '', '', 'A'),
(17, 25, '2572.00', 1, '2022-05-09 04:57:26', 'Remember that you should only use ID\'s once and you can use classes over and over.', 'Contado', 'A'),
(18, 8, '48644.00', 1, '2022-05-13 02:45:41', 'conta', 'Contado', 'A'),
(19, 28, '39288.00', 1, '2022-05-13 02:48:08', 'dada', 'Contado', 'A'),
(20, 8, '64200.00', 1, '2022-05-13 03:18:40', 'ffff', 'Contado', 'A'),
(21, 8, '143781.00', 1, '2022-05-22 21:28:37', 'Pago de facturas contado', 'Contado', 'A'),
(23, 25, '986.00', 1, '2022-05-22 22:03:40', 'deee', 'Contado', 'A'),
(24, 23, '2958.00', 1, '2022-05-22 22:49:39', 'deeee', 'Contado', 'I');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`ido`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custumer_id` (`custumer_id`);

--
-- Indices de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orden_id` (`orden_id`);

--
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedor_fk_2` (`proveedor_fk`),
  ADD KEY `categoria_fk_2` (`categoria_fk`);

--
-- Indices de la tabla `tb_proveedor`
--
ALTER TABLE `tb_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `ido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT de la tabla `tb_proveedor`
--
ALTER TABLE `tb_proveedor`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`custumer_id`) REFERENCES `tb_cliente` (`id`);

--
-- Filtros para la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD CONSTRAINT `orden_articulos_ibfk_1` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
