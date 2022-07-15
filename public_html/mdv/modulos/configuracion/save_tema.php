<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['nombre']		= e($_POST['nombre']);

		$tabla					= "mdv_help_temas";
		$slug 					= "Tema ";
		$txt_mod				= "modificado";
		$txt_new				= "creado";

		$art_this				= "este ";
		$art_new				= "nuevo ";
		$txt_obj 				= "tema";

		$ruta_new				= "new_tema";
		$ruta_mod				= "edit_tema";
		$ruta_volver			= "ayuda";

		switch($_POST["modo"])
		{

			case "nuevo":

				Insertar($tabla,
						 "nombre",
						 "'$_POST[nombre]'");

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
						  "nombre = '$_POST[nombre]'");

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

						$id 	= str_replace("row_", "", $id);

						Modificar($tabla,"id = ".$id,"orden = ".$i);

						$i++;
					} 

				}

				break;
				
		}	
	} 
?>