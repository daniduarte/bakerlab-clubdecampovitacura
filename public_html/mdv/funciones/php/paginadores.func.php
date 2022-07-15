<?php 
	/* Paginación de registros */

	function paginate($numReg,$elepp,$ac_page,$me)
	{
		// $numReg  -> Número de Registros
		// $elepp   -> Elementos por página
		// $ac_page -> Página Actual
		// $page_arr-> Arreglo de resultados
				
		if($numReg > 0)
		{  
			// Calculo de elementos necesarios para paginación
			$tamPag	= $elepp;
			$pagina = $ac_page;
		
			if(!(ctype_digit($pagina)))
			{
				$pagina = 1;
			}
			
			// Página actual si no esta definida y limites
			if(!isset($pagina))
			{
				$pagina=1;
				$inicio=1;
				$final=$tamPag;
			}

			// Cálculo del limite inferior
			$limitInf	= ($pagina-1) * $tamPag;

			// Cálculo del numero de páginas
			$numPags	= ceil($numReg / $tamPag);

			if(!isset($pagina))
			{

				$pagina 	= 1;
				$inicio 	= 1;
				$final 		= $tamPag;

			}else{

				$seccionActual 	= intval(($pagina - 1) / $tamPag);
				$inicio			= ($seccionActual * $tamPag) + 1;

				if($pagina < $numPags)
				{
					$final 		= $inicio + $tamPag - 1;
				}else{
					$final 		= $numPags;
				}

				if ($final > $numPags){
					$final 		= $numPags;
				}

			}

			$html 		= '<div class="dataTables_paginate">';

			if($pagina > 1)
			{

		    	$html 		.= '<a href="'.$me.'&p=1" tabindex="0" class="first ui-button">
		                            Primera
		                        </a>
		                        <a href="'.$me."&p=".($pagina-1).'" tabindex="0" class="previous ui-button">
		                            Anterior
		                        </a>';

		    }else{

		    	$html 		.= '<a tabindex="0" class="first ui-button ui-state-disabled">
		                            Primera
		                        </a>
		                        <a tabindex="0" class="previous ui-button ui-state-disabled">
		                            Anterior
		                        </a>';

		    }


		    $html .= 	'       <span>';

		    for($i = $inicio; $i <= $final; $i++)			
			{			
				if($i == $pagina)			
				{	
					$html 	.= '<a tabindex="0" class="fg-button ui-button ui-state-disabled">'.$i.'</a>';		
				}else{
					$html 	.= '<a href="'.$me."&p=".$i.'" 
								   tabindex="0" class="fg-button ui-button">'.$i.'</a>';
				}
			}

			$html .=	'       </span>';


			if($pagina < $numPags)				
			{

				$html 		.= '<a href="'.$me."&p=".($pagina+1).'" tabindex="0" 
								   class="next ui-button">
		                            Siguiente
		                        </a>

		                        <a href="'.$me."&p=".$numPags.'"
		                           tabindex="0" class="last ui-button">
		                            Última
		                        </a>
		                    </div>';

		    }else{

		    	$html 		.= '<a tabindex="0" 
								   class="next ui-button ui-state-disabled">
		                            Siguiente
		                        </a>

		                        <a tabindex="0" class="last ui-button ui-state-disabled">
		                            Última
		                        </a>
		                    </div>';
		    		
		    }

			// Armar arreglo para devolver resultados
			$page_arr['limitInf'] 	= $limitInf;
			$page_arr['tamPag'] 	= $tamPag;
			$page_arr['html']		= $html;

		}

		return $page_arr;

	}

	/* Paginación de registros */

	function paginate_rep($numReg,$elepp,$ac_page,$func,$iden,$item,$name_id)
	{
		// $numReg  -> Número de Registros
		// $elepp   -> Elementos por página
		// $ac_page -> Página Actual
		// $page_arr-> Arreglo de resultados
				
		if($numReg > 0)
		{  
			// Calculo de elementos necesarios para paginación
			$tamPag	= $elepp;
			$pagina = $ac_page;
		
			if(!(ctype_digit($pagina)))
			{
				$pagina = 1;
			}
			
			// Página actual si no esta definida y limites
			if(!isset($pagina))
			{
				$pagina=1;
				$inicio=1;
				$final=$tamPag;
			}

			// Cálculo del limite inferior
			$limitInf	= ($pagina-1) * $tamPag;

			// Cálculo del numero de páginas
			$numPags	= ceil($numReg / $tamPag);

			if(!isset($pagina))
			{

				$pagina 	= 1;
				$inicio 	= 1;
				$final 		= $tamPag;

			}else{

				$seccionActual 	= intval(($pagina - 1) / $tamPag);
				$inicio			= ($seccionActual * $tamPag) + 1;

				if($pagina < $numPags)
				{
					$final 		= $inicio + $tamPag - 1;
				}else{
					$final 		= $numPags;
				}

				if ($final > $numPags){
					$final 		= $numPags;
				}

			}

			$html 		= '<div class="dataTables_paginate">';

			if($pagina > 1)
			{

		    	$html 		.= '<a href="#" onclick="'.$func.'('."'".$iden."',1,'".$item."','front','".$name_id."'".'); return false;" 
		    						tabindex="0" class="first ui-button">
		                            <<
		                        </a>
		                        <a href="#"  onclick="'.$func.'('."'".$iden."',".($pagina-1).",'".$item."','front','".$name_id."'".'); 
		                        					  return false;" 
		                        	tabindex="0" class="previous ui-button">
		                            <
		                        </a>';

		    }else{

		    	$html 		.= '<a tabindex="0" class="first ui-button ui-state-disabled">
		                            <<
		                        </a>
		                        <a tabindex="0" class="previous ui-button ui-state-disabled">
		                            <
		                        </a>';

		    }


		    $html .= 	'       <span>';

		    for($i = $inicio; $i <= $final; $i++)			
			{			
				if($i == $pagina)			
				{	
					$html 	.= '<a tabindex="0" class="fg-button ui-button ui-state-disabled">'.$i.'</a>';		
				}else{
					$html 	.= '<a href="#"  onclick="'.$func.'('."'".$iden."',".$i.",'".$item."','front','".$name_id."'".'); 
													  return false;"
								   tabindex="0" class="fg-button ui-button">'.$i.'</a>';
				}
			}

			$html .=	'       </span>';


			if($pagina < $numPags)				
			{

				$html 		.= '<a href="#" onclick="'.$func.'('."'".$iden."',".($pagina+1).",'".$item."','front','".$name_id."'".'); 
													  return false;"
									tabindex="0" class="next ui-button">
		                            >
		                        </a>

		                        <a href="#" onclick="'.$func.'('."'".$iden."',".($numPags).",'".$item."','front','".$name_id."'".'); 
													  return false;"
		                           tabindex="0" class="last ui-button">
		                            >>
		                        </a>
		                    </div>';

		    }else{

		    	$html 		.= '<a tabindex="0" 
								   class="next ui-button ui-state-disabled">
		                            >
		                        </a>

		                        <a tabindex="0" class="last ui-button ui-state-disabled">
		                            >>
		                        </a>
		                    </div>';
		    		
		    }

			// Armar arreglo para devolver resultados
			$page_arr['limitInf'] 	= $limitInf;
			$page_arr['tamPag'] 	= $tamPag;
			$page_arr['html']		= $html;

		}else{

			// Armar arreglo para devolver resultados
			$page_arr['limitInf'] 	= 0;
			$page_arr['tamPag'] 	= 1;
			$page_arr['html']		= "";

		}

		return $page_arr;

	}
?>