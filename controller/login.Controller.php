<?php

require_once 'model/login.php';

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
           echo '<meta http-equiv="refresh" content="0; url=?action=login&petition=frmlogin" />';
            
        }
        elseif ($validar == 1){
                        
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            
             echo "<script>alert('Bienvenido a GESTIV 2.0')</script>"; 
             
              echo '<meta http-equiv="refresh" content="0; url=?" />';
        }
        
    }
    
    public function unlog(){
        
        session_destroy();
        
        echo '<meta http-equiv="refresh" content="0; url=?" />';
    }

}
