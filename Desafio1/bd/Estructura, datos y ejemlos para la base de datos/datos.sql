-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2017 a las 16:42:44
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafio`
--

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Arquitectura', 'Es la descripcion de Arquitectura'),
(2, 'Ingenieria Mecanica', 'Es la descripcion de Ingenieria Mecanica'),
(3, 'Ingenieria en Informatica', 'Es la descripcion de Ingenieria en Informatica'),
(4, 'Ingenieria en Electronica', 'Es la descripcion de InIngenieria en Electronica'),
(5, 'Ingenieria Industrial', 'Es la descripcion de Ingenieria Industrial'),
(6, 'Ingenieria Civil', 'Es la descripcion de Ingenieria Civil'),
(7, 'Desarrollo Web', 'Es la descripcion de Desarrollo Web'),
(8, 'Sonido y Grabacion', 'Es la descripcion de Sonido y Grabacion');

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `carrera_id`, `nombre`, `descripcion`, `carga_horaria`) VALUES
(21, 6, 'Economia', 'Materia Economia', 4),
(24, 6, 'Analisis Estructural II', 'Materia Analisis Estructural II', 2),
(25, 7, 'Programacion Basica 2', 'Materia Programacion Basica 2', 8),
(26, 7, 'Programacion Web 1', 'Materia Programacion Web 1', 8),
(29, 8, 'Conceptos Ritmicos', 'Materia Conceptos Ritmicos', 2),
(30, 8, 'Apreciacion Musical ', 'Materia Apreciacion Musical ', 4),
(105, 1, 'Forma I', 'Materia Forma I', 8),
(106, 1, 'Tecnologia I', 'Materia Tecnologia I', 2),
(107, 2, 'Fisica II', 'Materia Fisica II', 4),
(108, 2, 'Termodinamica', 'Materia Termodinamica', 4),
(109, 3, 'Fisica I', 'Materia Fisica I', 2),
(110, 3, 'Base de Datos', 'Materia Base de Datos', 8),
(111, 4, 'Tecnicas Digitales I ', 'Materia Tecnicas Digitales I ', 8),
(112, 4, 'Fisica III', 'Materia Fisica III', 2),
(113, 5, 'Mecanica de Materiales', 'Materia Mecanica de Materiales', 4),
(125, 1, 'Forma III', 'Es la materia Forma III', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
