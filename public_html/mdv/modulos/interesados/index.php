<div id="content-header">
  	<div id="breadcrumb">
	  	<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>" class="current">Mensajes de Contacto (Interesados)</a>
    </div>
  	<h1>Mensajes de Contacto (Interesados)</h1>
</div>

<?php

    $me             = "index.php?load=".$modulo."/index";

    $objects        = Datos("contacto","interesado = 1 order by id DESC","*");

    if(mysql_num_rows($objects) > 0)
    {

        $active_page    = (isset($_GET['p']))? $_GET['p'] : '' ;

        $paginador      = paginate(mysql_num_rows($objects),30,$active_page,$me);

        $objects        = Datos("contacto",
                                "interesado = 1 order by id DESC limit ".$paginador['limitInf'].",".$paginador['tamPag'],
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
                    <h5>Mensajes de Contacto (Interesados)</h5>
                </div>
                
                <div class="widget-content nopadding">


                    <form method="POST" class="form-horizontal">
                        <div class="form-actions">                            
                            <div class="span3">
                                <a href="<?=BASEURL.'modulos/interesados/exportar.php'?>" class="btn btn-success" target="_blank">
                                    <span class="icon"> <i class="icon-folder-open"></i> </span>
                                    Exportar listado
                                </a>
                            </div>
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
                                <th width="9%">Fecha</th>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <!--<th>Apellido</th>-->
                                <th>E-mail</th>
                                <th>Departamento</th>
                                <th>Mensaje</th>                              
                                <th width="8%">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                                while($obj = mysql_fetch_assoc($objects))
                                {

                                    // Inactivo
                                    $inac   = ($obj['spam'] == 1)? 'style="color:#b94a48; background-color:#f2dede;"':'';
                                    $center = ($inac != "")? substr($inac, 0, -1).'; text-align:center"': 'style="text-align:center;"';
                            ?>

                                <tr class="odd gradeX" id="row_<?=$obj['id'];?>">

                                    <td <?=$center?>><?=d($obj['id']);?></td>
                                    <td <?=$inac?>><?=date("d-m-Y H:i",strtotime($obj['fecha']));?></td>
                                    <td <?=$inac;?>><?=($obj['rut']);?></td>
                                    <td <?=$inac;?>><?=($obj['nombre']);?></td>
                                    <!--<td <?=$inac;?>><?=d($obj['apellido']);?></td>-->
                                    <td <?=$inac;?>><?=$obj['email'];?></td>
                                    <td <?=$inac;?>><?=$obj['cotizar'];?></td>
                                    <td <?=$inac;?>><?=($obj['mensaje']);?></td>

                                    <td class="center" <?=$center?>>
                                        <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                            onclick="confirm_borrar('contacto',<?=$obj['id'];?>);">
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
