<?php

	require_once("../../mdv.php");

	if (isset($_POST['modo'])){

		$id_obj 				= $_POST["id"];

		// Recibir datos
		$_POST['nombre']			= e($_POST['nombre']);

		$tabla					= "contacto";
		$slug 					= "Tienda ";
		$txt_mod				= "modificada";
		$txt_new				= "creada";

		$art_this				= "esta ";
		$art_new				= "nueva ";
		$txt_obj 				= "tienda";

		$ruta_new				= "new_tienda";
		$ruta_mod				= "edit_tienda";
		$ruta_volver			= "";

		switch($_POST["modo"])
		{			
			case "borrar":

				Eliminar($tabla,"id = ".$id_obj);

				break;
		}
	}
?>
