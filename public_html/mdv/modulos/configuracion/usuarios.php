<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>usuarios" class="tip-bottom">Configuración</a>   
  		<a href="<?=$mod_root;?>usuarios" class="current">Usuarios</a> </div>
  	<h1>Usuarios</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">

              <div class="widget-title"> 
                  <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Usuarios</h5>
              </div>

              <div class="widget-content">
                  
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="20%">Nombre</th>
                              <th>Usuario</th>
                              <th>Último Acceso</th>
                              <th>Accesos</th>
                              <th width="8%">Opciones</th>
                          </tr>
                          
                      </thead>

                      <tbody>
                          <?php                               
                              // Obtener objetos
                              $objects  = Datos("mdv_usuarios","usuario <> 'iam'","*");

                              while($o = mysql_fetch_assoc($objects))
                              {
                          ?>
                          
                              <tr class="odd gradeX" id="row_<?=$o['id'];?>">

                                  <td><?=d($o['nombre']);?></td>
                                  <td><?=d($o['usuario']);?></td>
                                  <td><?=d($o['ult_acc']);?></td>
                                  <td><?=d($o['acc_times']);?></td>

                                  <td class="center">
                                      <div class="pull-right">
                                          
                                          <a class="tip" href="<?=$mod_root;?>edit_usuario/<?=$o['id'];?>" title="Editar">
                                              <i class="icon-pencil"></i>
                                          </a>
                                          &nbsp;&nbsp; 
                                          <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                              onclick="confirm_borrar('usuario',<?=$o['id'];?>);">
                                              <i class="icon-remove"></i>
                                          </a>
                                          &nbsp;&nbsp;&nbsp;&nbsp; 
                                      
                                      </div>
                                  </td>
                              
                              </tr>
                          
                          <?php
                              }
                          ?>

                          <?php
                              if(mysql_num_rows($objects) == 0)
                              {
                          ?>
                              
                              <tr>                                  
                                  <td colspan="5">
                                      <?='<h5>Aún no se han creado usuarios en el Sistema</h5>';?>
                                  </td>
                              </tr>

                          <?php 
                              }
                          ?>
                                                          
                      </tbody>
                  </table>

              </div>

              <div class="widget-content nopadding">

                  <form action="#" class="form-horizontal">
                        <div class="form-actions">
                            <a href="<?=$mod_root;?>new_usuario" class="btn btn-success">+ Crear nuevo usuario</a>
                        </div>
                  </form>

              </div>

              <?=modal_delete();?>

          </div>

        </div>
    </div>
</div>