<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){
        $title="Admin Dashboard - Users";
        $activeSidebarOption='users';

        include('components/header.php');
        include('components/sidebar.php');

    ?>
        <div class="dashboard">
            <?php
            
            if(isset($_GET['error'])){
                if($_GET['error']=="selfdel"){
                    echo '<p class="dashboard__msg error">Error: You cannot remove yourself as admin!</p>';
                }elseif($_GET['error']=="true"){
                    echo '<p class="dashboard__msg error">Error: Try Again!</p>';
                }elseif($_GET['error']=="superadmin"){
                    echo '<p class="dashboard__msg error">Error: You cannot remove super admin!</p>';
                }elseif($_GET['error']=="editsuperadmin"){
                    echo '<p class="dashboard__msg error">Error: You cannot edit super admin!</p>';
                }
            }elseif(isset($_GET['success'])){
                if($_GET['success']=="true"){
                    echo '<p class="dashboard__msg success">User successfully removed!</p>';
                }
            }

            ?>
            <div class="dashboard__header">
                <h1>Users</h1>
                <a href="/blog/admin/addNewUser.php">Add New User</a>
            </div>
            <?php 
            include("../db/dbconnection.php");
            
            $sql="SELECT * from users";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                ?>
                <div class="table">
                    <div class="table__row">
                        <div class="table__head">User Id</div>
                        <div class="table__head">Username</div>
                        <div class="table__head">Email</div>
                        <div class="table__head">Password</div>
                        <div class="table__head">Role</div>
                        <div class="table__head">Avatar</div>
                        <div class="table__head action">Action</div>
                    </div>
                    <?php
                    while($row=$result->fetch_assoc()){
                        ?>

                        <div class="table__row">
                            <div class="table__data"><?php echo $row['userId']; ?></div>
                            <div class="table__data"><?php echo $row['username']; ?></div>
                            <div class="table__data"><?php echo $row['email']; ?></div>

                            <div class="table__data"><?php if( $_SESSION['adminRole']=="Super Admin" || $row['role']=='Admin') echo $row['password']; else echo "********"; ?></div>

                            <div class="table__data"><?php echo $row['role']; ?></div>
                            <div class="table__data"><?php echo $row['avatar']; ?></div>
                            <div class="table__data action">
                                <a class="edit" href="/blog/admin/editUser.php?userId=<?php echo $row['userId'] ?>">Edit</a>
                                <a class="delete" href="/blog/admin/delete.php?userId=<?php echo $row['userId'] ?>">Delete</a>
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
            ?>

        </div>
      

    <?php
        

        include('components/footer.php');
    }
}



?>