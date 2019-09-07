<?php
    require "./includes/dbh.inc.php";
    include('./functions/functions.php');
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
        <style>
            .cart-btn{
                position:relative;
                cursor: pointer;
            }
            .cart-items{
                position: absolute;
                top: -8px;
                right: -8px;
                background: #28AB87;
                padding: 0 10px;
                border-radius: 30%;
                color: white;
            }
            .navactive{
                background: black;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="position:sticky;top:0px;z-index:1;" class="d-flex flex-col">
            <div class="w-100 d-flex flex-row white">
                <div class="container d-flex flex-row">
                    <a href="index.php">
                        <img class="img1" src="./img/cpu.png" alt="logo">
                    </a>
                    <ul class="d-flex flex-row ls-none ">
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="index.php?home">Home</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/system-build.php">SystemBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/completed_build.php">CompletedBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="about.php">About</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="container">
                        <?php
                            loginORnot();
                        ?>
                </div>
            </div>
            <div style=" background:gray">
                <?php
                    if(isset($_SESSION['userId'])){
                        echo'
                            <div class="?><?php if(isset($_GET["close"])){echo "close";}">
                                <div style="margin:10px;">
                                    <div class="container d-flex flex-row jcc">
                                        <div style="background:#28AB87" class="text-white p-sm b-rad-2">
                                            Welcome!
                                        </div>
                                        <div class="text-white m-sm">
                                            5 Items in your cart
                                        </div>
                                        <div style="border:1px solid white; height:20px; margin:10px;"></div>
                                        <div class="text-white my-sm">
                                            Total Price: &#8377; 1000
                                        </div>
                                        <div class=" ml-2">
                                            <a href="index.php?close">
                                                <button class="" style="padding:6px;color:#28AB87;" name="close">&#10006;</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                
        </div>
    </div>
                <div class="primary bg-color">
                    <div class="d-flex flex-col jcs">
                        <div class="m-0 p-0 w-100">
                        <h1 align="left" style="font-size:30px;" class="text-black pl-2 pb-0.5 pt-3 ">System Parts</h1>
                        <div class="b-1 text-white mr-3 ml-2"></div>
                            <div class="d-flex flex-wrap jcc">
                                    <?php
                                        $query = "SELECT * FROM pcpart;";
                                        $check = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($check)) {
                                             $partname = $row['partKeyword'];
                                             $partID = $row['pcPartID'];
                                             echo "
                                             <div style='width:13%;'  class='mt-2 mr-2 fade-in shadow-md white b-rad-5'>
                                                  <img class='img2 mt-1' src='admin/upload/".$row['image']."'/>
                                                  <div style='font-size:20px;' class='text-center'>";
                                                  $q = "SELECT * FROM pcpartcomp WHERE pcPartID = '$partname';";
                                                  $connect = mysqli_query($conn, $q);
                                                  if($connect){
                                                       while($partrow = mysqli_fetch_row($connect)){
                                                            
                                                       }
                                                       
                                                  }
                                                  echo"<h4 class='m-1'>{$row['partTitle']}</h4><br>";
                                                  echo"<div class='text-primary'>
                                                            <b></b>
                                                            <p>Quantity:{$row['qty']}</p>
                                                            <div class='m-1'><b style='color:#28AB87'>&#8377;{$row['price']}/-</b></div>
                                                       </div>
                                                       <div class='mb-3 mt-2'>
                                                            <a class='button-field text-deco-none shadow-md' href='details.php?part_det={$partID}'>Details</a>
                                                            <a  class='button-field text-deco-none shadow-md' href='index.php?add_det={$partID}'>Add to cart</a>
                                                       </div>
                                             </div>
                                             </div>
                                             ";
                                        }
                                    ?>
                            </div>
                        </div>
                        <div class="ml-1 mr-1 p-0 w-100">
                            <h1 align="left" style="font-size:30px;" class="text-black px-3 pt-3 ">Completed Builds</h1>
                            <div class="b-1 text-white mr-3 ml-2"></div>
                                <div class="d-flex flex-wrap jcc">
                                        <?php
                                            getCompleteBuilts();
                                        ?>
                                 </div>
                            </div>
                        </div>
                </div>
        
<?php
    require "footer.php";
?>