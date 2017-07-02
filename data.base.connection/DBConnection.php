 <?php
 
 final class DBConnection
 {
    static $connection;
 
     public static function open()
     {
         $hostDB = "localhost";
         $usuarioDB = "root";
         $senhaDB = "teste";
         $nomeDB = "tcc";
         $connection = new mysqli($hostDB, $usuarioDB, $senhaDB, $nomeDB);
 
        if ($connection->connect_error) {
            die("Erro na conexão com o banco de dados: " . $connection->connect_error);
        } else {
            return $connection;
        }
     }
 }