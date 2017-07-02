<?php

        $connection = new mysqli("localhost", "root", "teste", "tcc");

        $msg = false;

if (isset($_FILES['arquivo'])) {
    //$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $nome = $_FILES['arquivo']['name'];
    $nome = str_replace(" ", "_", $nome);
    $nome = str_replace("ç", "c", $nome);

        

    $diretorio = "../upload/";

    //$nome = strtolower(substr($_FILES['arquivo']['name'], 0, -4));

    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome)) {
        echo "Arquivo Submetido";
    } else {
        echo "Erro ao Submeter Arquivo";
    }

    $sql = "INSERT INTO arquivo (codigo, arquivo) VALUES(null, '$nome')";

            
    if ($connection->query($sql)) {
        $mgs = "Arquivo enviado com sucesso";
    } else {
        $msg = "Falha ao enviar arquivo";
    }
}
        
$connection->close();
?>

<?php if ($msg != false) {
    echo "<p> $msg </p>";
} ?>

<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
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
		<li><a href="submeter.php"><span class="glyphicon glyphicon-upload"></span> Submeter</a></li>
        <li style="float:right">><a href="../Login/login.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
		<li style="float:right">><a href="Aluno/editarAluno.php"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
    </ul>
</div>

<div class="container">
    <center>
    <h2>Submeter Monografia</h2><br/>
    <form action="submeter.php" method="POST" enctype="multipart/form-data">
    <div class="editor-label"><label>Arquivo:</label></div>
	<div class="editor-field"><label><input type="file" required name="arquivo"></label></div>
    <br>
    <button id="upload" name="upload" type="submit" class="btn btn-success">Salvar
         <i class='glyphicon glyphicon-floppy-disk'></i>
         </button>

    </form>
    </center>
</div>
</body>
</html>


        