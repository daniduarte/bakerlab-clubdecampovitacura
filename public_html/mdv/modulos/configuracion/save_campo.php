<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['nombre']		= e($_POST['nombre']);
		$_POST['help_block']	= e($_POST['help_block']);
		$_POST['tipo']			= e($_POST['tipo']);
		$_POST['requerido']		= e($_POST['requerido']);
		$_POST['slug']			= e($_POST['slug']);

		$tabla					= "mdv_dynamic_fields";
		$slug 					= "Campo ";
		$txt_mod				= "modificado";
		$txt_new				= "creado";

		$art_this				= "este ";
		$art_new				= "nuevo ";
		$txt_obj 				= "campo";

		$ruta_new				= "new_field";
		$ruta_mod				= "edit_field";
		$ruta_volver			= "conf_modulo";

		switch($_POST["modo"])
		{

			case "nuevo":

				Insertar($tabla,
						 "nombre,help_block,tipo,mdv_modulo,
						  requerido,centrado,ancho,
						  slug,orden,visible",
						 "'$_POST[nombre]','$_POST[help_block]','$_POST[tipo]','$_POST[mdv_modulo]',
						  '$_POST[requerido]','$_POST[centrado]','$_POST[ancho]',
						  '$_POST[slug]',0,0");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">	       			
                    	<a href="<?=$_POST['ruta'];?><?=$ruta_new;?>/<?=$_POST['mdv_modulo']?>" class="btn btn-success">
	       					+ Crear <?=$art_new.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_mod;?>/<?=$id;?>" class="btn btn-info">
	       					Editar <?=$art_this.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;	       			
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_volver;?>/<?=$_POST['mdv_modulo']?>" class="btn btn-danger">
	       					Volver
	       				</a>	       				
	            	</div>

                </form>

			<?php

				break;

			case "edit":

				Modificar($tabla,
						 "id = ".$id_obj,
						 "nombre = '$_POST[nombre]', help_block = '$_POST[help_block]',
						  tipo = '$_POST[tipo]', requerido = '$_POST[requerido]',
						  centrado = '$_POST[centrado]', ancho = '$_POST[ancho]'");

				$id 	= $id_obj;

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">	       			
                    	<a href="<?=$_POST['ruta'];?><?=$ruta_new;?>/<?=$_POST['mdv_modulo']?>" class="btn btn-success">
	       					+ Crear <?=$art_new.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_mod;?>/<?=$id;?>" class="btn btn-info">
	       					Editar <?=$art_this.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;	       			
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_volver;?>/<?=$_POST['mdv_modulo']?>" class="btn btn-danger">
	       					Volver
	       				</a>	       				
	            	</div>

                </form>

			<?php

				break;

			case "borrar":

				Eliminar($tabla,"id=".$id_obj);

				break;

			case "desactivar":

				Modificar($tabla,"id=".$id_obj,"visible = 1");

				break;

			case "activar":

				Modificar($tabla,"id=".$id_obj,"visible = 0");

				break;

			case "reordenar":

				$i 		= 1;

				foreach($_POST['campos'] as $id){

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