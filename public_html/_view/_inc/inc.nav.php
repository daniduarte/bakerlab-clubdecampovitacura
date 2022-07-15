<nav class="navbar navbar-fixed-top navbar-little" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-principal">
				<span class="sr-only">Navegación</span>
				<span class="icon-bar bar1"></span>
				<span class="icon-bar bar2"></span>
				<span class="icon-bar bar3"></span>
			</button>
			<a class="navbar-brand" href="<?= _web; ?>">
				<img src="<?= _static; ?>/img/logo.png" alt="Club de Campo Vitacura">
			</a>
		</div>
		<div class="rrss social-links">
			<!--<a href="#"><div><i class="fa fa-instagram fa-lg"></i></div></a>
			<a href="#"><div><i class="fa fa-facebook fa-lg"></i></div></a>-->
			&nbsp;
		</div>
		<div class="collapse navbar-collapse" id="menu-principal">
			<ul class="nav navbar-nav">

				
				<li>
					<a href="<?= _web; ?>">Proyecto</a>
				</li>
				<li <?= $modulo == 'proyectos-en-venta' ? 'class="active dropdown hidden-xs"' : 'class="dropdown hidden-xs"'; ?>>
					<a href="#">Edificios</a>
					<ul class="dropdown-menu">
						<li><a href="<?= _web . '/edificio-peumo/' ?>">Edificio Peumo</a></li>
						<li><a href="<?= _web . '/edificio-quillay/' ?>">Edificio Quillay</a></li>
					</ul>
				</li>
				<li class="visible-xs">
					<a href="<?= _web . '/edificio-peumo/' ?>">EDIFICIO PEUMO</a>
				</li>
				<li class="visible-xs">
					<a href="<?= _web . '/edificio-quillay/' ?>">EDIFICIO QUILLAY</a>
				</li>
				<li>
					<a href="<?= _web; ?>#ubicacion" <?= ($action == '' ? 'onclick="scrollToAnchor(' . "'#mapa-ubicacion'" . ');return false;"' : '') ?>>Ubicación</a>
				</li>
				<li class="dropdown hidden-xs">
					<a href="#">Galería</a>
					<ul class="dropdown-menu">
						<li><a href="<?= _web . '#multimedia' ?>" <?= ($modulo == 'inicio' ? 'onclick="scrollToAnchor(' . "'#multimedia'" . ');return false;"' : '') ?>>Galería del Proyecto</a></li>
						<li><a href="<?= _web . '/edificio-peumo/#multimedia' ?>" <?=($modulo == 'edificio-peumo' ? 'onclick="scrollToAnchor(' . "'#multimedia'" . ');return false;"' : '');?>>Galería Edificio Peumo</a></li>
						<li><a href="<?= _web . '/edificio-quillay/#multimedia' ?>" <?=($modulo == 'edificio-quillay' ? 'onclick="scrollToAnchor(' . "'#multimedia'" . ');return false;"' : '');?>>Galería Edificio Quillay</a></li>
					</ul>
				</li>
				<li>
					<a data-fancybox data-width="640" data-height="360" href="https://www.youtube.com/watch?v=AwdCu_UcqRQ"><i class="fa fa-play" style="margin-right: 8px;"></i>Video Proyecto</a>
				</li>
				<li class="dropdown hidden-xs">
					<a href="#">Tour 360</a>
					<ul class="dropdown-menu">
						<li><a href="https://mybakerlab.com/vistaclubdecampo.html" data-fancybox data-type="iframe" 
							onclick="evnt('Vista aerea 360','Button');">VISTA AÉREA 360º</a></li>
						<li><a href="https://my.matterport.com/show/?m=PieaQFSm5Ds" data-fancybox data-type="iframe"
							onclick="evnt('Tour 360 Quillay 1D1B','Button');">PILOTO VIRTUAL 1D + 1B</a></li>
						<li><a href="https://my.matterport.com/show/?m=XCxPLQY37HZ" data-fancybox data-type="iframe"
							onclick="evnt('Tour 360 Quillay 2D2B','Button');">PILOTO VIRTUAL 2D + 2B</a></li>
						<li><a href="https://my.matterport.com/show/?m=LqDkAccUJpM" data-fancybox data-type="iframe"
							onclick="evnt('Tour 360 Peumo 4D5B','Button');">PILOTO VIRTUAL 4D + 4B</a></li>
						<li><a href="https://my.matterport.com/show/?m=8NaFJihE8uQ" data-fancybox data-type="iframe"
							onclick="evnt('Tour 360 Peumo 4D4B','Button');">PILOTO VIRTUAL 4D + 4B</a></li>
						<li><a href="https://my.matterport.com/show/?m=Rcqf2uq5FPG&play=1 " data-fancybox data-type="iframe"
							onclick="evnt('Áreas comunes edificio Quillay','Button');">ÁREAS COMUNES EDIFICIO QUILLAY</a></li>
					</ul>
				</li>
				<li class="visible-xs">
					<a href="https://mybakerlab.com/vistaclubdecampo.html" data-fancybox data-type="iframe">VISTA AÉREA 360º</a>
				</li>
				<li class="visible-xs">
					<a href="https://my.matterport.com/show/?m=PieaQFSm5Ds" data-fancybox data-type="iframe" onclick="evnt('Tour 360 Quillay 1D1B','Button');">PILOTO VIRTUAL 1D + 1B</a>
				</li>
				<li class="visible-xs">
					<a href="https://my.matterport.com/show/?m=XCxPLQY37HZ" data-fancybox data-type="iframe" onclick="evnt('Tour 360 Quillay 2D2B','Button');">PILOTO VIRTUAL 2D + 2B</a>
				</li>
				<li class="visible-xs">
					<a href="https://my.matterport.com/show/?m=LqDkAccUJpM" data-fancybox data-type="iframe" onclick="evnt('Tour 360 Peumo 4D5B','Button');">PILOTO VIRTUAL 4D + 5B</a>
				</li>
				<li class="visible-xs">
					<a href="https://my.matterport.com/show/?m=8NaFJihE8uQ" data-fancybox data-type="iframe" onclick="evnt('Tour 360 Peumo 4D5B','Button');">PILOTO VIRTUAL 4D + 5B</a>
				</li>
				<li class="visible-xs">
					<a href="https://my.matterport.com/show/?m=Rcqf2uq5FPG&play=1" data-fancybox data-type="iframe" onclick="evnt('Áreas comunes edificio Quillay','Button');">ÁREAS COMUNES EDIFICIO QUILLAY</a>
				</li>
				<li>
					<a href="https://clubdecampovitacura.cl/#multimedia" onclick="$('#link-videos').click();">Videos</a>
				</li>
				<li>
					<a href="#" onclick="scrollToAnchor('#contacto');return false;">Contacto</a>
				</li>

				<!--<li>
					<a data-fancybox data-width="640" id="recorrido3602" data-height="360" href="<?=_static . '/media/low.mp4'?>">RECORRIDO 360°</a>
				</li>-->
				
			</ul>
		</div>
	</div>
</nav>

<div id="laterales">
	<a href="https://wa.me/56991523826" class="animated fadeInUp" style="background-color: #00bb2d;"><i class="fa fa-whatsapp"></i></a>
	<a href="javascript:void(0);" class="animated fadeInUp" onclick="scrollToAnchor('#contacto');" style="background-color: #294988;"><i class="fa fa-envelope"></i></a>
	<a href="tel:+56991523826" class="animated fadeInUp"><i class="fa fa-phone"></i></a>
</div>