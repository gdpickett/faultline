<?php 
    define("__CONFIG__", true);
    require_once "inc/config.php"; 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="follow">
        
        <base href="/faultline/">
        <title>Faultline</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/uikit.min.css" />
    </head>
    
    
    <body>
        
        <div class="uk-section uk-container">
            <?php
                echo "Welcome";
                echo date("m d Y");            
            
            ?>
            
            <p>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </p>
        </div>
        
        
        <?php require_once "inc/footer_log.php"; ?>
        

    </body>
</html>