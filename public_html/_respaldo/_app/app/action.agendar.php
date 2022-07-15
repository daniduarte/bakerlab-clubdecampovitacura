<?php 
	define("_viewFile", md5("H.O.L.L.A.N.D."));
	
	require_once('../conf/conf.php');
	require_once('../conf/data.php');
	
	// Recuperar información de contacto
	$item		= Datos_u("contacto","email = '$_POST[email]' order by id DESC","*");
	
	$visita		= date("Y-m-d",strtotime($_POST['fecha']));
	
	Insertar("agendar",
			 "rut,nombre,email,telefono,cotizar,mensaje,visita,fecha",
			 "'$_POST[rut]','$item[nombre]','$_POST[email]','$item[telefono]','$item[cotizar]','$_POST[mensaje]','$visita','" . date("Y-m-d H:i:s") . "'");
			 
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
								Se ha agendado una visita desde <b>Club de Campo Vitacura</b> el d&iacute;a <b><?=date("d-m-Y");?></b>. 
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
										<td><?=$item['nombre'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Teléfono</b></td>
										<td><?=$item['telefono'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Comentarios</b></td>
										<td><?=$_POST['mensaje'];?></td>
									</tr>
									<tr>
										<td width="50%"><b>Fecha de Visita</b></td>
										<td><?=$_POST['fecha'];?></td>
									</tr>									
									<tr>
										<td width="50%"><b>Fecha de envío</b></td>
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
	mail('blizana@ffv.cl,ibecerra@ffv.cl,jarriagada@ffv.cl,loreto@m-w.cl','Visita Agendada | Club de Campo Vitacura', $page, $cabeceras);
?>

<div class="col-sm-12 text-center" style="padding: 60px 0;padding-bottom: 75px;">
	<h3 style="color: #FFF;">Hemos recibido su solicitud</h3>
	<p style="color: #FFF;">Un ejecutivo se contactará con usted a la brevedad.</p>
</div>