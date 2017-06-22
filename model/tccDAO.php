<?php

	include_once 'C:/wamp64/www/Web/conexao.php';
	/**
	* 
	*/
	class AlunoDAO{
		$conexao = new Conexao();
		$conexao->conexao_banco();

		public function inserir_tcc(){
			$query = "INSERT INTO aluno SET idTCC=NULL, titulo= ?,  tema= ?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('ssi', $titulo, $tema, $id);
			$titulo = $_POST['titulo'];
			$tema = $_POST['tema'];
			$id = $_POST['idTCC'];
			$stmt->close();
			$conexao->close();
		}

		}

		public function editar_tcc($id){
			$query = "UPDATE aluno SET nome=?, matricula=?, curso=?, instituicao=? WHERE idTCC=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('ssi', $titulo, $tema, $id);
			$titulo = $_POST['titulo'];
			$tema = $_POST['tema'];
			$id = $_POST['idTCC'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}

		public function deletar_tcc($id){
			$query = "DELETE FROM aluno WHERE idTCC=?";
			$stmt = $mysqli->stmt_init();
			$stmt->prepare($query);
			$stmt->bind_param('i', $id);
			$id = $_GET['idTCC'];
			$stmt->execute();
			$stmt->close();
			$conexao->close(); //fechando a conexão
		}
	}
?>