<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
<h2>Cadastro de Alunos</h2>
<br>
<?php
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$query = "SELECT idAluno, nome, matricula, curso, instituicao FROM orientando ORDER BY nome";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
echo "<table class='table table-striped table-responsive table-condensed'>";
echo "<tr><th>ID</th><th>Nome</th><th>Matricula</th><th>Curso</th><th>Instituicao</th><th>Ações</th></tr>";
while (list($idAluno, $nome, $matricula, $curso, $instituicao) = $result->fetch_row()) {
    echo "<tr><td>$idAluno</td><td>$nome</td><td>$matricula</td><td>$curso</td><td>$instituicao</td>";
    echo "<td>
    <a class='btn btn-default btn-sm' title='Editar' href='edit.php?id=$idAluno'><i class='glyphicon glyphicon-edit'></i></a>
	<a class='btn btn-default btn-sm' title='Excluir' href='delete.php?id=$idAluno'><i class='glyphicon glyphicon-trash'></i></a></td>";
    echo "<tr>";
}
echo "<tr><td colspan='3'>Total de registros</td><td>$mysqli->affected_rows</td></tr>";
echo "</table>";
$result->close();
?>
	<div class="">
		<a href="cadastro.php" class="btn btn-success">Cadastrar</a>
	</div>
</div>
</body>