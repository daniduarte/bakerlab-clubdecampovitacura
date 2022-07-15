    
    <a href="#" class="visible-phone"><i class="icon icon-off"></i> Menú de Acceso</a>
    <ul>

    <?php 
        if(is_god())
        {
            // Si es administrador Global, imprima todos los módulos
            $modulos    = Datos("mdv_modulos","stat = 1 order by position ASC","*");

            while($m = mysql_fetch_assoc($modulos))
            {

                if(file_exists("modulos/".$m['codigo']."/submenu.php"))
                {
    ?>
                    <li id="<?=$m['codigo'];?>" class="submenu <?=($modulo == $m['codigo'])? 'open':'';?>"> 
                        <a href="#">
                        <i class="icon <?=$m['icon'];?>"></i> 
                        <span><?=d($m['nombre']);?></span>
                        <?php 
                            require_once("modulos/".$m['codigo']."/submenu.php");
                        ?>
                    </li>
    <?php
                }else{

                    if($m['es_dinamico'] == 1)
                    {
    ?>
                        <li id="<?=$m['codigo'];?>">
                            <a href="<?=BASEURL.'d/'.$m['codigo'];?>">
                                <i class="icon <?=$m['icon'];?>"></i>
                                <span><?=d($m['nombre']);?></span>
                            </a>
                        </li>
    <?php
                    }else{
    ?>
                        <li id="<?=$m['codigo'];?>">
                            <a href="<?=BASEURL.''.$m['codigo'];?>">
                                <i class="icon <?=$m['icon'];?>"></i>
                                <span><?=d($m['nombre']);?></span>
                            </a>
                        </li>
    <?php
                    }
                }

            }

        }else{

            // Lectura de módulos a los que tiene acceso el usuario
            $usr_accesos    = explode(",", $_SESSION['USR']['ACCESOS'] );

            $or_sql         = "";

            for($us = 0; $us < count($usr_accesos); $us++)
            {
                if($us == 0)
                {
                    $or_sql .= " codigo = '".$usr_accesos[$us]."' ";
                }else{
                    $or_sql .= " or codigo = '".$usr_accesos[$us]."' ";
                }
            }

            $modulos        = Datos("mdv_modulos","stat = 1 and (".$or_sql.") order by position ASC","*");

            while($m = mysql_fetch_assoc($modulos))
            {

                if(file_exists("modulos/".$m['codigo']."/submenu.php"))
                {
    ?>
                    <li id="<?=$m['codigo'];?>" class="submenu <?=($modulo == $m['codigo'])? 'open':'';?>"> 
                        <a href="#">
                        <i class="icon <?=$m['icon'];?>"></i> 
                        <span><?=d($m['nombre']);?></span>
                        <?php 
                            require_once("modulos/".$m['codigo']."/submenu.php");
                        ?>
                    </li>
    <?php
                }else{

                    if($m['es_dinamico'] == 1)
                    {
    ?>
                        <li id="<?=$m['codigo'];?>">
                        	<a href="<?=BASEURL.'d/'.$m['codigo'];?>">
                                <i class="icon <?=$m['icon'];?>"></i>
                                <span><?=d($m['nombre']);?></span>
                            </a>
                        </li>
    <?php
                    }else{
    ?>
                        <li id="<?=$m['codigo'];?>">
                            <a href="<?=BASEURL.''.$m['codigo'];?>">
                                <i class="icon <?=$m['icon'];?>"></i>
                                <span><?=d($m['nombre']);?></span>
                            </a>
                        </li>
    <?php
                    }
                }

            }

        }
    ?>

    </ul>