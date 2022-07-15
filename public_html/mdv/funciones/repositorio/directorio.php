<?php 
	// Cargar Archivos
	require_once("../../mdv.php");

	$pagina 			= $_POST['pagina'];
	$item 				= $_POST['item'];	
	$identificador 		= $_POST['identificador'];
	$name_id 			= $_POST['name_id'];

    $login              = $_SESSION['USR']['NICK'];

	$archivos 		   = Datos("mdv_archivos","carpeta = 0 and usuario = '$login' order by fecha_ingreso DESC","*");

	$icon['imagen'] 	= "icon-picture";
	$icon['documento'] 	= "icon-file";

	function human_filesize($bytes, $decimals = 1) {
	  	$sz = 'BKMGTP';
	  	$factor = floor((strlen($bytes) - 1) / 3);
	  	return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}

?>

<div class="widget-content span12" style="border-right:1px solid #CCC; border-bottom:0px;text-align:right">
	<a href="#" id="link_form_archivo" 
        onclick="formulario_archivo('<?=$identificador;?>',0); return false;">
        <i class="icon-plus"></i>&nbsp;Agregar archivos
    </a>
	&nbsp;&nbsp;&nbsp;
	<a href="#" id="link_form_carpeta" 
        onclick="formulario_carpeta('<?=$identificador;?>',0); return false;">
        <i class="icon-folder-open"></i>&nbsp;Crear carpeta
    </a>
	<br />
    <div id="listado_archivos">
    	<div class="widget-content nopadding">

            <h5 style="text-align:left;">Directorio de Archivos</h5>

    		<table class="table table-striped">

            	<thead>
                	<tr>
                    	<th width="9%">#</th>
                        <th>Nombre</th>
                        <th width="25%">Tamaño</th>
                        <th width="15%"><i class="icon icon-remove"></i></th>
                    </tr>                          
                </thead>

            </table>

    	</div>

    	<div class="widget-content nopadding"
            style="height:300px; overflow-y:auto; border:0px solid #CCC; border-top:0px;">
    		
    		<table class="table table-striped">

                <tbody>

                <?php                     
                    $carpetas       = Datos("mdv_folders","padre = 0 and usuario = '$login' order by nombre ASC","*");

                    while($c = mysql_fetch_assoc($carpetas))
                    {
                ?>
                    <tr style="cursor:pointer;" onclick="abrir_carpeta(<?=$c['id'];?>,'<?=$identificador;?>')">
                        <td width="5%"><i class="icon-folder-open"></i></td>
                        <td colspan="3"><?=d($c['nombre']);?></td>
                    </tr>
                <?php
                    }
                ?>
                
                <?php
                	$dir 			= str_replace("/mdv/funciones/repositorio", "", UPLOAD_RUTE)."/uploads";
                	$base 			= str_replace("/mdv/funciones/repositorio", "", BASEURL)."uploads/";
    				$thumb 			= str_replace("/mdv/funciones/repositorio", "", BASEURL)."uploads/thumbs/";

                    $therearefiles  = 0;

                	while($a = mysql_fetch_assoc($archivos))
                	{
                		$tipo 		= $a['tipo'];
                		$nombre 	= $a['nombre'];
                		$fichero	= $dir."/".$nombre;

                		//if(is_file($fichero))
    					//{
                            $therearefiles  = 1;
                ?>

                	<tr style="cursor:pointer;" id="file_<?=$a['id'];?>" class="filerow">
                		<td width="5%" onclick="abrir_archivo(<?=$a['id'];?>,'<?=$identificador;?>')"><i class="<?=$icon[$tipo]?>"></i></td>
                		<td class="filename" onclick="abrir_archivo(<?=$a['id'];?>,'<?=$identificador;?>')"><?=$a['nombre'];?></td>
                		<td width="20%" onclick="abrir_archivo(<?=$a['id'];?>,'<?=$identificador;?>')" style="text-align:center;">
                			<?=human_filesize(filesize($fichero));?>
                		</td>
                        <td width="15%" style="text-align:center;">
                            <a href="#" onclick="eliminar_archivo_form('<?=$identificador;?>',<?=$a['id'];?>);">
                                <i class="icon icon-remove"></i>
                            </a>
                        </td>
                	</tr>

                <?php
                		//}
                	}

                    if($therearefiles == 0)
                    {
                ?>
                    <tr>
                        <td colspan="3" style="text-align:center;">
                            No hay archivos en el Directorio
                        </td>
                    </tr>
                <?php
                    }
                ?>

                </tbody>
            </table>
    	</div>
    </div>
</div>