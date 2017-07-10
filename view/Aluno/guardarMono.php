<?php

session_start();

$connection = new mysqli("localhost", "root", "teste", "tcc");
$msg = false;
$user = $_SESSION['user'];



if (isset($_FILES['arquivo'])) {
    $nome = $_FILES['arquivo']['name'];

    $diretorio = "../../mono/";

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome)) {
    } 
}
        
$connection->close();
?>

<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	<style>
  		div.formulario { width: 30%; height: 80%; margin: auto; line-height: 2.2; font-size: 15px;}
  		h2{text-align: center}
  	</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Aluno</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./editarUsuario.php">Editar Usuario</a></li>
          <li><a href="./editarAluno.php">Editar Perfil</a></li>
          <li><a href="./excluirAluno.php">Excluir Perfil</a></li>
        </ul>
      </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Submeter Monografia <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./guardarMono.php">Arquivo</a></li>
          <li><a href="./submeter.php">Versão Final</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="formulario">
    <h2>Submeter Monografia</h2><br/>
    <form action="submeter.php" method="POST" enctype="multipart/form-data">
    <div class="editor-label"><label>Arquivo:</label></div>
    <div class="editor-field"><label><input type="file" required name="arquivo"></label></div>
    <br>
    <button id="upload" name="upload" type="submit" class="btn btn-success">Salvar
         <i class='glyphicon glyphicon-floppy-disk'></i>
         </button>

    </form>
    </div>
</div>
</body>
</html>


        