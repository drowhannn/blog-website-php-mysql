<main class="all__blogs">
    <?php 
        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                include('blogCard.php');
            }
        }else{
            echo "<h1>No blogs to show.</h1>";
        }
    ?>
</main>
