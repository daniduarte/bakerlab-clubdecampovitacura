<script src="<?=BASEURL;?>js/jquery.tblDnD.js"></script>
<script src="<?=BASEURL;?>js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();

	$('select').select2();

    // Validar ingreso de contenido
    $("#tienda").validate({
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
            save("tienda");
        }
	});

	$("#operador").validate({
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
            save("operador");
        }
	});

});

</script>
