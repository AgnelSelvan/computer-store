<?php
    require "../includes/dbh.inc.php";
    include('../functions/functions.php');
    session_start();
?>
<!DOCTYPE html>
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>My Account</title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../customstyle.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
        <style>
          .active{
               background: #28AB87;
               color: white;
               height: 60px;
               margin-right: 32px;
          }
        </style>
     </head>
     <body>
          <div class="w-100 d-flex flex-row white">
                <div class="container d-flex flex-row">
                    <a href="../index.php">
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
          
          <?php
               $ipAdd = getRealIpUser();
               $userID=$_SESSION['userId'];
               $user_det = "SELECT * FROM users WHERE isUsers='$userID';";
               $run = mysqli_query($conn, $user_det);
               while($row = mysqli_fetch_array($run)){
                    $name = $row['uidUsers'];
                    $userImage = $row['userImage'];
                    $userEmail = $row['emailUsers'];
                    $userMobile = $row['mobNumber'];
               }
               ?>
          <div class="primary bg-color">
               <div style="position:sticky;top:0px;z-index:1;" class="container">
                    <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > My Account</div>
                    <div class="d-flex">
                          <div style="width:30%;" class="white mr-1 b-rad-2 shadow-sm ">
                              <div style="background:#eeeeee; font-size:16px;" class="b-rad-2 pb-1"> 
                                   <div class="pt-1"><img style="width:90%;" class="b-rad-2" src="../user/<?php echo $userImage; ?>" alt="My photo"/></div>
                                   <div class="text-left pl-1">
                                        <div class="m-1 "><i style="padding-right:10px;" class="fas fa-user"></i>Name: <?php echo $name; ?> </div>
                                        <div class="m-1"><i style="padding-right:10px;" class="fas fa-envelope"></i>Email: <?php echo $userEmail; ?></div>
                                        <div class="m-1 "><i style="padding-right:10px;" class="fas fa-mobile"></i>Mobile: <?php echo $userMobile; ?> </div>
                                   </div>
                              </div>
                              <div style="font-size:24px;" class="text-left pl-3">
                                   <div class="mt-2 mb-sm">
                                        <a style="color:#28AB87" class="text-deco-none" href="myAccount.php?myorders">
                                             <i style="padding-right:20px; color:#28AB87" class="fas fa-list"></i> MyOrders
                                        </a>
                                   </div>
                                   <div class="mt-2 mb-sm">
                                        <a style="color:#28AB87" class="text-deco-none" href= "myAccount.php?editAccount">
                                             <i style="padding-right:20px; color:#28AB87" class="fas fa-edit"></i>Edit Account
                                        </a>
                                   </div>
                                   <div class="mt-2 mb-sm">
                                        <a style="color:#28AB87" class="text-deco-none" href="myAccount.php?changePassword">
                                             <i style="padding-right:20px; color:#28AB87" class="fa fa-lock"></i>Change password
                                        </a>
                                   </div>
                                   <div class="mt-2 mb-sm">
                                        <a style="color:#28AB87" class="text-deco-none" href="myAccount.php?deleteAccount">
                                             <i style="padding-right:20px; color:#28AB87" style="padding-right:24px;" class="fas fa-trash"></i>Delete account
                                        </a>
                                   </div>
                                   <div class="mt-2 mb-2">
                                        <a style="color:#28AB87" class="text-deco-none" href="../includes/logout.inc.php">
                                             <i style="padding-right:20px; color:#28AB87" class="fa fa-sign-out"></i> Logout
                                        </a>
                                   </div>
                                   
                              </div>
                          </div>
                          <div style="width:70%" class="white b-rad-2 shadow-sm">
                              <div class="pt-4">
                                   <?php
                                        if(isset($_GET['myorders']) || isset($_GET['acc'])){
                                             include("myorders.php");
                                        }
                                        if(isset($_GET['editAccount'])){
                                             include('editaccount.php');
                                        }
                                        if(isset($_GET['changePassword'])){
                                             include('./accforgetpwd.php');
                                        }
                                   ?>
                              </div>
                          </div>
                    </div>
               </div>
          </div>
          <script src="" async defer></script>
<?php require'../footer.php';?>
     </body>
</html>
