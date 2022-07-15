<?php 
	// Borrar archivo
	require_once("mdv.php");

    $nombre_archivo         = $_POST['archivo'];

	$upload_folder          = '../uploads';

    $archivador             = $upload_folder . '/' . $nombre_archivo;
    $thumb                  = $upload_folder . '/thumbs/' . $nombre_archivo;

    Eliminar("mdv_archivos","nombre = '".$nombre_archivo."' and tipo <> 'ayuda'");

    unlink($archivador);
    unlink($thumb);
?>