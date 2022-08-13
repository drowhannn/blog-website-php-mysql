<?php 
    session_start();
    
    if(isset($_SESSION['adminLogin'])){
        header("location: admin.php");
    }else{
        include("login.php");
    }

?>