-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2025 a las 22:04:42
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `Nombre`, `Descripcion`) VALUES
(1, 'Camisetas', 'Prendas básicas'),
(2, 'Calzado', 'Zapatos y deportivos'),
(3, 'Accesorios', 'Bolsos y complementos'),
(4, 'Jeans', 'Pantalones de mezclilla'),
(5, 'Chaquetas', 'Abrigos impermeables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Estado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_Cliente`, `Nombre`, `Correo`, `Contrasena`, `Telefono`, `Direccion`, `Estado`) VALUES
(1, 'Juan Pérez', 'juan@mail.com', '1234', '3001112222', 'Calle 1 #10-20', 'Activo'),
(2, 'Ana Gómez', 'ana@mail.com', '1234', '3003334444', 'Calle 2 #11-21', 'Activo'),
(3, 'Pedro López', 'pedro@mail.com', '1234', '3005556666', 'Calle 3 #12-22', 'Activo'),
(4, 'Laura Torres', 'laura@mail.com', '1234', '3007778888', 'Calle 4 #13-23', 'Activo'),
(5, 'Carlos Ruiz', 'carlos@mail.com', '1234', '3009990000', 'Calle 5 #14-24', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon`
--

CREATE TABLE `cupon` (
  `ID_Cupon` int(11) NOT NULL,
  `Codigo` varchar(50) DEFAULT NULL,
  `Descuento` decimal(5,2) DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `Estado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cupon`
--

INSERT INTO `cupon` (`ID_Cupon`, `Codigo`, `Descuento`, `Fecha_Inicio`, `Fecha_Fin`, `Estado`) VALUES
(1, 'DESC10', 10.00, '2025-09-01', '2025-09-30', 'Activo'),
(2, 'DESC20', 20.00, '2025-09-05', '2025-09-20', 'Activo'),
(3, 'BLACKFRIDAY', 30.00, '2025-11-20', '2025-11-28', 'Activo'),
(4, 'NAVIDAD', 25.00, '2025-12-01', '2025-12-25', 'Activo'),
(5, 'OUTLET', 15.00, '2025-10-01', '2025-10-15', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupon_cliente`
--

CREATE TABLE `cupon_cliente` (
  `ID_Cupon_Cliente` int(11) NOT NULL,
  `ID_Cupon` int(11) DEFAULT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Usado` enum('Si','No') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cupon_cliente`
--

INSERT INTO `cupon_cliente` (`ID_Cupon_Cliente`, `ID_Cupon`, `ID_Cliente`, `Usado`) VALUES
(1, 1, 1, 'No'),
(2, 2, 2, 'Si'),
(3, 3, 3, 'No'),
(4, 4, 4, 'No'),
(5, 5, 5, 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `ID_Detalle` int(11) NOT NULL,
  `ID_Pedido` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`ID_Detalle`, `ID_Pedido`, `ID_Producto`, `Cantidad`, `Precio`) VALUES
(1, 1, 1, 2, 50000.00),
(2, 2, 2, 1, 150000.00),
(3, 3, 3, 1, 80000.00),
(4, 4, 4, 2, 120000.00),
(5, 5, 5, 1, 120000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `ID_Devolucion` int(11) NOT NULL,
  `ID_Pedido` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Motivo` text DEFAULT NULL,
  `Estado` enum('Pendiente','Aprobada','Rechazada') DEFAULT 'Pendiente',
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`ID_Devolucion`, `ID_Pedido`, `ID_Producto`, `Motivo`, `Estado`, `Fecha`) VALUES
(1, 1, 1, 'Talla incorrecta', 'Pendiente', '2025-09-08 20:02:43'),
(2, 2, 2, 'Producto defectuoso', 'Aprobada', '2025-09-08 20:02:43'),
(3, 3, 3, 'No correspondía', 'Rechazada', '2025-09-08 20:02:43'),
(4, 4, 4, 'Llegó dañado', 'Pendiente', '2025-09-08 20:02:43'),
(5, 5, 5, 'Cambio por color', 'Pendiente', '2025-09-08 20:02:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_Empleado` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Rol` enum('Administrador','Vendedor') NOT NULL,
  `Estado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_Empleado`, `Nombre`, `Correo`, `Contrasena`, `Rol`, `Estado`) VALUES
(1, 'Admin Kshop', 'admin@mail.com', 'admin', 'Administrador', 'Activo'),
(2, 'Sofía Herrera', 'sofia@mail.com', '1234', 'Vendedor', 'Activo'),
(3, 'Diego Castro', 'diego@mail.com', '1234', 'Vendedor', 'Activo'),
(4, 'Marta Rojas', 'marta@mail.com', '1234', 'Vendedor', 'Activo'),
(5, 'Luis Fernández', 'luis@mail.com', '1234', 'Administrador', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `ID_Envio` int(11) NOT NULL,
  `ID_Pedido` int(11) DEFAULT NULL,
  `Metodo` varchar(50) DEFAULT NULL,
  `Estado` enum('Preparando','En camino','Entregado') DEFAULT 'Preparando',
  `Fecha_Envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`ID_Envio`, `ID_Pedido`, `Metodo`, `Estado`, `Fecha_Envio`) VALUES
(1, 1, 'Servientrega', 'Preparando', '2025-09-08 20:02:42'),
(2, 2, 'DHL', 'En camino', '2025-09-08 20:02:42'),
(3, 3, 'FedEx', 'Entregado', '2025-09-08 20:02:42'),
(4, 4, 'Deprisa', 'Entregado', '2025-09-08 20:02:42'),
(5, 5, 'Interrapidísimo', 'Preparando', '2025-09-08 20:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_compra`
--

CREATE TABLE `ingreso_compra` (
  `ID_Ingreso` int(11) NOT NULL,
  `ID_Proveedor` int(11) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Monto` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingreso_compra`
--

INSERT INTO `ingreso_compra` (`ID_Ingreso`, `ID_Proveedor`, `Fecha`, `Monto`) VALUES
(1, 1, '2025-09-08 20:02:42', 500000.00),
(2, 2, '2025-09-08 20:02:42', 750000.00),
(3, 3, '2025-09-08 20:02:42', 600000.00),
(4, 4, '2025-09-08 20:02:42', 400000.00),
(5, 5, '2025-09-08 20:02:42', 300000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos`
--

CREATE TABLE `lista_deseos` (
  `ID_Lista` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Fecha_Creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_deseos`
--

INSERT INTO `lista_deseos` (`ID_Lista`, `ID_Cliente`, `Nombre`, `Fecha_Creacion`) VALUES
(1, 1, 'Favoritos Juan', '2025-09-08 20:02:42'),
(2, 2, 'Lista Ana', '2025-09-08 20:02:42'),
(3, 3, 'Deseos Pedro', '2025-09-08 20:02:42'),
(4, 4, 'Preferidos Laura', '2025-09-08 20:02:42'),
(5, 5, 'Wishlist Carlos', '2025-09-08 20:02:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos_producto`
--

CREATE TABLE `lista_deseos_producto` (
  `ID_Lista` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_deseos_producto`
--

INSERT INTO `lista_deseos_producto` (`ID_Lista`, `ID_Producto`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID_Pedido` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Estado` enum('Pendiente','Pagado','Enviado','Entregado','Cancelado') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ID_Pedido`, `ID_Cliente`, `Fecha`, `Estado`) VALUES
(1, 1, '2025-09-08 20:02:42', 'Pendiente'),
(2, 2, '2025-09-08 20:02:42', 'Pagado'),
(3, 3, '2025-09-08 20:02:42', 'Enviado'),
(4, 4, '2025-09-08 20:02:42', 'Entregado'),
(5, 5, '2025-09-08 20:02:42', 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `ID_Proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `Nombre`, `Descripcion`, `Precio`, `Stock`, `ID_Proveedor`) VALUES
(1, 'Camiseta Blanca', 'Camiseta básica blanca de algodón', 25000.00, 50, 1),
(2, 'Zapatillas Running', 'Zapatillas deportivas ligeras', 150000.00, 30, 2),
(3, 'Bolso Casual', 'Bolso de cuero sintético', 80000.00, 20, 3),
(4, 'Jean Azul', 'Pantalón jean clásico azul', 60000.00, 40, 4),
(5, 'Chaqueta Negra', 'Chaqueta impermeable', 120000.00, 15, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`ID_Producto`, `ID_Categoria`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `ID_Promocion` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Descuento` decimal(5,2) DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL,
  `Estado` enum('Activa','Inactiva') DEFAULT 'Activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`ID_Promocion`, `Titulo`, `Descripcion`, `Descuento`, `Fecha_Inicio`, `Fecha_Fin`, `Estado`) VALUES
(1, 'Promo Camisetas', '10% en camisetas', 10.00, '2025-09-01', '2025-09-10', 'Activa'),
(2, 'Mega Calzado', '20% en calzado', 20.00, '2025-09-05', '2025-09-20', 'Activa'),
(3, 'Pre-BlackFriday', '30% en productos seleccionados', 30.00, '2025-11-20', '2025-11-28', 'Activa'),
(4, 'Oferta Otoño', '15% en chaquetas', 15.00, '2025-10-01', '2025-10-15', 'Activa'),
(5, 'Bolsos Premium', '25% en bolsos de cuero', 25.00, '2025-10-05', '2025-10-12', 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_Proveedor` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID_Proveedor`, `Nombre`, `Telefono`, `Direccion`, `Correo`) VALUES
(1, 'Proveedor Uno', '3101111111', 'Zona Industrial 1', 'prov1@mail.com'),
(2, 'Proveedor Dos', '3102222222', 'Zona Industrial 2', 'prov2@mail.com'),
(3, 'Proveedor Tres', '3103333333', 'Zona Industrial 3', 'prov3@mail.com'),
(4, 'Proveedor Cuatro', '3104444444', 'Zona Industrial 4', 'prov4@mail.com'),
(5, 'Proveedor Cinco', '3105555555', 'Zona Industrial 5', 'prov5@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_cliente`
--

CREATE TABLE `puntos_cliente` (
  `ID_Puntos` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Puntos` int(11) DEFAULT 0,
  `Fecha_Actualizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puntos_cliente`
--

INSERT INTO `puntos_cliente` (`ID_Puntos`, `ID_Cliente`, `Puntos`, `Fecha_Actualizacion`) VALUES
(1, 1, 100, '2025-09-08 20:02:43'),
(2, 2, 250, '2025-09-08 20:02:43'),
(3, 3, 75, '2025-09-08 20:02:43'),
(4, 4, 300, '2025-09-08 20:02:43'),
(5, 5, 50, '2025-09-08 20:02:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `ID_Recomendacion` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recomendacion`
--

INSERT INTO `recomendacion` (`ID_Recomendacion`, `ID_Cliente`, `ID_Producto`, `Motivo`, `Fecha`) VALUES
(1, 1, 2, 'Productos similares a tu compra', '2025-09-08 20:02:43'),
(2, 2, 3, 'Popular en tu zona', '2025-09-08 20:02:43'),
(3, 3, 4, 'Relacionado con artículos vistos', '2025-09-08 20:02:43'),
(4, 4, 5, 'Tendencia actual', '2025-09-08 20:02:43'),
(5, 5, 1, 'Recomendación personalizada', '2025-09-08 20:02:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorio`
--

CREATE TABLE `recordatorio` (
  `ID_Recordatorio` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Fecha_Recordatorio` date DEFAULT NULL,
  `Estado` enum('Pendiente','Enviado') DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recordatorio`
--

INSERT INTO `recordatorio` (`ID_Recordatorio`, `ID_Cliente`, `ID_Producto`, `Fecha_Recordatorio`, `Estado`) VALUES
(1, 1, 1, '2025-10-01', 'Pendiente'),
(2, 2, 2, '2025-09-20', 'Pendiente'),
(3, 3, 3, '2025-11-05', 'Pendiente'),
(4, 4, 4, '2025-09-30', 'Enviado'),
(5, 5, 5, '2025-10-15', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

CREATE TABLE `resena` (
  `ID_Resena` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Calificacion` int(11) DEFAULT NULL CHECK (`Calificacion` between 1 and 5),
  `Comentario` text DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resena`
--

INSERT INTO `resena` (`ID_Resena`, `ID_Cliente`, `ID_Producto`, `Calificacion`, `Comentario`, `Fecha`) VALUES
(1, 1, 1, 5, 'Excelente calidad', '2025-09-08 20:02:42'),
(2, 2, 2, 4, 'Muy cómodas', '2025-09-08 20:02:42'),
(3, 3, 3, 3, 'Cumple lo esperado', '2025-09-08 20:02:42'),
(4, 4, 4, 5, 'Me encantó el jean', '2025-09-08 20:02:42'),
(5, 5, 5, 4, 'Buena chaqueta, pero algo cara', '2025-09-08 20:02:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

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
  ADD PRIMARY KEY (`ID_Cupon`),
  ADD UNIQUE KEY `Codigo` (`Codigo`);

--
-- Indices de la tabla `cupon_cliente`
--
ALTER TABLE `cupon_cliente`
  ADD PRIMARY KEY (`ID_Cupon_Cliente`),
  ADD KEY `ID_Cupon` (`ID_Cupon`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`ID_Detalle`),
  ADD KEY `ID_Pedido` (`ID_Pedido`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`ID_Devolucion`),
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
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`ID_Producto`,`ID_Categoria`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`ID_Promocion`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_Proveedor`);

--
-- Indices de la tabla `puntos_cliente`
--
ALTER TABLE `puntos_cliente`
  ADD PRIMARY KEY (`ID_Puntos`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`ID_Recomendacion`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- Indices de la tabla `recordatorio`
--
ALTER TABLE `recordatorio`
  ADD PRIMARY KEY (`ID_Recordatorio`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Producto` (`ID_Producto`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cupon`
--
ALTER TABLE `cupon`
  MODIFY `ID_Cupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cupon_cliente`
--
ALTER TABLE `cupon_cliente`
  MODIFY `ID_Cupon_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `ID_Detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `ID_Devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `ID_Envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingreso_compra`
--
ALTER TABLE `ingreso_compra`
  MODIFY `ID_Ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  MODIFY `ID_Lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `ID_Promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `puntos_cliente`
--
ALTER TABLE `puntos_cliente`
  MODIFY `ID_Puntos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  MODIFY `ID_Recomendacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recordatorio`
--
ALTER TABLE `recordatorio`
  MODIFY `ID_Recordatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `ID_Resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cupon_cliente`
--
ALTER TABLE `cupon_cliente`
  ADD CONSTRAINT `cupon_cliente_ibfk_1` FOREIGN KEY (`ID_Cupon`) REFERENCES `cupon` (`ID_Cupon`),
  ADD CONSTRAINT `cupon_cliente_ibfk_2` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`),
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedido` (`ID_Pedido`);

--
-- Filtros para la tabla `ingreso_compra`
--
ALTER TABLE `ingreso_compra`
  ADD CONSTRAINT `ingreso_compra_ibfk_1` FOREIGN KEY (`ID_Proveedor`) REFERENCES `proveedor` (`ID_Proveedor`);

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
-- Filtros para la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD CONSTRAINT `producto_categoria_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`),
  ADD CONSTRAINT `producto_categoria_ibfk_2` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID_Categoria`);

--
-- Filtros para la tabla `puntos_cliente`
--
ALTER TABLE `puntos_cliente`
  ADD CONSTRAINT `puntos_cliente_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`);

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD CONSTRAINT `recomendacion_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`),
  ADD CONSTRAINT `recomendacion_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

--
-- Filtros para la tabla `recordatorio`
--
ALTER TABLE `recordatorio`
  ADD CONSTRAINT `recordatorio_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `cliente` (`ID_Cliente`),
  ADD CONSTRAINT `recordatorio_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `producto` (`ID_Producto`);

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
