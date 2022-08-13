<main class="all__blogs">
    <?php 
        $sql="SELECT postId,title,bannerImage,DATE_FORMAT(datePublished, \"%d %b, %Y\") AS datePublished,categories.categoryName,users.username,users.avatar from posts 
        join categories on posts.categoryId=categories.categoryId
        join users on posts.userId=users.userId";
        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                include('blogCard.php');
            }
        }else{
            echo "<h1>No blogs to show.</h1>";
        }
    ?>
</main>
