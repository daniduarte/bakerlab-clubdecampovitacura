<?php	
    // Head Params
    define("_sufijoWeb", "Club de Campo Vitacura");
    $pic 	= '';
	
	switch ($modulo) 
	{
	    case 'inicio':
	    
	    	define('_active','inicio');
	    	
	        $tituloWeb		= _sufijoWeb;
	        $descWeb		= 'Club de Campo Vitacura es un proyecto creado en conjunto por FFV y el arquitecto Borja García Huidobro, inspirados en la naturaleza y sus materiales nobles.';
	        $keyWords		= 'Departamentos en Vitacura, Club de Campo';
	        
	        $pc_text		= $descWeb;	
	        $pic 			= _web . "/_static/img/_rrss/general.jpg";
	        break;
	        
	    case 'edificio-peumo':
	    	
	        $tituloWeb		= "Edificio Peumo | " . _sufijoWeb;
	        $descWeb		= 'Cotiza departamentos de 4 dormitorios+ escritorio+ estar en Edificio Peumo. Ubicado en un extraordinario sector de Vitacura.';
	        $keyWords		= 'Departamentos en Venta, Edificio Quillay en Vitacura';
	        
	        $pc_text		= $descWeb;	
	        $pic 			= _web . "/_static/img/_rrss/general.jpg";
	        break;
	    
	    case 'edificio-quillay':
	    	
	        $tituloWeb		= "Edificio Quillay | " . _sufijoWeb;
	        $descWeb		= 'Cotiza departamentos de 1 y 2 dormitorios en Edificio Quillay. Ubicado en un extraordinario sector de Vitacura.';
	        $keyWords		= 'Casas en Vitacura, Edificio Peumo Vitacura';
	        
	        $pc_text		= $descWeb;	
	        $pic 			= _web . "/_static/img/_rrss/general.jpg";
	        break;
	        
	    case 'agendar-visita':
	    	
	        $tituloWeb		= "Agendar Visita | " . _sufijoWeb;
	        $descWeb		= 'Agende su Visita a Club de Campo Vitacura, un proyecto FFV inspirado en la naturaleza y sus materiales nobles.';
	        $keyWords		= 'Sala de Ventas, Club de Campo';
	        
	        $pc_text		= $descWeb;	
	        $pic 			= _web . "/_static/img/_rrss/general.jpg";
	        break;
	        
	    case 'recorrido-virtual':
	    	
	        $tituloWeb		= "Recorrido Virtual | " . _sufijoWeb;
	        $descWeb		= 'Recorrido Virtual Club de Campo Vitacura, un proyecto FFV inspirado en la naturaleza y sus materiales nobles.';
	        $keyWords		= 'Sala de Ventas, Club de Campo';
	        
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