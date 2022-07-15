<?php 
    require_once("mdv.php");
    // uploadMultiple.php

    $return         = Array('ok'=>TRUE);

    $upload_folder  = '../uploads';

    $nombre_archivo = $_FILES['archivo']['name'];

    $nombre_archivo = str_replace(" ","-",$nombre_archivo);
    $nombre_archivo = str_replace("(","",$nombre_archivo);
    $nombre_archivo = str_replace(")","",$nombre_archivo);

    $tipo_archivo   = $_FILES['archivo']['type'];

    $tamano_archivo = $_FILES['archivo']['size'];

    $tmp_archivo    = $_FILES['archivo']['tmp_name'];

    $archivador     = $upload_folder . '/' . $nombre_archivo;

    $archivador     = str_replace(" ","-",$archivador);

    if (file_exists($archivador)) {

        // Sacamos la extensión del archivo
        $ext = explode(".", $nombre_archivo);

        $ext = strtolower($ext[count($ext) - 1]);

        $nombre_archivo = date("jmYHis")."_".$nombre_archivo;

        $archivador     = $upload_folder . '/' . $nombre_archivo;
        
    }

    // Sacamos la extensión del archivo
    $ext = explode(".", $nombre_archivo);

    $ext = strtolower($ext[count($ext) - 1]);
    if ($ext == "jpeg") $ext = "jpg";


    if (!move_uploaded_file($tmp_archivo, $archivador)) {

        $result     = 0;

    }else{

        if(strrpos($nombre_archivo,".pdf") || strrpos($nombre_archivo,".doc") || strrpos($nombre_archivo,".xls"))
        {
            $tipo_file  = "documento";
        }else if(strrpos($nombre_archivo,".png") || strrpos($nombre_archivo,".jpg") || strrpos($nombre_archivo,".gif")
                 || strrpos($nombre_archivo,".jpeg")){
            $tipo_file  = "imagen";
        }

        $result     = 1;


        // Sacamos la extensión del archivo
        $ext = explode(".", $nombre_archivo);

        $ext = strtolower($ext[count($ext) - 1]);

        if($_POST['tipo'] <= 2) // Usar imagen
        {

            if ($ext == "jpeg" || $ext == "jpg" || $ext == "png" || $ext == "gif")
            {
                // Crear Thumbnail de la imagen (Para repositorio)

                $file_info  = getimagesize($archivador);

                if ($ext == "jpeg") $ext = "jpg";

                // Dependiendo de la extensión llamamos a distintas funciones
                switch ($ext) {
                    case "jpg":
                        $img = imagecreatefromjpeg($archivador);
                    break;
                    
                    case "png":
                        $img = imagecreatefrompng($archivador);
                    break;

                    case "gif":
                        $img = imagecreatefromgif($archivador);
                    break;
                }

                # Creación de miniatura

                // Obtener tamaño de la imagen
                $ancho      = $file_info[0];
                $alto       = $file_info[1];

                if($ancho > $alto)
                {
                    // Imagen Horizontal
                    $nuevo_ancho    = 100;

                    // Calcular alto
                    $nuevo_alto     = ($alto * $nuevo_ancho) / $ancho;

                    $thumb          = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

                }else{
                    // Imagen Vertical o de similares dimensiones
                    $nuevo_alto     = 100;

                    // Calcular ancho
                    $nuevo_ancho    = ($ancho * $nuevo_alto) / $alto;

                    $thumb          = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
                }


                // La redimensionamos
                imagecopyresampled($thumb, $img, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $file_info[0], $file_info[1]);

                // Dependiendo de la extensión llamamos a distintas funciones
                switch ($ext) {
                    case "jpg":
                        // Guardar
                        imagejpeg($thumb, "../uploads/thumbs/".$nombre_archivo, 100);
                    break;
                    
                    case "png":
                        // Guardar
                        imagepng($thumb, "../uploads/thumbs/".$nombre_archivo, 9);
                    break;

                    case "gif":
                        // Guardar
                        imagegif($thumb, "../uploads/thumbs/".$nombre_archivo, 100);
                    break;
                }               

                // Liberar memoria
                imagedestroy($thumb);

            }

        }

    }
?>

<?php
    if ($result == 1) {

        // Insertar registro de documento en BD
        $fecha  = date('Y-m-d H:i:s');

        Insertar("mdv_archivos",
                 "nombre,ext,tipo,fecha_ingreso",
                 "'$nombre_archivo','$ext','$tipo_file','$fecha'");
?>
        <div class="alert alert-success alert-block">
            <h4 class="alert-heading">Archivo subido correctamente</h4>
            El documento seleccionado se ha subido correctamente al servidor.
        </div>

        <div class="control-group">
            <div class="controls">

                <a class="btn btn-success" href="#" data-dismiss="modal"
                    onclick="usar_archivo_multi('<?=$_POST['campo'];?>','<?=$nombre_archivo;?>')">
                        Usar este archivo
                </a>
                &nbsp;&nbsp;
                <a class="btn btn-info subir_otro" href="#">
                        Subir otro archivo
                </a>

            </div>
        </div>
<?php
    }else if($result == 0){
?>

        <div class="alert alert-error alert-block">
            <h4 class="alert-heading">¡Opps!</h4>
            Ha ocurrido un error. Intente nuevamente.
        </div>

        <div class="control-group">
            <div class="controls">

                <a class="btn btn-info subir_otro" href="#">
                    Intentar nuevamente
                </a>

            </div>
        </div>

<?php
    }else if($result == 2){

        if($_POST["tipo"] == 1)
        {
            $txt_tipo   = "imagen.";
        }
?>
        <div class="alert alert-error alert-block">
            <h4 class="alert-heading">¡Opps!</h4>
            Recuerde usar sólo archivos de tipo <?=$txt_tipo;?>
        </div>

        <div class="control-group">
            <div class="controls">

                <a class="btn btn-info subir_otro" href="#">
                    Intentar nuevamente
                </a>

            </div>
        </div>
<?php 
    }
?>