<?php 
    // Nombre action
    $action_name    = "Tipologías";
    $action_item    = "Tipología";
?>
<div id="content-header">
    <div id="breadcrumb"> 
      <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
      <a href="<?=$mod_root;?>tipologias" class="tip-bottom">Tipologías</a>
      <a href="<?=$mod_root;?>edit_tipologia/<?=$query;?>" class="current">Editar <?=$action_item;?></a> 
    </div>
    <h1>Editar <?=$action_item;?></h1>
</div>

<?php 
	$item	= Datos_u("tipologias","id = '$query'","*");
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
                  
                    <form class="form-horizontal" method="post" action="#" 
                        name="tipologia" id="tipologia" novalidate="novalidate">

                        <?=error_msges();?>

                        <input type="hidden" name="modo" value="edit" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />
                        <input type="hidden" name="id" value="<?=$query;?>" />

                        <?=arma_txt('Tipología','tipologia','','span4 required','',d($item['tipologia']));?>
                       
                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>tipologias" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                </div>
       		</div>

        </div>
    </div>
</div>