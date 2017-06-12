<?php
	/**
	* 
	*/
	class TCC {

		private $titulo;
		private $tema;
		
		function __construct($titulo, $tema){
			$this->titulo = $titulo;
			$this->tema = $tema;
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
	}
?>