<?php 

    define("__CONFIG__", true);
    require_once "inc/config2.php";
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="follow">
        <title>Faultline</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.35/css/uikit.min.css" />
        
        <base href="/faultline/">
    </head>
    
    
    <body>                                                                    
        
        <div class="uk-section uk-container">
            <div class="uk-grid uk-child-width-1-3@s uk-child.width-1-1" uk-grid>
                <form class="uk-form-stacked js-login">
                    
                    <h2>Login</h2>
                
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" type="email" required="required" placeholder="email@email.com">
                        </div>                    
                    </div>
                
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Password</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-stacked-text" type="Password" required="required" placeholder="Password">
                        </div>                    
                    </div>
                    
                    <div class="uk-margin uk-alert uk-alert-danger js-error" style="display:none"></div>
                    
                    <div class="uk-margin">
                        <button class="uk-input" id="uk-button uk-button-default" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
        
        
        <?php require_once "inc/footer_log.php"; ?>
        

    </body>
</html>