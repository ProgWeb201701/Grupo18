<?php
	
class Avaliador
{

   function save($connection, $idProfessor)
    {

        $sql = "SELECT idProfessor FROM avaliador WHERE idProfessor = $idProfessor";

        $result = $connection->query($sql);

        if ($result->num_rows != 0){
            echo 'Avaliador Já Cadastrado<br/>';
        }else{
            $sql = "INSERT INTO `avaliador`(`idProfessor`)
            VALUES ($idProfessor)";
            $connection->query($sql);
        }
        

    }
}
	
?>