<?php
session_start();
if (!@$_SESSION['username']){  
    
    include"view/forms/frmLogin.php";   
}else{
    
    include"view/forms/layout.php";
}
?>
