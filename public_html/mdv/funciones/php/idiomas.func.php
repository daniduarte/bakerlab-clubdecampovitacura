<?php 
    /* FUNCIONES DE MULTI-IDIOMA */

    function idioma($codigo)
    {
        $valor  = mysql_fetch_assoc(Datos("mdv_idiomas","codigo = '".$codigo."'","nombre"));

        return d($valor['nombre']);
    }

    function edicion_multi_idioma($elemento)
    {
        // Dividir elemento
        $division  = explode(";mdvsep;",$elemento);

        for($obj = 0; $obj < count($division); $obj++)
        {
            if($division[$obj] != "")
            {
                $separador  = explode(";equal;",$division[$obj]);
                $codigo_idi = $separador[0];

                $exploded[$codigo_idi] = d($separador[1]);
            }                                    
        }

        return $exploded;

    }

    function elemento_multi_idioma($elemento,$idioma)
    {
        // Dividir elemento
        $division  = explode(";mdvsep;",$elemento);

        for($obj = 0; $obj < count($division); $obj++)
        {
            if($division[$obj] != "")
            {
                $separador  = explode(";equal;",$division[$obj]);
                $codigo_idi = $separador[0];

                $exploded[$codigo_idi] = d($separador[1]);
            }                                    
        }

        return $exploded[$idioma];

    }

    function imprime_multi_idioma($elemento)
    {
        // Dividir elemento
        $division   = explode(";mdvsep;",$elemento);

        $to_print   = "";

        for($p = 0; $p < count($division); $p++)
        {
            if($division[$p] != "")
            {
                $sep_nom  = explode(";equal;",$division[$p]);
                $langcod  = $sep_nom[0];

                $to_print .= "<b>".idioma($langcod).":</b> ".d($sep_nom[1])."<br />"; 
            }                                    
        }

        return $to_print;

    }

    function imprime_img_multi_idioma($elemento)
    {
        // Dividir elemento
        $division   = explode(";mdvsep;",$elemento);

        $to_print   = "";

        for($p = 0; $p < count($division); $p++)
        {
            if($division[$p] != "")
            {
                $sep_nom  = explode(";equal;",$division[$p]);
                $langcod  = $sep_nom[0];

                $to_print .= "<b>".idioma($langcod).":</b> <a class='lightbox_trigger' href='".UPL_URL.$sep_nom[1]."'>".d($sep_nom[1])."</a><br />"; 
            }                                    
        }

        return $to_print;

    }
?>