<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){
       $title="Admin Dashboard - Add New Post";
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
                        echo '<p class="dashboard__msg success">Post successfully added!</p>';
                    }
                }

            ?>
            <div class="dashboard__header">
                <h1>Add New Post</h1>
                <a href="/blog/admin/posts.php">Cancel</a>
                
            </div>
            <form method="post" action="addPostValidate.php">
                <div>
                    <label for="title">Blog Title:</label>
                    <input type="text" name="title" required maxlength="40">
                </div>
                <div>
                    <label for="banner">Banner Image Url:</label>
                    <input type="text" name="banner" required maxlength="150">
                </div> 
                <div>
                    <label for="description">Description</label>
                    <textarea name="desc" rows="4" cols="50" required></textarea>
                </div>  
                <div>
                    <label for="categoryId">
                        Category:
                    </label>
                    <select name="categoryId" required>
                    <?php 
                    
                        include('../db/dbconnection.php');

                        $sql="SELECT categoryId,categoryName from categories";
                        $result=$conn->query($sql);
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                ?>
                                <option value=<?php echo $row['categoryId'] ?>><?php echo $row['categoryName'] ?></option>
                                <?php
                            }
                        }

                    ?>
                    </select>
                </div>
               
                  
                    <button type="submit">Add </button>
            </form>
        </div>
       <?php 
       
  

        include('components/footer.php');
    }
}



?>