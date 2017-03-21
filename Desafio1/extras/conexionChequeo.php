<?php

	/* Desafío 1 
       Curso PHP - UNLaM 2017 
       Alumna: Barraza, A. Romina */

	//Conexión
	$CONN = new mysqli($serverName, $username, $password, $dataBase);
	
	//Verifico la conexión
	if ($CONN->connect_error) {
		die("Problema al conectar con la base de datos" . $CONN->connect_error);
		return;
	}

?>