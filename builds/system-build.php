<?php
    require "../includes/dbh.inc.php";
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../customstyle.css">
    </head>
    <body>
        <div style="position:sticky;top:0px;z-index:1;" class="w-100 d-flex flex-row white">
            <div class="container d-flex flex-row">
                <a href="index.php">
                    <img class="img1" src="../img/cpu.png" alt="logo">
                </a>
                <ul class="d-flex flex-row ls-none ">
                    <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../index.php">Home</a></li>
                    <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="system-build.php">SystemBuild</a></li>
                    <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="completed_build.php">CompletedBuild</a></li>
                    <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../about.php">About</a></li>
                    <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="container">
                    <?php
                        if(isset($_SESSION['userId'])){
                            echo'<form action="includes/logout.inc.php" method="post">
                            <div class="d-flex jcfe">
                            <div class="cart-btn">
                            <div style="font-size:30px;" class="nav-icon"><a href="../cart/cart.php"><i style="color:black;" class="fas fa-cart-plus"></i></a></div>
                            <div class="cart-items">0</div>
                            </div>
                            <div style="font-size:30px; padding:0 15px;" class="text-black"><a class="text-black" href="../account/myAccount.php?acc"><div class="mx-1" ><i class="fas fa-user-circle"></i></div></a></div>
                            <div style="margin:10px 0;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../includes/logout.inc.php" name="logout-submit">Logout</a></div>
                            </div>
                            </form>';
                        }
                        else{
                            echo'
                            <div class="container d-flex flex-row jcfe">
                                <div ><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../signup.php">Signup</a></div>
                                <div><a class="text-deco-none text-black pr-1 mr-2 nav loginphp" href="../login.php">Login</a></div>
                            </div>
                            ';
                        }
                    ?>
                </div>
        </div>


        <div class="primary bg-color pb-lg">
            <div class="d-flex flex-row jcs">
                <div class="m-0 p-0 w-min-100">
                    <div class="container">
                        <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > System Builds</div>
                    </div>
                    <div class="container white p-3 b-rad-2 shadow-md">
                        <div class="">
                            <h1 style="font-size:30px;" class="text-black pb-0.5 ">System Parts</h1>
                            <div class="b-1"></div>
                        </div>
                        <div class="">
                            <div class="d-flex text-black flex-col mt-2">
                                <div class="my-1">
                                    <b> Case: </b>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="case" >+ Choose a Case</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['case'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b> CPU:</b> <div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="cpu" >+ Choose a CPU</button>
                                        </form>
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['cpu'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b> Motherboard: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="motherboard" >+ Choose a Motherboard</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['motherboard'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b> RAM: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="ram" >+ Choose a RAM</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['ram'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b>  GraphicsCard: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="graphics" >+ Choose a GraphicsCard</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['graphics'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b> HardDisk: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="harddisk" >+ Choose a HardDisk</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['harddisk'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b>Monitor: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="monitor" >+ Choose a Monitor</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['monitor'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b>Mouse: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="mouse" >+ Choose a Mouse</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['mouse'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                                <div class="text-left my-1">
                                    <b>Keyboard: </b><div class="br-1"></div>
                                    <div class="my-1 mx-2 d-flex jcc"> 
                                        <form action="" method="POST" >
                                            <button class="text-deco-none signup-button-field text-black pr-1" name="keyboard" >+ Choose a Keyboard</button>
                                        </form>                                    
                                    </div>
                                    <div class="">
                                        <?php
                                            if(isset($_POST['keyboard'])){
                                                echo"
                                                            <div class='d-flex jcsb m-1'>
                                                                <div></div>
                                                                <div>Description</div>
                                                                <div>Price</div>
                                                                <div></div>
                                                            </div>
                                                ";
                                                $query = 'SELECT * FROM pcpart WHERE partName="1";';
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    echo"<div class=''>";
                                                    while($row = mysqli_fetch_row($check)){
                                                        echo"
                                                            <div class='white m-1 p-sm d-flex jcsb'>
                                                                <img class='img1' src='../admin/upload/".$row[1]."'/>
                                                                <div>$row[3]</div>
                                                                <div>$row[5]</div>
                                                                <div>
                                                                    <form method='POST'><a href='system-build.php?id={$row[0]}'>Add</a></form>
                                                                </div>
                                                            </div>
                                                        ";
                                                    }echo"</div>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                <div class=" text-center">
                    <div style="background:gray" class=" pt-3 pb-3 d-flex flex-col">
                    <div class="d-flex jcc">
                        <div style="width:200px;" class="mr-2 mb-2">
                            <h3 align='left'>Categories</h3>
                            <div class='b-1 text-white mb-1'></div>
                            <div class="d-flex flex-col">
                                <a class="text-deco-none py-sm text-black footer-hover" align="left" href="#">System build</a>
                                <a class="text-deco-none py-sm text-black footer-hover" align="left" href="#">Completed build</a>
                                <a class="text-deco-none py-sm text-black footer-hover" align="left" href="#">Browse Product</a>
                            </div>
                        </div>
                        <div style="width:200px;" class="mr-2 mb-2">
                            <h3 align='left'>Company</h3>
                            <div class='b-1 text-white mb-1'></div>
                            <div class="d-flex flex-col">
                                <a class="text-deco-none py-sm text-black footer-hover" align="left" href="about.php">About</a>
                                <a class="text-deco-none py-sm text-black footer-hover" align="left"  href="#">Contact Us</a>
                                <a class="text-deco-none py-sm text-black footer-hover" align="left"  href="#">Terms & Policy</a>
                            </div>
                        </div>
                </div>
                <div class="b-1 text-white w-max-50 ml-50 mb-3"></div>
                <div class="p-1">
                        <a class="m-1 b-1 b-rad-2 text-white p-1 footer-link" href="https://www.instagram.com/__mr.useless_404__/"><i class="fa fa-instagram"></i></a> 
                        <a class="m-1 b-1 b-rad-2 text-white p-1 footer-link" href="https://www.facebook.com/agnel.selv"><i class="fa fa-facebook"></i></a> 
                        <a class="m-1 b-1 b-rad-2 text-white p-1 footer-link" href="https://twitter.com/Agnel04454713"><i class="fa fa-twitter"></i></a> 
                        <a class="m-1 b-1 b-rad-2 text-white p-1 footer-link" href="https://www.youtube.com/channel/UCsj3TXPOn0Xn3XYTq-YBd8w?view_as=subscriber"><i class="fa fa-youtube"></i></a> 
                </div>
                <div>
                        <b><p class="mt-2 mb-1">&copy;2019 CompPicker, LLC All rights reserved.</p></b>
                        <b>Delveloped By: Mr.Use!ess, Myron, Elvis</b>
                </div>
            </div>
          </div>
    </body>
</html>
 <!-- 
 class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full
class="py-1 pl-1 my-1 b-rad-2 white w-max-full -->
<!-- <div class="d-flex flex-row jcsa mt-2 text-black">
                                <div class="">Components</div>
                                <div>Selection</div>
                                <div>Price</div>
                                <div>Discount</div>
                                <div>Total Price</div>
                            </div>
                            <div class="b-1 mb-2 ml-4 mr-3"></div> 
                            <div class="m-1 d-flex flex-row jcsa text-black">
                                <div>Case</div>
                                <a> + Choose a Case</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="d-flex flex-row jcsa text-black">
                                <div>Motherboard</div>
                                <a> + Choose a Motherboard</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="m-1 d-flex flex-row jcsa text-black">
                                <div>CPU</div>
                                <a> + Choose a CPU</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="d-flex m-1  flex-row jcsa text-black">
                                <div>Monitor</div>
                                <a> + Choose a Monitor</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="d-flex flex-row m-1 jcsa text-black">
                                <div>Mouse</div>
                                <a> + Choose a Mouse</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="d-flex m-1 flex-row jcsa text-black">
                                <div>Keyboard</div>
                                <a> + Choose a Keyboard</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="d-flex m-1 flex-row jcsa text-black">
                                <div>Hard Disk</div>
                                <a> + Choose a Hard Disk</a>
                                <div>&#8377;1000</div>
                                <div>&#8377;100</div>
                                <div>&#8377;900</div>
                            </div>
                            <div class="text-black d-flex flex-row jcsb mb-4 mx-2">
                                <div style="" class="">
                                    <div class="mt-2 mb-1">Components</div>
                                    <div class="py-sm" >Case</div>
                                    <div class="py-sm" >CPU</div>
                                    <div class="py-sm" >Motherboard</div>
                                    <div class="py-sm" >HardDisk</div>
                                    <div class="py-sm" >Monitor</div>
                                    <div class="py-sm" >Mouse</div>
                                    <div class="py-sm" >Keyboard</div>
                                </div>
                                <div class="">
                                    <div class="mt-2 mb-1">Selection</div>
                                    <form action="" method="POST">
                                    <div class="py-sm" ><button type="submit" name="case"> + Choose a Case</button></div>
                                    <?php
                                        // if(isset($_POST['case'])){
                                        //     echo"case";
                                        // }
                                    ?>
                                    <div  class="py-sm" ><button type="submit"name=""  > + Choose a CPU</button></div>
                                    <div class="py-sm" ><button type="submit" name=""> + Choose a Motherboard</button></div>
                                    <div class="py-sm" ><button type="submit" name=""> + Choose a Hard Disk</button></div>
                                    <div class="py-sm" ><button type="submit" name=""> + Choose a Monitor</button></div>
                                    <div class="py-sm" ><button type="submit" name=""> + Choose a Mouse</button></div>
                                    <div class="py-sm" ><button type="submit" name=""> + Choose a Keyboard</button></div>
                                    </form>
                                </div>
                                <div class="">
                                    <div class="mt-2 mb-1">Price</div>
                                    <div class="py-sm">&#8377;1000</div>
                                    <div class="py-sm" >&#8377;1000</div>
                                    <div class="py-sm" >&#8377;1000</div>
                                    <div class="py-sm" >&#8377;1000</div>
                                    <div class="py-sm" >&#8377;1000</div>
                                    <div class="py-sm" >&#8377;1000</div>
                                    <div class="py-sm" >&#8377;1000</div>
                                </div>
                                <div class="">
                                    <div class="mt-2 mb-1">Discount</div>
                                    <div class="py-sm" >&#8377;100</div>
                                    <div class="py-sm" >&#8377;100</div>
                                    <div class="py-sm" >&#8377;100</div>
                                    <div class="py-sm" >&#8377;100</div>
                                    <div class="py-sm" >&#8377;100</div>
                                    <div class="py-sm" >&#8377;100</div>
                                    <div class="py-sm" >&#8377;100</div>
                                </div>
                                <div class="">
                                    <div class="mt-2 mb-1">Total Price</div>
                                    <div class="py-sm" >&#8377;900</div>
                                    <div class="py-sm" >&#8377;900</div>
                                    <div class="py-sm" >&#8377;900</div>
                                    <div class="py-sm" >&#8377;900</div>
                                    <div class="py-sm" >&#8377;900</div>
                                    <div class="py-sm" >&#8377;900</div>
                                    <div class="py-sm" >&#8377;900</div>
                                </div>
                            </div> -->