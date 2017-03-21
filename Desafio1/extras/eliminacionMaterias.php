<?php 

  /* Desafío 1 
       Curso PHP - UNLaM 2017 
       Alumna: Barraza, A. Romina */
  
  //Incluyo datos de la conexión
  include("conexionDatos.php");

  //Recépción del id de la materia seleccionada
  $id = $_POST['id'];

  //Para ver si el id recibido existe o no
  if(existeId($id)){
    //Conexión y chequeo
    include("conexionChequeo.php");
    
    //Query para borrar la materia
    $SQL = "DELETE FROM materias WHERE id = ?";
    
    if($stmt = $CONN->prepare($SQL)){
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $cambiosEfectuados = $stmt->affected_rows;
      $stmt->close();
    }
    
    if($cambiosEfectuados>0){
      echo "OK";
    }else{
      echo "ERRR";
    }
      
  }else{
    echo "ERROR";
  }
  
  return;
  
  //Desarrollo de la función para ver si el id de la materia existe (true) o no (false)
  function existeId($id){
    //Incluyo datos de la conexión
    include("conexionDatos.php");

     //Conexión y chequeo
    include("conexionChequeo.php");
    
    //Validación por si no se puede conectar
    if($CONN->connect_error){
      return "-1";
    }
    
    //Se selecciona un valor para ver si existe o no
    if ($stmt = $CONN->prepare("SELECT 1 AS resultado FROM materias WHERE id = ?") ) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($resultado);  
        $stmt->fetch();
      
      //Si el resultado de la query no da 1 es porque no se encontró el id
      if($resultado!=1){
        $stmt->close();
        return false;
      }
      
      $stmt->close();
    }
    
    //Se encontró el id
    return true;
  }   

?>