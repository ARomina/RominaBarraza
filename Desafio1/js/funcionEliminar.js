/* Desafío 1 
   Curso PHP - UNLaM 2017 
   Alumna: Barraza, A. Romina */

//Expresiones regulares para la validacion
var regexpLetrasNumerosEspacios=/^[-\w\s]+$/;
var regexpLetrasEspacios=/^[a-zA-Z\s]*$/;

var id = "";
var carreraMateria = "";
var nombreMateria = "";
var descripcionMateria = "";
var cargaHorariaMateria = "";

function eliminarMaterias(esteElemento){
   //materiaId = parseInt(boton.value);
   id = esteElemento.value;
   console.log(id);

	if(confirm("¿Desea eliminar esta materia?")){
		$.ajax({
					url: 'http://localhost/Desafio1/extras/eliminacionMaterias.php',
					type: "POST",
					data: {"id": id},
					dataType: "html",
					beforeSend: function() {	
						console.log("Procesando...");
					},
					success: function(data) {
						if( data == "OK"){
							alert("Materia eliminada exitosamente!");
							location.href = "http://localhost/Desafio1/vistas/paginaPrincipal.php";
							return;
						}
						
						if( data == "ERROR"){
							alert("Hubo un error, por favor intente nuevamente");
							return;
						}
						
						alert("Mensaje del servidor: " + data);
						
						
					}
							
			});
    }
}

//Funciones para validar cada elemento del formulario

		function validacionCarrera(){
			if((carreraMateria == 0) || (carreraMateria == "")){
				carreraMateriaElemento.classList.add("error");
				document.getElementById("alertaCarrera").style.visibility = "visible";
				return false;
			}else{
				carreraMateriaElemento.classList.remove("error");
				document.getElementById("alertaCarrera").style.visibility = "hidden";
				return true;
			}
    	}

    	function validacionNombreMateria(){
	    	if((nombreMateria.length == 0) || (!nombreMateria.match(regexpLetrasNumerosEspacios))){
	    		nombreMateriaElemento.classList.add("error");
	    		document.getElementById("alertaMateria").style.visibility = "visible";
	    		return false;
	    	}else{
	    		nombreMateriaElemento.classList.remove("error");
	    		document.getElementById("alertaMateria").style.visibility = "hidden";
	    		return true;
	    	}
		}

		function validacionDescripcionMateria(){
	    	if(!descripcionMateria.match(regexpLetrasEspacios)){
	    		descripcionMateriaElemento.classList.add("error");
	    		document.getElementById("alertaDescripcion").style.visibility = "visible";
	    		return false;
	    	}else{
	    		descripcionMateriaElemento.classList.remove("error");
	    		document.getElementById("alertaDescripcion").style.visibility = "hidden";
	    		return true;
	    	}
		}

		function validacionCargaHoraria(){
			if((cargaHorariaMateriaSeleccion == 0) || (cargaHorariaMateriaSeleccion == "")){
				cargaHorariaMateriaElemento.classList.add("error");
				document.getElementById("alertaCargaHoraria").style.visibility = "visible";
				return false;
			}else{
				cargaHorariaMateriaElemento.classList.remove("error");
				document.getElementById("alertaCargaHoraria").style.visibility = "hidden";
				return true;
			}
		}