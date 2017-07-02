
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="../js/jquery.min.js"></script>
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
		<li><a href="#" id="clique">Acompanhar Avaliação</a></li>
		<li><a href="viewTCC.php" id="clique">Visualizar TCC</a></li>
    </ul>
</div>

<?php
$id = $_GET['id'];
?>
<div class="container" align='center'>
	<h2>Editar TCC</h2>
	<form method="POST" action="../../model/tccDAO.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-field">
		 <button id="delet" name="delet" type="submit" class="btn btn-danger" value='Atualizar'>Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
	</div>
	</form>
</div>
</body>
</html>