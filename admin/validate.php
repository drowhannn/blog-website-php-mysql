<?php 

    $email=$_POST['email'];
    $pw=$_POST['password'];

    if($email && $pw){
       include('../db/dbconnection.php');

       $sql="SELECT userId,username,email,role, password from users where email='$email' and password='$pw' and (role='Admin' or role='Super Admin')";
       $result=$conn->query($sql);
       if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            session_start();
            $_SESSION['adminLogin']=true;
            $_SESSION['adminId']=$row['userId'];
            $_SESSION['adminName']=$row['username'];
            $_SESSION['adminRole']=$row['role'];
           header("Location: admin.php");
        }
    }else{
        header("Location: login.php?error=true");
    }
    }

?>