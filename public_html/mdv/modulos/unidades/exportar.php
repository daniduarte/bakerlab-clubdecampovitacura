<?php
	header("Content-Type: application/vnd.ms-excel");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=Leads Mision Ascenso.xls");

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
            <td align="center" colspan="9" style="width:100%;">
                <h1>Leads Misión Ascenso</h1>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="9" style="width:100%;">
            </td>
        </tr>
    </table>

<?php        
    if(Filas("leads","landing = 'uss' order by id DESC") > 0)
    {
	    $data        = Datos("leads","landing = 'uss' order by id DESC","*");
?>
        <table id="tabla" style="width:100%;" border="1"> 
            <thead>
                <tr class="cabece">
                    <th><b>ID</b></th>
                    <th><b>Fecha</b></th>
                    <th><b>Nombre</b></th>
                    <th><b>Apellido</b></th>
                    <th><b>E-mail</b></th>
                    <th><b>Teléfono</b></th>
                    <th><b>Móvil</b></th>
                    <th><b>Aporte</b></th>
                    <th><b>Modo</b></th>
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
                    <td><?php echo d($row["nombre"]); ?></td>
                    <td><?php echo d($row["apellido"]); ?></td>
                    <td><?php echo d($row["email"]); ?></td>               
                    <td><?php echo d($row["telefono"]); ?></td>
                    <td><?php echo d($row["movil"]); ?></td>
                    <td><?php echo d($row["aporte"]); ?></td>
                    <td><?php echo strtoupper($row["forma"]); ?></td>
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