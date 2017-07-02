<?php



ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user = $_POST['user'];
	$senha = $_POST['senha'];

	$mysqli = new mysqli("localhost","root","teste", "tcc");
	$sql = "SELECT * FROM usuario WHERE user = $user AND senha = $senha";

	$result = $mysqli->query($sql);
    $resultArray = $result->fetch_array(MYSQLI_ASSOC);
    $nivel = $resultArray['niveldeacesso'];
    echo $nivel;

    if($result->num_rows == 1){
    	echo 'Login';
    	switch ($nivel) {
    		case '1':
    			header("Location: teste/view/submeter.php");
    			break;
    		
    		case '2':
    			header("Location: teste/view/Professor/viewProfessor.php");
    			break;
    	}
    }


    /*$userValida = $resultArray['user'];
    $senhaValida = $resultArray['senha'];

           echo $userValida;
           echo $senhaValida;

	if($userValida == $user){
		if($senhaValida == $senha){
			echo 'Login';
		}else{
			echo 'Senha Inválida';
		}
	} else {
		echo 'Usuario e Senha Invalidos';
	}*/
}

?>

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
        <li><a href="../Aluno/cadastrarAluno.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Aluno</a></li>
		<li><a href="../Professor/cadastrarProfessor.php"><span class="glyphicon glyphicon-save"></span> Cadatrar Professor</a></li>
		<li style="float:right">><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</div>

<div class="container">
	<center>
	<h2>Login</h2>
	<form method="POST" action="login.php">
		<div class="editor-label"><label>Usuario</label></div>
		<div class="editor-field"><label><input class="form-control" type="text" name="user"></label></div>
		<div class="editor-label"><label>Senha</label></div>
		<div class="editor-field"><label><input class="form-control" type="password" name="senha"></label></div>
		<br>
		<div class="editor-field">
        <button id="login" name="login" type="submit" class="btn btn-success">Login
        <i class='glyphicon glyphicon-log-in'></i>
        </button>
	</form>
	</center>
</div>
</body>
</html>