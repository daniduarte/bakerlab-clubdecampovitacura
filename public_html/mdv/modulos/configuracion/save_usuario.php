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

				// Leer módulos para crear accesos
				$modulos	= Datos("mdv_modulos","1","*");

				$accesos	= "";

				while($m = mysql_fetch_assoc($modulos))
				{
					$codigo	= $m['codigo'];

					if($_POST[$codigo] == 1)
					{
						$accesos	.= $codigo.',';
					}
				}

				$pass 		= md5($_POST['password']);

				Insertar($tabla,
						 "nombre,email,usuario,password,permisos,accesos",
						 "'$_POST[nombre]','$_POST[email]','$_POST[nick]','$pass','0','$accesos'");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">	       			
	       				<a href="<?=$_POST['ruta'];?>usuarios" class="btn btn-danger">Volver</a>
	            	</div>

                </form>

			<?php

				break;

			case "edit":

				// Leer módulos para crear accesos
				$modulos	= Datos("mdv_modulos","1","*");

				$accesos	= "";

				while($m = mysql_fetch_assoc($modulos))
				{
					$codigo	= $m['codigo'];

					if($_POST[$codigo] == 1)
					{
						$accesos	.= $codigo.',';
					}
				}

				$pass 		= md5($_POST['password']);

				if($_POST['password'] != "")
				{

					Modificar($tabla,
							 "id = ".$id_obj,
							 "nombre = '$_POST[nombre]',
							  usuario = '$_POST[nick]',
							  email = '$_POST[email]',
							  accesos = '$accesos',
							  password = '$pass'");
				}else{

					Modificar($tabla,
							 "id = ".$id_obj,
							 "nombre = '$_POST[nombre]',
							  usuario = '$_POST[nick]',
							  email = '$_POST[email]',
							  accesos = '$accesos'");
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
	       				<a href="<?=$_POST['ruta'];?>usuarios" class="btn btn-danger">Volver</a>
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