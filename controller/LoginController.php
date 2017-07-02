<?php

include_once('../view/login/LoginView.php');
include_once('../model/Usuario.php');

class LoginController
{
    private $loginView;
 
    function __construct()
    {
        $this->loginView = new LoginView();
    }
 
    public function autenticar()
    {
        $senha = md5($_POST["senha"]);
 
        //Criação do usuario, busca no banco e autenticação
        $usuario = new Usuario();
        $usuario->find($_POST["user"], $senha);
 
        if ($usuario->autenticar()) {
            return true;
        } else {
            $_SESSION['Autenticacao'] = false;
            $this->displayView();
        }
    }
 
    public function displayView()
    {
        $this->loginView->display();
    }

    private function logarAluno($usuario)
    {
        $cliente = new Cliente();
        $cliente->find($usuario->getIdUsuario());
        header("Location: ./ClienteController.php");
    }
 
    private function logarOperador($usuario)
    {
        $operador = new Operador();
        $operador->find($usuario->getIdUsuario());
        $_SESSION['Operador'] =  $operador;
        header("Location: ./OperadorController.php");
    }
}
 
 $controller = new LoginController();
 
if (!isset($_POST["user"])||!isset($_POST["senha"])) {
          $controller->displayView();
} else {
    $controller->autenticar();
}
