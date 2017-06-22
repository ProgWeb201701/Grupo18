<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>

</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li style="float:right">><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li style="float:right">><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
    </ul>
</div>

<div class="container">
	<center>
	<h2>Cadastrar Aluno</h2>
	<form method="POST" action="../model/alunoDAO.php">
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><input type="text" name="nome"></div>
	<div class="editor-label"><label>Matricula</label></div>
	<div class="editor-field"><input type="text" name="matricula"></div>
	<div class="editor-label"><label>Instituição</label></div>
	<div class="editor-field"><input type="text" name="instituicao"></div>
	<div class="editor-label"><label>Curso</label></div>
	<div class="editor-field"><input type="text" name="curso"></div>
	<br>
	<div class="editor-field">
		 <button id="save" type="submit" class="btn btn-success">Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
	</div>
	</form>
	</center>
</div>
</body>
</html>