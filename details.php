<?php
     require"header.php";
     require"./includes/dbh.inc.php";
     include("./functions/functions.php");
?>
     <!-- <div class="bg-color">
          <div class="container pt-sm">
               <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="./index.php">Home</a> > Details</div>
                    <div class="d-flex">
                         <div style="width:35%" class="white mr-1 b-rad-2">
                              <?php
                                   // if(isset($_GET['part_det'])){
                                   //      $p_id = $_GET['part_det'];
                                   //      $query = "SELECT * FROM pcpart WHERE pcPartID='$p_id';";
                                   //      $check = mysqli_query($conn, $query);
                                   //      while($row = mysqli_fetch_assoc($check)){
                                   //           echo"
                                   //                <div>
                                   //                     <div><img style='width:200px;' class=' m-1' src='admin/upload/".$row['image']."' alt='picture'/></div>
                                   //                     <img style='width:100px;' class='img1 m-1' src='admin/upload/".$row['image']."' alt='picture'/>
                                   //                     <img style='width:100px;' class='img1 m-1' src='admin/upload/".$row['image']."' alt='picture'/>
                                   //                     <img style='width:100px;' class='img1 m-1' src='admin/upload/".$row['image']."' alt='picture'/>
                                   //                </div>
                                   //           ";
                                             
                                   //      }
                                   // }
                              ?>
                         </div>
                         <div style="width:65%; height:500px;" class="white b-rad-2">
                              <?php
                                   
                                   // if(isset($_GET['part_det'])){
                                   //      $p_id = $_GET['part_det'];
                                   //      $query = "SELECT * FROM pcpart WHERE pcPartID='$p_id';";
                                   //      $check = mysqli_query($conn, $query);
                                   //      while($row = mysqli_fetch_assoc($check)){
                                   //           $partname = $row['partName'];
                                   //           $q = "SELECT * FROM pcpartcomp WHERE pcPartID = '$partname';";
                                   //           $connect = mysqli_query($conn, $q);
                                   //           if($connect){
                                   //                while($partrow = mysqli_fetch_row($connect)){
                                   //                     $partName = $partrow[1];
                                   //                }
                                   //           }
                                   //           $partid = $row['pcPartID'];
                                   //           echo"
                                   //           <div class='container'>
                                   //                <h3 class='mt-3'>$partName</h3><br>
                                   //                <div style='color:gray'>
                                   //                     {$row['partDesc']}
                                   //                </div>
                                   //                <div>
                                   //                     Quantity<select style='width:200px;' class='p-sm m-2' name='part_qty'>
                                   //                     ";
                                   //                     for($i = 1;$i <= $row['qty']; $i++){
                                   //                          echo"<option>$i</option>";
                                   //                     }
                                   //                     echo"
                                   //                     </select>
                                   //                </div>
                                   //                <div>
                                                       
                                   //                     <div class='text-left'>
                                                       
                                   //                     <a href='index.php' style='padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;' class='text-deco-none b-rad-2 shadow-md'>Go back</a></div>
                                   //                     <form action='details.php?add_cart={$partid}' method='POST'>
                                   //                     <div class='text-right'><button style='padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;' class='text-deco-none b-rad-2 shadow-md'>Add to cart</button></div>
                                   //                     </form>
                                   //                </div>
                                   //                "?><?php
                                   //                     add_cart();
                                   //                     echo"
                                   //           </div>
                                   //           ";
                                             
                                   //      }
                                   // }
                              ?>
                         </div>
                    </div>
          </div>
     </div> -->
     <div class="container">
          
          <div>
               <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="./index.php">Home</a> > Details</div>
          </div>
          <div class="d-flex">
               <div style="width:30%" class="mr-2 d-flex flex-col ">
                    <div class="white mt-sm mb-1 shadow-md">
                         <div style="background:#BEBEBE" class="p-1"><h2>Products</h2></div>
                         <div class="white">
                              <ul style="font-size:26px;" class="pl-3 ls-none mb-2 text-left">
                                   <li class="pt-2"><a style=" color:#28AB87;" class="text-deco-none" href=""><i style="margin-right:8px;" class="fas fa-microchip"></i>CPU</a></li>
                                   <li class="pt-1" style="color:#28AB87;"><a style=" color:#28AB87;" class="text-deco-none" href=""><i style="margin-right:8px; color:#28AB87;" class="fas fa-suitcase"></i>Case</a></li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><img style="width:30px;" class="mr-sm" src="png/motherboard.png" alt=""> Motherboard</a> </li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><img style="width:30px;" class="mr-sm" src="png/ram.png" alt="">RAM</a></li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><img style="width:30px;" class="mr-sm" src="png/harddisk.png" alt="">Hard Disk</a> </li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><img style="width:30px;" class="mr-sm" src="png/graphicscard.jpg" alt=""> Graphics Card</a></li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><i style="margin-right:8px;" class="fas fa-desktop"></i>Monitor</a></li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><img style="width:30px;" class="mr-sm" src="png/mouse.png" alt=""> Mouse</a></li>
                                   <li class="pt-1"><a style=" color:#28AB87;" class="text-deco-none" href=""><img style="width:30px;" class="mr-sm" src="png/motherboard.png" alt=""> Keyboard</a></li>
                              </ul>
                         </div>
                    </div>
                    <div class="white">
                         <div style="background:#BEBEBE" class="p-1"><h2>Categories</h2></div>
                         <ul style="font-size:26px;" class="pl-3 ls-none mb-2 text-left">
                              <li class="pt-2"><a style=" color:#28AB87;" class="text-deco-none"  href="">System Build</a> </li>
                              <li class="pt-2"><a style=" color:#28AB87;" class="text-deco-none"  href="">Completed Builds</a></li>
                         </ul>
                    </div>
               </div>
               <div style="width:37%" class="d-flex">
               
                    <div class="mt-sm" style="width:100%; height:auto;"  ><img class="responsive" src="admin/upload/uploadedimages/haha.jpg" alt=""></div>
                    <div class="w-min-100 h-min-100 mt-sm ml-1">
                         <div>
                              <div class=" white pt-1 ">
                              <h2><b> Graphics Card</b></h2>
                              </div>
                              <div class="pt-1 white pb-sm">
                              <b>Brand:</b> Nvdia
                              </div>
                              <div class="white p-sm">
                                   <b>Capacity:</b>  8GB
                                   <form action="">
                                        <select style="width:20%;" name="quantity" id="">
                                             <option value="">1</option>
                                             <option value="">2</option>
                                             <option value="">3</option>
                                             <option value="">4</option>
                                             <option value="">5</option>
                                        </select>
                                        <div class="pt-sm">
                                             &#8377; 1000
                                        </div>
                                        <div class="m-1">
                                             <button style="background:#28AB87; color:white" class="btn p-sm"><i style="padding-right:10px;color:white;" class="fas fa-cart-plus"></i>Add to cart</button>
                                        </div>
                                   </form>
                              </div>
                         </div>
                         <div class="mt-1 d-flex jcsa text-left">
                              <img width="100px;" src="admin/upload/uploadedimages/haha.jpg" alt="">
                              <img width="100px;" src="admin/upload/uploadedimages/haha.jpg" alt="">
                              <img width="100px;" src="admin/upload/uploadedimages/haha.jpg" alt="">
                         </div>
                    </div>
               </div>
          </div>
     </div>
<?php
     require"footer.php";
?>