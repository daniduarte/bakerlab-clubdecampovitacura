<?php 
	define("_viewFile", md5("H.O.L.L.A.N.D."));
	
	require_once('../conf/conf.php');
	require_once('../conf/data.php');
	
	$planta		= $_POST['planta'];
	
	$edificio	= '';
	$numeracion	= '';
	$dorm 		= '';
	$banos		= '';
	$util		= '';
	$terraza	= '';
	$totales	= '';
	$orientacion= '';
	
	switch($planta)
	{
		case 'peumo-01':
		
			$edificio	= 'Peumo';
			$numeracion	= 'DEPARTAMENTO 01, 04';
			$dorm 		= '4 Dormitorios';
			$banos		= '4 Baños';
			$util		= '202,21';
			$terraza	= '52,75';
			$totales	= '254,96';
			$orientacion= 'Nororiente<br>Norponiente';
			//$archivo 	= 'ficha_edificio_peumo_depto.01-04.pdf';
			$archivo 	= 'peumo-01-04.png';
		
		break;
		
		case 'peumo-02':
		
			$edificio	= 'Peumo';
			$numeracion	= 'DEPARTAMENTO 02, 03';
			$dorm 		= '4 Dormitorios';
			$banos		= '4 Baños';
			$util		= '196,9';
			$terraza	= '62,7';
			$totales	= '259,6';
			$orientacion= 'Norte';
			//$archivo 	= 'ficha_edificio_peumo_depto.02-03.pdf';
			$archivo 	= 'peumo-02-03.png';
		
		break;
		
		case 'quillay-01':
		
			$edificio	= 'Quillay';
			$numeracion	= 'DEPARTAMENTO 01, 09';
			$dorm 		= '1 Dormitorio';
			$banos		= '1 Baño';
			$util		= '43,5';
			$terraza	= '13,4';
			$totales	= '56,9';
			$orientacion= 'Cordillera';
			$archivo 	= 'ficha_edificio_quillay_depto.01-09.pdf';
		
		break;
		
		case 'quillay-02':
		
			$edificio	= 'Quillay';
			$numeracion	= 'DEPARTAMENTO 02, 07';
			$dorm 		= '2 Dormitorios';
			$banos		= '2 Baños';
			$util		= '87,4';
			$terraza	= '32,3';
			$totales	= '119,7';
			$orientacion= 'Nororiente<br>Surponiente';
			$archivo 	= 'ficha_edificio_quillay_depto.02-07.pdf';
		
		break;
		
		case 'quillay-03':
		
			$edificio	= 'Quillay';
			$numeracion	= 'DEPARTAMENTO 03, 08';
			$dorm 		= '2 Dormitorios';
			$banos		= '2 Baños';
			$util		= '87,4';
			$terraza	= '32,3';
			$totales	= '119,7';
			$orientacion= 'Norponiente<br>Suroriente';
			$archivo 	= 'ficha_edificio_quillay_depto.03-08.pdf';
		
		break;
		
		case 'quillay-04':
		
			$edificio	= 'Quillay';
			$numeracion	= 'DEPARTAMENTO 04, 06';
			$dorm 		= '1 Dormitorio';
			$banos		= '1 Baño';
			$util		= '44,2';
			$terraza	= '13,6';
			$totales	= '57,8';
			$orientacion= 'Parque';
			$archivo 	= 'ficha_edificio_quillay_depto.04-06.pdf';
		
		break;

        case 'quillay-05':
		
			$edificio	= 'Quillay';
			$numeracion	= 'DEPARTAMENTO 05';
			$dorm 		= '2 Dormitorio';
			$banos		= '2 Baño';
			$util		= '69,5';
			$terraza	= '21,3';
			$totales	= '90,8';
			$orientacion= 'Cordillera';
			$archivo 	= '';
		
		break;
	}
	
?>

<div class="row">
							  		
	<div class="col-sm-9 bg-white">
		
		<div class="container-fluid">
  		<div class="row">
	  		<div class="col-sm-12">
		  		<img src="<?=_static . '/img/logo-color.png'?>" class="logo-cdc-color" />
		  		<img src="<?=_static . '/img/_deptos/' . $planta . '.jpg'?>" class="planta-big" />
	  		</div>
  		</div>
  		
  		<div class="row">
	  		<div class="col-sm-2">
		  		<img src="<?=_static . '/img/logo-ffv-color.png'?>" class="ffv-color" />
	  		</div>
	  		<div class="col-sm-5">
		  		<a href="#" class="btn btn-black" onclick="evnt('Cotizar Planta Edificio <?=$edificio;?>','Button'); cargar_cotizador();">COTIZAR</a>
		  		<a href="<?=_web . '/fichas/' . $archivo;?>" target="_blank" class="btn btn-black"><i class="fa fa-file-pdf-o"></i> &nbsp;&nbsp;PDF</a>
	  		</div>
  		</div>
		</div>
		
	</div>
	
	<div class="col-sm-3">
		<div class="visor-lateral">
  		<h3 class="cali">Edificio <?=$edificio;?></h3>
  		<div class="barra-tipo"><?=$numeracion;?></div>
  		
  		<div id="planta-desc">
	  		<div class="desc-row">
		  		<i class="fa fa-bed"></i> <label class="dashed"><?=$dorm;?></label>
	  		</div>
	  		<div class="desc-row mbottom30i">
		  		<i class="fa fa-bath"></i> <?=$banos;?>
	  		</div>
	  		<div class="desc-row mbottom30i">
		  		<i class="fa fa-expand" style="float: left;"></i>&nbsp;
		  		<div class="sup-desc">
			  		<label class="dashed"><?=$util;?> m<sup>2</sup> útiles</label>
			  		<label class="dashed"><?=$terraza;?> m<sup>2</sup> terraza (uso y goce)</label>
			  		<label><strong><?=$totales;?> m<sup>2</sup> Totales</strong></label>
		  		</div>
	  		</div>
	  		<div class="desc-row" style="margin-top: 85px;">
		  		<i class="fa fa-bandcamp" style="float: left;"></i>&nbsp;
		  		<div class="sup-desc">
			  		<label>Orientación<br><?=$orientacion;?></label>
		  		</div>
	  		</div>
	  		
	  		<img src="<?=_static . '/img/_deptos/esquicio-' . $planta . '.jpg'?>" class="esquicio" />
	  		
  		</div>
  		
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col-sm-12 text-center">
		
		<p class="disclaimer-modal">
  		Las imágenes, textos y planos contenidos han sido elaborados con fines ilustrativos, no constituyen necesariamente una representación exacta de la realidad, su único objetivo es mostrar las características generales del proyecto. Al momento de la compra verifique disponibilidad, precio, características y las especificaciones definitivas que tendrá el proyecto, estas podrían experimentar modificaciones según las disposiciones del proyecto art. 5 de la ley nº 19.472.
		</p>
		
	</div>
</div>