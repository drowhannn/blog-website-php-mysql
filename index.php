
<?php 
    // Connect to the database
    include('db/dbconnection.php');

    // Include header file
    $title="Home Page";
    include('components/header.php');
?>


   
<section class="all__blogs">
    <?php 
        $sql="SELECT *,category.categoryName from posts 
        join category on posts.categoryId=category.categoryId";
        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
            ?>

            <div class="blogCard">
            <div class="blogCard__banner">
                <img src=<?php echo $row['bannerImage']?> alt="">
            </div>
            </div>

            <?php
            }
        }else{
            echo "No blogs to show.";
        }
    ?>
</section>



<!-- Include footer -->
<?php include('components/footer.php') ?>
