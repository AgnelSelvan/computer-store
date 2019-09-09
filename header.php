<?php
    include("./functions/functions.php");
    session_start();
?>
<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./customstyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">

    </head>
    <body>
    <div style="position:sticky;top:0px;z-index:1;" class="w-100 d-flex flex-row white shadow-sm">
                <div class="container d-flex flex-row">
                    <a href="index.php">
                        <img class="img1" src="./img/cpu.png" alt="logo">
                    </a>
                    <ul class="d-flex flex-row ls-none ">
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="./index.php">Home</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/system-build.php">SystemBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/completed_build.php">CompletedBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="./about.php">About</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="./contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="container">
                        <?php
                            if(isset($_SESSION['userId'])){
                                echo'<form action="includes/logout.inc.php" method="post">
                                        <div class="d-flex jcfe">
                                        <div class="cart-btn">
                                        <div style="font-size:30px;" class="nav-icon"><a href="./cart/cart.php"><i style="color:black;" class="fas fa-cart-plus"></i></a></div>
                                        <div class="cart-items">'?><?php cartcount(); echo'</div>
                                        </div>
                                        <div style="font-size:30px; padding:0 15px;" class="text-black"><a class="text-black" href="account/myAccount.php?acc"><div class="mx-1" ><i class="fas fa-user-circle"></i></div></a></div>
                                        <div style="margin:10px 0;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="includes/logout.inc.php" name="logout-submit">Logout</a></div>
                                        </div>
                                    </form>';
                            }
                            else{
                                echo'
                                <div class="container d-flex flex-row jcfe">
                                    <div ><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="signup.php">Signup</a></div>
                                    <div><a class="text-deco-none text-black pr-1 mr-2 nav" href="./login.php" class="loginphp">Login</a></div>
                                </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
    