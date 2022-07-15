<?php	
    // Head Params
    define("_sufijoWeb", "Club de Campo Vitacura");
    $pic 	= '';
	
	switch ($modulo) 
	{
	    case 'inicio':
	    
	    	define('_active','inicio');
	    	
	        $tituloWeb		= _sufijoWeb;
	        $descWeb		= 'Distrito Club de Campo Vitacura';
	        $keyWords		= 'Club de Campo Vitacura, Departamentos';
	        
	        $pc_text		= $descWeb;	
	        $pic 			= _web . "/_static/img/_rrss/general.jpg";
	        break;
	    
	    case 'confirmar-inscripcion':
	    
	    	define('_active','inicio');
	    	
	        $tituloWeb		= 'Confirmar inscripción | ' . _sufijoWeb;
	        $descWeb		= 'Confirme su inscripción en Distrito Club de Campo Vitacura';
	        $keyWords		= 'Club de Campo Vitacura, Departamentos';
	        
	        $pc_text		= $descWeb;	
	        $pic 			= _web . "/_static/img/_rrss/general.jpg";
	        break;
	    
	    default:
	    
	    	$tituloWeb		= "Error 404 | " . _sufijoWeb;
	        $descWeb		= 'Página de error';
	        $keyWords		= 'Error 404';
	        
	        $pc_text		= $descWeb;	    
	        $pic 			= _web . "/_static/img/_rrss/home.jpg";
	    	break;
	        
	}
	
	define("_tituloWeb", $tituloWeb);
	define("_descWeb", $descWeb);
	define("_keyWords", $keyWords);
	
	define("_postCardDesc", $pc_text);
	define("_postCardPic", $pic);