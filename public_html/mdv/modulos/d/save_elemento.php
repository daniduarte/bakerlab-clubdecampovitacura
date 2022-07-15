<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Obtener información del módulo
    	$d_modulo   = Datos_u("mdv_modulos","codigo = '".$_POST['accion']."'","*");

		$tabla					= "mdv_dynamic_values";
		$slug 					= d($d_modulo['slug'])." ";

		// Validamos el género 0=Femenino / 1=Masculino
		if($d_modulo['genero'] == 1)
		{
			$txt_mod				= "modificado";
			$txt_new				= "creado";

			$art_this				= "este ";
			$art_new				= "nuevo ";
		}else{
			$txt_mod				= "modificada";
			$txt_new				= "creada";

			$art_this				= "esta ";
			$art_new				= "nueva ";
		}

		$txt_obj 				= strtolower($slug);

		$ruta_new				= $_POST['accion']."/new";
		$ruta_mod				= $_POST['accion']."/edit";
		$ruta_volver			= $_POST['accion'];

		// Armar cadena de texto
		$cadena 				= "";

		// Recorrer campos dinámicos del módulo
		$campos 				= Datos("mdv_dynamic_fields",
                                        "mdv_modulo = ".$d_modulo['id']." order by orden ASC","*");

		while($c = mysql_fetch_assoc($campos))
		{
			$sl 		= $c['slug'];
			$cadena 	.= $sl.";mdvequal;".e($_POST[$sl]).";mdvsep;";
		}

		switch($_POST["modo"])
		{

			case "nuevo":

				Insertar($tabla,
						 "modulo,valor,orden,estado","'$_POST[accion]','$cadena','0','0'");

				$id 	= mysql_insert_id();

			?>
				<form class="form-horizontal">

					<br />
					<div class="alert alert-success alert-block">
              			<h4 class="alert-heading">¡<?=$slug.$txt_new;?>!</h4>
              			<?=$slug.$txt_new;?> con éxito 
              		</div>

                    <div class="form-actions">
                    	
                    	<?php 
		                    if(strpos($d_modulo['funciones'], "ingreso") !== false)
		                    {
		                ?>
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_new;?>" class="btn btn-success">
	       					+ Crear <?=$art_new.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<?php 
	       					}
	       				?>

	       				<?php 
		                    if(strpos($d_modulo['funciones'], "edicion") !== false)
		                    {
		                ?>
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_mod;?>/<?=$id;?>" class="btn btn-info">
	       					Editar <?=$art_this.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<?php 
	       					}
	       				?>
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
						  "valor = '$cadena'");

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
		                    if(strpos($d_modulo['funciones'], "ingreso") !== false)
		                    {
		                ?>
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_new;?>" class="btn btn-success">
	       					+ Crear <?=$art_new.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<?php 
	       					}
	       				?>

	       				<?php 
		                    if(strpos($d_modulo['funciones'], "edicion") !== false)
		                    {
		                ?>
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_mod;?>/<?=$id;?>" class="btn btn-info">
	       					Editar <?=$art_this.$txt_obj;?>
	       				</a>
	       				&nbsp;&nbsp;
	       				<?php 
	       					}
	       				?>
	       				<a href="<?=$_POST['ruta'];?><?=$ruta_volver;?>" class="btn btn-danger">
	       					Volver
	       				</a>
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

			case "destacar":

				Modificar($tabla,"id=".$id_obj,"destacado = 1");

				break;

			case "no_destacar":

				Modificar($tabla,"id=".$id_obj,"destacado = 0");

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