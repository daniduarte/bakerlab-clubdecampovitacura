<?php 
	/* FUNCIONES PARA MÓDULOS DINÁMICOS */
    function get_dynamic_val($cadena)
    {   	

    	$valor  = explode(";mdvsep;", $cadena);

        for($v = 0; $v < count($valor); $v++)
        {
        	if($valor[$v] != "")
        	{
	            $ex_two     = explode(";mdvequal;", $valor[$v]);
	            $slug       = $ex_two[0];
	            $val        = $ex_two[1];

	            $arr[$slug] = $val;
	        }
        }

        return $arr;
    }
?>