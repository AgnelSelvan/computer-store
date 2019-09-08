<?php
     require"header.php";
     require"./includes/dbh.inc.php";
     include("./functions/functions.php");
?>
<?php
               if(isset($_GET['part_det']) || isset($_GET['add_cart']) || isset($_GET['qty'])){
                    if(isset($_GET['part_det'])){
                         $productID = $_GET['part_det'];
                    }
                    else{
                         $productID = $_GET['add_cart'];
                    }
                    $selQuery = "SELECT * FROM pcpart WHERE pcPartID='$productID'";
                    $runQuery = mysqli_query($conn, $selQuery);
                    $row = mysqli_fetch_array($runQuery);
                    $image = $row['image'];
                    $desc = $row['partDesc'];
                    $qty = $row['qty'];
                    $price = $row['price'];
                    $partTitle = $row['partTitle'];
                    $partName = $row['partKeyword'];
                    $fetchQuery = "SELECT * FROM pcpartcomp WHERE pcPartID='$partName'";
                    $fetchQuery = mysqli_query($conn, $fetchQuery);
                    $fetchRow = mysqli_fetch_array($fetchQuery);
                    $compName = $fetchRow['pcPartComponents'];
               }
?>
<?php
     if(isset($_GET['pc_det'])){
          $productID = $_GET['pc_det'];
          $selQuery = "SELECT * FROM pc_details WHERE pc_id='$productID'";
          $runQuery = mysqli_query($conn, $selQuery);
          $row = mysqli_fetch_array($runQuery);
          $image = $row['pc_image'];
          $partTitle = $row['pcName'];
          $price = $row['pcPrice'];
     }

     if (isset($_GET['add_cart'])) {
          $userID=$_SESSION['userId'];
          $part_qty = $_POST['quantity'];
          $p_id = $_GET['add_cart'];
          if($part_qty == 0){
               header("LOCATION: details.php?qty=no");
          }
          else{
               $check_product = "SELECT * FROM cart WHERE userID='$userID' AND productid='$p_id';";
               $run_product = mysqli_query($conn, $check_product);
               if (mysqli_fetch_array($run_product) > 0) {
                    echo"<script>alert('This product has already added in cart')</script>";
                    echo"<script>window.open('index.php?pro_id=$p_id','_self')</script>";
               } else {
               $query = "INSERT INTO cart(cID, userID, productid, quantity) VALUES (null, '$userID', '$p_id','$part_qty');";
               $check = mysqli_query($conn, $query);
               if($check){
                    echo"<script>window.open('details.php?part_det='$p_id'','_self')</script>";
                    }
               }
          }
     }
?>
     <div class="container">
          <style>
               .content-table{
                  border-collapse: collapse;
                  font-size: 0.9rem;
                  min-width: 400px;
                  width: 90%;
                  height:50%;
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
          </style>
          <div class="w-min-100">
               <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="./index.php">Home</a> > Details > <a href="" style="color:#28AB87;" class="text-deco-none"><?php if(isset($_GET['part_det'])){ echo $compName ;} ?></a><a href="./builds/completed_build.php" style="color:#28AB87;" class="text-deco-none"><?php if(isset($_GET['pc_det'])){ echo "Completed Builds" ;} ?></a>   > <?php echo $partTitle;  ?></div>
          </div>
          <div class="container">
                    <div class="w-min-100 d-flex mb-1">
                         <div class="text-left mr-1">
                              <img width="400px" src="admin/upload/<?php echo $image ; ?>" alt="">
                         </div>
                         <div style="width:100%" class="white p-1 shadow-md aic">
                              <?php
                                   if(isset($_GET['qty'])){
                                        echo"Enter some quantity";
                                   }
                              ?>
                              <div class=" white pt-1">
                                   <h3 class=""><b><?php echo $partTitle; ?></b></h3>
                              </div>
                              <div class="white p-sm">
                                   <?php
                                   if(isset($_GET['part_det']) || isset($_GET['add_cart']) || isset($_GET['qty'])){
                                   echo'
                                        <div>
                                             <form action="details.php?add_cart='?><?php echo $productID; echo'" method="POST">
                                                  <input class="input-field" type="number" style="" name="quantity" placeholder="Enter quantity...">
                                                  <div><button style="background:#28AB87; color:white" class="px-1 py-sm mt-1 b-0 b-rad-1 fas fa-cart-plus">Add to cart</button></div>
                                             </form>
                                        </div>
                                        
                                        ';
                                        
                                   }
                                   if(isset($_GET['pc_det'])){
                                        echo'
                                             <form action="">
                                                  <div class="pt-sm">
                                                       &#8377; ';
                                             echo $price;
                                             echo'
                                                  </div>
                                                  <div class="m-1">
                                                       <button style="background:#28AB87; color:white" class="btn p-sm"><i style="padding-right:10px;color:white;" class="fas fa-cart-plus"></i>Add to cart</button>
                                                  </div>
                                             </form>
                                             ';
                                             
                                        }
                                   ?>
                              </div>
                         </div>
                    </div>
                    <div class="white shadow-md ">
                         <div class="pt-1 px-1">
                              <h3 class="p-sm" style="background:#28AB87; color:white;">Products Details</h3>
                         </div>
                         <div class="mx-1 pb-1" style="font-size:18px;">
                              <p><?php if(isset($_GET['part_det']) || isset($_GET['add_cart'])){ echo "<div class='container p-2'>$desc</div>"; }?></p>
                              <p class="text-left">
                                   <?php
                                        if(isset($_GET['pc_det'])){
                                             echo"
                                                  <table class='w-min-100 content-table'>
                                                       <tr>
                                                            <th class='p-sm'>PC Type</th>
                                                            <th>{$row['PC_Type']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Motherboard</th>
                                                            <th>{$row['motherboard']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Processor</th>
                                                            <th>{$row['processor']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Hard Disk</th>
                                                            <th>{$row['hardDisk']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>RAM type</th>
                                                            <th>{$row['ram_type']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Ram Company</th>
                                                            <th>{$row['ram_company']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>RAM Capacity</th>
                                                            <th>{$row['ram_capacity']}</th>
                                                       </tr>
                                                       
                                                       <tr>
                                                            <th class='p-sm'>Graphics Card</th>
                                                            <th>{$row['graphics_card_type']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Graphics Capacity</th>
                                                            <th>{$row['graphics_card']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Monitor</th>
                                                            <th>{$row['monitor']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Monitor Display Size(in INCH)</th>
                                                            <th>{$row['monitor_display']}''</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Keyboard Company</th>
                                                            <th>{$row['keyboard_company']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Mouse Company</th>
                                                            <th>{$row['mouse_company']}</th>
                                                       </tr>
                                                       <tr>
                                                            <th class='p-sm'>Speaker Company</th>
                                                            <th>{$row['speakers']}</th>
                                                       </tr>
                                                  </table>

                                             ";
                                        }
                                   ?>
                              </p>
                         </div>
                    </div>
               <div style="" class="white mt-1 p-1">
                        <b> Products You may also like</b>
               </div>
               <div class="d-flex jcc">
                    <?php
                         if(isset($_GET['part_det']) || isset($_GET['add_cart'])){
                              $selectQuery = "SELECT * FROM pcpart ORDER BY RAND() LIMIT 0,3";
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
                                   <div class='d-flex flex-wrap jcc'>
                                   <div class='mt-1 mr-2 shadow-md white b-rad-2'>
                                        <img class='img2 m-1' src='admin/upload/$image'/>
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
                         }
                    ?>
                    <?php
                         if(isset($_GET['pc_det'])){
                              $query = "SELECT * FROM pc_details ORDER BY RAND() LIMIT 0,3;";
                              $check = mysqli_query($conn, $query);
                              while ($row = mysqli_fetch_assoc($check)) {
                                   $p_id = $row['pc_id'];
                                   echo "
                                        <div style='width:240px;' class='shadow-md text-center white m-1 p-1 b-rad-5'>
                                             <img class='img2 mt-1' src='./admin/upload/".$row['pc_image']."'/><br>
                                             <h3 style='margin-top:20px;'>{$row['pcName']}</h3>
                                             <div style='font-size:24px;color:#28AB87;'  class='text-primary p-1'>
                                                  <b>&#8377;  {$row['pcPrice']}</b>
                                             </div>
                                             <div class='my-1'>
                                             <a class='button-field text-deco-none shadow-md' href='details.php?pc_det={$p_id}'>Details<a>
                                             <a class='button-field text-deco-none shadow-md' href='details.php?pc_det={$p_id}'>Add to cart<a></div>
                                        </div>"
                              ;}
                         }
                    ?>
               </div>
          </div>
     </div>
<?php
     require"footer.php";
?>