--
-- Estructura de tabla para la tabla `mov_remisiones`
--

DROP TABLE IF EXISTS `mov_remisiones`;
CREATE TABLE IF NOT EXISTS `mov_remisiones` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_rem_id` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `fk_rem_id` (`fk_rem_id`)
);


DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `pk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_id_viaje` int(10) NOT NULL,
  `doc_mercurio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `condicion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `aprovicionador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `destino` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detalle_material` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hora_pedido` time NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `tiempo_reaccion` time NOT NULL,
  `tiempo_descargue` time NOT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `fk_id_viaje` (`fk_id_viaje`)
);

--
-- Estructura de tabla para la tabla `remisiones`
--

DROP TABLE IF EXISTS `remisiones`;
CREATE TABLE IF NOT EXISTS `remisiones` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_sak` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pk_id`)
);

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permisos` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '(0-Administrador) - (1- Usuario Estandar)',
  `usuario` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `permisos`, `usuario`, `contrasena`, `nombre`, `apellido`) VALUES
(1, '1', 'JUAN.BUITRAGO', 'BARCELONA', 'Juan', 'Buitrago'),
(2, '1', 'ANGEL.PERULAN', 'ANGELCNC', 'Angel', 'Perulan'),
(3, '1', 'DIEGO.RODRIGUEZ', 'DIEGO24', 'Diego Alberto', 'Rodriguez'),
(4, '1', 'JORGE.DIAZ', 'JORGE27', 'Jorge Alberto', 'Diaz'),
(5, '1', 'LUIS.BUITRAGO', 'LUIS15', 'Luis Alberto', 'Buitrago'),
(6, '1', 'JUAN.MUNOZ', 'JUAN14', 'Juan Carlos', 'Sanchez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

DROP TABLE IF EXISTS `viajes`;
CREATE TABLE IF NOT EXISTS `viajes` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `despachador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pk_id`)
);
