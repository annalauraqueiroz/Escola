<html>
<head>
<meta http-equiv="content-type">
  <meta charset="utf-8">
  <title>Cadastro Disciplina</title>
  

</head>
<body>
<?php 

	include_once("conexao.php");
	//OBS: Não entendemos o que vc quis dizer com o ano_semestre em tipo date, então colocamos como a
	//data da matrícula e exibimos o ano e o mes
	ini_set('default_charset', 'UTF-8');
	mysqli_set_charset($con,"utf8");

		$nome = trim($_POST["Nome"]);
		$anoSemestre = trim($_POST["Ano"]);
		
		$camposok = true;
			

		
		if(isset($_POST['IDDisciplina'])){
			$idDisc = $_POST['IDDisciplina'];
				}else {
					echo "O ID da disciplina não foi informado!<br>";
					$camposok= false;
				}
		
		if(isset($_POST['listProfessores'])){
			$idProf = $_POST['listProfessores'];
				}else {
					echo "O ID do Professor não foi informado!<br>";
					$camposok= false;
				}
				
		if($nome == null){
				
					echo "O nome não foi informado!<br>";
					$camposok= false;
				}
		
		if(isset($_POST['Ano'])){
			$ano = $_POST['Ano'];
				}else {
					echo "O ano não foi informado!<br>";
					$camposok= false;
				}
		if($anoSemestre != null){

			$anoConvertido = str_replace('/', '-', $anoSemestre);
			$anoSemestre = date_parse($anoConvertido);
				$dia = $anoSemestre['day'];
				$mes = $anoSemestre['month'];
				$ano = $anoSemestre['year'];
				$anoSemestre = "$ano-$mes-$dia";
			if ( ! checkdate($mes,$dia,$ano)){
				echo "DATA invalida.<br>";
				$camposok = false;
			}
		}else {
			echo "A data de nascimento não foi informada!<br>";
			$camposok = false;
		}	
	
		if($camposok == true){
			echo "<h1>Os dados informados foram:</h1>";
			
			echo "ID Disciplina: $idDisc<BR>";
			echo "ID Professor: $idProf<BR>";
			echo "Nome: $nome<BR>";
			echo "Mês/ano: $mes/$ano<BR>";
	
			$sql = "INSERT INTO Disciplinas (id_disciplina,id_professor,
					nome_disciplina,ano_semestre)
				VALUES ($idDisc,$idProf,'$nome',
					'$anoSemestre');";
			if($con->query($sql) === TRUE){
				echo "Disciplina inserida no banco com sucesso!";
			}else{
			echo "Erro:".$sql."<br>".$con-> error;}
		}else{
			echo "Campos não inseridos no banco! Faltando dados.";
		}
		$con->close();
			
			
	?>
</body>
<html>