<div id="content-header">
  	<div id="breadcrumb">
	  	<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>unidades">Unidades</a>
        <a href="<?=$mod_root;?>tipologias" class="current">Tipologías</a>
    </div>
  	<h1>Tipologías</h1>
</div>

<?php

    $me             = "index.php?load=".$modulo."/index";

    $objects        = Datos("tipologias","1 order by id DESC","*");

    if(mysql_num_rows($objects) > 0)
    {

        $active_page    = (isset($_GET['p']))? $_GET['p'] : '' ;

        $paginador      = paginate(mysql_num_rows($objects),30,$active_page,$me);

        $objects        = Datos("tipologias",
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
                    <h5>Tipologías</h5>
                </div>
                
                <div class="widget-content nopadding">
	                <form action="#" class="form-horizontal">
	                    <div class="form-actions">
	                        <a href="<?=$mod_root;?>new_tipologia" class="btn btn-success">+ Crear nueva Tipología</a>
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
                                <th>Tipología</th>                         
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
                                    <td <?=$inac;?>><?=d($obj['tipologia']);?></td>

                                    <td class="center" <?=$center?>>
	                                    <?php 
		                                    if($obj['id'] != 1)
		                                    {
	                                    ?>
	                                    <a class="tip" href="<?=$mod_root;?>edit_tipologia/<?=$obj['id'];?>" title="Editar">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        &nbsp;
                                        <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                            onclick="confirm_borrar('tipologia',<?=$obj['id'];?>);">
                                            <i class="icon-remove"></i>
                                        </a>
                                        <?php 
	                                       	}
                                        ?>
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
                                        <?='<h5>Aún no se han ingresado tipologías a la plataforma.</h5>';?>
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
