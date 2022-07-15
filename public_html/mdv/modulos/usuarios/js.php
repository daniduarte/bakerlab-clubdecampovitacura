<!-- PLUGIN REDACTOR -->
<script src="<?=BASEURL;?>js/redactor.js"></script>

<!-- REORDENAR TABLAS -->
<script src="<?=BASEURL;?>js/jquery.tblDnD.js"></script> 

<script type="text/javascript">
	$(function()
	{
		$('#texto').redactor({
			imageGetJson: '<?=BASEURL;?>redactorimgs.php?t=ayuda'
		});

		$('.redactor_editor').css("min-height","200px");
		$('.redactor_box').css("width","97%");
	});
</script>

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

	// Validar ingreso de objeto
    $("#campo").validate({
		rules:{
			
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
            save("campo");
        }
	});

	// Validar ingreso de objeto
    $("#tema").validate({
		rules:{
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
            save("tema");
        }
	});

	// Validar ingreso de objeto
    $("#item").validate({
		rules:{
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
            save("item");
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

	$("#campos").tableDnD({
				        	onDrop: function(table, row) {
				        	var campos 	= $.tableDnD.serialize();

				        	campos 		= campos + '&modo=reordenar';

				        	call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_campo.php",campos,"");

					    }
				    });
});

function tableDrag(tableid)
{
	$("" + tableid).tableDnD({
				        onDrop: function(table, row) {
				        	var campos 	= $.tableDnD.serialize();

				        	campos 		= campos + '&modo=reordenar&tbid=' + tableid;

				        	call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_tema.php",campos,"");
				        	
					    }
				    });
}

function itemDrag(tableid)
{
	$("" + tableid).tableDnD({
				        onDrop: function(table, row) {
				        	var campos 	= $.tableDnD.serialize();

				        	campos 		= campos + '&modo=reordenar&tbid=' + tableid;

				        	call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_item.php",campos,"");
				        	
					    }
				    });
}

</script>