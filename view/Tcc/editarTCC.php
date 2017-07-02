<?php
$conexao = mysqli_connect("localhost", "root", "teste", "tcc");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
</head>
<body>

<div class="navbar">
    <ul>
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href="#" id="clique">Acompanhar Avaliação</a></li>
		<li><a href="viewTCC.php" id="clique">Visualizar TCC</a></li>
    </ul>
</div>

<?php
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$id = $_GET['id'];
$query = "SELECT titulo, tema FROM tcc  WHERE idTcc=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$titulo = $row['titulo'];
		$tema = $row['tema'];
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
		<select class="form-control" name="idAluno">
		<option>Selecione</option>
		<?php
			$sql = "SELECT * FROM orientando";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['idAluno']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
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
		<option>Selecione</option>
		<?php
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['idProfessor']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
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
		<option>Selecione</option>
		<?php
			$sql = "SELECT * FROM professor";
			$sql = mysqli_query($conexao, $sql);
			while ($row_result =mysqli_fetch_assoc($sql)) { ?>
				<option value="<?php echo $row_result['idProfessor']; ?>"> <?php echo $row_result['nome']; ?> </option>
				<?php
				}
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
