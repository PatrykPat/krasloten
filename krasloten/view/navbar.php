<?php 
require 'boven.php';
include 'home.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Loterij</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="https://kit.fontawesome.com/82e6ff0103.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      </head>
      
      <body>
        <header class="header">
          <img src="Galerij/LogoLoterij.png" alt="Rohit in money form" width="100px">
      
          <ul class="nav">
            <li class="list">
              <a class="link" href="index.php">Home</a>
            </li>
            <li class="list">
              <a class="link" href="#loterij">Tickets</a>
            </li>
            <li class="list">
              <!-- "?action=login" -->
            <?php if (!isset($_SESSION['username'])){
                echo '<a class="link" href="?function=inloggen">Login</a>';
              }
                  else{
                echo '<a class="link" href="?function=uitlog">uitloggen</a>';
            }
            ?>
              
            </li>
            <li class="list">
              <!-- ?action=register -->
            <a class="link" href="?function=register">Sign up</a>
            </li>
            <li class="list">
             
            </li>
            <input type="checkbox" class="checkbox" id="chk" />
            <label class="label" for="chk">
              <i class="fas fa-sun"></i>
              <i class="fas fa-moon"></i>
              <div class="ball"></div>
            </label>
          </ul>
        </header>