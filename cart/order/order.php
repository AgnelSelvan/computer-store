<?php
    require "../../includes/dbh.inc.php";
    include('../../functions/functions.php');
    session_start();
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
                    <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a>  > My Cart</div>
                    <div class="d-flex jcc">
                         <div class="container p-1 white text-center mb-1">
                              <div class="m-sm"><h1>Thanks for your order</h1></div>
                              <div class="mx-3"><hr></div>
                              <div class="continer">
                                   <div class="container">
                                        <div style="color:e0e0e0;" class="mt-1 text-left">
                                             <div>Order Number:<?php $ordernumber = rand(); echo $ordernumber; ?>  </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="mt-1">
                         <div style="" class="white b-rad-1 shadow-md p-1">
                              <b> Products You may also like</b>
                         </div>
                    </div>
                    <div class="d-flex flex-wrap jcc">
                         <?php
                         $query = "SELECT * FROM pcpart ORDER BY RAND() LIMIT 0,4;";
                         $check = mysqli_query($conn, $query);
                         while ($row = mysqli_fetch_assoc($check)) {
                              $partname = $row['partKeyword'];
                              $partID = $row['pcPartID'];
                              echo "
                                   <div style='width:220px;'  class='shadow-md mx-sm my-1  white b-rad-2 card-hover'>
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
          <script src="" async defer></script>
          <?php require'../footer.php';?>
     </body>
</html>