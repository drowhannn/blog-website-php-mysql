<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        $blogTitle=$_POST['title'];
        $bannerImage=$_POST['banner'];
        $description=$_POST['desc'];
        $categoryId=$_POST['categoryId'];

        $userId=$_SESSION['adminId'];
        $datePublished=date('Y-m-d');

        include("../db/dbconnection.php");

        $sql="INSERT into posts values(null,'$blogTitle','$bannerImage','$description','$datePublished',0,'$categoryId','$userId')";
        try{
            $result=$conn->query($sql);
            header("Location: addNewPost.php?success=true");
        }catch(Exception $e){
            header("Location: addNewPost.php?error=true");
        }
      

    }
}



?>