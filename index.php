<?php
session_start();
if (!@$_SESSION['usu_username']){  
    
    include"view/forms/frmLogin.php";   
}else{
    
    include"view/forms/layout.php";
}
?>
