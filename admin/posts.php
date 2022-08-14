<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){
        $title="Admin Dashboard - Posts";

        $activeSidebarOption="posts";

        include('components/header.php');
        include('components/sidebar.php');

    ?>
        <div class="dashboard">
        <?php
        
        if(isset($_GET['error'])){
            if($_GET['error']=="true"){
                echo '<p class="dashboard__msg error">Error: Try Again!</p>';
            }
        }elseif(isset($_GET['success'])){
            if($_GET['success']=="true"){
                echo '<p class="dashboard__msg success">Post Successfully Removed!</p>';
            }
        }


        ?>
        <div class="dashboard__header">
                <h1>Posts</h1>
                <a href="/blog/admin/addNewPost.php">Add New Post</a>
            </div>
            <?php 
            include("../db/dbconnection.php");

            
            $sql="SELECT * from posts";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                ?>
                <div class="table">
                    <div class="table__row">
                        <div class="table__head">Post Id</div>
                        <div class="table__head">Title</div>
                        <div class="table__head">Banner Image</div>
                        <div class="table__head">Description</div>
                        <div class="table__head">Date Published</div>
                        <div class="table__head">Views</div>
                        <div class="table__head">Category Id</div>
                        <div class="table__head">User Id</div>
                        <div class="table__head action">Action</div>
                    </div>
                    <?php
                    while($row=$result->fetch_assoc()){
                        ?>

                        <div class="table__row">
                            <div class="table__data"><?php echo $row['postId']; ?></div>
                            <div class="table__data"><?php echo $row['title']; ?></div>
                            <div class="table__data"><?php echo $row['bannerImage']; ?></div>
                            <div class="table__data"><?php echo $row['description']; ?></div>
                            <div class="table__data"><?php echo $row['datePublished']; ?></div>
                            <div class="table__data"><?php echo $row['views']; ?></div>
                            <div class="table__data"><?php echo $row['categoryId']; ?></div>
                            <div class="table__data"><?php echo $row['userId']; ?></div>
                            <div class="table__data action">
                                <a class="edit" href="/blog/admin/editPost.php?postId=<?php echo $row['postId']?>">Edit</a>
                                <a class="delete" href="/blog/admin/delete.php?postId=<?php echo $row['postId']; ?>">Delete</a>
                            </div>
                        </div>

                        <?php
                    }

                    ?>
                </div>

                <?php
            }else{
                echo "<h1>Error fetching the data.";
            }
            include('components/footer.php')
            ?>
        </div>
    <?php
    }
}



?>