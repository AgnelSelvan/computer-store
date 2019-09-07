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
                              loginORnot();
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
                                        $ip_add = getRealIpUser();
                                        $selectQuery = "SELECT * FROM cart WHERE ipAddr='$ip_add'";
                                        $runQuery = mysqli_query($conn, $selectQuery);
                                        $count = mysqli_num_rows($runQuery);
                                   ?>
                                   <h1 style="color:#003426;">Shopping Cart</h1>
                                   <div class="pb-1 mt-1" style="color:gray">You Have currently <?php echo $count; ?> item(s) in your cart</div>
                                   <table style="width:100%;" class="content-table">
                                        <thead>
                                             <tr>
                                                  <th>Product</th>
                                                  <th>Quantity</th>
                                                  <th>Price</th>
                                                  <th>Delete</th>
                                                  <th>SubToatal</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                                  <?php
                                                       $grandTotal = 0;
                                                       $getCart = "SELECT * FROM cart";
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
                                                                 $subTotal = $quantity * $unitprice;
                                                                 $grandTotal += $subTotal;
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
                                                                      <td><input type="checkbox" name="remove[]" value='?><?php echo $productID; echo'></td>
                                                                      <td>&#8377;'.$subTotal.'</td>
                                                                 </tr>
                                                                 ';
                                                            }
                                                       }
                                                  ?>
                                        </tbody>
                                   </table>
                                   <div class="text-right mr-4 mb-2">&#8377;<?php echo $grandTotal;?></div>
                                   <div class="d-flex jcsb">
                                        <a href="../index.php" style="padding:10px 14px;margin-top:20px;background:#28AB87; border:none; color:white;" class="text-deco-none b-rad-2 shadow-md"><i class="fas fa-step-backward pr-sm"></i>Continue Shopping</a>
                                        <button type="submit" name="update" value="Update Cart" style="padding:10px 14px;margin-top:20px;background:#28AB87; border:none; color:white;" class="text-deco-none b-rad-2 shadow-md">
                                             <i class=" fas fa-refresh pr-sm"></i>
                                             Update Cart
                                        </button>
                                        <a href="#" style="padding:10px 14px;margin-top:20px;background:#28AB87; border:none; color:white;" class="ml-2 text-deco-none b-rad-2 shadow-md">Proceed Checkout <i class="pl-sm fas fa-fast-forward"></i> </a>
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
                                        }
                                   }
                                   echo @$up_cart = update_cart();
                              ?>
                         </div>
                         <div style="min-width:30%" class="ml-1 white b-rad-2">
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
                                   <p>Shipping & Handling</p>
                                   <p>&#8377;0</p>
                              </div>
                              <div class="mx-2">
                                   <hr>
                              </div>
                              <div class="d-flex jcsb mx-3 my-1">
                                   <p>Tax</p>
                                   <p>&#8377;0</p>
                              </div>
                              <div class="mx-2">
                                   <hr>
                              </div>
                              <div class="d-flex jcsb mx-3 my-1">
                                   <p><b>Total</b></p>
                                   <p><b>&#8377;<?php echo $grandTotal; ?></b></p>
                              </div>
                         </div>
                    </div>
                    <div style="" class="white mt-1 p-1">
                        <b> Products You may also like</b>
                    </div>
                    <div class="d-flex jcc">
                         <?php
                              $selectQuery = "SELECT * FROM pcpart ORDER BY RAND() LIMIT 0,4";
                              $runQuery = mysqli_query($conn, $selectQuery);
                              while($row = mysqli_fetch_array($runQuery)){
                                   $pcPartID = $row['pcPartID'];
                                   $partTitle = $row['partTitle'];
                                   $image = $row['image'];
                                   $partKeyword = $row['partKeyword'];
                                   $query = "SELECT * FROM pcpartcomp WHERE pcPartID='$partKeyword'";
                                   $check = mysqli_query($conn, $query);
                                   $partName = $check;
                                   echo"
                                   <div style='width:220px;' class='mx-2 d-flex flex-wrap jcc'>
                                        <div class='mt-1 mr-2 shadow-md white b-rad-2'>
                                             <img class='img2 m-1' src='../admin/upload/$image'/>
                                             <div style='font-size:20px;' class='text-center'>
                                                  <h3 class='m-sm'>$partTitle</h3><br>
                                                  <div class='text-primary'>
                                                       <div class=''><b style='color:#28AB87'>&#8377;1000/-</b></div>
                                                  </div>
                                                  <div class='mb-3 mt-2'>
                                                       <a class='button-field text-deco-none shadow-md' href='details.php?part_det={$pcPartID}'>Details</a>
                                                       <a class='button-field text-deco-none shadow-md' href='index.php?add_cart={$pcPartID}'>Add to cart</a>
                                                  </div>
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
     </body>
</html>