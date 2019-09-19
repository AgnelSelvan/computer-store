<?php
    require "./includes/dbh.inc.php";
    include('./functions/functions.php');
    session_start();
    $userID = $_SESSION['UserId'];
    $selectQuery = "SELECT * FROM cart WHERE userID='$userID'";
    $check = mysqli_query($conn, $selectQuery);
    while ($row = mysqli_fetch_array($check)) {
        $partID = $row['productid'];
        $partquery = "SELECT * FROM pcpart WHERE pcPartID='$partID'";
        $checkpart = mysqli_query($conn, $partquery);
        while($partrow = mysqli_fetch_array($checkpart)){
            $grandTotal += $partrow['price'];
        }
    }
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
            @media screen and (max-width:600px){
                .responsive-container{
                    display:flex;
                    justify-content: center;
                    margin-left: 9%;
                    padding: auto;
                    min-width: 80vw;
                }
                .responsive-card{
                    min-width: 80vw;
                }
                .img2{
                    min-width: 300px;
                    height: auto;
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
        <!-- Navbar -->
            <div style="position:sticky;top:0px;z-index:1;height:7vh;" class="d-flex flex-col w-100 white">
                <div class="d-flex jcsb">
                    <div class="d-flex flex-row">
                        <div>
                            <img class="img1" src="img/cpu.png" alt="">
                        </div>
                        <div class="hamburger">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                        <div class="menu">
                            <ul class="ls-none active current-item">
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="index.php">Home</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/system-build.php">SystemBuild</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/completed_build.php">CompletedBuild</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="about.php">About</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <a class="toggle-nav" href="#">&#9776;</a>
                        </div>
                    </div>
                    <div class="mt-sm">
                        <?php
                            loginORnot();
                        ?>
                    </div>
                </div>
            </div>
            <div style=" background:gray">
                <?php
                    $userName = $_SESSION['userUid'];
                    if(isset($_SESSION['userId'])){
                        if(isset($_SESSION['start'])){
                        echo'
                            <div class="'?><?php if(isset($_GET["close"])){echo "close";} echo'">
                                <div style="margin:10px;">
                                    <div class="container d-flex flex-row jcc">
                                        <div style="background:#28AB87" class="text-white p-sm b-rad-2">
                                            Welcome! &nbsp; '?><?php echo $userName; echo'
                                        </div>
                                        <div class="text-white m-sm">
                                            '?><?php cartcount(); echo' Items in your cart
                                        </div>
                                        <div style="border:1px solid white; height:20px; margin:10px;"></div>
                                        <div class="text-white my-sm">
                                            Total Price: &#8377; '?><?php echo $grandTotal; echo'
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
                    }}
                ?>
            </div>
        <!-- Navbar -->
        
        <!-- Content -->
                <div class="primary bg-color md-m-0 md-p-0 sm-p-0">
                    <div class="d-flex flex-col jcc ">
                        <div class="m-0 p-0 w-100">
                            <h1 align="left" style="font-size:30px;" class="text-black pl-2 pb-0.5 pt-2">System Parts</h1>
                            <div class="b-1 text-white mr-3 ml-2"></div>
                            <div class="d-flex flex-wrap jcc responsive-container">
                                <?php
                                    $query = "SELECT * FROM pcpart;";
                                    $check = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($check)) {
                                            $partname = $row['partKeyword'];
                                            $partID = $row['pcPartID'];
                                            echo "
                                            <div style='width:220px;' class='shadow-md responsive-card white b-rad-2 card-hover'>
                                                <a style='color:#28AB87' class='text-deco-none' href='details.php?part_det=".$partID."'>
                                                <div class='single-img'>
                                                    <img class='img2 mt-1' src='admin/upload/".$row['image']."'/>
                                                </div>
                                                <div style='font-size:20px;' class='text-center'>";
                                                    echo"<h4 class='m-1'>{$row['partTitle']}</h4></a><br>";
                                                    echo"<div class='text-primary'>
                                                                <b></b>
                                                                <div class='m-1 text-black'><b>&#8377;{$row['price']}/-</b></div>
                                                        </div>
                                                        <div class='mx-sm'>
                                                        <div class='mb-3 mt-2 md-mt-2 d-flex jcsa md-flex-col'>
                                                                <div class='md-mb-2'><a style='background:#28AB87' class='button-field text-deco-none shadow-md' href='details.php?part_det={$partID}'>Details</a></div>
                                                                <div><a style='background:#28AB87'  class='button-field text-deco-none shadow-md' href='index.php?add_cart={$partID}'>AddToCart</a></div>
                                                        </div>
                                                        </div>
                                                </div>
                                            </div>
                                            ";
                                    }
                                    echo'
                                    
                                    ';
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
        <!-- Content -->
<?php
    require "footer.php";
?>
<?php
    if (isset($_GET['add_cart'])) {
        $userID = $_SESSION['userId'];
        if($userID == 0){
            echo "<script>window.open('login.php?login=notlogin','_self')</script>";
        }
        else{
            $p_id = $_GET['add_cart'];
            $check_product = "SELECT * FROM cart WHERE userID='$userID' AND productid='$p_id';";
            $run_product = mysqli_query($conn, $check_product);
            $part_qty = 1;
            if (mysqli_fetch_array($run_product) > 0) {
                echo"<script>alert('This product has already added in cart')</script>";
                echo"<script>window.open('index.php?pro_id=$p_id','_self')</script>";
            } else {
                $query = "INSERT INTO cart(cID, userID, productid, quantity) VALUES (null, '$userID', '$p_id','$part_qty');";
                $check = mysqli_query($conn, $query);
                if($check){
                    echo"<script>window.open('index.php?part_det='$p_id'','_self')</script>";
                }
            }
        }
   }
   if (isset($_GET['addpc_cart'])) {
    $userID=$_SESSION['userId'];
    $p_id = $_GET['addpc_cart'];
    $check_product = "SELECT * FROM pccart WHERE userid='$userID' AND pcid='$p_id';";
    $run_product = mysqli_query($conn, $check_product);
    if (mysqli_fetch_array($run_product) > 0) {
         echo"<script>alert('This product has already added in cart')</script>";
         echo"<script>window.open('index.php?pro_id=$p_id','_self')</script>";
    } else {
    $query = "INSERT INTO pccart VALUES (null, '$p_id', '$userID');";
    $check = mysqli_query($conn, $query);
    if($check){
         echo"<script>window.open('index.php?part_det='$p_id'','_self')</script>";
         }
    }
}
?>