<?php
	/**
	* 
	*/
	class Avaliador extends Professor
	{
		
		private $nota_TCC;

		function __construct($nota_TCC)
		{
			$this->nota_TCC = $nota_TCC;
		}

		public function get_nota_TCC(){
			return $this->nota_TCC;
		}

		public function set_nota_TCC($nota){
			$this->nota = $nota_TCC;
		}
	}
?>