<?php
    /* Funciones de implementación */

    function value($codigo)
    {
        $valor  = mysql_fetch_assoc(Datos("contenido","codigo = '".$codigo."'","valor"));

        return str_replace("\n","<br />",d($valor['valor']));
    }

    function conf($codigo)
    {
        $valor  = mysql_fetch_assoc(Datos("mdv_configuracion","codigo = '".$codigo."'","valor"));

        return $valor['valor'];
    }

    function rem_http($txt)
    {
        $txt    = str_replace("http://","",$txt);
        $txt    = str_replace("https://", "", $txt);

        return "http://".$txt;
    }


    function valida_url($url)
    {
        if($url != "" && ctype_digit($url) == true)
        {
            return true;
        }else{
            return false;
        }
    }

    /* Primera imagen */
    function first_image($arreglo)
    {
        if($arreglo != "")
        {
            $fotos    = explode(",", $arreglo);

            if($fotos[0] == "")
            {
                $fotos[0]   = $fotos[1];
            }

            return $fotos[0];
        }
        else
        {
            return "";
        }
            
    }
   

    /* FUNCION PARA CALCULAR TAMAÑO DE PÁGINA */
    function tamano_pagina($numReg,$elepp,$ac_page,$me)
    {

        // $numReg  -> Número de Registros
        // $elepp   -> Elementos por página
        // $ac_page -> Página Actual
        // $page_arr-> Arreglo de resultados
        // $me      -> Página a la cual debe redireccionar
                
        if($numReg > 0)
        {  
            // Calculo de elementos necesarios para paginación
            $tamPag = $elepp;
            $pagina = $ac_page;
        
            if(!(ctype_digit($pagina)))
            {
                $pagina = 1;
            }
            
            // Página actual si no esta definida y limites
            if(!isset($pagina))
            {
                $pagina=1;
                $inicio=1;
                $final=$tamPag;
            }

            // Cálculo del limite inferior
            $limitInf   = ($pagina-1) * $tamPag;

            // Cálculo del numero de páginas
            $numPags    = ceil($numReg / $tamPag);

            if(!isset($pagina))
            {

                $pagina     = 1;
                $inicio     = 1;
                $final      = $tamPag;

            }else{

                $seccionActual  = intval(($pagina - 1) / $tamPag);
                $inicio         = ($seccionActual * $tamPag) + 1;

                if($pagina < $numPags)
                {
                    $final      = $inicio + $tamPag - 1;
                }else{
                    $final      = $numPags;
                }

                if ($final > $numPags){
                    $final      = $numPags;
                }

            }

            /* DESDE AQUÍ PARTE EL CÓDIGO HTML PARA IMPLEMENTAR EL PAGINADOR */

            $html       = ' <div class="pag">';

            if($pagina > 1)
            {

                $html       .= '<div class="anterior">
                                    <a href="'.$me."&p=".($pagina-1).'">Anterior</a>
                                </div>';

            }
            else
            {
                $html       .= '<div class="anterior">
                                    <a style="color:#CCC">Anterior</a>
                                </div>';
            }

            for($i = 1; $i <= $numPags; $i++)           
            {           
                if($i == $pagina)           
                {   
                    $html   .= '<div class="num"><a style="background:#333; color:#fff; border:#333 solid 1px;" href="#">'.$i.'</a></div>';
                }else{
                    $html   .= '<div class="num"><a href="'.$me."&p=".$i.'">'.$i.'</a></div>';
                }
            }

            if($pagina < $numPags)              
            {

                $html       .= '<div class="anterior" style="float:right;">
                                    <a href="'.$me."&p=".($pagina+1).'">Siguente</a>
                                </div>';

            }            
            else
            {
                $html       .= '<div class="anterior" style="float:right;">
                                    <a style="color:#CCC">Siguiente</a>
                                </div>';
            }

            $html       .= ' </div>';

            /* ACA TERMINA EL CODIGO HTML DE IMPLEMENTACIÓN DEL PAGINADOR */


            // Armar arreglo para devolver resultados
            $page_arr['limitInf']   = $limitInf;
            $page_arr['tamPag']     = $tamPag;
            $page_arr['html']       = $html;

        }else{

            // Armar arreglo para devolver resultados
            $page_arr['limitInf']   = 0;
            $page_arr['tamPag']     = 0;
            $page_arr['html']       = "";

        }

        return $page_arr;

    }

    // Fechas con formato aaaa/mm/dd
    function fecha_to_text($fecha)
    {

        $dia        = str_replace("-","",substr($fecha, -2));
        $mes        = str_replace("-","",substr($fecha, 5,2));
        $ano        = substr($fecha, 0,4);

        if(strlen($mes) == 1)
        {
            $mes    = "0".$mes;
        }

        $mo['01']   = "ENE";
        $mo['02']   = "FEB";
        $mo['03']   = "MAR";
        $mo['04']   = "ABR";
        $mo['05']   = "MAY";
        $mo['06']   = "JUN";
        $mo['07']   = "JUL";
        $mo['08']   = "AGO";
        $mo['09']   = "SEP";
        $mo['10']   = "OCT";
        $mo['11']   = "NOV";
        $mo['12']   = "DIC";

        return $dia." ".$mo[$mes]." ".$ano;
    }
    
    // Recibe aaaa-mm-dd <=> Entrega <nombre_dia> <dia>, <mes>
    function short_date_to_text($fecha)
    {

        $dia        = str_replace("-","",substr($fecha, -2));
        $mes        = str_replace("-","",substr($fecha, 5,2));
        $ano        = substr($fecha, 0,4);
        
        $strdate_fecha	= strtotime($fecha);

        if(strlen($mes) == 1)
        {
            $mes    = "0".$mes;
        }

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
        
        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

        return $dias[date("w",$strdate_fecha)]." ".$dia." de ".$mo[$mes].", ".$ano;
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

    function dynamic_slugs($item_name)
    {
        $d_modulo   = Datos_u("mdv_modulos","codigo = '".$item_name."'","*");

        // Almacenar los campos dinámicos
        $columns    = Datos("mdv_dynamic_fields",
                            "mdv_modulo = ".$d_modulo['id']." and visible = 0 order by orden ASC","*");

        $slugs      = "";

        while($c = mysql_fetch_assoc($columns))
        {
            $slugs      .= $c['slug'].',';        
        }

        return substr($slugs,0,-1);
                                
    }

    function print_form($nombre)
    {
        $txt    = ' name="'.$nombre.'" id="'.$nombre.'" onclick="clean_form('."'".$nombre."'".')" onfocus="clean_form('."'".$nombre."'".')"';
        return $txt;
    }

    // Restar fecha
    function resta_fecha($fecha_principal, $fecha_secundaria){
        
        $f0 = strtotime($fecha_principal);
        $f1 = strtotime($fecha_secundaria);
        
        if ($f0 < $f1) { $tmp = $f1; $f1 = $f0; $f0 = $tmp; }
        
        $resultado = ($f0 - $f1);

        $minutos    = $resultado / 60;
        $horas      = $resultado / 60 / 60;
        $dias       = $resultado / 60 / 60 / 24;
        $semanas    = $resultado / 60 / 60 / 24 / 7;

        $devuelve   = "";
   
        if($minutos > 59)
        {

            if($horas > 23)
            {

                if($dias > 6)
                {

                    $devuelve   = (round($semanas) == 1)? round($semanas)." semana":round($semanas)." semanas";

                }else{
                    $devuelve   = (round($dias) == 1)? round($dias)." día":round($dias)." días";
                }

            }else{
                $devuelve   = (round($horas) == 1)? round($horas)." hora":round($horas)." horas";
            }


        }else{
            $devuelve   = (round($minutos) == 1)? round($minutos)." minuto":round($minutos)." minutos";
        }
        
        return $devuelve;
    }

    function muestra_contenido($recept)
    {
        return "";
    }

    function getout()
    {
        echo "<script>window.location.href='"._web."'</script>";
    }

    function go($url)
    {
        echo "<script>window.location.href='".$url."'</script>";
    }
    
    function valida_rut($r)
    {
        $r    = strtoupper(ereg_replace('\.|,|-','',$r));
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
