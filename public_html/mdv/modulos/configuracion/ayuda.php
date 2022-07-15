<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>ayuda" class="tip-bottom">Configuración</a>   
        <a href="<?=$mod_root;?>ayuda" class="current">Ayuda</a>
    </div>
  	<h1>Ayuda</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">

                <div class="widget-title">
                    <ul class="nav nav-tabs">

                        <li <?=($query == "")? 'class="active"' : '' ;?>>
                            <a data-toggle="tab" href="#inicio_banners">Temas</a>
                        </li>

                        <?php 
                            // Grupos
                            $grupos  = Datos("mdv_help_temas","1 order by orden ASC","*");

                            while($s = mysql_fetch_assoc($grupos))
                            {
                        ?>
                                <li <?=($s['id'] == $query)? 'class="active"' : '' ;?>>
                                    <a data-toggle="tab" href="#tab_<?=$s['id'];?>">
                                        <?=substr(d($s['nombre']),0,5);?>...
                                    </a>
                                </li>
                        <?php
                            }
                        ?>

                    </ul>
                </div>

                <div class="widget-content tab-content">
                      <?php 
                          // Secciones
                          $contenido  = Datos("mdv_menues","tipo = 5 order by orden ASC","*");

                      ?>
                          <div id="inicio_banners" class="tab-pane <?=($query == '')? 'active' : '' ;?>">

                                <div class="bs-docs-example">
                                    <h4>Temas</h4>
                                </div>

                                <table id="tabla_temas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tema</th>
                                            <th width="10%">Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        // Obtener contenidos
                                        $objects  = Datos("mdv_help_temas","1 order by orden ASC","*");

                                        while($o = mysql_fetch_assoc($objects))
                                        {

                                            // Inactivo
                                            $inac   = ($o['estado'] == 1)? 'style="color:#b94a48; background-color:#f2dede;"':'';
                                            $center = ($inac != "")? substr($inac, 0, -1).'; text-align:center"': 'style="text-align:center;"';

                                    ?>
                                            <tr class="odd gradeX" id="row_<?=$o['id'];?>">
                                                <td <?=$inac;?>><?=d($o['nombre']);?></td>
                                                <td <?=$center;?> class="center">
                                                    <div class="pull-right">

                                                        <a class="tip <?=($o['estado'] == 1)? '':'hide';?>" 
                                                            href="#" id="act-<?=$o['id'];?>"
                                                            onclick="activar('tema',<?=$o['id'];?>);return false;" 
                                                            title="Activar">
                                                            <i class="icon-ok"></i>
                                                        </a>
                                                        <a class="tip <?=($o['estado'] == 1)? 'hide':'';?>" href="#"  id="desact-<?=$o['id'];?>"
                                                            onclick="desactivar('tema',<?=$o['id'];?>);return false;" 
                                                            title="Desactivar">
                                                            <i class="icon-remove-circle"></i>
                                                        </a>
                                                        &nbsp;&nbsp;
                                                        <a class="tip" href="<?=$mod_root;?>edit_tema/<?=$o['id'];?>" title="Editar">
                                                            <i class="icon-pencil"></i>
                                                        </a>
                                                        &nbsp;&nbsp; 
                                                        <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                                            onclick="confirm_borrar('tema',<?=$o['id'];?>);">
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
                                        <td colspan="3">
                                            <?=(mysql_num_rows($objects) == 0)? '<h5>Aún no se han ingresado Temas</h5>' : '' ;?>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                                          
                                    </tbody>
                                </table>
                            </div>

                        <?php

                            $temas  = Datos("mdv_help_temas","1 order by orden ASC","*");
                            $drags  = "";

                            while($s = mysql_fetch_assoc($temas))
                            {
                                $drags  .= 'itemDrag("#table-'.$s['id'].'");';

                        ?>                          
                            <div id="tab_<?=$s['id'];?>" class="tab-pane <?=($s['id'] == $query)? 'active' : '' ;?>">                              

                                <div class="bs-docs-example">
                                    <h4><?=d($s['nombre']);?></h4>
                                </div>
                              
                                <table id="table-<?=$s['id'];?>" class="table table-bordered table-striped">
                  
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th width="10%">Opciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
                                        // Obtener contenidos
                                        $items  = Datos("mdv_help_items","id_tema = ".$s['id']." order by orden ASC","*");

                                        while($o = mysql_fetch_assoc($items))
                                        {

                                            // Inactivo
                                            $inac   = ($o['estado'] == 1)? 'style="color:#b94a48; background-color:#f2dede;"':'';
                                            $center = ($inac != "")? substr($inac, 0, -1).'; text-align:center"': 'style="text-align:center;"';
                                    ?>
                                              <tr class="odd gradeX" id="rowi_<?=$o['id'];?>">
                                                  <td <?=$inac;?>><?=d($o['nombre']);?></td>

                                                  <td <?=$inac;?> class="center">
                                                      <div class="pull-right">

                                                          <a class="tip <?=($o['estado'] == 1)? '':'hide';?>" 
                                                              href="#" id="i-<?=$o['id'];?>"
                                                              onclick="activar('item',<?=$o['id'];?>,'rowi','i');return false;" 
                                                              title="Activar">
                                                              <i class="icon-ok"></i>
                                                          </a>
                                                          <a class="tip <?=($o['estado'] == 1)? 'hide':'';?>" href="#"  id="des-i-<?=$o['id'];?>"
                                                              onclick="desactivar('item',<?=$o['id'];?>,'rowi','i');return false;" 
                                                              title="Desactivar">
                                                              <i class="icon-remove-circle"></i>
                                                          </a>
                                                          &nbsp;&nbsp;
                                                          <a class="tip" href="<?=$mod_root;?>edit_item/<?=$o['id'];?>" title="Editar">
                                                              <i class="icon-pencil"></i>
                                                          </a>
                                                          &nbsp;&nbsp;
                                                          <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                                              onclick="confirm_borrar('item',<?=$o['id'];?>);">
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
                                        if(mysql_num_rows($items) == 0)
                                        {
                                    ?>                                        
                                        <tr>
                                            <td colspan="4">
                                                <?=(mysql_num_rows($items) == 0)? '<h5>Aún no se han ingresado ítems para éste tema</h5>' : '' ;?>
                                            </td>
                                        </tr>
                                    <?php 
                                        }
                                    ?>
                                                          
                                    </tbody>

                                </table>

                            </div>

                        <?php
                            }
                        ?>

              </div>

                <script type="text/javascript">
                    window.onload = function ()
                    {
                        tableDrag("#tabla_temas");
                        <?=$drags;?>
                    }
                </script>

                <form action="#" class="form-horizontal">
                    <div class="form-actions">
                        <a href="<?=$mod_root;?>new_tema" class="btn btn-success">+ Crear nuevo tema</a>
                        &nbsp;&nbsp;
                        <a href="<?=$mod_root;?>new_item" class="btn btn-info">+ Crear nuevo ítem</a>
                    </div>
                </form>

                <?=modal_delete();?>

            </div>

        </div>
    </div>
</div>