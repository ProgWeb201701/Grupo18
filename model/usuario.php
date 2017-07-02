 <?php
include_once('../data.base.connection/DBConnection.php');

 class Usuario
 {
     private $usuario;
     private $senha;
     private $idUsuario;
 
     function __construct()
     {
     }

     public function setUsuario(String $usuario)
     {
         $this->usuario = $usuario;
     }
 
     public function setSenha(String $senha)
     {
         $this->senha = $senha;
     }
 
     public function getUsuario()
     {
         return $this->usuario;
     }
 
     public function getSenha()
     {
         return $this->senha;
     }
 
     public function getIdUsuario()
     {
         return $this->idUsuario;
     }

     public function autenticar()
     {
         if ($this->usuario != null && $this->senha != null) {
             return true;
         } else {
             return false;
         }
     }

     public function save()
    {
         $connection = DBConnection::open();

        $sql = "INSERT INTO usuario (user, senha)
        VALUES ('$this->usuario','$this->senha')";
        $connection->query($sql);
        $idUsuario =  $connection->insert_id;        
         $connection->close();
        return $idUsuario;
     }
     public function update()
     {
     }
     public function delete()
     {
     }
    public function find($usuario, $senha)
     {
         $connection = DBConnection::open();
 
        $sql = "SELECT * FROM usuario WHERE senha='$senha' AND user='$usuario'";
 
         $result = $connection->query($sql);
         $resultArray = $result->fetch_array(MYSQLI_ASSOC);
 
         if ($result->num_rows == 1) {
             $this->usuario = $resultArray['user'];
             $this->senha = $resultArray['senha'];
             $this->idUsuario = $resultArray['idUsuario'];
         }
 
         $connection->close();
     }
 }