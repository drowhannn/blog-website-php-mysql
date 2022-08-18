
<?php 
    session_start();

    // Include header file
    $title="Home Page";
    $activeNavItem="Home";
    include('components/header.php');

    // Connect to the database
    include('db/dbconnection.php');

    
?>


  

<?php 
$sql="SELECT postId,title,bannerImage,datePublished,DATE_FORMAT(datePublished, \"%d %b, %Y\") AS datePub,categories.categoryName,users.username,users.avatar from posts 
join categories on posts.categoryId=categories.categoryId
join users on posts.userId=users.userId
order by datePublished desc
";
include('components/allblogs.php')
?>


<!-- Include footer -->
<?php include('components/footer.php') ?>


<body>
    
</body>
</html>