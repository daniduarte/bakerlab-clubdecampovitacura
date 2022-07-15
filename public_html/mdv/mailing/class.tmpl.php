<?php 

class emailTemplate
{
	public $rmte;
		
	function __construct()
	{
		$this->rmte 		= 'noresponder@grupoespana.cl';
	}

	/**
	 * E-mail para notificar ingreso de documentos
	 */
	public function notificar_documento($acuerdo_id,$emisor,$docname,$fecha_pago)
	{
		# Definición de variables e inicio de objeto del mail.
			
			$asunto_email	= '[PDE] Documento agregado';
			
			$em 			= new sender();
			
		# Inicio del proceso de envío de mail.

			$usr_em 		= Datos_u("mdv_usuarios","usuario = '$emisor'","nombre");
			$acuerdo        = Datos_u("uny_acuerdos","id = $acuerdo_id","*");
		    $cliente        = Datos_u("uny_clientes","rut = '$acuerdo[cliente]'","*");

		    // Información de Proyecto
		    $etapa          = Datos_u("uny_etapas","id = '".$acuerdo['etapa']."' and id_conjunto = '$acuerdo[conjunto]' and
		                                            id_empresa = '$acuerdo[empresa]' and id_consorcio = '$acuerdo[consorcio]'","*");
		    $conjunto       = Datos_u("uny_conjuntos",
		                              "id = '$etapa[id_conjunto]' and id_empresa = '$etapa[id_empresa]' and 
		                               id_consorcio = '$etapa[id_consorcio]'","nombre");

		# Destinatarios

			$destinos 		= Datos("mdv_usuarios","estado = 0 and perfil = 'Administrador'","nombre,email");

			while($de = mysql_fetch_assoc($destinos))
			{
				// Lectura del archivo de template.
				$email_ex = $em->readTemplateFile(BASEURL."mailing/templates/notificar_documento.html");

				// Remplazo de variables en template por variables definidas.
				$email_ex = str_replace("#_emisor_#", d($usr_em['nombre']), $email_ex);
				$email_ex = str_replace("#nombre_usuario#", d($de['nombre']), $email_ex);
				$email_ex = str_replace("#_proyecto_#", str_replace("PROYECTO ","",d($conjunto['nombre'])), $email_ex);

				$bienp 		= Datos_u("uny_ac_bienes","acuerdo = '$acuerdo_id' and tipo = 'P'","codigo_bien");
				$bienes_s	= Datos("uny_ac_bienes","acuerdo = '$acuerdo_id' and tipo = 'S' order by codigo_bien ASC",
									"codigo_bien,tipo_bien");			

				$txtbiens	= '';

				while($bs = mysql_fetch_assoc($bienes_s))
				{
					$txtbiens	.= substr($bs['codigo_bien'],5).' ('.$bs['tipo_bien'].')<br>';
				}

				if($bienp['codigo_bien'] == '')
				{
					$bienp['codigo_bien']	= "Sin Bien Principal asociado";
				}
				else
				{
					$bienp['codigo_bien']	= substr($bienp['codigo_bien'],5);
					$asunto 				= "[".$bienp['codigo_bien']."]";
				}
				
				$asunto_email	= $asunto.' ['.$cliente['razon_social'].'] ['.str_replace("PROYECTO ","",d($conjunto['nombre'])).'] Documento Agregado';

				if($txtbiens == '')
				{
					$txtbiens	= 'Sin bienes secundarios asociados';
				}

				// Info detallada
				$info 		= '	<tr>
									<td bgcolor="#DDD" style="padding:5px">PROYECTO</td>
									<td bgcolor="#DDD" style="padding:5px">'.d($conjunto['nombre']).'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">CLIENTE</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['rut'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">RAZÓN SOCIAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['razon_social'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIEN PRINCIPAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$bienp['codigo_bien'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIENES SECUNDARIOS</td>
									<td bgcolor="#DDD" style="padding:5px">'.$txtbiens.'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">DOCUMENTO AÑADIDO</td>
									<td bgcolor="#DDD" style="padding:5px">'.$docname.'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">FECHA DE PAGO</td>
									<td bgcolor="#DDD" style="padding:5px">'.$fecha_pago.'</td>
								</tr>';

				$email_ex = str_replace("#_detalle_validacion_#", $info, $email_ex);
				
				// Envío de correo vía SMTP.
				if($status_in = $em->sendEmail("Gestor de Entrega", $this->rmte, $de['email'], $asunto_email, $email_ex))
				{
					//echo "ok";
				}
				else
				{
					//echo "nope";
				}
				
			}
	}

	/**
	 * E-mail para solicitar preparación de bienes
	 */
	public function validacion_finalizada($acuerdo_id,$emisor)
	{
		//require_once(BASEURL."mailing/class.send.php");

		# Definición de variables e inicio de objeto del mail.
			
			//$asunto_email	= '[PDE] Inicio de Proceso de Preparacion';
			
			$em 			= new sender();
			
		# Inicio del proceso de envío de mail.

			$usr_em 		= Datos_u("mdv_usuarios","usuario = '$emisor'","nombre");
			$acuerdo        = Datos_u("uny_acuerdos","id = $acuerdo_id","*");
		    $cliente        = Datos_u("uny_clientes","rut = '$acuerdo[cliente]'","*");

		    // Información de Proyecto
		    $etapa          = Datos_u("uny_etapas","id = '".$acuerdo['etapa']."' and id_conjunto = '$acuerdo[conjunto]' and
		                                            id_empresa = '$acuerdo[empresa]' and id_consorcio = '$acuerdo[consorcio]'","*");
		    $conjunto       = Datos_u("uny_conjuntos",
		                              "id = '$etapa[id_conjunto]' and id_empresa = '$etapa[id_empresa]' and 
		                               id_consorcio = '$etapa[id_consorcio]'","nombre");

		# Destinatarios

			$destinos 		= Datos("mdv_usuarios","estado = 0 and (perfil = 'Entregador' or perfil = 'Administrador' or perfil = 'Asistente')","nombre,email");

			while($de = mysql_fetch_assoc($destinos))
			{
				// Lectura del archivo de template.
				$email_ex = $em->readTemplateFile(BASEURL."mailing/templates/validacion_finalizada.html");

				// Remplazo de variables en template por variables definidas.
				$email_ex = str_replace("#_emisor_#", d($usr_em['nombre']), $email_ex);
				$email_ex = str_replace("#nombre_usuario#", d($de['nombre']), $email_ex);
				$email_ex = str_replace("#_proyecto_#", str_replace("PROYECTO ","",d($conjunto['nombre'])), $email_ex);

				$bienp 		= Datos_u("uny_ac_bienes","acuerdo = '$acuerdo_id' and tipo = 'P'","codigo_bien");
				$bienes_s	= Datos("uny_ac_bienes","acuerdo = '$acuerdo_id' and tipo = 'S' order by codigo_bien ASC",
									"codigo_bien,tipo_bien");			

				$txtbiens	= '';

				while($bs = mysql_fetch_assoc($bienes_s))
				{
					$txtbiens	.= substr($bs['codigo_bien'],5).' ('.$bs['tipo_bien'].')<br>';
				}

				if($bienp['codigo_bien'] == '')
				{
					$bienp['codigo_bien']	= "Sin Bien Principal asociado";					
				}
				else
				{
					$bienp['codigo_bien']	= substr($bienp['codigo_bien'],5);
					$asunto 				= "[".$bienp['codigo_bien']."]";
				}
				
				$asunto_email	= $asunto.' ['.$cliente['razon_social'].'] ['.str_replace("PROYECTO ","",d($conjunto['nombre'])).'] Inicio de Proceso de Preparacion';

				if($txtbiens == '')
				{
					$txtbiens	= 'Sin bienes secundarios asociados';
				}

				// Info detallada
				$info 		= '	<tr>
									<td bgcolor="#DDD" style="padding:5px">PROYECTO</td>
									<td bgcolor="#DDD" style="padding:5px">'.d($conjunto['nombre']).'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">CLIENTE</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['rut'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">RAZÓN SOCIAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['razon_social'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIEN PRINCIPAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$bienp['codigo_bien'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIENES SECUNDARIOS</td>
									<td bgcolor="#DDD" style="padding:5px">'.$txtbiens.'</td>
								</tr>';

				$email_ex = str_replace("#_detalle_validacion_#", $info, $email_ex);
				
				// Envío de correo vía SMTP.
				if($status_in = $em->sendEmail("Gestor de Entrega", $this->rmte, $de['email'], $asunto_email, $email_ex))
				{
					echo "ok";
				}
				else
				{
					echo "nope";
				}
				
			}
	}
	
	// listo_entrega
	public function listo_entrega($acuerdo_id,$emisor)
	{
		//require_once(BASEURL."mailing/class.send.php");

		# Definición de variables e inicio de objeto del mail.
			
			$asunto_email	= '[PDE] Bienes Listos para Entrega';
			
			$em 			= new sender();
			
		# Inicio del proceso de envío de mail.

			$usr_em 		= Datos_u("mdv_usuarios","usuario = '$emisor'","nombre");
			$acuerdo        = Datos_u("uny_acuerdos","id = $acuerdo_id","*");
		    $cliente        = Datos_u("uny_clientes","rut = '$acuerdo[cliente]'","*");

		    // Información de Proyecto
		    $etapa          = Datos_u("uny_etapas","id = '".$acuerdo['etapa']."' and id_conjunto = '$acuerdo[conjunto]' and
		                                            id_empresa = '$acuerdo[empresa]' and id_consorcio = '$acuerdo[consorcio]'","*");
		    $conjunto       = Datos_u("uny_conjuntos",
		                              "id = '$etapa[id_conjunto]' and id_empresa = '$etapa[id_empresa]' and 
		                               id_consorcio = '$etapa[id_consorcio]'","nombre");

		# Destinatarios

			$destinos 		= Datos("mdv_usuarios","estado = 0 and (perfil = 'Entregador' or perfil = 'Administrador')","nombre,email");

			while($de = mysql_fetch_assoc($destinos))
			{
				// Lectura del archivo de template.
				$email_ex = $em->readTemplateFile(BASEURL."mailing/templates/listo_entrega.html");

				// Remplazo de variables en template por variables definidas.
				$email_ex = str_replace("#_emisor_#", d($usr_em['nombre']), $email_ex);
				$email_ex = str_replace("#nombre_usuario#", d($de['nombre']), $email_ex);
				$email_ex = str_replace("#_proyecto_#", str_replace("PROYECTO ","",d($conjunto['nombre'])), $email_ex);

				$bienp 		= Datos_u("uny_ac_bienes","acuerdo = '$acuerdo_id' and 
													   (tipo_bien like 'DEPT/%' or tipo_bien like 'OFI/%' or 
													    tipo_bien like 'PLB/%')","codigo_bien");
				$bienes_s	= Datos("uny_ac_bienes","acuerdo = '$acuerdo_id' and 
													(tipo_bien not like 'DEPT/%' and tipo_bien not like 'OFI/%' and 
													 tipo_bien not like 'PLB/%') order by codigo_bien ASC",
									"codigo_bien,tipo_bien");			

				$txtbiens	= '';

				while($bs = mysql_fetch_assoc($bienes_s))
				{
					$txtbiens	.= substr($bs['codigo_bien'],5).' ('.$bs['tipo_bien'].')<br>';
				}
				
				if($bienp['codigo_bien'] == '')
				{
					$bienp['codigo_bien']	= "Sin Bien Principal asociado";					
				}
				else
				{
					$bienp['codigo_bien']	= substr($bienp['codigo_bien'],5);
					$asunto 				= "[".$bienp['codigo_bien']."]";
				}
				
				$asunto_email	= $asunto.' ['.$cliente['razon_social'].'] ['.str_replace("PROYECTO ","",d($conjunto['nombre'])).'] Bienes Listos para Entrega';
				

				if($txtbiens == '')
				{
					$txtbiens	= 'Sin bienes secundarios asociados';
				}

				// Info detallada
				$info 		= '	<tr>
									<td bgcolor="#DDD" style="padding:5px">PROYECTO</td>
									<td bgcolor="#DDD" style="padding:5px">'.d($conjunto['nombre']).'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">CLIENTE</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['rut'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">RAZÓN SOCIAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['razon_social'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIEN PRINCIPAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$bienp['codigo_bien'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIENES SECUNDARIOS</td>
									<td bgcolor="#DDD" style="padding:5px">'.$txtbiens.'</td>
								</tr>';

				$email_ex = str_replace("#_detalle_validacion_#", $info, $email_ex);
				
				// Envío de correo vía SMTP.
				if($status_in = $em->sendEmail("Gestor de Entrega", $this->rmte, $de['email'], $asunto_email, $email_ex))
				{
					echo "ok";
				}
				else
				{
					echo "nope";
				}
				
			}
	}


	public function notificar_callcenter($id_cal,$emisor)
	{

		$calendario	= Datos_u("calendario","id = ".$id_cal,"*");
		$acuerdo_id = $calendario['id_ac'];

		//require_once(ABSURL."mailing/class.send.php");

		# Definición de variables e inicio de objeto del mail.
			
			$asunto_email	= '[PDE] Solicitud de Notificación';
			
			$em 			= new sender();
			
		# Inicio del proceso de envío de mail.

			$usr_em 		= Datos_u("mdv_usuarios","usuario = '$emisor'","nombre");
			$acuerdo        = Datos_u("uny_acuerdos","id = $acuerdo_id","*");
		    $cliente        = Datos_u("uny_clientes","rut = '$acuerdo[cliente]'","*");

		    // Información de Proyecto
		    $etapa          = Datos_u("uny_etapas","id = '".$acuerdo['etapa']."' and id_conjunto = '$acuerdo[conjunto]' and
		                                            id_empresa = '$acuerdo[empresa]' and id_consorcio = '$acuerdo[consorcio]'","*");
		    $conjunto       = Datos_u("uny_conjuntos",
		                              "id = '$etapa[id_conjunto]' and id_empresa = '$etapa[id_empresa]' and 
		                               id_consorcio = '$etapa[id_consorcio]'","nombre");

		# Destinatarios

			$destinos 		= Datos("mdv_usuarios","estado = 0 and (perfil = 'CallCenter' or perfil = 'Asistente')","nombre,email");

			while($de = mysql_fetch_assoc($destinos))
			{
				// Lectura del archivo de template.
				$email_ex = $em->readTemplateFile(BASEURL."mailing/templates/solicitud_notificacion_cliente.html");

				// Remplazo de variables en template por variables definidas.
				$email_ex = str_replace("#_emisor_#", d($usr_em['nombre']), $email_ex);
				$email_ex = str_replace("#nombre_usuario#", d($de['nombre']), $email_ex);
				$email_ex = str_replace("#_proyecto_#", str_replace("PROYECTO ","",d($conjunto['nombre'])), $email_ex);

				$bienp 		= Datos_u("uny_ac_bienes","acuerdo = '$acuerdo_id' and tipo = 'P'","codigo_bien");
				$bienes_s	= Datos("uny_ac_bienes","acuerdo = '$acuerdo_id' and tipo = 'S' order by codigo_bien ASC",
									"codigo_bien,tipo_bien");			

				$txtbiens	= '';

				while($bs = mysql_fetch_assoc($bienes_s))
				{
					$txtbiens	.= substr($bs['codigo_bien'],5).' ('.$bs['tipo_bien'].')<br>';
				}
				
				if($bienp['codigo_bien'] == '')
				{
					$bienp['codigo_bien']	= "Sin Bien Principal asociado";					
				}
				else
				{
					$bienp['codigo_bien']	= substr($bienp['codigo_bien'],5);
					$asunto 				= "[".$bienp['codigo_bien']."]";
				}
				
				$asunto_email	= $asunto.' ['.$cliente['razon_social'].'] ['.str_replace("PROYECTO ","",d($conjunto['nombre'])).'] Soliticud de Notificacion';

				if($txtbiens == '')
				{
					$txtbiens	= 'Sin bienes secundarios asociados';
				}

				// Info detallada
				$info 		= '	<tr>
									<td bgcolor="#DDD" style="padding:5px">PROYECTO</td>
									<td bgcolor="#DDD" style="padding:5px">'.d($conjunto['nombre']).'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">CLIENTE</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['rut'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">RAZÓN SOCIAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$cliente['razon_social'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIEN PRINCIPAL</td>
									<td bgcolor="#DDD" style="padding:5px">'.$bienp['codigo_bien'].'</td>
								</tr>
								<tr>
									<td bgcolor="#DDD" style="padding:5px">BIENES SECUNDARIOS</td>
									<td bgcolor="#DDD" style="padding:5px">'.$txtbiens.'</td>
								</tr>';

				$email_ex = str_replace("#_detalle_validacion_#", $info, $email_ex);
				
				// Envío de correo vía SMTP.
				if($em->sendEmail("Gestor de Entrega", $this->rmte, $de['email'], $asunto_email, $email_ex))
				{
					//echo "nn";
				}
				else
				{
					//echo "nope";
				}

				$mail_yo	= $de['email'];
				
			}
	}
	
	/* NOTIFICACIÓN A CLIENTES */
	public function notificacion_cliente($calendario,$email_cliente)
	{
		# Definición de variables e inicio de objeto del mail.
			
			$asunto_email	= 'Entrega de Propiedad | Grupo España';
			
			$em 			= new sender();
			
		# Inicio del proceso de envío de mail.
		
			$calendario 	= Datos_u("calendario","id = '$calendario'","*");
			$encargado 		= Datos_u("mdv_usuarios","usuario = '$calendario[encargado]'","nombre");
			
			$acuerdo 		= Datos_u("uny_acuerdos","id = '$calendario[id_ac]'","*");
			$conjunto 		= Datos_u("uny_conjuntos",
									  "id = '$acuerdo[conjunto]' and id_empresa = '$acuerdo[empresa]' and 
									   id_consorcio = '$acuerdo[consorcio]'","publico");

			/*$usr_em 		= Datos_u("mdv_usuarios","usuario = '$emisor'","nombre");
			$acuerdo        = Datos_u("uny_acuerdos","id = $acuerdo_id","*");
		    $cliente        = Datos_u("uny_clientes","rut = '$acuerdo[cliente]'","*");

		    // Información de Proyecto
		    $etapa          = Datos_u("uny_etapas","id = '".$acuerdo['etapa']."' and id_conjunto = '$acuerdo[conjunto]' and
		                                            id_empresa = '$acuerdo[empresa]' and id_consorcio = '$acuerdo[consorcio]'","*");
		    $conjunto       = Datos_u("uny_conjuntos",
		                              "id = '$etapa[id_conjunto]' and id_empresa = '$etapa[id_empresa]' and 
		                               id_consorcio = '$etapa[id_consorcio]'","nombre");*/

		# Destinatarios

			// Lectura del archivo de template.
			$email_ex = $em->readTemplateFile(BASEURL."mailing/templates/notificar_entrega.html");
			
			$fechatxt 		= format_fecha_web(date('d-m-Y',strtotime($calendario['fecha'])),"spa");

			// Remplazo de variables en template por variables definidas.
			$email_ex = str_replace("#_fecha_txt_#", $fechatxt, $email_ex);
			$email_ex = str_replace("#_desde_#", $calendario['desde'], $email_ex);
			$email_ex = str_replace("#_hasta_#", $calendario['hasta'], $email_ex);
			$email_ex = str_replace("#_encargado_#", d($encargado['nombre']), $email_ex);

			$bienp 		= Datos_u("uny_ac_bienes","acuerdo = '$calendario[id_ac]' and tipo = 'P'","codigo_bien");
			$bienes_s	= Datos("uny_ac_bienes","acuerdo = '$calendario[id_ac]' and tipo = 'S' order by codigo_bien ASC",
								"codigo_bien,tipo_bien");

			$detalle_b	= '';
			$bodegas	= '';
			$estacs		= '';
			$otros 		= '';
			
			$detalle_b 				.= "PROYECTO: ".$conjunto['publico']."<br>";

			if($bienp['codigo_bien'] != '')
			{
				$detalle_b 				.= "DEPTO/CASA/OFICINA: ".substr($bienp['codigo_bien'],5)."<br>";
			}
			
			while($bs = mysql_fetch_assoc($bienes_s))
			{
				if(strpos($bs['tipo_bien'],'BODE') !== false)
				{
					$bodegas 	.= substr($bs['codigo_bien'],5)." ";
				}
				else if(strpos($bs['tipo_bien'],'EST') !== false)
				{
					$estacs 	.= substr($bs['codigo_bien'],5)." ";
				}
				else
				{
					$otros  	.= substr($bs['codigo_bien'],5)." ";
				}
			}
			
			if($bodegas != '')
			{
				$detalle_b 				.= "BODEGA(S): ".$bodegas."<br>";
			}
			
			if($estacs != '')
			{
				$detalle_b 				.= "ESTACIONAMIENTO(S): ".$estacs."<br>";
			}
			
			if($otros != '')
			{
				$detalle_b 				.= "OTRO(S): ".$otros."<br>";
			}

			$email_ex = str_replace("#_bienes_#", $detalle_b, $email_ex);
			
			// Envío de correo vía SMTP.
			if($status_in = $em->sendEmail("Grupo España", $this->rmte, $email_cliente, $asunto_email, $email_ex))
			{
				//echo "ok";
			}
			else
			{
				//echo "nope";
			}
	}
	
	/* notificación encuesta */
	public function envio_encuesta($acuerdo_id)
	{
		# Definición de variables e inicio de objeto del mail.
			
			$asunto_email	= 'Porque tu opinion nos importa | Gespania';
			
			$em 			= new sender();
			
		# Inicio del proceso de envío de mail.
		
			$acuerdo 		= Datos_u("uny_acuerdos","id = '$acuerdo_id'","*");
			$cliente 		= Datos_u("uny_clientes","rut = '$acuerdo[cliente]'","razon_social,email");
			$conjunto 		= Datos_u("uny_conjuntos",
									  "id = '$acuerdo[conjunto]' and id_empresa = '$acuerdo[empresa]' and 
									   id_consorcio = '$acuerdo[consorcio]'","publico");
			
			$enlace 		= 'pr='.$acuerdo_id.'&cl='.$cliente['email'];			   
			
			Modificar("uny_acuerdos","id = '$acuerdo_id'","encuesta_en = 1");
			

		# Destinatarios

			// Lectura del archivo de template.
			$email_ex = $em->readTemplateFile(BASEURL."mailing/templates/notificar_encuesta.html");

			// Remplazo de variables en template por variables definidas.
			$email_ex = str_replace("#nombre_cliente#", $cliente['razon_social'], $email_ex);
			$email_ex = str_replace("#nombre_proyecto#", $conjunto['publico'], $email_ex);
			$email_ex = str_replace("#enlace_encuesta#", "http://www.grupoespana.cl/encuesta.php?".$enlace, $email_ex);
			
			// Envío de correo vía SMTP.
			if($status_in = $em->sendEmail("Grupo España", $this->rmte, $cliente['email'], $asunto_email, $email_ex))
			{
				//echo "ok";
			}
			else
			{
				//echo "nope";
			}
	}

}

?>