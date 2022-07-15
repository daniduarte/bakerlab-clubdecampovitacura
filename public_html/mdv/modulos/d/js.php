<!-- PLUGIN REDACTOR -->
<script src="<?=BASEURL;?>js/redactor.js"></script>

<!-- REORDENAR TABLAS -->
<script src="<?=BASEURL;?>js/jquery.tblDnD.js"></script> 

<script type="text/javascript">
	$(function()
	{
		$('#redactor').redactor();
		$('.redactor_editor').css("height","450px");
		$('.redactor_box').css("width","97%");
	});

	$(document).ready(function(){
	
		$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
		
		$('select').select2();
		
		// Validar ingreso de contenido
	    $("#elemento").validate({
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
	            save("elemento");
	        }
		});

	});

	function tableDrag(tableid,objeto)
	{
		$("" + tableid).tableDnD({
			onDrop: function(table, row) {
			var campos 	= $.tableDnD.serialize();

			campos 		= campos + '&modo=reordenar&tbid=' + tableid;

			call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_" + objeto + ".php",campos,"");
					        	
			}
		});
	}

</script>