<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){

        if(isset($_GET['categoryId'])){
            $categoryId=$_GET['categoryId'];

            include('../db/dbconnection.php');

            $sql="SELECT * from categories where categoryId='$categoryId'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();

                $title="Admin Dashboard - Edit Category";
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
                                 echo '<p class="dashboard__msg success">Category successfully edited!</p>';
                             }
                         }
         
                     ?>
                     <div class="dashboard__header">
                         <h1>Edit Category</h1>
                         <a href="/blog/admin/categories.php">Cancel</a>
                     </div>
    
                     <form method="post" action="editCategoryValidate.php">
                         <div>
                             <label for="id">ID:</label>
                             <input type="number" name="id" required readonly value="<?php echo $categoryId; ?>">
                         </div>
                         <div>
                             <label for="name">Category Name:</label>
                             <input type="text" name="name" required maxlength="20" value="<?php echo $row['categoryName']; ?>">
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