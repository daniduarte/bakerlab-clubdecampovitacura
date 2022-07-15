<?php

	/* Functions for MDV Admin */

	function web_title()
	{
		return "Club de Campo Vitacura";
	}

	function logotype($width,$height,$clases,$alt)
	{
		return '<img src="img/logo.png" width="'.$width.'" height="'.$height.'" class="'.$clases.'" alt="'.$alt.'" />';
	}
	
	// Comentario

	function call_head($for)
	{
		$styles	= '	<meta charset="UTF-8" />
					<meta name="viewport" content="width=device-width, initial-scale=1.0" />
					<link rel="icon" href="'.BASEURL.'favicon.ico" type="image/x-icon"/>
					<link rel="stylesheet" href="'.BASEURL.'css/bootstrap.min.css" />
					<link rel="stylesheet" href="'.BASEURL.'css/bootstrap-responsive.min.css" />';

		if($for == "login")
		{

			$styles	.= '<link rel="stylesheet" href="'.BASEURL.'css/mdv-login.css" />';

		}else{
			$styles	.= '<link rel="stylesheet" href="'.BASEURL.'css/fullcalendar.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/mdv-style.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/mdv-media.css" />        
						<link rel="stylesheet" href="'.BASEURL.'css/jquery.gritter.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/select2.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/uniform.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/bootstrap-wysihtml5.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/redactor.css" />
						<link rel="stylesheet" href="'.BASEURL.'css/datepicker.css" />';
		}

		$styles 	.= '<link href="'.BASEURL.'font-awesome/css/font-awesome.css" rel="stylesheet" />';
		$styles 	.= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css">';
		
		return $styles;

	}
	
    /* Validar Administrador Global */

    function is_god()
	{
	    if($_SESSION['USR']['PERMISOS'] == 1){
	      	return true;		
	    }else{
			return false;	
		}
	}

	function primer_nombre()
	{
		$name 	= explode(" ",d($_SESSION['USR']['NOMBRE']));
		return $name[0];
	}

	function permiso()
	{
	    return $_SESSION['USR']['PERMISOS'];
	}

	function perfil($perfil)
	{
	    switch($perfil)
		{
			case 2:
				$nombre 	= "Administrador";
			break;

			case 3:
				$nombre 	= "Encargado de Ventas";
			break;

			case 4:
				$nombre 	= "Perfil de Ingreso";
			break;

			case 5:
				$nombre 	= "Perfil de Consulta";
			break;

			case 1:
				$nombre 	= "Super Administrador";
			break;
		}

		return $nombre;
	}

	function conf_mdv($codigo)
    {
        $valor  = mysql_fetch_assoc(Datos("mdv_configuracion","codigo = '".$codigo."'","valor"));

        return $valor['valor'];
    }

    function conf_value($codigo)
	{
		$valor	= mysql_fetch_assoc(Datos("contenido","codigo = '".$codigo."'","valor"));

		return str_replace("\n","<br />",d($valor['valor']));
	}

	
	// Imprimir funciones para Formularios
	require_once("funciones/php/formularios.func.php");

	// Imprimir funciones básicas de funcionamiento (Ventanas modales, de eliminación, ayuda y otros)
	require_once("funciones/php/basicos.func.php");
	
	// Imprimir funciones para Paginadores
	require_once("funciones/php/paginadores.func.php");	

	// Imprimir funciones para trabajo con Fechas y Horarios
	require_once("funciones/php/fechas.func.php");

	// Imprimir funciones para trabajo con Módulos dinámicos
	require_once("funciones/php/dynamic.func.php");

	// Imprimir funciones para trabajo con E-mails (Ideal mejorarla con el tiempo...)
	require_once("funciones/php/mail.func.php");

    // Imprimir funciones para Multi-idiomas (Úsese según requisitos del sitio o plataforma)
	//require_once("funciones/php/idiomas.func.php");	

    // Imprimir funciones para trabajo con Eventos (Úsese según requisitos del sitio o plataforma)
	//require_once("funciones/php/eventos.func.php");

	// Imprimir funciones varias (Validadores de RUT entre otros)
	require_once("funciones/php/otros.func.php");       


function mifunc($json) 
{  
    // Author: walidator.info 2009 
    $comment = false; 
    $out = '$x='; 

    for ($i=0; $i<strlen($json); $i++) 
    { 
        if (!$comment) 
        { 
            if ($json[$i] == '{' || $json[$i] == '[')        $out .= ' array('; 
            else if ($json[$i] == '}' || $json[$i] == ']')    $out .= ')'; 
            else if ($json[$i] == ':')    $out .= '=>'; 
            else $out .= $json[$i];            
        } 
        else $out .= $json[$i]; 
        if ($json[$i] == '"')    $comment = !$comment; 
    } 
    eval("return $out ;"); 
    return $x; 
}
?>
