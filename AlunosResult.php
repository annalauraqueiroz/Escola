<html>
	  
<head>
	<meta http-equiv="Content-Type">
	<title>Cadastro de Alunos</title>
</head>

<body>

	<?php
		include_once("conexao.php");
		
		ini_set('default_charset', 'UTF-8');
		mysqli_set_charset($con,"utf8");
		
		$nome = trim($_POST['nome']);
		$idAluno = trim($_POST["IDAluno"]);
		$estado = trim($_POST["listEstados"]);
		$municipio = trim($_POST["listMunicipios"]);
		$cpf = trim($_POST["cpf"]);
		$mat = trim($_POST["matricula"]);
		$endereco = trim($_POST["endereco"]);
		$datanasc = trim($_POST["dataNasc"]);
		$sexo = trim($_POST["sexo"]);
		//$NEsp = isset($_POST["necessidades"]) ? 1 : 0;
		//$repetente = isset($_POST["repetente"]) ? 1 : 0;
		//$publica = isset($_POST["publica"]) ? 1 : 0;
			
		$camposOk = true;
		
		
		if($idAluno == null) {
			echo "Campo ID do Aluno não informado" . "<BR>";
			$camposOk = false;
		}
		if($nome == null) {
			echo "Campo nome não informado" . "<BR>";
			$camposOk = false;
		} else{
			echo "<h1> Seja bem vindo, ". $nome. "!";
			echo "</h1>";
		}
		if($estado == "0") {
			echo "Campo estado não informado<BR>";
			$camposOk = false;
		}
		
		if($municipio == "0") {
			echo "Campo municipio não informado<BR>";
			$camposOk = false;
		}
		if($cpf == null) {
			echo "Campo CPF não informado" . "<BR>";
			$camposOk = false;
		}
		
		if($mat == null) {
			echo "Campo matrícula não informado" . "<BR>";
			$camposOk = false;
		}
		
		if($endereco == null) {
			echo "Campo endereço não informado" . "<BR>";
			$camposOk = false;
		}
		
		
		if($datanasc != null){

			$nascimentoConvertido = str_replace('/', '-', $datanasc);
			$datanasc = date_parse($nascimentoConvertido);
				$dia = $datanasc['day'];
				$mes = $datanasc['month'];
				$ano = $datanasc['year'];
				$datanasc = "$ano-$mes-$dia";
			if ( ! checkdate($mes,$dia,$ano)){
				echo "DATA invalida.<br>";
				$camposok = false;
			}
		}else {
			echo "A data de nascimento não foi informada!<br>";
			$camposok = false;
		}	

		if(isset($_POST['sexo'])){
			if($sexo== 1){
			$sexo= "F";
			}else if($sexo==0){
			$sexo= "M";
			}
	
				}else {
					echo "O sexo não foi informado!<br>";
					$camposok= false;
				}
		
		if($camposOk == true){
			
			echo "ID Aluno: $idAluno<BR>";
			echo "Nome: $nome<BR>";
			echo "ID Estado: $estado<BR>";
			echo "ID Municipio: $municipio<BR>";
			echo "CPF: $cpf<BR>";
			echo "Matrícula: $mat<BR>";
			echo "Endereço: $endereco<BR>";
			echo "Data Nascimento: $dia/$mes/$ano<BR>"; 
			
			if($sexo == "M") echo "Sexo: Masculino<BR>";
			else echo "Sexo: Feminino<BR>";
			
			
			if(isset($_POST['necessidades'])){
				$NEsp = $_POST['necessidades'];
				$NEsp=1;
				}else {
					echo "Não Possui necessidades especiais!<br>";
					$NEsp= 0;
				}
				
			if(isset($_POST['repetente'])){
				$repetente = $_POST['repetente'];
				$repetente=1;
				}else {
					echo "Não é repetente!<br>";
					$repetente= 0;
				}
			if(isset($_POST['escolapublica'])){
				$publica = $_POST['escolapublica'];
				$publica=1;
				}else {
					echo "Não veio de escola pública!<br>";
					$publica= 0;
				}
		/*	$checkbox= false;
			if($NEsp != 0 || $repetente != 0 || $publica != 0){
				$checkbox = true;
				echo "Observações: <BR>";
			}				
			
			if($NEsp== 1) echo "Possui Necessidades Especiais<BR>";
			if($repetente == 1) echo "É repetente<BR>";
			if($publica == 1) echo "Veio de escola pública<BR>";	

			if($checkbox == true) echo "<BR>";
			*/
			
			
			$sql = "INSERT INTO Alunos( id_aluno, id_estado, id_municipio, nome,
			cpf, matricula, endereco, data_nascimento, sexo, necessidades_especiais, repetente, escola_publica) 
			VALUES ('$idAluno','$estado','$municipio','$nome','$cpf','$mat','$endereco','$datanasc','$sexo', $NEsp, $repetente,$publica)" ;
			/*$sql = "INSERT INTO Alunos (id_aluno, id_estado, id_municipio, nome,
			cpf, matricula, endereco, data_nascimento, sexo, necessidades_especiais, repetente, escola_publica)
				VALUES (".$idAluno.",".$estado.",".$municipio.",
					'".$nome."','".$cpf."','".$mat."',
					'".$endereco."','".$datanasc."',
					".$sexo.",".$NEsp.",".$repetente.".".$publica.");";*/
			if($con->query($sql) === TRUE){
				echo "Aluno inserido no banco com sucesso!";
			}else{
			echo "Erro:".$sql."<br>".$con-> error;}
		}else{
			echo "Campos não inseridos no banco! Faltando dados.";
		}
		$con->close();
			
	?>
	
</body>

</html>