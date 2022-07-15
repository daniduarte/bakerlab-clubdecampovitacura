<?php

	require_once("../../mdv.php");
	
	ini_set("display_errors",1);

	$nombre 	= trim($_POST['user']);
	$pass 		= trim($_POST['pass']);

	// ¿Usuario existe?
	if(Filas("mdv_usuarios","usuario = '".$nombre."' and password = '".md5($pass)."' and estado = 0") > 0)
	{

		$the_user	= mysql_fetch_assoc(Datos("mdv_usuarios",
											  "usuario = '".$nombre."' and password = '".md5($pass)."'",
											  "*"));

		$_SESSION['USR']['NICK'] 		= $nombre;
		$_SESSION['USR']['NOMBRE'] 		= $the_user['nombre'];
		$_SESSION['USR']['PERMISOS'] 	= $the_user['permisos'];
		$_SESSION['USR']['ACCESOS'] 	= $the_user['accesos'];
		$_SESSION['USR']['LOGUEADO']	= "SI";
		$_SESSION['USR']['PERFIL']		= $the_user['perfil'];

		$_SESSION['USR']['LLAVE'] 		= md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
		$_SESSION['USR']['LAST_ACCESS']	= date("Y-n-j H:i:s");
		

		$the_times	= $the_user['acc_times'] + 1;

		// Modificar último acceso del usuario y veces que ha accedido
		Modificar("mdv_usuarios","usuario = '".$nombre."'","ult_acc = '".date("Y-n-j H:i:s")."', 
															acc_times = '".$the_times."',
															ult_ip = '".$_SERVER['REMOTE_ADDR']."'");	
		
		echo 1; // Usuario logueado con exito

	}else{
		echo 2; // Combinación incorrecta
	}
?>