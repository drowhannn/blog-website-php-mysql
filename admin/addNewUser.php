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
                        echo '<p class="dashboard__msg success">User successfully added!</p>';
                    }
                }

            ?>
            <div class="dashboard__header">
                <h1>Add New User</h1>
                <a href="">Cancel</a>
                
            </div>
            <form method="post" action="addUserValidate.php">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" required maxlength="50">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required maxlength="50">
                </div> 
                <div>
                    <label for="role">Role:</label>
                    <select name="role" required>
                        <option value="Member">Member</option>
                        <option value="Admin">Admin</option>
                        <option value="Super Admin">Super Admin</option>
                    </select>
                </div>  
                <div>
                    <label for="avatar">Avatar:</label>
                    <input type="text" name="avatar" required maxlength="250">
                </div>
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required maxlength="20">
                </div> 
                  
                    <button type="submit">Add </button>
            </form>
        </div>
       <?php 
       
  

        include('components/footer.php');
    }
}



?>