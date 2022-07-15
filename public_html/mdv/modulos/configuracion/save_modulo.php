<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['nombre']		= e($_POST['nombre']);
		$_POST['codigo']		= e($_POST['codigo']);
		$_POST['icono']			= e($_POST['icono']);

		$tabla					= "mdv_modulos";
		$slug 					= "Módulo ";
		$txt_mod				= "modificado";
		$txt_new				= "creado";

		if($_POST['es_dinamico'] == "si")
		{
			// Se trabajará con módulo dinámico
			$_POST['es_dinamico']	= 1;			
			$_POST['slug'] 			= e($_POST['slug']);

			$funciones 			= "";
			$funciones 			.= ($_POST['ingresar'] == "si")? "ingreso":"";
			$funciones 			.= ($_POST['editar'] == "si")? ",edicion":"";
			$funciones 			.= ($_POST['activar'] == "si")? ",activar":"";
			$funciones 			.= ($_POST['reordenar'] == "si")? ",reordenar":"";

		}else{
			$_POST['es_dinamico']	= 0;
		}

		switch($_POST["modo"])
		{

			case "nuevo":

				Insertar($tabla,
						 "nombre,codigo,icon,stat,
						  es_dinamico,slug,genero,funciones",
						 "'$_POST[nombre]','$_POST[codigo]','$_POST[icono]',1,
						  '$_POST[es_dinamico]','$_POST[slug]','$_POST[genero]','$funciones'");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">	       			
	       				<a href="<?=$_POST['ruta'];?>modulos" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;

			case "borrar":

				Eliminar("mdv_modulos","id=".$id_obj);

				break;

			case "desactivar":

				Modificar("mdv_modulos","id=".$id_obj,"stat = 0");

				break;

			case "activar":

				Modificar("mdv_modulos","id=".$id_obj,"stat = 1");

				break;

			case "reordenar":

				$i 		= 1;

				foreach($_POST['modulos'] as $id){

					if(trim($id) != ""){

						$id 	= str_replace("row_", "", $id);

						Modificar("mdv_modulos","id = ".$id,"position = ".$i);

						$i++;
					} 

				}

				break;
				
		}	
	} 
?>