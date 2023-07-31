<?php
	$con = mysqli_connect("localhost","root", "", "progwebbd");
	
	if(mysqli_connect_errno()){ // verifica se houve erros
		printf("Falha na conexão: %s\n",
			mysqli_connect_error());
		exit();
	}
?>