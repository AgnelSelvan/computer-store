<?php
    require "../includes/dbh.inc.php";
    include('../functions/functions.php');
    session_start();
?>
<!DOCTYPE html>
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Cart</title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../customstyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
        <style>
             .content-table{
                  border-collapse: collapse;
                  margin: 25px 0;
                  font-size: 0.9rem;
                  min-width: 400px;
             }
             .content-table thead tr{
                  background: #009879;
                  color: white;
                  text-align: left;
                  font-weight: bold;
             }
             .content-table th,
             .content-table td{
                    padding: 12px 15px;
             }
             .content-table tbody tr{
                  border-bottom: 1px solid #dddddd;
             }
             .content-table tbody tr:nth-last-of-type(even){
                  background: #f3f3f3;
             }
             .content-table tbody tr:last-of-type{
               border-bottom: 2px solid #009879;
             }
             .cart-btn{
                position:relative;
                cursor: pointer;
            }
            .cart-items{
                position: absolute;
                top: -8px;
                right: -8px;
                background: #28AB87;
                padding: 0 5px;
                border-radius: 30%;
                color: white;
            }
        </style>
     </head>
     <body>
          <div style="position:sticky;top:0px;z-index:1;" class="d-flex flex-col">
               <div class="w-100 d-flex flex-row white">
                    <div class="container d-flex flex-row">
                         <a href="index.php">
                         <img class="img1" src="../img/cpu.png" alt="logo">
                         </a>
                         <ul class="d-flex flex-row ls-none ">
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../index.php">Home</a></li>
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../builds/system-build.php">SystemBuild</a></li>
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../builds/completed_build.php">CompletedBuild</a></li>
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
                                   <div style="font-size:30px;" class="nav-icon"><a href="cart.php"><i style="color:black;" class="fas fa-cart-plus"></i></a></div>
                                   <div class="cart-items">'?><?php cartcount(); echo'</div>
                                   </div>
                                   <div style="font-size:30px; padding:0 15px;" class="text-black"><a class="text-black" href="../account/myAccount.php?acc"><div class="mx-1" ><i class="fas fa-user-circle"></i></div></a></div>
                                   <div style="margin:10px 0;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../includes/logout.inc.php" name="logout-submit">Logout</a></div>
                                   </div>
                                   </form>';
                               }
                               else{
                                   echo'
                                   <div class="container d-flex flex-row jcfe">
                                       <div ><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="signup.php">Signup</a></div>
                                       <div><a class="text-deco-none text-black pr-1 mr-2 nav loginphp" href="login.php">Login</a></div>
                                   </div>
                                   ';
                               }
                          ?>
                    </div>
               </div>
          </div>
          <div class="primary bg-color">
               <div class="container pt-1">
                    <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a>  > My Cart</div>
                    <div class="d-flex">
                         <div class="w-100 b-rad-2 shadow-md white text-left p-3" >
                              <form action="cart.php" method="POST" enctype="multipart/form-data">
                                   <?php
                                        $userID = $_SESSION['userId'];
                                        $selectQuery = "SELECT * FROM cart WHERE userID='$userID'";
                                        $runQuery = mysqli_query($conn, $selectQuery);
                                        $count = mysqli_num_rows($runQuery);
                                        
                                        $countCart = "SELECT * FROM pccart WHERE userid='$userID'";
                                        $countQuery = mysqli_query($conn, $countCart);
                                        $count += mysqli_num_rows($countQuery);
                                   ?>
                                   <h1 style="color:#003426;">Shopping Cart</h1>
                                   <div class="pb-1 mt-1" style="color:gray">You Have currently <?php echo $count; ?> item(s) in your cart</div>
                                   <table style="width:100%;" class="content-table">
                                        <thead>
                                             <tr>
                                                  <th>Product</th>
                                                  <th>Quantity</th>
                                                  <th>Unit Price</th>
                                                  <th>Discount</th>
                                                  <th>Delete</th>
                                                  <th>Total</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                                  <?php
                                                       $grandTotal = 0;
                                                       $userID = $_SESSION['userId'];
                                                       $getCart = "SELECT * FROM cart WHERE userID='$userID'";
                                                       $runGetCart = mysqli_query($conn, $getCart);
                                                       while($row = mysqli_fetch_array($runGetCart)){
                                                            $productID = $row['productid'];
                                                            $quantity = $row['quantity'];
                                                            $getproduct = "SELECT * FROM pcpart WHERE pcPartID='$productID'";
                                                            $rungetProduct = mysqli_query($conn, $getproduct);
                                                            while($productrow = mysqli_fetch_array($rungetProduct)){
                                                                 $partTitle = $productrow['partTitle'];
                                                                 $image = $productrow['image'];
                                                                 $unitprice = $productrow['price'];
                                                                 $haha = $quantity * $unitprice;
                                                                 $subTotal = $haha - $discount;
                                                                 $grandTotal += $subTotal;
                                                                 $discount = $unitprice * $quantity * 0.25;
                                                                 echo '
                                                                 <tr>
                                                                      <td>
                                                                           <a class="text-deco-none" href="../details.php?part_det='?><?php echo $productrow['pcPartID']; echo'">
                                                                           <img class="img1" src="../admin/upload/'.$productrow['image'].'" alt="amd">'?>
                                                                                <?php echo $partTitle; echo'
                                                                           </a>
                                                                      </td>
                                                                      <td>'?><?php echo $quantity; echo'</td>
                                                                      <td>&#8377;'.$unitprice.'</td>
                                                                      <td>&#8377;'.$discount.'</td>
                                                                      <td><input type="checkbox" name="remove[]" value='?><?php echo $productID; echo'></td>
                                                                      <td>&#8377;'.$subTotal.'</td>
                                                                 </tr>
                                                                 ';
                                                            }
                                                            session_start();
                                                            $_SESSION['grandtotal'] = $grandTotal;
                                                       }

                                                       $getCart = "SELECT * FROM pccart WHERE userid='$userID'";
                                                       $runGetCart = mysqli_query($conn, $getCart);
                                                       while($row = mysqli_fetch_array($runGetCart)){
                                                            
                                                            $productID = $row['pcid'];
                                                            $quantity = 1;
                                                            $getproduct = "SELECT * FROM pc_details WHERE pc_id='$productID'";
                                                            $rungetProduct = mysqli_query($conn, $getproduct);
                                                            while($productrow = mysqli_fetch_array($rungetProduct)){
                                                                 $grandTotal = $_SESSION['grandtotal'];
                                                                 $partTitle = $productrow['pcName'];
                                                                 $image = $productrow['pc_image'];
                                                                 $unitprice = $productrow['pcPrice'];
                                                                 $subTotal = $quantity * $unitprice;
                                                                 $grandTotal += $subTotal;
                                                                 echo '
                                                                 <tr>
                                                                      <td>
                                                                           <a class="text-deco-none" href="../details.php?pc_det='?><?php echo $productrow['pc_id']; echo'">
                                                                           <img class="img1" src="../admin/upload/'.$image.'" alt="amd">'?>
                                                                                <?php echo $partTitle; echo'
                                                                           </a>
                                                                      </td>
                                                                      <td>'?><?php echo $quantity; echo'</td>
                                                                      <td>&#8377;'.$unitprice.'</td>
                                                                      <td><input type="checkbox" name="delete[]" value='?><?php echo $productID; echo'></td>
                                                                      <td>&#8377;'.$subTotal.'</td>
                                                                 </tr>
                                                                 ';
                                                            }
                                                            $_SESSION['grandtotal'] = $grandTotal;
                                                       }
                                                  ?>
                                        </tbody>
                                   </table>
                                   <div class="text-right mr-4 mb-2"><?php 
                                        if($count === 0){ echo "<p style='font-size:14px;'>No items in your cart</p>";}
                                        else{
                                             echo"<b>Total: </b> "; 
                                             echo "&#8377;"+$grandTotal;}?>
                                        </div>
                                   <div class="d-flex jcsb">
                                        <a href="../index.php" style="padding:10px 14px;margin-top:20px;background:#28AB87; border:none; color:white;font-size:16px;" class="text-deco-none b-rad-2 shadow-md"><i class="fas fa-step-backward pr-sm"></i>Continue Shopping</a>
                                        <button type="submit" name="update" value="Update Cart" style="padding:10px 14px;margin-top:20px;background:#28AB87; border:none; color:white;" class="text-deco-none b-rad-2 shadow-md">
                                             <i class=" fas fa-refresh pr-sm"></i>
                                             Update Cart
                                        </button>
                                        <a href="./order/proceedcheckout.php" style="padding:10px 14px;margin-top:20px;background:#28AB87; border:none; color:white;font-size:16px;" class="ml-2 text-deco-none b-rad-2 shadow-md">Proceed Checkout <i class="pl-sm fas fa-fast-forward"></i> </a>
                                   </div>
                              </form>
                              <?php
                                   function update_cart(){
                                        global $conn;
                                        if(isset($_POST['update'])){
                                             foreach($_POST['remove'] as $remove_id){
                                                  $delete_product = "DELETE FROM cart WHERE productid='$remove_id'";
                                                  $run_delete = mysqli_query($conn, $delete_product);
                                                  if($run_delete){
                                                       echo"<script>window.open('cart.php','_self')</script>";
                                                  }
                                             }
                                             foreach($_POST['delete'] as $delete_id){
                                                  echo $delete_id;
                                                  $delete_product = "DELETE FROM pccart WHERE pcid='$delete_id'";
                                                  $run_delete = mysqli_query($conn, $delete_product);
                                                  if($run_delete){
                                                       echo"<script>window.open('cart.php','_self')</script>";
                                                  }
                                             }
                                        }
                                   }
                                   echo @$up_cart = update_cart();
                                   if($count == 0)
                                   {
                                        $shippingCharge = 0;
                                        $taxCharge = 0;
                                   }
                                   else{
                                        if($grandTotal <= 1000){
                                             $shippingCharge = 20;
                                        }
                                        else{
                                             $shippingCharge = 0;
                                        }
                                        if($grandTotal <= 250){
                                             $taxCharge = 6;
                                        }
                                        elseif($grandTotal <= 500){
                                             $taxCharge = 16;
                                        }
                                        elseif($grandTotal <= 1000){
                                             $taxCharge = 32;
                                        }
                                        elseif($grandTotal >= 1000){
                                             $taxCharge = 60;
                                        }
                                   }

                              ?>
                         </div>
                         <div style="width:40%" class="ml-1 white b-rad-2">
                              <div style="background:#eee" class="b-rad-2">
                                   <h1 class="py-1">Order Summary</h1>
                              </div>
                              <div style="color:gray;" class="py-2 container">
                                   <p>
                                        Shipping and additional costs are calculated based on value you have entered
                                   </p>
                              </div>
                              <div class="mx-2">
                                   <hr>
                              </div>
                              <div class="d-flex jcsb mx-3 my-1">
                                   <p>Order Sub-total</p>
                                   <p>&#8377;<?php echo $grandTotal; ?></p>
                              </div>
                              <div class="mx-2">
                                   <hr>
                              </div>
                              <div class="d-flex jcsb mx-3 my-1">
                                   <p>Shipping</p>
                                   <p>&#8377;<?php session_start();$_SESSION['shippingCharge']=$shippingCharge; echo $shippingCharge; ?></p>
                              </div>
                              <div class="mx-2">
                                   <hr>
                              </div>
                              <div class="d-flex jcsb mx-3 my-1">
                                   <p>Tax</p>
                                   <p>&#8377;<?php session_start(); $_SESSION['taxCharge']=$taxCharge; echo $taxCharge; ?></p>
                              </div>
                              <div class="mx-2">
                                   <hr>
                              </div>
                              <div class="d-flex jcsb mx-3 my-1">
                                   <p><b>Total</b></p>
                                   <p><b>&#8377;
                                        <?php
                                             $total=$shippingCharge+$grandTotal+$taxCharge;
                                             session_start();
                                             $_SESSION['total']=$total;
                                             echo $total;
                                        ?>
                                   </b></p>
                              </div>
                         </div>
                    </div>
                    <div style="" class="white mt-1 p-1">
                        <b> Products You may also like</b>
                    </div>
                    <div class="d-flex flex-wrap jcsa">
                         <?php
                         $query = "SELECT * FROM pcpart ORDER BY RAND() LIMIT 0,4;";
                         $check = mysqli_query($conn, $query);
                         while ($row = mysqli_fetch_assoc($check)) {
                              $partname = $row['partKeyword'];
                              $partID = $row['pcPartID'];
                              echo "
                                   <div style='width:220px;'  class='shadow-md mx-sm my-1  white b-rad-2 card-hover'>
                                        <img class='img2 mt-1' src='../admin/upload/".$row['image']."'/>
                                        <div style='font-size:20px;' class='text-center'>";
                                             $q = "SELECT * FROM pcpartcomp WHERE pcPartID = '$partname';";
                                             $connect = mysqli_query($conn, $q);
                                             if($connect){
                                             while($partrow = mysqli_fetch_row($connect)){
                                                       
                                             }
                                             
                                             }
                                             echo"<a style='color:#28AB87' class='text-deco-none' href='details.php?part_det=".$partID."'><h4 class='m-1'>{$row['partTitle']}</h4></a><br>";
                                             echo"<div class='text-primary'>
                                                       <b></b>
                                                       <p>Quantity:{$row['qty']}</p>
                                                       <div class='m-1 text-black'><b>&#8377;{$row['price']}/-</b></div>
                                             </div>
                                             <div class='mb-3 mt-2'>
                                                       <a style='background:#28AB87' class='button-field text-deco-none shadow-md' href='../details.php?part_det={$partID}'>Details</a>
                                                       <a style='background:#28AB87'  class='button-field text-deco-none shadow-md' href='../cart.php?add_cart={$partID}'>Add to cart</a>
                                             </div>
                                        </div>
                                   </div>
                              ";
                         }
                         ?>
                    </div>
          </div>
          <script src="" async defer></script>
          <?php require'../footer.php';?>
          <?php
               if (isset($_GET['add_cart'])) {
                    $userID = $_SESSION['userId'];
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
          ?>
     </body>
</html>