<?php 
	if(isset($_GET['confirmar']))
	{
		Modificar("contacto","email = '$_GET[confirmar]'","interesado = 1");
		
		$cliente	= Datos_u("contacto","email = '$_GET[confirmar]' order by id DESC","*");
		
		ob_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Compra</title>
		<style type="text/css">
			a {
				color: #006;
			}
			a:hover {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width: 600px;border:1px solid #DDD;">
			<tr>
				<td align="center">
					<img src="<?=_static;?>/img/logo-club.jpg" style="width: 200px; margin-top: 15px;">
				</td>
			</tr>
			<tr>
				<td align="center">
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td align="center" style="text-align:left;color:#444;font-family:Arial;font-size:12px;">
					<table style="width:90%;margin-left:5%;">
						<tr>
							<td>
								Estimado(a) <strong>Administrador</strong>:
								<br><br>
								El siguiente contacto es un interesado de nivel alto en <b>Club de Campo Vitacura</b> el d&iacute;a <b><?=date("d-m-Y");?></b>. 
								La información del contacto se detalla a continuación:<br><br>								
							</td>							
						</tr>
						<tr>
							<td>
								<table cellpadding="1" style="background-color:#CCC;width:100%;margin-top:20px;margin-bottom:20px;">
									<tr>
										<td width="50%"><b>Nombre</b></td>
										<td><?=d($cliente['nombre']);?></td>
									</tr>
									<tr>
										<td width="50%"><b>E-mail</b></td>
										<td><?=d($cliente['email']);?></td>
									</tr>
									<tr>
										<td width="50%"><b>Modelo de Interés</b></td>
										<td><?=d($cliente['cotizar']);?></td>
									</tr>
									<tr>
										<td width="50%"><b>Mensaje</b></td>
										<td><?=d($cliente['mensaje']);?></td>
									</tr>									
									<tr>
										<td width="50%"><b>Fecha</b></td>
										<td><?=date("d-m-Y");?></td>
									</tr>
								</table>			
							</td>
						</tr>				
						
						<tr>
							<td>
								<br><br>
								Atentamente,<br>
								Servicio automático Web<br>
								<b>Club de Campo Vitacura</b><br><br>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
	</body>
</html>
<?php
	
	$page = ob_get_contents();
	ob_end_clean();
	
	// Para enviar un correo HTML, debe establecerse la cabecera Content-type
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	
	// Cabeceras adicionales
	$cabeceras .= 'From: Club de Campo Vitacura <contacto@clubdecampovitacura.cl>' . "\r\n";
	
	// Envío
	mail('ibecerra@ffv.cl,blizana@ffv.cl','Interesado Nivel Alto en Club de Campo Vitacura', $page, $cabeceras);
	}
?>
<div id="main-slider" class="main-slider owl-carousel dots-theme dots-bottom">
	
	<div class="item" style="height: 300px;">
		<div class="background-slider background-top gradient-slider background-full" style="background-image:url(<?=_static?>/img/_slider/slider-01.jpg);"></div>
    </div>
    
</div>


<section id="inscripcion" class="mbottom30">
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<p class="img-disclaimer">Imagen referencial, no representa la realidad del proyecto, solo ilustrativa</p>
			</div>
		</div>
		
		<div class="row mtop30">
			
			<div class="col-md-6 custom-fadeIn col-sm-offset-3 text-center">
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 contenido" style="padding-left: 40px;">
							
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12 col-md-12 no-padding">
										
										<h4>Distrito Club de Campo Vitacura</h4>
										<h5>Gracias por su interés en nuestro proyecto.<br>Nos contactaremos con usted a la brevedad.</h5>
										
									</div>
								</div>
							</div>
							
							<div class="txt-ubicacion mbottom30">
								UBICACIÓN PROYECTO<br>
								<span>Av. Las Condes 12.050, Vitacura</span><br><br>
								<a href="tel:+56991523826">+56 9 9152 3826</a><br>
								<a href="tel:+56224407234">+56 2 2440 7234</a><br>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
	
</section>

<footer>
	
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pleft40">
				
				<p class="data-ubicacion">
					Av. Isidora Goyenechea 3642, Piso 5A, Las Condes<br>
					<a href="http://ffv.cl" target="_blank">ffv.cl</a>
				</p>
				
			</div>
			
			<div class="col-lg-5 col-md-5 col-sm-4 col-xs-4 pull-right pright40 pull-right-mobile">
				<img src="<?=_static;?>/img/logo-ffv.png" alt="FFV Desarrollo Inmobiliario" class="pull-right pull-right-mobile">
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<p class="pleft40 disclaimer">
					Las imágenes, textos y planos contenidos han sido elaborados con fines ilustrativos, no constiyuyen necesariamente una representación exacta de la realidad, su único objetivo es mostrar las características generales del proyecto. Al momento de la compra verifique disponibilidad, precio, características y las especificaciones definitivas que tendrá el proyecto, estas podrían experimentar modificaciones según las disposiciones del proyecto art. 5 de la ley nº 19.472.
				</p>
			</div>
		</div>
		
		
	</div>
	
</footer>