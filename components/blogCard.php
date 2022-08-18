<div class="blogCard">
    <a class="blogCard__banner"  href="blogDetail.php?blogId=<?php echo $row['postId'] ?>">
        <img src="<?php echo $row['bannerImage']?>" alt="card banner">
        <p><?php echo $row['categoryName']?></p>
    </a>
    <div class="blogCard__content">
        <h1 class="blogCard__contentTitle" >
            <a href="blogDetail.php?blogId=<?php echo $row['postId'] ?>"><?php echo $row['title']?></a>
        </h1>
        <div class="blogCard__contentBottom">
            <div class="blogCard__contentBottomAuthor">
                <img src="<?php echo $row['avatar'] ?>" alt="author avatar">
                <p><?php echo $row['username'];?></p>
            </div>
            <div class="blogCard__contentBottomDate">
                <i class="far fa-clock"></i>
                <p><?php echo $row['datePub'] ?></p>
            </div>
        </div>
    </div>
</div>