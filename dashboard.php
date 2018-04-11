<?php 

    define("__CONFIG__", true);
    require_once "inc/config2.php";

    echo $_SESSION['id'] . ' is your user id';
    exit;
        
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="follow">
        <title>Faultline Dash</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/css/uikit.min.css" />
        
        <base href="/faultline/" />
    </head>
    
    
    <body>                                                                    
        
        <div class="uk-section uk-container">
            
        </div>
        
        
        <?php require_once "inc/footer.php"; ?>
        

    </body>
</html>