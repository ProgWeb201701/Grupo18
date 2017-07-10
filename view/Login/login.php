<?php
include_once('../../model/aluno.php');

session_start();

ini_set('display_errors', 1);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user = $_POST['user'];
	$senha = $_POST['senha'];
	
	$_SESSION['user'] = $user;
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
    			header("Location: ../Aluno/submeter.php");
    			break;
    		
    		case '2':
    			header("Location: ../Professor/editarProfessor.php");
    			break;

			case '3':
    			header("Location: ../Tcc/CadastrarTCC.php");
    			break;
    	}
    }

}

?>
