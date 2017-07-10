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
      <a class="navbar-brand" href="#">Avaliador</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">TCC <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="avaliadorView.php">Visualizar TCC</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="acompanharTCC.php">Acompanhar TCC</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mudar Perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../Professor/editarProfessor.php">Professor</a></li>
          <li><a href="../Orientador/acompanharTCC.php">Orientador</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
  </div>
</nav>
<?php

$id = $_GET['id'];
session_start();
include_once('../../data.base.connection/DBConnection.php');
$connection = DBConnection::open();
$query = "SELECT idTcc FROM tcc WHERE aluno=$id";
$result = $connection->query($query,MYSQLI_STORE_RESULT);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        $idTcc = $row['idTcc'];
	}
}
$_SESSION['idTcc'] = $idTcc;

?>
<div class="container" align='center'>
    <h2>Avaliação de TCC</h2>
    <form method="POST" action="salvarAvaliacao.php" enctype="multipart/form-data">
    <div class="editor-label"><label>Nota</label></div>
    <div class="editor-field"><label><input class="form-control" required type="number" name="nota" max="10.0" min="0.0" value="" step="0.10"></label></div>
    <div class="editor-label"><label>Parecer</label></div>
    <div class="editor-field"><label><input type="text" class="form-control" required name="parecer" value=""></input></div>
    <div class="editor-label"><label>Comentários:</label></div>
    <div class="editor-field"><label><input type="file" name="arquivo"></label></div>
    <br>
    <div class="editor-field">
         <button id="edit" name="enviar" type="submit" class="btn btn-success" value='Enviar'>Salvar
         <i class='glyphicon glyphicon-floppy-disk'></i>
         </button>
    </div>
    </form>
</div>
</body>
</html>
