<? 
	// Cerrar sesión
	session_start();

	// Remover variables de sesion
	session_unset();

 	// Destruir la sesión
	session_destroy();

	// Direccionar a login
	header("location:login.php?e=fin");
?>