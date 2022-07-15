<?php 
	// Retornar imagenes
    
    $arreglo    = explode(",",$_GET['imagenes']);

    $largo      = count($arreglo) - 1;

    $ruta       = $_GET['ruta'];
    
    	// Comentario 222
?>
    <div class="span12">
<?php
    for($im = 0; $im <= $largo; $im++)
    {

        if($arreglo[$im] != "")
        {
            $ok     = 1;
?>
        <div style="width:80px; height:100px; background:#FFF; padding:6px; text-align:center; margin:5px; float:left;">
            <div style="float:left; height:80px; width:80px; background-image:url(<?=$ruta;?><?=$arreglo[$im];?>); 
                        background-position:center; background-size: 100% auto; background-repeat:no-repeat;">
                <!--<img src="<?=$ruta;?><?=$arreglo[$im];?>" alt="" style="width:80px; height:auto;">-->
            </div>
            <br />
            <a href="#" onclick="remove_me('<?=$arreglo[$im];?>','<?=$_GET['campo'];?>'); return false;">
                <i class="icon-remove"></i>
                Eliminar
            </a>
        </div>
<?php
        }
    }

    echo ($ok != 1)? 'Sin imagenes...':'';
?>
    </div>