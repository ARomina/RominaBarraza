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
	$id = $_POST['id'];
	$carreraMateria = $_POST['carrera_id']; 
	$nombreMateria = $_POST['nombre'];   
	$descripcionMateria = $_POST['descripcion'];
	$cargaHorariaMateria = $_POST['carga_horaria'];

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

	// Armo la query
	$SQL = "UPDATE materias SET carrera_id = ?, nombre = ?, descripcion = ?, carga_horaria = ? WHERE id = ?";
	
	if ($stmt = $CONN->prepare($SQL) ) {
			
			// Valido y seteo los parametros
			$stmt->bind_param('issii', $carreraMateria, $nombreMateria, $descripcionMateria, $cargaHorariaMateria, $id);
			
			// Ejecuto la consulta
			$stmt->execute();
			
			// Verifico si se modifico alguna fila 
			$id = $stmt->affected_rows;
		
			// Cierro la conexion
			$stmt->close();
	}
	
	//Comprobación de modificación de datos
	if($id>0){
		echo "OK";
	}else{
		echo "ERROR";
	}
	
	return ;
	


?> 