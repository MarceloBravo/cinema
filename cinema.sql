-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-05-2019 a las 13:04:42
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinema`
--
CREATE DATABASE IF NOT EXISTS `cinema` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `cinema`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bilboards`
--

DROP TABLE IF EXISTS `bilboards`;
CREATE TABLE IF NOT EXISTS `bilboards` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagen_portada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre_pelicula_portada` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `censura_pelicula_portada` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director_pelicula_portada` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calificacion_pelicula_portada` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resena_pelicula_portada` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_pelicula_portada` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `config_user_id_foreign` (`user_id`),
  KEY `config_genre_id_foreign` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `imagen_portada`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `nombre_pelicula_portada`, `censura_pelicula_portada`, `director_pelicula_portada`, `calificacion_pelicula_portada`, `resena_pelicula_portada`, `fecha_pelicula_portada`, `genre_id`) VALUES
(3, 'header-bg.jpg', 3, NULL, '2019-05-03 17:25:33', '2019-05-03 17:25:33', 'Big Hero 6', 'Todo espectador', 'Don Hall, Chris Williams', '8,5 de 10', 'El vínculo especial que se desarrolla entre el robot inflable Baymax de tamaño grande y el prodigio Hiro Hamada, que se unen a un grupo de amigos para formar una banda de héroes de alta tecnología.', '7 November 2014', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `genero`, `created_at`, `updated_at`) VALUES
(1, 'Accion', '2019-04-30 01:45:13', '2019-04-30 01:45:13'),
(4, 'Animación', '2019-05-02 19:56:26', '2019-05-02 19:56:26'),
(3, 'Ciencia ficción', '2019-04-30 01:46:51', '2019-04-30 01:46:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_04_26_190330_create_movies_table', 1),
(8, '2019_04_26_190355_create_genres_table', 1),
(9, '2019_04_28_182707_add_deleted_at_to_users', 2),
(12, '2019_04_29_162454_add_tipo_usuario_field_to_users', 3),
(13, '2019_04_29_162654_create_roles_table', 3),
(14, '2019_04_29_164411_add_rol_field_to_user', 4),
(15, '2019_04_30_163625_add_afiche_to_table_movies', 5),
(16, '2019_04_30_170419_add_field_genre_to_movies', 6),
(17, '2019_05_02_143355_create_bilboards_table', 7),
(18, '2019_05_02_152024_add_field_triller_to_movies', 7),
(19, '2019_05_02_182958_add_field_fecha_to_movies', 8),
(20, '2019_05_02_183207_add_field_resumen_to_movies', 8),
(21, '2019_05_02_210532_create_repository_table', 9),
(22, '2019_05_02_212853_add_field_descripcion_to_repository', 10),
(23, '2019_05_03_072447_create_config_table', 11),
(24, '2019_05_03_124631_add_field_movie_cover_page_to_config', 12),
(25, '2019_05_03_131247_alter_table_config', 13),
(26, '2019_05_03_142519_create_news_table', 14),
(27, '2019_05_03_164757_add_field_to_news', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reparto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `afiche` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL,
  `triller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movies_user_id_foreign` (`user_id`),
  KEY `movies_genre_id_foreign` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `nombre`, `reparto`, `director`, `duracion`, `user_id`, `created_at`, `updated_at`, `afiche`, `genre_id`, `triller`, `fecha`, `resumen`) VALUES
(8, 'Big Hero 6', 'Pedro, Juan y Diego', 'Perico Pérez', '2 horas', 3, '2019-05-01 02:52:25', '2019-05-03 12:29:34', '34m1.jpg', 1, 'https://www.youtube.com/embed/boO2nQ3RJFs', '7 Noviembre de 2014', 'Cuando un giro inesperado de eventos los sumerge en el medio de un peligroso plan, un niño prodigio, su robot y sus amigos se convierten en héroes de alta tecnología en una misión para salvar su ciudad.'),
(13, 'Spiderman', 'Pedro Pérez', 'Julia Pérez', 'Juan pérez', 3, '2019-05-01 19:36:17', '2019-05-02 23:08:17', '17r2.jpg', 1, 'https://www.youtube.com/embed/cCXW3KE8Bto', 'año 2014', 'Cuando un giro inesperado de eventos los sumerge en el medio de un peligroso plan, un niño prodigio, su robot y sus amigos se convierten en héroes de alta tecnología en una misión para salvar su ciudad.'),
(14, 'Avengers Eadge of Ultron', 'Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans, Scarlett Johansson, Jeremy Renner', 'Joss Whedon', '2:20 hrs', 3, '2019-05-02 19:50:32', '2019-05-02 23:08:58', '31r3.jpg', 1, 'https://www.youtube.com/embed/tmeOjFno6Do', '30 de abril de 2015', 'Cuando un giro inesperado de eventos los sumerge en el medio de un peligroso plan, un niño prodigio, su robot y sus amigos se convierten en héroes de alta tecnología en una misión para salvar su ciudad.'),
(15, 'The Lego Movie', 'Chris Pratt Elizabeth Banks Will Ferrell Will Arnett Alison Brie Charlie Day Nick Offerman Liam Neeson Morgan Freeman Jason Sand', 'Phil Lord', '1:30 horas', 3, '2019-05-02 19:53:34', '2019-05-02 23:09:38', '34r1.jpg', 1, 'https://www.youtube.com/embed/fZ_JOBCLF-I', '6 de febrero de 2014', 'Emmet, una figurita Lego absolutamente normal, es confundida, por error, con la persona más extraordinaria del mundo Lego, una especie de mesías que va a salvarlos de las maquinaciones del Mega Malo, pero Emmet no está preparado en absoluto.'),
(16, 'Interstellar', 'Matthew McConaughey Anne Hathaway Jessica Chastain Bill Irwin Ellen Burstyn Michael Caine Matt Damon', 'Christopher Nolan', '1:49 Hrs', 3, '2019-05-02 20:00:08', '2019-05-02 23:16:05', '8r4.jpg', 1, 'https://www.youtube.com/embed/zSWdZVtXT7E', '26 de octubre de 2014', 'Cooper, es un ex-piloto de la NASA, por eso, cuando toca a su puerta la oportunidad de salvar el mundo en en la misión espacial más importante en la historia de la humanidad, no pierde mucho tiempo meditando.'),
(17, 'El planeta de los simios', 'Andy Serkis Woody Harrelson Steve Zahn', 'Matt Reeves', '2 horas 40 minutos', 3, '2019-05-02 20:47:25', '2019-05-02 23:17:30', '24r5.jpg', 1, 'https://www.youtube.com/embed/lAsru0CsBWI', '2011', 'Sin información');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noticia` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `titulo`, `noticia`, `imagen`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `fecha`) VALUES
(1, 'Noticia 1', 'Probando el crud de noticias del blog.', 'beauty.jpg', 3, '2019-05-03 19:59:12', '2019-05-03 21:36:23', NULL, '2019-05-02 04:00:00'),
(2, 'Noticia 2', 'Esta es una noticia de ejemplo, realmente no informa ni dice nada pero da iguial', 'f1.jpg', 3, '2019-05-03 20:03:10', '2019-05-03 21:35:54', NULL, '2019-05-03 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repository`
--

DROP TABLE IF EXISTS `repository`;
CREATE TABLE IF NOT EXISTS `repository` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `repository`
--

INSERT INTO `repository` (`id`, `archivo`, `ruta`, `created_at`, `updated_at`, `deleted_at`, `descripcion`) VALUES
(1, 'Documento 1', '7professional-blue-business-banners-with-image-space.zip', '2019-05-03 02:52:07', '2019-05-03 03:40:08', NULL, 'esta es un prueba sdfghjk'),
(3, 'Documento 2', 'Technology-banners-blue-and-green.zip', '2019-05-03 04:20:05', '2019-05-03 04:20:05', NULL, 'Este es u otro archivo zip de prueba disponible para descarga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador', '2019-04-29 04:00:00', '2019-04-29 04:00:00', NULL),
(2, 'Estandard', '2019-04-29 04:00:00', '2019-04-29 04:00:00', NULL),
(3, 'Invitado', '2019-04-30 17:48:39', '2019-04-30 17:48:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `rol_id`) VALUES
(3, 'Marcelo Antonio Bravo Castillo', 'mabc@live.cl', NULL, '$2y$10$pMUuJ4HabKkzQMfStH0yRO.af0f8nwHT17UEVWxOWhTSjPXy54UpO', NULL, '2019-04-28 03:32:43', '2019-05-02 00:51:56', NULL, 1),
(4, 'Juan Prez', 'jperez@ejemplo.cl', NULL, '$2y$10$mJu6l9Ha5si8dUOAKlLzNey5W4iwPQRIMHI6SrsWnQdlxgh9qFWEe', NULL, '2019-04-28 22:35:55', '2019-04-28 22:43:46', NULL, 2),
(5, 'Carla Pérez', 'carla@ejemplo.cl', NULL, '$2y$10$4d9abCB.dO9.ANb1Ux94LOHbTPztYDQH7B9nm.Nb8MxHlhvjxkuLS', NULL, '2019-04-29 21:11:54', '2019-04-29 21:11:54', NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
