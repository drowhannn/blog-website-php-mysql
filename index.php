
<?php 
    session_start();

    // Include header file
    $title="Home Page";
    include('components/header.php');

    // Connect to the database
    include('db/dbconnection.php');

    
?>


   
<?php include('components/main.php')?>


<!-- Include footer -->
<?php include('components/footer.php') ?>


<body>
    
</body>
</html>