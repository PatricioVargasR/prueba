-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 05:14:38
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
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` tinytext NOT NULL,
  `passwd` tinytext NOT NULL,
  `correo` varchar(150) NOT NULL,
  `propietario_tarjeta` varchar(150) DEFAULT NULL,
  `numero_cuenta` varchar(16) DEFAULT NULL,
  `fecha_caducidad` date NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `username`, `passwd`, `correo`, `propietario_tarjeta`, `numero_cuenta`, `fecha_caducidad`, `cvv`) VALUES
(1, 'admin', 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@email.com', 'admin', '1234567890123456', '2025-01-01', 333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_sesion` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible, 1=hidden, 2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `descripcion`, `navbar_status`, `status`) VALUES
(4, 'Blusas', 'blusas', 'Blusas con diversos diseños inspirados en los bordados de Tenango de Doria', 0, 0),
(5, 'Capas', 'capas', 'Capa con los diseños clásicos de los bordados de Tenango de Doria', 0, 0),
(6, 'Chamarras', 'chamarras', 'Diversas chamarras con el estilo de los bordados de Tenango de Doria', 0, 0),
(7, 'Vestidos', 'vestidos', 'Vestidos de diversos colores y diseños pero conservando los bordados de Tenango de Doria', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_fecha_compra` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `nombre_producto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_users`
--

CREATE TABLE `data_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `propietario_tarjeta` varchar(150) DEFAULT NULL,
  `numero_cuenta` varchar(16) DEFAULT NULL,
  `fecha_caducidad` date NOT NULL,
  `cvv` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `data_users`
--

INSERT INTO `data_users` (`id`, `user_id`, `propietario_tarjeta`, `numero_cuenta`, `fecha_caducidad`, `cvv`) VALUES
(1, 1, 'ana itzel', '4545423232', '2025-01-01', '333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `precio_unitario` float NOT NULL,
  `sku` varchar(10) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `descripcion` longtext NOT NULL,
  `autor` varchar(150) NOT NULL,
  `stock` int(40) NOT NULL,
  `slug` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `id_categoria`, `nombre_producto`, `precio_unitario`, `sku`, `imagen`, `descripcion`, `autor`, `stock`, `slug`) VALUES
(11, 5, 'Capa con bordado azul', 1500, 'TVW423423', '1700535641.jpg', '<h1><span style=\"background-color: var(--bs-card-bg); font-family: Arial; font-size: 15px; text-align: var(--bs-body-text-align);\"><b>Capa de Tenango</b></span><br></h1><h3><font face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15px; font-family: Arial;\">Dichas prendas son consideradas como de gala por el bordado que tienen por ambos lados de la prenda, la blusa de diario es multicolor y la eventos especiales se hace en un solo color.<br></span></font><font face=\"Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15px;\"><span style=\"font-family: Arial;\">Disfruta del estilo y la cultura mezclado en una sola prenda para relucir en cualquier ocasión.</span></span></font></h3><p><br></p>', 'Lucero Castillo Perez', 50, 'capa-bordado-azul'),
(12, 5, 'Capa larga', 2000, 'TVW3423424', '1700535986.jpg', '<h1 style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41);\"><font style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">Capa larga de Tenango</span></span></font></h1><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 15px;\">Esta elegante capa blanca destaca por el refinado bordado que adorna ambos lados de la prenda, otorgándole un aire de gala. La blusa cotidiana, por su parte, presenta una vibrante gama de colores, mientras que la versión destinada a eventos especiales se presenta en un tono único y sofisticado.</span></font></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 15px;\">Disfruta de la fusión única de estilo y cultura encapsulada en esta prenda, diseñada para brillar en cualquier ocasión. Con su exquisita artesanía y versatilidad, esta capa blanca se convierte en la elección perfecta para elevar tu presencia con elegancia en todo momento.</span></font></p><h1 style=\"margin-right: 0px; margin-left: 0px; padding: 0px;\"><font style=\"margin: 0px; padding: 0px;\" color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"margin: 0px; padding: 0px;\"><b><span style=\"margin: 0px; padding: 0px; font-size: 15px;\"></span></b></span></font></h1>', 'Lucero Castillo Perez', 25, 'capa-larga'),
(13, 5, 'Capa negra corta', 1500, 'TVWMW2323', '1700536200.jpg', '<p><b>Capa negra de Tenango</b></p><p><span style=\"background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Esta elegante capa negra destaca por el refinado bordado que adorna ambos lados de la prenda, otorgándole un aire de gala. Deja de lado la blusa cotidiana, complementando con un color sólido elegante y una gama brillante de colores, mientras que la versión destinada a eventos especiales se presenta en un tono único y sofisticado.</span><br></p><p>Disfruta de la fusión única de estilo y cultura encapsulada en esta prenda, diseñada para brillar en cualquier ocasión. Con su exquisita artesanía y versatilidad, esta capa blanca se convierte en la elección perfecta para elevar tu presencia con elegancia en todo momento.</p>', 'Griselda Mónica Pérez', 50, 'capa-negra-corta'),
(14, 4, 'Blusa blanca', 1500, 'TMMUWE223', '1700536657.jpg', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">Blusa blanca de Tenango</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Esta elegante blusa blanca destaca por el refinado bordado que adorna ambos lados de la prenda, otorgándole un aire de gala. Deja de lado la blusa cotidiana, complementando con un color sólido elegante y una gama brillante de colores, mientras que la versión destinada a eventos especiales se presenta en un tono único y sofisticado.</span><br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Disfruta de la fusión única de estilo y cultura encapsulada en esta prenda, diseñada para brillar en cualquier ocasión. Con su exquisita artesanía y versatilidad, esta capa blanca se convierte en la elección perfecta para elevar tu presencia con elegancia en todo momento.</p>', 'María Azucena Perez', 20, 'blusa-blanca'),
(15, 4, 'Blusa con bordado azul', 2000, 'WEEWWW2344', '1700536785.png', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">Blusa blanca con bordados azules de Tenango</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Esta elegante blusa blanca destaca por el refinado bordado que adorna ambos lados de la prenda, otorgándole un aire de gala. Deja de lado la blusa cotidiana, complementando con un color sólido elegante y una gama brillante de colores, mientras que la versión destinada a eventos especiales se presenta en un tono único y sofisticado.</span><br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Disfruta de la fusión única de estilo y cultura encapsulada en esta prenda, diseñada para brillar en cualquier ocasión. Con su exquisita artesanía y versatilidad, esta capa blanca se convierte en la elección perfecta para elevar tu presencia con elegancia en todo momento.</p>', 'María Azucena Perez', 35, 'blusa-bordado-azul'),
(16, 4, 'Blusa completa con bordado', 1000, 'NENEMEW123', '1700536997.png', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">Blusa blanca con bordados azules de Tenango</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; background-color: var(--bs-card-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Esta elegante blusa blanca destaca por el completo bordado que adorna completamente la prenda, otorgándole un aire de gala y frescura. Deja de lado la blusa cotidiana, complementando con un color sólido elegante y una gama brillante de colores, mientras que la versión destinada a eventos especiales se presenta en un tono único y sofisticado.</span><br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Disfruta de la fusión única de estilo y cultura encapsulada en esta prenda, diseñada para brillar en cualquier ocasión. Con su exquisita artesanía y versatilidad, esta capa blanca se convierte en la elección perfecta para elevar tu presencia con elegancia en todo momento.</p>', 'María Azucena Perez', 100, 'blusa-completa-bordado'),
(17, 7, 'Vestido Negro', 2500, 'MFAFAF234', '1700537253.png', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 15px; font-weight: 700;\">Vestido negro con bordados de Tenango</span></p><p>Este deslumbrante vestido negro se distingue por su atemporal elegancia y su diseño meticuloso. La prenda evoca un sentido de sofisticación con su sutil pero cautivador bordado que adorna toda la tela. Ya sea para una ocasión especial o para el día a día, este vestido negro se presenta como una opción versátil que destila refinamiento.</p><p>Con su estilo, este vestido te permite destacar con clase en cualquier evento. La simplicidad del negro se combina con la intrincada artesanía para crear una prenda que no solo sigue las tendencias, sino que también establece un estándar propio de distinción.</p>', 'Mariana Pérez Gambie', 40, 'vestido-negro'),
(18, 7, 'Vestido Blanco', 1500, 'VM23421', '1700537416.png', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Vestido blanco con bordados de Tenango</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Este deslumbrante vestido blanco para niño La prenda evoca un sentido de cultura con su sutil pero cautivador bordado que adorna toda la tela. Ya sea para una ocasión especial o para el día a día, este vestido blanco presenta como una opción versátil que destila estilo.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Con su estilo, este vestido te permite destacar con clase en cualquier evento. La simplicidad del blanco se combina con la intrincada artesanía para crear una prenda que no solo sigue las tendencias, sino que también establece un estándar propio de distinción.</p>', 'Mariana Pérez Gambie', 200, 'vestido-blanco'),
(19, 7, 'Vestido Negro Bordado', 1700, 'MMMQQWER22', '1700537615.png', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">Vestido negro con bordados de Tenango</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Este deslumbrante vestido negro se distingue por su atemporal elegancia y su diseño meticuloso. La prenda evoca un sentido de sofisticación con su sutil pero cautivador bordado que adorna toda la tela. Ya sea para una ocasión especial o para el día a día, este vestido negro se presenta como una opción versátil que destila refinamiento.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Con su estilo, este vestido te permite destacar con clase en cualquier evento. La simplicidad del negro se combina con la intrincada artesanía para crear una prenda que no solo sigue las tendencias, sino que también establece un estándar propio de distinción.</p>', 'Mariana Pérez Gambie', 50, 'vestido-negro-bordado'),
(20, 6, 'Chamarra Negra con Bordados', 2000, 'FAKFDA1234', '1700537976.png', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 15px; font-weight: 700; background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);\">Vestido negro con bordados de Tenango</span><br></p><p>Esta chamarra única en su tipo combina estilo y funcionalidad de manera excepcional. Su diseño vanguardista se realza con detalles innovadores, creando una prenda que va más allá de la simple utilidad para convertirse en una declaración de moda.</p><p>El negro intenso de esta chamarra aporta un toque de elegancia y versatilidad, permitiéndote lucir con estilo en cualquier ocasión. Confeccionada con materiales de alta calidad, esta prenda no solo te mantiene abrigado, sino que también añade un elemento de moda a tu atuendo diario.</p>', 'Frida Alexandra Vázquez Plaza', 50, 'chamarra-negra'),
(21, 6, 'Chamarra de Mezclia', 2000, 'MFMFMF1243', '1700538245.png', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700; background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align);\">Chamarra de mezclilla con bordados de Tenango</span><br style=\"margin: 0px; padding: 0px;\"></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Esta chamarra única en su tipo combina estilo y funcionalidad de manera excepcional. Su diseño vanguardista se realza con detalles innovadores, creando una prenda que va más allá de la simple utilidad para convertirse en una declaración de moda.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">El negro intenso de esta chamarra aporta un toque de elegancia y versatilidad, permitiéndote lucir con estilo en cualquier ocasión. Confeccionada con materiales de alta calidad, esta prenda no solo te mantiene abrigado, sino que también añade un elemento de moda a tu atuendo diario.</p>', 'Frida Alexandra Vázquez Plaza', 20, 'chamarra-mezclilla'),
(22, 6, 'Chamarra con cuello', 2400, 'MFMA243124', '1700538520.png', '<p><span style=\"background-color: var(--bs-card-bg); font-weight: 700; text-align: var(--bs-body-text-align); color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 15px;\">Chamarra de mezclilla con bordados de Tenango</span><br></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">Esta chamarra única en su tipo combina estilo y funcionalidad de manera excepcional. Su diseño vanguardista se realza con detalles innovadores, creando una prenda que va más allá de la simple utilidad para convertirse en una declaración de moda.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 15px;\">El negro intenso de esta chamarra aporta un toque de elegancia y versatilidad, permitiéndote lucir con estilo en cualquier ocasión. Confeccionada con materiales de alta calidad, esta prenda no solo te mantiene abrigado, sino que también añade un elemento de moda a tu atuendo diario.</p>', 'Frida Sofia Vazquez', 23, 'chamarra-con-cuello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` tinytext NOT NULL,
  `passwd` tinytext NOT NULL,
  `correo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `passwd`, `correo`) VALUES
(1, 'ana', 'itzel', 'ana', 'ana1234', 'ana@email.com'),
(2, 'Patricio ', 'De Jesús', 'patrickvw', '827ccb0eea8a706c4c34a16891f84e7b', 'varrapa25@gmail.com'),
(3, 'Juan', 'Jose', 'Juanjo', '827ccb0eea8a706c4c34a16891f84e7b', 'juan@example.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_fecha_compra`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `data_users`
--
ALTER TABLE `data_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_fecha_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_productos`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id_productos`);

--
-- Filtros para la tabla `data_users`
--
ALTER TABLE `data_users`
  ADD CONSTRAINT `data_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
