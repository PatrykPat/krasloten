<?php
session_start();
require 'model/model.php';


$function = filter_input(INPUT_GET,'function');
switch($function){
    case "inloggen":
        if(isset($_POST['username'])){
            inlogAction();
        }
        else{
            include 'view/inlogform.php'; 
           
        }
    break;
    case "uitlog":
        if(isset($_SESSION['username'])){
          uitlogAction();
        }
        else{
            echo 'werkt nie';

        }
    break; 
    case "register":
            
        if(isset($_SESSION['username']))
            {
                registerAction();
            }
        else{
                include 'view/registerform.php'; 
            }
    break;
    case "kraslot":
        if(isset($_SESSION['username'])){
            $_SESSION['lot']= $_GET['lot'];
            kraslotAction(); 
        }
        else{
            echo 'u bent niet ingelogged. Als u geen account heeft kun u er een maken.';

        }
    break;
    case "gewonnen":


}
include_once 'view/navbar.php';
include("view/footer.php");
// include("game.html")
?>

<!-- UPDATE `users` SET `geld`= `geld` +10 WHERE `username` = 'patpat'; -->