<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){

        if(isset($_GET['userId'])){
            $userId=$_GET['userId'];

            include('../db/dbconnection.php');

            $sql="SELECT * from users where userId='$userId'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();

            if($_SESSION['adminRole']=="Super Admin" || $row['role']=="Admin"){
                $title="Admin Dashboard - Edit User";
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
                                 echo '<p class="dashboard__msg success">User successfully edited!</p>';
                             }
                         }
         
                     ?>
                     <div class="dashboard__header">
                         <h1>Edit User</h1>
                         <a href="/blog/admin/users.php">Cancel</a>
                     </div>
    
                     <form method="post" action="editUserValidate.php">
                         <div>
                             <label for="id">ID:</label>
                             <input type="number" name="id" required readonly value="<?php echo $userId; ?>">
                         </div>
                         <div>
                             <label for="email">Email:</label>
                             <input type="email" name="email" required maxlength="50" value="<?php echo $row['email']; ?>">
                         </div>
                         <div>
                             <label for="password">Password:</label>
                             <input type="password" name="password" required maxlength="50" value="<?php echo $row['password']; ?>"> 
                         </div> 
                         <div>
                             <label for="role">Role:</label>
                             <select name="role" required>
                                 <option value="Member" <?php if($row['role']=="Member"){echo "selected";}?>>Member</option>
                                 <option value="Admin" <?php if($row['role']=="Admin"){echo "selected";}?>>Admin</option>
                                 <option value="Super Admin" <?php if($row['role']=="Super Admin"){echo "selected";}?> <?php if($_SESSION['adminRole']=="Admin"){echo "disabled ";}?>>Super Admin</option>
                             </select>
                         </div>  
                         <div>
                             <label for="avatar">Avatar:</label>
                             <input type="text" name="avatar" required maxlength="250" value="<?php echo $row['avatar']; ?>">
                         </div>
                         <div>
                             <label for="username">Username:</label>
                             <input type="text" name="username" required maxlength="20" value="<?php echo $row['username']; ?>">
                         </div> 
                           
                             <button type="submit">Edit </button>
                     </form>
                 </div>
                <?php 
                
           
         
                 include('components/footer.php');
            }else{
                header('Location: /blog/admin/users.php?error=editsuperadmin');
            }


            
        }
    }
}



?>