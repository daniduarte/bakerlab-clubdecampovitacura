<?php 
	// Cargar Archivos
	require_once("../../mdv.php");

	$identificador 	= $_POST['identificador'];

	switch ($_POST['modo']) {
		
		case 'form':
?>
		<div class="span12" style="padding:5px; padding-left:0px;">
			<h4>Crear carpeta</h4>
			
			<div class="alert alert-info alert-block span11" style="margin-left:0px;padding:6px;">
		        <i class="icon-info-sign"></i> Las <b>Carpetas</b> ofrecen una manera simplificada de Organizar 
		        sus Archivos, Imágenes y Documentos.
		    </div>

			<div class="control-group">
                <label class="control-label" style="font-size:12px !important;">Indique un nombre para la carpeta</label>
                <div class="controls">
                    <input type="text" name="folder_name" id="folder_name" class="span11">
                    <input type="hidden" name="folder_parent" id="folder_parent" value="<?=$_POST['folder_parent']?>" />
                </div>
            </div>
            <a href="#" onclick="crear_carpeta('<?=$identificador;?>'); return false;" class="btn btn-info">Crear carpeta</a>
            <br /><br />
            <div class="span11" style="margin-left:0px;">
            	<!--Puede editar carpetas u organizar sus archivos de manera independiente desde el<br />
            	<b><a href="<?=BASEURL?>repositorio"><i class="icon-paper-clip"></i> Repositorio de Archivos</a></b>.-->
            </div>
		</div>
<?php
		break;

		case 'create':

			$login 	= $_SESSION['USR']['NICK'];

			if(Filas("mdv_folders","nombre = '".e($_POST['nombre'])."' and padre = ".$_POST['padre']." and usuario = '$login'") == 0)
			{				
				Insertar("mdv_folders","nombre, padre, usuario","'".e($_POST['nombre'])."',".$_POST['padre'].",'$login'");
				$id_new	= mysql_insert_id();
?>
		
		<div class="span12" style="padding:5px;">
			<h4>Crear carpeta</h4>
			<br />
			<h1 style="text-align:center; width:90%; font-size:50px;"><i class="icon-folder-open"></i></h1>
			<br />
			<div class="span12" style="text-align:center; width:90% !important;">
				¡Carpeta creada correctamente!<br /><br />
				<a href="#" onclick="abrir_carpeta(<?=$id_new?>,'<?=$identificador;?>'); return false;" class="btn btn-success">
					Abrir ésta carpeta
				</a>
			</div>
		</div>

<?php
			}else{
				echo "1";
			}

		break;

		case 'open':

		$icon['imagen'] 	= "icon-picture";
		$icon['documento'] 	= "icon-file";

		function human_filesize($bytes, $decimals = 1) {
		  	$sz = 'BKMGTP';
		  	$factor = floor((strlen($bytes) - 1) / 3);
		  	return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . @$sz[$factor];
		}

		$login      = $_SESSION['USR']['NICK'];

		$carpeta	= Datos_u("mdv_folders","id = ".$_POST['id']." and usuario = '$login'","*");
?>

		<div class="widget-content nopadding">

            <h5 style="text-align:left;">
            	<?=($_POST['id'] == 0)? 'Directorio de Archivos':d($carpeta['nombre']);?>
            </h5>

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
	            	if($_POST['id'] != 0)
	            	{            		
	            		$padre 			= Datos_u("mdv_folders","id = ".$carpeta['padre']." and usuario = '$login'","*");

	            		if($carpeta['padre'] == 0)
	            		{
	            			$a_donde	= " al Inicio";
	            		}else{
	            			$a_donde	= " a ".d($padre['nombre']);
	            		}
	            ?>
	            	<tr style="cursor:pointer;" onclick="abrir_carpeta(<?=$carpeta['padre']?>,'<?=$identificador;?>')">
	                    <td width="5%"><i class="icon-circle-arrow-left"></i></td>
	                    <td colspan="3">Volver<?=$a_donde;?></td>
	                </tr>
	            <?php 
	            	}
	            ?>

	            <?php 
	                $carpetas       = Datos("mdv_folders","padre = ".$_POST['id']." and usuario = '$login' order by nombre ASC","*");

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
	            	$archivos 		= Datos("mdv_archivos","carpeta = '".$_POST['id']."' and usuario = '$login' order by fecha_ingreso DESC","*");

	            	$dir 			= str_replace("/mdv/funciones/repositorio", "", UPLOAD_RUTE)."/uploads";
	            	$base 			= str_replace("/mdv/funciones/repositorio", "", BASEURL)."uploads/";
					$thumb 			= str_replace("/mdv/funciones/repositorio", "", BASEURL)."uploads/thumbs/";

	                $therearefiles  = 0;

	            	while($a = mysql_fetch_assoc($archivos))
	            	{
	            		$tipo 		= $a['tipo'];
	            		$nombre 	= $a['nombre'];
	            		$fichero	= $dir."/".$nombre;

	            		/*if(is_file($fichero))
						{*/
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

	                if($therearefiles == 0 && mysql_num_rows($carpetas) == 0)
	                {
	            ?>
	                <tr>
	                    <td colspan="3" style="text-align:center;">
	                        Ésta carpeta está vacía
	                    </td>
	                </tr>
	            <?php
	                }
	            ?>

	            </tbody>
	        </table>

	    </div>
<?php
		break;

	}
?>