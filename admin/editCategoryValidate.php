<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        $categoryId=$_POST['id'];
        $categoryName=$_POST['name'];

        include("../db/dbconnection.php");

        $sql="UPDATE categories set categoryName='$categoryName' where categoryId='$categoryId'";
        try{
            $result=$conn->query($sql);
            header("Location: editCategory.php?success=true&categoryId=$categoryId");
        }catch(Exception $e){
            header("Location: editCategory.php?error=true&categoryId=$categoryId");
        }
      

    }
}



?>