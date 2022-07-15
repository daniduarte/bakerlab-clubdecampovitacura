<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>usuarios" class="tip-bottom">Configuración</a>   
      <a href="<?=$mod_root;?>usuarios" class="tip-bottom">Usuarios</a> 
      <a href="<?=$mod_root;?>new_usuario" class="current">Crear Usuario</a> 
    </div>
    <h1>Crear Usuario</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                  <span class="icon"> <i class="icon-align-justify"></i> </span>
                  <h5>Usuario</h5>
              </div>

              <div class="widget-content nopadding" id="printhere">
                  
                  <form class="form-horizontal" method="post" action="#" autocomplete="off" 
                      name="usuario" id="usuario" novalidate="novalidate">

                      <input type="hidden" name="modo" value="nuevo" />
                      <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                      <div class="control-group">
                          <label class="control-label">Nombre</label>
                          <div class="controls">
                              <input type="text" name="nombre" id="nombre" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">E-mail</label>
                          <div class="controls">
                              <input type="text" name="email" id="email" class="span4">
                          </div>
                      </div>
                    
                      <div class="control-group">
                          <label class="control-label">Nick</label>
                          <div class="controls">
                              <input type="text" name="nick" id="nick" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Password</label>
                          <div class="controls">
                              <input type="password" name="password" id="password" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Repite Password</label>
                          <div class="controls">
                              <input type="password" name="r_password" id="r_password" class="span4">
                          </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Acceso a Módulos</label>
                          <div class="controls">
                              <?php 
                                  $modulos    = Datos("mdv_modulos","1 order by position ASC","*");

                                  while($m = mysql_fetch_assoc($modulos))
                                  {
                              ?>
                                      <label>
                                          <input type="checkbox" value="1" name="<?=$m['codigo'];?>" checked />
                                          <?=d($m['nombre']);?>
                                      </label>
                              <?php
                                  }
                              ?>
                          </div>
                      </div>

                      <div class="form-actions">
                          <input type="submit" value="Guardar" class="btn btn-success">
                          &nbsp;&nbsp;
                          <a href="<?=$mod_root;?>usuarios" class="btn btn-danger">Cancelar</a>
                      </div>

                  </form>

              </div>
       		</div>

        </div>
    </div>
</div>