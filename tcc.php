<?php
	/**
	* 
	*/
	class TCC {

		private $titulo;
		private $tema;
		private $resumo;
		// Precisa anexar arquivo //
		
		function __construct($titulo, $tema, $resumo){
			$this->titulo = $titulo;
			$this->tema = $tema;
			$this->resumo = $resumo
		}

		public function get_titulo(){
			return $this->titulo;
		}

		public function get_tema(){
			return $this->tema;
		}

		public function set_titulo($titulo){
			$this->titulo = $titulo;
		}

		public function set_tema($tema){
			$this->tema = $tema;
		}

		public function set_resumo($resumo){
			$this->resumo = $resumo;
		}

		public function set_resumo($resumo){
			$this->resumo = $resumo;
		}
	}
?>