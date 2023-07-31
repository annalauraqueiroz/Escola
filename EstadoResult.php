<html>
<head>
<meta http-equiv="content-type">
  <meta charset="utf-8">
  <title>Cadastro Estado</title>
</head>
<body>
<?php
	include_once("conexao.php");
	
	ini_set('default_charset', 'UTF-8');
	mysqli_set_charset($con,"utf8");
		$id= $_POST['IDEstado'];
		$nome=$_POST['NomeEstado'];
		$camposok = true;
		if ($id == null){
			echo "O ID não foi informado! <br>";
			$camposok = false;
		}
		
		if($nome == null){
			echo "O nome do estado não foi informado!<br>";
		}
		
		if($camposok== true){
			
		//$cod= mysql_insert_id(conexao);
		$sql = "INSERT INTO Estados ( id_estado, nome) VALUES ('$id','$nome')" ;
			if($con->query($sql) === TRUE){
				echo "Estado inserido no banco com sucesso!";
			}else{
			echo "Erro:".$sql."<br>".$con-> error;}
		}else{
			echo "Campos não inseridos no banco! Faltando dados.";
		}
		$con->close();
	?>
</body>
<html>