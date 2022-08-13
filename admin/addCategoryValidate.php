<?php
session_start();


if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true && ($_SESSION['adminRole']=='Admin' || $_SESSION['adminRole']=="Super Admin")){
        $category=$_POST['category'];

        include("../db/dbconnection.php");

        $sql="INSERT into category values(null,'$category')";
        try{
            $result=$conn->query($sql);
            header("Location: addNewCategory.php?success=true");
        }catch(Exception $e){
            header("Location: addNewCategory.php?error=true");
        }
      

    }
}



?>