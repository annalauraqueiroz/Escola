<html>
	  
<head>
	<meta http-equiv="Content-Type">
	<title>Listagem de Disciplinas</title>
	<?php

	?>
</head>

<body>

	<?php
		include_once("listagens.php");
		include_once("conexao.php");
		
	ini_set('default_charset', 'UTF-8');
	mysqli_set_charset($con,"utf8");
		
		$res = lista("Disciplinas");
		
		$count = mysqli_num_rows($res);
		
		echo "O total de disciplinas é: ".$count.".<br><br>";
		
		echo "<table border='1'>";
		echo "<tr>";		
		echo "<td>ID da disciplina</td><td>ID do professor</td>
		<td>Nome da disciplina</td><td>Ano</td>";
		echo "</tr>";
		
		
		while ($x = mysqli_fetch_assoc($res)){

		    $idDisc = $x['id_disciplina'];
			$idProf = $x['id_professor'];
			$nome = $x['nome_disciplina'];
			$ano = $x['ano_semestre'];			
				
			echo "<tr>";		
			echo "<td>".$idDisc."</td><td>".$idProf."</td><td>".$nome."</td><td>".$ano."</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		include_once("desconecta.php");
	?>
	
</body>

</html>