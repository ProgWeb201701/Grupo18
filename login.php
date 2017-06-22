<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="js/jquery.js" type="text/javascript"></script>
</head>

<body>

    <div class="navbar">
    <ul>
        <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li style="float:right">><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li style="float:right">><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
    </ul>
    </div>
    
    <div class="container">
	<center>
	<h2>Login</h2><br/>
	<form method="POST" action="">
	<div class="editor-label"><label>Usuario</label></div>
	<div class="editor-field"><input type="text" name="usuario" placeholder="Nome de Usuario"></div>
	<div class="editor-label"><label>Senha</label></div>
	<div class="editor-field"><input type="password" name="senha" id="senha" placeholder="senha"></div>
	<br>
	<div class="editor-field">
		 <button id="entrar" type="submit" class="btn btn-success" value="Entrar">Entrar
		 <i class='glyphicon glyphicon-log-in'></i>
		 </button>
	</div>
	</form>
	</center>
</div>
</body>

</html>