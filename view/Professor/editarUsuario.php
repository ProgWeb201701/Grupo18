<?php
session_start();
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user = $_SESSION['user'];
	$mysqli = new mysqli("localhost","root","teste", "tcc");
	$query = "UPDATE usuario SET user=?, senha=? WHERE user=$user";
	$stmt = $mysqli->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('is', $usuario, $senha);
	$usuario = $_POST['user'];
	$senha = $_POST['senha'];
	$stmt->execute();
	$stmt->close();

	$query = "UPDATE professor SET siap=? WHERE siap=$user";
	$stmt = $mysqli->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('i', $siap);
	$siap = $_POST['user'];
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
	header("Location: ../../logout.php");
}
?>

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
      <a class="navbar-brand" href="#">Professor</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
					<li><a href="./editarUsuario.php">Editar Usuario</a></li>
          <li><a href="./editarProfessor.php">Editar Perfil</a></li>
          <li><a href="./excluirProfessor.php">Excluir Perfil</a></li>
        </ul>
      </li>
    </ul>
		<ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mudar Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Orientador/acompanharTCC.php">Orientador</a></li>
          <li><a href="../Avaliador/avaliadorView.php">Avaliador</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>

<?php
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$id = $_SESSION['user'];
$query = "SELECT user, senha FROM usuario WHERE user=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$usuario = $row['user'];
		$senha = $row['senha'];
	}
}

?>
<div class="container">
	<div class="formulario">
	<h2>Dados do Cliente</h2>
	<form method="POST" action="editarUsuario.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label"><label>Usuario</label></div>
	<div class="editor-field"><input class="form-control" type="text" name="user" value="<?php echo htmlspecialchars($usuario); ?>"></label></div>
    <div class="editor-label"><label>Senha</label></div>
	<div class="editor-field"><input class="form-control" type="text" name="senha" value="<?php echo htmlspecialchars($senha); ?>"></label></div>
	
	<br>
	<div class="editor-field">
		<center>
		 <button id="edit" name="edit" type="submit" class="btn btn-success" value='Atualizar'>Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
		 </center>
	</div>
	</form>
	</div>
</div>
</body>
</html>