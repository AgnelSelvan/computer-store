<?php
    require "../../includes/dbh.inc.php";
    include('../../functions/functions.php');
    session_start();
?>
<?php
     if(isset($_POST['payment'])){
          $ordernumber = rand();
          $subTotal = $_SESSION['grandtotal'];
          $shippingCharge = $_SESSION['shippingCharge'];
          $taxCharge = $_SESSION['taxCharge'];
          $total = $_SESSION['total'];
          $userID = $_SESSION['userId'];
          $cartSelect = "SELECT * FROM cart WHERE userID='$userID'";
          $runQuery = mysqli_query($conn, $cartSelect);
          if($runQuery){
               while($cartrow = mysqli_fetch_array($runQuery)){
                    
                    $partID = $cartrow['productid'];
                    $partQty = $cartrow['quantity'];
                    $paymentMethod = $_POST['paymentmethod'];
                    $pcID = 0;
                    if(empty($paymentMethod)){
                         header("LOCATION: payment.php?payment=false");
                    }
                    else{
                         $insertorder = "INSERT INTO orders VALUES(NULL, '$ordernumber', '$userID', '$pcID', '$partID', '$partQty', '$paymentMethod', '$subTotal', '$shippingCharge', '$taxCharge', '$total')";
                         $insertcheck = mysqli_query($conn, $insertorder);
                         if($insertcheck){
                              $deletecart = "DELETE FROM cart WHERE productid='$partID'";
                              $rundelete = mysqli_query($conn, $deletecart);
                         }
                    }
               }
          }
          $cartSelect = "SELECT * FROM pccart WHERE userID='$userID'";
          $runQuery = mysqli_query($conn, $cartSelect);
          if($runQuery){
               while($cartrow = mysqli_fetch_array($runQuery)){
                    $pcID = $cartrow['pcid'];
                    $pcQty = 1;
                    $paymentMethod = $_POST['paymentmethod'];
                    $partID = 0;
                    if(empty($paymentMethod)){
                         header("LOCATION: payment.php?payment=false");
                    }
                    else{
                         $insertorder = "INSERT INTO orders VALUES(NULL, '$ordernumber', '$userID', '$pcID', '$partID', '$pcQty', '$paymentMethod', '$subTotal', '$shippingCharge', '$taxCharge', '$total')";
                         $insertcheck = mysqli_query($conn, $insertorder);
                         if($insertcheck){
                              $deletecart = "DELETE FROM pccart WHERE pcid='$pcID'";
                              $rundelete = mysqli_query($conn, $deletecart);
                         }
                    }
               }
          }
     }
?>

<!DOCTYPE html>
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Cart</title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="../../customstyle.css">
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
        <script>
             function printPage(){
                  window.print();
             }
        </script>
     </head>
     <body>
          <div style="position:sticky;top:0px;z-index:1;" class="d-flex flex-col">
               <div class="w-100 d-flex flex-row white">
                    <div class="container d-flex flex-row">
                         <a href="index.php">
                         <img class="img1" src="../../img/cpu.png" alt="logo">
                         </a>
                         <ul class="d-flex flex-row ls-none ">
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../index.php">Home</a></li>
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../builds/system-build.php">SystemBuild</a></li>
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../builds/completed_build.php">CompletedBuild</a></li>
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../about.php">About</a></li>
                         <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../contact.php">Contact</a></li>
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
                    <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../../index.php">Home</a>  > My Cart</div>
                    <div class="d-flex jcc">
                         <div class="p-1 white text-center mb-1">
                              <div class="m-sm"><h1>Thanks for your order</h1></div>
                              <div class="mx-3"><hr></div>
                              <div class="continer">
                                   <div class="container">
                                        <div class="mt-1 text-left">
                                             <div class="d-flex jcsa">
                                                  <div>
                                                       <table style="color:gray">
                                                            <tbody>
                                                                 <tr>
                                                                      <td class="text-left">Order number</td>
                                                                      <td class="text-right"><?php echo $ordernumber; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <td class="text-left">Order Date</td>
                                                                      <td class="text-right"><?php echo date("l, F jS Y");?></td>
                                                                 </tr>
                                                                 <tr>
                                                                      <td class="text-left">Customer Name</td>
                                                                      <td class="text-right"><?php echo $_SESSION['userUid']; ?></td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                                  <div>
                                                       <div style="vertical-align: middle;">
                                                            <button onclick="printPage()" class="px-1 py-sm"><i class="fa fa-print pr-sm"></i>Print Page</button>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="py-1">
                                                  <i style="color:#28AB87;" class="fa fa-map-marker"></i>
                                                  <b>
                                                        Please keep the above number for your refernces. We'll also send a confirmation to the email address you used for this order.
                                                  </b>
                                             </div>
                                             <div class=" d-flex jcsa">
                                                  <div style="width:300px;">
                                                       <p class="pb-sm"><b>Shipping Address</b></p>
                                                       <p>
                                                            2467 Mission Street, SAN FRANSISCO, CA 942323-2348
                                                            US 412378478
                                                       </p>
                                                       <p>agnelselvan007@gamil.com</p>
                                                  </div>
                                                  <div>
                                                       <p class="pb-sm"><b>Payment Method</b></p>
                                                       <p>COD</p>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div style="width:30%" class="ml-1 mb-1 white">
                              <div style="background:#eee;" class="p-1 text-black">
                                   Order Summary
                              </div>
                              <div class="p-1">
                                   <div class="d-flex jcsb m-sm">
                                        <div>SubTotal</div>
                                        <?php $subtotal = $_SESSION['grandtotal'] ?>
                                        <div class="mr-1">&#8377;<?php echo $subtotal; ?></div>
                                   </div>
                                   <div class="mx-sm">
                                        <hr>
                                   </div>
                                   <div class="d-flex jcsb m-sm">
                                        <div>Shipping</div>
                                        <?php $shipping=$_SESSION['shippingCharge']; ?>
                                        <div class="mr-1">&#8377; <?php echo $shipping; ?></div>
                                   </div>
                                   <div class="mx-sm">
                                        <hr>
                                   </div>
                                   <div class="d-flex jcsb m-sm">
                                        <div>Discount</div>
                                        <div class="mr-1">&#8377; 0</div>
                                   </div>
                                   <div class="mx-sm">
                                        <hr>
                                   </div>
                                   <div class="d-flex jcsb m-sm">
                                        <div> Estimated Tax</div>
                                        <?php $taxCharge=$_SESSION['taxCharge']; ?>
                                        <div class="mr-1">&#8377; <?php echo $taxCharge; ?></div>
                                   </div>
                                   <div class="mx-sm">
                                        <hr>
                                   </div>
                                   <div class="d-flex jcsb m-sm">
                                        <div>Order Total</div>
                                        <?php $total=$_SESSION['total'];?>
                                        <div class="mr-1">&#8377; <?php echo $total ?></div>
                                   </div>
                                   <div class="mx-sm">
                                        <hr>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="d-flex ">
                         <div style="width:70%" class="">
                              <div class="mt-1">
                                   <div style="" class="white b-rad-1 shadow-sm p-1">
                                        <b> Products You may also like</b>
                                   </div>
                              </div>
                              <div class="d-flex flex-wrap jcsa">
                                   <?php
                                   $query = "SELECT * FROM pcpart ORDER BY RAND() LIMIT 0,3;";
                                   $check = mysqli_query($conn, $query);
                                   while ($row = mysqli_fetch_assoc($check)) {
                                        $partname = $row['partKeyword'];
                                        $partID = $row['pcPartID'];
                                        echo "
                                             <div style='width:220px;'  class='shadow-md mx-sm my-1 white b-rad-2 card-hover'>
                                                  <img class='img2 mt-1 mx-sm' src='../../admin/upload/".$row['image']."'/>
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
                                                                 <a style='background:#28AB87' class='button-field text-deco-none shadow-md' href='details.php?part_det={$partID}'>Details</a>
                                                                 <a style='background:#28AB87'  class='button-field text-deco-none shadow-md' href='index.php?add_cart={$partID}'>Add to cart</a>
                                                       </div>
                                                  </div>
                                             </div>
                                        ";
                                   }
                                   ?>
                              </div>
                         </div>
                         <div style="width:30%" class="mt-1 ml-1">
                              <div class="white text-deco-none shadow-md b-rad-1">
                                   <div style="background:#eee;" class="p-1 b-rad-1">
                                        Need Help?
                                   </div>
                                   <div class="container">
                                        <div class="p-1">
                                             <ul class="ls-none">
                                                  <li class="p-sm"><a class="text-deco-none" href="../../contact.php">Send feedback</a></li>
                                                  <li class="p-sm"><a class="text-deco-none" href="">Ordering Information</a></li>
                                                  <li class="p-sm"><a class="text-deco-none" href="">Chat with us</a></li>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
          </div>
     </div>
          <script src="" async defer></script>
          <?php require'../footer.php';?>
     </body>
</html>