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
			<ul class="nav navbar-nav navbar-right">

				
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
				<li>
					<a href="<?= _web . '/edificio-peumo/' ?>" class="visible-xs">EDIFICIO PEUMO</a>
				</li>
				<li>
					<a href="<?= _web . '/edificio-quillay/' ?>" class="visible-xs">EDIFICIO QUILLAY</a>
				</li>
				<li>
					<a href="<?= _web; ?>#ubicacion" <?= ($action == '' ? 'onclick="scrollToAnchor(' . "'#ubicacion'" . ');return false;"' : '') ?>>Ubicación</a>
				</li>
				<li>
					<a href="<?= _web; ?>#masterplan" <?= ($action == '' ? 'onclick="scrollToAnchor(' . "'#masterplan'" . ');return false;"' : '') ?>>Masterplan</a>
				</li>
				<li>
					<a href="#" onclick="scrollToAnchor('#contacto');return false;">Contacto</a>
				</li>

				<li>
					<a data-fancybox data-width="640" id="recorrido3602" data-height="360" href="<?=_static . '/media/low.mp4'?>">RECORRIDO 360°</a>
				</li>
				
			</ul>
		</div>
	</div>
</nav>