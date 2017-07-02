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
        <li><a href="cadastrarAluno.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Aluno</a></li>
		<li><a href="../Professor/cadastrarProfessor.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Professor</a></li>
		<li style="float:right">><a href="../Login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</div>

<div class="container">
	<center>
	<h2>Cadastrar Aluno</h2>
	<form method="POST" action="../../model/alunoDAO.php">
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="nome"></label></div>
	<div class="editor-label"><label>Matricula</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="matricula"></label</div>
	<div class="editor-label"><label>Instituição</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="instituicao"></label</div>
	<div class="editor-label"><label>Curso</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="curso"></label></div>
	<div class="editor-label"><label>Senha</label></div>
	<div class="editor-field"><label><input class="form-control" type="text" name="senha"></label></div>
	
	<br>
	<div class="editor-field">
		 <button id="save" name="save" type="submit" class="btn btn-success">Salvar
		 <i class='glyphicon glyphicon-floppy-disk'></i>
		 </button>
	</div>
	</form>
	</center>
</div>
</body>
</html>