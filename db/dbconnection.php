<?php 

    $servername="localhost";
    $username="root";
    $password="";
    $dbName="blogDB";

    $conn=mysqli_connect($servername,$username,$password,$dbName);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

?>
