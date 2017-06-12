<?php

	include_once 'C:/wamp64/www/Web/conexao.php';
	/**
	* 
	*/
	class AlunoDAO{
		$conexao = new Conexao();
		$conexao->conexao_banco();

		public function inserir_aluno(){
			$query = "INSERT INTO aluno SET idAluno=NULL, nome= ?,  matricula= ?,  curso= ?,  instituicao= ?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('sissi', $nome_aluno, $matricula, $curso, $instituicao, $id);
			$nome_aluno = $_POST['nome'];
			$matricula = $_POST['matricula'];
			$curso = $_POST['curso'];
			$instituicao = $_POST['instituicao'];
			$id = $_POST['idAluno'];
			$stmt->close();
			$conexao->close();
		}

		}

		public function editar_aluno($id){
			$query = "UPDATE aluno SET nome=?, matricula=?, curso=?, instituicao=? WHERE idAluno=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('sissi', $nome_aluno, $matricula, $curso, $instituicao, $id);
			$nome_aluno = $_POST['nome'];
			$matricula = $_POST['matricula'];
			$curso = $_POST['curso'];
			$instituicao = $_POST['instituicao'];
			$id = $_POST['idAluno'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}

		public function deletar_aluno($id){
			$query = "DELETE FROM aluno WHERE idAluno=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('i', $id);
			$id = $_GET['idAluno'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}
	}
?>