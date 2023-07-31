<html>
<head>
 <meta charset="utf-8">
   <title>Cadastrar Disciplinas</title>
<head>
<body>
<form name="form" action="./Disciplinasresult.php" method="post" enctype="application/x-www-form-urlencoded">
   <table>
   <tr>
      <td>ID Disciplina</td>
      <td><input type="text" name="IDDisciplina"></td>
   </tr>
   <tr>
      <td>ID Professor</td>
      <td><select name="listProfessores">
						<option value="0">Selecione</option>
						<?php
							include_once("listagens.php");
							$res = lista('Professores');
							
							while ($registro = mysqli_fetch_assoc($res)){
								$id = $registro['id_professor'];
								$nome = $registro["nome"];		
								
								echo "<option value='$id'>$id - $nome </option>";
							}
						?></select></td>
   </tr>
   <tr>
      <td>Nome</td>
      <td><input type="text" name="Nome" ></td>
   </tr>
   <tr>
      <td>Entrada(ano/semestre)</td>
      <td><input type="date" name="Ano" ></td>
   </tr>
 <tr>
      <td><input type="submit" value="Enviar"></td>
      <td><input type="reset" value="Redefinir"></td>
   </tr>
   </table>
   </form>



</body>
</html>