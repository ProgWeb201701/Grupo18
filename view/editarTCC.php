
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			
		});
	</script>
</head>
<body>
<?php
ini_set('display_errors', 1);
$mysqli = new mysqli("localhost","root","teste", "tcc");
$id = $_GET['id'];
$query = "SELECT titulo, tema FROM tcc WHERE idTcc=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$titulo = $row['titulo'];
		$tema = $row['tema'];
	}
}
?>
<div class="container">
	<h2>Edição de Produto</h2>
	<form method="POST" action="../model/tccDAO.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label"><label>Titulo</label></div>
	<div class="editor-field"><input type="text" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>"></div>
	<div class="editor-label"><label>Tema</label></div>
	<div class="editor-field"><input type="text" name="tema" value="<?php echo htmlspecialchars($tema); ?>"></div>
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