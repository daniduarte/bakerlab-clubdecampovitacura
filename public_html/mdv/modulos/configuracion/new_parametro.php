<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>parametros" class="tip-bottom">Configuración</a>   
      <a href="<?=$mod_root;?>parametros" class="tip-bottom">Parámetros de Sistema</a> 
      <a href="<?=$mod_root;?>new_parametro" class="current">Crear Parámetro</a> 
    </div>
    <h1>Crear Parámetro</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                  <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>Parámetro</h5>
              </div>

              <div class="widget-content nopadding" id="printhere">
                  
                  <form class="form-horizontal" method="post" action="#" 
                      name="parametro" id="parametro" novalidate="novalidate">

                      <input type="hidden" name="modo" value="nuevo" />
                      <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                      <div class="control-group">
                          <label class="control-label">Grupo</label>
                          <div class="controls">
                              <input type="text" name="grupo" id="grupo" class="span4">
                          </div>
                      </div>
                    
                      <div class="control-group">
                          <label class="control-label">Código</label>
                          <div class="controls">
                              <input type="text" name="codigo" id="codigo" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Nombre</label>
                          <div class="controls">
                              <input type="text" name="nombre" id="nombre" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Descripción</label>
                          <div class="controls">
                              <input type="text" name="descripcion" id="descripcion" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Valor</label>
                          <div class="controls">
                              <textarea name="valor"
                                  class="span8" rows="5" ></textarea>
                          </div>
                      </div>

                      <div class="form-actions">
                          <input type="submit" value="Guardar" class="btn btn-success">
                          &nbsp;&nbsp;
                          <a href="<?=$mod_root;?>parametros" class="btn btn-danger">Cancelar</a>
                      </div>

                  </form>

              </div>
       		</div>

        </div>
    </div>
</div>