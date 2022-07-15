<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>ayuda" class="tip-bottom">Configuración</a>   
        <a href="<?=$mod_root;?>ayuda">Ayuda</a>
        <a href="<?=$mod_root;?>edit_item/<?=$query;?>" class="current">Editar Item</a>
    </div>
    <h1>Editar Item</h1>
</div>

<?php 
    $o   = mysql_fetch_assoc(Datos("mdv_help_items","id = ".$query,"*"));
?>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                    <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                    <h5>Ítem</h5>
                </div>

                <div class="widget-content nopadding" id="printhere">
                  
                    <form class="form-horizontal" method="post" action="#" 
                        name="item" id="item" novalidate="novalidate">

                        <input type="hidden" name="modo" value="edit" />
                        <input type="hidden" name="id" value="<?=$query;?>" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                        <div class="control-group">
                            <label class="control-label">Tema</label>
                            <div class="controls">
                                <select name="tema" id="tema" class="span4">
                                <?php 
                                    // Menues
                                    $menues  = Datos("mdv_help_temas","1 order by orden ASC","*");

                                    while($s = mysql_fetch_assoc($menues))
                                    {
                                ?>
                                        <option value="<?=d($s['id']);?>"
                                            <?=($o['id_tema'] == $s['id'])?'selected':'';?>>
                                            <?=d($s['nombre']);?>
                                        </option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                                <input type="text" name="nombre" id="nombre" class="span4 required"
                                    value="<?=d($o['nombre']);?>">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Epígrafe</label>
                            <div class="controls">
                              <textarea name="epigrafe"
                                  class="span11" rows="5"><?=d($o['epigrafe']);?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Contenido</label>
                            <div class="controls">
                                <textarea class="required" style="height: 200px !important;" 
                                    name="texto" id="texto"><?=d($o['contenido']);?></textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>ayuda" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                </div>
       		</div>

        </div>
    </div>
</div>