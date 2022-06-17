<?php


function inlogAction(){
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo 'u bent ingelogged';
    exit;
}
else {

$username = $password = "";
$username_err = $password_err = $login_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
        $hashed_password = hash('sha256',$password);}
        
    if(empty($username_err) && empty($password_err)){
        require_once "secure/config.php";
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                     
                    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $id = $row["id"];
                        $username = $row["username"];
                        $passwordfromdatabase = $row["password"];
                       
                        if($passwordfromdatabase== $hashed_password){

                           
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;    
                                                
                            
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
}
}

function registerAction(){
    require_once "secure/config.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $param_username = $username;
            $param_password = hash('sha256',$password);
            if($stmt->execute()){
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
}


// $geld = filter_input(INPUT_POST,'geld',FILTER_SANITIZE_SPECIAL_CHARS);

// if(is_string($geld) &&
// (!empty($geld))){
//     include 'secure/config.php';
            
//             $geld="SELECT geld FROM users WHERE username = patpat";
//             $statement = $pdo->prepare($geld);
//             $statement->bindParam(':geld',$geld);
//             try{
//                 $result = $statement->execute([':geld'=>$geld,]);
                
//                 if($result){
//                   return true;
//                 }
//             }
//             catch(Exception $e)
//             {
//                 return false;
//             }
// }
    


function kraslotAction(){

    include 'secure/config.php';
    // $geld = "SELECT `geld` FROM `users` WHERE `username` = 'patpat'";
    $geld = filter_input(INPUT_GET,'lot',FILTER_VALIDATE_INT);
    // geld is wat je wilt inzetten
    if(is_int($geld) &&
        (!empty($geld))){
        
            
            $tegoed="SELECT geld FROM users WHERE username = 'patpat'";
            $statement = $pdo->prepare($tegoed);
            
            try{
                $statement->execute();
                $saldo = $statement->fetch(PDO::FETCH_ASSOC);
                $saldo = $saldo['geld'];
                //  saldo is wat je kunt inzetten
                if($saldo){
                //   return true;
                }
            }
            catch(Exception $e)
            {
                var_dump($saldo); ;// return false;
            }
        }
       
            if ($saldo < $geld){
            echo "je kan niet kopen. je hebt niet genoeg geld. je hebt $saldo euro en het kost $geld";}

            else
            {
                echo "spel opstarten. je hebt $saldo euro en het kost $geld";}
                include "game.php";
                ?>
                <!-- <img src="Galerij/download.png"> -->
                
            <?php

    }
    



function uitlogAction(){

    session_unset();
    
    if(isset($_SESSION)){
    
    session_destroy();
    
    }}




?>