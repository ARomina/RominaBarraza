<!-- Desafío 1 -->
<!-- Curso PHP - UNLaM 2017 -->
<!-- Alumna: Barraza, A. Romina -->

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
            <a class="navbar-left" id="navBarLeft" href="../vistas/paginaPrincipal.php"><img src="../img/logo_unlam.png"></img></a>
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
				<h2>Listado de Materias</h2>
			</div><!-- Fin Titulo -->
			<div class="col-md-12 col-sm-12"><!-- Tabla principal -->
				<table class="table table-striped table-curved table-hover tabla">
				    <thead>
				        <tr>
				            <th class="thead_texto">Materia</th>  
				            <th class="thead_texto">Descripción</th>
				            <th class="thead_texto">Carga Horaria</th>
				            <th class="thead_texto">Carrera</th>
				            <th class="thead_texto">Acciones</th>
				        </tr>
				    </thead>
				    <tbody><!-- Bucle con las materias -->
				        <?php
					      include("../extras/verTablaMaterias.php");
					    ?>
				    </tbody>
				</table>
			</div><!-- Fin Tabla principal -->
	    </div>
	</div>
	 <div id="footer">
    	<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Barraza, A. Romina - Curso PHP - Desafío 1 - UNLaM - 2017</p>
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

