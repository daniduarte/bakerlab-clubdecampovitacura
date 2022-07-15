<span class="label label-important"></span></a>
<ul>
	<li <?=(strpos($action,"unidad") !== false)? 'class="active"':'';?>>
		<a href="<?=BASEURL.$m['codigo'];?>/unidades">Unidades</a>
	</li>
	<li <?=(strpos($action,"tipologia") !== false)? 'class="active"':'';?>>
		<a href="<?=BASEURL.$m['codigo'];?>/tipologias">Tipologías</a>
	</li>
</ul>