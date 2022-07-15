<?php 
    require_once("functions.php");
    define("BASEURL","http://clubdecampovitacura.cl/mdv/");
?>
<!DOCTYPE html>
<html lang="es">    
<head>
    <title><?=web_title();?></title>
    
    <?=call_head("login");?>

</head>
<body>
    <div id="loginbox">            
        <form id="loginform" class="form-vertical" action="index.php" autocomplete="off">
			<div class="control-group normal_text">
                <h3>
                    <?=logotype("250","","","MDV Admin");?>
                </h3>
            </div>

            <p class="normal_text" id="err_mss" style="display:none;">
                Completa ambos campos para ingresar
            </p>

            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">

                        <span class="add-on bg_lg">
                            <i class="icon-user"></i>
                        </span>
                        <input type="text" name="user" id="user" placeholder="Usuario" />

                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">

                        <span class="add-on bg_ly">
                            <i class="icon-lock"></i>
                        </span>
                        <input type="password" name="pass" id="pass" placeholder="Contraseña" />

                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left">
                    <a href="#" class="flip-link btn btn-info" id="to-recover">Recuperar Contraseña</a>
                </span>
                <span class="pull-right">
                    <a type="submit" href="#" onclick="trytolog();" class="btn btn-success" /> Ingreso</a>
                </span>

            </div>
        </form>

        <form id="recoverform" action="#" class="form-vertical">

            <p class="normal_text" id="err_rec" >
                Ingrese su e-mail para enviar las instrucciones de recuperación de contraseña
            </p>
            
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo">
                            <i class="icon-envelope"></i></span>
                            <input type="text" name="email" id="email" placeholder="Dirección de e-mail o Usuario" />
                    </div>
                </div>
           
            <div class="form-actions">
                <span class="pull-left">
                    <a href="#" class="flip-link btn btn-success" id="to-login">
                        &laquo; Ingresar
                    </a></span>
                <span class="pull-right">
                    <a class="btn btn-info" onclick="trytorecover();">Recuperar</a>
                </span>
            </div>
        </form>
    </div>

    <?php
        require_once("js.php");
        require_once("modulos/login/js.php");
    ?>
</body>

</html>
