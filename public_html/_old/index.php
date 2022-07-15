<?php
	# Global versión
	define('_webVersion','1.0');
	
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
        <link rel="apple-touch-icon" sizes="180x180" href="<?=_static?>/img/favicon.png">
        <link rel="icon" type="image/png" href="<?=_static?>/img/favicon.png" sizes="32x32">
        <link rel="mask-icon" href="<?=_static?>/img/favicon.png">

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
	        $activa = "index.php";
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
    
    <!-- Libraries -->

    <!-- Set global vars -->
    <script>
	    var urlBase = '<?=_site?>', frontURL = '<?=_static?>', backURL = '<?=_cms?>', baseTitle = '<?=_tituloWeb?>';
	    var www_base = '<?=_web?>', ajax_pipe = '<?=_ajaxPipe?>', user_login = '<?=_isLogin?>';
	    var uploads = '<?=_uploads;?>', action = '<?=$action;?>';
    </script>

    <!-- Set Main & Social -->
    <script src="<?=_static?>/js/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?=_static?>/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?=_static?>/js/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?=_static?>/js/viewport-checker/jquery.viewportchecker.min.js"></script>
    <script src="<?=_static?>/js/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?=_static?>/js/YTPlayer/jquery.mb.YTPlayer.min.js"></script>

	<script src="<?=_static?>/js/app.forms.js?v=<?=_webVersion;?>"></script>
    <script src="<?=_static?>/js/app.master.js?v=<?=_webVersion;?>"></script>
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAUQrL0s7oiJPOdaHV14Ak18_2hcZgUqOM"></script>
    
    <script>
        $(document).ready(function(){	        
            $("#main-slider").owlCarousel({
                items: 1,
                lazyLoad:true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                nav: false,
                touchDrag  : false,
                mouseDrag  : false,
                dots: false,
                navText: ["<span class='pa-left'></span>","<span class='pa-right'></span>"]
            });
            
            $("#galeria").owlCarousel({
                items: 1,
                lazyLoad:true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                nav: true,
                touchDrag  : true,
                mouseDrag  : true,
                navText: ["<div class='pa-left'></div>","<div class='pa-right'></div>"]
            });
            
        });
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
    
    </body>
</html>
<?php if(!_debug) ob_end_flush(); ?>