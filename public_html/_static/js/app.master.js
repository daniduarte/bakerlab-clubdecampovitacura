/*
 * Master init	
*/

$(document).ready(function() 
{
	modal_window();
	var alt 	= window.innerHeight;
	$('#modal_background').css('height',alt + 'px');
	
	//mdvapp.checkScrollForTransparentNavbar();
	
	mdvapp.formContacto();
	
	$('.lazy').Lazy();
	
	galerias();
});

function galerias()
{
	$('.link-gal').click(function()
	{
		var donde 	= $(this).attr('data-go');
		
		$('.link-gal').removeClass('activo');
		$(this).addClass('activo');
		
		$('.caja-galeria').removeClass('caja-galeria-activa');
		$('#gal-' + donde).addClass('caja-galeria-activa');
		
		return false;
	});
}

/*
 * =============================
 * Master functions
 * =============================
 */

// SEO function
function evnt(label,categoria)
{
	//ga('send', 'event', 'Button', 'Clic en ' + label, label);
	gtag('event', 'Clic en ' + label, {'event_category': categoria,'event_label': label });
}

// Load video
function cargar_video(link,contener)
{
	$(contener).html('<iframe class="video_frame" width="560" height="315" src="https://www.youtube.com/embed/' + link + '?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
}

// Social media functions
function shareonfb(pantalla,query) { 
	
	if(pantalla == '' || pantalla == undefined)
	{
		open('https://www.facebook.com/sharer/sharer.php?u=http%3A//gespania.cl/',
			 '','top=100,left=400,width=600,height=500');
	}
	else
	{
		open('https://www.facebook.com/sharer/sharer.php?u=http%3A//gespania.cl/' + pantalla + '/' + query + '/',
			 '','top=100,left=400,width=600,height=500');
	}
	return false;
	//ga('send','event','Button','Click en compartir en facebook','Compartir en facebook');
} 

function shareontw(pantalla,query) { 
	open('http://www.twitter.com/share?url=https%3A//www.alcatel-mobile.cl/' + pantalla + '/' + query,'','top=100,left=400,width=600,height=500') ; 
	//ga('send','event','Button','Click en compartir en twitter','Compartir en twitter');
}

// Scroll-to function
function scrollToAnchor(aid){
    var aTag = $(aid);
    $('html,body').animate({scrollTop: aTag.offset().top - 130},'slow');
    return false;
}

// AJAX function
function s_ajax(mediante,ruta,variables,callback)
{
    var mediante  = mediante;
    var ruta      = ruta;
    var variables = variables;
    var mientras  = mientras;

    var response  = "";

    $.ajax({
        type: mediante,
        url: ruta,
        data: variables,
        success: callback
    }); 
}

// Modal windows functions
function open_modal(id_modal)
{
	$('#modal_background').fadeIn();
	$('#' + id_modal).fadeIn();
	return false;
}

function close_modal()
{
	$('#modal_background').fadeOut();
	$('.ventana_modal').fadeOut();
}

function modal_window()
{
	$('.close-modal').click(function()
	{
		$('#modal_background').fadeOut();
		$('.ventana_modal').fadeOut();
	});
}

/*
 * =============================
 * 	Behavior functions
 * =============================
*/
var transparent 		= true;
var navbar_initialized 	= false;
var burger_menu;
var window_width;

$(document).ready(function($){
	
	window_width 	= $(window).width();
    window_height 	= $(window).height();
    
    burger_menu 	= $('nav').hasClass('navbar-burger') ? true : false;
    
	// Init navigation toggle for small screens   
    if(window_width < 979 || burger_menu){
        mdvapp.initRightMenu();
    }

});

// Nav bar collapse
$(window).on('scroll',function(){   
	//mdvapp.checkScrollForTransparentNavbar();
});
$(window).on('load',function(){   
   	//mdvapp.checkScrollForTransparentNavbar();	       
});

$(window).on('scroll',function(){   
	//mdvapp.chechkScrollForShare();
});

//activate collapse right menu when the windows is resized 
$(window).resize(function(){
    if($(window).width() < 979){
        mdvapp.initRightMenu();
    }
    if($(window).width() > 979 && !burger_menu){
        $('nav').removeClass('navbar-burger');
        mdvapp.misc.navbar_menu_visible = 1;
        navbar_initialized = false;
    }
});

mdvapp = {
	
	misc:{
        navbar_menu_visible: 0
    },
    
    checkScrollForTransparentNavbar: debounce(function() {	
        	if($(document).scrollTop() > 200 ) {
                if(transparent) {
                    transparent = false;
                    $('nav[role="navigation"]').addClass('navbar-little');
                }
            } else {
                if( !transparent ) {
                    transparent = true;
                    $('nav[role="navigation"]').removeClass('navbar-little');
                }
            }
    }, 3),
    
    chechkScrollForShare:
        debounce(function() { 
            if($(document).scrollTop() > 480 ) {
                $('#sharebtn').css('position','fixed');
                $('#sharebtn').css('top','90px');
                $('#visita-ejecutivo').fadeIn();
            } else {
                $('#sharebtn').css('position','absolute');
                $('#sharebtn').css('top','570px');
                $('#visita-ejecutivo').hide();
            }
        }, 3),
        
    initRightMenu: function(){  
	    
	     $('#container-burger').removeClass('container-fluid');
	     $('#container-burger').addClass('container');
	    
         if(!navbar_initialized){
	         
            $nav = $('nav');
            $nav.addClass('navbar-burger');
             
            $navbar = $nav.find('.navbar-collapse').first().clone(true);
            $navbar.css('min-height', window.screen.height);
              
            ul_content = '';
             
            $navbar.children('ul').each(function(){
                content_buff = $(this).html();
                ul_content = ul_content + content_buff;   
            });
             
            ul_content = '<ul class="nav navbar-nav">' + ul_content + '</ul>';
            $navbar.html(ul_content);
             
            $('body').append($navbar);
                            
            background_image = $navbar.data('nav-image');
            if(background_image != undefined){
                $navbar.css('background',"url('" + background_image + "')")
                       .removeAttr('data-nav-image')
                       .css('background-size',"cover")
                       .addClass('has-image');                
            }
             
            $toggle = $('.navbar-toggle');
             
            $navbar.find('a').removeClass('btn btn-round btn-default');
            $navbar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
            $navbar.find('button').addClass('btn-simple btn-block');

            $link = $navbar.find('a');
            
            $link.click(function(e){
                var scroll_target = $(this).data('id');
                var scroll_trigger = $(this).data('scroll');
                
                if(scroll_trigger == true && scroll_target !== undefined){
                    e.preventDefault();

                    $('html, body').animate({
                         scrollTop: $(scroll_target).offset().top - 50
                    }, 1000);
                }
                
             });

            
            $toggle.click(function (){    	            

                if(mdvapp.misc.navbar_menu_visible == 1) {                    
                    $('html').removeClass('nav-open'); 
                    mdvapp.misc.navbar_menu_visible = 0;
                    $('#bodyClick').remove();
                     setTimeout(function(){
                        $toggle.removeClass('toggled');
                     }, 550);
                
                } else {
                    setTimeout(function(){
                        $toggle.addClass('toggled');
                    }, 580);
                    
                    div = '<div id="bodyClick"></div>';
                    $(div).appendTo("body").click(function() {
                        $('html').removeClass('nav-open');
                        mdvapp.misc.navbar_menu_visible = 0;
                        $('#bodyClick').remove();
                         setTimeout(function(){
                            $toggle.removeClass('toggled');
                         }, 550);
                    });
                   
                    $('html').addClass('nav-open');
                    mdvapp.misc.navbar_menu_visible = 1;
                    
                }
            });
            navbar_initialized = true;
        }
   
    },
    
    formContacto: function(){
	    
	    var form 		= $("#form-contacto");
		var contacto	= form.find("[name='accion']");
	
		contacto.on("click", function(e)
		{
			if(form.attr("data-status") == "standby")
			{
				form.attr("data-status","working");
				form.find("[name='accion']").html('Enviando...');
			
				$(".alert").remove();
			
				var str 	= "nombre,rut,email,telefono,mensaje";
	
				var arr     = str.split(",");
	
				var err     = 0;
	
				for(var v = 0; v < arr.length; v++)
			    {
			    	var item 	= form.find("[name='" + arr[v] + "']");
			    	var tipo 	= item.attr('data-valid');
			    	var mensaje	= item.attr('data-message');
	
					if(validador(form,arr[v],tipo,mensaje,'text-align:center') == 1)
				    {
				        err     = 1;
				        form.attr("data-status","standby");
				        form.find("[name='accion']").html('ENVIAR');
				        return false;
				    }
				}
			
				if(err == 1)
			    {
			        e.preventDefault();
			        form.attr("data-status","standby");
			        form.find("[name='accion']").html('ENVIAR');
			    }
			    else
			    {
				    
				    if(form.find('[name=cotizar]').val() == 0)
				    {
					    $('#firstrow').before(crear_alerta(1,'Seleccione un departamento de Interés','text-align:center'));
					    form.attr("data-status","standby");
				        form.find("[name='accion']").html('ENVIAR');
				        return false;
				    }
				    else
				    {
					    form.attr("data-status","working");
				    
					    var data	= form.serialize();
						    
					    s_ajax(	"POST",backURL + '/app/action.contacto.php',data,
				    			function(response){
					    			
					    			$('#form-contacto').html(response);
					    			
					    			evnt('Enviar Formulario de Contacto','Button');
					    			
					    			
				    			});
				    }				    
				    
			    }
	
			}
			else
			{
				return false;
			}
	
		});
	    
    },
    
    formAgendar: function(){
	    
	    var form 		= $("#form-agendar");
		var contacto	= form.find("[name='accion']");
	
		contacto.on("click", function(e)
		{
			if(form.attr("data-status") == "standby")
			{
				form.attr("data-status","working");
				form.find("[name='accion']").html('Enviando...');
			
				$(".alert").remove();
			
				var str 	= "nombre,telefono,fecha,rut";
	
				var arr     = str.split(",");
	
				var err     = 0;
	
				for(var v = 0; v < arr.length; v++)
			    {
			    	var item 	= form.find("[name='" + arr[v] + "']");
			    	var tipo 	= item.attr('data-valid');
			    	var mensaje	= item.attr('data-message');
	
					if(validador(form,arr[v],tipo,mensaje,'text-align:center') == 1)
				    {
				        err     = 1;
				        form.attr("data-status","standby");
				        form.find("[name='accion']").html('ENVIAR');
				        return false;
				    }
				}
			
				if(err == 1)
			    {
			        e.preventDefault();
			        form.attr("data-status","standby");
			        form.find("[name='accion']").html('ENVIAR');
			    }
			    else
			    {
				    
				   	form.attr("data-status","working");
				    
				    var data	= form.serialize();
					    
				    s_ajax(	"POST",backURL + '/app/action.agendar.php',data,
			    			function(response){
				    			
				    			$('#form-agendar').html(response);
				    			
				    			evnt('Enviar Formulario para Agendar Visita','Acciones');
				    			
				    			
			    			});			    
				    
			    }
	
			}
			else
			{
				return false;
			}
	
		});
	    
    }

}

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};

function cargar_cotizador()
{
	if(appModule == 'edificio-peumo')
	{
		$('#planokm').html('<iframe id="framecotizador" src="https://www.comercialinmobiliarias.cl/cotizador_web_new/cotizador/index.php?id_subagrupaciones=1&key=ffv"></iframe>');	
	}
	else
	{
		$('#planokm').html('<iframe id="framecotizador" src="https://www.comercialinmobiliarias.cl/cotizador_web_new/cotizador/index.php?id_subagrupaciones=2&key=ffv"></iframe>');	
	}	
}

function cargar_planta(planta)
{
	var data	= 'planta=' + planta;
					    
    s_ajax(	"POST",backURL + '/app/app.plantas.php',data,
			function(response){
    			    			
    			$('#planokm').html(response);
    			
			}); 
}