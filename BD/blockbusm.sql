-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 03:19:55
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blockbusm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movhistorial`
--

CREATE TABLE `movhistorial` (
  `id` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `movid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movhistorial`
--

INSERT INTO `movhistorial` (`id`, `cant`, `userid`, `movid`) VALUES
(60, 1, 52, 5),
(61, 1, 46, 5),
(62, 2, 46, 4),
(63, 1, 46, 0),
(64, 1, 46, 1),
(65, 1, 46, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(10) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `genre` text NOT NULL,
  `description` text NOT NULL,
  `movDisp` int(11) NOT NULL,
  `movTotal` int(11) NOT NULL,
  `public` varchar(2) NOT NULL,
  `time` time NOT NULL,
  `price` int(11) NOT NULL,
  `actors` text NOT NULL,
  `starsMed` int(1) NOT NULL,
  `starsUsm` int(1) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `titulo`, `genre`, `description`, `movDisp`, `movTotal`, `public`, `time`, `price`, `actors`, `starsMed`, `starsUsm`, `img`) VALUES
(0, 'El conjuro', 'Terror', 'The Conjuring (también conocida como The Warren Files, titulada Expediente Warren: The Conjuring en España y El conjuro en Hispanoamérica) es una película estadounidense de terror de 2013 dirigida por James Wan y protagonizada por Vera Farmiga y Patrick Wilson en el papel de los parapsicólogos Lorraine y Ed Warren.2​ La película es la segunda más exitosa de la saga (después de La Monja), recaudando un total de $319,5 millones contra un presupuesto de $20 millones.\r\n\r\nLa película está basada en un caso inspirado en la realidad, que habría tenido lugar en una granja, en donde una familia empieza a ser testigo de fenómenos paranormales.3​', 100, 100, 'R', '02:00:00', 1, 'Patrick Wilson, Vera Farmiga, Ron Livingston, Lili Taylor', 0, 7, '/IMG/movies/the_conjuring.jpg'),
(1, 'Harry potter y la piedra filosofal', 'Fantasia', 'Un día cerca del undécimo cumpleaños de Harry Potter, un chico huérfano, comienza a percibir extraños acontecimientos a su alrededor, los cuales alcanzan su punto máximo cuando unas cartas enviadas desde el Colegio Hogwarts de Magia y Hechicería llegan a la casa donde vive con sus tíos. Las cartas destapa los secretos que sus tíos le escondieron durante toda su vida: sus padres fueron magos y un mago tenebroso –lord Voldemort– los asesinó en una época de guerra encarnizada, por lo que Harry es un mago de la misma manera y deberá comenzar sus estudios como tal en esa escuela. Para este fin, Dumbledore, le muestra la fortuna monetaria que le dejaron sus padres. Escoltado por el guardabosques del colegio, Rubeus Hagrid, Harry parte rumbo al colegio de magos donde se esconde un antiguo objeto legendario, la piedra filosofal. Al lado de los que se volverían sus mejores amigos, Ron Weasley y Hermione Granger, Harry intenta convencer a sus profesores de que la piedra puede ser robada por el profesor Severus Snape, lo cual es negado por los últimos pues afirman que se encuentra en un lugar seguro y protegido. Durante las aventuras, el protagonista averigua más sobre su verdadero pasado.', 100, 100, 'PG', '02:32:00', 1, 'Daniel Radcliffe, Rupert Grint, Emma Watson, Robbie Coltrane, Ralph Fiennes, Michael Gambon, Alan Rickman, Tom Felton', 0, 7, '/IMG/movies/harry_potter_piedra_filosofal.jfif'),
(2, 'Rapido y furioso', 'Acción', 'En la cuidad de Los Ángeles, el corredor de autos y ex convicto Dominic Toretto se vuelve sospechoso ante la policía de ser el responsable de una serie de robos a trailer llenos de costosos artefactos electrónicos, que se llevan a cabo de noche en la carretera. El oficial Brian O’Conner debe de meterse de infiltrado en el mundo de las carreras ilegales, y específicamente en el grupo de confianza de Toretto, para obtener pruebas de que es culpable y apresarlo. Pero las carreras se vuelven demasiado atractivas para Brian, además de que empieza a dejar de sospechar de Toretto y a enamorarse de su hermana, Mia. Ahora que Brian se ha ganado la confianza de Toretto, deberá decidir de qué lado está su lealtad: de lado del mundo de las carreras ilegales y los autos modificados o del lado de la ley. Rápido y furioso trae a la pantalla un mundo de autos modificados donde el límite de velocidad no existe.', 100, 100, 'PG', '01:46:00', 1, 'Vin Diesel Paul Walker, Michelle Rodríguez, Jordana Brewster, Rick Yune', 0, 6, '/IMG/movies/rapido_y_furioso.jfif'),
(4, 'Atrapame si puedes', 'Drama', 'Atrápame si puedes (Catch Me If You Can, en la versión original en inglés) es una película biográfica estadounidense de comedia dramática criminal de 2002, basada en la vida de Frank Abagnale Jr., que antes de cumplir diecinueve años consiguió millones de dólares haciéndose pasar por piloto de una empresa aérea, por médico y por abogado. Su principal modus operandi era la falsificación de cheques, delito en el que logró tanta habilidad y experiencia que el FBI finalmente lo reclutó como asesor en ese tipo de fraudes. Steven Spielberg dirigió la película, y fueron protagonistas Leonardo DiCaprio como Abagnale; Tom Hanks como el policía Carl Hanratty; Christopher Walken como su padre, Amy Adams como su prometida, Martin Sheen como su futuro suegro y Nathalie Baye como su madre.', 100, 100, 'PG', '02:21:00', 1, 'Leonardo DiCaprio, Tom Hanks, Christopher Walken, Amy Adams\r\n', 0, 8, '/IMG/movies/atrapame_si_puedes.jfif'),
(5, 'club de la pelea', 'Drama', 'Un empleado de oficina insomne, harto de su vida, se cruza con un vendedor peculiar. Ambos crean un club de lucha clandestino como forma de terapia y, poco a poco, la organización crece y sus objetivos toman otro rumbo.', 100, 100, 'PG', '02:18:00', 1, 'Edward Norton, Brad Pitt, Helena Bonham Carter, Meat Loaf, Jared Leto', 0, 9, '/IMG/movies/club_de_la_pelea.jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relpeliculas`
--

CREATE TABLE `relpeliculas` (
  `id` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  `movId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reluser`
--

CREATE TABLE `reluser` (
  `id` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  `followerId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reluser`
--

INSERT INTO `reluser` (`id`, `userId`, `followerId`) VALUES
(136, 51, 46),
(135, 51, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  `movId` int(10) NOT NULL,
  `description` text NOT NULL,
  `punt` int(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `movId`, `description`, `punt`, `fecha`) VALUES
(3, 52, 5, 'dsdas', 3, '2022-12-06'),
(4, 52, 5, 'otra mas\r\n', 3, '2022-12-06'),
(5, 46, 5, 'me encanto\r\n', 5, '2022-12-06'),
(6, 46, 5, 'esta god\r\n', 4, '2022-12-06'),
(7, 46, 4, 'masoemos\r\n', 4, '2022-12-06'),
(8, 46, 4, 'dda', 4, '2022-12-06'),
(9, 46, 0, 'da', 1, '2022-12-06'),
(10, 46, 1, 'DASD', 1, '2022-12-06'),
(11, 46, 2, 'ASDAS', 1, '2022-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `userName` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `cantFollows` int(11) DEFAULT NULL,
  `cantFollowers` int(11) DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userID`, `userName`, `pass`, `saldo`, `cantFollows`, `cantFollowers`, `descripcion`) VALUES
(46, 'test', 'test', 94, 1, 0, ''),
(51, 'test2', 'test2', 100, 0, 2, ''),
(52, 'lopezleg1', 'admin', 61, 1, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  `movId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `movId`) VALUES
(7, 46, 1),
(6, 46, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movhistorial`
--
ALTER TABLE `movhistorial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`) USING BTREE,
  ADD KEY `movid` (`movid`) USING BTREE;

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titulo` (`titulo`),
  ADD KEY `titulo_2` (`titulo`);

--
-- Indices de la tabla `relpeliculas`
--
ALTER TABLE `relpeliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`movId`),
  ADD KEY `movId` (`movId`);

--
-- Indices de la tabla `reluser`
--
ALTER TABLE `reluser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`followerId`),
  ADD KEY `followerId` (`followerId`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`movId`),
  ADD KEY `movId` (`movId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`,`movId`),
  ADD KEY `movId` (`movId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movhistorial`
--
ALTER TABLE `movhistorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `relpeliculas`
--
ALTER TABLE `relpeliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `reluser`
--
ALTER TABLE `reluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movhistorial`
--
ALTER TABLE `movhistorial`
  ADD CONSTRAINT `movhistorial_ibfk_1` FOREIGN KEY (`movid`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movhistorial_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relpeliculas`
--
ALTER TABLE `relpeliculas`
  ADD CONSTRAINT `relpeliculas_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relpeliculas_ibfk_2` FOREIGN KEY (`movId`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reluser`
--
ALTER TABLE `reluser`
  ADD CONSTRAINT `reluser_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reluser_ibfk_2` FOREIGN KEY (`followerId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`movId`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`movId`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
