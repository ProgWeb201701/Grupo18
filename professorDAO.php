<?php

	include_once 'C:/wamp64/www/Web/conexao.php';
	/**
	* 
	*/
	class ProfessorDAO {
		$conexao = new Conexao();
		$conexao->conexao_banco();

		public function inserir_professor(){
			$query = "INSERT INTO professor SET idProfessor=NULL, nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, areaAtuacao=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('sssssi', $nome_professor, $instituicao, $email, $titulacao, $area_atuacao, $id);
			$nome = $_POST['nome'];
			$instituicao = $_POST['instituicao'];
			$email = $_POST['email'];
			$titulacao = $_POST['titulacao'];
			$area_atuacao = $_POST['areaAtuacao'];
			$id = $_POST['idProfessor'];
			$stmt->execute();
			$stmt->close();
			$conexao->close();
		}

		}

		public function editar_professor($id){
			$query = "UPDATE professor SET nome= ?,  instituicao= ?,  email= ?,  titulacao= ?, areaAtuacao=? WHERE idProfessor=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('sssssi', $nome_professor, $instituicao, $email, $titulacao, $area_atuacao, $id);
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

		public function deletar_professor($id){
			$query = "DELETE FROM professor WHERE idProfessor=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('i', $id);
			$id = $_GET['id'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}
	}
?>