<?php 
	/* Ventana modal de eliminación */

	function modal_delete()
	{
		$html 	= '<div id="delete" class="modal hide">

	                  <div class="modal-header">
	                      <button data-dismiss="modal" class="close" type="button">×</button>
	                      <h3>Eliminar</h3>
	                  </div>

	                  <div class="modal-body">
	                      <p>¿Realmente desea eliminar éste elemento?</p>
	                  </div>

	                  <div class="modal-footer"> 
	                      <a data-dismiss="modal" class="btn btn-primary" href="#" id="btn-borrar">Si</a> 
	                      <a data-dismiss="modal" class="btn" href="#">Cancelar</a> 
	                  </div>

	              </div>';

	    return $html;
	}

	/* Ventana modal de ayuda */

	function modal_help()
	{
		$html 	= '<div id="modal_help" class="modal hide" style="width:720px; left:45%;">

	                  	<div class="modal-header">
	                      	<button data-dismiss="modal" class="close" type="button">×</button>
	                      	<h3>MDV Admin | Ayuda</h3>
	                  	</div>

	                  	<div class="modal-body nopadding" id="content_help" style="overflow-y:auto;">
	                      	<p>Cargando ayuda...</p>
	                  	</div>

	                  	<div class="modal-footer" style="text-align:center !important; font-size:11px !important;"> 
	                      	Para otras dudas o mayor soporte, escríbenos a<br />
							<a href="mailto:soporte@multidev.cl">
								<i class="icon icon-envelope"></i>
								&nbsp; 
								soporte@multidev.cl
							</a>
	                    </div>

	              </div>';

	    return $html;
	}

	/* Ventana modal de información */

	function modal_info($id,$titulo,$texto,$ancho)
	{
		$modal_width 	= '';

		if($ancho != 0)
		{
			$modal_width 	= 'style="width:'.$ancho.'px; left:45%;"';
		}

		$html 	= '<div id="'.$id.'" class="modal hide" '.$modal_width.'>

                      <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>'.$titulo.'</h3>
                      </div>

                        <div class="modal-body nopadding" id="'.$id.'_modalcontent">
                            <div id="modalcontent" class="tab-pane active" style="width:50%;margin-left:23%;text-align:center;">
                                    <br />'.$texto.'
                                    <br /><br />
                                    <div class="progress progress-striped active span12">
                                        <div class="bar" style="width: 100%;"></div>
                                    </div>
                            </div>
                        </div>

                </div>';

	    return $html;
	}
?>