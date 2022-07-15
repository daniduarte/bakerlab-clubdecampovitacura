<?php
	
    /* Conexión */
    function Conectar($host,$user,$pass,$db)
  	{
        $Conexion   = mysql_connect($host,$user,$pass);
     	mysql_select_db($db, $Conexion);
     	//mysql_set_charset("utf8");
     	return($Conexion);
  	}

    define("conect_me", Conectar($mdv_admin["DBHOST"],$mdv_admin["DBUSER"],$mdv_admin["DBPWD"],$mdv_admin["DBNAME"]));

  	/* Devolver count de Filas */
  	function Filas($Tabla,$Condicion)
  	{ 
        $Enlace    = conect_me;
     	  $Resultado = mysql_query("SELECT * FROM ".$Tabla." where ".$Condicion, $Enlace);
     	  return mysql_num_rows($Resultado);
  	}

  	/* Insertar Datos */
  	function Insertar($t,$c,$v)
  	{ 
        $Enlace     = conect_me;
    	  $cadena     = "INSERT INTO ".$t."(".$c.") VALUES (".$v.")";
    	  $result     = mysql_query($cadena,$Enlace);
  	}

  	/* Eliminar Datos */
  	function Eliminar($Tabla,$Condicion)
  	{
        $Enlace     = conect_me;
		    $Cadena     = "Delete from ".$Tabla." where ".$Condicion;
    	  $Resultado  = mysql_query($Cadena,$Enlace);
  	}

  	/* Retornar Datos */
  	function Datos($Tabla,$Condicion,$Campos)
   	{ 
        $Enlace     = conect_me;
   		  $result     = mysql_query("SELECT ".$Campos." FROM ".$Tabla." where ".$Condicion, $Enlace);
   		  return $result;
   	}

    /* Retornar Datos */
    function Datos_u($Tabla,$Condicion,$Campos)
    {
        $Enlace     = conect_me;
        $result     = mysql_fetch_assoc(mysql_query("SELECT ".$Campos." FROM ".$Tabla." where ".$Condicion, $Enlace));
        return $result;
    }

   	/* Modificar Datos */
  	function Modificar($Tabla,$Condicion,$Campos)
  	{
		    $Enlace     = conect_me;
		    $Cadena     = "Update ".$Tabla." set ".$Campos." where ".$Condicion;
		    $Resultado  = mysql_query($Cadena);
  	}
  
  	/* DECODE Y ENCODE */
  	function d($txt)
  	{
	  	  return (utf8_decode($txt));
  	}
  
  	function e($txt)
  	{
		    return (utf8_encode($txt));
  	}
  	
  	function inv($fecha)
	{
		$new	= date("Y-m-d",strtotime($fecha));
		
		if($new == '1969-12-31')
		{
			$new 	= '0000-00-00';
		}
		return $new;
	}
	
	function cinv($fecha)
	{
		$new	= date("d-m-Y",strtotime($fecha));		
		
		return $new;
	}
	
	function rinv($fecha)
	{
		if($fecha == '1969-12-31' || $fecha	== '0000-00-00' || $fecha == '')
		{			
			$new 	= '';
		}
		else
		{
			$new	= date("d-m-Y",strtotime($fecha));
		}
		return $new;
	}
