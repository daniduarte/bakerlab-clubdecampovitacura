<?php
session_start();

date_default_timezone_set('America/Santiago');

define("_isLocal", true);
ini_set("display_errors",1);

if(_isLocal)
{

	$mdv_admin["DBHOST"]	= "localhost";

	// Usuario BD
	$mdv_admin["DBUSER"] 	= "clubvita_usr";
	
	// Password BD
	$mdv_admin["DBPWD"]		= "j1.4wc)jFB{z";
	
	// Nombre BD
	$mdv_admin["DBNAME"]	= "clubvita_bbdd";

	define("BASEURL","http://clubdecampovitacura.cl/mdv/");
	define("UPL_URL","http://clubdecampovitacura.cl/uploads/");
	define("WEB","http://clubdecampovitacura.cl/");
}
else
{

	$mdv_admin["DBHOST"]	= "";

	// Usuario BD
	$mdv_admin["DBUSER"] 	= "";

	// Password BD
	$mdv_admin["DBPWD"]		= "";

	// Nombre BD
	$mdv_admin["DBNAME"]	= "";
	
	define("BASEURL","");
	define("UPL_URL","");
	define("WEB","");

}

// Ruta Base
$mdv_admin["ABPATH"] 	= "/";

// Ruta Archivos
$mdv_admin["PHPABPATH"] = $_SERVER['DOCUMENT_ROOT'].$mdv_admin["ABPATH"];

// Ruta Real
$mdv_admin["REAL_RUTE"]	= realpath("");
define("UPLOAD_RUTE",realpath(""));

// Funciones de Acceso a Datos
require_once("dbaccess.php");

// Funciones del sitio
require_once("functions.php");

require_once("mailing/class.tmpl.php");
require_once("mailing/lib.phpmailer.php");
require_once("mailing/class.send.php");
?>