<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        $postId=$_POST['id'];
        $blogTitle=$_POST['title'];
        $bannerImage=$_POST['banner'];
        $description=$_POST['desc'];
        $datePublished=$_POST['date'];
        $views=$_POST['views'];
        $categoryId=$_POST['categoryId'];
        $userId=$_POST['userId'];

        include("../db/dbconnection.php");

        $sql="UPDATE posts set title='$blogTitle', bannerImage='$bannerImage', description='$description', datePublished='$datePublished', views='$views', categoryId='$categoryId', userId='$userId'  where postId='$postId'";
        try{
            $result=$conn->query($sql);
            header("Location: editPost.php?success=true&postId=$postId");
        }catch(Exception $e){
            header("Location: editPost.php?error=true&categoryId=$postId");
        }
      

    }
}



?>