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
      <a href="<?=$mod_root;?>new_field/<?=$query;?>" class="current">Crear <?=$action_item;?></a> 
    </div>
    <h1>Crear <?=$action_item;?></h1>
</div>

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

                        <input type="hidden" name="modo" value="nuevo" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />
                        <input type="hidden" name="mdv_modulo" value="<?=$query;?>" />

                        <div class="control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                                <input type="text" name="nombre" id="nombre" class="span4 required">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Help Block</label>
                            <div class="controls">
                                <textarea name="help_block" class="span6" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Tipo</label>
                            <div class="controls">
                                <select name="tipo" id="tipo" class="span4">                                  
                                    <option value="texto">Texto</option>
                                    <option value="textarea">Text Area</option>
                                    <option value="textarea_html">Text Area con HTML</option>
                                    <option value="imagen">Imagen Simple</option>
                                    <option value="multi_imagen">Multi Imagen</option>
                                    <option value="video">Video</option>
                                </select>
                                <br /><br />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">¿Requerido?</label>
                            <div class="controls">
                                <input type="checkbox" name="requerido" id="requerido" class="span4" value="1">
                                Si
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Slug</label>
                            <div class="controls">
                                <input type="text" name="slug" id="slug" class="span4 required">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Centrado</label>
                            <div class="controls">
                                <input type="checkbox" name="centrado" id="centrado" class="span4" value="1">
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

                                    <option value="<?=$n;?>">
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
                            <a href="<?=$mod_root;?>conf_modulo/<?=$query;?>" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                </div>
       		</div>

        </div>
    </div>
</div>