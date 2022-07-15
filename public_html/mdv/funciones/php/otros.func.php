<?php 
	function img_first($imagenes)
    {
        
        $arreglo   = explode(",",$imagenes);

        if($arreglo[0] == "")
        {
            $foto   = $arreglo[1];
        }else{
            $foto   = $arreglo[0];
        }

        return $foto;

    }

    function valida_rut($r)
    {
        $r    = strtoupper(preg_replace('/\.|,|-/','',$r));
        $sub_rut= substr($r,0,strlen($r)-1);
        $sub_dv = substr($r,-1);
        $x    = 2;
        $s    = 0;
        for ( $i=strlen($sub_rut)-1;$i>=0;$i-- )
        {
          if ( $x >7 )
          {
            $x=2;
          }
          $s += $sub_rut[$i]*$x;
          $x++;
        }

       $dv=11-($s%11);

        if ( $dv==10 )
        {
          $dv='K';
        }

        if ( $dv==11 )
        {
          $dv='0';
        }

        if ( $dv==$sub_dv )
        {
          return true;
        }else{
          return false;
        }
    }

    function format_rut($rut)
    {
    	$rut 			= trim($rut);
    	$limpia_rut 	= strtoupper(preg_replace('/\.|,|-/','',$rut));
    	$rut_num		= substr($limpia_rut, 0, strlen($limpia_rut)-1);
    	$rut_dv			= substr($limpia_rut, -1);

    	$final_rut 		= number_format($rut_num,0,"",".")."-".$rut_dv;

    	return $final_rut;
    }

    function objectToArray($d) 
    {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
    
        if (is_array($d)) {
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }
?>