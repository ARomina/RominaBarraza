<?php

	/* Desafío 1 
       Curso PHP - UNLaM 2017 
       Alumna: Barraza, A. Romina */

	//Incluyo datos de la conexión
	include("../extras/conexionDatos.php");

	//Inicialización de variables
	$carreraMateria = "";
	$nombreMateria = "";
	$descripcionMateria = "";
	$cargaHorariaMateria = "";

	//Obtención de los datos del registro de materias
	$carreraMateria = $_POST['carreraMateria']; 
	$nombreMateria = $_POST['nombreMateria'];    
	$descripcionMateria = $_POST['descripcionMateria'];
	$cargaHorariaMateria = $_POST['cargaHorariaMateria'];

	//Validación de datos del lado de servidor
	$errorCarrera = "";
	$errorNombre = "";
	$errorDescripcion = "";
	$errorCargaHoraria = "";

	//Validacion carreraMateria
	if(isset($carreraMateria)){
		$carreraMateria = (int)($carreraMateria);
	}

	//Validacion nombreMateria -- Alfanumérico o vacío
	if((!ctype_alnum($nombreMateria)) || empty($nombreMateria)){
			$errorNombre .= '<p class="error">No puede estar vacío y sólo puede contener letras y números</p>';
			//$errorNombre .= 'No puede estar vacío y sólo puede contener letras y números';
		}

	//Validacion descripcionMateria -- Solo letras
	if(!ctype_alnum($descripcionMateria)){
			$errorDescripcion .= '<p class="error">Sólo puede contener letras</p>';
			//$errorDescripcion .= 'Sólo puede contener letras';
		}

	//Validacion cargaHorariaMateria
	if(isset($cargaHorariaMateria)){
		$cargaHorariaMateria = (int)($cargaHorariaMateria);
	}

	//Conexión y chequeo
	include("../extras/conexionChequeo.php");

	//Query para introducir los datos en la base
	$SQL = "INSERT INTO materias(carrera_id, nombre, descripcion, carga_horaria) VALUES (?, ?, ?, ? )";

	if($stmt = $CONN->prepare($SQL)){  //las s reemplazan los ? con las variables
		$stmt->bind_param('ssss', $carreraMateria, $nombreMateria, $descripcionMateria, $cargaHorariaMateria);
		$stmt->execute();
		$id = $stmt->affected_rows;
		$stmt->close();
	}

	//Chequeo de modificacion de filas
	if($id>0 ){
		echo "OK";
	}else{
		echo "ERROR";
	}
	
	return;

?>