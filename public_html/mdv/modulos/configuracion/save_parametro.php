<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['grupo']			= e($_POST['grupo']);
		$_POST['codigo']		= e($_POST['codigo']);
		$_POST['nombre']		= e($_POST['nombre']);
		$_POST['descripcion']	= e($_POST['descripcion']);
		$_POST['valor']			= e($_POST['valor']);

		$tabla					= "mdv_configuracion";
		$slug 					= "Parámetro ";
		$txt_mod				= "modificado";
		$txt_new				= "creado";

		switch($_POST["modo"])
		{
			case "nuevo":

				Insertar($tabla,
						 "codigo,valor,descripcion,nombre,grupo,estado",
						 "'$_POST[codigo]','$_POST[valor]','$_POST[descripcion]','$_POST[nombre]','$_POST[grupo]','1'");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">
	       				<a href="<?=$_POST['ruta'];?>new_parametro" class="btn btn-success">+ Crear nuevo parámetro</a>
	       				&nbsp;&nbsp;
	       				<a href="<?=$_POST['ruta'];?>edit_parametro/<?=$id;?>" class="btn btn-info">Editar este parámetro</a>
	       				&nbsp;&nbsp;	       			
	       				<a href="<?=$_POST['ruta'];?>parametros" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;

			case "edit":

				Modificar($tabla,
						 "id = ".$id_obj,
						 "codigo = '$_POST[codigo]',
						  valor = '$_POST[valor]',
						  descripcion = '$_POST[descripcion]',
						  nombre = '$_POST[nombre]',
						  grupo = '$_POST[grupo]'");

				$id 	= $id_obj;

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_mod;?>!</h4>
              			<?=$slug.$txt_mod;?> con éxito 
              		</div>

                    <div class="form-actions">
                    	<?php
                    		if(is_god())
                    		{
                    	?>
	       				<a href="<?=$_POST['ruta'];?>new_parametro" class="btn btn-success">+ Crear nuevo parámetro</a>
	       				&nbsp;&nbsp;
	       				<?php 
	       					}
	       				?>
	       				<a href="<?=$_POST['ruta'];?>edit_parametro/<?=$id;?>" class="btn btn-info">Editar este parámetro</a>
	       				&nbsp;&nbsp;	       			
	       				<a href="<?=$_POST['ruta'];?>parametros" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;

			case "borrar":

				Eliminar($tabla,"id=".$id_obj);

				break;
				
		}	
	} 
?>