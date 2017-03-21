<?php

	/* Desafío 1 
       Curso PHP - UNLaM 2017 
       Alumna: Barraza, A. Romina */

	//Incluyo datos de la conexión
	include("../extras/conexionDatos.php");

	//Conexión y chequeo
	include("../extras/conexionChequeo.php");

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
	$SQL = "select * from carreras";
	$resultado = $CONN->query($SQL);

	if($resultado->num_rows > 0){
		$opcionesCarreras[0]['nombre'] = 'Elija una opcion';
		$i = 1;
		while($row = $resultado->fetch_assoc()){
			$opcionesCarreras[$i]['id'] = $row["id"];
			$opcionesCarreras[$i]['nombre'] = $row["nombre"];
			$i++;
		}
	}

	//Cerrar conexión
	$CONN->close();

?>

<!DOCTYPE hmtl>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Desafío 1 - Página principal</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/estilos.css" />
</head>
<body>
	<div class="jumbotron" id="jumbo">
		<div class="container fondo">
		</div>
	</div><!-- Fin Jumbotron -->
    <nav class="navbar navbar-default" id="navBar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span><!-- Hamburguer button al colapsar -->
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-left" id="navBarLeft" href="paginaPrincipal.php"><img src="../img/logo_unlam.png"></img></a>
        </div>
        <ul class="nav navbar-nav navbar-right" id="navBarRight">
	        <a class="btn btn-primary botonesPrincipal" id="botonVerMaterias" href="paginaPrincipal.php" role="button">Ver Listado de Materias</a>
	        <a class="btn btn-primary botonesPrincipal" id="botonAltaMaterias" href="altaMaterias.php" role="button">Alta de Materias</a>
        </ul>
        </div><!--/.container-fluid -->
    </nav>
    <div id="fondoContainer">
    	<div class="row">
			<div class="col-md-12 col-sm-12 titulo"><!-- Titulo-->
				<h2>Alta de Materias</h2>
			</div><!-- Fin Titulo -->
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"><!-- Formulario -->
					  <div class="row">
						  <div class="col-md-6 col-md-offset-3 divFormulario">
							  <form action="../extras/registroMaterias.php" method="POST" id="formularioAlta">

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
							        <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="">
							        <p class="alertas" id="alertaMateria">No puede estar vacío y sólo puede contener letras y números</p>
							        <?php $errorMateria?>
							      </div>
							    </div>

							     <div class="form-group row">
							      <label for="descripcionMateria" class="col-md-2 col-sm-12 col-form-label">Descripción:</label>
							      <div class="col-md-10 col-sm-12">
							        <textarea rows="4" cols="62" id="descripcionMateria" name="descripcionMateria"></textarea>
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
							        <button type="button" class="btn btn-primary" id="botonSubmitAlta" onClick="registroMaterias()">Guardar materia</button>
							      </div>
							    </div>

							  </form>
							</div>
						</div><!-- Fin row -->
					</div><!-- Fin div Formulario -->
				</div><!-- Fin Row Container -->
			</div>
	    </div>
	</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/funcionAlta.js"></script>
<script type="text/javascript" src="../js/funcionModificar.js"></script>
<script type="text/javascript" src="../js/funcionEliminar.js"></script>

</body>
</html>