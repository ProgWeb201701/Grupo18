<?php
	
	/**
	* 
	*/
	class Conexao{
		
		function conexao_banco(){
			new msqli("localhost","root","123","web");
		}

	}

?>