<?php 
$title="Blog Detail";
include('components/header.php');

include('db/dbconnection.php');



 $blogId=$_REQUEST['blogId'];

 $sql="SELECT postId,title,description,bannerImage,DATE_FORMAT(datePublished, \"%d %b, %Y\") AS datePublished,categories.categoryName,users.username,users.avatar from posts 
 join categories on posts.categoryId=categories.categoryId
 join users on posts.userId=users.userId
 where postId=$blogId";
 $result=$conn->query($sql);

 if($result->num_rows>0){
     $row=$result->fetch_assoc();
        ?>
        <main class="blogDetail">
            <div class="blogDetail__header">
             <h1 class="helBold"><?php echo $row['title'] ?></h1>
             <p class="helMed">
                <?php echo "Posted by ".$row['username']." on ".$row['datePublished'];?>
             </p>
            </div>
            <img src=<?php echo $row['bannerImage'] ?> alt="banner image">
            <p><?php echo $row['description']?></p>
        </main>

     

        <?php

        $sql="UPDATE posts set views=views+1 where postId=$blogId ";
        $result=$conn->query($sql);
     
 }else{
     echo '<h1 class="blogDetail">No blogs to show.</h1>';
 }


include('components/footer.php');

?>


