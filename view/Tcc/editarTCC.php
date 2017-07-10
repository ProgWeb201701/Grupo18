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
$query = "SELECT * FROM tcc  WHERE idTcc=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$titulo = $row['titulo'];
		$tema = $row['tema'];
		$aluno = $row['aluno'];
		$idOrientador = $row['idOrientador'];
		$idAvaliador = $row['idAvaliador'];
		$idAvaliador2 = $row['idAvaliador2'];
	}
}

$query = "SELECT nome FROM orientando WHERE matricula=$aluno";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $novoaluno = $row['nome'];
	}
}

$query = "SELECT nome FROM professor WHERE siap=$idOrientador";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $novoorientador = $row['nome'];
	}
}

$query = "SELECT nome FROM professor WHERE siap=$idAvaliador";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $novoavaliador = $row['nome'];
	}
}

$query = "SELECT nome FROM professor WHERE siap=$idAvaliador2";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $novoavaliador2 = $row['nome'];
	}
}



?>

<div class="conteiner">
	<center><h2>Editar TCC</h2><br/>
	<form method="POST" action="../../model/tccDAO.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label"><label>Titulo</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>"></label></div>
	<div class="editor-label"><label>Tema</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="tema"  value="<?php echo htmlspecialchars($tema); ?>"></label></div>
	<div class="editor-label"><label>Orientando</label></div>
	<div class="editor-label">
		<label>
		<select class="form-control" name="aluno">
		<option value="<?php echo htmlspecialchars($aluno); ?>"><?php echo htmlspecialchars($novoaluno); ?></option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM orientando";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['matricula']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
			}
		?>
		</label>
		</select>
	</div>
	<div class="editor-label"><label>Orientador</label></div>
	<div class="editor-field">
		<label>
		<select class="form-control" name="idOrientador">
		<value="<?php echo htmlspecialchars($idOrientador); ?>"><?php echo htmlspecialchars($novoorientador); ?></option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['siap']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
			}
		?>
		</label>
		</select>
	</div>
	<div class="editor-label"><label>Avaliador</label></div>
	<div class="editor-field">
		<label>
		<select class="form-control" name="idAvaliador">
		<option value="<?php echo htmlspecialchars($idAvaliador); ?>"><?php echo htmlspecialchars($novoavaliador); ?></option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['siap']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
		</label>
		</select>
	</div>
	<div class="editor-label"><label>Avaliador 2</label></div>
	<div class="editor-field">
		<label>
		<select class="form-control" name="idAvaliador2">
		<option value="<?php echo htmlspecialchars($idAvaliador2); ?>"><?php echo htmlspecialchars($novoavaliador2); ?></option>
		<?php
			$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['siap']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
				$conexao->close();
				?>
		</label>
		</select>
	</div>
	
    <br>
    <div class="editor-field">
         <button id="edit" name="edit" type="submit" class="btn btn-success">Salvar
         <i class='glyphicon glyphicon-floppy-disk'></i>
         </button>
    </div>
    </form>
    </center>
</div>
</body>
</html>
