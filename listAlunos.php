<html>
	  
<head>
	<meta http-equiv="Content-Type">
	<title>Listagem de Alunos</title>
<link rel="stylesheet" href="./estilo.css">
</head>

<body BGCOLOR="green">

	<?php
		include_once("listagens.php");
		include_once("conexao.php");
		
			ini_set('default_charset', 'UTF-8');
	mysqli_set_charset($con,"utf8");
		
		$res = lista("Alunos");
		
		$count = mysqli_num_rows($res);
		
		echo "O total de alunos é: ".$count.".<br><br>";
		
		echo "<table border='1'>";
		echo "<tr>";		
		echo "<td>ID do Aluno</td><td>ID do Estado</td><td>ID do Município</td><td>Nome </td>
		<td>CPF do Aluno </td><td>Matrícula </td><td>Endereço </td><td> Data de Nascimento </td>
		<td> Sexo </td> <td> Necessidades Especiais </td> <td> É repetente </td><td> Escola Pública </td>";
		echo "</tr>";
		
		
		while ($x = mysqli_fetch_assoc($res)){

			$idAluno = $x['id_aluno'];
			$idEstado = $x['id_estado'];
			$idMunicipio = $x['id_municipio'];
			$nome = $x['nome'];
			$cpf = $x['cpf'];
			$mat = $x['matricula'];
			$end = $x['endereco'];
			$data = $x['data_nascimento'];
			$sexo = $x['sexo'];
			$nesp = $x['necessidades_especiais'];
			$rep = $x['repetente'];
			$pub = $x['escola_publica'];
			
			$nascimentoConvertido = str_replace('/', '-', $data);
			$data = date_parse($nascimentoConvertido);
				$dia = $data['day'];
				$mes = $data['month'];
				$ano = $data['year'];
				$datanasc = "$dia/$mes/$ano";
		
			if($sexo== 'F'){
			$sexo= "Feminino";
			}else if($sexo =='M'){
			$sexo= "Masculino";
			}
			
			if($nesp == 0){
				$nesp = "Não";
			}else{
				$nesp= "Sim";}
				
			if($rep == 0){
				$rep = "Não";
			}else{
				$rep= "Sim";}
			
			if($pub == 0){
				$pub = "Não";
			}else{
				$pub= "Sim";}			
				
			echo "<tr>";		
			echo "<td>".$idAluno."</td><td>".$idEstado."</td><td>".$idMunicipio."</td>
			<td>".$nome."</td><td>".$cpf."</td><td>".$mat."</td><td>".$end."</td><td>".$datanasc."</td>
			<td>".$sexo."</td><td>".$nesp."</td><td>".$rep."</td><td>".$pub."</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		include_once("desconecta.php");
	?>
	
</body>

</html>