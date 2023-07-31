<?php

	function lista($nometabela){
		include("conexao.php");
		
		$sql = "SELECT * from $nometabela";
		
		$res = mysqli_query($con, $sql) or die("Erro ao listar:<br>".mysqli_error($con));
		
	
		return $res;
	}
?>