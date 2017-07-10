<?php
    

class Orientador
{
 

    function save($connection, $idProfessor)
    {

        $sql = "SELECT idProfessor FROM orientador WHERE idProfessor = $idProfessor";

        $result = $connection->query($sql);

        if ($result->num_rows != 0){
            echo 'Orientador Já Cadastrado<br/>';
        }else{
            $sql = "INSERT INTO `orientador`(`idProfessor`)
            VALUES ($idProfessor)";
            $connection->query($sql);
        }
        

    }
}

?>
