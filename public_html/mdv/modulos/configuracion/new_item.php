<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>ayuda" class="tip-bottom">Configuración</a>   
        <a href="<?=$mod_root;?>ayuda">Ayuda</a>
        <a href="<?=$mod_root;?>new_item" class="current">Crear Item</a>
    </div>
    <h1>Crear Item</h1>
</div>

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

                        <input type="hidden" name="modo" value="nuevo" />
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
                                        <option value="<?=d($s['id']);?>">
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
                                <input type="text" name="nombre" id="nombre" class="span4 required">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Imagen</label>
                            <?=file_field("upload_file",'',"galeria");?>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Epígrafe</label>
                            <div class="controls">
                              <textarea name="epigrafe"
                                  class="span11" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Contenido</label>
                            <div class="controls">
                                <textarea class="required" style="height: 200px !important;" 
                                    name="texto" id="texto"></textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>ayuda" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                    <?=modal_field("upload_file","archivo_imagen","galeria","midiv",2);?>
                    <?=modal_repositorie("upload_file","galeria",2);?>

                </div>
       		</div>

        </div>
    </div>
</div>