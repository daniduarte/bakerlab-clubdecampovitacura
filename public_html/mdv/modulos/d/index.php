<?php 
    # CONFIGURACIÓN DE MÓDULO DINÁMICO

    // Obtener información del módulo
    $d_modulo   = Datos_u("mdv_modulos","codigo = '".$action."'","*");

    if(strpos($d_modulo['funciones'], "reordenar") !== false)
    {
?>

<script type="text/javascript">
    window.onload = function ()
    {
        tableDrag("#campos_dinamicos","elemento");
    }
</script>

<?php 
    }
?>

<div id="content-header">
  	<div id="breadcrumb"> 
  		<a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
  		<a href="<?=$mod_root;?><?=$action;?>" class="current"><?=d($d_modulo['nombre']);?></a> 
    </div>
  	<h1><?=d($d_modulo['nombre']);?></h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">

                <div class="widget-title"> 
                    <span class="icon"> <i class="<?=$d_modulo['icon'];?>"></i> </span>
                    <h5><?=d($d_modulo['nombre']);?></h5>
                </div>  

                <?php 
                    if(strpos($d_modulo['funciones'], "ingreso") !== false)
                    {
                ?>

                <div class="widget-content nopadding">

                    <form action="#" class="form-horizontal">
                        <div class="form-actions">
                            <a href="<?=$mod_root.$action."/";?>new" class="btn btn-success">
                                + Crear nuev<?=($d_modulo['genero'] == 0)?'a':'o';?> <?=strtolower(d($d_modulo['slug']));?>
                            </a>
                        </div>
                    </form>

                </div>

                <?php
                    }
                ?>

                <div class="widget-content">                    

                    <table id="campos_dinamicos" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <?php 
                                    // Imprimir las columnas dinámicas del módulo
                                    $columns    = Datos("mdv_dynamic_fields",
                                                        "mdv_modulo = ".$d_modulo['id']." and visible = 0 order by orden ASC","*");

                                    $slugs      = "";
                                    $centrados  = "";

                                    while($c = mysql_fetch_assoc($columns))
                                    {

                                        $slugs      .= $c['slug'].',';
                                        $centrados  .= $c['centrado'].',';

                                        $ancho  = ($c['ancho'] != 0)?'width="'.$c['ancho'].'%"':'';
                                ?>

                                    <th <?=$ancho;?>><?=d($c['nombre']);?></th>

                                <?php
                                    }
                                ?>
                                    <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $valores    = Datos("mdv_dynamic_values","modulo = '".$action."' order by orden ASC","*");

                                $slugs      = substr($slugs,0,-1);
                                $centrados  = substr($centrados,0,-1);

                                while($v = mysql_fetch_assoc($valores))
                                {
                                    $fila       = get_dynamic_val($v['valor']);
                                    
                                    $ex_sl      = explode(",", $slugs);
                                    $ex_cen     = explode(",", $centrados);

                                    // Inactivo
                                    $inac   = ($v['estado'] == 1)? 'style="color:#b94a48; background-color:#f2dede;"':'';
                                    $center = ($inac != "")? substr($inac, 0, -1).'; text-align:center"': 'style="text-align:center;"';
                            ?>

                                <tr class="odd gradeX" id="row_<?=$v['id'];?>">

                            <?php
                                    
                                    for($s = 0; $s < count($ex_sl); $s++)
                                    {
                                        $pos    = $ex_sl[$s];
                            ?>
                                    <td <?=($ex_cen[$s] == 1)? $center:$inac;?>>
                                        <?=d($fila[$pos]);?>
                                    </td>
                            <?php
                                    }
                            ?>      
                                    <!-- OPCIONES -->
                                    <td width="10%" <?=$center;?>>
                                        
                                        <?php 
                                            if(strpos($d_modulo['funciones'], "activar") !== false)
                                            {
                                        ?>
                                        <a class="tip <?=($v['estado'] == 1)? '':'hide';?>" 
                                            href="#" id="act-<?=$v['id'];?>"
                                            onclick="activar('elemento',<?=$v['id'];?>);return false;" 
                                            title="Activar">
                                            <i class="icon-ok"></i>
                                        </a>
                                        <a class="tip <?=($v['estado'] == 1)? 'hide':'';?>" href="#"  id="desact-<?=$v['id'];?>"
                                            onclick="desactivar('elemento',<?=$v['id'];?>);return false;" 
                                            title="Desactivar">
                                            <i class="icon-remove-circle"></i>
                                        </a>
                                        &nbsp;&nbsp;   
                                        <?php 
                                            }
                                        ?>

                                        <?php 
                                            if(strpos($d_modulo['funciones'], "edicion") !== false)
                                            {
                                        ?>
                                        <a class="tip" href="<?=$mod_root.$action."/";?>edit/<?=$v['id'];?>" title="Editar">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        &nbsp;&nbsp;   
                                        <?php 
                                            }
                                        ?>

                                        <a class="tip" href="#delete" title="Eliminar" data-toggle="modal"
                                            onclick="confirm_borrar('elemento',<?=$v['id'];?>);">
                                            <i class="icon-remove"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php

                                }
                                
                                if(mysql_num_rows($valores) == 0)
                                {
                            ?>
                                    <tr>
                                        <td colspan="<?=(mysql_num_rows($columns) + 1);?>">
                                            <h5>Aún no se han ingresado registros en éste módulo.</h5>
                                        </td>
                                    </tr>
                            <?php 
                                }
                            ?>
                                                          
                        </tbody>
                    </table>                   

                </div>

              <?=modal_delete();?>

          </div>

        </div>
    </div>
</div>