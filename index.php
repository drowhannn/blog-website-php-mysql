
<?php 
    // Connect to the database
    include('dbconnection.php');

    // Include header file
    $title="Home Page";
    include('header.php');
?>


<!-- Main -->
<div class="main">

    <!-- Popular posts -->
    <div class="popular">
        <h1>
            Popular Blogs
        </h1>
        <div class="popular__blogs">
            <?php 
                $sql="SELECT * from posts order by views desc limit 6";
                $result=$conn->query($sql);

                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                    ?>

                    <div class="blogCard">
                        <?php echo '<img class="blogCard__img" alt="Banner Image" src="'.$row['bannerImage'].'"/>'; ?>
                       <div class="blogCard__content">
                            <?php echo '<span class="blogCard__contentCategory">'.$row['category'].'</span>'; ?>
                            <?php echo'<p class="blogCard__contentTitle">'.$row['title'].'</p>';?>
                            <?php echo'<p class="blogCard__contentSummary">'.$row['summary'].'</p>';?>
                            <div class="blogCard__contentBottom">
                                <?php 
                                    $sql='SELECT fname,lname,avatar from users where userId='.$row['userId'];
                                    $result1=$conn->query($sql);
                                    $row1=$result1->fetch_assoc();

                                    echo ' <img src="'.$row1['avatar'].'" alt="Avatar">';
                                ?>
                               
                                <div class="blogCard__contentBottomRight">
                                <?php echo'<p>'.$row1['fname'].' '.$row1['lname'].'</p>';?>
                                <?php echo'<span class="blogCard__contentBottomTime">'.$row['datePublished'].'</span>';?>
                                </div>
                               
                            </div>
                       </div>
                    </div>

                    <?php
                    }
                }else{
                    echo "No blogs to show.";
                }
            ?>
        </div>
    </div>
    <!-- End popular -->

</div>
<!-- End main -->

<!-- Include footer -->
<?php include('footer.php') ?>
