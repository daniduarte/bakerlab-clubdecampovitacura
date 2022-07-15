<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['unidad']		= e($_POST['unidad']);
		$_POST['habitaciones']	= e($_POST['habitaciones']);
		$_POST['banos']			= e($_POST['banos']);

		$tabla					= "unidades";
		$slug 					= "Unidad ";
		$txt_mod				= "modificada";
		$txt_new				= "creada";

		$art_this				= "esta ";
		$art_new				= "nueva ";
		$txt_obj 				= "unidad";

		$ruta_new				= "new_unidad";
		$ruta_mod				= "edit_unidad";
		$ruta_volver			= "";



		switch($_POST["modo"])
		{
			case "nuevo":

				Insertar($tabla,
						 "unidad,tipologia,habitaciones,banos,metraje,bodega,estacionamiento,imagen,esquicio",
						 "'$_POST[unidad]','$_POST[tipologia]','$_POST[habitaciones]','$_POST[banos]','$_POST[metraje]','$_POST[bodega]','$_POST[estacionamiento]','$_POST[imagen]','$_POST[esquicio]'");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_new;?>" class="btn btn-success">
	       					+ Crear <?=$art_new.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_mod;?>/<?=$id;?>" class="btn btn-info">
	       					Editar <?=$art_this.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;	       			
	       				<a href="javascript:window.history.back(-1);" class="btn btn-danger">
	       					Volver
	       				</a>
	            	</div>

                </form>

			<?php

				break;

			case "edit":

				Modificar($tabla,
						  "id = ".$id_obj,
						  "unidad = '$_POST[unidad]',
						   tipologia = '$_POST[tipologia]',
						   habitaciones = '$_POST[habitaciones]',
						   banos = '$_POST[banos]',
						   metraje = '$_POST[metraje]',
						   bodega = '$_POST[bodega]',
						   estacionamiento = '$_POST[estacionamiento]',
						   imagen = '$_POST[imagen]',
						   esquicio = '$_POST[esquicio]'");

				$id 	= $id_obj;				

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_mod;?>!</h4>
              			<?=$slug.$txt_mod;?> con éxito 
              		</div>

                    <div class="form-actions">
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_new;?>" class="btn btn-success">
	       					+ Crear <?=$art_new.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;	       				
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_mod;?>/<?=$id;?>" class="btn btn-info">
	       					Editar <?=$art_this.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;	       			
	       				<a href="javascript:window.history.back(-1);" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;

			case "borrar":

				Eliminar($tabla,"id = ".$id_obj);

				break;

			case "desactivar":

				Modificar($tabla,"id=".$id_obj,"estado = 1");

				break;

			case "activar":

				Modificar($tabla,"id=".$id_obj,"estado = 0");

				break;

			case "reordenar":

				$i 		= 1;
				$tb_id	= str_replace("#","",$_POST["tbid"]);

				foreach($_POST[$tb_id] as $id){

					if(trim($id) != ""){

						$id 	= str_replace("row_", "", $id);

						Modificar($tabla,"id = ".$id,"orden = ".$i);

						$i++;
					} 

				}

				break;
				
		}	
	} 
?>