<?php 
	// Funciones de preparación de e-mails

    function abre_email()
    {
        $html   = ' <html>
                        <head>
                            <style type="text/css">
                                .Estilo5 { font-family: Helvetica, sans-serif; }
                                .Estilo6 { font-family: Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
                                #tabla { border:1px solid #CCC; padding:15px; }
                                .blanco { color:#FFF; font-family: Helvetica; line-height:30px; }

                                .h2 { margin-bottom:3px; margin-top:5px; font-size:20px; }
                                .h3 { font-size:18px; font-weight:bold; font-family: Helvetica; }

                                .texto { color: #666; font-family: Helvetica; font-size:12px; }
                                .normal { font-weight:normal; }
                                .negrita { font-weight:bold; }

                                .celda { border:1px solid #FFF; padding:4px; width:50%; }
                                .celda_simple { border:1px solid #FFF; padding:4px; }

                                .gris_claro { background-color: #ddd;}
                                .gris_oscuro { background-color: #d1d1d1;}

                                .imagen { width:10%; text-align:center; }

                                .centrado { font-family:Helvetica; text-align:center; font-size:10px; color: #666; }
                            </style>
                        </head>
                        <body>';

        return $html;
    }

    function abre_tabla()
    {
        $html   = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" id="tabla">';

        return $html;
    }

    function cierra_tabla()
    {
        $html   = ' </table>
                        </body>
                        </html>';

        return $html;
    }

    function espaciador()
    {
        $html   = ' <tr bgcolor="#FFF">
                        <td colspan="8">&nbsp;</td>
                    </tr>';

        return $html;
    }

    function titulo($txt,$color)
    {
        $html   = ' <tr bgcolor="#'.$color.'">
                        <td colspan="8" align="center" class="blanco"><h2 class="h2">'.$txt.'</h2></td>
                    </tr>';

        return $html;
    }

    function subtitulo($txt)
    {
        $html   = ' <tr>
                        <td colspan="8"><h3 class="h3">'.$txt.'</h2></td>
                    </tr>';

        return $html;
    }

    function texto($texto,$estilo)
    {
        $html   = ' <tr class="texto">
                        <td colspan="8"><span class="texto '.$estilo.'">'.$texto.'</span></td>
                    </tr>';

        return $html;
    }

    function centrado($texto)
    {
        $html   = ' <tr>
                        <td colspan="8" align="center"><span class="centrado">'.$texto.'</span></td>
                    </tr>';

        return $html;
    }

    function tabla_2col($r1,$r2,$color)
    {
        $html   = ' <tr class="texto">
                        <td colspan="4" class="celda" bgcolor="#'.$color.'">
                            <span class="texto">'.$r1.'</span>
                        </td>
                        <td colspan="4" class="celda" bgcolor="#'.$color.'">
                            <span class="texto">'.$r2.'</span>
                        </td>
                    </tr>';

        return $html;
    }

    function tabla_4col($r1,$r2,$r3,$r4,$color,$center)
    {
        $html   = ' <tr class="texto">
                        <td width="1" class="celda_simple imagen" bgcolor="#'.$color.'">
                            '.$r1.'
                        </td>
                        <td colspan="5" class="celda_simple" bgcolor="#'.$color.'">
                            <span class="texto">'.$r2.'</span>
                        </td>                        
                        <td class="celda_simple" bgcolor="#'.$color.'" '.$center.'>
                            <span class="texto">'.$r3.'</span>
                        </td>                        
                        <td class="celda_simple" bgcolor="#'.$color.'" align="right">
                            <span class="texto">'.$r4.'</span>
                        </td>
                    </tr>';

        return $html;
    }

    function tabla_3col($r1,$r2,$r3,$color)
    {
        $html   = ' <tr class="texto">
                        <td colspan="6" class="celda_simple" bgcolor="#'.$color.'">
                            <span class="texto">'.$r1.'</span>
                        </td>                        
                        <td colspan="1" class="celda_simple" bgcolor="#'.$color.'">
                            <span class="texto">'.$r2.'</span>
                        </td>                        
                        <td colspan="1" class="celda_simple" bgcolor="#'.$color.'" align="right">
                            <span class="texto">'.$r3.'</span>
                        </td>
                    </tr>';

        return $html;
    } 
?>