<?php	
    /* Conexión */
    function Conectar($host,$user,$pass,$db)
  	{
        $Conexion   = mysql_connect($host,$user,$pass);
     	  mysql_select_db($db, $Conexion);
     	  return($Conexion);
  	}

    define("conect_me", Conectar(_host,_user,_pass,_dbname));

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
	  	return utf8_decode($txt);
  	}
  
  	function e($txt)
  	{
		return addslashes(utf8_encode($txt));
  	}

    function post_encoder($arr)
    {
        foreach ($arr as $p => $v) {
            $arr[$p]    = e($v);
        }

        return $arr;
    }
