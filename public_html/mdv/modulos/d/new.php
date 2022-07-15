<?php 
    # CONFIGURACIÓN DE MÓDULO DINÁMICO

    // Obtener información del módulo
    $d_modulo   = Datos_u("mdv_modulos","codigo = '".$action."'","*");

?>

<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
  		<a href="<?=$mod_root;?><?=$action;?>" class="tip-bottom"><?=d($d_modulo['nombre']);?></a>      
        <a href="<?=$mod_root;?><?=$action;?>/new" class="current">Crear <?=d($d_modulo['slug']);?></a>
    </div>
  	<h1>Crear <?=d($d_modulo['slug']);?></h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                    <span class="icon"> <i class="<?=$d_modulo['icon'];?>"></i> </span>
                    <h5><?=d($d_modulo['slug']);?></h5>
                </div>

                <div class="widget-content nopadding" id="printhere">
                  
                    <form class="form-horizontal" method="post" action="#" 
                        name="elemento" id="elemento" novalidate="novalidate">

                        <input type="hidden" name="modo" value="nuevo" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />
                        <input type="hidden" name="accion" value="<?=$action;?>" />

                    <?php 
                        // Imprimir campos del módulo
                        $campos     = Datos("mdv_dynamic_fields",
                                            "mdv_modulo = ".$d_modulo['id']." and visible = 0 order by orden ASC","*");

                        // Cadena para ventanas modales
                        $m_print    = "";

                        while($c = mysql_fetch_assoc($campos))
                        {

                            $hp     = ($c['help_block'] != "")? 
                                            '<span class="help-block">'.d($c['help_block']).'</span>':'';

                            switch($c["tipo"])
                            {

                                case "texto":
                    ?>
                                <div class="control-group">
                                    <label class="control-label"><?=d($c['nombre']);?></label>
                                    <div class="controls">
                                        <input type="text" name="<?=$c['slug']?>" id="<?=$c['slug']?>" 
                                            class="span4 <?=($c['requerido'] == 1)?'required':'';?>">
                                        <?=$hp;?>
                                    </div>
                                </div>
                    <?php
                                break;

                                case "imagen":

                                $m_print    .= modal_field("upload_".$c['slug'],"imagen_".$c['slug'],$c['slug'],"midiv_".$c['slug'],2);
                                $m_print    .= modal_repositorie("upload_".$c['slug'],$c['slug'],2);
                    ?>
                                <div class="control-group">
                                    <label class="control-label"><?=d($c['nombre']);?></label>
                                    <?=file_field("upload_".$c['slug'],'',$c['slug']);?>
                                    <?=$hp;?>
                                </div>
                    <?php
                                break;

                                case "video":

                                $m_print    .= modal_field("upload_".$c['slug'],"imagen_".$c['slug'],$c['slug'],"midiv_".$c['slug'],3);
                                $m_print    .= modal_repositorie("upload_".$c['slug'],$c['slug'],3);
                    ?>
                                <div class="control-group">
                                    <label class="control-label"><?=d($c['nombre']);?></label>
                                    <?=file_field("upload_".$c['slug'],'',$c['slug']);?>
                                    <?=$hp;?>
                                </div>
                    <?php
                                break;

                                case "textarea":
                    ?>

                                <div class="control-group">
                                    <label class="control-label"><?=d($c['nombre']);?></label>
                                    <div class="controls">
                                        <textarea name="<?=$c['slug'];?>" rows="4"
                                            class="span6 <?=($c['requerido'] == 1)?'required':'';?>"></textarea>
                                        <?=$hp;?>
                                    </div>
                                </div>

                    <?php
                                break;

                            }
                    
                        }
                    ?>                      

                      <!--<div class="control-group">
                            <label class="control-label">Epígrafe</label>
                            <div class="controls">
                              <textarea name="epigrafe"
                                  class="span11" rows="5"></textarea>
                            </div>
                      </div>

                      <div class="control-group">
                          <label class="control-label">Contenido</label>
                          <div class="controls">
                              <textarea id="redactor" class="required" style="height: 200px !important;" 
                                  name="texto" id="texto"></textarea>
                          </div>
                      </div>-->

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?><?=$action;?>" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                    <?=$m_print;?>

                </div>
       		</div>

        </div>
    </div>
</div>