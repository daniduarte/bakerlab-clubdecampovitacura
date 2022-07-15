<?php
    require_once("../../mdv.php");

    //upload.php

    $return         = Array('ok' => TRUE);

    $upload_folder  = '../../../uploads';

    $nombre_archivo = $_FILES['archivo']['name'];
    
    $nombre_archivo = str_replace(" ","-",$nombre_archivo);
    $nombre_archivo = str_replace("(","",$nombre_archivo);
    $nombre_archivo = str_replace(")","",$nombre_archivo);

    $tipo_archivo   = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $tmp_archivo    = $_FILES['archivo']['tmp_name'];

    $archivador     = $upload_folder . '/' . $nombre_archivo;

    $identificador  = $_POST['identificador'];

    $ext            = explode(".", $nombre_archivo);
    $ext            = strtolower($ext[count($ext) - 1]);
    $extlen         = (strlen($ext) + 1) * -1;
    $name_w_ext     = substr($nombre_archivo, 0, $extlen);

    $file_name      = $name_w_ext.".".$ext;

    $times          = 2;

    while (file_exists($archivador)) 
    {
        $archivador     = $upload_folder . '/' . $name_w_ext ."-".$times.".".$ext;
        $file_name      = $name_w_ext ."-".$times.".".$ext;
        $times++;
    }

    $f_imagenes     = array("png", "jpg", "gif", "jpeg");
    $f_documentos   = array("doc", "docx", "xls", "xlsx", "pdf", "ppt", "pptx");
    $f_videos       = array("avi", "mov", "mp4", "ogg", "flv");

    $result         = 0;

    if(in_array($ext, $f_imagenes))
    {
        $tipo_file      = "imagen";
    }else if(in_array($ext, $f_documentos)) {
        $tipo_file      = "documento";
    }else if(in_array($ext, $f_videos)) {
        $tipo_file      = "video";
    }else{
        $result         = 2;
    }
    
    ini_set("display_errors",1);

    if($result != 2)
    {
        
        if (!move_uploaded_file($tmp_archivo, $archivador)) {

            $result     = 0;

        }else{      

            if($tipo_file == "imagen") # IMAGENES
            {

                // Crear Thumbnail de la imagen (Para repositorio)

                $file_info  = getimagesize($archivador);

                // Dependiendo de la extensión llamamos a distintas funciones
                switch ($ext) {
                    case "jpg":
                        $img = imagecreatefromjpeg($archivador);
                    break;

                    case "jpeg":
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
                    $nuevo_ancho    = 200;

                    // Calcular alto
                    $nuevo_alto     = ($alto * $nuevo_ancho) / $ancho;

                    $thumb          = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

                }else{
                    // Imagen Vertical o de similares dimensiones
                    $nuevo_alto     = 200;

                    // Calcular ancho
                    $nuevo_ancho    = ($ancho * $nuevo_alto) / $alto;

                    $thumb          = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
                }


                // La redimensionamos
                imagecopyresampled($thumb, $img, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $file_info[0], $file_info[1]);

                // La mostramos como jpg
                imagejpeg($thumb, "../../../uploads/thumbs/".$file_name, 200);

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
        $login  = $_SESSION['USR']['NICK'];

        Insertar("mdv_archivos", 
                 "nombre,ext,tipo,fecha_ingreso,carpeta,usuario", 
                 "'$file_name','$ext','$tipo_file','$fecha',$_POST[file_parent],'$login'");
        

?>
        <div class="span12" style="padding:5px;">

            <h4>Subir Archivos</h4>
            <br />

            <div class="alert alert-success alert-block span11" style="margin-left:0px;">
                <i class="icon-ok"></i>&nbsp;<b>Archivo subido Correctamente</b><br />
                El archivo seleccionado se ha subido correctamente al servidor.
            </div>

            <div class="control-group">
                <div class="controls">

                    <a class="btn btn-info" href="#" 
                        onclick="formulario_archivo('<?=$identificador;?>',<?=$_POST['file_parent']?>); return false;">
                        Subir otro archivo
                    </a>

                </div>
            </div>
        </div>
<?php
    }else{
?>
    
        <div class="span12" style="padding:5px;">

            <h4>Subir Archivos</h4>
            <br />
            
            <div class="alert alert-error alert-block span11" style="margin-left:0px;">
                <i class="icon-remove"></i>&nbsp;<b>¡Oops!</b><br />
                El archivo seleccionado es inválido u ocurrió un error y el archivo no ha podido ser almacenado. <br />
                Intente nuevamente.
            </div>

            <div class="control-group">
                <div class="controls">

                    <a class="btn btn-info" href="#" 
                        onclick="formulario_archivo('<?=$identificador;?>',<?=$_POST['file_parent']?>); return false;">
                        Intentar nuevamente
                    </a>

                </div>
            </div>

        </div>

<?php
    }
?>