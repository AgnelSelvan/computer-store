<?php
     require"header.php";
     require"./includes/dbh.inc.php";
     include("./functions/functions.php");
?>
     <div class="bg-color">
          <div class="container pt-sm">
               <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="./index.php">Home</a> > Details</div>
                    <div class="d-flex">
                         <div style="width:35%" class="white mr-1 b-rad-2">
                              <?php
                                   if(isset($_GET['part_det'])){
                                        $p_id = $_GET['part_det'];
                                        $query = "SELECT * FROM pcpart WHERE pcPartID='$p_id';";
                                        $check = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($check)){
                                             echo"
                                                  <div>
                                                       <div><img style='width:200px;' class=' m-1' src='admin/upload/".$row['image']."' alt='picture'/></div>
                                                       <img style='width:100px;' class='img1 m-1' src='admin/upload/".$row['image']."' alt='picture'/>
                                                       <img style='width:100px;' class='img1 m-1' src='admin/upload/".$row['image']."' alt='picture'/>
                                                       <img style='width:100px;' class='img1 m-1' src='admin/upload/".$row['image']."' alt='picture'/>
                                                  </div>
                                             ";
                                             
                                        }
                                   }
                              ?>
                         </div>
                         <div style="width:65%; height:500px;" class="white b-rad-2">
                              <?php
                                   
                                   if(isset($_GET['part_det'])){
                                        $p_id = $_GET['part_det'];
                                        $query = "SELECT * FROM pcpart WHERE pcPartID='$p_id';";
                                        $check = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($check)){
                                             $partname = $row['partName'];
                                             $q = "SELECT * FROM pcpartcomp WHERE pcPartID = '$partname';";
                                             $connect = mysqli_query($conn, $q);
                                             if($connect){
                                                  while($partrow = mysqli_fetch_row($connect)){
                                                       $partName = $partrow[1];
                                                  }
                                             }
                                             $partid = $row['pcPartID'];
                                             echo"
                                             <div class='container'>
                                                  <h3 class='mt-3'>$partName</h3><br>
                                                  <div style='color:gray'>
                                                       {$row['partDesc']}
                                                  </div>
                                                  <div>
                                                       Quantity<select style='width:200px;' class='p-sm m-2' name='part_qty'>
                                                       ";
                                                       for($i = 1;$i <= $row['qty']; $i++){
                                                            echo"<option>$i</option>";
                                                       }
                                                       echo"
                                                       </select>
                                                  </div>
                                                  <div>
                                                       
                                                       <div class='text-left'>
                                                       
                                                       <a href='index.php' style='padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;' class='text-deco-none b-rad-2 shadow-md'>Go back</a></div>
                                                       <form action='details.php?add_cart={$partid}' method='POST'>
                                                       <div class='text-right'><button style='padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;' class='text-deco-none b-rad-2 shadow-md'>Add to cart</button></div>
                                                       </form>
                                                  </div>
                                                  "?><?php
                                                       add_cart();
                                                       echo"
                                             </div>
                                             ";
                                             
                                        }
                                   }
                              ?>
                         </div>
                    </div>
          </div>
     </div>
<?php
     require"footer.php";
?>