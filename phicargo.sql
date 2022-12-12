-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2022 a las 10:58:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phicargo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL,
  `nombre_operador` varchar(60) DEFAULT NULL,
  `passwoord` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`id`, `nombre_operador`, `passwoord`, `status`) VALUES
(0, 'GENERAL', '12345', 0),
(262, 'CRUZ PEREZ JULIO CESAR', '12345', 0),
(271, 'GORDILLO SALAS JESUS IVAN', '12345', 0),
(277, 'HERRERA HERNANDEZ EUTIMIO', '12345', 0),
(278, 'HUERTA HERNANDEZ CARLOS ENRIQUE', '12345', 0),
(284, 'LARA CORTEZ YSMAEL', '12345', 0),
(286, 'LUNA VAZQUEZ JUAN JOSE', '12345', 0),
(287, 'MARTELL BAUTISTA ARMANDO', '12345', 0),
(288, 'MARTINEZ RUIZ RAMON', '12345', 0),
(292, 'PALACIOS ROQUE TEODORO', '12345', 0),
(295, 'PEGUEROS CRUZ VICENTE', '12345', 0),
(296, 'PEREZ RODRIGUEZ JUAN IGNACIO', '12345', 0),
(300, 'ROMAY AGUILAR VICTOR JAVIER', '12345', 1),
(302, 'SANGABRIEL MOTA MARIO', '12345', 0),
(303, 'SANGABRIEL MOTA RAFAEL', '12345', 0),
(304, 'SANGABRIEL SANGABRIEL MARIO ANTONIO', '12345', 0),
(312, 'VERDEJO MADRIGAL HUGO', '12345', 0),
(313, 'VILLALOBOS UTRERA JONATHAN', '12345', 0),
(315, 'WALDO CRUZ JOSE FRANCISCO', '12345', 0),
(349, 'RODRIGUEZ JIMENEZ ADAN LUZIEL', '12345', 0),
(374, 'VAZQUEZ SILVA MOISES', '12345', 0),
(376, 'CHAGALA HERRERA DEMETRIO', '12345', 0),
(384, 'MARTINEZ FERNANDEZ CARLOS ALBERTO', '12345', 0),
(390, 'PERM/OP-01', '12345', 0),
(391, 'FACUNDO BOJORQUEZ MARCOS ANTONIO', '12345', 0),
(392, 'ESPINOZA VAZQUEZ LEOBARDO', '12345', 0),
(403, 'MARTINEZ ARRIAGA JONATHAN', '12345', 0),
(407, 'LOPEZ ALVARADO JOSE MARIO', '12345', 0),
(420, 'SOLORZANO GUTIERREZ MARIA ROMELIA', '12345', 0),
(424, 'ARRIAGA OLVERA MIGUEL ALBERTO', '12345', 0),
(428, 'HIDALGO MARTINEZ ROBERTO MARTIN', '12345', 0),
(432, 'HERNANDEZ LOPEZ HECTOR', '12345', 0),
(436, 'CEBALLOS GONZALEZ PABLO', '12345', 0),
(437, 'PERM/OP-02', '12345', 0),
(453, 'HERNANDEZ SANCHEZ JUAN LUIS', '12345', 0),
(462, 'LOPEZ VILLA GONZALO', '12345', 0),
(463, 'VAZQUEZ ORTIZ BULMARO', '12345', 0),
(468, 'SANGABRIEL ARGUELLES RAFAEL', '12345', 0),
(477, 'CORTES HERNANDEZ ALEJANDRO', '12345', 0),
(481, 'CARDENAS ARRIAGA ANGEL ALBERTO', '12345', 0),
(491, 'MORENO HERNANDEZ RAMON ANTONIO', '12345', 0),
(534, 'PEREZ VALENTIN JOSE ALBERTO', '12345', 0),
(536, 'BLANCO MOLINA RUBEN', '12345', 0),
(537, 'MORALES VILLA SERGIO', '12345', 0),
(541, 'GUEVARA ROMAN GILBERTO', '12345', 0),
(549, 'MUÑOZ JIMENEZ JOSE ALFREDO', '12345', 0),
(573, 'MENDEZ MORENO JUAN CARLOS', '12345', 0),
(584, 'RAMOS CORTES IGNACIO', '12345', 0),
(585, 'JIMENEZ PINTO SILVESTRE', '12345', 0),
(586, 'PACHECO MORALES DAVID', '12345', 0),
(597, 'MELCHOR SANCHEZ ALDO', '12345', 0),
(599, 'RODRIGUEZ BAUTISTA MARIO EDUARDO', '12345', 0),
(615, 'MOLINA CRUZ JOSE FRANCISCO', '12345', 0),
(616, 'RAMIREZ MARTINEZ ALEXIS', '12345', 0),
(619, 'RIVERA CARRION ANGEL RICARDO', '12345', 0),
(620, 'ACEVEDO AGUILAR OSCAR', '12345', 0),
(623, 'BAUTISTA ZAMUDIO FERNANDO', '12345', 0),
(625, 'MARTINEZ REBOLLEDO JOSE DAVID', '12345', 0),
(629, 'MARTINEZ GARCIA JESUS ISRAEL', '12345', 0),
(630, 'AGUILAR OLIVARES ANDRES', '12345', 0),
(631, 'JIMENEZ TAMAYO VICTORINO', '12345', 0),
(634, 'MORALES GALLARDO RENE', '12345', 0),
(640, 'ZAMUDIO HERNANDEZ ENRIQUE', '12345', 0),
(641, 'RINCON FUENTES MIGUEL ANGEL', '12345', 0),
(649, 'ESTEBAN SOSA RODOLFO FLAVIO', '12345', 0),
(650, 'RODRIGUEZ MARTINEZ RIGOBERTO', '12345', 0),
(661, 'HERNANDEZ RUIZ JOSE CARLOS', '12345', 0),
(662, 'MARCELO GONZALEZ JOSE LUIS', '12345', 0),
(665, 'CUELLAR VIVANCO ANDRES', '12345', 0),
(667, 'RICARDEZ CASANOVA MELVIN DE JESUS', '12345', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `id_operador` int(11) NOT NULL,
  `placas` varchar(45) DEFAULT NULL,
  `fecha_llegada` date DEFAULT NULL,
  `hora_llegada` time DEFAULT NULL,
  `comentarios` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `id_operador`, `placas`, `fecha_llegada`, `hora_llegada`, `comentarios`) VALUES
(360, 0, '44AY8J', '2022-12-08', '16:48:49', ''),
(361, 0, '40AY8J', '2022-12-08', '16:37:09', ''),
(362, 0, '13AG8H', '2022-12-08', '16:46:03', ''),
(363, 0, '42AS8S', '2022-12-08', '16:48:02', ''),
(364, 0, '39AY8J', '2022-12-07', '15:32:00', ''),
(365, 0, '33AM4Y', '2022-12-08', '16:31:28', ''),
(366, 0, '42AY8J', '2022-12-08', '16:43:38', ''),
(367, 0, '57AR7E', '2022-12-08', '16:49:14', ''),
(368, 0, '37AM2Y', '2022-12-08', '17:28:31', ''),
(369, 0, '42AS8S', '2022-12-08', '17:51:35', ''),
(370, 0, '21AA6V', '2022-12-08', '17:57:22', ''),
(371, 0, '22AA6V', '2022-12-08', '18:01:22', ''),
(372, 0, '73AD9Z', '2022-12-08', '18:03:09', ''),
(373, 0, '13AG8H', '2022-12-08', '18:14:38', ''),
(375, 0, '10AH6D', '2022-12-08', '18:42:49', ''),
(376, 0, '13AG8H', '2022-12-08', '20:01:55', ''),
(377, 0, '37AM2Y', '2022-12-08', '20:21:40', ''),
(378, 0, '21AA6V', '2022-12-08', '20:30:13', ''),
(379, 0, '10AH6D', '2022-12-08', '20:52:50', ''),
(380, 0, '37AM2Y', '2022-12-08', '21:24:38', ''),
(381, 0, '16AX5A', '2022-12-08', '21:49:37', ''),
(382, 0, '84AK2A', '2022-12-08', '22:11:43', ''),
(383, 0, '10AM1D', '2022-12-08', '22:32:17', ''),
(384, 0, '22AA6V', '2022-12-08', '22:33:18', ''),
(385, 0, '17AX5A', '2022-12-08', '22:35:21', ''),
(386, 0, '84AK2A', '2022-12-08', '23:46:37', ''),
(387, 0, '10AM1D', '2022-12-08', '23:49:00', ''),
(388, 0, '21AA6V', '2022-12-09', '00:40:54', ''),
(389, 0, '22AA6V', '2022-12-09', '01:26:41', ''),
(390, 0, '86AK2A', '2022-12-09', '02:51:08', ''),
(391, 0, '86AK2A', '2022-12-09', '04:06:12', ''),
(392, 0, '86AK2A', '2022-12-09', '05:19:34', ''),
(393, 0, '15AX5A', '2022-12-09', '06:11:56', ''),
(394, 0, '72AD9Z', '2022-12-09', '08:31:01', ''),
(395, 0, '72AD9Z', '2022-12-09', '09:55:17', ''),
(396, 0, '10AM1D', '2022-12-09', '11:44:56', ''),
(397, 0, '21AA6V', '2022-12-09', '14:18:40', ''),
(398, 0, '42AY8J', '2022-12-09', '14:23:36', ''),
(399, 0, '22AA6V', '2022-12-09', '15:46:14', ''),
(400, 0, '72AD9Z', '2022-12-09', '16:22:41', ''),
(401, 0, '17AX5A', '2022-12-09', '17:27:44', ''),
(402, 0, '10AH6D', '2022-12-09', '17:47:48', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `placas` varchar(45) NOT NULL,
  `unidad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`placas`, `unidad`, `estado`) VALUES
('', 'PERM/C-01', 'FUERA'),
('06AM1D', 'C-0027', 'FUERA'),
('08AM1D', 'C-0025', 'FUERA'),
('10AH6D', 'C-0081', 'DENTRO'),
('10AM1D', 'C-0023', 'DENTRO'),
('112AK4', 'C-0069', 'FUERA'),
('11AH6D', 'C-0084', 'FUERA'),
('11AM1D', 'C-0022', 'FUERA'),
('11AS8S', 'C-0118', 'FUERA'),
('12AH6D', 'C-0082', 'FUERA'),
('12AS8S', 'C-0117', 'FUERA'),
('13AG8H', 'C-0100', 'FUERA'),
('13AH6D', 'C-0083', 'FUERA'),
('13AS8S', 'C-0116', 'FUERA'),
('15AX5A', 'C-0122', 'FUERA'),
('16AX5A', 'C-0120', 'FUERA'),
('17AX5A', 'C-0121', 'FUERA'),
('207DX8', 'C-0070', 'FUERA'),
('21AA6V', 'C-0014', 'FUERA'),
('228DX4', 'C-0080', 'FUERA'),
('22AA6V', 'C-0016', 'FUERA'),
('23AA6V', 'C-0017', 'FUERA'),
('259AR2', 'C-0064', 'FUERA'),
('25AS3T', 'C-0119', 'FUERA'),
('25FA8B', 'C-0107', 'FUERA'),
('33AM2Y', 'C-0031', 'FUERA'),
('33AM4Y', 'C-0026', 'DENTRO'),
('34AL1G', 'CR-001', 'FUERA'),
('34AM2Y', 'C-0030', 'FUERA'),
('34AM4Y', 'C-0024', 'FUERA'),
('35AM2Y', 'C-0029', 'FUERA'),
('35AM4Y', 'C-0062', 'FUERA'),
('36AM2Y', 'C-0028', 'FUERA'),
('36AR9F', 'C-0111', 'FUERA'),
('37AM2Y', 'C-0103', 'FUERA'),
('37AR9F', 'C-0112', 'FUERA'),
('38AM2Y', 'C-0101', 'FUERA'),
('38AR9F', 'C-0114', 'FUERA'),
('39AR9F', 'C-0113', 'FUERA'),
('39AY8J', 'C-0127', 'DENTRO'),
('40AY8J', 'C-0128', 'DENTRO'),
('41AY8J', 'C-0126', 'FUERA'),
('42AS8S', 'C-0102', 'FUERA'),
('42AY8J', 'C-0125', 'DENTRO'),
('43AK4M', 'C-0063', 'FUERA'),
('43AY8J', 'C-0124', 'FUERA'),
('44AY8J', 'C-0123', 'DENTRO'),
('46AY8J', 'C-0129', 'FUERA'),
('51AM1D', 'C-0032', 'FUERA'),
('57AR7E', 'C-0015', 'DENTRO'),
('66AM4Y', 'C-0020', 'FUERA'),
('72AD9Z', 'C-0053', 'DENTRO'),
('73AD9Z', 'C-0054', 'FUERA'),
('744FF3', 'C-0104', 'FUERA'),
('748FF3', 'C-0108', 'FUERA'),
('74AD9Z', 'C-0055', 'FUERA'),
('75AM4Y', 'C-0052', 'FUERA'),
('77AC7T', 'C-0021', 'FUERA'),
('77AM1D', 'C-0033', 'FUERA'),
('789DX3', 'C-0071', 'FUERA'),
('78AM1D', 'C-0034', 'FUERA'),
('815AK3', 'C-0075', 'FUERA'),
('83AK2A', 'C-0057', 'FUERA'),
('842AT4', 'C-0040', 'FUERA'),
('844AT4', 'C-0041', 'FUERA'),
('84AC7M', 'SERVI/L-009', 'FUERA'),
('84AK2A', 'C-0060', 'FUERA'),
('850FE9', 'CR-002', 'FUERA'),
('85AK2A', 'C-0061', 'FUERA'),
('85AS2B', 'C-0115', 'FUERA'),
('86AK2A', 'C-0058', 'FUERA'),
('86AS2B', 'SERVI/C-001', 'FUERA'),
('87AK2A', 'C-0056', 'FUERA'),
('887DY1', 'C-0048', 'FUERA'),
('88AK2A', 'C-0059', 'FUERA'),
('890DY1', 'C-0045', 'FUERA'),
('91AX5A', 'C-0100', 'FUERA'),
('92AX5A', 'C-0083', 'FUERA'),
('93FA5A', 'C-0109', 'FUERA'),
('94AA5V', 'C-0012', 'FUERA'),
('95FA5A', 'C-0105', 'FUERA'),
('98AN3R', 'C-0035', 'FUERA'),
('98FA5A', 'C-0106', 'FUERA'),
('99AN3R', 'C-0036', 'FUERA'),
('99FA5A', 'C-0110', 'FUERA'),
('FVX225A', 'U-017', 'FUERA'),
('N/A', 'SERVI/B-002', 'FUERA'),
('S/P', 'GENERAL01', 'FUERA'),
('SP', 'PERM/C-04', 'FUERA'),
('XJ6746A', 'U-011', 'FUERA'),
('YRW381A', 'MARCH', 'FUERA'),
('YUX276A', 'U-016', 'FUERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `passwoord` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre`, `passwoord`, `tipo`) VALUES
(1, 'monitorista', NULL, '12345', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`,`id_operador`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`placas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
