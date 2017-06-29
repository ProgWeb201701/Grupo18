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
		<li><a href="#" id="clique">Acompanhar Avaliação</a></li>
		<li><a href="viewTCC.php" id="clique">Visualizar TCC'S</a></li>
        <li style="float:right">><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
    </ul>
</div>

<div class="conteiner">
	<center><h2>Cadastrar TCC</h2><br/>
	<form method="POST" action="../model/tccDAO.php">
	<div class="editor-label"><label>Titulo</label></div>
	<div class="editor-field"><input type="text" name="nome"></div>
	<div class="editor-label"><label>Tema</label></div>
	<div class="editor-field"><input type="text" name="matricula"></div>
	<div class="editor-label"><label>Orientando</label></div>
	<div class="editor-field"><input type="text" name="instituicao"></div>
	<div class="editor-label"><label>Coordenador</label></div>
	<div class="editor-field"><input type="text" name="curso"></div>



	<?php
	$mysqli = new mysqli("localhost", "root", "teste", "tcc");
	$query = "SELECT idProfessor, nome FROM professor";
	$result = $mysqli->query($query, MYSQLI_STORE_RESULT)
	?>

	<select>
    	<?php while($reg = $query->fetch_array()) { ?>
        	<option value="<?php echo $reg['idProfessor']; ?>">
            	<?php echo $reg['nome']; ?>
        	</option>
    	<?php } ?>
	</select>





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