<?php

	require_once("../../mdv.php");

	$email 		= trim($_POST['email']);
	$err_us		= 0;
	$err_em		= 0;

	// ¿Usuario existe? - Validación por e-mail
	if(Filas("mdv_usuarios","usuario = '".$email."' and estado = 0") > 0)
	{
		// Validación vía usuario
		$usuario 	= mysql_fetch_assoc(Datos("mdv_usuarios","usuario = '$email'","*"));
	}else{
		$err_us		= 1;
	}

	if(Filas("mdv_usuarios","email = '".$email."' and estado = 0") > 0)
	{
		// Validación vía e-mail
		$usuario 	= mysql_fetch_assoc(Datos("mdv_usuarios","email = '$email'","*"));
	}else{
		$err_em		= 1;
	}

	if($err_us == 1 && $err_em == 1)
	{
		echo 2; // Usuario no existe
	}else{
		// Crear nueva Password
        $str = "1234567890abcdefghijklmnopqrstuvwxyz";
        $cad = "";
            
        for($i=0;$i<12;$i++) {
        	$cad .= substr($str,rand(0,30),1);
        }

        $body   .= abre_email();
		$body   .= abre_tabla();

		$body   .= titulo("SOLICITUD DE CAMBIO DE PASSWORD","17b1ec");
		$body   .= espaciador();
		$body   .= espaciador();

		$body   .= texto("Se ha solicitado reestablecer su contrase&ntilde;a desde el sistema con fecha <b>".format_fecha_web(date("d/m/Y"),'spa')."</b>","normal");
		$body   .= espaciador();

		$body   .= texto("Su nueva contrase&ntilde;a es:","normal");
        $body   .= espaciador();

        $body   .= titulo("".$cad,"696969");
        
        $body   .= espaciador();

        $body   .= texto("Para su seguridad, modifique su contrase&ntilde;a desde el Sistema a la brevedad.","normal");
        $body   .= espaciador();

		$body   .= texto("Atentamente,","normal");
		$body   .= texto("Servicio Autom&aacute;tico Web MDV Admin","negrita");

		$body   .= espaciador();
		$body   .= espaciador();

		$body   .= centrado("Este es un e-mail autogenerado por el Sistema, por favor no responda este mensaje.");

		$body   .= cierra_tabla();
		                    
		// Función de envío de e-mail   
		mail ($usuario['email'], "Cambio de Password", $body, 
		"From: soporte@multidev.cl\nContent-Type: text/html; charset=utf-8\nContent-Transfer-Encoding: 8bit");

        Modificar("mdv_usuarios","usuario = '".$usuario['usuario']."'","password = '".md5($cad)."'");

        echo "Se ha enviado una nueva contraseña al e-mail ".$usuario['email'].".";
	}
	
?>