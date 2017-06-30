<?php

        $connection = new mysqli("localhost", "root", "teste", "tcc");

        $msg = false;

        if(isset($_FILES['arquivo'])){
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
            $nome = $_FILES['arquivo']['name'];
            $diretorio = "upload/";

            //$nome = strtolower(substr($_FILES['arquivo']['name'], 0, -4));

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome);

            $sql = "INSERT INTO arquivo (codigo, arquivo, dataArq) VALUES(null, '$nome', NOW())";

            
           if($connection->query($sql))
               $mgs = "Arquivo enviado com sucesso";
            else 
                $msg = "Falha ao enviar arquivo";


        }
        

?>

<?php if($msg != false) echo "<p> $msg </p>" ?>

<h1> Submeter Monografia</h1>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" required name="arquivo">
    <input type="submit" value="Salvar">

</form>

        