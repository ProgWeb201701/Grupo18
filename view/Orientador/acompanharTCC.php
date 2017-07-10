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
      <a class="navbar-brand" href="#">Orientador</a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="acompanharTCC.php"><span></span> Acompanhar TCC</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mudar Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Professor/editarProfessor.php">Professor</a></li>
          <li><a href="../Avaliador/avaliadorView.php">Avaliador</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>


<div class="container">
<h2>Acompanhar TCC</h2>
<br>
<?php
  session_start();
  $user = $_SESSION['user'];
	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT tcc.idTcc, titulo, tema, nota, parecer, comentarios,nome FROM tcc LEFT JOIN avaliacao ON tcc.idTcc = avaliacao.idTcc INNER JOIN orientando ON tcc.aluno = orientando.matricula AND tcc.idOrientador = $user";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>Titulo</th><th>Tema</th><th>Orientando</th><th>Nota</th><th>Parecer</th><th>Comentarios</th></tr>";
	while (list($idTcc, $titulo, $tema, $nota, $parecer, $comentarios, $aluno) = $result->fetch_row()) {
    	echo "<tr><td>$titulo</td><td>$tema</td><td>$aluno</td><td>$nota</td><td>$parecer</td><td><a href=\"" . "../../upload/". $comentarios . "\">" . $comentarios . "</a></td>";
    	
		
	}
	echo "</table>";
	$result->close();
?>

</div>
</body>
