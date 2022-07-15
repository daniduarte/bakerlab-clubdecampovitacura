<?php 
    // Scripts obligatorios
    ini_set('display_errors', 0);
?>
<script src="<?=BASEURL;?>js/jquery.min.js"></script>
<script src="<?=BASEURL;?>js/jquery.ui.custom.js"></script>
<script src="<?=BASEURL;?>js/bootstrap.min.js"></script>
<script src="<?=BASEURL;?>js/jquery.uniform.js"></script>
<script src="<?=BASEURL;?>js/select2.min.js"></script>
<script src="<?=BASEURL;?>js/mdv_admin.js"></script>
<script src="<?=BASEURL;?>js/jquery.validate.js"></script>
<script src="<?=BASEURL;?>js/masked.js"></script>
<script src="<?=BASEURL;?>js/jquery.peity.min.js"></script>
<script src="<?=BASEURL;?>js/jquery.dataTables.min.js"></script>

<?php 
/* 
    SCRIPTS ALTERNATIVOS y UTILIZABLES...

    # COMENTO EN PHP PARA NO VISUALIZAR CODIGO COMENTADO EN EL SITIO

    <!-- Editor de texto en HTML (Reemplazado por REDACTOR) -->
    <script src="<?=BASEURL;?>js/wysihtml5-0.3.0.js"></script>
    <script src="<?=BASEURL;?>js/bootstrap-wysihtml5.js"></script>
    <script>
      $('.textarea_editor').wysihtml5();
    </script>

    <!-- Picker de Color -->
    <script src="<?=BASEURL;?>js/bootstrap-colorpicker.js"></script>

    <!-- Picker de Fecha -->
    <script src="<?=BASEURL;?>js/bootstrap-datepicker.js"></script>

    <!-- PLUGIN REDACTOR -->
    <script src="<?=BASEURL;?>js/redactor.js"></script>

    <!-- REORDENAR TABLAS -->
    <script src="<?=BASEURL;?>js/jquery.tblDnD.js"></script>     
    
    # Para implementar POP Overs (Nunca implementado)
    <script src="<?=BASEURL;?>js/mdv_popover.js"></script>
    
*/
?>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}

// AJAX Call
function call_ajax(mediante,ruta,variables,mientras)
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
        async: false,
        beforeSend: mientras,
        success: function(respuesta) {

            response  = respuesta;
            
        } // FIN SUCCESS
    });

    return response;    
}

// SYNC AJAX
function sync_ajax(mediante,ruta,variables,callback)
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

// Obtener valores de formulario

function get_fields(contenedor)
{
    var str = $("" + contenedor).serialize();
    return str;
}

function cambiatexto()
{
    $(".boton_subida").html("Subiendo...");
}

// Subir archivos mediante AJAX
function uploadFile(campo,tipo,file_field,html_reemplazo){

    /*
        Variantes para var tipo
        1   => Imagenes (.JPG,.PNG,.GIF)
        2   => PDF (.PDF)
    */

    var gatillador      = "<?=$modulo;?>/<?=$action;?>";

    var inputFileImage  = document.getElementById("" + file_field);

    var file            = inputFileImage.files[0];

    var data            = new FormData();

    data.append("archivo",file);

    data.append("tipo",tipo);

    data.append("campo",campo);

    data.append("gatillador",gatillador);

    var url = "<?=BASEURL;?>upload.php";

    $.ajax({

        url:url,
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        async: true,
        cache:false,
        success: function(respuesta) {

            $(".boton_subida").html("Subir Archivo");

            $("#" + html_reemplazo + "_msg").html(respuesta);
            $("#" + html_reemplazo + "_msg").show();

            $("#" + html_reemplazo + "_msg .subir_otro").attr("onclick","subir_otro('" + html_reemplazo + "'); $('.boton_subida').html('Subir Archivo');");
            
            $("#" + html_reemplazo).hide();

        } // FIN SUCCESS

    });

}

// Subir archivos mediante AJAX
function uploadFile_Multiple(campo,tipo,file_field,html_reemplazo){

    /*
        Variantes para var tipo
        1   => Imagenes (.JPG,.PNG,.GIF)
        2   => PDF (.PDF)
    */

    var inputFileImage = document.getElementById("" + file_field);

    var file = inputFileImage.files[0];

    var data = new FormData();

    data.append("archivo",file);

    data.append("tipo",tipo);

    data.append("campo",campo);

    var url = "<?=BASEURL;?>uploadMultiple.php";

    $.ajax({

        url:url,
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        async: true,
        cache:false,
        success: function(respuesta) {

            $(".boton_subida_mul").html("Subir Archivo");

            $("#" + html_reemplazo + "_msg").html(respuesta);
            $("#" + html_reemplazo + "_msg").show();

            $("#" + html_reemplazo + "_msg .subir_otro").attr("onclick","subir_otro('" + html_reemplazo + "');  $('.boton_subida_mul').html('Subir Archivo');");

            $("#" + html_reemplazo).hide();

        } // FIN SUCCESS

    });

}

function subir_otro(id_formulario)
{    
    $("#" + id_formulario + "_msg").hide();
    $("#" + id_formulario).show();
}

function usar_archivo(campo,archivo)
{
    $("#" + campo).val('' + archivo);
}

function usar_archivo_multi(campo,archivo)
{
    var archivos_actuales   = $("#" + campo).val();

    $("#" + campo).val(archivos_actuales + ',' + archivo);

    load_multiple(archivos_actuales + ',' + archivo,campo);
}

function load_multiple(imagenes,campo)
{
    <?php 
        $thumb      = str_replace("/cph_admin", "", BASEURL)."uploads/thumbs/";
    ?>
    // Campos
    var campos    = "imagenes=" + imagenes + "&campo=" + campo + "&ruta=<?=$thumb;?>";

    // Llamar al AJAX
    var myajax    = call_ajax("GET","<?=BASEURL;?>get_imgs.php",campos,"");

    $("#img_" + campo).html(myajax);
}

function remove_me(imagen,campo)
{
    var archivos_actuales   = $("#" + campo).val();

    nuevos_archivos         = archivos_actuales.replace("," + imagen, "");

    $("#" + campo).val(nuevos_archivos);

    load_multiple(nuevos_archivos,campo);
}

/* CARGAR REPOSITORIO SIMPLE */
function cargar_repositorio(identificador)
{
    var tipo    = $("#" + identificador + "_rep #tipo").val();
    var name_id = $("#" + identificador + "_rep #name_id").val();

    if(tipo == 1)
    {
        // Cargar todo
        cargar_pag_repositorio(identificador,1,'imagenes','front',name_id);
        cargar_pag_repositorio(identificador,1,'documentos','back',name_id);
        cargar_pag_repositorio(identificador,1,'mdv_videos','back',name_id);
    }else if(tipo == 2){
        // Sólo imágenes
        cargar_pag_repositorio(identificador,1,'imagenes','front',name_id);
    }else if(tipo == 3){
        // Sólo videos
        cargar_pag_repositorio(identificador,1,'mdv_videos','front',name_id);
    }else if(tipo == 4){
        // Sólo documentos
        cargar_pag_repositorio(identificador,1,'documentos','front',name_id);
    }

}

function cargar_pag_repositorio(identificador,pagina,item,modo,name_id)
{

    var campos    = "pagina=" + pagina + "&item=" + item + "&identificador=" + identificador + "&name_id=" + name_id;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/directorio.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #directorio").html(response);
                        $("#" + identificador + "_rep #cargando").hide();
                        $("#" + identificador + "_rep #cargando").removeClass('active');
                        $('.tip').tooltip();
                    });

}

/* Funciones de Carpeta */

function formulario_carpeta(identificador,ubicacion)
{
    /*
        NOTA: Si la variable ubicación es igual a 0 (CERO), significa que el usuario se encuentra 
        en la raíz del directorio.
        Al cargar una nueva carpeta, este valor debe cambiar.

        El atributo FOLDER_PARENT indica al código en donde se debe crear la nueva carpeta
        0 => Raíz
        n => Como subcarpeta
    */
    var campos    = "modo=form&identificador=" + identificador + "&folder_parent=" + ubicacion;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/carpetas.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #preview_archivo").html(response);
                        $("#" + identificador + "_rep #use_file").fadeOut('fast');
                    });
}

function crear_carpeta(identificador)
{

    var folder_name     = $("#" + identificador + "_rep #folder_name").val();
    var folder_parent   = $("#" + identificador + "_rep #folder_parent").val();

    if(folder_name == "")
    {
        $("#" + identificador + "_rep #folder_name").val("");
        $("#" + identificador + "_rep #folder_name").attr("placeholder","Escribe un nombre para la Carpeta");
        return false;
    }else{
        var campos          = "modo=create&identificador=" + identificador + "&nombre=" + folder_name + "&padre=" + folder_parent;

        sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/carpetas.php",campos,
                        function(response) 
                        {
                            if(response == 1)
                            {
                                $("#" + identificador + "_rep #folder_name").val("");
                                $("#" + identificador + "_rep #folder_name").attr("placeholder","Esta carpeta ya existe");
                                return false;
                            }else{
                                $("#" + identificador + "_rep #preview_archivo").html(response);
                                abrir_carpeta(folder_parent,identificador);
                            }
                        });
    }
}

function abrir_carpeta(id,identificador)
{
    var campos    = "modo=open&id=" + id + "&identificador=" + identificador;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/carpetas.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #link_form_carpeta").attr("onclick","formulario_carpeta('" + identificador + "'," + id + ")");
                        $("#" + identificador + "_rep #link_form_archivo").attr("onclick","formulario_archivo('" + identificador + "'," + id + ")");
                        $("#" + identificador + "_rep #listado_archivos").html(response);
                    });
}

/* Funciones de Archivo */

function formulario_archivo(identificador,ubicacion)
{
    /*
        NOTA: Si la variable ubicación es igual a 0 (CERO), significa que el usuario se encuentra 
        en la raíz del directorio.
        Al cargar una nueva carpeta, este valor cambia.

        El atributo FOLDER_PARENT indica al código en qué carpeta debe guardarse el nuevo archivo
        0 => Raíz
        n => Como subcarpeta
    */
    var campos    = "modo=form&identificador=" + identificador + "&folder_parent=" + ubicacion;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/archivos.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #preview_archivo").html(response);
                        $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
                        $("#" + identificador + "_rep #use_file").fadeOut('fast');
                    });
}

function eliminar_archivo_form(identificador,archivo)
{
    var campos    = "modo=eliminar_form&identificador=" + identificador + "&file=" + archivo;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/archivos.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #preview_archivo").html(response);
                        $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
                        $("#" + identificador + "_rep #use_file").fadeOut('fast');
                    });
}

function cancelar_eliminacion(identificador)
{
    $("#" + identificador + "_rep #preview_archivo").html('');
}

function eliminar_archivo(identificador,archivo)
{
    var campos    = "modo=eliminar&identificador=" + identificador + "&file=" + archivo;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/archivos.php",campos,
                    function(response) 
                    {
                        abrir_carpeta(response,identificador);

                        var txt     = ' <div class="span12" style="padding:5px;"><h4>Eliminación de Archivo</h4><br />';
                        txt         = txt + '<div class="alert alert-success alert-block span11" style="margin-left:0px;">';
                        txt         = txt + '<i class="icon-ok"></i>&nbsp;<b>Archivo eliminado</b><br />';
                        txt         = txt + 'El archivo seleccionado se ha eliminado correctamente del servidor.</div></div>';

                        $("#" + identificador + "_rep #preview_archivo").html(txt);
                    });
}

// Subir archivos mediante AJAX

function subir_archivo(identificador){

    var inputFileImage  = $("#" + identificador + "_rep #file_name")[0];

    var file            = inputFileImage.files[0];

    var data            = new FormData();
    var file_parent     = $("#" + identificador + "_rep #file_parent").val();

    data.append("archivo",file);
    data.append("file_parent",file_parent);
    data.append("identificador",identificador);

    var url = "<?=BASEURL;?>funciones/repositorio/subir.php";

    $("#" + identificador + "_rep #fileform").hide();
    $("#" + identificador + "_rep #fileload").fadeIn();

    $.ajax({

        url:url,
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        async: true,
        cache:false,
        success: function(respuesta) {

            // Abrir Carpeta
            abrir_carpeta(file_parent,identificador);

            $("#" + identificador + "_rep #preview_archivo").html(respuesta);

        } // FIN SUCCESS

    });

}

// Abrir archivo

function abrir_archivo(id,identificador)
{
    var campos    = "id=" + id + "&identificador=" + identificador;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/abrir_archivo.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #preview_archivo").html(response);                        
                        $("#" + identificador + "_rep .filerow td").css("background-color","");
                        $("#" + identificador + "_rep #file_" + id + " td").css("background-color","#d9edf7");
                        $("#" + identificador + "_rep #selected_file").val(id);
                        $("#" + identificador + "_rep #use_file").fadeIn('fast');
                    });
}

// Seleccionar archivo
function seleccionar_archivo(campo,identificador)
{
    var id              = $("#" + identificador + "_rep #selected_file").val();
    var nombre_archivo  = $("#" + identificador + "_rep #file_" + id + " .filename").html();

    $("#" + campo).val(nombre_archivo);
}

/* CARGAR REPOSITORIO MULTIPLE */
function cargar_multi_repositorio(identificador)
{
    var tipo    = $("#" + identificador + "_rep #tipo").val();
    var name_id = $("#" + identificador + "_rep #name_id").val();

    cargar_pag_multi_repositorio(identificador,1,'imagenes','front',name_id);
}

function cargar_pag_multi_repositorio(identificador,pagina,item,modo,name_id)
{
    if(modo == "front")
    {
        $("#" + identificador + "_rep .tab-pane").addClass('hide');
        $("#" + identificador + "_rep #cargando").addClass('active');
    }

    var campos    = "pagina=" + pagina + "&item=" + item + "&identificador=" + identificador + "&name_id=" + name_id;

    sync_ajax("POST","<?=BASEURL;?>funciones/repositorio/directorio.php",campos,
                    function(response) 
                    {
                        $("#" + identificador + "_rep #directorio").html(response);
                        $("#" + identificador + "_rep #cargando").hide();
                        $("#" + identificador + "_rep #cargando").removeClass('active');
                        $('.tip').tooltip();
                    });
}

// Seleccionar archivo
function seleccionar_multi_archivo(campo,identificador)
{
    var id              = $("#" + identificador + "_rep #selected_file").val();
    var nombre_archivo  = $("#" + identificador + "_rep #file_" + id + " .filename").html();

    var archivos_actuales   = $("#" + campo).val();

    $("#" + campo).val(archivos_actuales + ',' + nombre_archivo);

    load_multiple(archivos_actuales + ',' + nombre_archivo,campo);
}

/* BORRAR IMAGEN DESDE EL REPOSITORIO */
function remove_file(archivo,id)
{
    // Campos
    var campos    = "archivo=" + archivo;

    // Llamar al AJAX
    var myajax    = call_ajax("POST","<?=BASEURL;?>borrar_archivo.php",campos,"");

    $("#" + id).hide();

}

/* Grabar datos */

function save(objeto)
{
  // Campos
  var campos    = get_fields("#" + objeto);

  sync_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_" + objeto + ".php",campos,
            function(response) 
            {
                if(isNaN(response))
                {
                    $("#printhere").addClass("nopadding");
                    $("#printhere").html(response);
                }else{
                    print_error(response);
                }

            });

}

/* Mensajes de Información */

function print_error(iderror)
{
    $(".sys_err").hide();
    $("#err_" + iderror).fadeIn();
}

/* Eliminar datos */

function confirm_borrar(objeto,id)
{
  $("#btn-borrar").attr("onclick","borrar('"+objeto+"',"+id+")");
}

function borrar(objeto,id)
{
  // Campos
  var campos    = "id="+id+"&modo=borrar";

  sync_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_" + objeto + ".php",campos,
            function(response) 
            {
                $("#row_" + id).fadeOut();

            });

}

/* Activar o Inactivar objetos */
function activar(objeto,id,elemento,icono)
{
  // Campos
  var campos    = "id="+id+"&modo=activar";

  // Llamar al AJAX
  sync_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_" + objeto + ".php",campos,
            function(response) 
            {
            	// Do NAH
            });

  if(typeof icono == 'undefined')
  {
    $("#act-" + id).addClass("hide");
    $("#desact-" + id).removeClass("hide");
  }else{
    $("#" + icono + "-" + id).addClass("hide");
    $("#des-" + icono + "-" + id).removeClass("hide");
  }

  if(typeof elemento == 'undefined')
  {
    $("#row_" + id).removeClass("alert-error");
    $("#row_" + id + " td").css("color","");
    $("#row_" + id + " td").css("background-color","");
  }else{
    $("#" + elemento + "_" + id).removeClass("alert-error");
    $("#" + elemento + "_" + id + " td").css("color","");
    $("#" + elemento + "_" + id + " td").css("background-color","");
  }

}

function desactivar(objeto,id,elemento,icono)
{
  // Campos
  var campos    = "id="+id+"&modo=desactivar";

  // Llamar al AJAX  
  sync_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_" + objeto + ".php",campos,
            function(response) 
            {
            	// Do NAH
            });

  if(typeof elemento == 'undefined')
  {
    $("#row_" + id).addClass("alert-error");
    $("#row_" + id + " td").css("color","#b94a48");
    $("#row_" + id + " td").css("background-color","#f2dede");
  }else{
    $("#" + elemento + "_" + id).addClass("alert-error");
    $("#" + elemento + "_" + id + " td").css("color","#b94a48");
    $("#" + elemento + "_" + id + " td").css("background-color","#f2dede");
  }

  if(typeof icono == 'undefined')
  {
    $("#act-" + id).removeClass("hide");
    $("#desact-" + id).addClass("hide");
  }else{
    $("#" + icono + "-" + id).removeClass("hide");
    $("#des-" + icono + "-" + id).addClass("hide");
  }

}

/* Acción */
function accion(objeto,id,modo)
{
  // Campos
  var campos    = "id=" + id + "&modo=" + modo;

  sync_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/save_" + objeto + ".php",campos, 
           function(response) 
           {
              if(response == "pinta")
              {
                  $("#" + modo + "-" + id).css("color","#b94a48");
              }else{
                  $("#" + modo + "-" + id).css("color","#666");
              }
           });

}

// FORMATEAR CON SEPARADOR DE MILES
function format_num(identificador)
{

    $('' + identificador).blur(function() 
      {
        var num     = $(this).val();
        var validador   = num.toString().replace(",","");
        var validador   = validador.toString().replace("-","");
        var validador   = validador.split(".").join("");
        
        if(!isNaN(validador))
        {
            num = num.toString().replace(".","");
            num = num.toString().replace(".","");
            num = num.toString().replace(".","");
            num = num.toString().replace(".","");
            num = num.toString().replace(".","");
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
          num = num.split('').reverse().join('').replace(/^[\.]/,'');
            $(this).val(num);
        }

    });

};

// FORMATEAR CON SEPARADOR DE MILES
function format_keyup(identificador){
  
    $('' + identificador).bind('keyup', function() {
        
        if (window.event.keyCode != 39 && window.event.keyCode != 37)
        {
            var num = $(this).val();
            var validador = num.toString().replace(",","");
            var validador = validador.toString().replace("-","");
            var validador = validador.split(".").join("");
            
            if(!isNaN(validador)){
                num = num.toString().replace(".","");
                num = num.toString().replace(".","");
                num = num.toString().replace(".","");
                num = num.toString().replace(".","");
                num = num.toString().replace(".","");
                num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                num = num.split('').reverse().join('').replace(/^[\.]/,'');
                $(this).val(num);

            }else{

                $(this).val('');
                
            }
        }
    });
};

function limpia_letras(identificador)
{

    $('#' + identificador).bind('keyup', function() 
    {

        if (window.event.keyCode != 39 && window.event.keyCode != 37)
        {
            var num         = $('#' + identificador).val();            
            num             = num.toString().replace(",",".");

            if(!isNaN(num))
            {                
                $('#' + identificador).val(num);
            }else{
                $('#' + identificador).val('');
            }
        }
    });

}

// Selector
function change_something(selector,sel_impresion,archivo){
    
  // Obtener el codigo
  var elemento  = $("#" + selector).val();
    
  if(elemento != 0)
  {
    campos    = 'id=' + elemento;

    var theajax = call_ajax("POST","<?=BASEURL;?>modulos/<?=$modulo;?>/" + archivo + ".php",campos,"");

    $("#" + sel_impresion).html(theajax);
      
  }else{
    $("#" + sel_impresion).html("");  
  }
  
}

function cargar_ayuda(item)
{

    var campos    = "item=" + item;

    sync_ajax("POST","<?=BASEURL;?>ayuda.php",campos,
                    function(response) 
                    {
                        $("#content_help").html(response);
                    });

}

function despliega_items(menu)
{

    var campos    = "menu=" + menu;

    sync_ajax("POST","<?=BASEURL;?>ayuda.php",campos,
                    function(response) 
                    {                        
                        $("#texto_ayuda").html(response);
                        $(".tema").removeClass("tema_activo");
                        $("#tema_" + menu).addClass("tema_activo");
                    });

}

function despliega_ayuda(item)
{

    var campos    = "item_ayuda=" + item;

    sync_ajax("POST","<?=BASEURL;?>ayuda.php",campos,
                    function(response) 
                    {                        
                        $("#texto_ayuda").html(response);
                    });

}

</script>