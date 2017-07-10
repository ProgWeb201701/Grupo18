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
      <a class="navbar-brand" href="#">Aluno</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./editarUsuario.php">Editar Usuario</a></li>
          <li><a href="./editarAluno.php">Editar Perfil</a></li>
          <li><a href="./excluirAluno.php">Excluir Perfil</a></li>
        </ul>
      </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Submeter Monografia <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./guardarMono.php">Arquivo</a></li>
          <li><a href="./submeter.php">Versão Final</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>

<?php
session_start();
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$id = $_SESSION['user'];
$query = "SELECT nome, matricula, curso, instituicao FROM orientando WHERE matricula=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$nome = $row['nome'];
		$matricula = $row['matricula'];
        $curso = $row['curso'];
        $instituicao = $row['instituicao'];
	}
}

$query = "SELECT curso FROM curso WHERE codCurso=$curso";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $curso = $row['curso'];
	}
}

$query = "SELECT instituicao FROM instituicao WHERE idInstituicao=$instituicao";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $instituicao = $row['instituicao'];
	}
}

?>
<div class="container">
	<div class="formulario">
	<h2>Excluir Perfil</h2>
	<form method="POST" action="../../model/alunoDAO.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label">Nome: <?php echo htmlspecialchars($nome); ?></div>
    <div class="editor-label">Matricula: <?php echo htmlspecialchars($matricula); ?></div>
	<div class="editor-label">Curso: <?php echo htmlspecialchars($curso); ?></div>
    <div class="editor-label">Instituição: <?php echo htmlspecialchars($instituicao); ?></div>
	<br>
	<div class="editor-field">
		<center>
		 <button id="delet" name="delet" type="submit" class="btn btn-danger" value='excluir'>Excluir
		 <i class='glyphicon glyphicon-remove'></i>
		 </button>
		 </center>
	</div>
	</form>
	</div>
</div>
</body>
</html>