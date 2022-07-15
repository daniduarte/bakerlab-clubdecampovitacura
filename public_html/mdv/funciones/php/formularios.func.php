<?php 
	# Funciones para imprimir campos en formularios
	
	/* Imprimir un campo de archivo */

	function file_field($id_modal,$valor,$name_id)
	{

		$html 	= ' <div class="controls">

                        <div style="float:left">
                            <input type="text" name="'.$name_id.'" id="'.$name_id.'" class="span11"
                                value="'.$valor.'" readonly style="float:left;">                   

                            <span class="help-block" style="float:left; margin-bottom:10px;">
                                <!--<a href="#'.$id_modal.'" data-toggle="modal">Subir Archivo</a>
                                | -->
                                <a href="#'.$id_modal.'_rep" 
                                	onclick="cargar_repositorio('."'".$id_modal."'".');" data-toggle="modal">
                                    <i class="icon-paper-clip"></i>&nbsp;&nbsp;Abrir Repositorio
                                </a>
                            </span>
                        </div>';

        if($valor != "")
        {

            $html   .= '<a class="lightbox_trigger" href="'.UPL_URL.$valor.'">
                            <img src="'.UPL_URL.$valor.'" style="height:60px; margin-left:0px; float:left;" />
                        </a>';
        }

        $html   .= '</div>';

        return $html;

	}
	
	function file_field_mod($id_modal,$valor,$name_id)
	{

		$html 	= ' <div class="controls" style="margin-left:0;">

                        <div style="float:left">
                            <input type="text" name="'.$name_id.'" id="'.$name_id.'" class="span11"
                                value="'.$valor.'" readonly style="float:left;">                   

                            <span class="help-block" style="float:left; margin-bottom:10px;">                                
                                <a href="#'.$id_modal.'_rep" 
                                	onclick="cargar_repositorio('."'".$id_modal."'".');" data-toggle="modal">
                                    <i class="icon-paper-clip"></i>&nbsp;&nbsp;Abrir Repositorio
                                </a>';
        
        if($valor != '')
        {
	        $html 	.= ' | <a href="'.UPL_URL.$valor.'" target="_blank">Ver archivo</a>';
        }
                        
        $html 	.= '        </span>
                        </div>';

        $html   .= '</div>';

        return $html;

	}

	/* Imprimir la ventana Modal para subir archivo */

	function modal_field($id_modal,$file_field,$name_id,$html_reemplazo,$type)
	{
		$html 	= ' <div id="'.$id_modal.'" class="modal hide">

                      <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Subir Archivo</h3>
                      </div>
                      
                      <div class="modal-body">
                          <p>Seleccione un archivo para subir...</p>

                          <form action="#" class="form-horizontal" id="'.$html_reemplazo.'">
                              <div class="control-group">
                                  <label class="control-label">Archivo</label>
                                  
                                  <div class="controls">
                                      <input type="file" name="'.$file_field.'" id="'.$file_field.'" />
                                  </div>                                            
                              </div>

                              <div class="control-group">
                                  <div class="controls">
                                      <a class="btn btn-success boton_subida" href="#" 
                                      		onclick="cambiatexto();uploadFile(';

   		$html 	.= "'".$name_id."',".$type.",'".$file_field."','".$html_reemplazo."'";

        $html 	.=  						');">
                                          	Subir Archivo
                                      </a>
                                  </div>
                              </div>

                          </form>

                          <form action="#" class="form-horizontal" style="display:none" 
                          		id="'.$html_reemplazo.'_msg">

                          </form>

                      </div>

                  </div>';

        return $html;
	}

    /* Imprimir la ventana Modal para repositorio */

    function modal_repositorie($id_modal,$name_id,$type)
    {
        $html   = ' <div id="'.$id_modal.'_rep" class="modal hide" style="width:720px; left:45%;">

                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>Repositorio de Archivos</h3>
                        </div>

                        <input type="hidden" id="tipo" value="'.$type.'" />
                        <input type="hidden" id="name_id" value="'.$name_id.'" />
                        <input type="hidden" id="selected_file" />

                        <div class="modal-body nopadding" style="overflow:hidden;">
                            <div id="directorio" class="span7"></div>
                            <div id="preview_archivo" class="span5"></div>
                        </div>
                        <div class="modal-footer"> 
                            <a data-dismiss="modal" id="use_file" 
                                onclick="seleccionar_archivo('."'".$name_id."'".','."'".$id_modal."'".')"
                                class="btn btn-info hide" href="#">Seleccionar archivo</a> 
                            <a data-dismiss="modal" class="btn" href="#">Cancelar</a> 
                        </div>

                  </div>';

        return $html;
    }

	/* Imprimir un campo de archivo múltiple */

	function file_field_multi($id_modal,$valor,$name_id)
	{

		$thumb 			= str_replace("/cph_admin", "", BASEURL)."uploads/thumbs/";

		$html 	= ' <div class="controls">
                     
                        <span class="help-block" id="img_'.$name_id.'">';

		$html 	.=  	print_preimages($thumb,$valor,$name_id);

		$html 	.= '	</span>


                        <span class="help-block">
                            <!--<a href="#'.$id_modal.'" data-toggle="modal">Subir Archivo</a>
                            | 
                            <a href="#'.$id_modal.'_rep" 
                            	onclick="cargar_multi_repositorio('."'".$id_modal."'".');" data-toggle="modal">Repositorio</a>-->

                            <a href="#'.$id_modal.'_rep" 
                                    onclick="cargar_repositorio('."'".$id_modal."'".');" data-toggle="modal">
                                    <i class="icon-paper-clip"></i>&nbsp;&nbsp;Abrir Repositorio
                            </a>
                        </span>

                        <input type="hidden" name="'.$name_id.'" id="'.$name_id.'" class="span4"
                            value="'.$valor.'" readonly>

                    </div>';

        return $html;

	}

    /* Imprime la vista previa de imágenes para Multi-imagen */

	function print_preimages($ruta,$imagenes,$campo)
	{

		// Retornar imagenes
    
    	$arreglo    = explode(",",$imagenes);

    	$largo      = count($arreglo) - 1;

    	$ruta       = $ruta;

    	$html 		= '<div class="span12">';

    	$ok 		= 0;

	    for($im = 0; $im <= $largo; $im++)
	    {

        	if($arreglo[$im] != "")
        	{
            	$ok     = 1;

	    $html .= '<div style="width:80px; background:#FFF; padding:6px; 
	    					  text-align:center; margin:5px; float:left;">
		            <img src="'.$ruta.$arreglo[$im].'" alt="" style="width:80px;">
		            <br />
		            <a href="#" onclick="remove_me(';

		$html 	.= "'".$arreglo[$im]."','".$campo."'";

		
		$html 	.=  						'); return false;">
						<i class="icon-remove"></i>
		                Eliminar
		            </a>
		        </div>';
        	}
    	}

	    $html 	.= ($ok != 1)? 'Sin imagenes...':'';

	    $html 	.= '</div>';

	    return $html;
	}

	/* Imprimir la ventana Modal para subir archivo múltiple */

	function modal_field_multi($id_modal,$file_field,$name_id,$html_reemplazo,$type)
	{
		$html 	= ' <div id="'.$id_modal.'" class="modal hide">

                      <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Subir Archivo</h3>
                      </div>
                      
                      <div class="modal-body">
                          <p>Seleccione un archivo para subir...</p>

                          <form action="#" class="form-horizontal" id="'.$html_reemplazo.'">
                              <div class="control-group">
                                  <label class="control-label">Archivo</label>
                                  
                                  <div class="controls">
                                      <input type="file" name="'.$file_field.'" id="'.$file_field.'" />
                                  </div>                                            
                              </div>

                              <div class="control-group">
                                  <div class="controls">
                                      <a class="btn btn-success boton_subida_mul" href="#" 
                                      		onclick="cambiatexto();uploadFile_Multiple(';

   		$html 	.= "'".$name_id."',".$type.",'".$file_field."','".$html_reemplazo."'";

        $html 	.=  						');">
                                          	Subir Archivo
                                      </a>
                                  </div>
                              </div>

                          </form>

                          <form action="#" class="form-horizontal" style="display:none" 
                          		id="'.$html_reemplazo.'_msg">

                          </form>

                      </div>

                  </div>';

        return $html;
	}

	/* Imprimir la ventana Modal para repositorio múltiple */

	/*function modal_repositorie_multi($id_modal,$name_id,$type)
	{
		$html 	= ' <div id="'.$id_modal.'_rep" class="modal hide" style="width:720px; left:45%;">

                      <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>Escoger archivo</h3>
                      </div>

                      <input type="hidden" id="tipo" value="'.$type.'" />
                      <input type="hidden" id="name_id" value="'.$name_id.'" />

                      <div class="modal-body nopadding" style="overflow:hidden;">

                      		<div class="widget-title">
                  				<ul class="nav nav-tabs">
                  					<li class="hide tab_imagenes">
			                          	<a data-toggle="tab" href="#imagenes">Imágenes</a>
			                      	</li>
			                      	<li class="hide tab_documentos">
			                          	<a data-toggle="tab" href="#documentos">Documentos</a>
			                      	</li>
			                    </ul>
			                </div>

			                <div class="widget-content tab-content">

			                	<div id="cargando" class="tab-pane active" style="width:50%;margin-left:23%;text-align:center;">
			                		<br />Cargando archivos
			                		<br /><br />
			                		<div class="progress progress-striped active span12">
			                			<div class="bar" style="width: 100%;"></div>
			                		</div>
			                	</div>

			                	<div id="imagenes" class="tab-pane">	        
			                	</div>

			                	<div id="documentos" class="tab-pane">
								</div>

			                </div>				

                      </div>
                      
                      

                  </div>';

        return $html;
	}*/

    /* Imprimir la ventana Modal para repositorio múltiple */

    function modal_multi_repositorie($id_modal,$name_id,$type)
    {
        $html   = ' <div id="'.$id_modal.'_rep" class="modal hide" style="width:720px; left:45%;">

                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>Repositorio de Archivos</h3>
                        </div>

                        <input type="hidden" id="tipo" value="'.$type.'" />
                        <input type="hidden" id="name_id" value="'.$name_id.'" />
                        <input type="hidden" id="selected_file" />

                        <div class="modal-body nopadding" style="overflow:hidden;">
                            <div id="directorio" class="span7"></div>
                            <div id="preview_archivo" class="span5"></div>
                        </div>
                        <div class="modal-footer"> 
                            <a data-dismiss="modal" id="use_file" 
                                onclick="seleccionar_multi_archivo('."'".$name_id."'".','."'".$id_modal."'".')"
                                class="btn btn-info hide" href="#">Seleccionar archivo</a> 
                            <a data-dismiss="modal" class="btn" href="#">Cancelar</a> 
                        </div>

                  </div>';

        return $html;
    }

  /* Impresión de Mensajes de Error en Formularios */

  function error_msges()
  {
        // Campos duplicados
        $html   = ' <div id="err_1" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        Este elemento ya existe en el Sistema. Escoja otro identificador. 
                    </div>';

        $html   .= ' <div id="err_2" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        Seleccione al menos un producto para añadir Stock.
                    </div>';

        $html   .= ' <div id="err_3" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        Ya existe un cliente con ésta dirección de e-mail. Escoja otra.
                    </div>';

        $html   .= ' <div id="err_4" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        Ya existe un usuario con ésta dirección de e-mail. Escoja otra.
                    </div>';

        $html   .= ' <div id="err_5" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        Ya existe un usuario con éste nombre de usuario. Escoja otro.
                    </div>';

        $html   .= ' <div id="err_6" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        El RUT ingresado es incorrecto.
                    </div>';

        $html   .= ' <div id="err_7" class="alert alert-error alert-block sys_err" style="display:none;">
                        <h4 class="alert-heading">Error</h4>
                        Ya existe un cliente con éste RUT. Escoja otro.
                    </div>';

    return $html;
  }

  /* FUNCIONES PARA ARMAR FORMULARIO */

    function arma_txt($titulo,$name,$id,$class,$help,$value)
    {

      $class  = ($class == "")? 'span4':$class;
      $id   = ($id == "")? $name:$id;

      $html   = ' <div class="control-group">
                        <label class="control-label">'.$titulo.'</label>
                        <div class="controls">
                          <input type="text" name="'.$name.'" id="'.$id.'" class="'.$class.'" value="'.$value.'">';

        $html   .= ($help != "")? '<span class="help-block">'.$help.'</span>':'';

        $html   .= '  </div>
              </div>';

        return $html;
    }

    function arma_txt_area($titulo,$name,$id,$class,$help,$value,$rows)
    {

      $class  = ($class == "")? 'span6':$class;
      $id   = ($id == "")? $name:$id;

      $html   = ' <div class="control-group">
                        <label class="control-label">'.$titulo.'</label>
                        <div class="controls">
                          <textarea name="'.$name.'" class="'.$class.'" rows="'.$rows.'" >'.$value.'</textarea>';

    $html   .= ($help != "")? '<span class="help-block">'.$help.'</span>':'';

        $html   .= '  </div>
              </div>';

        return $html;
    }

    function arma_precio($titulo,$name,$id,$class,$divisa,$value)
    {

      $class  = ($class == "")? 'span4':$class;
      $id   = ($id == "")? $name:$id;

      $html   = ' <div class="control-group">
                        <label class="control-label">'.$titulo.'</label>
                        <div class="controls">
                          <div class="input-append">
                          <input type="text" name="'.$name.'" id="'.$id.'" class="'.$class.'" value="'.$value.'">';

        $html   .= ($divisa != "")? '<span class="add-on">'.$divisa.'</span>':'';

        $html   .= '    </div>
                </div>
              </div>';

        return $html;
    }
?>