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

<?php
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$id = $_GET['id'];
session_start();
$_SESSION['idTcc'] = $id;
$query = "SELECT titulo, tema, aluno, idOrientador, idAvaliador FROM tcc  WHERE idTcc=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$titulo = $row['titulo'];
		$tema = $row['tema'];
		$aluno = $row['aluno'];
		$idOrientador = $row['idOrientador'];
		$idAvaliador = $row['idAvaliador'];
	}
}

$query = "SELECT nome FROM orientando WHERE matricula=$aluno";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $aluno = $row['nome'];
	}
}


$query = "SELECT nome FROM professor WHERE siap=$idOrientador";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $idOrientador = $row['nome'];
	}
}


$query = "SELECT nome FROM professor WHERE siap=$idAvaliador";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $idAvaliador = $row['nome'];
	}
}

?>

<div class="conteiner">
	<div class="formulario">
	<center><h2>Editar TCC</h2>
	<form method="POST" action="../../model/tccDAO.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label">Titulo: <?php echo htmlspecialchars($titulo); ?></div>
	<div class="editor-label">Tema: <?php echo htmlspecialchars($tema); ?> </div>
	<div class="editor-label">Orientando: <?php echo htmlspecialchars($aluno); ?> </div>
	<div class="editor-label">Orientador: <?php echo htmlspecialchars($idOrientador); ?> </div>
	<div class="editor-label">Avaliador: <?php echo htmlspecialchars($idAvaliador); ?></div>
    <br>
    <div class="editor-field">
         <button id="delet" name="delet" type="submit" class="btn btn-danger" value='excluir'>Excluir
		 <i class='glyphicon glyphicon-remove'></i>
         </button>
    </div>
    </form>
	</div>
</div>
</body>
</html>