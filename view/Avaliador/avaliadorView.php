<html>
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
      <a class="navbar-brand" href="#">Avaliador</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">TCC <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="avaliadorView.php">Visualizar TCC</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="acompanharTCC.php">Acompanhar TCC</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mudar Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Professor/editarProfessor.php">Professor</a></li>
          <li><a href="../Orientador/acompanharTCC.php">Orientador</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>

<div class="container">
<h2>TCC</h2>
<br>
<?php
  session_start();
  $user = $_SESSION['user'];

	ini_set('display_errors', 1);
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT codigo, arquivo, arquivo.matricula, titulo,orientando.nome FROM tcc INNER JOIN arquivo INNER JOIN orientando ON arquivo.matricula = tcc.aluno AND tcc.aluno = orientando.matricula AND tcc.idAvaliador = $user OR tcc.idAvaliador2 = $user";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT);
	echo "<table class='table table-striped table-responsive table-condensed'>";
	echo "<tr><th>TCC</th><th>PDF</th><th>Orientando</th><th>Avaliar</th></tr>";
	while (list($codigo, $arquivo, $matricula, $titulo, $orientando) = $result->fetch_row()) {
    	echo "<tr><td>$titulo</td><td><a href=\"" . "../../upload/". $arquivo . "\">" . $arquivo . "</a></td><td>$orientando</td>";
    	echo"<td>
    	<a class='btn btn-default btn-sm' name ='edit' title='Avaliar' href='avaliarTCC.php?id=$matricula'><i class='glyphicon glyphicon-edit'></i></a></td>";
		echo "<tr>";
	}
	echo "</table>";
	$result->close();
?>
</div>
</body>
