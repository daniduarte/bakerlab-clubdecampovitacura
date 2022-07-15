<?php 
	// Cargar Archivos
	require_once("../../mdv.php");

	ini_set("display_errors",1);

	$archivo 	= mysql_fetch_assoc(Datos("mdv_archivos","id = ".$_POST['id'],"*"));
	$carpeta 	= mysql_fetch_assoc(Datos("mdv_folders","id = ".$archivo['carpeta'],"*"));

	if($carpeta['padre'] != 0)
	{
		$padre 		= mysql_fetch_assoc(Datos("mdv_folders","id = ".$carpeta['padre'],"*"));
	}

	if($archivo['tipo'] == "imagen")
	{
?>
		<div class="span11" style="text-align:center; margin-left:0px;min-height:200px;">
			<br />
			<img src="<?=UPL_URL.$archivo['nombre']?>" style="max-height:50%; max-width:90%;" />
			<br />			
		</div>
		<div class="span11" style="text-align:left; border-top:1px solid #CCC; margin-top:25px; margin-left:0px; padding-top:3px;">
			<b>Archivo</b><br />
			<?=$archivo['nombre']?>
			<br /><br />
			<i class="icon-folder-close"></i>&nbsp;
			<?php 
				if($archivo['carpeta'] != 0)
				{
			 		echo ($carpeta['padre'] == 0)? 'Directorio Raíz' : d($padre['nombre']);
			 		echo " / ";
				}
			?>
			<?=($archivo['carpeta'] == 0)? 'Directorio Raíz' : d($carpeta['nombre']);?>
			<br />
			<i class="icon-link"></i>&nbsp;
			<a href="<?=UPL_URL.$archivo['nombre']?>" target="_blank">Abrir archivo</a>
			
		</div>
<?php
	}
	else
	{
?>
		<div class="span11" style="text-align:center; margin-left:0px;">
			<br />
			<h1 style="font-size:50px;"><i class="icon icon-file"></i></h1>
			<h4>Archivo .<?=strtoupper($archivo['ext']);?></h4>
			<br />			
		</div>
		<div class="span11" style="text-align:left; border-top:1px solid #CCC; margin-top:25px; margin-left:0px; padding-top:3px;">
			<b>Archivo</b><br />
			<?=$archivo['nombre']?>
			<br /><br />
			<i class="icon-folder-close"></i>&nbsp;
			<?php 
				if($archivo['carpeta'] != 0)
				{
			 		echo ($carpeta['padre'] == 0)? 'Directorio Raíz' : d($padre['nombre']);
			 		echo " / ";
				}
			?>
			<?=($archivo['carpeta'] == 0)? 'Directorio Raíz' : d($carpeta['nombre']);?>
			<br />
			<i class="icon-link"></i>&nbsp;
			<a href="<?=UPL_URL.$archivo['nombre']?>" target="_blank">Abrir archivo</a>
			
		</div>
<?php
	}

?>