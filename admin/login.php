<?php 
    $title="Admin Login Page";
    include('components/header.php');
?>

<div class="login">
    <div class="loginWrapper">
        <h1 class="helBold">Admin Login</h1>
        <form method="POST" action="validate.php" class="login__form">        
            <label for="email" class="helBold">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password" class="helBold">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="helMed">Log In</button>
        </form>
        <p class="loginMessage helMed">
            <?php 
              if(isset($_GET['error'])){ 
                echo "Login Failed. Try Again!";
              }
            
            ?>
        </p>
    </div>
    
  
</div>

<?php include('components/footer.php')?>
