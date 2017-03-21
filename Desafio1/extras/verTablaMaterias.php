<?php

	/* Desafío 1 
       Curso PHP - UNLaM 2017 
       Alumna: Barraza, A. Romina */

	//Incluyo datos de la conexión
	include("conexionDatos.php");

	//Conexión y chequeo
	include("conexionChequeo.php");

	//Mostrar datos en la tabla materias

	//Query para seleccionar todas las materias de la tabla de la bd
	$SQL = "SELECT m.id, m.nombre, m.descripcion, m.carga_horaria, c.nombre AS carrera_nombre FROM materias m JOIN carreras c ON (m.carrera_id = c.id)";  //Uso un alias para el nombre de la carrera porque hay dos tuplas "nombre"
	$resultado = $CONN->query($SQL);

	//Parte del tbody donde va a estar el loop con las materias, o no
	if($resultado->num_rows > 0){
		while($row = $resultado->fetch_assoc()){
			echo "<tr>";  //row de comienzo
				echo "<td>{$row['nombre']}</td>";
				echo "<td>{$row['descripcion']}</td>";
				echo "<td>{$row['carga_horaria']} modulos</td>";
				echo "<td>{$row['carrera_nombre']}</td>";  //el alias de carrera.nombre
				echo '<td><div class="divAccionesBtn"><button class="btn btn-primary" value="'.$row['id'].'" onClick="modificacion(this);">Editar</button> <button class="btn btn-danger" value="'.$row['id'].'" data-toggle="modal" data-target="#myModal" onClick="eliminarMaterias(this);">Eliminar</button><div></td>';
			echo "</tr>";
		}
	}else{
		echo "<tr><td>No se encontraron datos<td></tr>";
	}

	//Cerrar conexión
	$CONN->close();

	?>