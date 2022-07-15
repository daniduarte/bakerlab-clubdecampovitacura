<script type="text/javascript">

$(document).ready(function(){
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Validar ingreso de contenido
    $("#parametro").validate({
		rules:{
			grupo:{
				required:true
			},
			codigo:{
				required:true
			},
			nombre:{
				required:true
			},
			valor:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function(form) {
            save("parametro");
        }
	});

	// Validar ingreso
    $("#idioma").validate({
		rules:{
			codigo:{
				required:true
			},
			nombre:{
				required:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function(form) {
            save("idioma");
        }
	});

	// Validar ingreso de objeto
    $("#usuario").validate({
		rules:{
			nombre:{
				required:true
			},
			nick:{
				required:true
			},
			email:{
				required: true, 
				email: true
			},
			r_password:{
				equalTo: "#password"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function(form) {
            save("usuario");
        }
	});

	// Validar ingreso de objeto
    $("#modulo").validate({
		rules:{
			nombre:{
				required:true
			},
			codigo:{
				required:true
			},
			icono:{
				required: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function(form) {
            save("modulo");
        }
	});

});

$(document).ready(function(){

	$("#modulos").tableDnD({
				        	onDrop: function(table, row) {
				        	var campos 	= $.tableDnD.serialize();

				        	campos 		= campos + '&modo=reordenar';

				        	call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_modulo.php",campos,"");

					    }
				    });
});

function tableDrag(tableid)
{
	$("" + tableid).tableDnD({
				        onDrop: function(table, row) {
				        	var campos 	= $.tableDnD.serialize();

				        	campos 		= campos + '&modo=reordenar&tbid=' + tableid;

				        	call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_banner.php",campos,"");
				        	
					    }
				    });
}

</script>