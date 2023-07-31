<html>
<head>
<meta http-equiv="content-type">
  <meta charset="utf-8">
  <title>Cadastro Professor</title>
</head>
<body>
<?php 
	include_once("conexao.php");
	
	ini_set('default_charset', 'UTF-8');
	mysqli_set_charset($con,"utf8");
		
		$id = trim($_POST['IDProfessor']);
		$nome = trim($_POST["NomeProfessor"]);
		$idade = trim($_POST["IdadeProfessor"]);
		$titulacao = trim($_POST["TitulacaoProfessor"]);
		
		$camposOk = true;
				
				
		if($nome == null) {
			echo "Campo nome não informado" . "<BR>";
			$camposOk = false;
		} 
		
		if($id == null) {
			echo "Campo ID do Professor não informado" . "<BR>";
			$camposOk = false;
		}
		
		if($idade == null) {
			echo "Campo idade não informado" . "<BR>";
			$camposOk = false;
		}
		
		if($titulacao == null) {
			echo "Campo titulação não informado<BR>";
			$camposOk = false;
		}
		
		if($camposOk == true){
			echo "<h1>Os dados informados foram:</h1>";
			
			echo "Nome: $nome<BR>";
			echo "ID Professor: $id<BR>";
			echo "Idade: $idade<BR>";
			echo "Titulação: $titulacao<BR>";
	
			$sql = "INSERT INTO Professores (id_professor,nome,
					idade,titulacao)
				VALUES ('".$id."','".$nome."','".$idade."',
					'".$titulacao."');";
			if($con->query($sql) === TRUE){
				echo "Professor inserido no banco com sucesso!";
			}else{
			echo "Erro:".$sql."<br>".$con-> error;}
		}else{
			echo "Campos não inseridos no banco! Faltando dados.";
		}
		$con->close();
			
			
	?>
</body>
<html>