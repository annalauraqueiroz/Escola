<html>
<head>
 <meta charset="utf-8">
   <title>Cadastrar Alunos</title>
   <link rel="stylesheet" href="./estilo.css">
<head>
<body BGCOLOR="green">
<form name="form" action="./AlunosResult.php" method="post" enctype="application/x-www-form-urlencoded">
   <table>
   <tr>
      <td>ID Aluno</td>
      <td><input type="text" name="IDAluno"></td>
   </tr>
    <tr>
      <td>Nome</td>
      <td><input type="text" name="nome" ></td>
   </tr>
   <tr>
      <td>ID Estado</td>
      <td><select name="listEstados">
						<option value="0">Selecione</option>
						<?php
							include_once("listagens.php");
							$res = lista('Estados');
							
							while ($registro = mysqli_fetch_assoc($res)){
								$idEst = $registro['id_estado'];
								$nomeEstado = $registro["nome"];		
								
								echo "<option value='$idEst'>$idEst - $nomeEstado </option>";
							}
						?></select></td>
   </tr>
   <tr>
      <td>ID Município</td>
      <td><select name="listMunicipios">
						<option value="0">Selecione</option><?php
							include_once("listagens.php");
							$res = lista('Municipios');
							
							while ($registro = mysqli_fetch_assoc($res)){
								$idMun = $registro['id_municipio'];
								$nomeMun = $registro["nome"];		
								
								echo "<option value='$idMun'>$idMun - $nomeMun </option>";
							}
						?></select></td>
   </tr>
    <tr>
      <td>CPF</td>
      <td><input type="text" name="cpf" ></td>
   </tr>
    <tr>
      <td>Matrícula</td>
      <td><input type="text" name="matricula" ></td>
   </tr>
    <tr>
      <td>Endereço</td>
      <td><input type="text" name="endereco" ></td>
   </tr>
    <tr>
      <td>Data de Nascimento</td>
      <td><input type="date" name="dataNasc" ></td>
   </tr>
    <tr>
      <td>Sexo</td>
      <td><input type="radio" name="sexo" value="1" > Feminino</td>
	   <td><input type="radio" name="sexo" value="0" > Masculino </td>
   </tr>
    <tr>
      <td>Possui Necessidades especiais?</td>
	<td><input type="checkbox" name="necessidades"> </td></tr>
    <tr>
      <td>É repetente?</td>
      <td><input type="checkbox" name="repetente" ></td>
   </tr>
    <tr>
      <td>Veio de escola pública?</td>
      <td><input type="checkbox" name="escolapublica" ></td>
   </tr>
  
 <tr>
      <td><input type="submit" value="Enviar"></td>
      <td><input type="reset" value="Redefinir"></td>
   </tr>
   </table>
   </form>



</body>
</html>