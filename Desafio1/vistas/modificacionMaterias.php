<?php

	/* Desafío 1 
       Curso PHP - UNLaM 2017 
       Alumna: Barraza, A. Romina */

	//Incluyo datos de la conexión
	include("../extras/conexionDatos.php");

	//Conexión y chequeo
	include("../extras/conexionChequeo.php");

	// Obtengo los datos
	$id = $_POST['id'];
	//var_dump(id);

	// Armo la query
	$SQL = "SELECT m.id, m.carrera_id, m.nombre, m.descripcion, m.carga_horaria FROM materias m JOIN carreras c ON (m.carrera_id = c.id) WHERE m.id = ?";

	if ($stmt = $CONN->prepare($SQL)){
		$stmt->bind_param('i', $id);
		$stmt->execute();
	    $stmt->bind_result($id, $carreraid, $nombre, $descripcion, $carga_horaria);			
		
		$arrayResultado = array();
		$stmt->fetch();

		$arrayResultado['id'] = $id;
	    $arrayResultado['carrera_id'] = $carreraid;
		$arrayResultado['nombre'] = $nombre;
		$arrayResultado['descripcion'] = $descripcion;
		$arrayResultado['carga_horaria'] = $carga_horaria;

		// Cierro la conexion
		$stmt->close();

	//Arrays para rellenar los OPTION del SELECT de carga horaria
	$opcionesCargaHoraria = array();

	$opcionesCargaHoraria[0]['cargaHorariaIndex'] = 0;  //agregados Index por "error" Undefined Index
	$opcionesCargaHoraria[0]['cargaHoraria'] = "Elija una opcion";
	$opcionesCargaHoraria[1]['cargaHorariaIndex'] = 2;
	$opcionesCargaHoraria[1]['cargaHoraria'] = "2 modulos";
	$opcionesCargaHoraria[2]['cargaHorariaIndex'] = 4;
	$opcionesCargaHoraria[2]['cargaHoraria'] = "4 modulos";
	$opcionesCargaHoraria[3]['cargaHorariaIndex'] = 8;
	$opcionesCargaHoraria[3]['cargaHoraria'] = '8 modulos';
	$opcionesCargaHoraria[4]['cargaHorariaIndex'] = 10;
	$opcionesCargaHoraria[4]['cargaHoraria'] = '10 modulos';

	//Para rellenar los OPTION  del SELECT de carreras
	$opcionesCarreras = array();

	//Query
	$SQL1 = "select * from carreras";
	$resultado = $CONN->query($SQL1);

	if($resultado->num_rows > 0){
		$opcionesCarreras[0]['nombre'] = 'Elija una opcion';
		$i = 1;
		while($row = $resultado->fetch_assoc()){
			$opcionesCarreras[$i]['id'] = $row["id"];
			$opcionesCarreras[$i]['nombre'] = $row["nombre"];
			$i++;
		}
	}
		
		
	}

	$CONN->close();

?>

<input type="hidden" id="idMateria" value="<?php echo $arrayResultado['id']; ?>" />

    	<div class="row">
			<div class="col-md-12 col-sm-12 titulo"><!-- Titulo-->
				<h2>Modificación de datos</h2>
			</div><!-- Fin Titulo -->
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"><!-- Formulario -->
					  <div class="row">
						  <div class="col-md-6 col-md-offset-3 divFormulario">
							  <form action="../extras/modificarMaterias.php" method="POST" id="formularioModif">

							    <div class="form-group row">
							      <label for="carreraMateria" class="col-md-2 col-sm-12 col-form-label">Carrera: </label>
							      <div class="col-md-10 col-sm-12">
							        <select id="carreraMateria">
							        	<?php
							        		$cantOpcionesCarreras = count($opcionesCarreras);
							   				if($cantOpcionesCarreras>0){
							   					for($i=0; $i<$cantOpcionesCarreras; $i++){
								   					if($i == 0){
								   						echo '<option value="'.$opcionesCarreras[$i]['id'].'" disabled selected>'.$opcionesCarreras[$i]['nombre'].'</option>';  //para que al empezar el registro ya salga esta opcion, pero no se puede seleccionar
								   					}else{
								   					echo '<option value="'.$opcionesCarreras[$i]['id'].'">'.$opcionesCarreras[$i]['nombre'].'</option>';
							        			    }
							        			}
							        		}else{
							        			echo '<option value="">No hay opciones disponibles</option>';   //si no hay nada cargado en el array
							        		}
							        	?>
							        </select>
							        <p class="alertas" id="alertaCarrera">Debe seleccionar una carrera</p>
							      </div>
							    </div>

							     <div class="form-group row">
							      <label for="nombreMateria" class="col-md-2 col-sm-12 col-form-label">Materia:</label>
							      <div class="col-md-10 col-sm-12">
							        <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="<?php echo $arrayResultado['nombre']; ?>">
							        <p class="alertas" id="alertaMateria">No puede estar vacío y sólo puede contener letras y números</p>
							        <?php $errorMateria?>
							      </div>
							    </div>

							     <div class="form-group row">
							      <label for="descripcionMateria" class="col-md-2 col-sm-12 col-form-label">Descripción:</label>
							      <div class="col-md-10 col-sm-12">
							        <textarea rows="4" cols="62" id="descripcionMateria" name="descripcionMateria" placeholder="<?php echo $arrayResultado['descripcion']; ?>"></textarea>
							         <p class="alertas" id="alertaDescripcion">Sólo puede contener letras</p>
							         <?php $errorDescripcion?>
							      </div>
							    </div>

							     <div class="form-group row">
							      <label for="cargaHorariaMateria" class="col-md-2 col-sm-12 col-form-label">Carga horaria:</label>
							      <div class="col-md-10 col-sm-12">
							        <select id="cargaHorariaMateria">
							        	<?php
							        		$cantOpcionesCargaHoraria = count($opcionesCargaHoraria);
							   				if($cantOpcionesCargaHoraria>0){
							   					for($i=0; $i<$cantOpcionesCargaHoraria; $i++){
								   					if($i == 0){
								   						echo '<option value="'.$opcionesCargaHoraria[$i]['cargaHorariaIndex'].'" disabled selected>'.$opcionesCargaHoraria[$i]['cargaHoraria'].'</option>';  //para que al empezar con el registro ya salga esta opcion, pero no se puede seleccionar
								   					}else{
								   						echo '<option value="'.$opcionesCargaHoraria[$i]['cargaHorariaIndex'].'">'.$opcionesCargaHoraria[$i]['cargaHoraria'].'</option>';
								   					}
							        			}
							        		}else{
							        			echo '<option value="">No hay opciones disponibles</option>';   //si no hay nada cargado en el array
							        		}
							        	    
				                        ?>
							        </select>
							        <p class="alertas" id="alertaCargaHoraria">Debe seleccionar una carga horaria</p>
							      </div>
							    </div>

							    <div class="form-group row text-right">
							      <div class="col-md-12 col-sm-12">
							        <button type="button" class="btn btn-primary" id="botonSubmitModif" onClick="modificarMaterias()">Modificar datos</button>
							      </div>
							    </div>

							  </form>
							</div>
						</div><!-- Fin row -->
					</div><!-- Fin div Formulario -->
				</div><!-- Fin Row Container -->
				</div>