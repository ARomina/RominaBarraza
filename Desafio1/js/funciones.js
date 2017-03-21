//Expresiones regulares para la validacion
var regexpLetrasNumerosEspacios=/^[-\w\s]+$/;
var regexpLetrasEspacios=/^[a-zA-Z\s]*$/;

var id = "";
var carreraMateria = "";
var nombreMateria = "";
var descripcionMateria = "";
var cargaHorariaMateria = "";

function registroMaterias(){

    if(validacionFormularioAlta()){
			$.ajax({
					url: 'http://localhost/Desafio1/extras/registroMaterias.php',
					type: "POST",
					data: {"carreraMateria": carreraMateria, 
						   "nombreMateria": nombreMateria, 
						   "descripcionMateria": descripcionMateria,
						   "cargaHorariaMateria": cargaHorariaMateria,
						   },
					dataType: "html",
					beforeSend: function() {	
						console.log("Procesando...");
					},
					success: function(data) {
						if( data == "OK"){
							alert("Materia registrada exitosamente!");
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
		}else{
			alert("Campos incorrectos");
			console.log(carreraMateria);
			console.log(nombreMateria);
			console.log(descripcionMateria);
			console.log(cargaHorariaMateria);
		}
}

    function validacionFormularioAlta(){

    	//Tomo los elementos
    	carreraMateriaElemento = document.getElementById("carreraMateria");
    	carreraMateria = document.getElementById("carreraMateria").selectedIndex;
    	console.log(carreraMateria);
        nombreMateriaElemento = document.getElementById("nombreMateria");
        nombreMateria = document.getElementById("nombreMateria").value;
        console.log(nombreMateria);
        descripcionMateriaElemento = document.getElementById("descripcionMateria");
        descripcionMateria = document.getElementById("descripcionMateria").value;
        console.log(descripcionMateria);
        cargaHorariaMateriaElemento = document.getElementById("cargaHorariaMateria");
        cargaHorariaMateriaSeleccion = document.getElementById("cargaHorariaMateria").selectedIndex;
        
        cargaHorariaMateria = parseInt(document.getElementById("cargaHorariaMateria").value);  //parseInt porque en la base ese campo es un int
        
        console.log(cargaHorariaMateria);

        if(validacionCarrera()){
        	if(validacionNombreMateria()){
        		if(validacionDescripcionMateria()){
        			if(validacionCargaHoraria()){
        				return true;
        			}

        		}

        	}
        }

       return false;
        
}

//--------------------------------------------------------------------------------------------------

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

//--------------------------------------------------------------------------------------------------
//Funcion que agarra el id seleccionado desde tablaMaterias.php
function modificacion(esteElemento){
	id = esteElemento.value;
	console.log("id desde tablaMaterias"+id);

	//window.location.href = "../vistas/modificacionMaterias.php"; 
	// cargo la vista del modificar  
		$("#fondoContainer").load("modificacionMaterias.php", {"id": id}, function(){
			//console.log("id al ir a modificacion"+id);
		});

}

//Funcion que se ejecuta al llenar el formulario de modificacionMaterias.php
function modificarMaterias(){

		if(validacionFormularioModif()){

			var id = document.getElementById("idMateria").value;
			//console.log("id que traje del form"+id);
			
			$.ajax({
					url: "http://localhost/Desafio1/extras/modificarMaterias.php",
					type: "POST",
					data: {"id": id, 
						   "carrera_id": carreraMateria, 
						   "nombre": nombreMateria, 
						   "descripcion": descripcionMateria,
						   "carga_horaria": cargaHorariaMateria,
						   },
					dataType: "html",
					beforeSend: function() {	
						console.log("estoy en el before send");
					},
					success: function(data) {
						if( data == "OK"){
							alert("Datos modificados!");
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

		function validacionFormularioModif(){

    	//Tomo los elementos
    	carreraMateriaElemento = document.getElementById("carreraMateria");
    	carreraMateria = document.getElementById("carreraMateria").selectedIndex;
    	console.log(carreraMateria);
        nombreMateriaElemento = document.getElementById("nombreMateria");
        nombreMateria = document.getElementById("nombreMateria").value;
        console.log(nombreMateria);
        descripcionMateriaElemento = document.getElementById("descripcionMateria");
        descripcionMateria = document.getElementById("descripcionMateria").value;
        console.log(descripcionMateria);
        cargaHorariaMateriaElemento = document.getElementById("cargaHorariaMateria");
        cargaHorariaMateriaSeleccion = document.getElementById("cargaHorariaMateria").selectedIndex;
        
        cargaHorariaMateria = parseInt(document.getElementById("cargaHorariaMateria").value);  //parseInt porque en la base ese campo es un int
        
        console.log(cargaHorariaMateria);

        if(validacionCarrera()){
        	if(validacionNombreMateria()){
        		if(validacionDescripcionMateria()){
        			if(validacionCargaHoraria()){
        				return true;
        			}

        		}

        	}
        }

       return false;
	}



//--------------------------------------------------------------------------------------------------

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
		
    		