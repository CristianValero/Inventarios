-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 23:51:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fitcontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `Categoria` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `Categoria`) VALUES
(1, 'Ropa'),
(2, 'Equipos'),
(3, 'Planes'),
(4, 'Consumibles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `FacturaID` int(11) NOT NULL,
  `FechaFac` date NOT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichatecnica`
--

CREATE TABLE `fichatecnica` (
  `FichaID` int(11) NOT NULL,
  `Peso` int(11) NOT NULL,
  `IMC` int(11) NOT NULL,
  `Altura` int(11) NOT NULL,
  `Recomendaciones` varchar(80) NOT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichatecnica`
--

INSERT INTO `fichatecnica` (`FichaID`, `Peso`, `IMC`, `Altura`, `Recomendaciones`, `UsuarioID`) VALUES
(1, 80, 120, 180, 'lsdihfsfh', 42253535),
(4, 100, 100, 100, 'Hacer ejercicio es una parte crucial de mantener un estilo de vida saludable. Aq', 100000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL,
  `NombrePro` varchar(80) NOT NULL,
  `DescripcionPro` varchar(80) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `CategoriaID` int(11) NOT NULL,
  `ProveedorID` int(11) NOT NULL,
  `Activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoID`, `NombrePro`, `DescripcionPro`, `Precio`, `Cantidad`, `imagen`, `CategoriaID`, `ProveedorID`, `Activo`) VALUES
(35, 'PISOS DEPORTIVOS - COLOR NEGRO', 'Potencia tu rendimiento con estilo y comodidad insuperable. ¡Marca la diferencia', 150000.00, 50, 'afe34c1467fbeaf539564e493ad789ca.jpg', 1, 1, 0),
(36, 'PISOS DEPORTIVOS - COLOR NEGRO Y BLANCO', 'Fusiona estilo y rendimiento, camina con actitud imparable', 180000.00, 50, '48388f4e8d74c11b7dd91fd222d77f7a.jpg', 1, 1, 0),
(37, 'PISOS DEPORTIVOS - COLOR NEGRO ENTERO', 'Actitud audaz, impulso deportivo, ¡Domina cada paso con confianza!', 180000.00, 20, '5c750c7ef04d7d5823551807916a87f5.jpg', 1, 1, 0),
(39, 'CAMISETA DEPORTIVA - NEGRA', 'Máxima agilidad, energía pura, ¡Rompe límites con actitud imparable!', 80000.00, 50, '5334bb331330213b9d4395d96bdd7013.jpg', 1, 1, 0),
(81, 'LAZO ELÁSTICO - COLOR NEGRO', 'Salta con estilo: diseño versátil y comodidad inigualable para tu próxima sesión', 72000.00, 20, '7a1420f65c273242b164c518d1f2f906.jpg', 2, 1, 0),
(85, 'LAZO ELÁSTICO - COLOR AZUL', 'Salta con estilo: diseño versátil y comodidad inigualable en azul vibrante.', 70000.00, 20, '115eebc8559d30c9c0e293b4836894df.jpg', 2, 1, 0),
(86, 'LAZO ELÁSTICO - COLOR ROJO', 'Explora con energía: diseño versátil y comodidad excepcional en rojo intenso.', 68000.00, 15, '3c3824b250466a15a6ad717ef2de79e0.jpg', 2, 1, 0),
(88, 'CAMISETA DEPORTIVA - BLANCA', 'Frescura activa, energía imparable, ¡Viste la victoria con estilo!', 95000.00, 20, '6b67c5af084839ed8d5d0ed431d7b29d.jpg', 1, 1, 0),
(89, 'CAMISETA DEPORTIVA MANGA LARGA - NEGRO', 'Potencia y estilo, conquista tus metas con determinación.', 199000.00, 30, '3072c1b45f649dc544e467c78be85e36.jpg', 1, 1, 0),
(90, 'CAMISETA DEPORTIVA MANGA LARGA - GRIS', 'Equilibrio y energía, afronta el desafío con estilo único.', 195000.00, 25, '8bb7c755f4e157e39e42eaa10b8f1829.jpg', 1, 1, 0),
(91, 'CAMISETA DEPORTIVA - NEGRA', 'Libertad de movimiento, elegancia deportiva, ¡destaca con cada movimiento!', 150000.00, 50, '6fc077ef611ab129478977f4b829606a.jpg', 1, 1, 0),
(92, 'KIT X 5 MANCUERNAS ', 'Versatilidad total, esculpe tu fuerza, ¡domina cada entrenamiento con estilo!', 90000.00, 50, 'e72d4511422181e914d2821cafd6d2ee.jpg', 2, 1, 0),
(93, 'SOPORTE PARA PESAS (8 PARES)', 'Organización y resistencia, optimiza tu espacio de entrenamiento con eficacia.\"', 120000.00, 50, 'ab38c68f4c2ebeefb10c68fd7cd21bbc.jpg', 2, 1, 0),
(94, 'BOTELLA DE AGUA ', 'Hidratación activa, diseño resistente, tu compañera esencial para el rendimiento', 3000.00, 100, '7c8dfa291432d673b26961ef1d73eb49.jpg', 4, 1, 0),
(95, 'AGUA MANANTIAL ', 'Pureza refrescante, hidratación natural, tu fuente de vitalidad diaria', 6000.00, 150, '5ac351e32f23573159321f32ed75c55a.jpg', 4, 1, 0),
(96, 'MONSTER ENERGY ', 'Explosión de sabor que impulsa tu día con energía extrema.', 14000.00, 50, '3d8cd4421fc01952964059cfd18336e1.jpg', 4, 1, 0),
(97, 'MONSTER ENERGY - MANGO', 'Explosión de sabor que impulsa tu día con energía extrema.', 14000.00, 50, 'e19b856194bb1b9c8c3857013ffafd28.jpg', 4, 1, 0),
(98, 'MONSTER ENERGY - CUBA LIBRE', 'Explosión de sabor que impulsa tu día con energía extrema.', 14000.00, 50, 'bac588e1b246cec09b7b0c96d46dcd3c.jpg', 4, 1, 0),
(99, 'MONSTER ENERGY - ZERO AZUCAR', 'Explosión de sabor que impulsa tu día con energía extrema.', 14000.00, 50, '235a1bdb2161079ebcc816f05be931f3.jpg', 4, 1, 0),
(100, 'PLAN X 3 MESES', 'Transformación total, entrenamientos personalizados, alcanza tu mejor versión.', 80000.00, 150, '0b46f78742361b449dbda3ac8bf3496a.jpg', 3, 1, 0),
(101, 'PLAN X 5 MESES ', 'Transformación total, entrenamientos personalizados, alcanza tu mejor versión.', 170000.00, 50, 'c93a8be6fd6618c03d82ad0b4c8a9fd1.jpg', 3, 1, 0),
(102, 'PLAN X 7 MESES ', 'Transformación total, entrenamientos personalizados, alcanza tu mejor versión.', 260000.00, 50, '2eb6f3c53bb628897e54afdd9717e1bb.jpg', 3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ProveedorID` int(11) NOT NULL,
  `NombreProv` varchar(80) NOT NULL,
  `DireccionProv` varchar(80) NOT NULL,
  `TelefonoProv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ProveedorID`, `NombreProv`, `DireccionProv`, `TelefonoProv`) VALUES
(1, 'Adidas', 'Francia', 316546468);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `RolID` int(11) NOT NULL,
  `DescripcionRol` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`RolID`, `DescripcionRol`) VALUES
(0, 'Usuario'),
(1, 'Administrador'),
(2, 'Instructor'),
(3, 'Bodega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Apellido` varchar(80) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `FechaNac` date NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Contraseña` varchar(80) NOT NULL,
  `RolID` int(11) NOT NULL,
  `RutaImagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Nombre`, `Apellido`, `Telefono`, `FechaNac`, `Correo`, `Contraseña`, `RolID`, `RutaImagen`) VALUES
(42253535, 'Instructor', 'Instructor', 42342441, '1111-11-11', 'instructor@gmail.com', '$2y$10$S3bAoLtIKsYp3L127MOn9e1CpqCj9tqkkXVXqDU1u2JWxUdrQU2jK', 2, 'img/6562a3db78093.webp'),
(100000000, 'Usuario', 'Usuario', 42342441, '1111-11-11', 'Usuario@gmail.com', '$2y$10$GQZEs6hQqSrXDjmPWA7PHu8sM3SZKL3BkVqjwGkaT1bQbvoK2NQrq', 0, 'img/65664d72574fd.jpg'),
(1013097035, 'Admin', 'Admin', 3142309523, '2003-12-11', 'admin@gmail.com', '$2y$10$FgBzppT0tpXTxotH3idwvetfb79N3Nj8C1k4OkbMErZ39gF41jWsu', 1, 'img/65661538a12bc.jpg'),
(2147483647, 'bodega', 'bodega', 35464684684, '1111-11-11', 'bodega@gmail.com', '$2y$10$KEQpSuose16VvKxwEHP.M.do/bDkfvaGlC/cPRw42upFrVEU2XQXy', 3, 'img/65666c294d05b.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `VentaID` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FacturaID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`FacturaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `fichatecnica`
--
ALTER TABLE `fichatecnica`
  ADD PRIMARY KEY (`FichaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`),
  ADD KEY `CategoriaID` (`CategoriaID`),
  ADD KEY `ProveedorID` (`ProveedorID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ProveedorID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`RolID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD KEY `RolID` (`RolID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`VentaID`),
  ADD KEY `FacturaID` (`FacturaID`),
  ADD KEY `ProductoID` (`ProductoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `FacturaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fichatecnica`
--
ALTER TABLE `fichatecnica`
  MODIFY `FichaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ProveedorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `VentaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fichatecnica`
--
ALTER TABLE `fichatecnica`
  ADD CONSTRAINT `fichatecnica_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Categoria` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Proveedor` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedores` (`ProveedorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`RolID`) REFERENCES `rol` (`RolID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`FacturaID`) REFERENCES `facturas` (`FacturaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
