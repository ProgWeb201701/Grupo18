
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
$query = "SELECT nome, email, area, instituicao, titulacao, senha FROM professor WHERE idProfessor=$id";
$result = $mysqli->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$nome = $row['nome'];
		$email = $row['email'];
        $area = $row['area'];
		$instituicao = $row['instituicao'];
        $titulacao = $row['titulacao'];
		$senha = $row['senha'];
	}
}
?>

<div class="container">
	<h2>Editar Dados Professor</h2>
	<form method="POST" action="../model/professorDAO.php">
	<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>"></div>
	<div class="editor-label"><label>Email</label></div>
	<div class="editor-field"><input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"></div>
    <div class="editor-label"><label>Área de Atuação</label></div>
	<div class="editor-field"><input type="text" name="area" value="<?php echo htmlspecialchars($area); ?>"></div>
	<div class="editor-label"><label>Instituição</label></div>
	<div class="editor-field"><input type="text" name="instituicao" value="<?php echo htmlspecialchars($instituicao); ?>"></div>
    <div class="editor-label"><label>Titulação</label></div>
	<div class="editor-field"><input type="text" name="titulacao" value="<?php echo htmlspecialchars($titulacao); ?>"></div>
	 <div class="editor-label"><label>Senha</label></div>
	<div class="editor-field"><input type="text" name="senha" value="<?php echo htmlspecialchars($senha); ?>"></div>
	
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