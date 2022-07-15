<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>modulos" class="tip-bottom">Configuración</a>   
  		  <a href="<?=$mod_root;?>modulos">Módulos</a>
        <a href="<?=$mod_root;?>conf_modulo/<?=$query;?>" class="current">Configuración del Módulo</a>
    </div>
  	<h1>Configuración del Módulo</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

          <div class="widget-box">

              <div class="widget-title"> 
                  <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                  <h5>Configuración del Módulo</h5>
              </div>

              <div class="widget-content nopadding">

                  <form action="#" class="form-horizontal">
                        <div class="form-actions">
                            <a href="<?=$mod_root;?>new_field/<?=$query;?>" class="btn btn-success">
                                + Crear nuevo campo
                            </a>
                        </div>
                  </form>

              </div>

              <div class="widget-content">
                  
                  <table id="campos" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Nombre</th>
                              <th>Ayuda</th>
                              <th>Tipo</th>
                              <th width="6%;">Requerido</th>
                              <th width="10%;">Slug</th>
                              <th width="10%">Opciones</th>
                          </tr>
                          
                      </thead>

                      <tbody>
                          <?php
                              // Objetos
                              $objects = Datos("mdv_dynamic_fields","mdv_modulo = ".$query." order by orden ASC","*");

                              while($o = mysql_fetch_assoc($objects))
                              {

                                # Página de SISTEMA -> Configurar
                                $inac   = ($o['visible'] == 1)? 'style="color:#b94a48; background-color:#f2dede;"':'';
                                $center = ($inac != "")? substr($inac, 0, -1).'; text-align:center"': 'style="text-align:center;"';
                          ?>
                          
                                <tr class="odd gradeX" id="row_<?=$o['id'];?>">

                                    <td <?=$inac;?>><?=d($o['nombre']);?></td>
                                    <td <?=$inac;?>><?=d($o['help_block']);?></td>
                                    <td <?=$center;?>><?=d($o['tipo']);?></td>
                                    <td <?=$center;?>>
                                        <?=($o['requerido'] == 1)?'Si':'No';?>
                                    </td>
                                    <td <?=$center;?>><?=d($o['slug']);?></td>

                                    <td class="center" <?=$center;?>>
                                            
                                            <a class="tip <?=($o['visible'] == 0)? 'hide':'';?>" 
                                                href="#" id="act-<?=$o['id'];?>"
                                                onclick="activar('campo',<?=$o['id'];?>);return false;" 
                                                title="Activar">
                                                <i class="icon-ok"></i>
                                            </a>
                                            <a class="tip <?=($o['visible'] == 0)? '':'hide';?>" href="#"  id="desact-<?=$o['id'];?>"
                                                onclick="desactivar('campo',<?=$o['id'];?>);return false;" 
                                                title="Desactivar">
                                                <i class="icon-remove-circle"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a class="tip" href="<?=$mod_root;?>edit_field/<?=$o['id'];?>" title="Editar">
                                                <i class="icon-pencil"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                                onclick="confirm_borrar('campo',<?=$o['id'];?>);">
                                                <i class="icon-remove"></i>
                                            </a>
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
                                  <td colspan="6">
                                      <?='<h5>No existen campos dinámicos para éste módulo</h5>';?>
                                  </td>
                              </tr>

                          <?php 
                              }
                          ?>
                                                          
                      </tbody>
                  </table>

              </div>

              <?=modal_delete();?>

          </div>

        </div>
    </div>
</div>