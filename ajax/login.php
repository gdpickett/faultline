<?php
    define("__CONFIG__", true);
    require_once $_SERVER['DOCUMENT_ROOT']."/faultline/inc/config2.php";

    //echo "inside ajax login";
    //if($_SERVER['REQUEST_METHOD'] == 'POST' or 1==1) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');
        $return = [];
        
        //echo "server request post";
        
        $email = Filter::String( $_POST['email'] );
        $password = $_POST['password'];
        
        if (isset($_POST['email']))
        {
            $str = strtolower($email);
            
            $findUser = $con -> prepare("SELECT `id`,`password` FROM `member` WHERE `email`='$str' LIMIT 1");
            $findUser->bindParam(':email', $email, PDO::PARAM_STR);
            $findUser->execute();
            
            
            if($findUser -> rowCount() !== 0) {
                
                //$return['error']= "Account exits";
                //$return['is_logged_im'] = false;
                $user = $findUser -> fetch(PDO::FETCH_ASSOC);
                $id = (int) $user['id'];
                $hash = (string) $user['password'];
                
                if(password_verify($password, $hash)){
                    //Signed In
                    $return['redirect']="/faultline/dashboard.php?message=welcome";
                    
                    $_SESSION['id']= $id;
                }else{
                    //Invalid
                    $return['error']="Invalid email/password combo";
                }
                
            }else{
                $return['error']="You do not have an account. <a href='/faultline/register.php'>Create one now?</a>";
            }
                        
            
        }
        $return['name'] = "I'm Don P";
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }else{
        $return['error']= "Invalid URL";
        exit('Invalid URL');
    }
?>