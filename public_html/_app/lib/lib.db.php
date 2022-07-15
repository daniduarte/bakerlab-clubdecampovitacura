<?php	
    /* Conexión */
    function Conectar($host,$user,$pass,$db)
  	{
        $Conexion   = mysqli_connect($host,$user,$pass,$db);
     	mysqli_set_charset($Conexion,"utf8");
     	return($Conexion);
  	}

  	/* Devolver count de Filas */
  	function Filas($Tabla,$Condicion)
  	{ 
        $Enlace    = Conectar(_host,_user,_pass,_dbname);
        $Resultado = mysqli_query($Enlace,"SELECT * FROM ".$Tabla." where ".$Condicion);
     	return mysqli_num_rows($Resultado);
  	}

  	/* Insertar Datos */
  	function Insertar($t,$c,$v)
  	{ 
        $Enlace     = Conectar(_host,_user,_pass,_dbname);
    	$cadena     = "INSERT INTO ".$t."(".$c.") VALUES (".$v.")";
    	$result     = mysqli_query($Enlace,$cadena);
  	}

  	/* Eliminar Datos */
  	function Eliminar($Tabla,$Condicion)
  	{
        $Enlace     = Conectar(_host,_user,_pass,_dbname);
		$Cadena     = "Delete from ".$Tabla." where ".$Condicion;
    	$Resultado  = mysqli_query($Enlace,$Cadena);
  	}

  	/* Retornar Datos */
  	function Datos($Tabla,$Condicion,$Campos)
   	{ 
        $Enlace     = Conectar(_host,_user,_pass,_dbname);
   		$result     = mysqli_query($Enlace,"SELECT ".$Campos." FROM ".$Tabla." where ".$Condicion);
   		return $result;
   	}

    /* Retornar Datos */
    function Datos_u($Tabla,$Condicion,$Campos)
    { 
        $Enlace     = Conectar(_host,_user,_pass,_dbname);
        $result     = mysqli_fetch_assoc(mysqli_query($Enlace,"SELECT ".$Campos." FROM ".$Tabla." where ".$Condicion));
        return $result;
    }

   	/* Modificar Datos */
  	function Modificar($Tabla,$Condicion,$Campos)
  	{
		$Enlace     = Conectar(_host,_user,_pass,_dbname);
		$Cadena     = "Update ".$Tabla." set ".$Campos." where ".$Condicion;
		$Resultado  = mysqli_query($Enlace,$Cadena);
  	}
  	
  	function sanitize($cadena)
  	{
	  	$Enlace     = Conectar(_host,_user,_pass,_dbname);
	  	$sanitizado	= mysqli_real_escape_string($Enlace,$cadena);
	  	
	  	return $sanitizado;
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
