<section id="blackdiv"></section>

<section id="presentacion-edificio">
	<div class="container">
		<div class="row">
			
			<div class="col-sm-8 col-sm-offset-2">
				<img src="<?=_static . '/img/edificio-peumo-02.jpg'?>" />
				<br>
				<h1>EDIFICIO PEUMO</h1>
				<p>
					4 DORMITORIOS + ESCRITORIO + ESTAR<br>
					197 M<sup>2</sup> ÚTILES + TERRAZAS
				</p>
			</div>
			
		</div>
	</div>
</section>

<section class="barra-gris">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 barra"></div>
		</div>
	</div>
</section>

<section id="plantas">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-12">
				<h2>PLANTAS</h2>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col-sm-6">
				<a href="#mplantas" data-toggle="modal" onclick="cargar_planta('peumo-01'); evnt('Ver Depto Edificio Peumo 01,04','Cotizar');">
					<div class="planta">
						
						<img src="<?=_static . '/img/_deptos/peumo-01.jpg'?>" />
						
						<h4 class="cali">Edificio Peumo</h4>
						<p>
							4 DORMITORIOS + ESCRITORIO + ESTAR<br>
							197 M<sup>2</sup> ÚTILES + TERRAZAS
						</p>
						
					</div>
				</a>
			</div>
			
			<div class="col-sm-6">
				<a href="#mplantas" data-toggle="modal" onclick="cargar_planta('peumo-02'); evnt('Ver Depto Edificio Peumo 02,03','Cotizar');">
					<div class="planta">
						
						<img src="<?=_static . '/img/_deptos/peumo-02.jpg'?>" />
						
						<h4 class="cali">Edificio Peumo</h4>
						<p>
							4 DORMITORIOS + ESCRITORIO + ESTAR<br>
							199 M<sup>2</sup> ÚTILES + TERRAZAS
						</p>
						
					</div>
				</a>
			</div>
			
		</div>
		
	</div>
</section>

<section id="galeria">
	
	<h2 class="text-center">GALERÍA | VÍDEO</h2>
	
	<div id="galeria-slider" class="main-slider owl-carousel dots-theme dots-bottom">
	
		<div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-01-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-02-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-03-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-04-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-06-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-07-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/peumo-08-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/edificio-01-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div class="background-slider gradient-slider background-full background-full-h" style="background-image:url(<?=_static?>/img/_galeria/edificio-03-r.jpg);"></div>
	    </div>
	    
	    <div class="item">
			<div id="videoslide" class="background-slider gradient-slider background-full">
				<video width="320" height="240" controls poster="<?=_static . '/img/_slider/slide-01.jpg'?>">
					<source src="<?=_static . '/media/low.mp4'?>" type="video/mp4">
				</video>
			</div>
	    </div>
	    
	</div>
	
</section>

<section id="contacto">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				
				<h3>CONTACTO</h3>
				
				<form id="form-contacto" data-status="standby">
					<div id="firstrow" class="form-group">
						<input type="text" class="form-control" placeholder="Nombre *" name="nombre" data-valid="1" data-message="Ingrese su nombre">
  					</div>
  					<div class="form-group">
						<input type="text" class="form-control" placeholder="RUT *" name="rut" data-valid="1;4" data-message="Ingrese su RUT;Ingrese un RUT válido">
  					</div>
  					<div class="form-group">
						<input type="text" class="form-control" placeholder="E-mail *" name="email" data-valid="1;2" data-message="Ingrese su e-mail;Ingrese un e-mail válido">
  					</div>
  					<div class="form-group">
						<input type="text" class="form-control" placeholder="Teléfono *" name="telefono" data-valid="1;3" data-message="Ingrese su teléfono;Ingrese un teléfono válido">
  					</div>
  					<div class="form-group">
	  					<select class="form-control" name="cotizar">
		  					<option value="0">Departamento de Interés *</option>		  					
		  					<option>Departamento 43m<sup>2</sup> Útiles + Terrazas</option>
		  					<option>Departamento 69m<sup>2</sup> Útiles + Terrazas</option>
		  					<option>Departamento 87m<sup>2</sup> Útiles + Terrazas</option>
		  					<option>Departamento 197m<sup>2</sup> Útiles + Terrazas</option>
	  					</select>
  					</div>
  					<div class="form-group">
						<textarea class="form-control" placeholder="Mensaje *" name="mensaje" data-valid="1" data-message="Ingrese un Mensaje"></textarea>
  					</div>
  					<button type="button" class="btn btn-default btn-brown pull-right" name="accion">ENVIAR</button>
				</form>
				
			</div>
		</div>
		
	</div>
</section>