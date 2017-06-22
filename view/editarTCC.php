<?php
ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$mysqli = new mysqli("localhost","root","teste", "tcc");
	$query = "UPDATE tcc SET titulo= ?,  tema= ?, idOrientando =?, idOrientador =? WHERE id=?";
	$stmt = $mysqli->stmt_init();
	$stmt->prepare($query);
	$stmt->bind_param('ssdi', $sku, $nome, $price, $id);
	$sku = $_POST['sku'];
	$nome = $_POST['nome'];
	$price = $_POST['price'];
	$id = $_POST['id'];	
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
	header("Location: view.php");
}
?>
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
$mysqli = new mysqli("localhost","root","teste", "catalog");
$id = $_GET['id'];
$query = "SELECT sku, nome, price FROM products WHERE id=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$sku = $row['sku'];
		$nome = $row['nome'];
		$price = $row['price'];
	}
}
?>
<div class="container">
	<h2>Edição de Produto</h2>
	<form method="POST" action="editarTCC.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label"><label>Sku</label></div>
	<div class="editor-field"><input type="text" name="sku" value="<?php echo htmlspecialchars($sku); ?>"></div>
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"></div>
	<div class="editor-label"><label>Preço</label></div>
	<div class="editor-field"><input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>"></div>
	<br>
	<div class="editor-field">
		 <button id="save" name="save" type="submit" class="btn btn-success" value='Atualizar'>Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
	</div>
	</form>
</div>
</body>
</html>