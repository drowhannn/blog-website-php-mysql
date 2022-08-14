<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        $userId=$_POST['id'];
        $email=$_POST['email'];
        $pw=$_POST['password'];
        $role=$_POST['role'];
        if($role=='Super Admin' && $_SESSION['adminRole']=='Admin'){
            $role="Admin";
        }
        $avatar=$_POST['avatar'];
        $name=$_POST['username'];

        include("../db/dbconnection.php");

        $sql="UPDATE users set email='$email', password='$pw', role='$role', avatar='$avatar', username='$name' where userId='$userId'";
        try{
            $result=$conn->query($sql);
            if($_SESSION['adminId']==$userId){
                $_SESSION['adminRole']=$role;
                $_SESSION['adminName']=$name;
                if($role=='Member') {
                    header("Location: logout.php");
                }else{
                header("Location: editUser.php?success=true&userId=$userId");
                }
            }else{
                header("Location: editUser.php?success=true&userId=$userId");
            }
        }catch(Exception $e){
            header("Location: editUser.php?error=true&userId=$userId");
        }
      

    }
}



?>