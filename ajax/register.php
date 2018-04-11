<?php
    define("__CONFIG__", true);
    require_once $_SERVER['DOCUMENT_ROOT']."/faultline/inc/config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //if($_SERVER['REQUEST_METHOD'] == 'POST') {
        header('Content-Type: application/json');
        $return = [];
       
        //echo "Inside server request";
       
        if (isset($_POST['email']))
        {
            //echo "post email isset";
            $email = Filter::String( $_POST['email'] );
            
            $str = strtolower($email);
            
            $findUser = $con -> prepare("SELECT `id` FROM `member` WHERE `email` = '$str' LIMIT 1");
            $findUser->bindParam(':email', $email, PDO::PARAM_STR);
            $findUser->execute();
            
            //console_log($findUser);
            
            if($findUser -> rowCount() == 1) {
                echo "Account exits no trycatch";
                $return['error']= "Account exits";
            }else{
            
                try{
                    //echo "Inside try catch";
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $addUser = $con->prepare("INSERT INTO `member`(email, password) VALUES(LOWER(:email), :password)");
                    $addUser->bindParam(':email', $email, PDO::PARAM_STR);
                    $addUser->bindParam(':password', $password, PDO::PARAM_STR);
                    $addUser->execute();

                    $id = $con->lastInsertId();
                    ///IDS BEING USED
                    $_SESSION['id'] = (int) $id;

                    $return['redirect'] = '/faultline/dashboard.php?message=welcome';
                    $return['is_logged_in'] = true;
                    
                }catch(PDOException $err) {
                    echo "Inside catch/ try failed";
                    $return['$findUser']=$findUser;
                    $return['error']= "Account exits PDO";
                    $return['$err']= $err->getMessage();

                }
            }
        
            
        }
        $return['name'] = "I'm Don P";
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }else{
        echo "Never started ajax register.php";
        $return['error']= "Invalid URL";
        exit('Invalid URL');
    }
?>