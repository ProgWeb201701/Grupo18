<?php
	/**
	* 
	*/
	class Coordenador{

		private $nome_coordenador;
		
		function __construct($nome_coordenador)
		{
			$this->nome_coordenador = $nome_coordenador;
		}

		public function get_nome_coordenador(){
			return $this->nome_coordenador;
		}

		public function set_nome_coordenador($nome){
			$this->nome = $nome_coordenador;
		}
	}
?>