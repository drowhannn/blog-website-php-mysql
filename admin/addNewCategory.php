<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){
       $title="Admin Dashboard - Add New User";
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
                        echo '<p class="dashboard__msg success">Category successfully added!</p>';
                    }
                }

            ?>
            <div class="dashboard__header">
                <h1>Add New Category</h1>
                <a href="">Cancel</a>
                
            </div>
            <form method="post" action="addCategoryValidate.php">
                <div>
                    <label for="category">Category:</label>
                    <input type="text" name="category" required maxlength="20">
                </div>
                <button type="submit">Add </button>
            </form>
        </div>
       <?php 
       
  

        include('components/footer.php');
    }
}



?>