<div id="content-header">
  	<div id="breadcrumb">
	  	<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>unidades" class="current">Unidades</a>
    </div>
  	<h1>Unidades</h1>
</div>

<?php

    $me             = "index.php?load=".$modulo."/index";

    $objects        = Datos("unidades","1 order by id DESC","*");

    if(mysql_num_rows($objects) > 0)
    {

        $active_page    = (isset($_GET['p']))? $_GET['p'] : '' ;

        $paginador      = paginate(mysql_num_rows($objects),30,$active_page,$me);

        $objects        = Datos("unidades",
                                "1 order by id DESC limit ".$paginador['limitInf'].",".$paginador['tamPag'],
                                "*");
    }
?>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">

                <div class="widget-title">
                    <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                    <h5>Unidades</h5>
                </div>
                
                <div class="widget-content nopadding">
	                <form action="#" class="form-horizontal">
	                    <div class="form-actions">
	                        <a href="<?=$mod_root;?>new_unidad" class="btn btn-success">+ Crear nueva Unidad</a>
	                    </div>
	                </form>
                </div>

                <div class="widget-content">

                    <?=$paginador['html'];?>
                    <br />

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th width="4%">#</th>
                                <th width="15%">Imagen</th>
                                <th>Unidad</th>
                                <th>Tipología</th>
                                <th>Información</th>                            
                                <th width="8%">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                                while($obj = mysql_fetch_assoc($objects))
                                {

                                    // Inactivo
                                    $inac   = ($obj['estado'] == 1)? 'style="color:#b94a48; background-color:#f2dede;"':'';
                                    $center = ($inac != "")? substr($inac, 0, -1).'; text-align:center"': 'style="text-align:center;"';
                                    
                                    $tipo 	= Datos_u("tipologias","id = '$obj[tipologia]'","tipologia");
                            ?>

                                <tr class="odd gradeX" id="row_<?=$obj['id'];?>">

                                    <td <?=$center?>><?=d($obj['id']);?></td>
                                    <td <?=$inac?>>
                                    	<img src="<?=UPL_URL?><?=$obj['imagen'];?>" style="max-width: 100%;">
                                    </td>
                                    <td <?=$inac;?>><?=d($obj['unidad']);?></td>
                                    <td <?=$inac;?>><?=d($tipo['tipologia']);?></td>
                                    <td <?=$inac;?>>
	                                    <strong>Privados</strong>: <?=d($obj['habitaciones'])?><br>
	                                    <strong>Baños</strong>: <?=d($obj['banos'])?><br>
	                                    <strong>Metraje</strong>: <?=d($obj['metraje'])?> m<sup>2</sup><br>
	                                    <strong>Bodega</strong>: UF <?=d($obj['bodega'])?><br>
	                                    <strong>Estacionamiento</strong>: UF <?=d($obj['estacionamiento'])?>
	                                </td>

                                    <td class="center" <?=$center?>>
	                                    <a class="tip <?=($obj['estado'] == 1)? '':'hide';?>" 
                                          	href="#" id="act-<?=$obj['id'];?>"
											onclick="activar('unidad',<?=$obj['id'];?>);return false;" 
											title="Activar">
											<i class="icon-ok"></i>
                                      	</a>
									  	<a class="tip <?=($obj['estado'] == 1)? 'hide':'';?>" href="#"  id="desact-<?=$obj['id'];?>"
                                          	onclick="desactivar('unidad',<?=$obj['id'];?>);return false;" 
											title="Desactivar">
											<i class="icon-remove-circle"></i>
                                      	</a>
                                      	&nbsp;&nbsp;
	                                    <a class="tip" href="<?=$mod_root;?>edit_unidad/<?=$obj['id'];?>" title="Editar">
                                        	<i class="icon-pencil"></i>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                            onclick="confirm_borrar('unidad',<?=$obj['id'];?>);">
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
                                    <td colspan="7">
                                        <?='<h5>Aún no se han enviado mensajes de contacto al sitio Web.</h5>';?>
                                    </td>
                                </tr>

                            <?php
                                }
                            ?>

                        </tbody>

                    </table>


                    <?=$paginador['html'];?>


                </div>

                <?=modal_delete();?>

            </div>

        </div>
    </div>
</div>
