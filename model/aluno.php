<?php


	class Aluno{
		private $nome_aluno;
		private $matricula;
		private $curso;
		private $instituicao;
		
		/*function __construct($nome_aluno, $matricula, $curso, $instituicao){
			$this->nome_aluno = $nome_aluno;
			$this->matricula = $matricula;
			$this->curso = $curso;
			$this->instituicao = $instituicao;
		}
*/
		public function get_nome_aluno(){
			return $this->nome;
		}

		public function get_matricula(){
			return $this->matricula;
		}

		public function get_curso(){
			return $this->curso;
		}

		public function get_instituicao(){
			return $this->instituicao;
		}

		public function set_nome_aluno($nome){
			$this->nome = $nome_aluno;

		}

		public function set_matricula($matricula){
			$this->matricula = $matricula;
		}

		public function set_curso($curso){
			$this->curso = $curso;
		}

		public function set_instituicao($instituicao){
			$this->instituicao = $instituicao;

		}

		public function findIdAluno($matricula, $senha)
     	{
         $connection = new mysqli("localhost","root","teste", "tcc");
 
        $sql = "SELECT idAluno FROM orientando WHERE matricula='$matricula'";
 
         $result = $connection->query($sql);
         $resultArray = $result->fetch_array(MYSQLI_ASSOC);
 
         if ($result->num_rows == 1) {
             $this->idAluno = $resultArray['idAluno'];
         }
 
         $connection->close();
         return $idAluno;
     }

	}

?>