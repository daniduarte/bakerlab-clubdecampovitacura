<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['tema']			= e($_POST['tema']);
		$_POST['nombre']		= e($_POST['nombre']);
		$_POST['epigrafe']		= e($_POST['epigrafe']);
		$_POST['texto']			= e($_POST['texto']);

		$tabla					= "mdv_help_items";
		$slug 					= "Item ";
		$txt_mod				= "modificado";
		$txt_new				= "creado";

		$art_this				= "este ";
		$art_new				= "nuevo ";
		$txt_obj 				= "ítem";

		$ruta_new				= "new_item";
		$ruta_mod				= "edit_item";
		$ruta_volver			= "ayuda";

		switch($_POST["modo"])
		{

			case "nuevo":

				Insertar($tabla,
						 "id_tema, nombre, epigrafe, contenido, orden",
						 "'$_POST[tema]','$_POST[nombre]','$_POST[epigrafe]','$_POST[texto]','0'");

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
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_volver;?>" class="btn btn-danger">
	       					Volver
	       				</a>
	            	</div>

                </form>

			<?php

				break;

			case "edit":

				Modificar($tabla,
						  "id = ".$id_obj,
						  "id_tema = '$_POST[tema]', 
						   nombre = '$_POST[nombre]', 
						   epigrafe = '$_POST[epigrafe]', 
						   contenido = '$_POST[texto]'");

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
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_volver;?>" class="btn btn-danger">Volver</a>
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

						$id 	= str_replace("rowi_", "", $id);

						Modificar($tabla,"id = ".$id,"orden = ".$i);

						$i++;
					} 

				}

				break;
				
		}	
	} 
?>