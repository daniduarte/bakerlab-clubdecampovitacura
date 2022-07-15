<?php	 
    # Via .htaccess se llama al módulo correspondiente
    $modulo     = "inicio";
    $action     = "";
    $query      = null;
         
    if (isset($_GET['load']))
    {
        $params = array();
        $params = explode("/", $_GET['load']);
         
        $modulo = $params[0];
             
        if (isset($params[1]) && !empty($params[1]))
        {
            $action = $params[1];
        }
             
        if (isset($params[2]) && !empty($params[2]))
        {
            $query  = $params[2];
        }

        if (isset($params[3]) && !empty($params[3]))
        {
            $d_id   = $params[3];
        }
    }