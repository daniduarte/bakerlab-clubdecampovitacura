<?php 
	define("_viewFile", md5("H.O.L.L.A.N.D."));
	
	require_once('../conf/conf.php');
	require_once('../conf/data.php');
	
	// Inserción de mensaje de contacto
	Insertar("contacto",
			 "rut,nombre,email,telefono,cotizar,mensaje,fecha",
			 "'$_POST[rut]','$_POST[nombre]','$_POST[email]','$_POST[telefono]','$_POST[cotizar]','$_POST[mensaje]','" . date("Y-m-d H:i:s") . "'");
			 
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
					<img src="<?=_static;?>/img/logo-color.png" style="width: 200px; margin-top: 15px;">
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
								Se han comunicado desde el formulario de contacto en <b>Club de Campo Vitacura</b> el d&iacute;a <b><?=date("d-m-Y");?></b>. 
								El mensaje ha quedado registrado bajo los siguientes datos:<br><br>								
							</td>							
						</tr>
						<tr>
							<td>
								<table cellpadding="1" style="background-color:#CCC;width:100%;margin-top:20px;margin-bottom:20px;">
									<tr>
										<td width="50%"><b>RUT</b></td>
										<td><?=$_POST['rut'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Nombre</b></td>
										<td><?=$_POST['nombre'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>E-mail</b></td>
										<td><?=$_POST['email'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Teléfono</b></td>
										<td><?=$_POST['telefono'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Cotizar</b></td>
										<td><?=$_POST['cotizar'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Mensaje</b></td>
										<td><?=$_POST['mensaje'];?></td>
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
	mail('blizana@ffv.cl,ibecerra@ffv.cl,jarriagada@ffv.cl,loreto@m-w.cl','Club de Campo Vitacura | Mensaje de Contacto', $page, $cabeceras);
		
	/* E-MAIL PARA EL INTERESADO */
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
					<img src="http://clubdecampovitacura.cl/_static/img/banner-mail.jpg" style="max-width: 600px;">
				</td>
			</tr>
			<tr>
				<td align="center">
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td align="center" style="text-align:left;color:#444;font-family:Arial;font-size:12px;">
					<table style="width:80%;margin-left:10%;">
						<tr>
							<td style="line-height: 20px;font-size: 13px;">
								Estimado/a
								<br><br>
								Junto con saludar, tenemos el agrado de presentar <strong>Club de Campo</strong>, primera etapa, un exclusivo proyecto de dos edificios emplazado en un
								conectado barrio de Vitacura.<br><br>
								<strong>Edificio Peumo</strong> de 258m<sup>2</sup> totales.<br>
								Departamentos con living, comedor, escritorio y dormitorio principal, todos mirando al norte. Más 2 dormitorios, salita, dormitorio de servicio, cocina y lavandería.
								<br><br>
								<strong>Edificio Quillay</strong> de 56m<sup>2</sup>, 90m<sup>2</sup> y 119m<sup>2</sup> totales.<br>
								Departamentos de 1 y 2 dormitorios con dormitorio en suite, terraza, living comedor y cocina integrada,<br><br>
								
								Lo esperamos en nuestra sala de informaciones ubicada en <strong>Las Condes 12.050, Vitacura.</strong>. Lunes a Domingo de 10:00 a 19:00 hrs
							</td>							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center">
					<a href="http://www.clubdecampovitacura.cl/agendar-visita/?confirmar=<?=$_POST['email'];?>"><img src="http://clubdecampovitacura.cl/_static/img/boton-agendar-visita.jpg" style="max-width: 600px;margin-top: 15px; margin-bottom: 15px;"></a>
				</td>
			</tr>
			<tr>
				<td align="center">
					<img src="http://clubdecampovitacura.cl/_static/img/footer-mail.jpg" style="max-width: 600px;margin-bottom: -5px;">
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
	mail($_POST['email'],'Agende su visita en Club de Campo, Vitacura', $page, $cabeceras);	
?>

<div class="col-sm-12 text-center" style="padding: 60px 0;padding-bottom: 75px;">
	<h3 style="color: #FFF;">Su mensaje ha sido recibido</h3>
	<p style="color: #FFF;">Nos contactaremos con usted a la brevedad.</p>
</div>