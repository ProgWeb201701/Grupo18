<?php
    

class Orientador
{
    private $idProfessor;

	function __contruct($idProfessor){
		$this->idProfessor = $idProfessor;
	}
        

    public function setId($idProfessor)
    {
        $this->idProfessor = $idProfessor;
    }

    function findIdOrientador($connection)
    {

        $sql = "SELECT idOrientador FROM orientador WHERE idProfessor = $this->idProfessor";
		
		$result = $connection->query($sql);
        $result = $result->fetch_array(MYSQLI_ASSOC);


        if (count($result) == 1) {
            return $result["idOrientador"];
        }

        
    }

    function save($connection)
    {

        $sql = "SELECT idProfessor FROM orientador WHERE idProfessor = $this->idProfessor";

        $result = $connection->query($sql);

        if ($result->num_rows != 0){
            echo 'Orientador Já Cadastrado<br/>';
        }else{
            $sql = "INSERT INTO `orientador`(`idOrientador`, `idProfessor`)
            VALUES (null, $this->idProfessor)";
            $connection->query($sql);
        }
        

    }
}

?>
