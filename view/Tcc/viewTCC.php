<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <style>
  div.formulario { width: 30%; height: 80%; margin: auto; line-height: 2.2; font-size: 15px;}
  h2{text-align: center}
  </style>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Coordenador</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">TCC <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="cadastrarTCC.php">Cadastrar Tcc</a></li>
          <li><a href="./viewTCC.php">Visualizar Tcc</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>


<div class="container">
<h2>TCC</h2>
<br>
<?php
	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT idTcc, titulo, tema, orientando.nome, professor.nome FROM tcc INNER JOIN orientando INNER JOIN professor";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
  
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>ID</th><th>Titulo</th><th>Tema</th><th>Orientando</th><th>Orientador</th><th>Ações</th></tr>";
	while (list($idTcc, $titulo, $tema, $aluno, $orientador) = $result->fetch_row()) {
    	echo "<tr><td>$idTcc</td><td>$titulo</td><td>$tema</td><td>$aluno</td><td>$orientador</td>";
    	echo"<td>
    	<a class='btn btn-default btn-sm' name ='edit' title='Editar' href='editarTCC.php?id=$idTcc'><i class='glyphicon glyphicon-edit'></i></a>
		<a class='btn btn-default btn-sm' method='POST' name ='delet' title='Deletar' href='excluirTCC.php?id=$idTcc'><i class='glyphicon glyphicon-trash'></i></a></td>";
		echo "<tr>";
	}
	echo "<tr><td colspan='3'>Total de registros</td><td>$mysqli->affected_rows</td></tr>";
	echo "</table>";
	$result->close();
?>
    <div class="">
        <a href="cadastrarTCC.php" class="btn btn-success">Cadastrar</a>
    </div>
</div>
</body>







































