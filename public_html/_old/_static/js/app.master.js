/*
 * Master init	
*/

var loaded_map	= false;

$(document).ready(function() 
{
	modal_window();
	var alt 	= window.innerHeight;
	$('#modal_background').css('height',alt + 'px');
	
	// Viewport checker
	$('.custom-fadeIn').addClass("notvisible").viewportChecker({
    	classToAdd: 'itsvisible animated fadeIn',
        offset: 200
    });
    
    $('.custom-slideInUp').addClass("notvisible").viewportChecker({
    	classToAdd: 'itsvisible animated slideInUp',
        offset: 200
    });
    
    mdvapp.navegacion();
    mdvapp.formContacto();
    
});

// Nav bar collapse
$(window).on('scroll',function(){   
	mdvapp.checkScrollForTransparentNavbar();
});
$(window).on('load',function(){   
   	mdvapp.checkScrollForTransparentNavbar();	       
});

/*
 * =============================
 * Master functions
 * =============================
 */

// SEO function
function evnt(label)
{
	ga('send', 'event', 'Button', 'Clic en ' + label, label);
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
    $('html,body').animate({scrollTop: aTag.offset().top - 100},'slow');
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

$(window).on('scroll',function(){   
	mdvapp.chechkScrollForShare();
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
    	if($(document).scrollTop() > 30 ) {
            if(transparent) {
                transparent = false;
                $('nav[role="navigation"]').addClass('navbar-scrolled');
            }
        } else {
            if( !transparent ) {
                transparent = true;
                $('nav[role="navigation"]').removeClass('navbar-scrolled');
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
    
    loadMap: function(){
	    
	    if(!loaded_map)
	    {
		    loaded_map	= true;
	    
		    // When the window has finished loading create our google map below
	        google.maps.event.addDomListener(window, 'load', init);
	    
	        function init() {
	            var mapOptions = {
	                
	                zoom: 15,
	                center: new google.maps.LatLng(-33.362478, -70.498453),
	                styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
	            };
	            
	            var mapElement = document.getElementById('mapa');
	
	            var map = new google.maps.Map(mapElement, mapOptions);
	
	            var marker = new google.maps.Marker({
	                position: new google.maps.LatLng(-33.364498, -70.487947),
	                map: map,
	                icon: frontURL + '/img/_iconos/icono-proyecto.png'
	            });
	            
	            var iw	= new google.maps.InfoWindow({ content: "<div style='padding:5px;text-align:center;margin-left:15px;'><strong>PROYECTO<br>Urban Lodge</strong></div>" });
				google.maps.event.addListener(marker, "click", function(e) { iw.open(map, this); });
	            
	            /*
		            ADICIÓN DE MARCADORES
	            */
	            
	            // Marcador Shell
				var marker = new google.maps.Marker({
					position: {lat: -33.366820, lng: -70.498553},
					map: map,
					icon: frontURL + '/img/_iconos/icon-shell.png'
				});
				
				// Marcador Salcobrand
				var marker = new google.maps.Marker({
					position: {lat: -33.368482, lng: -70.500933},
					map: map,
					icon: frontURL + '/img/_iconos/icon-salcobrand.png'
				});
				
				// Marcador Supermercado
				var marker = new google.maps.Marker({
					position: {lat: -33.364311, lng: -70.494318},
					map: map,
					icon: frontURL + '/img/_iconos/icon-unimarc.png'
				});
				
				// Marcador The Southern Cross School
				var marker = new google.maps.Marker({
					position: {lat: -33.370184, lng: -70.505447},
					map: map,
					icon: frontURL + '/img/_iconos/icon-southern.png'
				});
				
				// Marcador Lincoln International Academy
				var marker = new google.maps.Marker({
					position: {lat: -33.369791, lng: -70.511061},
					map: map,
					icon: frontURL + '/img/_iconos/icon-lincoln.png'
				});
				
				// Marcador Instituto Hebreo
				var marker = new google.maps.Marker({
					position: {lat: -33.369169, lng: -70.508272},
					map: map,
					icon: frontURL + '/img/_iconos/icon-hebreo.png'
				});
				
				// Marcador Mall Sport
				var marker = new google.maps.Marker({
					position: {lat: -33.370800, lng: -70.506137},
					map: map,
					icon: frontURL + '/img/_iconos/icon-mall-sport.png'
				});				
				
				// Marcador Supermercado Líder
				var marker = new google.maps.Marker({
					position: {lat: -33.370492, lng: -70.512032},
					map: map,
					icon: frontURL + '/img/_iconos/icon-lider.png'
				});				
				
				// Marcador Costanera Norte
				var marker = new google.maps.Marker({
					position: {lat: -33.366965, lng: -70.515829},
					map: map,
					icon: frontURL + '/img/_iconos/icon-costanera.png'
				});				
				
				// Marcador Portal La Dehesa
				var marker = new google.maps.Marker({
					position: {lat: -33.357490, lng: -70.515298},
					map: map,
					icon: frontURL + '/img/_iconos/icon-dehesa.png'
				});
				
				// Marcador Colegio Maimónides
				var marker = new google.maps.Marker({
					position: {lat: -33.361911, lng: -70.484788},
					map: map,
					icon: frontURL + '/img/_iconos/icon-maimonides.png'
				});
				
	        }
	        
	    }
	    
    },
    
    navegacion: function() {
	    
	    $('.menu-centrado a').click(function()
	    {
		    scrollToAnchor('#' + $(this).attr('data-go'));
		    return false;
	    });
	    
	    $('footer ul a').click(function()
	    {
		    scrollToAnchor('#' + $(this).attr('data-go'));
		    return false;
	    });
	    
    },
    
    formContacto: function(){
	    
	    var form 		= $("#inscribete");
		var contacto	= form.find("[name='accion']");
	
		contacto.on("click", function(e)
		{
			if(form.attr("data-status") == "standby")
			{
				form.attr("data-status","working");
				form.find("[name='accion']").html('Enviando...');
			
				$(".alert").remove();
			
				var str 	= "rut,nombre,email,mensaje";
	
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
					    
				    s_ajax(	"POST",backURL + '/app/action.contacto.php',data,
			    			function(response){
				    			
				    			$('#inscribete').html(response);
				    			
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

/* WAYPOINTS */
var waypoint = new Waypoint({
  	element: document.getElementById('inscripcion'),
  	handler: function(direction) {
	  	if(direction == 'up')
	  	{
		  	$('.menu-centrado li').removeClass('active');
    		$('.menu-centrado a[data-go=inscripcion]').parent().addClass('active');
    	}
  	},
  	offset: -100
});

var waypoint = new Waypoint({
  	element: document.getElementById('inscripcion'),
  	handler: function(direction) {
	  	if(direction == 'down')
	  	{
		  	$('.menu-centrado li').removeClass('active');
    		$('.menu-centrado a[data-go=inscripcion]').parent().addClass('active');
    	}
  	},
  	offset: 100
});

var waypoint = new Waypoint({
  	element: document.getElementById('proyecto'),
  	handler: function(direction) {
	  	if(direction == 'up')
	  	{
		  	$('.menu-centrado li').removeClass('active');
    		$('.menu-centrado a[data-go=proyecto]').parent().addClass('active');
    	}
  	},
  	offset: -100
});

var waypoint = new Waypoint({
  	element: document.getElementById('proyecto'),
  	handler: function(direction) {
	  	if(direction == 'down')
	  	{
		  	$('.menu-centrado li').removeClass('active');
    		$('.menu-centrado a[data-go=proyecto]').parent().addClass('active');
    	}
  	},
  	offset: 100
});

var waypoint = new Waypoint({
  	element: document.getElementById('ubicacion'),
  	handler: function(direction) {
	  	if(direction == 'up')
	  	{
		  	$('.menu-centrado li').removeClass('active');
    		$('.menu-centrado a[data-go=ubicacion]').parent().addClass('active');
    	}
  	},
  	offset: -100
});

var waypoint = new Waypoint({
  	element: document.getElementById('ubicacion'),
  	handler: function(direction) {
	  	if(direction == 'down')
	  	{
		  	$('.menu-centrado li').removeClass('active');
    		$('.menu-centrado a[data-go=ubicacion]').parent().addClass('active');    		
    	}
  	},
  	offset: 100
});