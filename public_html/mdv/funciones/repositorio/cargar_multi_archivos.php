<?php 
	// Cargar Archivos
	require_once("mdv.php");

	$pagina 			= $_POST['pagina'];
	$item 				= $_POST['item'];	
	$identificador 		= $_POST['identificador'];
	$name_id 			= $_POST['name_id'];

	// TIPOS
	// 1 -> TODOS

	if($item == "imagenes")
	{

		$archivos 		= Datos("mdv_archivos","tipo = 'imagen' order by fecha_ingreso DESC","*");

		$func 			= "cargar_pag_multi_repositorio";
		$iden 			= $identificador;
		$item 			= $item;

		if(mysql_num_rows($archivos) > 0)
		{

			$active_page    = $pagina;

			$paginador      = paginate_rep(mysql_num_rows($archivos),12,$active_page,$func,$iden,$item,$name_id);

			$archivos       = Datos("mdv_archivos",
			                        "tipo = 'imagen' order by fecha_ingreso DESC limit ".
			                         $paginador['limitInf'].",".$paginador['tamPag'],
			                        "*");
		}
?>

			<form action="#" class="form-horizontal">
            	<div class="widget-content" style="border:0px;padding-top:5px;">

            		<?=$paginador['html'];?>
            		<br />

					<ul class="thumbnails">

					<?php
						// Abrir directorio de Archivos

						$dir 			= str_replace("/mdv", "", UPLOAD_RUTE)."/uploads/thumbs";
						$base 			= str_replace("/mdv", "", BASEURL)."uploads/";
						$thumb 			= str_replace("/mdv", "", BASEURL)."uploads/thumbs/";

						while($a = mysql_fetch_assoc($archivos))
						{

							$archivo 	= $a['nombre'];

							if(is_file("$dir/$archivo"))
							{

					?>
								<li class="span4 thum_repositorio" data-dismiss="modal" 
									style="background-image:url(<?=$thumb.$archivo?>);"
									onclick="usar_archivo_multi('<?=$name_id?>','<?=$archivo?>');">

										<a style="overflow:hidden;" href="#" title="<?=$archivo;?>"
											class="tip" onclick="return false;">
						                    <br /><br /><br /><br /><br />

						                    <?=(strlen($archivo) > 10)? substr($archivo, 0,10)."..." : $archivo ;?>

						                    <br />
						                </a>

						        </li>

					<?php	
							}
						}
					?>

					</ul>
				</div>
            </form>

<?php 
	}
?>

<?php

	if($item == "documentos")
	{

		$archivos 		= Datos("mdv_archivos","tipo = 'documento' order by fecha_ingreso DESC","*");

		$func 			= "cargar_pag_repositorio";
		$iden 			= $identificador;
		$item 			= $item;

		if(mysql_num_rows($archivos) > 0)
		{

			$active_page    = $pagina;

			$paginador      = paginate_rep(mysql_num_rows($archivos),10,$active_page,$func,$iden,$item,$name_id);

			$archivos       = Datos("mdv_archivos",
			                        "tipo = 'documento' order by fecha_ingreso DESC limit ".
			                         $paginador['limitInf'].",".$paginador['tamPag'],
			                        "*");
		}
?>

			<form action="#" class="form-horizontal">
            	<div class="widget-content nopadding" style="border:0px;padding-top:5px;">

            		<?=$paginador['html'];?>
            		<br />

            		<table class="table table-bordered table-striped" style="margin-bottom:10px;">

                        <thead>
							<tr>
						    	<th>#</th>
						        <th>Archivo</th>
						    </tr>                          
						</thead>

						<tbody>

					<?php
						// Abrir directorio de Archivos

						$dir 			= str_replace("/mdv", "", UPLOAD_RUTE)."/uploads";
						$base 			= str_replace("/mdv", "", BASEURL)."uploads/";
						$thumb 			= str_replace("/mdv", "", BASEURL)."uploads/thumbs/";

						while($a = mysql_fetch_assoc($archivos))
						{

							$archivo 	= $a['nombre'];

							if(is_file("$dir/$archivo"))
							{

								$hay_archivos	= 1;

								if(strrpos($archivo,".pdf") !== false)
								{
									$back_icon 	= "pdf_icon.png";
								}

								if(strrpos($archivo,".doc") !== false)
								{
									$back_icon 	= "word_icon.png";
								}

								if(strrpos($archivo,".xls") !== false)
								{
									$back_icon 	= "excel_icon.png";
								}

					?>

							<tr class="odd gradeX">
								<td width="40" style="text-align:center;">
									<img src="<?=BASEURL;?>img/<?=$back_icon;?>" width="30" />
								</td>								
								<td>
									<a href="#" data-dismiss="modal" 
										onclick="usar_archivo('<?=$name_id?>','<?=$archivo?>'); return false;">
										<?=$archivo;?>
									</a>
								</td>
							</tr>

					<?php	
							}
					?>

						</tbody>
                    </table>

					<?php
							if($hay_archivos != 1)
							{
								echo '<h4><i class="icon-folder-open"></i> Aún no se han subido documentos...</h4>';
							}

						}
					?>
					
				</div>
            </form>

<?php 
	}
?>