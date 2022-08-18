
<?php 
    session_start();

    // Include header file
    $title="Home Page";
    $activeNavItem="Trending";
    include('components/header.php');

    // Connect to the database
    include('db/dbconnection.php');

    
?>


  

<?php 
$sql="SELECT postId,title,bannerImage,DATE_FORMAT(datePublished, \"%d %b, %Y\") AS datePublished,categories.categoryName,users.username,users.avatar from posts 
join categories on posts.categoryId=categories.categoryId
join users on posts.userId=users.userId
order by views desc limit 9
";
include('components/allblogs.php')
?>


<!-- Include footer -->
<?php include('components/footer.php') ?>


<body>
    
</body>
</html>