<section id="blackdiv"></section>

<section id="contacto" style="background-image: none; background-color: #000;">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				
				<h3>AGENDAR VISITA</h3>
				
				<form id="form-agendar" data-status="standby">
					<input type="hidden" name="email" value="<?=$_GET['confirmar']?>" />
					<div id="firstrow" class="form-group">
						<input type="text" class="form-control" id="date" placeholder="Fecha *" name="fecha" data-valid="1" data-message="Ingrese una Fecha" autocomplete="off">
  					</div>
  					<div id="firstrow" class="form-group">
						<input type="text" class="form-control" placeholder="Nombre *" name="nombre" data-valid="1" data-message="Ingrese su nombre">
  					</div>
  					<div class="form-group">
						<input type="text" class="form-control" placeholder="Teléfono *" name="telefono" data-valid="1;3" data-message="Ingrese su teléfono;Ingrese un teléfono válido">
  					</div>
  					<div class="form-group">
						<input type="text" class="form-control" placeholder="RUT *" name="rut" data-valid="1;4" data-message="Ingrese su RUT;Ingrese un RUT válido">
  					</div>
  					<div class="form-group">
						<textarea class="form-control" placeholder="Comentarios" name="mensaje"></textarea>
  					</div>
  					<button type="button" class="btn btn-default btn-brown pull-right" name="accion">ENVIAR</button>
				</form>
				
			</div>
		</div>
		
	</div>
</section>