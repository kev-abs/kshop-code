-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2025 a las 19:43:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendakshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Fecha_Registro` date NOT NULL,
  `Estado` varchar(20) DEFAULT 'Activo',
  `Documento` varchar(20) NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_Cliente`, `Nombre`, `Correo`, `Contrasena`, `Fecha_Registro`, `Estado`, `Documento`, `Telefono`) VALUES
(1, 'Manuel Rivera', 'manuel25142808@gmail.com', '$2y$10$XTvSfmJnjsfpfSGL/w6GGO7PYrwY0l0l/MbVcZ5eOIcPC9JximQHG', '2025-06-27', 'Activo', '', ''),
(2, 'Diana Quintero', 'dianita@gmail.com', '$2y$10$H2wrlDHG5.xMH8VqXu4GmuQhxhFI2mKRj5h0cPsokFUeX03syNCq2', '2025-06-27', 'Inactivo', '', ''),
(3, 'Carlos Villagran', 'carlitos@gmail.com', '$2y$10$O1exmwwINE2.Sfn1JCisceQZWsyd5Du9HB0HDjKSUvlCo5IQ8U3tC', '2025-06-27', 'Activo', '', ''),
(7, 'Fabian Parra', 'foparra@gmail.com', '$2y$10$zYQ86hoxCpdsynPhWN2IJeQL0TQ9V.HhASmbkeN4mccSaWxInHmF2', '2025-06-27', 'Activo', '', ''),
(8, 'Santiago Salgado', 'Santiblablabla@gmail.com', '$2y$10$thX.C7gDLqwubWVrcl1UB.DTgMNntYHLXsiUEAp97En7t9zQ8b3Oy', '2025-07-02', 'Activo', '', ''),
(9, 'Kevyn Abella', 'kevtititi@gmail.com', '$2y$10$EjC2FqRmyQ1SaBYEWyvpWe0mHvIXkIhjdXIR/fj2WNAss0.1F3ahW', '2025-07-02', 'Activo', '', ''),
(10, 'Kevyn Abella Sanchez', 'kevyn06@gmail.com', '$2y$10$GObyWBMNSdef1THfsNmr9.0WhDL4DVuekSFgqGF2QcUw5jtzespOi', '2025-07-02', 'Activo', '', ''),
(11, 'Ana Bertulia', 'anabertulia@gmail.com', '$2y$10$UmfmETezDl0y3JnMy2RV6unDtAVvpHgyLjW7LRZxVFtOgUhq.84Zy', '2025-07-02', 'Activo', '', ''),
(12, 'maria clara', 'maricruz@gmail.com', '$2y$10$E87IVWabtKZFhiYF2hW9v.Vk9L/MyEXQceSngDsrWJdRSHZ39hpny', '2025-07-02', 'Activo', '', ''),
(13, 'Juan Pérez', 'juanperez@gmail.com', '1234segura', '2024-06-01', 'Activo', '', ''),
(14, 'María López', 'marialopez@gmail.com', 'clave123', '2024-06-05', 'Activo', '', ''),
(15, 'Carlos Gómez', 'carlosg@gmail.com', 'passw0rd', '2024-06-10', 'Activo', '', ''),
(16, 'Laura Ruiz', 'lauraruiz@gmail.com', 'laura456', '2024-06-15', 'Activo', '', ''),
(17, 'Andrés Torres', 'andrest@gmail.com', 'andres789', '2024-06-20', 'Activo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `ID_Cupon` int(11) NOT NULL,
  `Codigo` varchar(50) NOT NULL,
  `Descuento` decimal(5,2) NOT NULL,
  `Fecha_Expiracion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon_cliente`
--

CREATE TABLE `cupon_cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `ID_Cupon` int(11) NOT NULL,
  `Usado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `ID_Detalle` int(11) NOT NULL,
  `ID_Pedido` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_Unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_Empleado` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Fecha_Contratacion` date DEFAULT (curdate()),
  `Estado` enum('Activo','Inactivo','Suspendido') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_Empleado`, `Nombre`, `Cargo`, `Correo`, `Contrasena`, `Fecha_Contratacion`, `Estado`) VALUES
(1, 'Administrador principal', 'Administrador', 'admin@kshop.com', 'admin123', '2025-06-27', 'Activo'),
(2, 'Luis Mendoza', 'Administrador', 'luism@gmail.com', 'admin123', '2023-01-10', 'Activo'),
(3, 'Camila Salazar', 'Vendedor', 'camilas@gmail.com', 'venta123', '2023-03-15', 'Activo'),
(4, 'Pedro Ríos', 'Vendedor', 'pedror@gmail.com', 'ventas456', '2023-04-20', 'Activo'),
(5, 'Ana Torres', 'Administrador', 'anatorres@gmail.com', 'anaadmin', '2023-05-01', 'Activo'),
(6, 'Santiago Vargas', 'Vendedor', 'santiagov@gmail.com', 'vendedor789', '2023-06-12', 'Activo'),
(7, 'Marta Cecilia Carvajal Rugeles', 'vendedor', 'marta33@kshop.com', 'marta123', '2023-06-12', 'Activo'),
(8, 'Carlos Villagran', 'vendedor', 'carlitos@kshop.com', '$2y$10$DsGgPGRa3afXtEsz18mPk.8K4ukR6SPsFnksyisXr3ablwKUmdG8a', '2023-06-12', 'Activo'),
(9, 'Jose Suarez', 'vendedor', 'jose@kshop.com', '$2y$10$HEcgM/U2MDKFwN016Dnj8Ok9YrWePk4W6LgaoirQG54EUgytAbkHG', '2023-06-12', 'Activo'),
(10, 'Sol Vargas', 'vendedor', 'sol@kshop.com', '$2y$10$BkKqc3rEB2bysULtxr3KYOLQkH.03smj59AnKy5EzuSWeOX/gLXje', '2025-07-03', 'Activo'),
(11, 'Kevin Mendez', 'vendedor', 'kevin@kshop.com', '$2y$10$aH4Vi44pOB9EqjIE9CSwVuGl14JtKocjc7AI82eIOZU31JbizskES', '2025-07-04', 'Activo');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `ID_Envio` int(11) NOT NULL,
  `ID_Pedido` int(11) NOT NULL,
  `Direccion_Envio` varchar(200) NOT NULL,
  `Fecha_Envio` date DEFAULT NULL,
  `Metodo_Envio` varchar(100) NOT NULL,
  `Estado_Envio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_compra`
--

CREATE TABLE `ingreso_compra` (
  `ID_Ingreso` int(11) NOT NULL,
  `ID_Empleado` int(11) NOT NULL,
  `ID_Proveedor` int(11) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingreso_compra`
--

INSERT INTO `ingreso_compra` (`ID_Ingreso`, `ID_Empleado`, `ID_Proveedor`, `Fecha_Ingreso`, `Total`) VALUES
(1, 1, 1, '2024-06-01', 1750000.00),
(2, 3, 2, '2024-06-03', 2700000.00),
(3, 1, 3, '2024-06-05', 1800000.00),
(4, 3, 4, '2024-06-07', 2100000.00),
(5, 1, 5, '2024-06-10', 1250000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos`
--

CREATE TABLE `lista_deseos` (
  `ID_Lista` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `Fecha_Creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos_producto`
--

CREATE TABLE `lista_deseos_producto` (
  `ID_Lista` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `Fecha_Pedido` date NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  `ID_Proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Nombre`, `Descripcion`, `Precio`, `Stock`, `ID_Proveedor`) VALUES
(1, 'Camiseta Básica', 'Camiseta de algodón 100% en varios colores', 35000.00, 50, 1),
(2, 'Jeans Skinny', 'Pantalón ajustado para mujer', 90000.00, 30, 2),
(3, 'Chaqueta Impermeable', 'Chaqueta liviana, resistente al agua', 120000.00, 15, 3),
(4, 'Zapatillas Urbanas', 'Zapatillas casuales unisex', 150000.00, 20, 4),
(5, 'Gorra Deportiva', 'Gorra con visera curva ajustable', 25000.00, 40, 5),
(6, 'Camisa negra', 'jijija', 50000.00, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_Proveedor` int(11) NOT NULL,
  `Nombre_Empresa` varchar(100) NOT NULL,
  `Contacto` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID_Proveedor`, `Nombre_Empresa`, `Contacto`, `Telefono`, `Correo`, `Direccion`) VALUES
(1, 'TechMarket', 'Carlos Sierra', '3011234567', 'contacto@techmarket.com', 'Calle 10 #12-34'),
(2, 'ModaExpress', 'Lucía Rojas', '3109876543', 'info@modaexpress.com', 'Cra 45 #67-89'),
(3, 'HogarTotal', 'Felipe González', '3201122334', 'ventas@hogartotal.com', 'Av. Siempre Viva #742'),
(4, 'DeportesYa', 'Sofía Torres', '3009988776', 'sofia@deportesya.com', 'Calle 56 #78-90'),
(5, 'Librería ABC', 'Mateo Ruiz', '3215544332', 'mateo@abc.com', 'Cra 7 #20-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

CREATE TABLE `resena` (
  `ID_Resena` int(11) NOT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `Calificacion` int(11) NOT NULL,
  `Comentario` text DEFAULT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`ID_Cupon`);

--
-- Indices de la tabla `cupon_cliente`
--
ALTER TABLE `cupon_cliente`
  ADD PRIMARY KEY (`ID_Cliente`,`ID_Cupon`),
  ADD KEY `ID_Cupon` (`ID_Cupon`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`ID_Detalle`),
  ADD KEY `ID_Pedido` (`ID_Pedido`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_Empleado`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`ID_Envio`),
  ADD KEY `ID_Pedido` (`ID_Pedido`);

--
-- Indices de la tabla `ingreso_compra`
--
ALTER TABLE `ingreso_compra`
  ADD PRIMARY KEY (`ID_Ingreso`),
  ADD KEY `ID_Empleado` (`ID_Empleado`),
  ADD KEY `ID_Proveedor` (`ID_Proveedor`);

--
-- Indices de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  ADD PRIMARY KEY (`ID_Lista`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `lista_deseos_producto`
--
ALTER TABLE `lista_deseos_producto`
  ADD PRIMARY KEY (`ID_Lista`,`ID_Producto`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `ID_Proveedor` (`ID_Proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_Proveedor`);

--
-- Indices de la tabla `resena`
--
ALTER TABLE `resena`
  ADD PRIMARY KEY (`ID_Resena`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `ID_Cupon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `ID_Detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `ID_Envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_compra`
--
ALTER TABLE `ingreso_compra`
  MODIFY `ID_Ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  MODIFY `ID_Lista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `ID_Resena` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupon_cliente`
--
ALTER TABLE `cupon_cliente`
  ADD CONSTRAINT `cupon_cliente_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`),
  ADD CONSTRAINT `cupon_cliente_ibfk_2` FOREIGN KEY (`ID_Cupon`) REFERENCES `cupon` (`ID_Cupon`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`);

--
-- Filtros para la tabla `ingreso_compra`
--
ALTER TABLE `ingreso_compra`
  ADD CONSTRAINT `ingreso_compra_ibfk_1` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleado` (`ID_Empleado`),
  ADD CONSTRAINT `ingreso_compra_ibfk_2` FOREIGN KEY (`ID_Proveedor`) REFERENCES `proveedor` (`ID_Proveedor`);

--
-- Filtros para la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  ADD CONSTRAINT `lista_deseos_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`);

--
-- Filtros para la tabla `lista_deseos_producto`
--
ALTER TABLE `lista_deseos_producto`
  ADD CONSTRAINT `lista_deseos_producto_ibfk_1` FOREIGN KEY (`ID_Lista`) REFERENCES `lista_deseos` (`ID_Lista`),
  ADD CONSTRAINT `lista_deseos_producto_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_Proveedor`) REFERENCES `proveedor` (`ID_Proveedor`);

--
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`),
  ADD CONSTRAINT `resena_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
