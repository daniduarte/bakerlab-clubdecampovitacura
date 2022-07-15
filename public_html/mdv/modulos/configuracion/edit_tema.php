<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>ayuda" class="tip-bottom">Configuración</a>   
        <a href="<?=$mod_root;?>ayuda">Ayuda</a>
        <a href="<?=$mod_root;?>edit_tema/<?=$query;?>" class="current">Editar Tema</a>
    </div>
    <h1>Editar Tema</h1>
</div>

<?php 
    $objeto   = mysql_fetch_assoc(Datos("mdv_help_temas","id = ".$query,"*"));
?>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">
                <div class="widget-title"> 
                    <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                    <h5>Tema</h5>
                </div>

                <div class="widget-content nopadding" id="printhere">
                  
                    <form class="form-horizontal" method="post" action="#" 
                        name="tema" id="tema" novalidate="novalidate">

                        <input type="hidden" name="modo" value="edit" />
                        <input type="hidden" name="id" value="<?=$query;?>" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />

                        <div class="control-group">
                            <label class="control-label">Tema</label>
                            <div class="controls">
                                <input type="text" name="nombre" id="nombre" value="<?=d($objeto['nombre']);?>">
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>ayuda" class="btn btn-danger">
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>