

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			
		});
	</script>
</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li><a href=""><span class="glyphicon glyphicon-upload"></span> Submeter</a></li>
        <li style="float:right">><a href="../login.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
		<li style="float:right">><a href="editarAluno.php"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
    </ul>
</div>

<?php
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$id = $_GET['id'];
$query = "SELECT nome, matricula, curso, instituicao FROM orientando WHERE idAluno=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$nome = $row['nome'];
		$matricula = $row['matricula'];
        $curso = $row['curso'];
        $instituicao = $row['instituicao'];
	}
}
?>
<div class="container">
	<h2>Dados do Cliente</h2>
	<form method="POST" action="../model/alunoDAO.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>"></div>
	<div class="editor-label"><label>Matricula</label></div>
	<div class="editor-field"><input type="text" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"></div>
    <div class="editor-label"><label>Curso</label></div>
	<div class="editor-field"><input type="text" name="curso" value="<?php echo htmlspecialchars($curso); ?>"></div>
    <div class="editor-label"><label>Instituição</label></div>
	<div class="editor-field"><input type="text" name="instituicao" value="<?php echo htmlspecialchars($instituicao); ?>"></div>
	<br>
	<div class="editor-field">
		 <button id="edit" name="edit" type="submit" class="btn btn-success" value='Atualizar'>Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
	</div>
	</form>
</div>
</body>
</html>