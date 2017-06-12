<?php
	/**
	* 
	*/
	class Professor{
		
		private $nome_professor;
		private $instituicao;
		private $email;
		private $titulacao;
		private $area_atuacao;

		function __construct($nome_professor, $instituicao, $email, $titulacao, $area_atuacao){
			$this->nome_professor = $nome_professor;
			$this->instituicao = $instituicao;
			$this->email = $email;
			$this->titulacao = $titulacao;
			$this->area_atuacao = $area_atuacao;
		}

		public function get_nome_professor(){
			return $this->nome_professor;
		}

		public function get_instituicao(){
			return $this->instituicao;
		}

		public function get_email(){
			return $this->email
		}

		public function get_titulacao(){
			return $this->titulacao
		}

		public function get_are_atuacao(){
			return $this->area_atuacao
		}

		public function set_nome_professor($nome){
			$this->nome = $nome_professor;
		}

		public function set_instituicao($instituicao){
			$this->instituicao = $instituicao;
		}

		public function set_email($email){
			$this->email = $email;
		}

		public function set_titulacao($titulacao){
			$this->titulacao = $titulacao;
		}

		public function set_are_atuacao($area_atuacao){
			$this->area_atuacao = $area_atuacao;
		}


	}
?>