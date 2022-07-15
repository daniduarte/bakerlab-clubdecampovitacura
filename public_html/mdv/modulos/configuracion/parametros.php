<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>parametros" class="tip-bottom">Configuración</a>   
  		<a href="<?=$mod_root;?>parametros" class="current">Parámetros de Sistema</a> </div>
  	<h1>Parámetros de Sistema</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">

              <div class="widget-title"> 
                  <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Parámetros de Sistema</h5>
              </div>

              <div class="widget-content">
                                    
                          <?php                               
                              // Obtener objetos
                              $grupos       = Datos("mdv_configuracion","1","distinct grupo");

                              while($g = mysql_fetch_assoc($grupos))
                              {

                                  $objects  = Datos("mdv_configuracion","grupo = '".$g['grupo']."'","*");

                          ?>
                                  <div class="bs-docs-example">
                                      <h4><?=d($g['grupo']);?></h4>
                                  </div>

                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th width="20%">Parámetro</th>
                                      <th>Valor</th>
                                      <th>Descripción</th>
                                      <th>Código</th>
                                      <th width="8%">Opciones</th>
                                  </tr>
                                  
                              </thead>

                              <tbody>

                          <?php
                                  while($o = mysql_fetch_assoc($objects))
                                  {
                          ?>
                          
                              <tr class="odd gradeX" id="row_<?=$o['id'];?>">

                                  <td><?=d($o['nombre']);?></td>
                                  <td><?=d($o['valor']);?></td>
                                  <td><?=d($o['descripcion']);?></td>
                                  <td><?=d($o['codigo']);?></td>

                                  <td class="center">
                                      <div class="pull-right">
                                          
                                          <a class="tip" href="<?=$mod_root;?>edit_parametro/<?=$o['id'];?>" title="Editar">
                                              <i class="icon-pencil"></i>
                                          </a>
                                          &nbsp;&nbsp;
                                          <?php 
                                            if(is_god())
                                            {
                                          ?>
                                          <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                              onclick="confirm_borrar('parametro',<?=$o['id'];?>);">
                                              <i class="icon-remove"></i>
                                          </a>
                                          &nbsp;&nbsp;&nbsp;&nbsp; 
                                          <?php 
                                            }
                                          ?>                                      
                                      </div>
                                  </td>
                              
                              </tr>
                          
                          <?php
                                 }
                          ?>                         
                                                          
                              </tbody>
                          </table>
                          
                          <?php
                              }
                          ?>
                          

              </div>

              <?php 
                if(is_god())
                {
              ?>
              <div class="widget-content nopadding">

                  <form action="#" class="form-horizontal">
                        <div class="form-actions">
                            <a href="<?=$mod_root;?>new_parametro" class="btn btn-success">+ Crear nuevo parámetro</a>
                        </div>
                  </form>

              </div>
              <?php 
                }
              ?>

              <?=modal_delete();?>

          </div>

        </div>
    </div>
</div>