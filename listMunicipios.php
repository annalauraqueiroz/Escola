<html>
	  
<head>
	<meta http-equiv="Content-Type">
	<title>Listagem de Municípios</title>
	<?php

	?>
</head>

<body>

	<?php
		include_once("listagens.php");
		include_once("conexao.php");
		
			ini_set('default_charset', 'UTF-8');
	        mysqli_set_charset($con,"utf8");
		
		$res = lista("Municipios");
		
		$count = mysqli_num_rows($res);
		
		echo "O total de municípios é: ".$count.".<br><br>";
		
		echo "<table border='1'>";
		echo "<tr>";		
		echo "<td>ID do município</td><td>Nome</td>";
		echo "</tr>";
		
		
		while ($x = mysqli_fetch_assoc($res)){

			$id = $x['id_municipio'];
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