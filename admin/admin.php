<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){
        $title="Admin Dashboard";

        header("Location: users.php");
    }
}



?>