<?php
    require "../includes/dbh.inc.php";
    session_start();
    include('../functions/functions.php');
?>
<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../customstyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
        <style>
            .img1{
                width: 50px;
            }
            .toggle-nav {
	            display:none;
            }
            /*----- Menu -----*/
            @media screen and (min-width: 860px) {
                .menu {
                width:100%;
                }
            }

            .menu ul {
                display:inline-block;
            }

            .menu li {
                float:left;
                list-style:none;
            }

            .menu li:last-child {
                margin-right:0px;
            }

            .menu a {
                transition:color linear 0.15s;
            }

            .menu a:hover, .menu .current-item a {
                text-decoration:none;
            }

            /*----- Responsive -----*/
            @media screen and (max-width: 1150px) {
                .wrap {
                    width:90%;
                }
            }

            @media screen and (max-width: 975px) {
                .menu ul.active {
                    display:none;
                }

                .menu ul {
                    width:40%;
                    position:absolute;
                    top:120%;
                    left:55px;
                    box-shadow:0px 1px 1px rgba(0,0,0,0.15);
                    border-radius:3px;
                    background: rgb(266,266,266)
                }
                .menu ul:after {
                    width:0px;
                    height:0px;
                    position:absolute;
                    top:0%;
                    left:22px;
                    content:'';
                    transform:translate(0%, -100%);
                    border-left:7px solid transparent;
                    border-right:7px solid transparent;
                    border-bottom:7px solid #303030;
                }

                .menu li {
                    margin:5px 0px 5px 0px;
                    float:none;
                    display:block;
                }
                .menu a {
                    display:block;
                }

                .toggle-nav {
                    padding-left: 10px;
                    padding-top: 5px;
                    text-decoration: none;
                    float:left;
                    display:inline-block;
                    border-radius:3px;
                    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
                    color:#000;
                    font-size:30px;
                    transition:color linear 0.15s;
                }

                .toggle-nav:hover, .toggle-nav.active {
                    text-decoration:none;
                }

            }
        </style>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            jQuery(document).ready(function() {
            jQuery('.toggle-nav').click(function(e) {
                jQuery(this).toggleClass('active');
                jQuery('.menu ul').toggleClass('active');

                e.preventDefault();
            });
            });
        </script>
    </head>
    <body>
        <!-- NavBar Starts -->
        <div style="position:sticky;top:0px;z-index:1;height:8%;" class="d-flex flex-col w-100 white">
            <div class="d-flex jcsb">
                <div class="d-flex flex-row">
                    <div>
                        <img class="img1" src="../img/cpu.png" alt="">
                    </div>
                    <div class="hamburger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <div class="menu">
                    <ul class="ls-none active current-item">
                            <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../index.php">Home</a></li>
                            <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="system-build.php">SystemBuild</a></li>
                            <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="completed_build.php">CompletedBuild</a></li>
                            <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../about.php">About</a></li>
                            <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <a class="toggle-nav" href="#">&#9776;</a>
                    </div>
                </div>
                <div class="mt-1">
                    <?php
                        if(isset($_SESSION['userId'])){
                            echo'<form action="includes/logout.inc.php" method="post">
                            <div class="d-flex jcfe">
                            <div class="cart-btn">
                            <div style="font-size:30px;" class="nav-icon"><a href="../cart/cart.php"><i style="color:black;" class="fas fa-cart-plus"></i></a></div>
                            <div class="cart-items">'?><?php cartcount(); echo'</div>
                            </div>
                            <div style="font-size:30px; padding:0 15px;" class="text-black"><a class="text-black" href="../account/myAccount.php?acc"><div class="mx-1" ><i class="fas fa-user-circle"></i></div></a></div>
                            <div style="margin-top:10px;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../includes/logout.inc.php" name="logout-submit">Logout</a></div>
                            </div>
                            </form>';
                        }
                        else{
                            echo'
                            <div class="container d-flex flex-row jcfe">
                                <div style="margin-top:3px;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../signup.php">Signup</a></div>
                                <div style="margin-top:3px;"><a class="text-deco-none text-black pr-1 mr-2 nav loginphp" href="../login.php">Login</a></div>
                            </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- Navbar Ends -->
                <div class="bg-color">
                    <div class="container pt-sm">
                        <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > Completed Builds</div>
                            <div class=" pb-3 w-100">
                                <h1 align="left"  style="font-size:30px;" class="text-black px-3 pt-3 ">Completed Builds</h1>
                                <div class="b-1 ml-2 accent mr-4" ></div>
                                    <div class="d-flex flex-wrap">
                                            <?php
                                                getMainPageCompletedBuilds();
                                            ?>
                                    </div>
                                </div>
                        </div>
                        </div>  
          
          </div>

<?php
    include('../footer.php');
?>
