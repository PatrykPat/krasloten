<?php
include("view/boven.php");
include("view/navbar.php"); // Hier word alles van view/navbar.php aangeroepen in index.php
$fun=filter_input(INPUT_GET,'fun');
switch($fun){
    case "inloggen": 
        break;
    default:
        include("view/home.php");
}

include("view/footer.php");

?>