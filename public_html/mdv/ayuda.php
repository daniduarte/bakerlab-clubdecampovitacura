<?php 
	// Cargar Archivos
	require_once("mdv.php");

	$item 				= $_POST['item'];
	$menu 				= $_POST['menu'];

	// TIPOS
	// 0 -> TODOS

	$menu 		= "";

	$temas 		= Datos("mdv_help_temas","estado = 0 order by orden ASC","*");

?>

	<style type="text/css">
		.tema
		{
			width:100%; float:left; padding-top:10px; padding-bottom:10px;font-size:13px; cursor:pointer;
		}

		.tema:hover
		{
			background-color: #f1f1f1;
		}

		.tema_activo
		{
			background-color: #f1f1f1;
		}

		.item_help
		{
			width: 100%;
			float: left;
		}

		.item_help b
		{
			font-size: 18px;
		}

		.item_help b:hover
		{
			color:#08c;
			cursor: pointer;
		}

		.item-icono
		{
			width: 8%;
			margin-right: 2%;
			font-size: 30px;
			line-height: 35px;
			float: left;
			text-align: center;
		}
	</style>

<?php 
	if(isset($_POST['item']))
	{
?>

	<div style="width:25%; float:left; margin-top:15px;margin-bottom:18px;">
		<?php 
			while ($t = mysql_fetch_assoc($temas)) 
			{
		?>
				<div class="tema" id="tema_<?=$t['id'];?>" onclick="despliega_items(<?=$t['id'];?>)">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<i class="icon-cogs"></i>&nbsp;&nbsp;&nbsp;
					<?=d($t['nombre']);?>
				</div>
		<?php
			}
		?>
	</div>

	<div id="texto_ayuda" style="width:70%;float:left; margin-left:15px;margin-bottom:18px; overflow-y:auto;">
		<h3>MDV Admin</h3>

		<div style="width:100%; text-align:center; float:left">
			<br /><b>¡Enhorabuena!</b>
			<br />
			Te damos la más cordial bienvenida a MDV Admin
		</div>

		<img src="<?=UPL_URL?>ayuda/logo.png" width="70%" style="margin-left:auto;margin-right:auto;display:block" />
		<span style="font-size:11px;">
			Para conocer más acerca del funcionamiento de ésta plataforma, selecciona uno de los temas de la izquierda.
		</span>		
	</div>

<?php 
	}else if(isset($_POST['menu'])){

		$menu 		= $_POST['menu'];

		// Desplegamos temas del menú
		$items 		= Datos("mdv_help_items","id_tema = ".$menu,"*");

		// Nombre del tema
		$tema 		= Datos_u("mdv_help_temas","id = ".$menu,"*");
?>
	
		<h3><?=d($tema['nombre']);?></h3>

		<div style="width:100%; float:left; margin-top:10px;">

<?php 
		while($i = mysql_fetch_assoc($items))
		{
?>
			<div class="item_help">
				<div class="item-icono">
					<i class="icon-book"></i>
				</div>
				<b onclick="despliega_ayuda(<?=$i['id'];?>)"><?=d($i['nombre'])?></b>
				<br />
				<?=d($i['epigrafe']);?>
			</div>			
<?php
		}
?>
		</div>
<?php 
	}else if(isset($_POST['item_ayuda'])){

		$item 		= $_POST['item_ayuda'];

		// Nombre del item
		$item 		= Datos_u("mdv_help_items","id = ".$item,"*");
		$tema 		= Datos_u("mdv_help_temas","id = ".$item['id_tema'],"*");
?>
	
		<h3>
			<?=d($tema['nombre']);?>
			<span style="font-size:18px;">
				&nbsp;&nbsp;<i class="icon-chevron-right" style="font-size:15px;"></i>&nbsp;
				<?=d($item['nombre']);?>
			</span>
		</h3>
		

		<div style="width:97%; float:left; margin-top:10px; text-align:justify;">
			<?=d($item['contenido']);?>
		</div>
<?php
	}
?>