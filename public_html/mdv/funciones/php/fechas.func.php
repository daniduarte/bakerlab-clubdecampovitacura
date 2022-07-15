<?php 
	/* FUNCIONES DE FECHA */

    // Fechas con formato AAAA/MM/DD
    function format_fecha($fecha)
    {
    	$new_fecha 	= substr($fecha, 8, 2)."-".substr($fecha,5,2)."-".substr($fecha,0,4);
    	return $new_fecha;
    }

    // Fechas con formato DD/MM/AAAA
    function format_fecha_rev($fecha)
    {
    	$new_fecha 	= substr($fecha, -4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
    	return $new_fecha;
    }

    // Fechas con formato dd/mm/aaaa
    function format_fecha_web($fecha,$idioma)
    {

        if(strlen($fecha) == 9)
        {
            $fecha      = "0".$fecha;
        }

        if($idioma == "spa")
        {
            $dia        = substr($fecha, 0,2);
            $mes        = substr($fecha, 3,2);
            $ano        = substr($fecha, 6,4);

            $mo['01']   = "Enero";
            $mo['02']   = "Febrero";
            $mo['03']   = "Marzo";
            $mo['04']   = "Abril";
            $mo['05']   = "Mayo";
            $mo['06']   = "Junio";
            $mo['07']   = "Julio";
            $mo['08']   = "Agosto";
            $mo['09']   = "Septiembre";
            $mo['10']   = "Octubre";
            $mo['11']   = "Noviembre";
            $mo['12']   = "Diciembre";

            return $dia." de ".$mo[$mes]." de ".$ano;

        }else{

            $dia        = substr($fecha, 0,2);
            $mes        = substr($fecha, 3,2);
            $ano        = substr($fecha, 6,4);

            $mo['01']   = "January";
            $mo['02']   = "February";
            $mo['03']   = "March";
            $mo['04']   = "April";
            $mo['05']   = "May";
            $mo['06']   = "June";
            $mo['07']   = "July";
            $mo['08']   = "August";
            $mo['09']   = "September";
            $mo['10']   = "October";
            $mo['11']   = "November";
            $mo['12']   = "December";

            return $mo[$mes]." ".$dia.", ".$ano;

        }
    }

    /* Campo de Hora */

	function horario($name,$hr_fr,$min_fr,$hr_to,$min_to,$valor)
	{

		if($valor != "")
		{
			$hora		= substr($valor,0,2);
			$minutos	= substr($valor,3,2);
		}else{
			$hora 		= "";
			$minutos	= "";
		}

		$html 	= '<select name="'.$name.'_hr" id="'.$name.'_hr" style="width:8%">';

					for($hr = $hr_fr; $hr <= $hr_to; $hr++)
					{
						$hr 	= (strlen($hr) == 1)? "0".$hr : $hr;

						$html .= '<option value="'.$hr.'"';
						$html .= ($hora == $hr)? ' selected':'';
						$html .= '>'.$hr.'</option>';
					}

        $html  .= '</select><span style="line-height:28px;">&nbsp;:&nbsp;</span>';

        $html  .= '<select name="'.$name.'_min" id="'.$name.'_min" style="width:8%">';

					for($mi = $min_fr; $mi <= $min_to; $mi++)
					{						
						$mi 	= (strlen($mi) == 1)? "0".$mi : $mi;

						$html .= '<option value="'.$mi.'"';
						$html .= ($minutos == $mi)? ' selected':'';
						$html .= '>'.$mi.'</option>';
					}
					
        $html  .= '</select>';

        return $html;

	}

    function es_habil($fecha)
    {

        $feriados   = array();

        array_push($feriados, "01-01", "03-29", "05-01", "05-21", "06-29", "07-16", "08-15", "09-18", "09-19", "09-20",
                              "10-12", "10-31", "11-01", "12-08", "12-25");

        $fecha_real     = date("m-d",$fecha);

        if (in_array($fecha_real, $feriados)) 
        {
            return false;
        }else{

            $dia    = date('w', $fecha);

            if($dia == 0 || $dia == 6)
            {
                return false;
            }else{
                return true;
            }

        }
        
    }

    function resta_fechas_habiles($inicio, $final) { 

        $start_ts   = strtotime($inicio); 
        $end_ts     = strtotime($final);
        $diferencia = $end_ts - $start_ts;

        $dif_real   = round($diferencia / 86400);
        $conter     = $dif_real;

        for($i = 1; $i <= $conter; $i++)
        {
            $nuevafecha = strtotime ('-'.$i.' day',strtotime($final));

            if(!es_habil($nuevafecha))
            {
                $dif_real--;
            }
        }       

        return $dif_real;

    }

    function suma_fechas_habiles($inicio, $a_contar) { 

        $a_contar++;
        $start_ts   = $inicio; 

        $dias       = 1;
        $i          = 1;

        do
        {
            
            $nuevafecha = strtotime ('+'.$i.' day',strtotime($start_ts));
            
            $i++;

            if(es_habil($nuevafecha))
            {
                $dias++;
            }


        } while($dias < $a_contar);

        return $nuevafecha;

    }

    function retorna_mes($mes_num)
    {
        $mo['01']   = "Enero";
        $mo['02']   = "Febrero";
        $mo['03']   = "Marzo";
        $mo['04']   = "Abril";
        $mo['05']   = "Mayo";
        $mo['06']   = "Junio";
        $mo['07']   = "Julio";
        $mo['08']   = "Agosto";
        $mo['09']   = "Septiembre";
        $mo['10']   = "Octubre";
        $mo['11']   = "Noviembre";
        $mo['12']   = "Diciembre";

        return $mo[$mes_num];
    }
    
    function resta_fechas_habiles_custom($inicio, $final) {
    
    	if($inicio	== '0000-00-00' || $inicio == '')
    	{
	    	$dif_real	= '';
    	}
    	else
    	{
    	
    		if($final == '0000-00-00' || $final == '')
    		{
	    		$final 	= date("Y-m-d");
    		}

	        $start_ts   = strtotime($inicio); 
	        $end_ts     = strtotime($final);
	        $diferencia = $end_ts - $start_ts;
	
	        $dif_real   = round($diferencia / 86400);
	        $conter     = $dif_real;
	
	        for($i = 1; $i <= $conter; $i++)
	        {
	            $nuevafecha = strtotime ('-'.$i.' day',strtotime($final));
	
	            if(!es_habil($nuevafecha))
	            {
	                $dif_real--;
	            }
	        }
	    
	    }

        return $dif_real;

    }
    
    function dte_v($fecha)
	{
		$ret 		= '';
    	if($fecha != '1969-12-31' && $fecha != '' && $fecha != '0000-00-00')
    	{
	    	$ret 	= date("d-m-Y",strtotime($fecha));
    	}
    	return $ret;
	}
	
	function dte_d($fecha)
	{
		$ret 		= date("d-m-Y");
    	if($fecha != '1969-12-31' && $fecha != '' && $fecha != '0000-00-00')
    	{
	    	$ret 	= date("d-m-Y",strtotime($fecha));
    	}
    	return $ret;
	}
?>