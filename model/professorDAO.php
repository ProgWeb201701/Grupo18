<?php

	//class ProfessorDAO {

	//	function inserir_professor(){
			$mysqli = new mysqli("localhost","root","teste", "tcc");
        	$query = "INSERT INTO professor SET idProfessor=NULL, nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, area=?";
        	$stmt = $mysqli->stmt_init();
        	$stmt->prepare($query);
        	$stmt->bind_param('sssss', $nome, $instituicao, $email, $titulacao, $area);
        	$nome = $_POST['nome'];
			$instituicao = $_POST['instituicao'];
			$email = $_POST['email'];
			$titulacao = $_POST['titulacao'];
			$area = $_POST['area'];
        	$stmt->execute();
        	$stmt->close();
        	$mysqli->close();
/*		}

		}

		function editar_professor(){
			$query = "UPDATE professor SET nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, area=? WHERE idProfessor=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('sssssi', $nome, $instituicao, $email, $titulacao, $area_atuacao, $id);
			$nome = $_POST['nome'];
			$instituicao = $_POST['instituicao'];
			$email = $_POST['email'];
			$titulacao = $_POST['titulacao'];
			$area_atuacao = $_POST['areaAtuacao'];
			$id = $_POST['idProfessor'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}

		function deletar_professor($id){
			$query = "DELETE FROM professor WHERE idProfessor=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('i', $id);
			$id = $_GET['id'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}
	}*/
?>