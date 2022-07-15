<?php 
	/* FUNCIONES DE EVENTOS */

    function Evento($accion,$elemento,$nombre)
    {
    	$usario 	= $_SESSION['USR']['NOMBRE'];

    	/*
		* 	ACCIONES
		* 	1 => CREAR
		* 	2 => MODIFICAR
		* 	3 => ELIMINAR
    	*/

    	$fecha 		= date("Y-m-d");
    	$hora 		= date("H:i");

    	Insertar("eventos",
    			 "usuario,tipo_evento,detalle,fecha,hora",
    			 "'".$_SESSION['USR']['NOMBRE']."','$accion','".$elemento." ".$nombre."','$fecha','$hora'");
    }
?>