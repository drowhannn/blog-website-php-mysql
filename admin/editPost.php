<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){

        if(isset($_GET['postId'])){
            $postId=$_GET['postId'];

            include('../db/dbconnection.php');

            $sql="SELECT * from posts where postId='$postId'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();

                $title="Admin Dashboard - Edit Post";
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
                                 echo '<p class="dashboard__msg success">Post successfully edited!</p>';
                             }
                         }
         
                     ?>
                     <div class="dashboard__header">
                         <h1>Edit Posts</h1>
                         <a href="/blog/admin/posts.php">Cancel</a>
                     </div>
    
                     <form method="post" action="editPostValidate.php">
                         <div>
                             <label for="id">ID:</label>
                             <input type="number" name="id" required readonly value="<?php echo $postId; ?>">
                         </div>
                         <div>
                            <label for="title">Blog Title:</label>
                            <input type="text" name="title" required maxlength="40" value="<?php echo $row['title']; ?>">
                        </div>
                        <div>
                            <label for="banner">Banner Image Url:</label>
                            <input type="text" name="banner" required maxlength="150" value="<?php echo $row['bannerImage']; ?>">
                        </div> 
                        <div>
                            <label for="description">Description</label>
                            <textarea name="desc" rows="4" cols="50" required><?php echo $row['description'] ?></textarea>
                        </div> 
                        <div>
                            <label for="date">
                                Date Published:
                            </label>
                            <input type="date" name="date" value=<?php echo $row['datePublished']?> required>
                        </div> 
                        <div>
                            <label for="views">Views:</label>
                            <input type="number" name="views" value=<?php echo $row['views'] ?> required min="0">
                        </div>
                        <div>
                            <label for="categoryId">
                                Category:
                            </label>
                            <select name="categoryId" required>
                            <?php 
                                $sql1="SELECT categoryId,categoryName from categories";
                                $result1=$conn->query($sql1);
                                if($result1->num_rows>0){
                                    while($row1=$result1->fetch_assoc()){
                                        ?>
                                        <option value=<?php echo $row1['categoryId']; ?> <?php if($row['categoryId']==$row1['categoryId']) echo "selected"; ?>><?php echo $row1['categoryName'] ?></option>
                                        <?php
                                    }
                                }

                            ?>
                            </select>
                        </div>       
                        <div>
                            <label for="userId">
                                Posted By:
                            </label>
                            <select name="userId" required>
                            <?php 
                                $sql2="SELECT userId,username from users";
                                $result2=$conn->query($sql2);
                                if($result2->num_rows>0){
                                    while($row2=$result2->fetch_assoc()){
                                        ?>
                                        <option value=<?php echo $row2['userId']; ?> <?php if($row['userId']==$row2['userId']) echo "selected"; ?>><?php echo $row2['username'] ?></option>
                                        <?php
                                    }
                                }

                            ?>
                            </select>
                        </div>         
                        <button type="submit">Edit </button>
                     </form>
                 </div>
                <?php 
                
           
         
                 include('components/footer.php');
          


            
        }
    }
}



?>