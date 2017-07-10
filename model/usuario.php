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
         return $idUsuario;
     }

     public function inserirUsuario($matricula, $senha, $nivel){
        $connection = DBConnection::open();
        $sql = "INSERT INTO usuario (`senha`, `user`, `niveldeacesso`) VALUES ('$senha', '$matricula', '$nivel')";
        $connection->query($sql);
        $connection->close();
     }


 }