<?php	
	if(_viewFile !== "3d34c08bbf83817542d1457aaf9c3517")  exit("Usted no puede acceder al archivo directamente");

	// Optimización de código y performance - WPO
	header('Content-Type: text/html; charset=UTF-8');
	header('Vary: Accept-Encoding');
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
	header("Pragma: no-cache"); //HTTP 1.0
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	// Debug Mode
	define("_debug", true);

	// Local or Web Mode
	define("_modeLocal", true);

	// URL's	
	define("_site", "");
	define("_port", "");
	define("_web", "http://".$_SERVER["SERVER_NAME"]._port._site);
	define("_cms", _site."/_app");
	//define("_static", _site."/_static");
	define("_static", _web."/_static");
	define("_uploads", _site."/uploads");

	// App DIR URL
	define("_appDIR", $_SERVER["DOCUMENT_ROOT"]._cms);
	define("_appName", "Club de Campo Vitacura");
	define("_appUData", $_SERVER['HTTP_USER_AGENT']." / ".$_SERVER['REMOTE_ADDR']);
	define("_serverName", $_SERVER["SERVER_NAME"]);
	
	// Check request URI last char
	$last_char		= substr($_SERVER['REQUEST_URI'], -1);
	$req_uri		= $last_char == "/" ? $_SERVER["REQUEST_URI"] : $_SERVER["REQUEST_URI"]."/";
	
	define("_canonicalURL", $_SERVER["SERVER_NAME"].$req_uri);

	// DB Connection
	if(_modeLocal)
	{
		define("_host","localhost");
		define("_user","clubvita_usr");
		define("_pass","j1.4wc)jFB{z");
		define("_imgApiURL","");
	}
	else
	{
		define("_host","");
		define("_user","");
		define("_pass","");
		define("_imgApiURL","");
	}

	if(_debug)
	{
		ini_set("display_errors",false);
	}
	else
	{
		ini_set("display_errors",false);
	}

	ini_set('max_execution_time', -1);	

	// Secure ajax
	define("_ajaxPipe", sha1(sha1(_appName).md5(_appName)));

	// Set time-zone
	define("_timeZone", -4);

	if(_timeZone == -4) date_default_timezone_set("America/Santiago");
	if(_timeZone == -3) date_default_timezone_set("America/Argentina/Buenos_Aires");

	// Generar sesiones de usuario.

	session_name("ElCobre"); 
	session_start();

	// Crear ID Login (email)
	$has_login = (isset($_SESSION['email']) && $_SESSION['email'] != "") ? true : false;
	define("_isLogin", $has_login);

	// Función global de compresión
	function comprimir_pagina($buffer)
	{
	    $busca = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'); 
	    $reemplaza = array('>','<','\\1'); 
	    return preg_replace($busca, $reemplaza, $buffer); 
	}
	
	define("_emailToContacto","");
	define("_emailFromNotResponse","");
	
	define("_emailToNews","");
	define("_emailToNews_b","");
	
	
	