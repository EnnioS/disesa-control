-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2019 a las 02:11:59
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `disesa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_laboral`
--

CREATE TABLE `area_laboral` (
  `idArea` int(255) NOT NULL,
  `nomArea` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area_laboral`
--

INSERT INTO `area_laboral` (`idArea`, `nomArea`) VALUES
(1, 'Ventas'),
(2, 'Administración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_laboral`
--

CREATE TABLE `cargo_laboral` (
  `idCargo` int(255) NOT NULL,
  `idArea` int(255) DEFAULT NULL,
  `nomCargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo_laboral`
--

INSERT INTO `cargo_laboral` (`idCargo`, `idArea`, `nomCargo`) VALUES
(1, 1, 'Vendedor'),
(2, 2, 'Gerente administrativo'),
(3, 1, 'Supervisor de ventas'),
(4, 1, 'Gerente de ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogopd`
--

CREATE TABLE `catalogopd` (
  `codProd` varchar(5) NOT NULL DEFAULT '' COMMENT 'Codigo del producto',
  `codProv` varchar(5) DEFAULT NULL COMMENT 'Codigo del proveedor',
  `imgProd` varchar(255) DEFAULT NULL COMMENT 'url del Producto',
  `marcaProd` varchar(255) DEFAULT NULL COMMENT 'Marca del Producto',
  `nomProd` varchar(255) DEFAULT NULL COMMENT 'Nombre el Poducto',
  `descProd` varchar(255) DEFAULT NULL COMMENT 'Descripcion del Producto',
  `envaseProd` varchar(255) DEFAULT NULL COMMENT 'Envas del Producto',
  `presentProd` varchar(255) DEFAULT NULL COMMENT 'Presentacion del Producto',
  `uMedidaProd` varchar(255) DEFAULT NULL COMMENT 'Unidad de medida del Producto'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogopd`
--

INSERT INTO `catalogopd` (`codProd`, `codProv`, `imgProd`, `marcaProd`, `nomProd`, `descProd`, `envaseProd`, `presentProd`, `uMedidaProd`) VALUES
('MP001', 'MPC01', '../assets/img/img_products/producto_01.jpg', 'MAGIK PROTECTION', 'HAIR STRAIGHTRNING TREATMENT', 'KERATINA MAGIK PROTECTION DE 32OZ', 'BOTELLA PLASTICA', '31', 'oz'),
('MP002', 'MPC01', '../assets/img/img_products/producto_0.jpg', 'MAGIK PROTECTION', 'CLARIFYING SHAMPOO PRE-TREATMENT', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 'BOTELLA PLASTICA', '16', 'oz'),
('MP003', 'MPC01', '../assets/img/img_products/producto_02.jpg', 'MAGIK PROTECTION', 'SHAMPOO', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 'BOTELLA PLASTICA', '16', 'oz'),
('MP004', 'MPC01', '../assets/img/img_products/producto_03.jpg', 'MAGIK PROTECTION', 'CONDITIONER', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 'BOTELLA PLASTICA', '16', 'oz'),
('MP005', 'MPC01', '../assets/img/img_products/producto_04.jpg', 'MAGIK PROTECTION', 'SILK TREATMENT', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 'BOTELLA PLASTICA', '8', 'oz'),
('MP006', 'MPC01', '../assets/img/img_products/producto_05.jpg', 'MAGIK PROTECTION', 'MAINTENANCE HAIR STRAIGTHNING TRAETMENT', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 'POTE PLASTICO', '15', 'oz'),
('MP007', 'MPC01', '../assets/img/img_products/producto_03.jpg', 'MAGIK PROTECTION', 'HAIR STRAIGHTRNING TREATMENT', 'KERATINA MAGIK PROTECTION DE 16OZ', 'POTE PLASTICO', '16', 'oz'),
('MP008', 'MPC01', '../assets/img/img_products/producto_06.jpg', 'MAGIK PROTECTION', 'BIOTIN AMINOXIDIL', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 'VIDRIO', '8', 'oz'),
('NA001', 'MPC01', '../assets/img/img_products/producto_07.jpg', 'NAIL AID', 'KERATIN 3 DAY GROWTH', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 'VIDRIO', '0.5', 'oz'),
('KO001', 'MPC01', '../assets/img/img_products/producto_0.jpeg', 'KERAORGANIQ', 'KIT KERAORGANIQ', 'KIT DE 4 PRODUCTOS (KERATINA Y CLARIFICANTE DE 4 OZ, SHAMPOO Y ACONDICIONADOR DE MANTENIMIENTO DE 80Z)', 'BOTELLAS PLASTICAS', '4', 'oz'),
('MP009', 'MPC01', '../assets/img/img_products/producto_01.jpeg', 'MAGIK PROTECTION', 'OLIVE OIL REPAIR AND GROWTH SHAMPOO', 'SHAMPOO DE ACEITE DE  OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 'BOTELLA PLASTICA', '16', 'oz'),
('MP010', 'MPC01', '../assets/img/img_products/producto_02.jpeg', 'MAGIK PROTECTION', 'OLIVE OIL REPAIR AND GROW CONDITIONER', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 'BOTELLA PLASTICA', '16', 'oz'),
('MK001', 'MPC01', '../assets/img/img_products/producto_08.jpg', 'MAGIK KERATIN', 'HAIR FILLER & PURIFYING SHAMPOO WITH BIOTIN', 'SHAMPOO DE LIMPIEZA PROFUNDA PARA CARGA DE COLAGENO MAGIK KERATIN SIN SULFATO CON BIOTIN 33OZ', 'BOLTELLA PLASTICA CON BOMBA', '33', 'oz'),
('MK002', 'MPC01', '../assets/img/img_products/producto_09.jpg', 'MAGIK KERATIN', 'COLLAGEN HAIR FILLER LISS WITH BIOTIN', 'CARGA DE COLAGENO ALISANTE MAGIK KERATIN CON BIOTIN 32OZ', 'ENVASE PLASTICO CON BOMBA', '32', 'oz'),
('MK003', 'MPC01', '../assets/img/img_products/producto_010.jpg', 'MAGIK KERATIN', 'COLLAGEN INFUSED HAIR FILLER MOISTURIZING RECONSTRUCTIVE MASK WITH BIOTIN', 'MASCARILLA RECONSCONSTRUCTIVA E HIDRATANTE DE RECARGA E INFUSION DE COLAGENO 32OZ', 'ENVASE PLASTICO CON BOMBA', '32', 'oz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogopersonal`
--

CREATE TABLE `catalogopersonal` (
  `idPer` varchar(5) NOT NULL,
  `urlPer` varchar(255) DEFAULT NULL,
  `nomPer` varchar(50) DEFAULT NULL,
  `apePer` varchar(50) DEFAULT NULL,
  `celPer` varchar(20) DEFAULT NULL,
  `telCasaPer` varchar(20) DEFAULT NULL,
  `emailPer` varchar(50) DEFAULT NULL,
  `sexoPer` varchar(1) DEFAULT NULL,
  `fNacPer` date DEFAULT NULL,
  `nacionalidadPer` varchar(50) DEFAULT NULL,
  `nCeduPer` varchar(16) DEFAULT NULL,
  `areaPer` varchar(50) DEFAULT NULL,
  `cargoPer` varchar(50) DEFAULT NULL,
  `depaPer` varchar(50) DEFAULT NULL,
  `ciuPer` varchar(50) DEFAULT NULL,
  `dirPer` varchar(255) DEFAULT NULL,
  `estadoPer` tinyint(1) DEFAULT NULL COMMENT 'dar de baja o de alta',
  `fechaCreado` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogopersonal`
--

INSERT INTO `catalogopersonal` (`idPer`, `urlPer`, `nomPer`, `apePer`, `celPer`, `telCasaPer`, `emailPer`, `sexoPer`, `fNacPer`, `nacionalidadPer`, `nCeduPer`, `areaPer`, `cargoPer`, `depaPer`, `ciuPer`, `dirPer`, `estadoPer`, `fechaCreado`, `fechaBaja`) VALUES
('DP001', '../assets/img/img_personal/personal_0.jpg', 'Ennio Javier', 'Sáenz Martínez', '8915-7805', '22224515', 'enniosaenz@gmail.com', 'M', '1980-04-10', 'Nicaraguense', '001-100480-0080S', 'Administración', 'Gerente administrativo', 'Managua', 'Managua', 'Tica bus 2c. arriba,  1/2c. Sur casa 1010', 1, NULL, NULL),
('DP002', '../assets/img/img_personal/personal_0.jpg', 'Francisco', 'Sequeira', '8730-1891', '', NULL, 'M', '1991-06-08', 'Nicaraguense', '0', 'Ventas', 'Vendedor', 'Managua', 'Managua', NULL, 0, NULL, NULL),
('DP003', '../assets/img/img_personal/personal_01.jpg', 'Luis Eduardo', 'Sáenz Martínez', '5704-7626', '', NULL, 'M', '1982-08-27', 'Nicaraguense', '0', 'Ventas', 'Gerente de ventas', 'Matagalpa', 'Matagalpa', NULL, 1, NULL, NULL),
('DP004', '../assets/img/img_personal/personal_0.jpg', 'RICARDO ', 'SILVA', '8745-7129', '', '', 'M', '2019-05-26', 'NICARAGUENSE', '111-111111-11111', 'Ventas', 'Supervisor de ventas', 'Managua', 'Managua', 'NO SE', 0, NULL, NULL),
('DP005', '../assets/img/vendedor.svg', 'WHINDER', 'MARTINEZ', '75302357', '', '', 'M', '1995-06-18', 'NICARAGUENSE', '000-000000-00000', 'Ventas', 'Vendedor', 'Chontales', 'Juigalpa', 'Centro médico Juigalpa1 1/2c. oeste', 1, '2019-06-18 00:00:00', NULL),
('DP006', '../assets/img/vendedor.svg', 'KEYLAND', 'ESTRADA', '5721-3369', '', '', 'M', '1992-02-18', 'NICARAGUENSE', '000-000000-00000', 'Ventas', 'Vendedor', 'Managua', 'Managua', 'Laboratorio Ramos 4c. lago casa esquina color rojo, Carretera norte Managua', 1, '2019-06-18 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoprov`
--

CREATE TABLE `catalogoprov` (
  `codProv` varchar(5) NOT NULL,
  `nomProv` varchar(50) DEFAULT NULL COMMENT 'Codigo del proveedor',
  `dirProv` varchar(255) DEFAULT NULL COMMENT 'Direccion del proveedor',
  `tel1Prov` varchar(20) DEFAULT NULL COMMENT 'Telefono 1 del proveedor',
  `tel2Prov` varchar(20) DEFAULT NULL COMMENT 'Telefono 2 del proveedor',
  `paisProv` varchar(50) DEFAULT NULL COMMENT 'Pais del proveedor',
  `estadoProv` varchar(50) DEFAULT NULL COMMENT 'Estado del proveedor',
  `ciudadProv` varchar(50) DEFAULT NULL COMMENT 'Ciudad del proveedor',
  `emailProv` varchar(50) DEFAULT NULL COMMENT 'Email del proveedor',
  `sitioWebProv` varchar(50) DEFAULT NULL COMMENT 'Sitio Web del proveedor',
  `codZipProv` varchar(10) DEFAULT NULL COMMENT 'Codigo ZIp del Proveedor',
  `imgLogoProv` varchar(100) DEFAULT NULL COMMENT 'Imagen del logo del proveedor',
  `NomContactProv` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogoprov`
--

INSERT INTO `catalogoprov` (`codProv`, `nomProv`, `dirProv`, `tel1Prov`, `tel2Prov`, `paisProv`, `estadoProv`, `ciudadProv`, `emailProv`, `sitioWebProv`, `codZipProv`, `imgLogoProv`, `NomContactProv`) VALUES
('MPC01', 'MAGIK PRODUCTS CORPORATION', '12757 NW 103RD AVE, HIALEAH GARDENS, FL', '+1 786-683-6780', '0', 'EEUU', 'FL', 'MIAMI', 'magikprotection@hotmail.com', 'www.keratinaus.com', 'FL 33018', '../assets/img/img_proveedor/proveedor_0.png', 'HERMES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_Ciudad` int(11) NOT NULL,
  `idEsRe` int(11) DEFAULT NULL,
  `id_Dept_cond` int(11) DEFAULT NULL,
  `nom_Ciudad` varchar(50) DEFAULT NULL,
  `desc_Ciudad` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_Ciudad`, `idEsRe`, `id_Dept_cond`, `nom_Ciudad`, `desc_Ciudad`) VALUES
(1, 1, 1, 'Managua', 'ciudad del departamento de Managua, Región del Pacifico'),
(2, 1, 1, 'Ciudad Sandino', 'ciudad del departamento de Managua, Región del Pacifico'),
(3, 1, 1, 'El Crucero', 'ciudad del departamento de Managua, Región del Pacifico'),
(4, 1, 1, 'Mateare', 'ciudad del departamento de Managua, Región del Pacifico'),
(5, 1, 1, 'San Francisco Libre', 'ciudad del departamento de Managua, Región del Pacifico'),
(6, 1, 1, 'San Rafael del Sur', 'ciudad del departamento de Managua, Región del Pacifico'),
(7, 1, 1, 'Tincuantepe', 'ciudad del departamento de Managua, Región del Pacifico'),
(8, 1, 1, 'Tipitapa', 'ciudad del departamento de Managua, Región del Pacifico'),
(9, 1, 2, 'Villa Carlos Fonseca', 'ciudad del departamento de Managua, Región del Pacifico'),
(10, 1, 2, 'Masaya', 'ciudad del departamento de Masaya, Región del Pacifico'),
(11, 1, 2, 'Catarina', 'ciudad del departamento de Masaya, Región del Pacifico'),
(12, 1, 2, 'La Concepción', 'ciudad del departamento de Masaya, Región del Pacifico'),
(13, 1, 2, 'Masatepe', 'ciudad del departamento de Masaya, Región del Pacifico'),
(14, 1, 2, 'Nandasmo', 'ciudad del departamento de Masaya, Región del Pacifico'),
(15, 1, 2, 'Nindirí', 'ciudad del departamento de Masaya, Región del Pacifico'),
(16, 1, 2, 'Niquinomo', 'ciudad del departamento de Masaya, Región del Pacifico'),
(17, 1, 2, 'San Juan de Oriente', 'ciudad del departamento de Masaya, Región del Pacifico'),
(18, 1, 2, 'Tisma', 'ciudad del departamento de Masaya, Región del Pacifico'),
(19, 1, 3, 'Granada', 'ciudad del departamento de Granada, Región del Pacifico'),
(20, 1, 3, 'Diriá', 'ciudad del departamento de Granada, Región del Pacifico'),
(21, 1, 3, 'Diriomo', 'ciudad del departamento de Granada, Región del Pacifico'),
(22, 1, 3, 'Nandaime', 'ciudad del departamento de Granada, Región del Pacifico'),
(23, 1, 4, 'Santa Tereza', 'ciudad del departamento de Carazo, Región del Pacifico'),
(24, 1, 4, 'Diriamba', 'ciudad del departamento de Carazo, Región del Pacifico'),
(25, 1, 4, 'El Rosario', 'ciudad del departamento de Carazo, Región del Pacifico'),
(26, 1, 4, 'La Conquista', 'ciudad del departamento de Carazo, Región del Pacifico'),
(27, 1, 4, 'San marcos', 'ciudad del departamento de Carazo, Región del Pacifico'),
(28, 1, 4, 'Dolores', 'ciudad del departamento de Carazo, Región del Pacifico'),
(29, 1, 4, 'Jinotepe', 'ciudad del departamento de Carazo, Región del Pacifico'),
(30, 1, 4, 'La Paz de Carazo', 'ciudad del departamento de Carazo, Región del Pacifico'),
(31, 1, 5, 'Rivas', 'ciudad del departamento de Rivas, Región del Pacifico'),
(32, 1, 5, 'Altagracia', 'ciudad del departamento de Rivas, Región del Pacifico'),
(33, 1, 5, 'Belén', 'ciudad del departamento de Rivas, Región del Pacifico'),
(34, 1, 5, 'Buenos Aires', 'ciudad del departamento de Rivas, Región del Pacifico'),
(35, 1, 5, 'Cardenas', 'ciudad del departamento de Rivas, Región del Pacifico'),
(36, 1, 5, 'Mayogalpa', 'ciudad del departamento de Rivas, Región del Pacifico'),
(37, 1, 5, 'Potosis', 'ciudad del departamento de Rivas, Región del Pacifico'),
(38, 1, 5, 'San Jorge', 'ciudad del departamento de Rivas, Región del Pacifico'),
(39, 1, 5, 'San Juan del Sur', 'ciudad del departamento de Rivas, Región del Pacifico'),
(40, 1, 5, 'Tola', 'ciudad del departamento de Rivas, Región del Pacifico'),
(41, 1, 6, 'Chinandega', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(42, 1, 6, 'Chichigalpa', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(43, 1, 6, 'Cinco Pinos', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(44, 1, 6, 'Corinto', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(45, 1, 6, 'El Realejo', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(46, 1, 6, 'El Viejo', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(47, 1, 6, 'Posoltega', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(48, 1, 6, 'Puerto Morazán', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(49, 1, 6, 'San Francisco del Norte', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(50, 1, 6, 'San Pedro del Norte', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(51, 1, 6, 'Santo Tomas del Norte', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(52, 1, 6, 'Somotilli', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(53, 1, 6, 'Villa Nueva', 'Ciudad del departamento de Chinandega, Región del Pacifico'),
(54, 1, 7, 'León', 'Ciudad del departamento de León, Región del Pacifico'),
(55, 1, 7, 'Achuapa', 'Ciudad del departamento de León, Región del Pacifico'),
(56, 1, 7, 'El Jicaral', 'Ciudad del departamento de León, Región del Pacifico'),
(57, 1, 7, 'El Sauce', 'Ciudad del departamento de León, Región del Pacifico'),
(58, 1, 7, 'La Paz Centro', 'Ciudad del departamento de León, Región del Pacifico'),
(59, 1, 7, 'Larreynaga', 'Ciudad del departamento de León, Región del Pacifico'),
(60, 1, 7, 'Nagarote', 'Ciudad del departamento de León, Región del Pacifico'),
(61, 1, 7, 'Quezalguaque', 'Ciudad del departamento de León, Región del Pacifico'),
(62, 1, 7, 'Santa Rosa del Peñón', 'Ciudad del departamento de León, Región del Pacifico'),
(63, 1, 7, 'Telica', 'Ciudad del departamento de León, Región del Pacifico'),
(64, 2, 8, 'Estelí', 'Ciudad del departamento de Estelí, Región Central'),
(65, 2, 8, 'Condega', 'Ciudad del departamento de Estelí, Región Central'),
(66, 2, 8, 'La Trinidad', 'Ciudad del departamento de Estelí, Región Central'),
(67, 2, 8, 'San Juan de Limay', 'Ciudad del departamento de Estelí, Región Central'),
(68, 2, 8, 'Pueblo Nuevo', 'Ciudad del departamento de Estelí, Región Central'),
(69, 2, 8, 'San Nicolas', 'Ciudad del departamento de Estelí, Región Central'),
(70, 2, 9, 'la Sabána', 'Ciudad del departamento de Madriz, Región Central'),
(71, 2, 9, 'Palacaguina', 'Ciudad del departamento de Madriz, Región Central'),
(72, 2, 9, 'San José de Cosmapa', 'Ciudad del departamento de Madriz, Región Central'),
(73, 2, 9, 'San Juan del Rio Coco', 'Ciudad del departamento de Madriz, Región Central'),
(74, 2, 9, 'San Lucas', 'Ciudad del departamento de Madriz, Región Central'),
(75, 2, 9, 'Somoto', 'Ciudad del departamento de Madriz, Región Central'),
(76, 2, 9, 'Telpaneca', 'Ciudad del departamento de Madriz, Región Central'),
(77, 2, 9, 'Totogalpa', 'Ciudad del departamento de Madriz, Región Central'),
(78, 2, 9, 'Yalaguina', 'Ciudad del departamento de Madriz, Región Central'),
(79, 2, 10, 'Ciudad Antigua', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(80, 2, 10, 'Dipilto', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(81, 2, 10, 'El Jicaro', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(82, 2, 10, 'Jalapa', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(83, 2, 10, 'Macuelizo', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(84, 2, 10, 'Mozonte', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(85, 2, 10, 'Murra', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(86, 2, 10, 'Ocotal', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(87, 2, 10, 'Quilali', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(88, 2, 10, 'San Fernando', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(89, 2, 10, 'Santa maria', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(90, 2, 10, 'Wiwilí de Nueva Segovia', 'Ciudad del departamento de Nueva Segovia, Región Central'),
(91, 2, 11, 'Jinotega', 'Ciudad del departamento de Jinotega, Región Central'),
(92, 2, 11, 'El Cuá', 'Ciudad del departamento de Jinotega, Región Central'),
(93, 2, 11, 'La Concordia', 'Ciudad del departamento de Jinotega, Región Central'),
(94, 2, 11, 'San Rafael del Norte', 'Ciudad del departamento de Jinotega, Región Central'),
(95, 2, 11, 'Santa María de Pantasma', 'Ciudad del departamento de Jinotega, Región Central'),
(96, 2, 11, 'San José Bocay', 'Ciudad del departamento de Jinotega, Región Central'),
(97, 2, 11, 'Wiwilí', 'Ciudad del departamento de Jinotega, Región Central'),
(98, 2, 11, 'San Sebastian de Yalí', 'Ciudad del departamento de Jinotega, Región Central'),
(99, 2, 12, 'Matagalpa', 'Ciudad del departamento de Matagalpa, Región Central'),
(100, 2, 12, 'Ciudad Darío', 'Ciudad del departamento de Matagalpa, Región Central'),
(101, 2, 12, 'El Tuma La Dalia', 'Ciudad del departamento de Matagalpa, Región Central'),
(102, 2, 12, 'Esquipulas', 'Ciudad del departamento de Matagalpa, Región Central'),
(103, 2, 12, 'Matiguas', 'Ciudad del departamento de Matagalpa, Región Central'),
(104, 2, 12, 'Muy Muy', 'Ciudad del departamento de Matagalpa, Región Central'),
(105, 2, 12, 'Rancho Grande', 'Ciudad del departamento de Matagalpa, Región Central'),
(106, 2, 12, 'Rio Blanco', 'Ciudad del departamento de Matagalpa, Región Central'),
(107, 2, 12, 'San Dionisio', 'Ciudad del departamento de Matagalpa, Región Central'),
(108, 2, 12, 'San Isidro', 'Ciudad del departamento de Matagalpa, Región Central'),
(109, 2, 12, 'San Ramón', 'Ciudad del departamento de Matagalpa, Región Central'),
(110, 2, 12, 'Sébaco', 'Ciudad del departamento de Matagalpa, Región Central'),
(111, 2, 12, 'Terrabona', 'Ciudad del departamento de Matagalpa, Región Central'),
(112, 2, 13, 'Boaco', 'Ciudad del departamento de Boaco, Región Central'),
(113, 2, 13, 'San José de los Remates', 'Ciudad del departamento de Boaco, Región Central'),
(114, 2, 13, 'Santa Lucía', 'Ciudad del departamento de Boaco, Región Central'),
(115, 2, 13, 'Camoapa', 'Ciudad del departamento de Boaco, Región Central'),
(116, 2, 13, 'San Lorenzo', 'Ciudad del departamento de Boaco, Región Central'),
(117, 2, 13, 'Teustepe', 'Ciudad del departamento de Boaco, Región Central'),
(118, 2, 14, 'Acoyapa', 'Ciudad del departamento de Chontales, Región Central'),
(119, 2, 14, 'Comalapa', 'Ciudad del departamento de Chontales, Región Central'),
(120, 2, 14, 'El Coral', 'Ciudad del departamento de Chontales, Región Central'),
(121, 2, 14, 'Juigalpa', 'Ciudad del departamento de Chontales, Región Central'),
(122, 2, 14, 'La Libertad', 'Ciudad del departamento de Chontales, Región Central'),
(123, 2, 14, 'San Francisco Cuapa', 'Ciudad del departamento de Chontales, Región Central'),
(124, 2, 14, 'San Pedro de Lóvago', 'Ciudad del departamento de Chontales, Región Central'),
(125, 2, 14, 'Santo Domingo', 'Ciudad del departamento de Chontales, Región Central'),
(126, 2, 14, 'Santo Tomas', 'Ciudad del departamento de Chontales, Región Central'),
(127, 2, 14, 'Villa Sandino', 'Ciudad del departamento de Chontales, Región Central'),
(128, 2, 15, 'El Almendro', 'Ciudad del departamento de Rio San Juan, Región Central'),
(129, 2, 15, 'El Castillo', 'Ciudad del departamento de Rio San Juan, Región Central'),
(130, 2, 15, 'Morrito', 'Ciudad del departamento de Rio San Juan, Región Central'),
(131, 2, 15, 'San Carlos', 'Ciudad del departamento de Rio San Juan, Región Central'),
(132, 2, 15, 'San Miguelito', 'Ciudad del departamento de Rio San Juan, Región Central'),
(133, 2, 15, 'San Juan del Norte', 'Ciudad del departamento de Rio San Juan, Región Central'),
(134, 3, 16, 'Bonanza', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(135, 3, 16, 'Prinzapolka', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(136, 3, 16, 'Rosita', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(137, 3, 16, 'Waslala', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(138, 3, 16, 'Mulukuku', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(139, 3, 16, 'Puerto Cabezas', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(140, 3, 16, 'Siuna', 'Ciudad del departamento del Atlantico Norte, Región Autonoma'),
(141, 3, 16, 'Waspan', 'Ciudad del departamento del Atlantico Norte, Región Autonoma de Nicaragua'),
(142, 3, 17, 'Blue Field', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(143, 3, 17, 'Corn Island', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(144, 3, 17, 'Desembocadura de Rio Grande', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(145, 3, 17, 'El Ayote', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(146, 3, 17, 'El Tortuguero', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(147, 3, 17, ' Kukra Hill', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(148, 3, 17, 'Laguna de Perla', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(149, 3, 17, 'La Cruz de Rio Grande', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(150, 3, 17, 'Muelle de los Bueyes', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(151, 3, 17, 'Nueva Guinea', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(152, 3, 17, 'Paiwas', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua'),
(153, 3, 17, 'Rama', 'Ciudad del departamento del Atlantico Sur, Región Autonoma de Nicaragua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClte` varchar(5) NOT NULL,
  `urlFotoClte` varchar(255) DEFAULT NULL,
  `idZona` varchar(5) DEFAULT NULL,
  `nomClte` varchar(50) DEFAULT NULL,
  `apeClte` varchar(50) DEFAULT NULL,
  `cedulaClte` varchar(16) DEFAULT NULL,
  `emailClte` varchar(255) DEFAULT NULL,
  `clasClte` varchar(1) DEFAULT NULL,
  `sexoClte` varchar(1) DEFAULT NULL,
  `celClte` varchar(20) DEFAULT NULL,
  `telClte` varchar(20) DEFAULT NULL,
  `ciudadClte` varchar(255) DEFAULT NULL,
  `dirClte` varchar(255) DEFAULT NULL,
  `urlFotoLocal` varchar(255) DEFAULT NULL,
  `nomLocalClte` varchar(100) DEFAULT NULL,
  `telLocalClte` varchar(20) DEFAULT NULL,
  `dirLocalClte` varchar(100) DEFAULT NULL,
  `depaLocalClte` varchar(50) DEFAULT NULL,
  `ciudadLocalClte` varchar(50) DEFAULT NULL,
  `tipoLocalClte` varchar(50) DEFAULT NULL,
  `fechaRegCreado` datetime DEFAULT '0000-00-00 00:00:00',
  `idUserCreaReg` varchar(11) DEFAULT NULL,
  `clteActivo` varchar(4) NOT NULL DEFAULT 'Alta'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClte`, `urlFotoClte`, `idZona`, `nomClte`, `apeClte`, `cedulaClte`, `emailClte`, `clasClte`, `sexoClte`, `celClte`, `telClte`, `ciudadClte`, `dirClte`, `urlFotoLocal`, `nomLocalClte`, `telLocalClte`, `dirLocalClte`, `depaLocalClte`, `ciudadLocalClte`, `tipoLocalClte`, `fechaRegCreado`, `idUserCreaReg`, `clteActivo`) VALUES
('MT014', '../assets/img/specialist-user.svg', 'ZNT01', 'ADRIANA C.', 'MEJIA CRUZ', '441-231198-1002X', '', 'B', 'F', '8885-6739', '', 'Matagalpa', 'ALCALDIA MATAGALPA 1/2C. ESTE MANO DERECHA', '../assets/img/store.svg', 'SB ADRIANA', '', 'ALCALDIA MATAGALPA 1/2C. ESTE MANO DERECHA', 'Matagalpa', 'Matagalpa', 'SB', '2019-07-08 06:07:04', 'admin', 'Alta'),
('MT015', '../assets/img/specialist-user.svg', 'ZNT01', 'CHINTIA VALERIA', 'JUAREZ', '441-070491-0013F', '', 'B', 'F', '8647-1807', '', 'Matagalpa', 'FRENTE A AIRPACK , CALLE DE LOS BANCOS', '../assets/img/store.svg', 'VALERIA SALON', '', 'FRENTE A AIRPACK , CALLE DE LOS BANCOS', 'Matagalpa', 'Matagalpa', 'SB', '2019-07-21 18:07:33', 'admin', 'Alta'),
('NG003', '../assets/img/specialist-user.svg', 'ZCR01', 'KEYLIN ROMANA', 'MORALES ESPINOZA', '000-000000-0000A', '', 'B', 'F', '8855-7609', '', 'Nueva Guinea', 'FARMACIA SAN JOSE 1/2C. ESTE', '../assets/img/store.svg', 'KEYLIN SALON', '22222222', 'FARMACIA SAN JOSE 1/2C. ESTE', 'Caribe Sur', 'Nueva Guinea', 'SB', '2019-07-08 01:07:56', 'admin', 'Alta'),
('NG002', '../assets/img/specialist-user.svg', 'ZCR01', 'NORA DEL CARMEN', 'DAVILA SALGADO', '616-311078-0001X', '', 'B', 'F', '88888888', '', 'Nueva Guinea', 'DEL ROTULO 1C. NORTE, 1/2C. OESTE, CASA DE 2 PISOS', '../assets/img/store.svg', 'NORA SALON', '22222222', 'DEL ROTULO 1C. NORTE, 1/2C. OESTE, CASA DE 2 PISOS', 'Caribe Sur', 'Nueva Guinea', 'SB', '2019-07-08 01:07:27', 'admin', 'Alta'),
('NG001', '../assets/img/specialist-user.svg', 'ZCS01', 'LESTER JUNIOR ', 'RUIZ', '000-000000-0000A', '', 'B', 'M', '22222222', '', 'Nueva Guinea', 'MERCADO NUEVA GUINA - DONDE FUE SALON MONICA N.', '../assets/img/store.svg', 'LESTHER SALON', '22222222', 'MERCADO NUEVA GUINA - DONDE FUE SALON MONICA N.', 'Caribe Norte', 'Nueva Guinea', 'SB', '2019-07-08 01:07:41', 'admin', 'Alta'),
('CD002', '../assets/img/specialist-user.svg', 'ZMA03', 'ANA', 'AMAYA', '000-000000-00000', '', 'A', 'F', '8484-8771', '', 'Managua', 'VALLE DE SANDIO CARRETERA NUEVA A LEON', '../assets/img/store.svg', 'ANA AMAYA', '', 'VALLE DE SANDIO CARRETERA NUEVA A LEON', 'Managua', 'Managua', 'CD', '2019-06-18 18:06:29', 'admin', 'Alta'),
('MG006', '../assets/img/specialist-user.svg', 'ZMA02', 'ZULMA MANAGUA', 'NO DATA', '000-000000-00000', '', 'A', 'F', '8601-2123', '', 'Managua', ' RESIDENCIAL LOMAS DEL VALLE', '../assets/img/store.svg', 'ZULMA´S SALON', '2252-9274', ' RESIDENCIAL LOMAS DEL VALLE', 'Managua', 'Managua', 'SB', '2019-06-18 19:06:27', 'admin', 'Alta'),
('CE004', '../assets/img/specialist-user.svg', 'ZNT01', 'JADE MARCELLE', 'MARQUEZ LARIOS', '000-000000-00000', '', 'A', 'F', '5714-4477', '', 'Matagalpa', 'GUANUCA', '../assets/img/store.svg', 'JADE MARQUEZ', '', 'GUANUCA', 'Matagalpa', 'Matagalpa', 'CE', '2019-06-18 18:06:30', 'admin', 'Alta'),
('CE003', '../assets/img/specialist-user.svg', 'ZMA02', 'LUCIA', 'MIRANDA', '000-000000-00000', '', 'B', 'F', '8886-6847', '', 'Managua', 'NO DATA', '../assets/img/store.svg', 'LUCIA MIRANDA', '', 'NO DATA', 'Managua', 'Managua', 'CE', '2019-06-18 18:06:54', 'admin', 'Alta'),
('CD001', '../assets/img/specialist-user.svg', 'ZMA02', 'REYNA', 'NO DATA', '000-000000-00000', '', 'B', 'F', '0000-0000', '', 'Managua', 'NO DATA', '../assets/img/store.svg', 'REYNA', '', 'NO DATA', 'Managua', 'Managua', 'CD', '2019-06-18 18:06:56', 'admin', 'Alta'),
('CH002', '../assets/img/specialist-user.svg', 'ZCS01', 'JHOSSELINE DAYANIS', 'BALLADAREZ', '121-150688-0001Y', '', 'B', 'F', '8827-0219', '', 'San Pedro de Lóvago', 'CLUB SOCIAL 1C. SUR, 1C. OESTE', '../assets/img/store.svg', 'JOSSELINE SALON', '', 'CLUB SOCIAL 1C. SUR, 1C. OESTE', 'Chontales', 'San Pedro de Lóvago', 'SB', '2019-06-18 01:06:51', 'admin', 'Alta'),
('MY005', '../assets/img/specialist-user.svg', 'ZSO01', 'FANNY', 'CRUZ', '000-000000-00000', '', 'B', 'F', '8884-1231', '', 'Granada', 'FRENTE A TROPIKONG GRANADA', '../assets/img/store.svg', 'KIUTY´S BEAUTY SUPPLY', '', 'MERCADO VIEJO MASAYA', 'Masaya', 'Masaya', 'BS', '2019-06-18 01:06:38', 'admin', 'Alta'),
('MT013', '../assets/img/specialist-user.svg', 'ZNT01', 'HEIDY', 'SÁENZ M.', '000-000000-00000', '', 'B', 'F', '0000-0000', '', 'Matagalpa', 'NO DATA', '../assets/img/store.svg', 'ALICE´S SALON', '', 'NO DATA', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-18 01:06:57', 'admin', 'Alta'),
('MT011', '../assets/img/specialist-user.svg', 'ZNT01', 'ENMA', 'BLANDON CASTRO', '000-000000-00000', '', 'B', 'F', '0000-0000', '', 'Matagalpa', 'NO DATA', '../assets/img/store.svg', 'SALA DE BELLEZA ENMA', '0000-0000', 'NO DATA', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 23:06:15', 'admin', 'Alta'),
('MT012', '../assets/img/specialist-user.svg', 'ZNT01', 'PATRICIA', 'LAGUNA', '000-000000-00000', '', 'B', 'F', '0000-0000', '', 'San Isidro', 'NO DATA', '../assets/img/store.svg', 'SALA DE BELLEZA PATRICIA', '', 'NO DATA', 'Matagalpa', 'San Isidro', 'SB', '2019-06-17 23:06:07', 'admin', 'Alta'),
('MT010', '../assets/img/specialist-user.svg', 'ZNT01', 'JORGE', 'NAVAS ZELEDÓN', '000-000000-00000', '', 'B', 'M', '0000-0000', '', 'Matagalpa', 'NO DATA', '../assets/img/store.svg', 'JORGE SALON', '', 'NO DATA', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 23:06:04', 'admin', 'Alta'),
('MY004', '../assets/img/specialist-user.svg', 'ZSO01', 'NORMA', 'FLORES', '000-000000-00000', '', 'A', 'M', '8252-8751', '', 'Masaya', 'SEMÁFOROS DE LA POLICIA NACIONAL 1/2 AL OESTE, COSTADO NORTE ESCUELA HUMBERTO ALVARADO ', '../assets/img/store.svg', 'COQUETA BEAUTY SUPPLY', '2522-0090', 'SEMÁFOROS DE LA POLICIA NACIONAL 1/2 AL OESTE, COSTADO NORTE ESCUELA HUMBERTO ALVARADO ', 'Masaya', 'Masaya', 'BS', '2019-06-17 22:06:03', 'admin', 'Alta'),
('RV007', '../assets/img/specialist-user.svg', 'ZSO01', 'ANNA YANCI', 'AVELLAN', '000-000000-00000', '', 'B', 'F', '87134275', '', 'Rivas', 'EL GIMNASIO HUMBERTO MENDEZ 50 VRS AL NORTE', '../assets/img/store.svg', 'SALON HERMANAS AVELLAN', '', 'EL GIMNASIO HUMBERTO MENDEZ 50 VRS AL NORTE', 'Rivas', 'Rivas', 'SB', '2019-06-17 22:06:35', 'admin', 'Alta'),
('MT006', '../assets/img/specialist-user.svg', 'ZNT01', 'Angela', 'Altamirano', 'cedula', 'email', 'B', 'F', '111111', NULL, 'Matagalpa', 'direccion', '../assets/img/store.svg', 'Angelas Nails', '22223323', 'Direccion local', 'Matagalpa', 'Sebaco', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT004', '../assets/img/specialist-user.svg', 'ZNT01', 'Ana', 'Gutierrez', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Ana Salon', NULL, '', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT005', '../assets/img/specialist-user.svg', 'ZNT01', 'Orfa', 'Castillo', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Orfa Salon', NULL, '', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT003', '../assets/img/specialist-user.svg', 'ZNT01', 'Evelia', 'Baldizon', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Evelia Salon', NULL, '', 'Matagalpa', 'Sebaco', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MG001', '../assets/img/specialist-user.svg', 'ZMG01', 'Sheila', 'Balladares', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Alena´s Salon', NULL, '', 'Managu', 'Managua', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT001', '../assets/img/specialist-user.svg', 'ZNT01', 'Jahaira', 'Sotelo', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Jahaira Salon', NULL, '', 'Matagalpa', 'Sebaco', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT002', '../assets/img/specialist-user.svg', 'ZNT01', 'Emilse', '', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Emilse Salon', NULL, '', 'Matagalpa', 'San Isidro', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('ES001', '../assets/img/specialist-user.svg', 'ZNT01', 'Ana', 'Navarro', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Anita', NULL, '', 'Esteli', 'Esteli', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('ES002', '../assets/img/specialist-user.svg', 'ZNT01', 'Guadalupe', '', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Mujer Bonita', NULL, '', 'Esteli', 'Esteli', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('GR001', '../assets/img/specialist-user.svg', 'ZSO01', 'Zulma', 'Perez', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Zulma Salon', NULL, '', 'Granada', 'Diriomo', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('RV003', '../assets/img/specialist-user.svg', 'ZSO01', 'Mirlen', 'Suarez', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Mirlen', NULL, '', 'Rivas', 'Rivas', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('RV004', '../assets/img/specialist-user.svg', 'ZSO01', 'Karla', 'Jimenez', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Vanesa', NULL, '', 'Rivas', 'Rivas', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('RV005', '../assets/img/specialist-user.svg', 'ZSO01', 'Josefa', 'Pereira', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Chepita', NULL, '', 'Rivas', 'San Jorge', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('RV002', '../assets/img/specialist-user.svg', 'ZSO01', 'Gladys', 'Rosales', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Angeles', NULL, '', 'Rivas', 'Rivas', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MY002', '../assets/img/specialist-user.svg', 'ZSO01', 'Marbelly', ' Cano', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Marbella salon', NULL, '', 'Masaya', 'Masaya', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MY003', '../assets/img/specialist-user.svg', 'ZSO01', 'Karen', 'Sanchez', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza KASAN', NULL, '', 'Masaya', 'Masaya', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('ES004', '../assets/img/specialist-user.svg', 'ZNT01', 'JULIO ALEXANDER', 'MARQUEZ GARCIA', '', '', 'A', 'M', NULL, NULL, '', '', '../assets/img/store.svg', 'El Salon peluqueria Unisex', NULL, '', 'Esteli', 'Esteli', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('ES003', '../assets/img/specialist-user.svg', 'ZNT01', 'Magdalena', 'Casatro', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Linda Maria', NULL, '', 'Esteli', 'Esteli', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('BO001', '../assets/img/specialist-user.svg', 'ZCS01', 'Gema de los Andes', 'Arias Picado', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Jazmin', NULL, '', 'Boaco', 'Boaco', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('RV001', '../assets/img/specialist-user.svg', 'ZSO01', 'Belky', 'Zapata', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Estetica siempre Jolie', NULL, '', 'Rivas', 'Rivas', 'SB', '2019-06-17 00:00:00', '0admin', 'Alta'),
('MY001', '../assets/img/specialist-user.svg', 'ZSO01', 'Yovanna', 'Mendoza', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Yovanna salon', NULL, '', 'Masaya', 'Masaya', 'SB', '2019-06-17 00:00:00', '0admin', 'Alta'),
('CE002', '../assets/img/specialist-user.svg', 'ZOC01', 'Hermana Francisco', '', '', '', 'E', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Cliente especial', NULL, '', 'Leon', 'Leon', 'ESPECIAL', '2019-06-17 00:00:00', 'admin', 'Alta'),
('CE001', '../assets/img/specialist-user.svg', 'ZMG02', 'Fabiola', 'De Hector', 'Cedula no me la ', 'email@email.com', 'E', 'F', '45678900', NULL, 'Ciudad', 'Donde no hay quesp', '../assets/img/store.svg', 'Cliente Especial', '12222333', 'de don de si hay queso', 'E', 'E', 'ESPECIAL', '2019-06-17 00:00:00', 'admin', 'Baja'),
('MT007', '../assets/img/specialist-user.svg', 'ZNT01', 'JORGE EZEQUIEL', 'PORTOBLANCO', '', '', 'A', 'M', NULL, NULL, '', '', '../assets/img/store.svg', 'Jorge Salon', NULL, '', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 00:00:00', '0admin', 'Alta'),
('MT008', '../assets/img/specialist-user.svg', 'ZNT01', 'Rachel', 'Arauz', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Sala de Belleza Marshell', NULL, '', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT009', '../assets/img/specialist-user.svg', 'ZNT01', 'Mariselda', '', '', '', 'A', 'F', NULL, NULL, '', '', '../assets/img/store.svg', 'Mariselda Salon', NULL, '', 'Matagalpa', 'Matagalpa', 'SB', '2019-06-17 00:00:00', '0admin', 'Alta'),
('JI001', '../assets/img/specialist-user.svg', 'ZNT01', 'SILVIA ELENA', 'GONZALEZ', '000-000000-00000', '', 'D', 'F', '84480010', '', 'El Cuá', 'DEL JUZGADO LOCAL 25 VRS. AL SUR - EL CUÁ BOCAY JINOTEGA', '../assets/img/store.svg', 'SILVIA SALON', '', 'DEL JUZGADO LOCAL 25 VRS. AL SUR - EL CUÁ BOCAY JINOTEGA', 'Jinotega', 'El Cuá', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MG002', '../assets/img/specialist-user.svg', 'ZMA03', 'XOCHILT', 'JUAREZ', '001-220580-0062F', '', 'D', 'F', '8994-5606', '', 'Managua', 'CARRETERA NUEVA A LEÓN, BARRIO MOSTATEPE CONTIGUO AL PUENTE', '../assets/img/store.svg', 'SALA DE BELLEZA Y BARBERIA EN CRISTO CONFIAMOS', '', 'CARRETERA NUEVA A LEÓN, BARRIO MOSTATEPE CONTIGUO AL PUENTE', 'Managua', 'Managua', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MG003', '../assets/img/specialist-user.svg', 'ZMA01', 'ADRIANA', 'MEJIA', '000-000000-00000', '', 'D', 'F', '0000000', '', 'Managua', 'IGLESIA  1RO DE MAYO 2C. SUR', '../assets/img/store.svg', 'ADRIANA SALON', '', 'IGLESIA  1RO DE MAYO 2C. SUR', 'Managua', 'Managua', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MG004', '../assets/img/specialist-user.svg', 'ZMA01', 'ANA', 'HERNANDEZ', '000-000000-00000', '', 'B', 'F', '76608360', '', 'Managua', 'VILLA LIBERTAD', '../assets/img/store.svg', 'ANA SALON', '', 'VILLA LIBERTAD', 'Managua', 'Managua', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('CH001', '../assets/img/specialist-user.svg', 'ZCS01', 'YADER JOSÉ', 'RUÍZ BONILLA', '121-220789-0004T', '', 'B', 'M', '88250993', '', 'Juigalpa', 'BANPRO 1C. SUR, 1/2C. AL OESTE', '../assets/img/store.svg', 'YADER SALON', '', 'BANPRO 1C. SUR, 1/2C. AL OESTE', 'Chontales', 'Juigalpa', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('RV006', '../assets/img/specialist-user.svg', 'ZSO01', 'NINOSKA', 'TORRENTE', '000-000000-00000', '', 'B', 'F', '00000000', '', 'Rivas', 'NO DATA', '../assets/img/store.svg', 'PIUBELLA SALON', '', 'NO DATA', 'Rivas', 'Rivas', 'SB', '2019-06-17 22:06:01', 'admin', 'Alta'),
('MG005', '../assets/img/specialist-user.svg', 'ZMA01', 'KARLA', 'ARTOLA', '000-000000-00000', NULL, 'B', 'F', '00000000', NULL, 'Managua', 'NO DATO', '../assets/img/store.svg', 'KARLA SALON', NULL, 'NO DATO', 'Managua', 'Managua', 'SB', '2019-06-17 00:00:00', 'admin', 'Alta'),
('MT016', '../assets/img/specialist-user.svg', 'ZNT01', 'ELIZABETH', 'LOPEZ MONTOYA', '446-270364-0000M', '', 'B', 'F', '1111-1111', '', 'Matagalpa', 'FRENTE COSTADO NORTE CANCHA BRIGADISTA', '../assets/img/store.svg', 'ACADEMIA DE BELLEZA Y SALON MASSIEL', '2222-2222', 'FRENTE COSTADO NORTE CANCHA BRIGADISTA', 'Matagalpa', 'Matagalpa', 'SB', '2019-07-21 19:07:49', 'admin', 'Alta'),
('MY006', '../assets/img/specialist-user.svg', 'ZSO01', 'WENDY', 'MANZANAREZ', '000-000000-00000', '', 'B', 'F', '8288-9888', '', 'Masaya', 'POLICIA NACIONAL DE MASAYA 1C. ESTE', '../assets/img/store.svg', 'WEN SALON', '1111-1111', 'POLICIA NACIONAL DE MASAYA 1C. ESTE', 'Masaya', 'Masaya', 'SB', '2019-07-21 19:07:03', 'admin', 'Alta'),
('MT017', '../assets/img/specialist-user.svg', 'ZNT01', 'WILGEN', 'LARIOS GARCIA', '000-000000-00000', '', 'A', 'M', '8237-8150', '', 'Matagalpa', 'CALLE CENTRAL DE LOS BANCOS, DEL SILAIS 75VRS AL SUR M10', '../assets/img/store.svg', 'BARBER 24 DC', '0000-0000', 'CALLE CENTRAL DE LOS BANCOS, DEL SILAIS 75VRS AL SUR M10', 'Matagalpa', 'Matagalpa', 'SB', '2019-07-21 20:07:46', 'admin', 'Alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactosprov`
--

CREATE TABLE `contactosprov` (
  `idcontProv` int(11) NOT NULL,
  `codProv` varchar(5) NOT NULL,
  `NombreContProv` varchar(50) NOT NULL,
  `apellidoContProv` varchar(50) NOT NULL,
  `sexoContProv` varchar(1) NOT NULL,
  `ciudadContProv` varchar(50) NOT NULL,
  `celContProv` int(11) NOT NULL,
  `telContProv` int(11) NOT NULL,
  `extTelContProv` int(11) NOT NULL,
  `areaContProv` varchar(50) NOT NULL,
  `cargoContProv` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxc`
--

CREATE TABLE `cxc` (
  `IdCxc` int(11) NOT NULL,
  `idFactCxc` varchar(5) NOT NULL,
  `idReciboCxc` varchar(5) NOT NULL,
  `totalFactCxc` decimal(10,0) NOT NULL,
  `totalAbonosCxc` decimal(10,0) NOT NULL,
  `valorRecibidoCxc` decimal(10,0) NOT NULL,
  `nuevoSaldoCxc` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depar_cond`
--

CREATE TABLE `depar_cond` (
  `id_Dept_cond` int(11) NOT NULL,
  `idEsRe` int(11) NOT NULL,
  `nom_Dept_cond` varchar(20) NOT NULL,
  `Desc_Dept_cond` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `depar_cond`
--

INSERT INTO `depar_cond` (`id_Dept_cond`, `idEsRe`, `nom_Dept_cond`, `Desc_Dept_cond`) VALUES
(1, 1, 'Managua', 'Capital de Nicaragua - Cabezera departamental'),
(2, 1, 'Masaya', 'Cabezera departamental'),
(3, 1, 'Granada', 'Cabezera departamental'),
(4, 1, 'Carazo', 'Cabezera departamental'),
(5, 1, 'Rivas', 'Cabezera departamental'),
(6, 1, 'Chinandega', 'Cabezera departamental'),
(7, 1, 'León', 'Cabezera departamental'),
(8, 2, 'Estelí', 'Cabezera departamental'),
(9, 2, 'Madriz', 'Cabezera departamental'),
(10, 2, 'Nueva Segovia', 'Cabezera departamental'),
(11, 2, 'Jinotega', 'Cabezera departamental'),
(12, 2, 'Matagalpa', 'Cabezera departamental'),
(13, 2, 'Boaco', 'Cabezera departamental'),
(14, 2, 'Chontales', 'Cabezera departamental'),
(15, 2, 'Rio San Juan', 'Cabezera departamental'),
(16, 3, 'Caribe Norte', 'Cabezera departamental'),
(17, 3, 'Caribe Sur', 'Cabezera departamental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `idDetalleFact` int(11) NOT NULL,
  `idFact` varchar(5) DEFAULT NULL,
  `idProd` varchar(5) DEFAULT NULL,
  `descripDetFact` varchar(100) DEFAULT NULL,
  `cantidadDetFact` int(11) DEFAULT NULL,
  `bonifDetFact` int(11) DEFAULT NULL,
  `pUnitarioDetFact` decimal(10,2) DEFAULT NULL,
  `totalDetFact` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`idDetalleFact`, `idFact`, `idProd`, `descripDetFact`, `cantidadDetFact`, `bonifDetFact`, `pUnitarioDetFact`, `totalDetFact`) VALUES
(1, '0064', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(2, '0064', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(3, '0064', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(4, '0064', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(5, '0064', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(6, '0064', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(7, '0151', 'MP007', 'KERATINA MAGIK PROTECTION DE 16OZ', 1, 0, '62.00', '62.00'),
(14, '0078', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(15, '0004', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(16, '0004', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(17, '0004', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(18, '0004', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(19, '0004', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(20, '0004', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(21, '0006', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(22, '0006', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(23, '0006', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(24, '0006', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(25, '0006', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(26, '0006', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(27, '0023', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 6, 0, '18.00', '108.00'),
(28, '0025', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(29, '0025', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(30, '0025', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(31, '0025', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(32, '0025', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(33, '0025', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(34, '0105', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(35, '0105', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(36, '0105', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(37, '0105', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(38, '0105', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(39, '0105', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(40, '0001', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(41, '0001', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(42, '0001', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(43, '0001', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(44, '0001', 'MP004', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(45, '0001', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(46, '0002', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 2, 0, '180.00', '360.00'),
(47, '0002', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 2, 0, '9.00', '18.00'),
(48, '0002', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 2, 0, '9.00', '18.00'),
(49, '0002', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 2, 0, '9.00', '18.00'),
(50, '0002', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 2, 0, '20.00', '40.00'),
(51, '0002', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 2, 0, '23.00', '46.00'),
(52, '0003', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(53, '0003', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(54, '0003', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(55, '0003', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(56, '0003', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(57, '0003', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(58, '0005', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(59, '0005', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(60, '0005', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(61, '0005', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(62, '0005', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(63, '0005', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(64, '0007', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(65, '0007', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(66, '0007', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(67, '0007', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(68, '0007', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(69, '0007', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(70, '0008', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(71, '0008', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(72, '0008', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(73, '0008', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(74, '0008', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(75, '0008', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(76, '0015', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(77, '0015', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(78, '0015', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(79, '0015', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(80, '0015', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(81, '0015', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(82, '0017', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(83, '0017', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(84, '0017', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(85, '0017', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(86, '0017', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(87, '0017', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(88, '0018', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(89, '0018', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(90, '0018', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(91, '0018', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(92, '0018', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(93, '0018', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(94, '0019', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(95, '0019', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(96, '0019', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(97, '0019', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(98, '0019', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(99, '0019', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(100, '0020', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(101, '0020', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(102, '0020', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(103, '0020', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(104, '0020', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(105, '0020', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(106, '0021', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 12, 0, '4.50', '54.00'),
(107, '0022', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(108, '0022', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(109, '0022', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(110, '0022', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(111, '0022', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(112, '0022', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(113, '0024', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(114, '0026', 'KO001', 'KIT DE 4 PRODUCTOS (KERATINA Y CLARIFICANTE DE 4 OZ, SHAMPOO Y ACONDICIONADOR DE MANTENIMIENTO DE 80', 6, 0, '35.00', '210.00'),
(115, '0051', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(116, '0052', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(117, '0052', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(118, '0052', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(119, '0052', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(120, '0052', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(121, '0052', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(122, '0053', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 3, 0, '18.00', '54.00'),
(123, '0054', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 2, 0, '18.00', '36.00'),
(124, '0054', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(125, '0055', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(126, '0056', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 2, 0, '18.00', '36.00'),
(127, '0057', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(128, '0058', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(129, '0059', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(130, '0059', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(131, '0059', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(132, '0059', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(133, '0059', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(134, '0059', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(135, '0060', 'KO001', 'KIT DE 4 PRODUCTOS (KERATINA Y CLARIFICANTE DE 4 OZ, SHAMPOO Y ACONDICIONADOR DE MANTENIMIENTO DE 80', 1, 0, '30.00', '30.00'),
(136, '0060', 'MP009', 'SHAMPOO DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 24, 0, '1.80', '43.20'),
(137, '0060', 'MP010', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 24, 0, '1.80', '43.20'),
(138, '0060', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 6, 0, '4.50', '27.00'),
(139, '0062', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 3, 0, '18.00', '54.00'),
(140, '0063', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(141, '0063', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(142, '0063', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(143, '0063', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(144, '0063', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(145, '0063', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(146, '0065', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 3, 0, '4.50', '13.50'),
(147, '0067', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(148, '0067', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(149, '0067', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(150, '0067', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(151, '0067', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(152, '0067', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(153, '0069', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 3, 0, '4.50', '13.50'),
(154, '0070', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 1, 0, '18.00', '18.00'),
(156, '0104', 'KO001', 'KIT DE 4 PRODUCTOS (KERATINA Y CLARIFICANTE DE 4 OZ, SHAMPOO Y ACONDICIONADOR DE MANTENIMIENTO DE 80', 9, 0, '28.00', '252.00'),
(157, '0104', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '120.00', '120.00'),
(158, '0104', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(159, '0104', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(160, '0104', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(161, '0104', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '24.00', '24.00'),
(162, '0104', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '29.00', '29.00'),
(163, '0104', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 24, 0, '3.60', '86.40'),
(164, '0102', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 8, 0, '4.50', '36.00'),
(165, '0066', 'MK001', 'SHAMPOO DE LIMPIEZA PROFUNDA PARA CARGA DE COLAGENO MAGIK KERATIN SIN SULFATO CON BIOTIN 33OZ', 1, 0, '55.00', '55.00'),
(166, '0066', 'MK002', 'CARGA DE COLAGENO ALISANTE MAGIK KERATIN CON BIOTIN 32OZ', 1, 0, '152.00', '152.00'),
(167, '0066', 'MK003', 'MASCARILLA RECONSCONSTRUCTIVA E HIDRATANTE DE RECARGA E INFUSION DE COLAGENO 32OZ', 1, 0, '76.00', '76.00'),
(168, '0101', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 1, 0, '18.00', '18.00'),
(169, '0101', 'MP009', 'SHAMPOO DE ACEITE DE  OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 1, 0, '1.82', '1.82'),
(170, '0101', 'MP010', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 1, 0, '1.82', '1.82'),
(171, '0101', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 1, 0, '5.50', '5.50'),
(172, '0103', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '15.00', '15.00'),
(173, '0103', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '15.00', '15.00'),
(174, '0103', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '24.00', '24.00'),
(175, '0103', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '27.00', '27.00'),
(176, '0106', 'MP009', 'SHAMPOO DE ACEITE DE  OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 2, 0, '2.39', '4.78'),
(177, '0106', 'MP010', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 2, 0, '2.39', '4.78'),
(179, '0107', 'MP009', 'SHAMPOO DE ACEITE DE  OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 2, 0, '0.89', '1.79'),
(180, '0107', 'MP010', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 2, 0, '0.89', '1.79'),
(181, '0108', 'MP009', 'SHAMPOO DE ACEITE DE  OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 1, 0, '1.79', '1.79'),
(182, '0108', 'MP010', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 1, 0, '1.79', '1.79'),
(183, '0124', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(184, '0124', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '12.00', '12.00'),
(185, '0124', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '12.00', '12.00'),
(186, '0124', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '12.00', '12.00'),
(187, '0124', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '24.00', '24.00'),
(188, '0124', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '30.00', '30.00'),
(189, '0141', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(190, '0141', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(191, '0141', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(192, '0141', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(193, '0141', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(194, '0141', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(195, '0141', 'NA001', 'TRATAMIENTO DE KERATINA PARA UÑA EN ESMALTE NAIL AID 0.5OZ', 12, 2, '4.50', '54.00'),
(282, '0127', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 3, 0, '19.00', '57.00'),
(283, '0127', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 3, 0, '17.90', '53.70'),
(284, '0128', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(285, '0128', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '18.00', '18.00'),
(286, '0128', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(287, '0128', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(289, '0128', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '25.00', '25.00'),
(294, '0128', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '18.00', '18.00'),
(296, '0130', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(298, '0009', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(299, '0009', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(300, '0009', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(301, '0009', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(302, '0009', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(303, '0009', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(304, '0010', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(305, '0010', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(306, '0010', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(307, '0010', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(308, '0010', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(309, '0010', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(310, '0011', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(311, '0011', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(312, '0011', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(313, '0011', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(314, '0011', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(315, '0011', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(316, '0012', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(317, '0012', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(318, '0012', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(319, '0012', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(320, '0012', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(321, '0012', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(322, '0014', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(323, '0014', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(324, '0014', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(325, '0014', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(326, '0014', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(327, '0014', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(328, '0016', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(329, '0016', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(330, '0016', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(331, '0016', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(332, '0016', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(333, '0016', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(334, '0013', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(335, '0013', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(336, '0013', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(337, '0013', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(338, '0013', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(339, '0013', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(340, '0071', 'MP001', 'KERATINA MAGIK PROTECTION DE 32OZ', 1, 0, '180.00', '180.00'),
(341, '0071', 'MP002', 'SHAMPOO CLARIFICANTE DE LIMPIEZA PROFUNDA MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(342, '0071', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(349, '0071', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '9.00', '9.00'),
(350, '0071', 'MP005', 'GOTAS DE SEDA MAGIK PROTECTION DE 8OZ', 1, 0, '20.00', '20.00'),
(351, '0071', 'MP006', 'MASCARILLA DE MANTENIMIENTO MAGIK PROTECTION DE 15OZ', 1, 0, '23.00', '23.00'),
(352, '0076', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '18.00', '18.00'),
(353, '0076', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '18.00', '18.00'),
(357, '0080', 'KM001', 'KIT MAGIK PROTECTION DE 6 PRODUCTOS (KERATINA 32OZ, CLARIFICANTE, SHAMPOO Y ACONDICIONADOR DE MANTEN', 1, 0, '250.00', '250.00'),
(359, '0072', 'KM001', 'KIT MAGIK PROTECTION DE 6 PRODUCTOS (KERATINA 32OZ, CLARIFICANTE, SHAMPOO Y ACONDICIONADOR DE MANTEN', 1, 0, '250.00', '250.00'),
(361, '0077', 'KM002', 'KIT DE COLAGENO MAGIK KERATIN DE 3 PRODUCTOS (SHAMPOO DE LIMPIEZA PROFUNDA 33OZ, COLAGENO ALISADOR 3', 1, 0, '290.00', '290.00'),
(362, '0073', 'KM001', 'KIT MAGIK PROTECTION DE 6 PRODUCTOS (KERATINA 32OZ, CLARIFICANTE, SHAMPOO Y ACONDICIONADOR DE MANTEN', 1, 0, '250.00', '250.00'),
(364, '0081', 'KM001', 'KIT MAGIK PROTECTION DE 6 PRODUCTOS (KERATINA 32OZ, CLARIFICANTE, SHAMPOO Y ACONDICIONADOR DE MANTEN', 1, 0, '250.00', '250.00'),
(367, '0074', 'MP008', 'BIOTIN AMINOXIDIL MAGIK PROTECTION', 2, 0, '18.00', '36.00'),
(370, '0075', 'MP003', 'SHAMPOO DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '18.00', '18.00'),
(371, '0075', 'MP004', 'ACONDICIONADOR DE MANTENIMIENTO MAGIK PROTECTION DE 16OZ', 1, 0, '18.00', '18.00'),
(373, '0082', 'KM001', 'KIT MAGIK PROTECTION DE 6 PRODUCTOS (KERATINA 32OZ, CLARIFICANTE, SHAMPOO Y ACONDICIONADOR DE MANTEN', 1, 0, '250.00', '250.00'),
(374, '0083', 'KM001', 'KIT MAGIK PROTECTION DE 6 PRODUCTOS (KERATINA 32OZ, CLARIFICANTE, SHAMPOO Y ACONDICIONADOR DE MANTEN', 1, 0, '250.00', '250.00'),
(375, '0084', 'MP009', 'SHAMPOO DE ACEITE DE  OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 24, 0, '1.80', '43.20'),
(376, '0084', 'MP010', 'ACONDICIONADOR DE ACEITE DE OLIVA MAGIK PROTECTION PARA REPARACIÓN Y CRECIMIENTO DEL CABELLO', 24, 0, '1.80', '43.20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallerecibo`
--

CREATE TABLE `detallerecibo` (
  `idDetRecibo` int(6) NOT NULL,
  `idRecibo` varchar(5) DEFAULT NULL,
  `idFact` varchar(5) DEFAULT NULL,
  `recibidoDetRecibo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallerecibo`
--

INSERT INTO `detallerecibo` (`idDetRecibo`, `idRecibo`, `idFact`, `recibidoDetRecibo`) VALUES
(1, '0162', '0105', '120.00'),
(2, '0257', '0105', '130.00'),
(3, '0251', '0104', '229.41'),
(4, '0252', '0104', '300.57'),
(5, '0253', '0104', '8.09'),
(6, '0001', '0001', '200.00'),
(7, '0002', '0003', '150.00'),
(8, '0021', '0008', '30.00'),
(9, '0003', '0059', '80.00'),
(10, '0004', '0013', '50.00'),
(11, '0006', '0006', '50.00'),
(12, '0007', '0001', '50.00'),
(13, '0008', '0003', '100.00'),
(14, '0009', '0004', '60.00'),
(15, '0010', '0059', '50.00'),
(16, '0011', '0013', '35.00'),
(17, '0015', '0015', '250.00'),
(18, '0012', '0016', '92.00'),
(19, '0013', '0016', '91.46'),
(20, '0017', '0016', '67.07'),
(21, '0014', '0014', '100.00'),
(22, '0018', '0014', '40.00'),
(23, '0094', '0010', '100.00'),
(24, '0019', '0010', '40.00'),
(25, '0005', '0011', '61.00'),
(26, '0020', '0011', '106.52'),
(27, '0022', '0002', '132.00'),
(28, '0023', '0007', '45.00'),
(29, '0024', '0004', '50.00'),
(30, '0025', '0059', '20.00'),
(31, '0026', '0025', '75.76'),
(32, '0027', '0024', '27.00'),
(33, '0028', '0022', '70.00'),
(34, '0029', '0008', '30.00'),
(35, '0030', '0002', '62.00'),
(36, '0031', '0007', '45.45'),
(37, '0032', '0006', '30.00'),
(38, '0033', '0021', '54.00'),
(39, '0034', '0013', '50.00'),
(40, '0035', '0025', '100.00'),
(41, '0041', '0008', '30.00'),
(42, '0036', '0004', '50.00'),
(43, '0037', '0022', '100.00'),
(44, '0038', '0002', '100.00'),
(45, '0039', '0007', '50.00'),
(46, '0040', '0006', '30.00'),
(47, '0042', '0059', '20.00'),
(48, '0043', '0013', '40.00'),
(49, '0044', '0002', '100.00'),
(50, '0045', '0007', '50.30'),
(51, '0046', '0008', '30.00'),
(52, '0047', '0059', '20.00'),
(53, '0048', '0005', '100.00'),
(54, '0049', '0004', '60.00'),
(55, '0050', '0002', '50.00'),
(56, '0052', '0017', '30.39'),
(57, '0054', '0014', '40.00'),
(58, '0055', '0011', '45.00'),
(59, '0056', '0009', '50.00'),
(60, '0057', '0019', '125.00'),
(61, '0058', '0020', '50.00'),
(62, '0060', '0018', '40.00'),
(63, '0061', '0017', '30.00'),
(64, '0064', '0052', '100.00'),
(65, '0065', '0051', '27.00'),
(66, '0066', '0011', '37.48'),
(67, '0067', '0010', '32.56'),
(68, '0068', '0009', '50.00'),
(69, '0069', '0019', '40.00'),
(70, '0070', '0020', '100.00'),
(71, '0073', '0020', '100.00'),
(72, '0074', '0053', '30.34'),
(73, '0076', '0014', '60.00'),
(74, '0077', '0010', '30.30'),
(75, '0078', '0009', '50.00'),
(76, '0079', '0019', '15.00'),
(77, '0080', '0057', '27.00'),
(78, '0081', '0052', '30.00'),
(79, '0083', '0014', '10.00'),
(80, '0084', '0017', '30.00'),
(81, '0085', '0017', '30.21'),
(82, '0086', '0055', '12.00'),
(83, '0087', '0052', '30.00'),
(84, '0088', '0018', '30.21'),
(85, '0090', '0010', '47.14'),
(86, '0091', '0009', '60.00'),
(87, '0092', '0019', '60.00'),
(88, '0093', '0054', '30.00'),
(89, '0095', '0055', '15.00'),
(90, '0096', '0017', '30.00'),
(91, '0097', '0018', '25.00'),
(92, '0098', '0052', '30.00'),
(93, '0100', '0053', '23.66'),
(94, '0100', '0017', '6.23'),
(95, '0101', '0101', '27.14'),
(96, '0102', '0006', '20.00'),
(97, '0103', '0007', '59.25'),
(98, '0104', '0022', '80.00'),
(99, '0105', '0008', '30.00'),
(100, '0107', '0013', '45.00'),
(101, '0108', '0026', '210.00'),
(102, '0153', '0008', '30.00'),
(103, '0151', '0102', '36.00'),
(104, '0106', '0059', '20.00'),
(105, '0082', '0059', '30.00'),
(106, '0152', '0059', '10.00'),
(107, '0154', '0103', '20.00'),
(108, '0155', '0005', '50.00'),
(109, '0156', '0008', '39.00'),
(110, '0157', '0002', '56.00'),
(111, '0158', '0005', '50.00'),
(112, '0159', '0006', '30.00'),
(113, '0160', '0008', '31.00'),
(114, '0163', '0106', '4.78'),
(115, '0164', '0107', '3.58'),
(116, '0166', '0127', '110.70'),
(117, '0167', '0124', '24.07'),
(118, '0168', '0124', '24.06'),
(119, '0169', '0130', '100.08'),
(120, '0170', '0124', '21.05'),
(121, '0171', '0128', '80.00'),
(122, '0172', '0124', '20.00'),
(123, '0181', '0004', '30.00'),
(124, '0201', '0063', '250.00'),
(125, '0202', '0052', '29.85'),
(126, '0254', '0005', '50.00'),
(127, '0212', '0072', '40.00'),
(128, '0213', '0072', '20.00'),
(129, '0221', '0072', '29.87'),
(130, '0222', '0072', '29.87'),
(131, '0228', '0072', '20.00'),
(132, '0231', '0072', '30.00'),
(133, '0204', '0067', '31.34'),
(134, '0216', '0067', '29.87'),
(135, '0226', '0062', '17.07'),
(136, '0208', '0060', '86.22'),
(137, '0209', '0060', '27.00'),
(138, '0218', '0052', '30.15'),
(139, '0219', '0066', '180.00'),
(140, '0224', '0066', '103.00'),
(141, '0206', '0054', '30.00'),
(142, '0225', '0054', '3.00'),
(143, '0215', '0017', '29.88'),
(144, '0223', '0017', '29.87'),
(145, '0227', '0017', '10.00'),
(146, '0207', '0018', '20.91'),
(147, '0210', '0018', '30.00'),
(148, '0232', '0018', '60.00'),
(149, '0187', '0078', '180.00'),
(150, '0230', '0080', '40.00'),
(151, '0229', '0080', '40.00'),
(152, '0205', '0071', '100.00'),
(153, '0256', '0077', '100.00'),
(154, '0188', '0077', '50.00'),
(155, '0016', '0082', '100.00'),
(156, '0053', '0082', '42.55'),
(157, '0071', '0082', '30.34'),
(158, '0075', '0082', '40.00'),
(159, '0089', '0082', '30.16'),
(160, '0203', '0082', '10.00'),
(161, '0099', '0009', '40.00'),
(162, '0217', '0083', '40.00'),
(163, '0051', '0083', '50.00'),
(164, '0161', '0083', '40.00'),
(165, '0062', '0083', '36.00'),
(166, '0063', '0083', '40.00'),
(167, '0072', '0083', '44.00'),
(168, '0211', '0012', '61.00'),
(169, '0214', '0012', '91.00'),
(170, '0220', '0012', '98.00'),
(171, '0255', '0141', '304.00'),
(172, '0233', '0073', '250.00'),
(173, '0234', '0019', '10.00'),
(174, '0235', '0064', '179.00'),
(175, '0236', '0069', '13.50'),
(176, '0237', '0065', '13.50'),
(177, '0234', '0056', '36.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fact_compra`
--

CREATE TABLE `detalle_fact_compra` (
  `idDetFComp` int(10) NOT NULL,
  `IdFactComp` int(10) DEFAULT NULL,
  `NFactComp` varchar(10) DEFAULT NULL,
  `idProd` varchar(11) DEFAULT NULL,
  `cantDetFComp` int(11) DEFAULT NULL,
  `pUnitDetFComp` decimal(10,2) DEFAULT NULL,
  `totalDetFComp` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_fact_compra`
--

INSERT INTO `detalle_fact_compra` (`idDetFComp`, `IdFactComp`, `NFactComp`, `idProd`, `cantDetFComp`, `pUnitDetFComp`, `totalDetFComp`) VALUES
(4, 2, '0002', '0', 2, '18.00', '36.00'),
(5, 2, '0002', '0', 2, '9.00', '18.00'),
(6, 2, '0002', '0', 2, '29.00', '58.00'),
(7, 2, '0002', '0', 2, '260.00', '520.00'),
(8, 3, '000', '0', 2, '9.00', '18.00'),
(9, 3, '000', '0', 2, '9.00', '18.00'),
(10, 3, '000', '0', 2, '24.00', '48.00'),
(11, 3, '000', '0', 2, '29.00', '58.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_rec_compra`
--

CREATE TABLE `detalle_rec_compra` (
  `idDetRecCom` int(10) NOT NULL,
  `idRecComp` int(10) DEFAULT NULL,
  `NRecComp` varchar(10) DEFAULT NULL,
  `idFactComp` int(10) DEFAULT NULL,
  `NumFactComp` varchar(10) DEFAULT NULL,
  `recibidoDetComp` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_rec_compra`
--

INSERT INTO `detalle_rec_compra` (`idDetRecCom`, `idRecComp`, `NRecComp`, `idFactComp`, `NumFactComp`, `recibidoDetComp`) VALUES
(10, NULL, '0001', 11, '0002', '22.00'),
(11, NULL, '0001', 11, '0002', '23.00'),
(12, NULL, '0001', 11, '0002', '65.00'),
(13, NULL, '0001', 11, '0002', '12.00'),
(14, NULL, '0002', 12, '0002', '21.00'),
(15, NULL, '0002', 12, '0002', '43.00'),
(16, NULL, '0002', 12, '0002', '11.00'),
(17, NULL, '0002', 12, '0002', '24.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_region`
--

CREATE TABLE `estado_region` (
  `idEsRe` int(11) NOT NULL,
  `nom_reg_est` varchar(100) DEFAULT NULL,
  `des_reg_est` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_region`
--

INSERT INTO `estado_region` (`idEsRe`, `nom_reg_est`, `des_reg_est`) VALUES
(1, 'Región del Pacifico', 'Región del pacifico de Nicargua'),
(2, 'Región Central', 'Región central de Nicaragua'),
(3, 'Región Autónoma', 'Región autónoma de Nicaragua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFact` varchar(5) NOT NULL,
  `idCliente` varchar(5) DEFAULT NULL,
  `idPer` varchar(5) DEFAULT NULL,
  `idZonaFact` varchar(255) DEFAULT NULL,
  `fechaFact` date DEFAULT NULL,
  `tipoPagoFact` varchar(10) DEFAULT NULL,
  `diaCreditoFact` int(2) DEFAULT NULL,
  `fechaVenceFact` date DEFAULT NULL,
  `monedaFact` varchar(12) DEFAULT NULL,
  `subTotalFact` decimal(10,2) DEFAULT NULL,
  `totalFact` decimal(10,2) DEFAULT NULL,
  `DescFact` decimal(10,2) DEFAULT NULL,
  `porcentDescFact` int(11) DEFAULT NULL,
  `estadoFact` int(1) DEFAULT '1',
  `fechaRegFact` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `userRegFact` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFact`, `idCliente`, `idPer`, `idZonaFact`, `fechaFact`, `tipoPagoFact`, `diaCreditoFact`, `fechaVenceFact`, `monedaFact`, `subTotalFact`, `totalFact`, `DescFact`, `porcentDescFact`, `estadoFact`, `fechaRegFact`, `userRegFact`) VALUES
('0001', 'RV002', 'DP002', 'ZSO01', '2018-11-23', 'CREDITO', 45, '2019-01-07', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-09 23:10:04', 'admin'),
('0002', 'RV002', 'DP002', 'ZSO01', '2018-10-31', 'CREDITO', 45, '2018-12-15', 'US$', NULL, '500.00', NULL, NULL, 2, '2019-07-19 12:04:58', 'admin'),
('0003', 'RV001', 'DP002', 'ZSO01', '2018-10-20', 'CREDITO', 45, '2018-12-04', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-09 23:12:33', 'admin'),
('0004', 'GR001', 'DP002', 'ZSO01', '2018-11-28', 'CREDITO', 30, '2018-12-28', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-20 22:18:23', 'admin'),
('0005', 'MG001', 'DP002', 'ZMG01', '2018-12-04', 'CREDITO', 30, '2019-01-03', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-20 22:25:10', 'admin'),
('0006', 'RV003', 'DP002', 'ZSO01', '2018-11-28', 'CREDITO', 30, '2018-12-28', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-06-27 17:45:00', 'admin'),
('0007', 'RV004', 'DP002', 'ZSO01', '2018-11-28', 'CREDITO', 45, '2019-01-12', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 10:50:07', 'admin'),
('0008', 'RV005', 'DP002', 'ZSO01', '2018-12-04', 'CREDITO', 45, '2019-01-18', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 12:09:12', 'admin'),
('0009', 'ES003', 'DP003', NULL, '2018-11-23', 'CREDITO', 45, '2019-01-07', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-21 16:01:15', 'admin'),
('0010', 'ES002', 'DP003', NULL, '2018-10-23', 'CREDITO', 45, '2018-12-07', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 10:15:01', 'admin'),
('0011', 'ES001', 'DP003', NULL, '2018-10-23', 'CREDITO', 45, '2018-12-07', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-13 15:47:23', 'admin'),
('0012', 'MY001', 'DP003', NULL, '2018-10-17', 'CREDITO', 45, '2018-12-01', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-21 17:35:31', 'admin'),
('0013', 'MY003', 'DP002', NULL, '2018-10-31', 'CREDITO', 45, '2018-12-15', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-07-13 15:47:42', 'admin'),
('0014', 'MT002', 'DP003', NULL, '2018-10-23', 'CREDITO', 45, '2018-12-07', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 09:56:08', 'admin'),
('0015', 'MT005', 'DP003', 'ZNT01', '2018-11-01', 'CREDITO', 45, '2018-12-16', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-09 23:23:48', 'admin'),
('0016', 'MT001', 'DP003', NULL, '2018-10-23', 'CREDITO', 45, '2018-12-07', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-13 15:47:34', 'admin'),
('0017', 'MT008', 'DP003', 'ZNT01', '2018-11-26', 'CREDITO', 45, '2019-01-10', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-06-27 17:45:08', 'admin'),
('0018', 'MT007', 'DP003', 'ZNT01', '2018-12-05', 'CREDITO', 45, '2019-01-19', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-06-27 17:45:08', 'admin'),
('0019', 'ES004', 'DP003', 'ZNT01', '2018-12-04', 'CREDITO', 45, '2019-01-18', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-24 08:56:20', 'admin'),
('0020', 'MT009', 'DP003', 'ZNT01', '2018-12-06', 'CREDITO', 45, '2019-01-20', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 09:25:32', 'admin'),
('0021', 'MG005', 'DP002', 'ZMA01', '2018-12-11', 'CREDITO', 15, '2018-12-26', 'US$', NULL, '54.00', NULL, NULL, 2, '2019-07-13 13:20:04', 'admin'),
('0022', 'RV006', 'DP002', 'ZSO01', '2018-12-11', 'CREDITO', 30, '2019-01-10', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 10:51:34', 'admin'),
('0023', 'RV005', 'DP002', 'ZSO01', '2018-12-13', 'CREDITO', 15, '2018-12-28', 'US$', NULL, '108.00', NULL, NULL, 1, '2019-06-27 17:45:01', 'admin'),
('0024', 'RV007', 'DP002', 'ZSO01', '2018-12-13', 'CONTADO', 0, '2018-12-13', 'US$', NULL, '27.00', NULL, NULL, 2, '2019-07-13 12:57:11', 'admin'),
('0025', 'MG003', 'DP002', 'ZMA01', '2018-12-13', 'CREDITO', 30, '2019-01-12', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-06-27 17:45:02', 'admin'),
('0026', 'MY004', 'DP002', 'ZSO01', '2018-12-14', 'CREDITO', 15, '2018-12-29', 'US$', NULL, '210.00', NULL, NULL, 2, '2019-07-19 10:59:48', 'admin'),
('0051', 'MT010', 'DP003', 'ZNT01', '2018-12-13', 'CREDITO', 15, '2018-12-28', 'US$', NULL, '27.00', NULL, NULL, 2, '2019-07-13 15:39:19', 'admin'),
('0052', 'MT011', 'DP003', 'ZNT01', '2018-12-18', 'CREDITO', 42, '2019-01-23', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-21 13:10:56', 'admin'),
('0053', 'MT008', 'DP003', 'ZNT01', '2018-12-19', 'CREDITO', 15, '2019-01-03', 'US$', NULL, '54.00', NULL, NULL, 2, '2019-07-19 10:39:17', 'admin'),
('0054', 'MT004', 'DP003', 'ZNT01', '2018-12-22', 'CREDITO', 30, '2019-01-21', 'US$', NULL, '63.00', NULL, NULL, 2, '2019-07-21 13:17:36', 'admin'),
('0055', 'MT010', 'DP003', 'ZNT01', '2019-01-22', 'CREDITO', 15, '2019-02-06', 'US$', NULL, '27.00', NULL, NULL, 2, '2019-07-19 10:22:58', 'admin'),
('0056', 'ES004', 'DP003', 'ZNT01', '2019-02-07', 'CREDITO', 15, '2019-02-22', 'US$', NULL, '36.00', NULL, NULL, 2, '2019-07-24 17:45:01', 'admin'),
('0057', 'MY001', 'DP001', 'ZSO01', '2019-02-09', 'CONTADO', 0, '2019-02-09', 'US$', NULL, '27.00', NULL, NULL, 2, '2019-07-19 09:47:37', 'admin'),
('0058', 'MY002', 'DP001', 'ZSO01', '2019-02-09', 'CONTADO', 0, '2019-02-09', 'US$', NULL, '27.00', NULL, NULL, 1, '2019-06-27 17:45:19', 'admin'),
('0059', 'MY002', 'DP002', 'ZSO01', '2018-10-25', 'CREDITO', 45, '2018-12-09', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-19 11:37:47', 'admin'),
('0060', 'MT012', 'DP003', 'ZNT01', '2019-02-15', 'CREDITO', 45, '2019-04-01', 'US$', NULL, '143.40', NULL, NULL, 1, '2019-06-27 17:45:21', 'admin'),
('0062', 'MT004', 'DP003', 'ZNT01', '2019-03-14', 'CREDITO', 15, '2019-03-29', 'US$', NULL, '54.00', NULL, NULL, 1, '2019-06-27 17:45:24', 'admin'),
('0063', 'MT014', 'DP003', 'ZNT01', '2019-04-02', 'CREDITO', 45, '2019-05-17', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-20 22:19:44', 'admin'),
('0064', 'JI001', 'DP003', 'ZNT01', '2019-03-25', 'CREDITO', 60, '2019-06-24', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-06-27 17:44:55', 'admin'),
('0065', 'MT013', 'DP003', 'ZNT01', '2019-01-04', 'CREDITO', 15, '2019-01-19', 'US$', NULL, '13.50', NULL, NULL, 2, '2019-07-24 09:03:49', 'admin'),
('0066', 'MT005', 'DP003', 'ZNT01', '2019-04-04', 'CREDITO', 30, '2019-05-04', 'US$', NULL, '283.00', NULL, NULL, 2, '2019-07-21 13:15:16', 'admin'),
('0067', 'MT010', 'DP003', 'ZNT01', '2019-04-04', 'CREDITO', 60, '2019-06-03', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-06-27 17:45:31', 'admin'),
('0069', 'MT005', 'DP003', 'ZNT01', '2019-04-04', 'CREDITO', 15, '2019-04-19', 'US$', NULL, '13.50', NULL, NULL, 2, '2019-07-24 09:00:58', 'admin'),
('0070', 'MT008', 'DP003', 'ZNT01', '2019-04-08', 'CREDITO', 15, '2019-04-23', 'US$', NULL, '18.00', NULL, NULL, 1, '2019-06-27 17:45:32', 'admin'),
('0071', 'MT015', 'DP003', NULL, '2019-04-23', 'CREDITO', 30, '2019-05-23', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-07-21 10:07:33', 'admin'),
('0072', 'MT016', 'DP003', NULL, '2019-04-29', 'CREDITO', 60, '2019-06-28', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-07-21 11:07:06', 'admin'),
('0073', 'MT017', 'DP003', NULL, '2019-04-29', 'CREDITO', 30, '2019-05-29', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-24 08:55:05', 'admin'),
('0074', 'MT008', 'DP003', NULL, '2019-05-02', 'CREDITO', 15, '2019-05-17', 'US$', NULL, '36.00', NULL, NULL, 1, '2019-07-21 12:07:16', 'admin'),
('0075', 'MT008', 'DP003', NULL, '2019-05-15', 'CREDITO', 15, '2019-05-30', 'US$', NULL, '36.00', NULL, NULL, 1, '2019-07-21 12:07:46', 'admin'),
('0076', 'MT015', 'DP003', NULL, '2019-05-15', 'CREDITO', 20, '2019-06-04', 'US$', NULL, '36.00', NULL, NULL, 1, '2019-07-21 10:07:19', 'admin'),
('0077', 'MY006', 'DP001', NULL, '2019-05-19', 'CREDITO', 45, '2019-07-03', 'US$', NULL, '290.00', NULL, NULL, 1, '2019-07-21 11:07:27', 'admin'),
('0078', 'MY001', 'DP003', 'ZSO01', '2019-05-29', 'CREDITO', 40, '2019-07-08', 'US$', NULL, '180.00', NULL, NULL, 2, '2019-07-21 13:37:47', 'admin'),
('0080', 'ES004', 'DP003', NULL, '2019-06-17', 'CREDITO', 40, '2019-07-27', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-07-21 11:07:42', 'admin'),
('0081', 'MT009', 'DP003', NULL, '2019-07-01', 'CREDITO', 40, '2019-08-10', 'US$', NULL, '250.00', NULL, NULL, 1, '2019-07-21 12:07:09', 'admin'),
('0082', 'MT003', 'DP003', NULL, '2018-12-04', 'CREDITO', 45, '2019-01-18', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-21 14:53:15', 'admin'),
('0083', 'MT004', 'DP003', NULL, '2019-10-25', 'CREDITO', 45, '2019-12-09', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-07-21 17:12:57', 'admin'),
('0101', 'CD001', 'DP001', 'ZMA02', '2019-01-16', 'CREDITO', 15, '2019-01-31', 'US$', NULL, '27.14', NULL, NULL, 2, '2019-07-19 10:45:27', 'admin'),
('0102', 'MY004', 'DP001', 'ZSO01', '2019-02-23', 'CONTADO', 0, '2019-02-23', 'US$', NULL, '36.00', NULL, NULL, 2, '2019-07-19 11:04:31', 'admin'),
('0103', 'CE001', 'DP001', 'ZMG02', '2018-10-20', 'CREDITO', 30, '2018-11-09', 'US$', NULL, '81.00', NULL, NULL, 1, '2019-06-27 17:45:35', 'admin'),
('0104', 'MY005', 'DP001', 'ZSO01', '2019-02-23', 'CREDITO', 30, '2019-03-25', 'US$', NULL, '538.00', NULL, NULL, 2, '2019-06-28 15:49:08', 'admin'),
('0105', 'MG004', 'DP001', 'ZMA01', '2019-03-29', 'CREDITO', 40, '2019-05-08', 'US$', NULL, '250.00', NULL, NULL, 2, '2019-06-28 13:27:38', 'admin'),
('0106', 'CE003', 'DP001', 'ZMA02', '2019-03-10', 'CREDITO', 15, '2019-03-25', 'US$', NULL, '9.56', NULL, NULL, 1, '2019-06-27 17:45:36', 'admin'),
('0107', 'CE004', 'DP001', 'ZNT01', '2019-02-15', 'CONTADO', 0, '2019-02-15', 'US$', NULL, '3.58', NULL, NULL, 2, '2019-07-20 21:52:56', 'admin'),
('0108', 'CD002', 'DP003', 'ZMA03', '2019-03-15', 'CREDITO', 15, '2019-03-30', 'US$', NULL, '3.58', NULL, NULL, 1, '2019-06-27 17:45:37', 'admin'),
('0124', 'CH001', 'DP005', 'ZCS01', '2019-04-01', 'CREDITO', 45, '2019-05-16', 'US$', NULL, '270.00', NULL, NULL, 1, '2019-06-27 17:45:37', 'admin'),
('0127', 'NG001', 'DP005', NULL, '2019-04-09', 'CREDITO', 45, '2019-05-24', 'US$', NULL, '110.70', NULL, NULL, 2, '2019-07-20 22:05:53', 'admin'),
('0128', 'NG002', 'DP005', NULL, '2019-04-29', 'CREDITO', 45, '2019-06-13', 'US$', NULL, '270.00', NULL, NULL, 1, '2019-07-07 17:07:39', 'admin'),
('0130', 'NG003', 'DP005', NULL, '2019-05-15', 'CREDITO', 45, '2019-06-29', 'US$', NULL, '180.00', NULL, NULL, 1, '2019-07-07 17:07:17', 'admin'),
('0141', 'MG006', 'DP006', 'ZMA02', '2019-04-02', 'CREDITO', 30, '2019-05-02', 'US$', NULL, '304.00', NULL, NULL, 2, '2019-07-21 17:47:23', 'admin'),
('0151', 'MG002', 'DP001', 'ZMA03', '2019-05-30', 'CREDITO', 15, '2019-06-15', 'US$', NULL, '62.00', NULL, NULL, 1, '2019-06-27 17:44:56', 'admin'),
('0084', 'MT012', 'DP003', NULL, '2019-06-15', 'CREDITO', 45, '2019-07-30', 'US$', NULL, '86.40', NULL, NULL, 1, '2019-07-24 08:07:49', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra`
--

CREATE TABLE `factura_compra` (
  `IdFactComp` int(10) NOT NULL,
  `NFactComp` varchar(10) DEFAULT '0',
  `tipoFactCompra` varchar(20) DEFAULT NULL,
  `IdPer` varchar(5) DEFAULT NULL,
  `idProv` varchar(5) DEFAULT NULL,
  `fechaFactComp` date DEFAULT NULL,
  `nomEntregaFactComp` varchar(100) DEFAULT NULL,
  `tipoPagoFactComp` varchar(10) DEFAULT NULL,
  `diaCreditoFactComp` int(2) DEFAULT NULL,
  `monedaFactComp` varchar(12) DEFAULT NULL,
  `subTotalFactComp` decimal(10,2) DEFAULT NULL,
  `PorcentDescFactComp` decimal(10,2) DEFAULT NULL,
  `descFactComp` decimal(10,2) DEFAULT NULL,
  `porcentIvaFactComp` decimal(10,2) DEFAULT NULL,
  `ivaFactComp` decimal(10,2) DEFAULT NULL,
  `TotalFactComp` decimal(10,2) DEFAULT NULL,
  `estadoFactCompra` tinyint(1) DEFAULT NULL,
  `fechaFactCompVence` date DEFAULT NULL,
  `fechaRegFactCompra` timestamp NULL DEFAULT NULL,
  `UserRegFactCompra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura_compra`
--

INSERT INTO `factura_compra` (`IdFactComp`, `NFactComp`, `tipoFactCompra`, `IdPer`, `idProv`, `fechaFactComp`, `nomEntregaFactComp`, `tipoPagoFactComp`, `diaCreditoFactComp`, `monedaFactComp`, `subTotalFactComp`, `PorcentDescFactComp`, `descFactComp`, `porcentIvaFactComp`, `ivaFactComp`, `TotalFactComp`, `estadoFactCompra`, `fechaFactCompVence`, `fechaRegFactCompra`, `UserRegFactCompra`) VALUES
(2, '0002', '1', 'DP001', 'MPC01', '2019-06-10', 'HERMES', 'CREDITO', 23, 'US$', NULL, NULL, NULL, NULL, NULL, '632.00', 1, '2019-07-03', NULL, NULL),
(3, '000', '2', 'DP003', 'MPC01', '2019-06-10', 'HERMES', 'CREDITO', 15, 'C$', NULL, NULL, NULL, NULL, NULL, '142.00', 1, '2019-06-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llaves`
--

CREATE TABLE `llaves` (
  `idKey` int(255) NOT NULL,
  `prefijos` varchar(2) DEFAULT NULL,
  `number` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llaves`
--

INSERT INTO `llaves` (`idKey`, `prefijos`, `number`) VALUES
(1, 'DP', '006');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_producto`
--

CREATE TABLE `marca_producto` (
  `idMarca` int(255) NOT NULL,
  `idProv` varchar(5) DEFAULT NULL,
  `nombreMarca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `Modulo_id` int(10) NOT NULL,
  `Modulo_name_id` varchar(20) DEFAULT NULL,
  `Modulo_Icon` varchar(15) DEFAULT NULL,
  `Modulo_full_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`Modulo_id`, `Modulo_name_id`, `Modulo_Icon`, `Modulo_full_name`) VALUES
(1, 'ventas', 'monetization_on', 'Venta'),
(2, 'cobro', 'receipt', 'Cobro'),
(3, 'compra', 'shopping_cart', 'Compras'),
(5, 'cuentas', 'swap_horiz', 'Cuentas'),
(4, 'salidas', 'monetization_on', 'Salidas'),
(6, 'inventario', 'visibility', 'Vista de Inventario'),
(7, 'reportes', 'library_books', 'Reportes'),
(8, 'datacontrol', 'account_box', 'Control de datos'),
(9, 'configuracion', 'settings\r\nsetti', 'Configuración');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(255) NOT NULL,
  `nomPais` varchar(255) DEFAULT NULL,
  `urlBanderaPais` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idPais`, `nomPais`, `urlBanderaPais`) VALUES
(1, 'Nicaragua', '../assets/img/banderas/nicaragua.svg'),
(2, 'EEUU', '../assets/img/banderas/estados-unidos.svg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `Usuario_id` int(10) NOT NULL,
  `modules_id` varchar(20) DEFAULT NULL,
  `FechaCreacion` date DEFAULT NULL,
  `usuarioCU` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`Usuario_id`, `modules_id`, `FechaCreacion`, `usuarioCU`) VALUES
(1, 'ventas', '2018-10-24', 1),
(1, 'cobro', '2018-10-24', 1),
(1, 'compra', '2018-10-24', 1),
(1, 'salidas', '2018-10-24', 1),
(1, 'cuentas', '2018-10-24', 1),
(1, 'inventario', '2019-05-01', 1),
(1, 'reportes', '2019-05-01', 1),
(1, 'datacontrol', '2019-05-27', 1),
(1, 'configuracion', '2019-05-27', 1),
(37, 'compra', '2019-05-29', NULL),
(37, 'salidas', '2019-05-29', NULL),
(37, 'cuentas', '2019-05-29', NULL),
(37, 'inventario', '2019-05-29', NULL),
(37, 'reportes', '2019-05-29', NULL),
(38, 'inventario', '2019-05-29', NULL),
(38, 'reportes', '2019-05-29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idPrivi` int(10) DEFAULT NULL,
  `nomPrivi` varchar(255) DEFAULT NULL,
  `obsPrivi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idPrivi`, `nomPrivi`, `obsPrivi`) VALUES
(1, 'Administrador', 'Eiminar, actualizar y agregar datos, agregar datos de control y configurar ajustes de sistema'),
(2, 'Editor', 'Eiminar, actualizar y agregar datos en ventanas y datos de modulos asignados, no podra agregar datos de control ni configurar ajustes del sistema'),
(3, 'Lector', 'Visualizar ventanas y datos de modulos asignados, no podra agrega, eliminar ni actualizar datos, no podra agregar datos de control ni configurar ajustes del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `idRecibo` varchar(5) NOT NULL,
  `fechaRecibo` date DEFAULT NULL,
  `idPer` varchar(5) DEFAULT NULL,
  `idCliente` varchar(5) DEFAULT NULL,
  `formaPago` varchar(20) DEFAULT NULL,
  `concepRecibo` varchar(100) DEFAULT NULL,
  `monedaRecibo` varchar(20) DEFAULT NULL,
  `montoRecibo` decimal(10,2) DEFAULT NULL,
  `numCkRecibo` int(50) DEFAULT NULL,
  `bancoCkRecibo` varchar(50) DEFAULT NULL,
  `tasaCambioRecibo` decimal(10,2) DEFAULT NULL,
  `observRecibo` varchar(250) DEFAULT NULL,
  `fechaRegRecibo` datetime DEFAULT NULL,
  `horaRegRecibo` time DEFAULT NULL,
  `userRegRecibo` varchar(50) DEFAULT NULL,
  `estadoRecibo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`idRecibo`, `fechaRecibo`, `idPer`, `idCliente`, `formaPago`, `concepRecibo`, `monedaRecibo`, `montoRecibo`, `numCkRecibo`, `bancoCkRecibo`, `tasaCambioRecibo`, `observRecibo`, `fechaRegRecibo`, `horaRegRecibo`, `userRegRecibo`, `estadoRecibo`) VALUES
('0001', '2018-11-28', 'DP002', 'RV002', 'EFECTIVO', 'ABONO A FACTURA 0001', 'US$', '200.00', 0, '', '0.00', '', '2019-07-07 18:07:16', NULL, 'admin', 1),
('0002', '2018-11-28', 'DP002', 'RV001', 'EFECTIVO', 'ABONO DE FACTURA 0003', 'US$', '150.00', 0, '', '0.00', '', '2019-07-07 18:07:53', NULL, 'admin', 1),
('0003', '2018-11-28', 'DP002', 'MY002', 'EFECTIVO', 'ABONO A FACTURA 0059', 'US$', '80.00', 0, '', '0.00', 'ABONO A FACTURA 0059', '2019-07-09 22:07:47', NULL, 'admin', 1),
('0004', '2019-07-09', 'DP002', 'MY003', 'EFECTIVO', 'ABONO A FACTURA 0013', 'US$', '50.00', 0, '', '0.00', '', '2019-07-09 23:07:20', NULL, 'admin', 1),
('0005', '2018-11-06', 'DP003', 'ES001', 'EFECTIVO', 'ABONO A FACTURA 0011', 'US$', '61.00', 0, '', '0.00', '', '2019-07-09 23:07:35', NULL, 'admin', 1),
('0006', '2018-12-04', 'DP002', 'RV003', 'EFECTIVO', 'ABONO A FACTURA', 'US$', '50.00', 0, '', '0.00', '', '2019-07-09 23:07:10', NULL, 'admin', 1),
('0007', '2019-07-09', 'DP002', 'RV002', 'EFECTIVO', 'CANCELACION DE FACTURA #0001', 'US$', '50.00', 0, '', '0.00', '', '2019-07-09 23:07:04', NULL, 'admin', 1),
('0008', '2018-12-04', 'DP002', 'RV001', 'EFECTIVO', 'CANCELACION FACTURA 0003', 'US$', '100.00', 0, '', '0.00', '', '2019-07-09 23:07:32', NULL, 'admin', 1),
('0009', '2018-12-04', 'DP002', 'GR001', 'EFECTIVO', 'ABONO A FACTUA 0004', 'US$', '60.00', 0, '', '0.00', '', '2019-07-09 23:07:48', NULL, 'admin', 1),
('0010', '2018-12-04', 'DP002', 'MY002', 'EFECTIVO', 'ABONO A FACTURA 0059', 'US$', '50.00', 0, '', '0.00', '', '2019-07-09 23:07:34', NULL, 'admin', 1),
('0011', '2018-12-04', 'DP002', 'MY003', 'EFECTIVO', 'ABONO A FACTURA 0013', 'US$', '35.00', 0, '', '0.00', '', '2019-07-09 23:07:43', NULL, 'admin', 1),
('0012', '2018-11-06', 'DP003', 'MT001', 'EFECTIVO', 'ABONO A FACTURA 0016', 'US$', '92.00', 0, '', '0.00', '', '2019-07-09 23:07:57', NULL, 'admin', 1),
('0013', '2018-11-22', 'DP003', 'MT001', 'EFECTIVO', 'ABONO A FACTURA 0013', 'US$', '91.46', 0, '', '0.00', '', '2019-07-09 23:07:30', NULL, 'admin', 1),
('0014', '2018-11-06', 'DP003', 'MT002', 'EFECTIVO', 'ABONO A FACTURA 0014', 'US$', '100.00', 0, '', '0.00', '', '2019-07-09 23:07:59', NULL, 'admin', 1),
('0015', '2019-07-09', 'DP003', 'MT005', 'EFECTIVO', 'CANCELCION DE FACTURA 0015', 'US$', '250.00', 0, '', '0.00', '', '2019-07-09 23:07:47', NULL, 'admin', 1),
('0016', '2018-12-04', 'DP003', 'MT003', 'EFECTIVO', 'ABONO FACTURA 0082', 'US$', '100.00', 0, '', '0.00', '', '2019-07-21 14:07:29', NULL, 'admin', 1),
('0017', '2018-12-04', 'DP003', 'MT001', 'EFECTIVO', 'CANCELACION DE FACTURA 0016', 'US$', '67.07', 0, '', '0.00', '', '2019-07-09 23:07:10', NULL, 'admin', 1),
('0018', '2018-12-04', 'DP003', 'MT002', 'EFECTIVO', 'ABONO DE FACTURA 0014', 'US$', '40.00', 0, '', '0.00', '', '2019-07-09 23:07:04', NULL, 'admin', 1),
('0019', '2018-12-04', 'DP003', 'ES002', 'EFECTIVO', 'ABONO A FACTURA 0010', 'US$', '40.00', 0, '', '0.00', '', '2019-07-09 23:07:39', NULL, 'admin', 1),
('0020', '2018-12-04', 'DP003', 'ES001', 'EFECTIVO', 'ABONO DE FACTURA 0011', 'US$', '106.52', 0, '', '0.00', '', '2019-07-09 23:07:10', NULL, 'admin', 1),
('0021', '2018-12-13', 'DP002', 'RV005', 'EFECTIVO', 'ABONO A FACTURA 0008', 'US$', '30.00', 0, '', '0.00', '', '2019-07-09 22:07:05', NULL, 'admin', 1),
('0022', '2018-12-13', 'DP002', 'RV002', 'EFECTIVO', 'ABONO DE FACTURA 0002', 'US$', '132.00', 0, '', '0.00', '', '2019-07-09 23:07:39', NULL, 'admin', 1),
('0023', '2018-12-13', 'DP002', 'RV004', 'EFECTIVO', 'ABONO DE FACTURA 0007', 'US$', '45.00', 0, '', '0.00', '', '2019-07-13 12:07:54', NULL, 'admin', 1),
('0024', '2018-12-13', 'DP002', 'GR001', 'EFECTIVO', 'ABONO DE FACTURA 0004', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 12:07:39', NULL, 'admin', 1),
('0025', '2018-12-13', 'DP002', 'MY002', 'EFECTIVO', 'ABONO A FACTURA 0059', 'US$', '20.00', 0, '', '0.00', '', '2019-07-13 12:07:22', NULL, 'admin', 1),
('0026', '2018-12-13', 'DP002', 'MG003', 'EFECTIVO', 'ABONO DE FACTURA 0025', 'US$', '75.76', 0, '', '0.00', '', '2019-07-13 12:07:41', NULL, 'admin', 1),
('0027', '2018-12-13', 'DP002', 'RV007', 'EFECTIVO', 'CANCELACION DE FACTURA 0024', 'US$', '27.00', 0, '', '0.00', '', '2019-07-13 12:07:10', NULL, 'admin', 1),
('0028', '2018-12-18', 'DP002', 'RV006', 'EFECTIVO', 'ABONO DE FACTUTA 0022', 'US$', '70.00', 0, '', '0.00', '', '2019-07-13 12:07:30', NULL, 'admin', 1),
('0029', '2018-12-18', 'DP002', 'RV005', 'EFECTIVO', 'ABONO DE FACTURA 0008', 'US$', '30.00', 0, '', '0.00', '', '2019-07-13 13:07:06', NULL, 'admin', 1),
('0030', '2018-12-18', 'DP002', 'RV002', 'EFECTIVO', 'ABONO A FACTURA 0002', 'US$', '62.00', 0, '', '0.00', '', '2019-07-13 13:07:46', NULL, 'admin', 1),
('0031', '2018-12-18', 'DP002', 'RV004', 'EFECTIVO', 'ABONO A FACTURA 0007', 'US$', '45.45', 0, '', '0.00', '', '2019-07-13 13:07:18', NULL, 'admin', 1),
('0032', '2018-12-18', 'DP002', 'RV003', 'EFECTIVO', 'ABONO A FACTURA 0006', 'US$', '30.00', 0, '', '0.00', '', '2019-07-13 13:07:38', NULL, 'admin', 1),
('0033', '2028-12-19', 'DP002', 'MG005', 'EFECTIVO', 'CANCELACION DE FACTURA 0021', 'US$', '54.00', 0, '', '0.00', '', '2019-07-13 13:07:04', NULL, 'admin', 1),
('0034', '2018-12-19', 'DP002', 'MY003', 'EFECTIVO', 'ABONO FACTURA 0013', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 13:07:06', NULL, 'admin', 1),
('0035', '2028-12-20', 'DP002', 'MG003', 'EFECTIVO', 'ABONO FACTURA 0025', 'US$', '100.00', 0, '', '0.00', '', '2019-07-13 13:07:37', NULL, 'admin', 1),
('0036', '2018-12-28', 'DP002', 'GR001', 'EFECTIVO', 'ABONO A FACTURA 0004', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 13:07:54', NULL, 'admin', 1),
('0037', '2018-12-28', 'DP002', 'RV006', 'EFECTIVO', 'ABONO A FACTURA 0022', 'US$', '100.00', 0, '', '0.00', '', '2019-07-13 13:07:54', NULL, 'admin', 1),
('0038', '2018-12-28', 'DP002', 'RV002', 'EFECTIVO', 'ABONO A FACTURA 0002', 'US$', '100.00', 0, '', '0.00', '', '2019-07-13 13:07:29', NULL, 'admin', 1),
('0039', '2018-12-28', 'DP002', 'RV004', 'EFECTIVO', 'ABONO  FACTURA 0007', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 13:07:39', NULL, 'admin', 1),
('0040', '2018-12-28', 'DP002', 'RV003', 'EFECTIVO', 'ABONO DE FACTURA ', 'US$', '30.00', 0, '', '0.00', '', '2019-07-13 13:07:01', NULL, 'admin', 1),
('0041', '2018-12-28', 'DP002', 'RV005', 'EFECTIVO', 'ABONO FACTURA 0008', 'US$', '30.00', 0, '', '0.00', '', '2019-07-13 13:07:43', NULL, 'admin', 1),
('0042', '2018-11-28', 'DP002', 'MY002', 'EFECTIVO', 'ABONO FACTURA 0059', 'US$', '20.00', 0, '', '0.00', '', '2019-07-13 14:07:22', NULL, 'admin', 1),
('0043', '2018-12-28', 'DP002', 'MY003', 'EFECTIVO', 'ABONO FACTURA 0013', 'US$', '40.00', 0, '', '0.00', '', '2019-07-13 14:07:32', NULL, 'admin', 1),
('0044', '2019-01-04', 'DP002', 'RV002', 'EFECTIVO', 'ABONO A FACTURA 0002', 'US$', '100.00', 0, '', '0.00', '', '2019-07-13 14:07:45', NULL, 'admin', 1),
('0045', '2019-01-09', 'DP002', 'RV004', 'EFECTIVO', 'ABONO FACTURA ', 'US$', '50.30', 0, '', '0.00', '0007', '2019-07-13 14:07:47', NULL, 'admin', 1),
('0046', '2019-01-04', 'DP002', 'RV005', 'EFECTIVO', 'ABONO FACTURA 0008', 'US$', '30.00', 0, '', '0.00', '', '2019-07-13 14:07:11', NULL, 'admin', 1),
('0047', '2019-01-04', 'DP002', 'MY002', 'EFECTIVO', 'ABONO A FACTURA 0059', 'US$', '20.00', 0, '', '0.00', '', '2019-07-13 14:07:59', NULL, 'admin', 1),
('0048', '2019-01-29', 'DP002', 'MG001', 'EFECTIVO', 'ABONO DE FACTURA 0005', 'US$', '100.00', 0, '', '0.00', '', '2019-07-13 14:07:57', NULL, 'admin', 1),
('0049', '2019-01-25', 'DP002', 'GR001', 'EFECTIVO', 'ABONO DE FACTURA 0004', 'US$', '60.00', 0, '', '0.00', '', '2019-07-13 14:07:46', NULL, 'admin', 1),
('0050', '2019-01-25', 'DP002', 'RV002', 'EFECTIVO', 'ABONO FACTURA 0002', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 14:07:08', NULL, 'admin', 1),
('0051', '2018-12-06', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA 0083', 'US$', '50.00', 0, '', '0.00', '', '2019-07-21 16:07:31', NULL, 'admin', 1),
('0052', '2018-12-13', 'DP003', 'MT008', 'EFECTIVO', 'ABON FACTURA 0017', 'US$', '30.39', 0, '', '0.00', '', '2019-07-13 14:07:46', NULL, 'admin', 1),
('0053', '2018-12-14', 'DP003', 'MT003', 'EFECTIVO', 'ABONO FACTURA 0082', 'US$', '42.55', 0, '', '0.00', '', '2019-07-21 14:07:30', NULL, 'admin', 1),
('0054', '2018-12-14', 'DP003', 'MT002', 'EFECTIVO', 'ABONO A FACTURA 0014', 'US$', '40.00', 0, '', '0.00', '', '2019-07-13 14:07:26', NULL, 'admin', 1),
('0055', '2018-12-14', 'DP003', 'ES001', 'EFECTIVO', 'ABONO FACTURA 0011', 'US$', '45.00', 0, '', '0.00', '', '2019-07-13 14:07:13', NULL, 'admin', 1),
('0056', '2018-12-14', 'DP003', 'ES003', 'EFECTIVO', 'ABONO FACTURA 0009', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 15:07:48', NULL, 'admin', 1),
('0057', '2018-12-14', 'DP003', 'ES004', 'EFECTIVO', 'ABONO A FACTURA 0019', 'US$', '125.00', 0, '', '0.00', '', '2019-07-13 15:07:55', NULL, 'admin', 1),
('0058', '2018-12-17', 'DP003', 'MT009', 'EFECTIVO', 'ABONO DE FACTURA 0020', 'US$', '50.00', 0, '', '0.00', '', '2019-07-13 15:07:56', NULL, 'admin', 1),
('0060', '2018-12-19', 'DP003', 'MT007', 'EFECTIVO', 'ABONO A LA FACTURA 0018', 'US$', '40.00', 0, '', '0.00', '', '2019-07-13 15:07:05', NULL, 'admin', 1),
('0061', '2018-12-19', 'DP003', 'MT008', 'EFECTIVO', 'ABONO FACTURA 0017', 'US$', '30.00', 0, '', '0.00', '', '2019-07-13 15:07:27', NULL, 'admin', 1),
('0062', '2018-12-22', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA 0083', 'US$', '36.00', 0, '', '0.00', '', '2019-07-21 17:07:38', NULL, 'admin', 1),
('0063', '2019-01-03', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA 0083', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 17:07:41', NULL, 'admin', 1),
('0064', '2019-01-03', 'DP003', 'MT011', 'EFECTIVO', 'ABONO FACTURA 0052', 'US$', '100.00', 0, '', '0.00', '', '2019-07-13 15:07:01', NULL, 'admin', 1),
('0065', '2019-01-03', 'DP003', 'MT010', 'EFECTIVO', 'CANCELACION DE FACTURA 0051', 'US$', '27.00', 0, '', '0.00', '', '2019-07-13 15:07:18', NULL, 'admin', 1),
('0066', '2019-01-09', 'DP003', 'ES001', 'EFECTIVO', 'CANCELACION DE FACTURA 0011', 'US$', '37.48', 0, '', '0.00', '', '2019-07-13 15:07:04', NULL, 'admin', 1),
('0067', '2019-01-09', 'DP003', 'ES002', 'EFECTIVO', 'ABONO A FACTURA 0010', 'US$', '32.56', 0, '', '0.00', '', '2019-07-19 09:07:34', NULL, 'admin', 1),
('0068', '2018-01-09', 'DP003', 'ES003', 'EFECTIVO', 'ABONO A FACTURA 0009', 'US$', '50.00', 0, '', '0.00', '', '2019-07-19 09:07:20', NULL, 'admin', 1),
('0069', '2019-01-09', 'DP003', 'ES004', 'EFECTIVO', 'ABONO DE FACTURA', 'US$', '40.00', 0, '', '0.00', '', '2019-07-19 09:07:28', NULL, 'admin', 1),
('0070', '2019-01-09', 'DP003', 'MT009', 'EFECTIVO', 'ABONO DE FACTURA', 'US$', '100.00', 0, '', '0.00', '', '2019-07-19 09:07:47', NULL, 'admin', 1),
('0071', '2019-01-23', 'DP003', 'MT003', 'EFECTIVO', 'ABONO FACTURA 0082', 'US$', '30.34', 0, '', '0.00', '', '2019-07-21 14:07:55', NULL, 'admin', 1),
('0072', '2019-02-06', 'DP003', 'MT004', 'EFECTIVO', 'CANCELACION DE FACTIRA 0083', 'US$', '44.00', 0, '', '0.00', '', '2019-07-21 17:07:56', NULL, 'admin', 1),
('0073', '2019-02-06', 'DP003', 'MT009', 'EFECTIVO', 'ABONO DE FACTURA 0020', 'US$', '100.00', 0, '', '0.00', '', '2019-07-19 09:07:32', NULL, 'admin', 1),
('0074', '2019-02-07', 'DP003', 'MT008', 'EFECTIVO', 'ABONO DE FACTURA 0053', 'US$', '30.34', 0, '', '0.00', '', '2019-07-19 09:07:34', NULL, 'admin', 1),
('0075', '2019-02-07', 'DP003', 'MT003', 'EFECTIVO', 'ABONO FACTURA 0082', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 14:07:01', NULL, 'admin', 1),
('0076', '2019-02-07', 'DP003', 'MT002', 'EFECTIVO', 'ABONO A FACTURA 0014', 'US$', '60.00', 0, '', '0.00', '', '2019-07-19 09:07:01', NULL, 'admin', 1),
('0077', '2019-02-07', 'DP003', 'ES002', 'EFECTIVO', 'ABONO A LA FACTURA 0010', 'US$', '30.30', 0, '', '0.00', '', '2019-07-19 09:07:58', NULL, 'admin', 1),
('0078', '2019-02-07', 'DP003', 'ES003', 'EFECTIVO', 'ABONO A FACTURA 0009', 'US$', '50.00', 0, '', '0.00', '', '2019-07-19 09:07:19', NULL, 'admin', 1),
('0079', '2019-02-07', 'DP003', 'ES004', 'EFECTIVO', 'ABONO A FACTURA 0019', 'US$', '15.00', 0, '', '0.00', '', '2019-07-19 09:07:32', NULL, 'admin', 1),
('0080', '2019-02-09', 'DP001', 'MY001', 'EFECTIVO', 'CANCELACION DE FACTURA 0057', 'US$', '27.00', 0, '', '0.00', '', '2019-07-19 09:07:37', NULL, 'admin', 1),
('0081', '2019-02-14', 'DP003', 'MT011', 'EFECTIVO', 'ABONO FACTURA 0052', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 09:07:03', NULL, 'admin', 1),
('0082', '2019-02-09', 'DP001', 'MY002', 'EFECTIVO', 'ABONO A FACTURA 0059', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 11:07:56', NULL, 'admin', 1),
('0083', '2019-02-15', 'DP003', 'MT002', 'EFECTIVO', 'ABONO FACTURA 0059', 'US$', '10.00', 0, '', '0.00', '', '2019-07-19 09:07:08', NULL, 'admin', 1),
('0084', '2019-02-16', 'DP003', 'MT008', 'EFECTIVO', 'ABONO FACTURA 0017', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 09:07:50', NULL, 'admin', 1),
('0085', '2019-03-02', 'DP003', 'MT008', 'EFECTIVO', 'ABONO FACTURA', 'US$', '30.21', 0, '', '0.00', '', '2019-07-19 10:07:59', NULL, 'admin', 1),
('0086', '2019-03-02', 'DP003', 'MT010', 'EFECTIVO', 'ABONO FACTURA 0055', 'US$', '12.00', 0, '', '0.00', '', '2019-07-19 10:07:44', NULL, 'admin', 1),
('0087', '2019-03-02', 'DP003', 'MT011', 'EFECTIVO', 'ABONO FACTURA 0052', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 10:07:32', NULL, 'admin', 1),
('0088', '2019-03-02', 'DP003', 'MT007', 'EFECTIVO', 'ABONO FACTURA 0018', 'US$', '30.21', 0, '', '0.00', '', '2019-07-19 10:07:05', NULL, 'admin', 1),
('0089', '2019-03-07', 'DP003', 'MT003', 'EFECTIVO', 'ABONO A FACTURA 0082', 'US$', '30.16', 0, '', '0.00', '', '2019-07-21 14:07:26', NULL, 'admin', 1),
('0090', '2019-03-07', 'DP003', 'ES002', 'EFECTIVO', 'CANCELACION FACTURA 0010', 'US$', '47.14', 0, '', '0.00', '', '2019-07-19 10:07:00', NULL, 'admin', 1),
('0091', '2019-03-07', 'DP003', 'ES003', 'EFECTIVO', 'CANCELACION FACTURA 0009', 'US$', '60.00', 0, '', '0.00', '', '2019-07-19 10:07:15', NULL, 'admin', 1),
('0092', '2019-03-07', 'DP003', 'ES004', 'EFECTIVO', 'ABONO A FACTURA 0019', 'US$', '60.00', 0, '', '0.00', '', '2019-07-19 10:07:57', NULL, 'admin', 1),
('0093', '2019-03-14', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA 0054', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 10:07:30', NULL, 'admin', 1),
('0094', '2028-10-23', 'DP003', 'ES002', 'EFECTIVO', 'ABONO A FACTURA 0010', 'US$', '100.00', 0, '', '0.00', '', '2019-07-09 23:07:47', NULL, 'admin', 1),
('0095', '2019-03-15', 'DP001', 'MT010', 'EFECTIVO', 'CANCELACION 0055', 'US$', '15.00', 0, '', '0.00', '', '2019-07-19 10:07:57', NULL, 'admin', 1),
('0096', '2019-03-17', 'DP003', 'MT008', 'EFECTIVO', 'ABONO FACTURA 0017', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 10:07:06', NULL, 'admin', 1),
('0097', '2019-03-17', 'DP003', 'MT007', 'EFECTIVO', 'ABONO FACTURA 00', 'US$', '25.00', 0, '', '0.00', '', '2019-07-19 10:07:13', NULL, 'admin', 1),
('0098', '2019-03-17', 'DP003', 'MT011', 'EFECTIVO', 'ABONO FACTURA 0052', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 10:07:16', NULL, 'admin', 1),
('0099', '2018-11-06', 'DP003', 'ES003', 'EFECTIVO', 'ABONO FACTURA 0009', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 16:07:14', NULL, 'admin', 1),
('0100', '2019-04-02', 'DP003', 'MT008', 'EFECTIVO', 'CANCELA FACTURA 0053, ABONA FACTURA 0017', 'US$', '29.89', 0, '', '0.00', '', '2019-07-19 10:07:16', NULL, 'admin', 1),
('0101', '2019-01-16', 'DP001', 'CD001', 'EFECTIVO', 'CANCELACION FACTURA 0101', 'US$', '27.14', 0, '', '0.00', '', '2019-07-19 10:07:26', NULL, 'admin', 1),
('0102', '2019-01-25', 'DP001', 'RV003', 'EFECTIVO', 'ABONO DE FACTURA 0006', 'US$', '20.00', 0, '', '0.00', '', '2019-07-19 10:07:36', NULL, 'admin', 1),
('0103', '2019-01-25', 'DP001', 'RV004', 'EFECTIVO', 'CANCELACION DE FACTUR ', 'US$', '59.25', 0, '', '0.00', '', '2019-07-19 10:07:07', NULL, 'admin', 1),
('0104', '2019-01-25', 'DP001', 'RV006', 'EFECTIVO', 'CANCELACION DE FACTURA 0022', 'US$', '80.00', 0, '', '0.00', '', '2019-07-19 10:07:34', NULL, 'admin', 1),
('0105', '2019-01-25', 'DP001', 'RV005', 'EFECTIVO', 'ABONO FACTURA 0008', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 10:07:47', NULL, 'admin', 1),
('0106', '2019-01-25', 'DP001', 'MY002', 'EFECTIVO', 'ABONO A FACTURA 0059', 'US$', '20.00', 0, '', '0.00', '', '2019-07-19 11:07:10', NULL, 'admin', 1),
('0107', '2019-01-25', 'DP001', 'MY003', 'EFECTIVO', 'ABONO FACTURA 0013', 'US$', '45.00', 0, '', '0.00', '', '2019-07-19 10:07:14', NULL, 'admin', 1),
('0108', '2019-01-25', 'DP001', 'MY004', 'EFECTIVO', 'CANCELACION DE FACTURA 0026', 'US$', '210.00', 0, '', '0.00', '', '2019-07-19 10:07:48', NULL, 'admin', 1),
('0151', '2019-02-23', 'DP001', 'MY004', 'EFECTIVO', 'CANCELACION DE FACTURA 0102', 'US$', '36.00', 0, '', '0.00', '', '2019-07-19 11:07:31', NULL, 'admin', 1),
('0152', '2019-02-23', 'DP001', 'MY002', 'EFECTIVO', 'CANCELACION DE FACTURA 0059', 'US$', '10.00', 0, '', '0.00', '', '2019-07-19 11:07:46', NULL, 'admin', 1),
('0153', '2019-02-23', 'DP001', 'RV005', 'EFECTIVO', 'ABONO DE FACTURA 0008', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 11:07:54', NULL, 'admin', 1),
('0154', '2019-02-25', 'DP001', 'CE001', 'EFECTIVO', 'ABONO A FACTURA 0103', 'US$', '20.00', 0, '', '0.00', '', '2019-07-19 12:07:03', NULL, 'admin', 1),
('0155', '2019-02-26', 'DP001', 'MG001', 'EFECTIVO', 'ABONO A FACTURA 0005', 'US$', '50.00', 0, '', '0.00', '', '2019-07-19 12:07:49', NULL, 'admin', 1),
('0156', '2019-03-12', 'DP001', 'RV005', 'EFECTIVO', 'ABONO FACTURA 0008', 'US$', '39.00', 0, '', '0.00', '', '2019-07-19 12:07:12', NULL, 'admin', 1),
('0157', '2019-03-12', 'DP001', 'RV002', 'EFECTIVO', 'CANCELACION FACTURA 0002', 'US$', '56.00', 0, '', '0.00', '', '2019-07-19 12:07:57', NULL, 'admin', 1),
('0158', '2019-03-23', 'DP001', 'MG001', 'EFECTIVO', 'ABONO FACTURA 0005', 'US$', '50.00', 0, '', '0.00', '', '2019-07-19 12:07:23', NULL, 'admin', 1),
('0159', '2019-03-23', 'DP001', 'RV003', 'EFECTIVO', 'ABONO FACTURA 0006', 'US$', '30.00', 0, '', '0.00', '', '2019-07-19 12:07:23', NULL, 'admin', 1),
('0160', '2019-03-23', 'DP001', 'RV005', 'EFECTIVO', 'CANCELACION DE FACTURA 0008', 'US$', '31.00', 0, '', '0.00', '', '2019-07-19 12:07:12', NULL, 'admin', 1),
('0161', '2018-12-22', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA 0083', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 16:07:49', NULL, 'admin', 1),
('0162', '2019-04-02', 'DP001', 'MG004', 'EFECTIVO', 'CANCELACION DE FACTURA N° 0105', 'US$', '120.00', 0, '', '0.00', 'PRIMER ABONO', '2019-06-28 13:06:22', NULL, 'admin', 1),
('0163', '2019-03-15', 'DP001', 'CE003', 'EFECTIVO', 'ABONO FACTURA 0106', 'US$', '4.78', 0, '', '0.00', '', '2019-07-20 21:07:58', NULL, 'admin', 1),
('0164', '2019-02-15', 'DP001', 'CE004', 'EFECTIVO', 'CANCELACION DE FACTURA 0107', 'US$', '3.58', 0, '', '0.00', '', '2019-07-20 21:07:55', NULL, 'admin', 1),
('0166', '2019-04-09', 'DP005', 'NG001', 'EFECTIVO', 'CANCELACION DE FACTURA 0127', 'US$', '110.70', 0, '', '0.00', '', '2019-07-20 22:07:53', NULL, 'admin', 1),
('0167', '2019-04-13', 'DP005', 'CH001', 'EFECTIVO', 'ABONO FACTURA 0124', 'US$', '24.07', 0, '', '0.00', '', '2019-07-20 22:07:50', NULL, 'admin', 1),
('0168', '2019-05-12', 'DP005', 'CH001', 'EFECTIVO', 'ABONO FACTURA 0124', 'US$', '24.06', 0, '', '0.00', '', '2019-07-20 22:07:11', NULL, 'admin', 1),
('0169', '2019-05-15', 'DP005', 'NG003', 'EFECTIVO', 'ABONO A FACTURA 0130', 'US$', '100.08', 0, '', '0.00', '', '2019-07-20 22:07:04', NULL, 'admin', 1),
('0170', '2019-05-18', 'DP005', 'CH001', 'EFECTIVO', 'ABONO FACTURA 0124', 'US$', '21.05', 0, '', '0.00', '', '2019-07-20 22:07:14', NULL, 'admin', 1),
('0171', '2019-05-21', 'DP005', 'NG002', 'EFECTIVO', 'ABONO FACTURA 0128', 'US$', '80.00', 0, '', '0.00', '', '2019-07-20 22:07:35', NULL, 'admin', 1),
('0172', '2019-05-25', 'DP005', 'CH001', 'EFECTIVO', 'ABONO FACTURA 0124', 'US$', '20.00', 0, '', '0.00', '', '2019-07-20 22:07:02', NULL, 'admin', 1),
('0181', '2019-05-01', 'DP001', 'GR001', 'EFECTIVO', 'CANCELACION DE FACTURA 0004', 'US$', '30.00', 0, '', '0.00', '', '2019-07-20 22:07:23', NULL, 'admin', 1),
('0187', '2019-07-13', 'DP001', 'MY001', 'EFECTIVO', 'CANCELACION DE FACTURA 0078', 'US$', '180.00', 0, '', '0.00', '', '2019-07-21 13:07:47', NULL, 'admin', 1),
('0188', '2019-07-13', 'DP001', 'MY006', 'EFECTIVO', 'ABONO FACTURA 0077', 'US$', '50.00', 0, '', '0.00', '', '2019-07-21 13:07:39', NULL, 'admin', 1),
('0201', '2019-04-02', 'DP003', 'MT014', 'EFECTIVO', 'CANCELCION FACTURA CONATDO 0063', 'US$', '250.00', 0, '', '0.00', '', '2019-07-20 22:07:44', NULL, 'admin', 1),
('0202', '2019-04-11', 'DP003', 'MT011', 'EFECTIVO', 'ABONO A FACTURA 0052', 'US$', '29.85', 0, '', '0.00', '', '2019-07-20 22:07:12', NULL, 'admin', 1),
('0203', '2019-04-11', 'DP003', 'MT003', 'EFECTIVO', 'CANCELACION DE FACTURA 0082', 'US$', '10.00', 0, '', '0.00', '', '2019-07-21 14:07:15', NULL, 'admin', 1),
('0204', '2019-05-21', 'DP003', 'MT010', 'EFECTIVO', 'ABONO DE FACTURA ', 'US$', '31.34', 0, '', '0.00', '', '2019-07-21 12:07:49', NULL, 'admin', 1),
('0205', '2019-04-23', 'DP003', 'MT015', 'EFECTIVO', 'ABONO FACTURA 0071', 'US$', '100.00', 0, '', '0.00', '', '2019-07-21 13:07:20', NULL, 'admin', 1),
('0206', '2019-04-29', 'DP003', 'MT004', 'EFECTIVO', 'ABONO A FACTURA 0054', 'US$', '30.00', 0, '', '0.00', '', '2019-07-21 13:07:44', NULL, 'admin', 1),
('0207', '2019-05-02', 'DP003', 'MT007', 'EFECTIVO', 'ABONO FACTURA 0018', 'US$', '20.91', 0, '', '0.00', '', '2019-07-21 13:07:20', NULL, 'admin', 1),
('0208', '2019-05-03', 'DP003', 'MT012', 'EFECTIVO', 'CANCELACION DE FACTURA 0060', 'US$', '86.22', 0, '', '0.00', '', '2019-07-21 13:07:50', NULL, 'admin', 1),
('0209', '2019-05-03', 'DP001', 'MT012', 'EFECTIVO', 'ABONO FACTURA 0060', 'US$', '27.00', 0, '', '0.00', '', '2019-07-21 13:07:43', NULL, 'admin', 1),
('0210', '2019-03-07', 'DP003', 'MT007', 'EFECTIVO', 'ABONO FACTURA 0018', 'US$', '30.00', 0, '', '0.00', '', '2019-07-21 13:07:18', NULL, 'admin', 1),
('0211', '2018-10-31', 'DP001', 'MY001', 'EFECTIVO', 'ABONO FACTURA 0012', 'US$', '61.00', 0, '', '0.00', '', '2019-07-21 17:07:31', NULL, 'admin', 1),
('0212', '2019-05-08', 'DP003', 'MT016', 'EFECTIVO', 'ABONO FACTURA 0072', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 12:07:09', NULL, 'admin', 1),
('0213', '2019-05-15', 'DP003', 'MT016', 'EFECTIVO', 'ABONO FACTURA 0072', 'US$', '20.00', 0, '', '0.00', '', '2019-07-21 12:07:47', NULL, 'admin', 1),
('0214', '2018-11-16', 'DP001', 'MY001', 'EFECTIVO', 'ABONO FACTURA 0012', 'US$', '91.00', 0, '', '0.00', '', '2019-07-21 17:07:45', NULL, 'admin', 1),
('0215', '2019-05-16', 'DP003', 'MT008', 'EFECTIVO', 'ABONO FACTURA 0017', 'US$', '29.88', 0, '', '0.00', '', '2019-07-21 13:07:59', NULL, 'admin', 1),
('0216', '2019-05-21', 'DP003', 'MT010', 'EFECTIVO', 'ABONO FACTURA 0067', 'US$', '29.87', 0, '', '0.00', '', '2019-07-21 12:07:33', NULL, 'admin', 1),
('0217', '2018-10-25', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 16:07:42', NULL, 'admin', 1),
('0218', '2019-05-21', 'DP003', 'MT011', 'EFECTIVO', 'CANCELACION DE FACTURA 0052', 'US$', '30.15', 0, '', '0.00', '', '2019-07-21 13:07:55', NULL, 'admin', 1),
('0219', '2019-05-22', 'DP003', 'MT005', 'EFECTIVO', 'ABONO FACTURA ', 'US$', '180.00', 0, '', '0.00', '', '2019-07-21 13:07:37', NULL, 'admin', 1),
('0220', '2019-05-23', 'DP001', 'MY001', 'EFECTIVO', 'CANCELACION DE FACTURA 0012', 'US$', '98.00', 0, '', '0.00', '', '2019-07-21 17:07:30', NULL, 'admin', 1),
('0221', '2019-05-23', 'DP003', 'MT016', 'EFECTIVO', 'ABONO FACTURA 0072', 'US$', '29.87', 0, '', '0.00', '', '2019-07-21 12:07:41', NULL, 'admin', 1),
('0222', '2019-06-07', 'DP003', 'MT016', 'EFECTIVO', 'ABONO FACTURA 0072', 'US$', '29.87', 0, '', '0.00', '', '2019-07-21 12:07:36', NULL, 'admin', 1),
('0223', '2019-06-07', 'DP001', 'MT008', 'EFECTIVO', 'ABONO FACTURA 0017', 'US$', '29.87', 0, '', '0.00', '', '2019-07-21 13:07:38', NULL, 'admin', 1),
('0224', '2019-06-07', 'DP003', 'MT005', 'EFECTIVO', 'CANELACION DE FACTURA 0066', 'US$', '103.00', 0, '', '0.00', '', '2019-07-21 13:07:16', NULL, 'admin', 1),
('0225', '2019-06-08', 'DP003', 'MT004', 'EFECTIVO', 'CANCELACION DE FACTUR 0054', 'US$', '3.00', 0, '', '0.00', '', '2019-07-21 13:07:36', NULL, 'admin', 1),
('0226', '2019-06-08', 'DP003', 'MT004', 'EFECTIVO', 'ABONO FACTURA 0062', 'US$', '17.07', 0, '', '0.00', '', '2019-07-21 13:07:55', NULL, 'admin', 1),
('0227', '2019-06-29', 'DP003', 'MT008', 'EFECTIVO', 'ABONO FACTURA 0017', 'US$', '10.00', 0, '', '0.00', '', '2019-07-21 13:07:07', NULL, 'admin', 1),
('0228', '2019-06-29', 'DP003', 'MT016', 'EFECTIVO', 'ABONO FACTURA 0072', 'US$', '20.00', 0, '', '0.00', '', '2019-07-21 12:07:14', NULL, 'admin', 1),
('0229', '2019-07-01', 'DP003', 'ES004', 'EFECTIVO', 'ABONO FACTURA 0080', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 13:07:21', NULL, 'admin', 1),
('0230', '2019-07-11', 'DP003', 'ES004', 'EFECTIVO', 'ABONO FACTURA 0080', 'US$', '40.00', 0, '', '0.00', '', '2019-07-21 13:07:17', NULL, 'admin', 1),
('0231', '2019-07-12', 'DP003', 'MT016', 'EFECTIVO', 'ABONO FACTURA 0027', 'US$', '30.00', 0, '', '0.00', '', '2019-07-21 12:07:39', NULL, 'admin', 1),
('0232', '2019-07-12', 'DP003', 'MT007', 'EFECTIVO', 'ABONO FACTURA 0018', 'US$', '60.00', 0, '', '0.00', '', '2019-07-21 13:07:18', NULL, 'admin', 1),
('0251', '2019-04-13', 'DP001', 'MY005', 'EFECTIVO', 'ABONO A FACTURA O 104', 'US$', '229.41', 0, '', '0.00', '', '2019-06-28 15:06:25', NULL, 'admin', 1),
('0252', '2019-04-13', 'DP001', 'MY005', 'EFECTIVO', 'ABONO FACTURA 0104', 'US$', '300.57', 0, '', '0.00', '', '2019-06-28 15:06:54', NULL, 'admin', 1),
('0253', '2019-04-13', 'DP001', 'MY005', 'EFECTIVO', 'CANCELACION DE FACTURA 0104', 'US$', '8.09', 0, '', '0.00', '', '2019-06-28 15:06:08', NULL, 'admin', 1),
('0254', '2019-04-16', 'DP001', 'MG001', 'EFECTIVO', 'CANCELACION FACTURA 0005', 'US$', '50.00', 0, '', '0.00', '', '2019-07-20 22:07:10', NULL, 'admin', 1),
('0255', '2019-05-07', 'DP001', 'MG006', 'EFECTIVO', 'CANCELACION DE FACTURA 0141', 'US$', '304.00', 0, '', '0.00', '', '2019-07-21 17:07:23', NULL, 'admin', 1),
('0256', '2019-06-08', 'DP001', 'MY006', 'EFECTIVO', 'ABONO FACTURA 077', 'US$', '100.00', 0, '', '0.00', '', '2019-07-21 13:07:43', NULL, 'admin', 1),
('0257', '2019-06-18', 'DP001', 'MG004', 'EFECTIVO', 'CANCELACION DE FACTURA N° 0105', 'US$', '130.00', 0, '', '0.00', '', '2019-06-28 13:06:37', NULL, 'admin', 1),
('0233', '2019-05-31', 'DP003', 'MT017', 'EFECTIVO', 'CANCELACION DE FACTURA 0073', 'US$', '250.00', 0, '', '0.00', '', '2019-07-24 08:07:05', NULL, 'admin', 1),
('0235', '2019-06-17', 'DP003', 'JI001', 'EFECTIVO', 'ABONO FACTURA ', 'US$', '179.00', 0, '', '0.00', '', '2019-07-24 08:07:40', NULL, 'admin', 1),
('0236', '2019-04-15', 'DP003', 'MT005', 'EFECTIVO', 'CQNCELACION DE FACTURA 0069', 'US$', '13.50', 0, '', '0.00', '', '2019-07-24 09:07:57', NULL, 'admin', 1),
('0237', '2019-01-15', 'DP003', 'MT013', 'EFECTIVO', 'CANCELACIOPN D3E FACTURA 0065', 'US$', '13.50', 0, '', '0.00', '', '2019-07-24 09:07:48', NULL, 'admin', 1),
('0234', '2019-05-29', 'DP003', 'ES004', 'EFECTIVO', 'CANCELACION DE FACTURA 0019 Y 0056', 'US$', '46.00', 0, '', '0.00', '', '2019-07-24 08:07:19', NULL, 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo_compra`
--

CREATE TABLE `recibo_compra` (
  `idRecCom` int(10) NOT NULL,
  `nRecCom` varchar(10) DEFAULT NULL,
  `fechaRecCom` date DEFAULT NULL,
  `tipoRecComp` varchar(15) DEFAULT NULL,
  `idProv` varchar(5) DEFAULT NULL,
  `idPer` varchar(5) DEFAULT NULL,
  `nomEntregaRecComp` varchar(255) DEFAULT NULL,
  `formPagoRecCom` varchar(10) DEFAULT NULL,
  `monedaRecCom` varchar(10) DEFAULT NULL,
  `tasaCambio` decimal(10,2) DEFAULT NULL,
  `nomBancoRecCom` varchar(100) DEFAULT NULL,
  `nCkBancoRecCom` varchar(20) DEFAULT NULL,
  `conceptRecCom` varchar(255) DEFAULT NULL,
  `ObsevRecCom` varchar(255) DEFAULT NULL,
  `estadoRecCom` tinyint(10) DEFAULT NULL,
  `totalRecCom` decimal(10,2) DEFAULT NULL,
  `nomUserRefRecFact` varchar(255) DEFAULT NULL,
  `fechaRegRecComp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remanente_cobro`
--

CREATE TABLE `remanente_cobro` (
  `idRem` int(11) NOT NULL,
  `NRecComp` varchar(10) DEFAULT NULL,
  `NFactComp` varchar(10) DEFAULT NULL,
  `totFactComp` decimal(13,2) DEFAULT NULL,
  `totRecComp` decimal(13,2) DEFAULT NULL,
  `totAbonos` decimal(13,2) DEFAULT NULL,
  `cantRemComp` decimal(13,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `remanente_cobro`
--

INSERT INTO `remanente_cobro` (`idRem`, `NRecComp`, `NFactComp`, `totFactComp`, `totRecComp`, `totAbonos`, `cantRemComp`) VALUES
(1, '0253', '0104', '538.00', '8.09', '538.07', '0.07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_vendedor`
--

CREATE TABLE `ruta_vendedor` (
  `id_ruta_vendedor` int(255) NOT NULL,
  `idPer` varchar(5) DEFAULT NULL,
  `id_ruta_zona` varchar(5) DEFAULT NULL,
  `obs_ruta_venta` varchar(255) DEFAULT NULL,
  `estado_ruta_venta` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta_vendedor`
--

INSERT INTO `ruta_vendedor` (`id_ruta_vendedor`, `idPer`, `id_ruta_zona`, `obs_ruta_venta`, `estado_ruta_venta`) VALUES
(1, 'DP001', 'ZSO01', NULL, 1),
(2, 'DP003', 'ZNT01', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_zona`
--

CREATE TABLE `ruta_zona` (
  `id_ruta_zona` varchar(5) NOT NULL,
  `idEsRe` int(11) NOT NULL,
  `nom_ruta_zona` varchar(50) NOT NULL,
  `des_ruta_zona` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta_zona`
--

INSERT INTO `ruta_zona` (`id_ruta_zona`, `idEsRe`, `nom_ruta_zona`, `des_ruta_zona`) VALUES
('ZCR01', 3, 'Zona Caribe', 'Caribe del Norte (RAAN) y Caribe del Sur (RAAS)'),
('ZCS01', 2, 'Zona Centro Sur', 'Boaco, Chontales y Rio San Juan'),
('ZMA01', 1, 'Zona Managua Arriba', 'Madera, Puertas Viejas, San Benito, Tipitapa, Las Mercedes, Carretra Norte, Rubenia, Mayoreo, Bello Horizonte, Ciudad Jardin'),
('ZNT01', 2, 'Zona Norte', 'Estelí, Madriz, Nueva Segovia, Jinotega y Matagalpa'),
('ZOC01', 1, 'Zona Occidente', 'León y Chinandega'),
('ZSO01', 1, 'Zona Sur Oriente', 'Masaya, Granada, Carazo y Rivas'),
('ZMA02', 1, 'Zona Managua Centro', ''),
('ZMA03', 1, 'Zona Managua Abajo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_ruta_zona`
--

CREATE TABLE `sub_ruta_zona` (
  `id_sub_ruta_zona` varchar(5) NOT NULL,
  `id_ruta_zona` varchar(5) NOT NULL,
  `des_ruta_zona` varchar(250) DEFAULT NULL,
  `id_Dept_cond` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_ruta_zona`
--

INSERT INTO `sub_ruta_zona` (`id_sub_ruta_zona`, `id_ruta_zona`, `des_ruta_zona`, `id_Dept_cond`) VALUES
('SZC01', 'ZCR01', 'Atlántico Sur', 16),
('SZC02', 'ZCR01', 'Atlántico Norte', 17),
('SZC01', 'ZCS01', 'Boaco', 13),
('SZC02', 'ZCS01', 'Chontales', 14),
('SZC03', 'ZCS01', 'Rio San Juan', 15),
('SZN01', 'ZNT01', 'Estelí', 8),
('SZN02', 'ZNT01', 'Madriz', 9),
('SZN03', 'ZNT01', 'Nueva Segovia', 10),
('SZN04', 'ZNT01', 'Jinotega', 11),
('SZN05', 'ZNT01', 'Matagalpa', 12),
('SZO01', 'ZOC01', 'Chinandega', 6),
('SZO02', 'ZOC01', 'León', 7),
('SZS01', 'ZSO01', 'Masaya', 12),
('SZS02', 'ZSO01', 'Granada', 3),
('SZS03', 'ZSO01', 'Carazo', 4),
('SZS04', 'ZSO01', 'Rivas', 5),
('SZA01', 'ZMA01', 'Tipitapa', 1),
('SZE01', 'ZMA02', 'Ticuantepe', 0),
('ZSJ01', 'ZMA03', 'Ciudad sandino', 0),
('', '', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofactcompra`
--

CREATE TABLE `tipofactcompra` (
  `idTipoFactCompra` int(10) NOT NULL,
  `nomTipoFactCompra` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipofactcompra`
--

INSERT INTO `tipofactcompra` (`idTipoFactCompra`, `nomTipoFactCompra`) VALUES
(1, 'Ordinaria'),
(2, 'Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carroceria_vehiculo`
--

CREATE TABLE `tipo_carroceria_vehiculo` (
  `idTipoCarroceriaVehiculo` int(255) NOT NULL,
  `idTipoVehiculo` int(255) DEFAULT NULL,
  `carroceriaVehiculo` varchar(255) DEFAULT NULL,
  `obsCarroceriaVehiculo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_carroceria_vehiculo`
--

INSERT INTO `tipo_carroceria_vehiculo` (`idTipoCarroceriaVehiculo`, `idTipoVehiculo`, `carroceriaVehiculo`, `obsCarroceriaVehiculo`) VALUES
(1, 1, 'Scooter', NULL),
(2, 1, 'Urbana', NULL),
(3, 1, 'Mensajera', NULL),
(4, 1, 'Touring', NULL),
(5, 1, 'Chopper', NULL),
(6, 1, 'Doble proposito', NULL),
(7, 1, 'En duro', NULL),
(8, 1, 'Deportiva', NULL),
(9, 2, 'Sedán', 'Cuenta con cuatro o más plazas y dos o más puertas, así como con techo fijo hasta la luna trasera.'),
(10, 2, 'Cupé', 'Los turismos cupé se caracterizan por contar con dos puertas laterales. Dependiendo del ángulo que forma la luneta trasera con la tapa del maletero o motor puede ser fastback (dos volúmenes) o notchback (tres volúmenes). Es frecuente que las marcas identi'),
(11, 2, 'Hatchback', 'Tradicional coche compacto, Es un vehículo de dos volúmenes (el maletero y el habitáculo están comunicados) cuyo maletero está integrado en el habitáculo y dispone de su propia puerta con luna trasera incluida. A diferencia del vehículo familiar la luna t'),
(12, 2, 'Descapotable / Cabriolet', 'Los cabrios son un tipo de coche según su carrocería que se caracterizan por no tener techo o contar con una capota extraíble o plegable. Una variante es el cupé-cabrio cuyo techo metálico se pliega y se recoge sobre la parte trasera.'),
(13, 2, 'Roadster', 'Los roadster son un tipo de coche deportivo biplaza con carrocería descapotable y ligera. El término proviene del inglés y se utilizaba para describir a los antiguos deportivos descapotables, que disponían de dos plazas y un banco plegable para otras dos '),
(14, 2, 'Station Wagon', 'Un coche familiar es un tipo de carrocería con el techo elevado hasta el portón trasero (en esto se diferencia de los vehículos hatchback). Dispone de un mayor volumen interior destinado al equipaje que permite incorporar una tercera fila de asientos o au'),
(15, 3, 'Pick-up', 'Es un tipo de camioneta?? empleado generalmente para el transporte de mercancías. Tiene en su parte trasera una zona de carga descubierta, especialmente útil para transportar objetos voluminosos. La plataforma de carga puede estar cubierta por una lona o '),
(16, 3, 'TodoTerreno', 'Es un tipo de vehículo pensado, en origen, para la circulación por terrenos difíciles: superficies de tierra, piedras, pendientes pronunciadas, con tracción a dos o más ejes. Cuenta con una estructura de bastidor independiente y se caracteriza, normalment'),
(17, 3, 'Crossover', 'Con una apariencia similar a los todoterreno, los crossover son los reyes del asfalto. Incluyen características como barras frontales de protección o suspensión alta, propias de un todoterreno, que combinan con una estética más compacta. Generalmente son '),
(18, 3, 'SUV', 'Se trata de un tipo de coche cuyo concepto deriva del todoterreno con el que comparte estética, altura de carrocería, tracción 4×4 y recorrido de suspensiones pero está adaptado para conducir sobre el asfalto. Tiene menor peso que un todoterreno y mayor c'),
(19, 2, 'Deportivo', 'Motores potentes, mayor velocidad máxima, mejor aceleración y adherencia. Los deportivos y superdeportivos son otro tipo de vehículo y el sueño de muchos. Suelen ser cupé o descapotable, además de biplazas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `idTipoVehiculo` int(255) NOT NULL,
  `tipoVehiculo` varchar(255) DEFAULT NULL,
  `obsVehiculo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`idTipoVehiculo`, `tipoVehiculo`, `obsVehiculo`) VALUES
(1, 'Motociclieta', NULL),
(2, 'Automovil', NULL),
(3, 'Camioneta', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unid_medida`
--

CREATE TABLE `unid_medida` (
  `id_unid_medida` int(11) NOT NULL,
  `nom_unid_medida` varchar(50) NOT NULL,
  `abrev_unid_medida` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unid_medida`
--

INSERT INTO `unid_medida` (`id_unid_medida`, `nom_unid_medida`, `abrev_unid_medida`) VALUES
(1, 'Miligramo', 'mg'),
(2, 'Gramo', 'g'),
(3, 'Kilogramo', 'kg'),
(4, 'Tonelada Metrica', 'tm'),
(5, 'Onza', 'oz'),
(6, 'Libra', 'lb'),
(7, 'Mililitro', 'ml'),
(8, 'Litro', 'lt'),
(9, 'Galón', 'gl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `idPer` varchar(5) DEFAULT NULL,
  `nomUser` char(100) DEFAULT NULL,
  `passUser` char(100) DEFAULT NULL,
  `privi` int(100) DEFAULT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `idUserCreador` varchar(5) DEFAULT NULL,
  `estadoUser` tinyint(1) DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `idUserDioBaja` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `idPer`, `nomUser`, `passUser`, `privi`, `fechaCreado`, `idUserCreador`, `estadoUser`, `fechaBaja`, `idUserDioBaja`) VALUES
(1, 'DP001', 'admin', '12345', 1, '2019-04-01 00:00:00', '1', 1, NULL, NULL),
(37, 'DP003', 'LSaenz', '1234567', 2, '2019-05-29 00:00:00', NULL, 1, NULL, NULL),
(38, 'DP004', 'RSilva', '123456', 2, '2019-05-29 00:00:00', NULL, 0, '2019-06-18 14:08:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idVehiculo` int(255) NOT NULL,
  `idPer` varchar(5) DEFAULT NULL,
  `urlFotoVehiculo` varchar(255) DEFAULT NULL,
  `urlCirculacion1` varchar(255) DEFAULT NULL,
  `urlCirculacion2` varchar(255) DEFAULT NULL,
  `numCirculacion` varchar(255) DEFAULT NULL,
  `numPlacaVehiculo` varchar(10) DEFAULT NULL,
  `numChasisVehiculo` varchar(255) DEFAULT NULL,
  `numMotorVehiculo` varchar(255) DEFAULT NULL,
  `tipoVehiculo` varchar(255) DEFAULT NULL,
  `carroseriaVehiculo` varchar(255) DEFAULT NULL,
  `colorVehiculo` varchar(255) DEFAULT NULL,
  `marcaVehiculo` varchar(255) DEFAULT NULL,
  `modelVehiculo` varchar(255) DEFAULT NULL,
  `anoVehiculo` varchar(255) DEFAULT NULL,
  `cilindrajeVehiculoCm3` varchar(255) DEFAULT NULL,
  `numCIlindroVehiculo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_permissions`
--
CREATE TABLE `view_permissions` (
`Usuario_id` int(10)
,`modules_id` varchar(20)
,`Full_name` varchar(50)
,`Icons` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_permissions`
--
DROP TABLE IF EXISTS `view_permissions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_permissions`  AS  select `t0`.`Usuario_id` AS `Usuario_id`,`t0`.`modules_id` AS `modules_id`,(select `t1`.`Modulo_full_name` from `modules` `t1` where (`t1`.`Modulo_name_id` = `t0`.`modules_id`)) AS `Full_name`,(select `t2`.`Modulo_Icon` from `modules` `t2` where (`t2`.`Modulo_name_id` = `t0`.`modules_id`)) AS `Icons` from `permissions` `t0` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogopersonal`
--
ALTER TABLE `catalogopersonal`
  ADD PRIMARY KEY (`idPer`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`idDetalleFact`);

--
-- Indices de la tabla `detallerecibo`
--
ALTER TABLE `detallerecibo`
  ADD PRIMARY KEY (`idDetRecibo`);

--
-- Indices de la tabla `detalle_fact_compra`
--
ALTER TABLE `detalle_fact_compra`
  ADD PRIMARY KEY (`idDetFComp`);

--
-- Indices de la tabla `detalle_rec_compra`
--
ALTER TABLE `detalle_rec_compra`
  ADD PRIMARY KEY (`idDetRecCom`);

--
-- Indices de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD PRIMARY KEY (`IdFactComp`) USING BTREE;

--
-- Indices de la tabla `recibo_compra`
--
ALTER TABLE `recibo_compra`
  ADD PRIMARY KEY (`idRecCom`);

--
-- Indices de la tabla `remanente_cobro`
--
ALTER TABLE `remanente_cobro`
  ADD PRIMARY KEY (`idRem`) USING BTREE;

--
-- Indices de la tabla `ruta_vendedor`
--
ALTER TABLE `ruta_vendedor`
  ADD PRIMARY KEY (`id_ruta_vendedor`) USING BTREE;

--
-- Indices de la tabla `tipofactcompra`
--
ALTER TABLE `tipofactcompra`
  ADD PRIMARY KEY (`idTipoFactCompra`);

--
-- Indices de la tabla `tipo_carroceria_vehiculo`
--
ALTER TABLE `tipo_carroceria_vehiculo`
  ADD PRIMARY KEY (`idTipoCarroceriaVehiculo`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`idTipoVehiculo`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `idDetalleFact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;
--
-- AUTO_INCREMENT de la tabla `detallerecibo`
--
ALTER TABLE `detallerecibo`
  MODIFY `idDetRecibo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT de la tabla `detalle_fact_compra`
--
ALTER TABLE `detalle_fact_compra`
  MODIFY `idDetFComp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `detalle_rec_compra`
--
ALTER TABLE `detalle_rec_compra`
  MODIFY `idDetRecCom` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  MODIFY `IdFactComp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `recibo_compra`
--
ALTER TABLE `recibo_compra`
  MODIFY `idRecCom` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `remanente_cobro`
--
ALTER TABLE `remanente_cobro`
  MODIFY `idRem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ruta_vendedor`
--
ALTER TABLE `ruta_vendedor`
  MODIFY `id_ruta_vendedor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipofactcompra`
--
ALTER TABLE `tipofactcompra`
  MODIFY `idTipoFactCompra` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_carroceria_vehiculo`
--
ALTER TABLE `tipo_carroceria_vehiculo`
  MODIFY `idTipoCarroceriaVehiculo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `idTipoVehiculo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
