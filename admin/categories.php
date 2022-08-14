<?php
session_start();

if(isset($_SESSION['adminLogin'])){
    if($_SESSION['adminLogin']==true){
        $title="Admin Dashboard - Categories";

        $activeSidebarOption="categories";

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
                echo '<p class="dashboard__msg success">Category Successfully Removed!</p>';
            }
        }


        ?>
        <div class="dashboard__header">
                <h1>Categories</h1>
                <a href="/blog/admin/addNewCategory.php">Add New Category</a>
            </div>
            <?php 
            include("../db/dbconnection.php");

            
            $sql="SELECT * from categories";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                ?>
                <div class="table">
                    <div class="table__row">
                        <div class="table__head">Category Id</div>
                        <div class="table__head">Category name</div>
                        <div class="table__head action">Action</div>
                    </div>
                    <?php
                    while($row=$result->fetch_assoc()){
                        ?>

                        <div class="table__row">
                            <div class="table__data"><?php echo $row['categoryId']; ?></div>
                            <div class="table__data"><?php echo $row['categoryName']; ?></div>
                            <div class="table__data action">
                                <a class="edit" href="/blog/admin/editCategory.php?categoryId=<?php echo $row['categoryId']; ?>">Edit</a>
                                <a class="delete" href="/blog/admin/delete.php?categoryId=<?php echo $row['categoryId']; ?>">Delete</a>
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