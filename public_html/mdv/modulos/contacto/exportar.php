<?php
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=Mensajes de Contacto.xls");

	require_once("../../mdv.php");
?>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Exportar resultados</title>

<style type="text/css">

<!–

.style1 {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-weight: bold;
}

.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

–>

</style>

</head>

<body>

    <table id="tabla" style="width:100%;"> 
        <tr>
            <td align="center" colspan="6" style="width:100%;">
                <h1>Mensajes de Contacto</h1>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="6" style="width:100%;">
            </td>
        </tr>
    </table>

<?php        
    if(Filas("contacto","1 order by id DESC") > 0)
    {
	    $data        = Datos("contacto","1 order by id DESC","*");
?>
        <table id="tabla" style="width:100%;" border="1"> 
            <thead>
                <tr class="cabece">
                    <th><b>ID</b></th>
                    <th><b>Fecha</b></th>
                    <th><b>RUT</b></th>
                    <th><b>Nombre</b></th>
                    <th><b>E-mail</b></th>
                    <th><b>Teléfono</b></th>
                    <th><b>Departamento</b></th>
                    <th><b>Mensaje</b></th>
                </tr>
            </thead>
            
            <tbody>
            
            <?php
                while($row = mysql_fetch_assoc($data))
                {
            ?>
                <tr> 
                    <td><?php echo d($row["id"]); ?></td>
                    <td><?=date("d-m-Y H:i",strtotime($row['fecha']));?></td>   
                    <td><?php echo ($row["rut"]); ?></td>
                    <td><?php echo ($row["nombre"]); ?></td>
                    <td><?php echo d($row["email"]); ?></td>    
                    <td><?php echo d($row["telefono"]); ?></td>               
                    <td><?php echo ($row["cotizar"]); ?></td>
                    <td><?php echo ($row["mensaje"]); ?></td>
                </tr>
            <? 
                }
            ?> 
            </tbody>
        </table>

<?php       
    }
?>
    
</body>
</html>