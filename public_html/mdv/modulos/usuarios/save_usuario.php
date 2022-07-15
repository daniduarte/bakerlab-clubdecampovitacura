<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['nombre']		= e($_POST['nombre']);
		$_POST['nick']			= e($_POST['nick']);
		$_POST['password']		= e($_POST['password']);
		$_POST['email']			= e($_POST['email']);

		$tabla					= "mdv_usuarios";
		$slug 					= "Usuario ";
		$txt_mod				= "modificado";
		$txt_new				= "creado";

		switch($_POST["modo"])
		{
			case "nuevo":

				if($_POST['permisos'] == "Administrador")
				{
					$accesos	= "inicio,sincronizacion,proyectos,correspondencia,parametros,usuarios";
				}
				
				if($_POST['permisos'] == "Asistente")
				{
					$accesos	= "inicio,correspondencia";
				}

				$pass 		= md5($_POST['password']);
				
				// Validación de permisos
				if($_POST['profile'] == 'secretario' || $_POST['profile'] == 'vigilante_3')
				{
					$_POST['nivel']	= 3;
				}
				
				if($_POST['profile'] == 'vigilante_1' || $_POST['profile'] == 'vigilante_2')
				{
					$_POST['nivel']	= 2;
				}

				Insertar($tabla,
						 "nombre,email,usuario,password,permisos,accesos,perfil,nivel",
						 "'$_POST[nombre]','$_POST[email]','$_POST[nick]','$pass','0','$accesos','$_POST[profile]','$_POST[nivel]'");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">	       			
	       				<a href="<?=$_POST['ruta'];?>" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;

			case "edit":				

				$pass 		= md5($_POST['password']);

				if($_POST['password'] != "")
				{

					Modificar($tabla,
							 "id = ".$id_obj,
							 "nombre = '$_POST[nombre]',
							  usuario = '$_POST[nick]',
							  email = '$_POST[email]',
							  password = '$pass'");
				}else{

					Modificar($tabla,
							 "id = ".$id_obj,
							 "nombre = '$_POST[nombre]',
							  usuario = '$_POST[nick]',
							  email = '$_POST[email]'");
				}

				$id 	= $id_obj;

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_mod;?>!</h4>
              			<?=$slug.$txt_mod;?> con éxito 
              		</div>

                    <div class="form-actions">	       			
	       				<a href="<?=$_POST['ruta'];?>" class="btn btn-danger">Volver</a>
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