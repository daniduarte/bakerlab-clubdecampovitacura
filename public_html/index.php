<?php
	if($_GET['phone'] != '')
	{
		header("location:tel:" . $_GET['phone']);
	}
	# Global versión
	define('_webVersion','1.9');
	
	# View security hash
    define("_viewFile", md5("H.O.L.L.A.N.D."));

	# Website files
    require("./_app/conf/conf.php");
    require("./_app/conf/bootstrap.php");
    require("./_app/conf/data.php");    

    if(!_debug) ob_start('comprimir_pagina');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es-CL" xml:lang="es-CL"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <?php # Forces the browser to render as that particular version's standards. ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,IE=10,IE=EmulateIE10,IE=9,IE=EmulateIE9,IE=8,IE=EmulateIE8,IE=7,IE=EmulateIE7">
        
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="x-dns-prefetch-control" content="off">
        
        <meta http-equiv="expires" content="Mon, 5 Mar 2018 12:00:00 GMT">
        <meta name="last-modified" content="Mon, 6 Mar 2017 12:00:00 GMT"> 

        <link rel="dns-prefetch" href="//multidev.cl">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        <link rel="dns-prefetch" href="//oss.maxcdn.com">
        
        <?php // Title / Description & Keyword page ?>
        <title><?=_tituloWeb;?></title>
        <meta name="description" content="<?=_descWeb?>">
        <meta name="keywords" content="<?=_keyWords?>">
        <meta name="author" content="Multidev - multidev.cl">

        <?php // Favicon ?>
        <link rel="apple-touch-icon" sizes="180x180" href="<?=_static;?>/img/favicon.png">
        <link rel="icon" type="image/png" href="<?=_static;?>/img/favicon.png" sizes="32x32">
        <link rel="mask-icon" href="<?=_static;?>/img/favicon.png">

        <?php // Mobile Tags ?>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <meta name="format-detection" content="telephone=yes">
        <meta name="apple-mobile-web-app-capable" content="no" />
        <meta name="apple-mobile-web-app-title" content="<?=_tituloWeb?>">

        <?php // Robots config ?>
        <meta name="robots" content="index, follow, noydir, noodp">
        <meta name="googlebot" content="noarchive">        

        <?php // Application config tags  ?>
        <meta name="application-name" content="<?=_tituloWeb?>">
        <meta name="application-url" content="http://<?=_serverName?>">
	    <meta name="theme-color" content="#ffffff">

        <link rel="canonical" href="http://<?=_canonicalURL?>">
        <meta name="google" content="notranslate" />

        <link rel="shortlink" href="http://<?=_serverName?>">

        <?php // Twitter SMO config  ?>
        <meta name="twitter:site" content="@">
        <meta name="twitter:creator" content="@">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:url" content="http://<?=_canonicalURL?>">
        <meta name="twitter:title" content="<?=_tituloWeb?>">
        <meta name="twitter:description" content="<?=_postCardDesc;?>">
        <meta name="twitter:image" content="<?=_postCardPic;?>">

        <meta itemprop="description" content="<?=_descWeb;?>">
        <meta itemprop="image" content="<?=_postCardPic;?>">

        <?php // Facebook SMO config  ?>
        <meta property="og:title" content="<?=_tituloWeb?>"> 
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://<?=_canonicalURL?>">
        <meta property="og:domain" content="https://<?=_serverName?>">
        <meta property="og:image" content="<?=_postCardPic;?>">
        <meta property="og:site_name" content="<?=_tituloWeb?>"> 
        <meta property="og:description" content="<?=_postCardDesc;?>">
        <meta property="og:image:width" content="600" />
		<meta property="og:image:height" content="315" />

        <?php // HTML5 Compatible IE < 9  ?>
        <!--[if lt IE 9]>
            <script src="<?=_static?>/js/plugins/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <?php // HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries ?>
        <!--[if lt IE 9]>
          <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>		
		
        <?php // CSS for site construct  ?>
        <link rel="stylesheet" href="<?=_static?>/css/main.css?v=<?=_webVersion;?>">
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127633809-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-127633809-1');
		</script>
		
		<!-- Facebook Pixel Code -->
		<script>
		  !function(f,b,e,v,n,t,s)
		  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		  n.queue=[];t=b.createElement(e);t.async=!0;
		  t.src=v;s=b.getElementsByTagName(e)[0];
		  s.parentNode.insertBefore(t,s)}(window, document,'script',
		  'https://connect.facebook.net/en_US/fbevents.js');
		  fbq('init', '147991646164420');
		  fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		  src="https://www.facebook.com/tr?id=147991646164420&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code —>
    
    </head>

    <body <?=$main_class;?>>

        <!--[if lt IE 9]>
            <div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
        <![endif]-->	  

        <?php 
            // Librería del módulo
            if(file_exists ("_app/lib/lib.".$modulo.".php"))
            {
                require_once("_app/lib/lib.".$modulo.".php");
            }
        ?>
        
        <?php # Nav Menu ?>
        <?php 
	        require_once("_view/_inc/inc.nav.php");
        ?>    
        
        <div class="wrapper">    
        
        <?php
            
            if($action != '')
            {
	            if(file_exists ("_view/".$modulo."/".$action.".php"))
	            {
	                require_once("_view/".$modulo."/".$action.".php");
	            }else{
	                // ERROR
	                require_once("_view/err/404.php");
	            }
            }
            else
            {
	         	if(file_exists ("_view/".$modulo.".php"))
	            {
	                require_once("_view/".$modulo.".php");
	            }else{
	                // ERROR
	                require_once("_view/err/404.php");
	            }   
            }
            
        ?>
        
        <?php
	        require_once("_view/_inc/inc.footer.php");
        ?>
    
        </div>    
        
        <div id="mplantas" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
		
		    	<!-- Modal content-->
				<div class="modal-content">
			  		<div class="modal-body">
				  		
				  		<div id="visor-planta">
					  		
					  		<a href="#" data-dismiss="modal" class="cerrar-modal">
						  		<i class="fa fa-times"></i>
					  		</a>
					  		
					  		<div id="planokm" class="container-fluid">
						  		
						  		<div class="row">
							  		
							  		<div class="col-sm-9 bg-white">
								  		
								  		<div class="container-fluid">
									  		<div class="row">
										  		<div class="col-sm-12">
											  		<img src="<?=_static . '/img/logo-color.png'?>" class="logo-cdc-color" />
											  		<img src="<?=_static . '/img/_deptos/peumo-01.jpg'?>" class="planta-big" />
										  		</div>
									  		</div>
									  		
									  		<div class="row">
										  		<div class="col-sm-2">
											  		<img src="<?=_static . '/img/logo-ffv-color.png'?>" class="ffv-color" />
										  		</div>
										  		<div class="col-sm-5">
											  		<a href="#" class="btn btn-black" onclick="cargar_cotizador();">COTIZAR</a>
										  		</div>
									  		</div>
								  		</div>
								  		
							  		</div>
							  		
							  		<div class="col-sm-3">
								  		<div class="visor-lateral">
									  		<h3 class="cali">Edificio Peumo</h3>
									  		<div class="barra-tipo">DEPARTAMENTO 01, 04</div>
									  		
									  		<div id="planta-desc">
										  		<div class="desc-row">
											  		<i class="fa fa-bed"></i> <label class="dashed">4 Dormitorios</label>
										  		</div>
										  		<div class="desc-row mbottom30i">
											  		<i class="fa fa-bath"></i> 4 Baños
										  		</div>
										  		<div class="desc-row mbottom30i">
											  		<i class="fa fa-expand" style="float: left;"></i>&nbsp;
											  		<div class="sup-desc">
												  		<label class="dashed">197,2 m<sup>2</sup> útiles</label>
												  		<label class="dashed">60,8 m<sup>2</sup> terraza (uso y goce)</label>
												  		<label><strong>258 m<sup>2</sup> Totales</strong></label>
											  		</div>
										  		</div>
										  		<div class="desc-row" style="margin-top: 85px;">
											  		<i class="fa fa-bandcamp" style="float: left;"></i>&nbsp;
											  		<div class="sup-desc">
												  		<label>Orientación<br>Nororiente<br>Norponiente</label>
											  		</div>
										  		</div>
										  		
										  		<img src="<?=_static . '/img/_deptos/esquicio.jpg'?>" class="esquicio" />
										  		
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
						  		
					  		</div>
					  		
				  		</div>				  		
				  		
		      		</div>
		    	</div>
		
		  	</div>
		</div>
		
		<!--<div id="popup-pilotos">
			<img src="<?=_static . '/img/_campanas/pop-01.jpg'?>" />
			
			<a href="#" onclick="$.fancybox.close(); scrollToAnchor('#contacto'); evnt('Agendar Visita Peumo','Button'); return false;">
				<img src="<?=_static . '/img/_campanas/pop-02.jpg'?>" style="width: 50%;" />
			</a>
			
			<a href="#" onclick="$.fancybox.close(); scrollToAnchor('#contacto'); evnt('Agendar Visita Quillay','Button'); return false;">
				<img src="<?=_static . '/img/_campanas/pop-03.jpg'?>" style="width: 50%;" />
			</a>
			
			<a href="tel:+56991523826">
				<img src="<?=_static . '/img/_campanas/pop-04.jpg'?>" />
			</a>
		</div>-->
		<div id="popup-pilotos">
			
			<a href="https://wa.me/56991523826">				
				<img src="<?=_static . '/img/_campanas/pop-agenda.jpg'?>" style="max-width: 100%;" />
			</a>
		</div>
    
    <!-- Libraries -->

    <!-- Set global vars -->
    <script>
	    var urlBase = '<?=_site?>', frontURL = '<?=_static?>', backURL = '<?=_cms?>', baseTitle = '<?=_tituloWeb?>';
	    var www_base = '<?=_web?>', ajax_pipe = '<?=_ajaxPipe?>', user_login = '<?=_isLogin?>';
	    var uploads = '<?=_uploads;?>', action = '<?=$action;?>', appModule = '<?=$modulo;?>';
    </script>

    <!-- Set Main & Social -->
    <script src="<?=_static?>/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?=_static?>/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?=_static?>/js/owl-carousel/owl.carousel.min.js"></script>
    
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="<?=_static?>/js/bootstrap/datepicker.es.js"></script>

	<script src="<?=_static?>/js/app.forms.js?v=<?=_webVersion;?>"></script>
    <script src="<?=_static?>/js/app.master.js?v=<?=_webVersion;?>"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAUQrL0s7oiJPOdaHV14Ak18_2hcZgUqOM"></script>
    
    <script>
/*
function closefb ()
                {
                    $.fancybox.close();
                    document.getElementById('contacto').scrollIntoView();
                };


        $(document).ready(function(){	        
            $(".main-slider").owlCarousel({
                items: 1,
                lazyLoad:true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: false,
                nav: false,
                touchDrag  : false,
                mouseDrag  : false,
                navText: ["<span class='pa-left'></span>","<span class='pa-right'></span>"]
				
			
				
            });
            
            if(appModule == 'agendar-visita')
            {
	            var date_input=$('input[name="fecha"]'); //our date input has the name "date"
				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
				var options={
		        	format: 'dd-mm-yyyy',
					autoclose: true,
					language: 'es'
		      	};
			  	date_input.datepicker(options);
			  	
			  	mdvapp.formAgendar();
            }

            if(window.innerWidth <= 480)
            {
	            
	            $.fancybox.open({
					src  : '#popup-pilotos',
					type : 'inline'
				});

            }else{
             	
             	$.fancybox.open({
					src  : '#popup-pilotos',
					type : 'inline'
				});

            }

			//$.fancybox.open('<img src="<?=_static?>/img/pop-up-clubdecampo.jpg" class="img-responsive" style="width:800px;">');
        }); 
    </script>  

<script>
        $(document).ready(function(){

	        if(window.innerWidth <= 480)
	        {

	            $(".main-slider").owlCarousel({
	                items: 1,
	                lazyLoad:true,
	                loop: true,
	                autoplay: true,
	                autoplayTimeout: 6000,
	                autoplayHoverPause: true,
	                nav: true,
	                dots: false,
	                touchDrag  : true,
	                mouseDrag  : false,
	                navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
	            });

            }
            else
            {
	            $(".main-slider").owlCarousel({
	                items: 1,
	                lazyLoad:true,
	                loop: true,
	                autoplay: true,
	                autoplayTimeout: 6000,
	                autoplayHoverPause: true,
	                nav: false,
	                touchDrag  : false,
	                mouseDrag  : false,
	                navText: ["<span class='pa-left'></span>","<span class='pa-right'></span>"]
	            });
            }  

            $.fancybox.open('<img src="<?=_static?>/img/pop-up-clubdecampo.jpg" class="img-responsive" style="width:800px;">');
        });
    </script> 
    
    <?php 
	    // Move down ubicacion
    ?>
    <script>
	    var splitted 	= location.href.split('#');
		
		if(splitted[1] == 'ubicacion')
	    {
		    $(document).ready(function()
		    {
			   scrollToAnchor('#mapa-ubicacion',130); 
		    });
		}
		
		if(splitted[1] == 'multimedia')
	    {
		    $(document).ready(function()
		    {
			   scrollToAnchor('#multimedia',130); 
		    });
		}
    </script>

    <?php
        // Archivos JS
        if(file_exists ("_static/js/modulos/".$modulo."/main.js"))
        {
            echo '<script src="'._static.'/js/modulos/'.$modulo.'/main.js?v='._webVersion.'"></script>';
        }

        if(file_exists ("_static/js/modulos/".$modulo."/".$action.".js"))
        {
            echo '<script src="'._static.'/js/modulos/'.$modulo.'/'.$action.'.js?v='._webVersion.'"></script>';
        }        
    ?>
    
    <!-- Código de instalación Cliengo para contacto@clubdecampovitacura.cl -->
	  <script type="text/javascript">(function () {
	  var ldk = document.createElement('script');
	  ldk.type = 'text/javascript';
	  ldk.async = true;
	  ldk.src = 'https://s.cliengo.com/weboptimizer/5ebae2a847aca7002802a4cf/5ebae2a947aca7002802a4d2.js';
	  var s = document.getElementsByTagName('script')[0];
	  s.parentNode.insertBefore(ldk, s);
	})();</script>
	
	<!-- Variant 03 - Video Background files -->
	<script src="_static/js/jquery.mb.YTPlayer.min.js"></script>
	
	<script>
		jQuery(function(){
	      	jQuery("#bck-video").YTPlayer({
		      	videoURL:'http://youtu.be/X6dJEAs0-Gk',
		      	rel:0,
		      	showYTLogo: false,
		      	stopMovieOnBlur: false
	      	});
	    });
	</script>
    
    </body>
</html>
<?php if(!_debug) ob_end_flush(); ?>