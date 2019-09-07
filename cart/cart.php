<?php
    require "../includes/dbh.inc.php";
    include('../functions/functions.php');
    session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
          <div style="font-size:30px;" class="nav-icon"><a href="./cart.php"><i style="color:black;" class="fas fa-cart-plus"></i></a></div>
          <div class="cart-items">0</div>
          </div>
          <div style="font-size:30px; padding:0 15px;" class="text-black"><a class="text-black" href="../account/myAccount.php?acc"><div class="mx-1" ><i class="fas fa-user-circle"></i></div></a></div>
                                   <div style="margin-top:10px;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../includes/logout.inc.php" name="logout-submit">Logout</a></div>
                                   </div>
                                   </form>';
                               }
                               else{
                                   echo'
                                   <div class="container d-flex flex-row jcfe">
                                       <div ><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../signup.php">Signup</a></div>
                                       <div><a class="text-deco-none text-black pr-1 mr-2 nav" href="login.php" class="../loginphp">Login</a></div>
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
                    <div class="w-100 b-rad-2 shadow-md white text-left p-3" >
                         <h1 style="color:#003426;">Shopping Cart</h1>
                         <div class="pb-4" style="color:gray">You Have currently 3 item(s) in your cart</div>
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
                                   <tr>
                                        <td><img class="img1" src="../admin/upload/uploadedimages/AMD_mother.jpg" alt="amd"><a href="#">Motherboard</a></td>
                                        <td>8</td>
                                        <td>6000</td>
                                        <td><input type="checkbox" name="[]"></td>
                                        <td>9000</td>
                                   </tr>
                                   <tr>
                                        <td><img class="img1" src="../admin/upload/uploadedimages/AMD_mother.jpg" alt="amd"><a href="#">Motherboard</a></td>
                                        <td>8</td>
                                        <td>6000</td>
                                        <td><input type="checkbox" name="[]"></td>
                                        <td>9000</td>
                                   </tr>
                                   <tr>
                                        <td><img class="img1" src="../admin/upload/uploadedimages/AMD_mother.jpg" alt="amd"><a href="#">Motherboard</a></td>
                                        <td>8</td>
                                        <td>6000</td>
                                        <td><input type="checkbox" name="[]"></td>
                                        <td>9000</td>
                                   </tr>
                                   <tr>
                                        <td><img class="img1" src="../admin/upload/uploadedimages/AMD_mother.jpg" alt="amd"><a href="#">Motherboard</a></td>
                                        <td>8</td>
                                        <td>6000</td>
                                        <td><input type="checkbox" name="[]"></td>
                                        <td>9000</td>
                                   </tr>
                                   <tr>
                                        <td><img class="img1" src="../admin/upload/uploadedimages/AMD_mother.jpg" alt="amd"><a href="#">Motherboard</a></td>
                                        <td>8</td>
                                        <td>6000</td>
                                        <td><input type="checkbox" name="[]"></td>
                                        <td>9000</td>
                                   </tr>
                              </tbody>
                         </table>
                         <div class="text-left">
                              <a href="../index.php" style="padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;" class="text-deco-none b-rad-2 shadow-md"><img class="pr-sm" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAAAmJLR0QA/4ePzL8AAAD6SURBVDjL1dNLL4NhEMXxiQVxq7gFTVRFQpWNL21nUzQR98tCEEQiIk0RVNpP8bN5vbs+tWRWZ/E/k+c5MxPxX8qQLRuZnldX7IUf4UFfhAVNbKbwQQdoW41Q0sSNiRS+j7ZqhAUvuDbeHR+wk+Nlr7hQ6IV3VCMs+8S50e54v210rEVY0cKZkd/hFS2cpPEaOtYjrPrCnsFUlD/9q7kh1T+z7KKtkj/pLPHhbAKH+LCUZ5SKNFuJY7xbjFDuObSICMNO8aacb9GNybSl4BINxQglDdyaSlvGXOHZXIRZj7g3nbZMuEM9IkLRE2q9DmhKTTnTM+o/+k/WNwkhBXyhn2vyAAAAAElFTkSuQmCC">Continue Shopping</a>
                         </div>
                         <div class="text-right">
                              <a href="#" style="padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;" class="text-deco-none b-rad-2 shadow-md"><img class="pr-sm" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAAAmJLR0QA/4ePzL8AAADfSURBVDgR1cFLLkMBFADQG2GEdsAOtHP1GYpILYs+YhM+a3iJmImk6SJKbUF5A2rQ2VH/9+mgQ86Jf8CeC7devBo4tx/TOYoJTTfKeppRhcS2DA+OtdQsajkwRGYnyrwb49JK5KhJkWlEkU9981FiTopuFPmWRIW6IdqR51cSFTo4i9lpYRCzs4xR5BlhOWbnHusxO+c4jAqJH5FnH0O1qJD4EkV6SM1FiQV9H6JIU4ZUPXKsusLYRJTZkeFRx4YldZtOPOLJloSo0tBVdm0tJhzFdNrO3Bl51ndqN/6+N0OOEsZruO+6AAAAAElFTkSuQmCC">Update Cart</a>
                              <a href="#" style="padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;" class="ml-2 text-deco-none b-rad-2 shadow-md">Proceed Checkout<img class="pl-sm" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAAAmJLR0QA/4ePzL8AAADySURBVDjL1dLdK4NxFAfwkxts5CVZrc1LNitv5Z9252ZqmWlChiSlUPJuw/6Kjxs95cLzuORcnYvvp1/nnF/E3y1FDeWvft2mXBbYwL3ZCAMu0c4gxhzj2UKEqi4OjGSRDl5UIlT1sC+fTvL28KoSYVEPO4azSBvvln5PcnbxYTlCTQ/NbNJC30qEmjc0DaWTQVvoW03IdiqRs4O+tQjVzDeSKVYiVHTRSpni255mPOIw5Rrfjlf2gKOUext3knyPkjt0jKbFT/FkPkLBNc5N/ByfcIZbpQjTrnBhMm2VddwoRkRoZMYjzGkoJH3dVPyX+gSghAV/M/LrRQAAAABJRU5ErkJggg=="></a>
                         </div>
                         
                    </div>
               </div>
          </div>
          <script src="" async defer></script>
          <?php require'../footer.php';?>
     </body>
</html>