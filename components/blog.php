<a class="blogCard" href="blogdetail.php">
    <div class="blogCard__banner">
        <img src="<?php echo $row['bannerImage']?>" alt="card banner">
        <p><?php echo $row['categoryName']?></p>
    </div>
    <div class="blogCard__content">
        <h1 class="blogCard__contentTitle">
            <?php echo $row['title']?>
        </h1>
        <div class="blogCard__contentBottom">
            <div class="blogCard__contentBottomAuthor">
                <img src="<?php echo $row['avatar'] ?>" alt="author avatar">
                <p><?php echo $row['fname']." ".$row['lname']?></p>
            </div>
            <div class="blogCard__contentBottomDate">
                <i class="far fa-clock"></i>
                <p><?php echo $row['datePublished'] ?></p>
            </div>
        </div>
    </div>
</a>