<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	<script src="../js/jquery.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
	<h2>Cadastrar Professor</h2><br/>
	<form method="POST" action="../model/professorDAO.php">
	<div class="editor-label"><label>Nome</label></div>
	<div class="editor-field"><input type="text" name="nome"></div>
	<div class="editor-label"><label>Instituição</label></div>
	<div class="editor-field"><input type="text" name="instituicao"></div>
	<div class="editor-label"><label>E-mail</label></div>
	<div class="editor-field"><input type="text" name="email"></div>
	<div class="editor-label"><label>Titulação</label></div>
	<div class="editor-field"><input type="text" name="titulacao"></div>
    <div class="editor-label"><label>Área de Atuação</label></div>
	<div class="editor-field"><input type="text" name="area"></div>
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