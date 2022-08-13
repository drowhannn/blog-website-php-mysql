<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        $email=$_POST['email'];
        $pw=$_POST['password'];
        $role=$_POST['role'];
        $avatar=$_POST['avatar'];
        $name=$_POST['username'];

        include("../db/dbconnection.php");

        $sql="INSERT into users values(null,'$email','$pw','$role','$avatar','$name')";
        try{
            $result=$conn->query($sql);
            header("Location: addNewUser.php?success=true");
        }catch(Exception $e){
            header("Location: addNewUser.php?error=true");
        }
      

    }
}



?>