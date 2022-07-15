<?php 
    // Nombre action
    $action_name    = "Campos";
    $action_item    = substr($action_name, 0, -1);
?>
<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>modulos" class="tip-bottom">Configuración</a>
      <a href="<?=$mod_root;?>modulos" class="tip-bottom">Módulos</a> 
      <a href="<?=$mod_root;?>conf_modulo/<?=$query;?>">Configuración del Módulo</a>
      <a href="<?=$mod_root;?>edit_field/<?=$query;?>" class="current">Editar <?=$action_item;?></a> 
    </div>
    <h1>Editar <?=$action_item;?></h1>
</div>

<?php 
    $o      = mysql_fetch_assoc(Datos("mdv_dynamic_fields","id = ".$query,"*"));
?>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                    <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                    <h5><?=$action_item;?></h5>
                </div>

                <div class="widget-content nopadding" id="printhere">
                  
                    <form class="form-horizontal" method="post" action="#" autocomplete="off" 
                        name="campo" id="campo" novalidate="novalidate">

                        <input type="hidden" name="modo" value="edit" />
                        <input type="hidden" name="id" value="<?=$query;?>" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />
                        <input type="hidden" name="mdv_modulo" value="<?=$o['mdv_modulo'];?>" />

                        <div class="control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                                <input type="text" name="nombre" id="nombre" class="span4 required"
                                    value="<?=d($o['nombre']);?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Help Block</label>
                            <div class="controls">
                                <textarea name="help_block" class="span6" 
                                    rows="3"><?=d($o['help_block'])?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Tipo</label>
                            <div class="controls">
                                <select name="tipo" id="tipo" class="span4">                                  
                                    <option value="texto" <?=($o['tipo'] == 'texto')?'selected':'';?>>
                                        Texto
                                    </option>
                                    <option value="textarea" <?=($o['tipo'] == 'textarea')?'selected':'';?>>
                                        Text Area
                                    </option>
                                    <option value="textarea_html" <?=($o['tipo'] == 'textarea_html')?'selected':'';?>>
                                        Text Area con HTML
                                    </option>
                                    <option value="imagen" <?=($o['tipo'] == 'imagen')?'selected':'';?>>
                                        Imagen Simple
                                    </option>
                                    <option value="multi_imagen" <?=($o['tipo'] == 'multi_imagen')?'selected':'';?>>
                                        Multi Imagen
                                    </option>
                                    <option value="video" <?=($o['tipo'] == 'video')?'selected':'';?>>
                                        Video
                                    </option>
                                </select>
                                <br /><br />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">¿Requerido?</label>
                            <div class="controls">
                                <input type="checkbox" name="requerido" id="requerido" class="span4" value="1"
                                    <?=($o['requerido'] == 1)?'checked':'';?>>
                                Si
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Centrado</label>
                            <div class="controls">
                                <input type="checkbox" name="centrado" id="centrado" class="span4" value="1"
                                    <?=($o['centrado'] == 1)?'checked':'';?>>
                                Si
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Ancho</label>
                            <div class="controls">
                                <select name="ancho" id="ancho" class="span2">
                                    
                                    <option value="0">Sin ancho</option>

                                    <?php 
                                        for($a = 1; $a <= 18; $a++)
                                        {

                                            $n  = $a * 5;
                                    ?>

                                    <option value="<?=$n;?>"
                                        <?=($o['ancho'] == $n)?'selected':'';?>>
                                        <?=$n;?> %
                                    </option>

                                    <?php
                                        }
                                    ?>                                
                                    

                                </select>
                                <br /><br />
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>conf_modulo/<?=$o['mdv_modulo'];?>" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                </div>
       		</div>

        </div>
    </div>
</div>