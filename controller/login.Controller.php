<?php
session_start();
require_once '../model/login.php';

$controlador = new loginController();

@$proceso = $_REQUEST['petition'];

switch ($proceso){
    
    case("inicioSession"):
        $controlador->validalogin($_REQUEST['username'],$_REQUEST['password']);
    break;

    case("unlog"):
        $controlador->unlog();
    break;
}

class loginController {
    

    public function frmlogin() {

      include_once 'view/formularios/login/frmLogin.php';
      
    }
    public function validalogin(){
        
        $login = new login();
        
         $username = $_REQUEST['username'];
         $password = $_REQUEST['password'];
       
        $validar = $login->validacion($username, $password);
        
        if ($validar == 0){
            
           echo "<script>alert('El usuario y contrasena son incorrectas')</script>";
           
            echo '<meta http-equiv="refresh" content="0; url="/>';
            
        }
        elseif ($validar == 1){
            
            $informacion = $login->loadUsuario($username);
           
            $_SESSION['usu_id'] = $informacion[0]['pk_usu_id'];
            $_SESSION['usu_username'] = $informacion[0]['usu_username'];
            $_SESSION['name'] = $informacion[0]['usu_primer_nombre'];
            $_SESSION['lastname'] = $informacion[0]['usu_primer_apellido'];
            

          echo '<meta http-equiv="refresh" content="0; url="/>';
        }
        
    }
    
    public function unlog(){
          
       session_destroy();    
        echo '<meta http-equiv="refresh" content="0; url="/>';
        
    }

}
