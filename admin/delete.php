<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        include('../db/dbconnection.php');
        if(isset($_GET['userId'])){
            $userId=$_GET['userId'];
            if($userId==$_SESSION['adminId']){
                header("Location: users.php?error=selfdel");
            }else{
                $sql="SELECT role from users where userId='$userId'";
                try{
                    $result=$conn->query($sql);
                    $row=$result->fetch_assoc();
                    if($row['role']=="Super Admin" && $_SESSION['adminRole']!="Super Admin"){
                        header("Location: users.php?error=superadmin");
                    }else{

                        $sql="DELETE from users where userId='$userId'";
                        try{
                            $result=$conn->query($sql);
                            header("Location: users.php?success=true");
            
                        }catch(Exception $e){
                            header(("Location: users.php?error=true"));
                        }
                    }
                }catch(Exception $e){
                    header(("Location: users.php?error=true"));
                }
    
            }
          
        }
        if(isset($_GET['categoryId'])){
            $categoryId=$_GET['categoryId'];
            $sql="DELETE from categories where categoryId='$categoryId'";
            try{
                $result=$conn->query($sql);
                header("Location: categories.php?success=true");

            }catch(Exception $e){
                header(("Location: categories.php?error=true"));
            }
        }
        if(isset($_GET['postId'])){
            $postId=$_GET['postId'];
            $sql="DELETE from posts where postId='$postId'";
            try{
                $result=$conn->query($sql);
                header("Location: posts.php?success=true");

            }catch(Exception $e){
                header(("Location: posts.php?error=true"));
            }
        }
    }
}



?>