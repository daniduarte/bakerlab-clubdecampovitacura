<script type="text/javascript">
	
$(document).ready(function(){

	var login = $('#loginform');
	var recover = $('#recoverform');
	var speed = 400;

	$('#to-recover').click(function(){
		
		$("#loginform").slideUp();
		$("#recoverform").fadeIn();
	});
	$('#to-login').click(function(){
		
		$("#recoverform").hide();
		$("#loginform").fadeIn();
	});
	
	
	$('#to-login').click(function(){
	
	});
    
    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){ 
       
        var input = $(this);       
       
        $(input).val(input.attr('placeholder'));
               
        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });
       
        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });        
        
    }

    enter("user");
    enter("pass");

});

function enter(identificador){
  	
  	$('#' + identificador).bind('keyup', function() {

  		if(window.event)
			keyPressed = window.event.keyCode;	// IE
		else
			keyPressed = e.which;	 // Firefox

  		if (keyPressed == 13)
    	{
    		trytolog();
    	}

  	});
}

function trytolog()
{
	$("#err_mss").fadeOut();

	// Campos
	var campos 		= get_fields("#loginform");

	// Llamar al AJAX
	var myajax		= call_ajax("POST","modulos/login/login.php",campos,"");
	$("#err_mss").html("Accediendo...");
	$("#err_mss").fadeIn();

	if($("#user").val() == "" || $("#pass").val() == "") {

		$("#err_mss").html("Completa ambos campos para ingresar");
		$("#err_mss").fadeIn();
		return false;

	}

	if(myajax == 1)
	{
		// Ingresar
		document.location.href = "index.php?load=inicio";
	}else{		
		// Datos incorrectos
		$("#err_mss").html("Los datos ingresados no son correctos");
		$("#err_mss").fadeIn();
		return false;
	}

}

function trytorecover()
{
	$("#err_rec").fadeOut();

	// Campos
	var campos 		= get_fields("#recoverform");

	$("#err_rec").html("Validando...");
	$("#err_rec").fadeIn();

	if($("#email").val() == "") {

		$("#err_rec").html("Ingrese su e-mail o usuario para continuar");
		$("#err_rec").fadeIn();
		return false;

	}

	// Llamar al AJAX
	var myajax		= call_ajax("POST","modulos/login/recuperar.php",campos,"");	

	if(myajax == 2)
	{		
		// Datos incorrectos
		$("#err_rec").html("La informaci&oacute;n ingresada es incorrecta");
		$("#err_rec").fadeIn();
		return false;
	}else{		
		// Password enviada
		$("#err_rec").html(myajax);
		$("#err_rec").fadeIn();
		$("#email").val('');
		return false;	
	}

}

</script>