    <?php 
        $usr    = $_SESSION['USR']['NICK'];
        $me     = Datos_u("mdv_usuarios","usuario = '$usr'","*");
    ?>
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="<?=$mod_root;?>" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        </div>
        <h1>Bienvenido</h1>
    </div>
    <!--End-breadcrumbs-->

    <style type="text/css">
        .deseo
        {
            color:#EEE;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            cursor: pointer;
        }

        .deseo i
        {
            font-size: 28px;
            line-height: 40px;
            color:#FFF;
        }

        .deseo b
        {
            font-size: 16px;
            line-height: 20px;
            color:#FFF;
        }
    </style>

    <div class="container-fluid" >
    <hr>

        <h4 style="font-weight:normal; margin-bottom:30px;">
            ¿Qué deseas hacer a continuación, <?=primer_nombre();?>?
        </h4>

        <div class="row-fluid" style="">

            <div class="deseo bg_lg span3" onclick="document.location.href='<?=BASEURL;?>contacto'">
                <i class="icon-envelope"></i>
                <br />
                <b>Contacto</b><br />
                Ver Mensajes de<br>Contacto del sitio Web
                <br />
            </div>
            
            <!--<div class="deseo bg_lg span3" onclick="document.location.href='<?=BASEURL;?>unidades'">
                <i class="icon-building"></i>
                <br />
                <b>Unidades</b><br />
                Administrar Unidades<br>disponibles
                <br />
            </div>    -->        
            
        </div>
        
    </div>