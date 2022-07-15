<?php
    require_once("mdv.php");

    //upload.php

    $return         = Array('ok' => TRUE);
    $ayuda          = 0;

    if($_POST['gatillador'] == "configuracion/new_item")
    {
        $ayuda          = 1;
    }

    if($ayuda == 1)
    {
        $upload_folder  = '../uploads/ayuda';
    }else{
        $upload_folder  = '../uploads';
    }   

    $tipo_upload    = $_POST['tipo'];

    if($tipo_upload == ""){$tipo_upload = 1;}

    $nombre_archivo = $_FILES['archivo']['name'];
    
    $nombre_archivo = str_replace(" ","-",$nombre_archivo);
    $nombre_archivo = str_replace("(","",$nombre_archivo);
    $nombre_archivo = str_replace(")","",$nombre_archivo);

    $tipo_archivo   = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $tmp_archivo    = $_FILES['archivo']['tmp_name'];

    $archivador     = $upload_folder . '/' . $nombre_archivo;

    if (file_exists($archivador)) {       

        $nombre_archivo = date("jmYHis")."_".$nombre_archivo;
        $archivador     = $upload_folder . '/' . $nombre_archivo;
        
    }

    // Sacamos la extensión del archivo
    $ext            = explode(".", $nombre_archivo);
    $ext            = strtolower($ext[count($ext) - 1]);
    
    if ($ext == "jpeg") $ext = "jpg";

    $result         = 0;

    if($tipo_upload == 2) # IMAGENES
    {
        // Validar sólo subida de imágenes
        $formatos   = array("png", "jpg", "gif", "jpeg");

        if(!in_array($ext, $formatos))
        {
            $mensaje_error  = "El archivo seleccionado es inválido o no es una imagen. <br />
                               Los formatos de imágenes permitidos son .png, .jpg, .jpeg y .gif";
            $result         = 2;
        }else{
            $tipo_file      = "imagen";
        }
        
    }else if($tipo_upload == 3){ # VIDEOS

        // Validar sólo subida de imágenes
        $formatos   = array("avi", "mov", "mp4", "ogg", "flv");

        if(!in_array($ext, $formatos))
        {
            $mensaje_error  = "El archivo seleccionado es inválido o no es un video. <br />
                               Los formatos de imágenes permitidos son .avi, .mov, .mp4, .ogg y .flv";
            $result         = 2;
        }else{
            $tipo_file      = "video";
        }
        
    }else if($tipo_upload == 4){ # VIDEOS

        // Validar sólo subida de imágenes
        $formatos   = array("doc", "docx", "xls", "xlsx", "pdf", "ppt", "pptx");

        if(!in_array($ext, $formatos))
        {
            $mensaje_error  = "El archivo seleccionado es inválido o no es un documento. <br />
                               Los formatos de imágenes permitidos son .doc, .docx, .xls, .xlsx, .ppt, .pptx y .pdf";
            $result         = 2;
        }else{
            $tipo_file      = "documento";
        }
        
    }

    if($result != 2)
    {
        
        if (!move_uploaded_file($tmp_archivo, $archivador)) {

            $result     = 0;

        }else{
            
            if($ayuda == 1)
            {
                $tipo_file  = "ayuda";
            }    

            if($tipo_upload == 2) # IMAGENES
            {

                // Crear Thumbnail de la imagen (Para repositorio)

                $file_info  = getimagesize($archivador);

                // Sacamos la extensión del archivo
                $ext = explode(".", $nombre_archivo);

                $ext = strtolower($ext[count($ext) - 1]);
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

                // La mostramos como jpg
                imagejpeg($thumb, "../uploads/thumbs/".$nombre_archivo, 100);

                // Liberar memoria
                imagedestroy($thumb);            

            }

            $result     = 1;

        }

    }
?>

<?php
    if ($result == 1) {

        
        // Insertar registro de documento en BD
        $fecha  = date('Y-m-d H:i:s');

        Insertar("mdv_archivos", "nombre,ext,tipo,fecha_ingreso", "'$nombre_archivo','$ext','$tipo_file','$fecha'");
        

?>
        <div class="alert alert-success alert-block">
            <h4 class="alert-heading">Archivo subido correctamente</h4>
            El documento seleccionado se ha subido correctamente al servidor.
        </div>

        <div class="control-group">
            <div class="controls">

                <a class="btn btn-success" href="#" data-dismiss="modal"
                    onclick="usar_archivo('<?=$_POST['campo'];?>','<?=$nombre_archivo;?>')">
                        Usar este archivo
                </a>
                &nbsp;&nbsp;
                <a class="btn btn-info subir_otro" href="#">
                        Subir otro archivo
                </a>

            </div>
        </div>
<?php
    }else if($result == 2){
?>

        <div class="alert alert-error alert-block">
            <h4 class="alert-heading">¡Opps!</h4>
            <?=$mensaje_error;?>
        </div>

        <div class="control-group">
            <div class="controls">

                <a class="btn btn-info subir_otro" href="#">
                    Intentar nuevamente
                </a>

            </div>
        </div>

<?php
    }else{
?>

        <div class="alert alert-error alert-block">
            <h4 class="alert-heading">¡Opps!</h4>
            Ha ocurrido un error y el archivo no ha podido ser almacenado. 
            <br />Intente nuevamente.
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