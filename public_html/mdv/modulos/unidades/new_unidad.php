<?php 
    // Nombre action
    $action_name    = "Unidades";
    $action_item    = "Unidad";
?>
<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>" class="tip-bottom"><?=$mod_name;?></a>
      <a href="<?=$mod_root;?>new_unidad" class="current">Crear <?=$action_item;?></a> 
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
                  
                    <form class="form-horizontal" method="post" action="#" 
                        name="unidad" id="unidad" novalidate="novalidate">

                        <?=error_msges();?>

                        <input type="hidden" name="modo" value="nuevo" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                        <?=arma_txt('Unidad','unidad','','span4 required','','');?>
                        
                        <div class="control-group">
                          	<label class="control-label">Tipología</label>
						  	<div class="controls">          
                                <select name="tipologia" class="form-control span4">
	                            <?php 
		                            $tipologias	= Datos("tipologias","1 order by tipologia ASC","*");
		                            
		                            while($ti = mysql_fetch_assoc($tipologias))
		                            {
			                    ?>
			                    	<option value="<?=$ti['id'];?>"><?=d($ti['tipologia']);?></option>
			                    <?php
		                            }
	                            ?>  	
                              	</select>
                              	<br><br>
                          	</div>
                      	</div>
                      	
                      	<?=arma_txt('Privados','habitaciones','','span2','','');?>
                      	<?=arma_txt('Baños','banos','','span2 required','','');?>
                      	
                      	<?=arma_txt('Metraje','metraje','','span2 required','','');?>
                      	
                      	<?=arma_txt('Bodega (UF)','bodega','','span2','','');?>
                      	<?=arma_txt('Estacionamiento (UF)','estacionamiento','','span2','','');?>
                        
                        <!--<div class="control-group">
                          	<label class="control-label">Descripción</label>
						  	<div class="controls">          
                              	<textarea name="descripcion" id="descripcion" 
	                          		class="span4 textarea_editor"></textarea>                
                          	</div>
                      	</div>-->
                      	
                      	<div class="control-group">
                            <label class="control-label">Imagen</label>

                            <?=file_field("upload_file3",$objeto['imagen'],"imagen");?>

                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Esquicio</label>

                            <?=file_field("upload_file4",$objeto['esquicio'],"esquicio");?>

                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>
                    
                    <?=modal_field("upload_file3","archivo_imagen","imagen","midiv3",2);?>
					<?=modal_repositorie("upload_file3","imagen",2);?>
					
					<?=modal_field("upload_file4","archivo_imagen2","imagen","midiv4",2);?>
					<?=modal_repositorie("upload_file4","esquicio",2);?>

                </div>
       		</div>

        </div>
    </div>
</div>