/* Creación de la base */
create database desafio;

/* Inclusión de tabla Carreras */
CREATE TABLE IF NOT EXISTS `carreras` (
`id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

/* Creación de tabla Materias */
create table materia(
	id int primary key NOT NULL AUTO_INCREMENT,
    carrera_id int,
    nombre varchar(50),
    descripcion varchar(255),
	carga_horaria int,
	constraint carrera_materia_FK
    foreign key (carrera_id) references carreras(id)
);

/* Datos tabla Carreras */
INSERT INTO `carreras` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Arquitectura', 'Es la descripcion de Arquitectura'),
(2, 'Ingenieria Mecanica', 'Es la descripcion de Ingenieria Mecanica'),
(3, 'Ingenieria en Informatica', 'Es la descripcion de Ingenieria en Informatica'),
(4, 'Ingenieria en Electronica', 'Es la descripcion de InIngenieria en Electronica'),
(5, 'Ingenieria Industrial', 'Es la descripcion de Ingenieria Industrial'),
(6, 'Ingenieria Civil', 'Es la descripcion de Ingenieria Civil'),
(7, 'Desarrollo Web', 'Es la descripcion de Desarrollo Web'),
(8, 'Sonido y Grabacion', 'Es la descripcion de Sonido y Grabacion');

/* Datos tabla Materias */
INSERT INTO materias (`id`, `nombre`, `descripcion`) VALUES
(1, 'Taller Web 1', 'Es la descripcion de Taller Web 1'),
(2, 'Programación Básica 1', 'Es la descripcion de Programación Básica 1'),
(3, 'Programación Web 1', 'Es la descripcion de Programación Web 1'),
(4, 'Programación Web 2', 'Es la descripcion de Programación Web 2'),
(5, 'Taller Web 2', 'Es la descripcion de Taller Web 2'),
(6, 'Informática General', 'Es la descripcion de Informática General'),
(7, 'Visualización e Interfaces', 'Es la descripcion de Visualización e Interfaces'),
(8, 'Introducción al Diseño Gráfico en la Web', 'Es la descripcion de Introducción al Diseño Gráfico en la Web');
(9, 'Taller Web 1', 'Es la descripcion de Taller Web 1'),
(10, 'Programación Básica 1', 'Es la descripcion de Programación Básica 1'),
(11, 'Programación Web 1', 'Es la descripcion de Programación Web 1'),
(12, 'Programación Web 2', 'Es la descripcion de Programación Web 2'),
(5, 'Taller Web 2', 'Es la descripcion de Taller Web 2'),
(6, 'Informática General', 'Es la descripcion de Informática General'),
(7, 'Visualización e Interfaces', 'Es la descripcion de Visualización e Interfaces'),
(8, 'Introducción al Diseño Gráfico en la Web', 'Es la descripcion de Introducción al Diseño Gráfico en la Web');