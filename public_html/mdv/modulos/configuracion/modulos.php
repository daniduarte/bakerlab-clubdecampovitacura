<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>modulos" class="tip-bottom">Configuración</a>   
  		<a href="<?=$mod_root;?>modulos" class="current">Módulos</a> </div>
  	<h1>Módulos</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">

              <div class="widget-title"> 
                  <span class="icon"> <i class="icon-th"></i> </span>
                  <h5>Módulos</h5>
              </div>

              <div class="widget-content">
                  
                  <table id="modulos" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="20%">Módulo</th>
                              <th>Código</th>
                              <th>Icono</th>
                              <th width="10%">Opciones</th>
                          </tr>
                          
                      </thead>

                      <tbody>
                          <?php
                              // Objetos
                              $objects = Datos("mdv_modulos","1 order by position ASC","*");

                              while($o = mysql_fetch_assoc($objects))
                              {
                          ?>
                          
                              <tr class="odd gradeX" id="row_<?=$o['id'];?>">

                                  <td><?=d($o['nombre']);?></td>
                                  <td><?=d($o['codigo']);?></td>
                                  <td><?=d($o['icon']);?></td>

                                  <td class="center">
                                      <div class="pull-right">
                                          
                                        <?php 
                                            if($o['es_dinamico'] == 1)
                                            {
                                        ?>
                                            <a class="tip" href="<?=$mod_root;?>conf_modulo/<?=$o['id'];?>" title="Configurar">
                                                <i class="icon-cogs"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                        <?php
                                            }else{
                                                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                            }
                                        ?>
                                          <a class="tip <?=($o['stat'] == 0)? '':'hide';?>" 
                                              href="#" id="act-<?=$o['id'];?>"
                                              onclick="activar('modulo',<?=$o['id'];?>);return false;" 
                                              title="Activar">
                                              <i class="icon-ok"></i>
                                          </a>
                                          <a class="tip <?=($o['stat'] == 0)? 'hide':'';?>" href="#"  id="desact-<?=$o['id'];?>"
                                              onclick="desactivar('modulo',<?=$o['id'];?>);return false;" 
                                              title="Desactivar">
                                              <i class="icon-remove-circle"></i>
                                          </a>
                                          &nbsp;&nbsp;
                                          <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                              onclick="confirm_borrar('modulo',<?=$o['id'];?>);">
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
                                      <?='<h5>Aún no se hay módulos en el sitio.</h5>';?>
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
                            <a href="<?=$mod_root;?>new_modulo" class="btn btn-success">+ Crear nuevo módulo</a>
                        </div>
                  </form>

              </div>

              <?=modal_delete();?>

          </div>

        </div>
    </div>
</div>