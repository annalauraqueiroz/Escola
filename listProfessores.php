<html>
	  
<head>
	<meta http-equiv="Content-Type">
	<title>Listagem de Professores</title>
	<?php

	?>
</head>

<body>

	<?php
		include_once("listagens.php");
		include_once("conexao.php");
		
			ini_set('default_charset', 'UTF-8');
	mysqli_set_charset($con,"utf8");
		
		$res = lista("Professores");
		
		$count = mysqli_num_rows($res);
		
		echo "O total de professores é: ".$count.".<br><br>";
		
		echo "<table border='1'>";
		echo "<tr>";		
		echo "<td>ID do professor</td><td>Nome</td>
		<td>Idade do professor</td><td>Titulação</td>";
		echo "</tr>";
		
		
		while ($x = mysqli_fetch_assoc($res)){

			$id = $x['id_professor'];
			$nome = $x['nome'];
			$idade = $x['idade'];
			$titulacao = $x['titulacao'];			
				
			echo "<tr>";		
			echo "<td>".$id."</td><td>".$nome."</td><td>".$idade."</td><td>".$titulacao."</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		include_once("desconecta.php");
	?>
	
</body>

</html>