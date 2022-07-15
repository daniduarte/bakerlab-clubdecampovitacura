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
			case "edit":

				$pass 		= md5($_POST['password']);

				if($_POST['password'] != "")
				{

					Modificar($tabla,
							 "usuario = '".$id_obj."'",
							 "nombre = '$_POST[nombre]',
							  email = '$_POST[email]',
							  password = '$pass'");
				}else{

					Modificar($tabla,
							 "usuario = '".$id_obj."'",
							 "nombre = '$_POST[nombre]',
							  email = '$_POST[email]'");
				}

				$id 	= $id_obj;

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">Datos guardados exitosamente</h4>
              			Sus datos han sido modificados exitosamente.
              		</div>

                    <div class="form-actions">	       			
	       				<a href="<?=BASEURL;?>" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;
				
		}	
	} 
?>