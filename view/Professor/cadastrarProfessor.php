<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="../Aluno/cadastrarAluno.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Aluno</a></li>
		<li><a href="cadastrarProfessor.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Professor</a></li>
		<li style="float:right">><a href="../Login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</div>


<div class="container">
	<center>
	<h2>Cadastrar Professor</h2>
	<form method="POST" action="../../model/professorDAO.php">
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="nome"></label></div>
	<div class="editor-label"><label>Instituição</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="instituicao"></label></div>
	<div class="editor-label"><label>E-mail</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="email"></label></div>
	<div class="editor-label"><label>Titulação</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="titulacao"></label></div>
    <div class="editor-label"><label>Área de Atuação</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="area"></label></div>
	<br>
	<div class="editor-field">
		 <button id="save" name ="save" type="submit" class="btn btn-success">Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
	</div>
	</form>
	</center>
</div>


</body>
</html>