-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2021 a las 22:38:39
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mesa_ayuda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `IDAREA` varchar(10) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `FKEMPLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`IDAREA`, `NOMBRE`, `FKEMPLE`) VALUES
('10', 'INFORMÁTICA', '1'),
('20', 'GESTIÓN HUMANA', '2'),
('30', 'MANTENIMIENTO', '6'),
('40', 'CONTABILIDAD', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `IDCARGO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`IDCARGO`, `NOMBRE`) VALUES
(1, 'Administrador del Sistema'),
(2, 'Programador'),
(3, 'D.B.A.'),
(4, 'Diseñador Web'),
(5, 'Técnico Ensamble PCs'),
(6, 'Electricista'),
(7, 'Contador'),
(8, 'Auxiliar Contable'),
(9, 'Trabajador Social'),
(10, 'Auxiliar Trabajador Social'),
(11, 'Gerente'),
(12, 'Publicista'),
(13, 'Albañil'),
(14, 'Conductor'),
(15, 'Mecánico'),
(16, 'Electrico Automotriz'),
(17, 'Soldador'),
(18, 'Jefe Talento Humano'),
(19, 'Coordinador Talento Humano'),
(20, 'Auxiliar Talento Humano'),
(21, 'Jefe Mantenimiento'),
(22, 'Coordinador Mantenimiento'),
(23, 'Auxiliar Mantenimiento'),
(24, 'Jefe Informática'),
(25, 'Coordinador Informática'),
(64, 'Diseño Interiores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_por_empleado`
--

CREATE TABLE `cargo_por_empleado` (
  `FKCARGO` int(11) NOT NULL,
  `FKEMPLE` varchar(20) NOT NULL,
  `FECHAINI` date NOT NULL,
  `FECHAFIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo_por_empleado`
--

INSERT INTO `cargo_por_empleado` (`FKCARGO`, `FKEMPLE`, `FECHAINI`, `FECHAFIN`) VALUES
(1, '6', '2021-04-11', '0000-00-00'),
(2, '1', '2021-04-09', '2021-04-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereq`
--

CREATE TABLE `detallereq` (
  `IDDETALLE` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  `OBSERVACION` varchar(4000) NOT NULL,
  `FKREQ` int(11) NOT NULL,
  `FKESTADO` varchar(1) NOT NULL,
  `FKEMPLE` varchar(20) NOT NULL,
  `FKEMPLEASIGNADO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallereq`
--

INSERT INTO `detallereq` (`IDDETALLE`, `FECHA`, `OBSERVACION`, `FKREQ`, `FKESTADO`, `FKEMPLE`, `FKEMPLEASIGNADO`) VALUES
(36, '2021-04-09 17:55:00', 'El PC presenta ruidos extraños en el interior; Su velocidad se ha reducido drásticamente en los últimos días y gasta mucha batería.', 33, '1', '6', NULL),
(48, '2021-04-14 14:39:00', 'El equipo Ha presentado fallas generales esta semana; Ha mostrado pantalla azul y dice que windows no ha podido iniciarse. También he notado que el ventilador suena bastante fuerte y algunas veces siento un olor a quemado en el interior, por lo cual me toca apagarlo.', 38, '1', '6', NULL),
(49, '2021-04-14 14:41:00', 'He notado que mi oficina en ocasiones presenta altibajos de electricidad. Ya se han quemado varios focos.', 39, '1', '6', NULL),
(50, '2021-04-14 14:52:00', 'Me gustaría Expresar una queja en cuanto a uno de mis compañeros, concretamente Ana. En ocasiones he visto como a la hora de almorzar ella usa el horno para calentar su comida, pero tarda demasiado, lo cual causa que los demás no podamos hacer uso del mismo. Me gustaría que se le hiciera un llamado de atención para que mejore esta actitud.', 40, '1', '5', NULL),
(51, '2021-04-14 14:56:00', 'Hay una pared que desde hace unos días no hace más que molestar. Parece que tiene el empaque dañado, ya que cuando llueve se filtra el agua.', 41, '1', '4', NULL),
(52, '2021-04-14 15:24:00', 'El PC esta quedándose sin almacenamiento. No sé que es lo que pasa. Solo guardo Archivos de Excel.\r\nCada día tengo menos espacio; el disco duro es de 1 Tb y tengo ocupadas cerca de 840 Gb. No entiendo cual pude ser el problema.\r\n', 42, '1', '4', NULL),
(53, '2021-04-14 15:31:00', 'Me gustaría que de parte del departamento de gestión humana, le dieran una felicitación a los compañeros, Brandon Camilo Castrillon, Ana y Carlos Sanchez, debido a que gracias a su labor se pudo reestablecer el servidor el día de hoy y que tenia afectada gran parte de nuestra red; muchos de nuestro clientes llamaban a preguntar el por qué sus servicios  no funcionaba el día de hoy.', 43, '1', '1', NULL),
(92, '2021-04-18 10:01:00', ' El equipo Ha presentado fallas generales esta semana; Ha mostrado pantalla azul y dice que windows no ha podido iniciarse. También he notado que el ventilador suena bastante fuerte y algunas veces siento un olor a quemado en el interior, por lo cual me toca apagarlo.', 38, '2', '6', '1'),
(93, '2021-04-18 10:37:00', 'prueba solucion', 38, '3', '6', '1'),
(94, '2021-04-18 10:38:00', 'solución final', 38, '4', '6', '1'),
(96, '2021-04-23 11:35:41', ' Me gustaría Expresar una queja en cuanto a uno de mis compañeros, concretamente Ana. En ocasiones he visto como a la hora de almorzar ella usa el horno para calentar su comida, pero tarda demasiado, lo cual causa que los demás no podamos hacer uso del mismo. Me gustaría que se le hiciera un llamado de atención para que mejore esta actitud.', 40, '2', '5', '2'),
(97, '2021-04-23 11:41:00', ' Me gustaría que de parte del departamento de gestión humana, le dieran una felicitación a los compañeros, Brandon Camilo Castrillon, Ana y Carlos Sanchez, debido a que gracias a su labor se pudo reestablecer el servidor el día de hoy y que tenia afectada gran parte de nuestra red; muchos de nuestro clientes llamaban a preguntar el por qué sus servicios  no funcionaba el día de hoy.', 43, '2', '1', '3'),
(98, '2021-04-23 13:07:00', 'prueba solucion', 43, '3', '1', '3'),
(99, '2021-04-23 13:07:00', 'prueba solucion', 43, '4', '1', '3'),
(100, '2021-04-23 15:24:00', 'prueba', 40, '3', '5', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `IDEMPLEADO` varchar(20) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `FOTO` varchar(200) DEFAULT NULL,
  `HOJAVIDA` varchar(200) DEFAULT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `X` double DEFAULT NULL,
  `Y` double DEFAULT NULL,
  `fkEMPLE_JEFE` varchar(20) DEFAULT NULL,
  `fkAREA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IDEMPLEADO`, `NOMBRE`, `FOTO`, `HOJAVIDA`, `TELEFONO`, `EMAIL`, `DIRECCION`, `X`, `Y`, `fkEMPLE_JEFE`, `fkAREA`) VALUES
('1', 'Sebastian Arbelaez', 'C:xampphtdocsproyectoMesaAyudavistaft3.pdf', 'C:xampphtdocsproyectoMesaAyudavistahvs3.pdf', '455', 'sebas@gmail.com', 'Calle 25D sur 57 int 374', -58.65882, 74.55889, '3', '10'),
('123', 'Genérico Muestra', 'C:xampphtdocsproyectoMesaAyudavistaft3.pdf', 'C:xampphtdocsproyectoMesaAyudavistahvs3.pdf', '7546528', 'gen@ma.com', 'Carrera 48 #46-35', -58.6589, -3.2568, NULL, '10'),
('2', 'Brandon Camilo Castrillon', 'C:xampphtdocsproyectoMesaAyudavistaft3.pdf', 'C:xampphtdocsproyectoMesaAyudavistahvs3.pdf', '499', 'brandon@gmail.com', 'Carrera 74 D sur 57 -24', -96.144, 32.555, '3', '20'),
('3', 'Luís', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\3.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\3.pdf', '413', 'luis@ma.com', 'Cra. 65 #98 A-75, Medellín, Antioquia', -75.5715315, 6.2938986, NULL, '20'),
('4', 'Ana', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\4.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\4.pdf', '414', 'ana@ma.com', 'Cra. 51 #58-69, Medellín, Antioquia', -75.5683161, 6.2576409, NULL, '10'),
('5', 'Lina', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\5.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\5.pdf', '415', 'lina@ma.com', 'Cl. 47A ##85 - 20, Medellín, Antioquia', -75.6026462, 6.2504554, '6', '30'),
('6', 'Juan José Diez Rico', 'C:xampphtdocsproyectoMesaAyudavistaft3.pdf', 'C:xampphtdocsproyectoMesaAyudavistahvs3.pdf', '57241', 'juan@gmail.com', 'Carrera 48 #46-35', 58.6589, -41.25789, NULL, '30'),
('78', 'Carlos Sanchez', 'C:xampphtdocsproyectoMesaAyudavistaft3.pdf', 'C:xampphtdocsproyectoMesaAyudavistahvs3.pdf', '588', 'carlos@gmail.com', 'Carrera 74 D sur 57 -24', -96.144, 32.555, NULL, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IDESTADO` varchar(1) NOT NULL,
  `NOMBRE` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IDESTADO`, `NOMBRE`) VALUES
('1', 'Radicado'),
('2', 'Asignado'),
('3', 'Solución Parcial'),
('4', 'Solución Total'),
('5', 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento`
--

CREATE TABLE `requerimiento` (
  `IDREQ` int(11) NOT NULL,
  `FKAREA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `requerimiento`
--

INSERT INTO `requerimiento` (`IDREQ`, `FKAREA`) VALUES
(33, '10'),
(36, '10'),
(38, '10'),
(42, '10'),
(10, '20'),
(40, '20'),
(43, '20'),
(35, '30'),
(37, '30'),
(39, '30'),
(41, '30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`IDAREA`),
  ADD KEY `CONS_FKEMPLE` (`FKEMPLE`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`IDCARGO`);

--
-- Indices de la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  ADD PRIMARY KEY (`FKCARGO`,`FKEMPLE`),
  ADD KEY `CONS_FKEMPLE3` (`FKEMPLE`);

--
-- Indices de la tabla `detallereq`
--
ALTER TABLE `detallereq`
  ADD PRIMARY KEY (`IDDETALLE`),
  ADD KEY `CONS_FKEMPLE2` (`FKEMPLE`),
  ADD KEY `CONS_FKREQ` (`FKREQ`),
  ADD KEY `CONS_ESTADO` (`FKESTADO`),
  ADD KEY `CONS_FKEMPLEASIG` (`FKEMPLEASIGNADO`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`IDEMPLEADO`),
  ADD KEY `CONS_FKAREA` (`fkAREA`),
  ADD KEY `CONS_FKEMPLE1` (`fkEMPLE_JEFE`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IDESTADO`);

--
-- Indices de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD PRIMARY KEY (`IDREQ`),
  ADD KEY `CONS_FKAREA1` (`FKAREA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `IDCARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  MODIFY `FKCARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallereq`
--
ALTER TABLE `detallereq`
  MODIFY `IDDETALLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  MODIFY `IDREQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `CONS_FKEMPLE` FOREIGN KEY (`FKEMPLE`) REFERENCES `empleado` (`IDEMPLEADO`);

--
-- Filtros para la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  ADD CONSTRAINT `CONS_FKCARGO` FOREIGN KEY (`FKCARGO`) REFERENCES `cargo` (`IDCARGO`),
  ADD CONSTRAINT `CONS_FKEMPLE3` FOREIGN KEY (`FKEMPLE`) REFERENCES `empleado` (`IDEMPLEADO`);

--
-- Filtros para la tabla `detallereq`
--
ALTER TABLE `detallereq`
  ADD CONSTRAINT `CONS_ESTADO` FOREIGN KEY (`FKESTADO`) REFERENCES `estado` (`IDESTADO`),
  ADD CONSTRAINT `CONS_FKEMPLE2` FOREIGN KEY (`FKEMPLE`) REFERENCES `empleado` (`IDEMPLEADO`),
  ADD CONSTRAINT `CONS_FKEMPLEASIG` FOREIGN KEY (`FKEMPLEASIGNADO`) REFERENCES `empleado` (`IDEMPLEADO`),
  ADD CONSTRAINT `CONS_FKREQ` FOREIGN KEY (`FKREQ`) REFERENCES `requerimiento` (`IDREQ`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `CONS_FKAREA` FOREIGN KEY (`fkAREA`) REFERENCES `area` (`IDAREA`),
  ADD CONSTRAINT `CONS_FKEMPLE1` FOREIGN KEY (`fkEMPLE_JEFE`) REFERENCES `empleado` (`IDEMPLEADO`);

--
-- Filtros para la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD CONSTRAINT `CONS_FKAREA1` FOREIGN KEY (`FKAREA`) REFERENCES `area` (`IDAREA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
