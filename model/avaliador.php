<?php
	
class Avaliador
{
    private $idProfessor;

	function __contruct($idProfessor){
		$this->idProfessor = $idProfessor;
	}
        

    public function setId($idProfessor)
    {
        $this->idProfessor = $idProfessor;
    }

    function findIdAvaliador($connection)
    {

        $sql = "SELECT idAvaliador FROM avaliador WHERE idProfessor = $this->idProfessor";
		
		$result = $connection->query($sql);
        $result = $result->fetch_array(MYSQLI_ASSOC);


        if (count($result) == 1) {
            return $result["idAvaliador"];
        }

        
    }

   function save($connection)
    {

        $sql = "SELECT idProfessor FROM avaliador WHERE idProfessor = $this->idProfessor";

        $result = $connection->query($sql);

        if ($result->num_rows != 0){
            echo 'Avaliador Já Cadastrado<br/>';
        }else{
            $sql = "INSERT INTO `avaliador`(`idAvaliador`, `idProfessor`)
            VALUES (null, $this->idProfessor)";
            $connection->query($sql);
        }
        

    }
}
	
?>