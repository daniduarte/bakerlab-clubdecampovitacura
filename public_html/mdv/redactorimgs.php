<?php 	
	// Cargar Archivos
	require_once("mdv.php");
?>
[
	<?php
		if(isset($_GET['t']) && $_GET['t'] == "ayuda")
		{
			// Abrir directorio de Archivos
			$archivos 		= Datos("mdv_archivos","tipo = 'ayuda' order by fecha_ingreso DESC","*");

			$dir 			= str_replace("/mdv", "", UPLOAD_RUTE)."/uploads/ayuda";
			$base 			= str_replace("/mdv", "", BASEURL)."uploads/ayuda/";
			$thumb 			= str_replace("/mdv", "", BASEURL)."uploads/ayuda/";
		}else{
			// Abrir directorio de Archivos
			$archivos 		= Datos("mdv_archivos","tipo = 'imagen' order by fecha_ingreso DESC","*");

			$dir 			= str_replace("/mdv", "", UPLOAD_RUTE)."/uploads/thumbs";
			$base 			= str_replace("/mdv", "", BASEURL)."uploads/";
			$thumb 			= str_replace("/mdv", "", BASEURL)."uploads/thumbs/";
		}

		$conter 		= 0;

		while($a = mysql_fetch_assoc($archivos))
		{

			$archivo 	= $a['nombre'];

			if(is_file("$dir/$archivo"))
			{

				if($conter != 0)
				{
					echo ",";
				}
				$conter 	+= 1;

	?>
			{"thumb": "<?=$thumb.$archivo;?>", "image": "<?=$base.$archivo;?>", "title": "", "folder": "Uploads" }

	<?php	
			}
		}
	?>

]