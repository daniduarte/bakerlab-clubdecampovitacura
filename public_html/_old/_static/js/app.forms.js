function crear_alerta(tipo,texto,estilo)
{
	if(estilo == undefined)
	{
		estilo 	= "width: 100%; margin: 0px auto 0px auto; float:left;";
	}
			
	var message = '<div class="alert '; 
        if(tipo == 1) message += 'alert-warning';
        if(tipo == 2) message += 'alert-success';
        if(tipo != 1 && tipo != 2) message += 'alert-info';
        
        message += ' alert-dismissable" style="' + estilo + '">';

        if(tipo == 1) message += '';
        if(tipo == 2) message += '<i class="gour-done"></i>';
        if(tipo != 1 && tipo != 2) message += '';

        message += texto + '</div>';

    return message;
}

function validador(formulario,item,tipo,mensaje,estilo)
{
	/* 
		Tipos
		1	= Que no esté vacío
		2 	= Vacío y que tenga formato de e-mail
		3 	= Vacío y sólo números
		4 	= RUT
	*/
	
	$(".alert").remove();

	campo 			= formulario.find("[name='" + item + "']");

	var tipos 		= tipo.split(";");
	var mensajes	= mensaje.split(";");

	var err 	= 0;

	for(var t = 0; t < tipos.length; t++)
    {

    	var tipo 	= tipos[t];
    	var mensaje	= mensajes[t];    	
    	var css		= campo.attr("data-type");
    	
    	if(err == 0)
    	{

	    	switch(tipo)
			{
				case "1":

					if(campo.val().trim() == "")
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						$('#modalrow').before(crear_alerta(1,mensaje,estilo));
						$('#secondrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}

				  	break;

				case "2":

					if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(campo.val())))
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						$('#modalrow').before(crear_alerta(1,mensaje,estilo));
						$('#secondrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}
				  
				  break;

				 case "3":

					var cadena 	= campo.val();

					cadena 		= cadena.split("-").join("");
					cadena 		= cadena.split("+").join("");
					cadena 		= cadena.split("(").join("");
					cadena 		= cadena.split(")").join("");
					cadena 		= cadena.split("-").join("");
					
					if(isNaN(cadena) && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						$('#modalrow').before(crear_alerta(1,mensaje,estilo));
						$('#secondrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}
				  
				break;

				case "4":

					if(!mdv_Rut(campo.val()))
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						$('#secondrow').before(crear_alerta(1,mensaje,estilo));
						$('#modalrow').before(crear_alerta(1,mensaje,estilo));
						campo.focus();
						err 	= 1;
					}
				  
				break;
				
				case "5":
					
					if(campo.val().length > 12 && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						$('#modalrow').before(crear_alerta(1,mensaje,estilo));						
						$('#secondrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}
				  
				break;
				
				case "6":
				
					var palabras 	= campo.val().split(" ");
					
					if(palabras.length > 100 && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}
				  
				break;
				
				case "7":
					
					if(campo.val().length < 8 && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));						
						
						campo.focus();
						err 	= 1;
					}
				  
				break;
				
				case "8":
				
					for(var n = 0; n <= 9; n++)
					{
						if(campo.val().indexOf(n) != -1)
						{
							$('#firstrow').before(crear_alerta(1,mensaje,estilo));
							
							campo.focus();
							err 	= 1;
							break;
						}
					}
				
					// letras.indexOf(tecla)
				
				break;

			}

		}

    }

	return err;

}

function validador_placeholder(formulario,item,tipo,mensaje,estilo)
{
	/* 
		Tipos
		1	= Que no esté vacío
		2 	= Vacío y que tenga formato de e-mail
		3 	= Vacío y sólo números
		4 	= RUT
	*/
	
	$(".alert").remove();

	campo 			= formulario.find("[name='" + item + "']");

	var tipos 		= tipo.split(";");
	var mensajes	= mensaje.split(";");

	var err 	= 0;

	for(var t = 0; t < tipos.length; t++)
    {

    	var tipo 	= tipos[t];
    	var mensaje	= mensajes[t];    	
    	var css		= campo.attr("data-type");
    	
    	if(err == 0)
    	{

	    	switch(tipo)
			{
				case "1":

					if(campo.val().trim() == "")
					{
						campo.attr("placeholder",mensaje);
						campo.css('border','1px solid #BC0033');
						
						campo.focus();
						err 	= 1;
					}
					else
					{
						campo.attr("placeholder",'');
						campo.css('border','1px solid #CCC');
					}

				  	break;

				case "2":

					if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(campo.val())))
					{						
						campo.val("");
						campo.attr("placeholder",mensaje);
						campo.css('border','1px solid #BC0033');
						
						campo.focus();
						err 	= 1;
					}
					else
					{
						campo.attr("placeholder",'');
						campo.css('border','1px solid #CCC');
					}
				  
				  break;

				 case "3":

					var cadena 	= campo.val();

					cadena 		= cadena.split("-").join("");
					cadena 		= cadena.split("+").join("");
					cadena 		= cadena.split("(").join("");
					cadena 		= cadena.split(")").join("");
					cadena 		= cadena.split("-").join("");
					
					if(isNaN(cadena) && campo.val() != '')
					{
						campo.val('');
						campo.attr("placeholder",mensaje);
						campo.css('border','1px solid #BC0033');
						
						campo.focus();
						err 	= 1;
					}
					else
					{
						campo.attr("placeholder",'');
						campo.css('border','1px solid #CCC');
					}
				  
				break;

				case "4":

					if(!mdv_Rut(campo.val()))
					{
						campo.attr("placeholder",mensaje);
						campo.css('border','1px solid #BC0033');
						
						campo.focus();
						err 	= 1;
					}
					else
					{
						campo.attr("placeholder",'');
						campo.css('border','1px solid #CCC');
					}
				  
				break;
				
				case "5":
					
					if(campo.val().length > 12 && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						$('#modalrow').before(crear_alerta(1,mensaje,estilo));						
						$('#secondrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}
					else
					{
						campo.attr("placeholder",'');
						campo.css('border','1px solid #CCC');
					}
				  
				break;
				
				case "6":
				
					var palabras 	= campo.val().split(" ");
					
					if(palabras.length > 100 && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));
						
						campo.focus();
						err 	= 1;
					}
				  
				break;
				
				case "7":
					
					if(campo.val().length < 8 && campo.val() != '')
					{
						$('#firstrow').before(crear_alerta(1,mensaje,estilo));						
						
						campo.focus();
						err 	= 1;
					}
				  
				break;
				
				case "8":
				
					for(var n = 0; n <= 9; n++)
					{
						if(campo.val().indexOf(n) != -1)
						{
							$('#firstrow').before(crear_alerta(1,mensaje,estilo));
							
							campo.focus();
							err 	= 1;
							break;
						}
					}
				
					// letras.indexOf(tecla)
				
				break;

			}

		}

    }

	return err;

}

function validador_estatico(formulario,item,tipo,mensaje,dialogo)
{
	/* 
		Tipos
		1	= Que no esté vacío
		2 	= Vacío y que tenga formato de e-mail
		3 	= Vacío y sólo números
		4 	= RUT
	*/
	
	$(".alert").hide();

	campo 			= formulario.find("input[name='" + item + "']");
	dialog_alert	= $("#" + dialogo); 			

	var tipos 		= tipo.split(";");
	var mensajes	= mensaje.split(";");

	var err 	= 0;

	for(var t = 0; t < tipos.length; t++)
    {

    	tipo 	= tipos[t];
    	mensaje	= mensajes[t];

    	if(err == 0)
    	{

	    	switch(tipo)
			{
				case "1":

					if(campo.val() == "")
					{							
						dialog_alert.html(mensaje);
						dialog_alert.fadeIn();
						dialog_alert.focus();
						err 	= 1;
					}

				  	break;

				case "2":

					if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(campo.val())))
					{
						dialog_alert.html(mensaje);
						dialog_alert.fadeIn();
						dialog_alert.focus();
						err 	= 1;
					}
				  
				  break;

				 case "3":

					var cadena 	= campo.val();

					cadena 		= cadena.split("-").join("");
					cadena 		= cadena.split("+").join("");
					
					if(isNaN(cadena))
					{
						dialog_alert.html(mensaje);
						dialog_alert.fadeIn();
						dialog_alert.focus();
						err 	= 1;
					}
				  
				break;

				case "4":

					if(!mdv_Rut(campo.val()))
					{
						dialog_alert.html(mensaje);
						dialog_alert.fadeIn();
						dialog_alert.focus();
						err 	= 1;
					}
				  
				break;

			}

		}

    }

	return err;

}

// Funciones de RUT
function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{			
		return false;	
	}	
	return true;
}

function revisarDigito2( crut )
{	
	largo = crut.length;	
	if ( largo < 2 )	
	{			
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{	
		return false	
	}

	return true
}

function mdv_Rut(texto)
{	
	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{				
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	

	if ( revisarDigito2(texto) )		
		return true;	

	return false;
}