<html>
	  
<head>
	<meta http-equiv="Content-Type">
	<title>Listagem de Estados</title>
	<?php

	?>
</head>

<body>

	<?php
		include_once("listagens.php");
		include_once("conexao.php");
		
			ini_set('default_charset', 'UTF-8');
	        mysqli_set_charset($con,"utf8");
		
		$res = lista("Estados");
		
		$count = mysqli_num_rows($res);
		
		echo "O total de estados é: ".$count.".<br><br>";
		
		echo "<table border='1'>";
		echo "<tr>";		
		echo "<td>ID do estado</td><td>Nome</td>";
		echo "</tr>";
		
		
		while ($x = mysqli_fetch_assoc($res)){

			$id = $x['id_estado'];
			$nome = $x['nome'];			
				
			echo "<tr>";		
			echo "<td>".$id."</td><td>".$nome."</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		include_once("desconecta.php");
	?>
	
</body>

</html>