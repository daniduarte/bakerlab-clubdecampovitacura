<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>" class="tip-bottom">Usuarios</a> 
      <a href="<?=$mod_root;?>edit_usuario/<?=$query;?>" class="current">Editar Usuario</a> 
    </div>
    <h1>Editar Usuario</h1>
</div>

<?php 
    $objeto   = mysql_fetch_assoc(Datos("mdv_usuarios","id = ".$query,"*"));
?>

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

                      <input type="hidden" name="modo" value="edit" />
                      <input type="hidden" name="id" value="<?=$query;?>" />
                      <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                      <div class="control-group">
                          <label class="control-label">Nombre</label>
                          <div class="controls">
                              <input type="text" name="nombre" id="nombre" class="span4"
                                  value="<?=d($objeto['nombre']);?>">
                          </div>
                      </div>
                    
                      <div class="control-group">
                          <label class="control-label">E-mail</label>
                          <div class="controls">
                              <input type="text" name="email" id="email" class="span4"
                                  value="<?=d($objeto['email']);?>">
                          </div>
                      </div>
                    
                      <div class="control-group">
                          <label class="control-label">Nick</label>
                          <div class="controls">
                              <input type="text" name="nick" id="nick" class="span4"
                                  value="<?=d($objeto['usuario']);?>">
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

                      <div class="form-actions">
                          <input type="submit" value="Guardar" class="btn btn-success">
                          &nbsp;&nbsp;
                          <a href="<?=$mod_root;?>" class="btn btn-danger">Cancelar</a>
                      </div>

                  </form>

              </div>
       		</div>

        </div>
    </div>
</div>