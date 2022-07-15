<script type="text/javascript">

$(document).ready(function(){
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();

	// Validar ingreso de contenido
    $("#unidad").validate({
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
            save("unidad");
        }
	});
	
	$("#tipologia").validate({
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
            save("tipologia");
        }
	});

});

</script>