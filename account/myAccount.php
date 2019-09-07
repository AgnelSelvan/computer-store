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
          .myAcc{
               color:#28AB87;
               background: white;
          }
          .myAcc:hover{
               background: #fff;

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
          <div class="primary bg-color">
               <div style="position:sticky;top:0px;z-index:1;" class="container">
                    <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > My Account</div>
                    <div class="d-flex">
                          <div style="width:30%;" class="white mr-1 b-rad-2 shadow-sm ">
                              <div style="background:#eeeeee;" class="b-rad-2 pb-1"> 
                                   <div class="pt-1"><img style="width:90%;" class="b-rad-2" src="../haha.jpeg" alt="My photo"/></div>
                                   <div style="font-size:20px;" class="m-1 "><i style="padding-right:10px;" class="fas fa-user"></i>Name: Mr.Agnel Selvan</div>
                              </div>
                              <div class="mt-3 mx-2 ">
                                   <div class="mx-2 myAcc" style=" height:50px;">
                                        <div style=" font-size:22px; color:#28AB87;"><a style="float: left; color:#28AB87" class="text-deco-none" href="myAccount.php?myOrders"><i style="padding-right:20px; color:#28AB87" class="fas fa-list"></i> MyOrders</a></div>
                                        <br>
                                   </div>
                                   <div class="my-1 mx-2 myAcc" style=" height:50px;">
                                        <div style=" font-size:22px; color:#28AB87"><a style="float: left; color:#28AB87" class="text-deco-none" href="myAccount.php?editAccount"><i style="padding-right:20px; color:#28AB87" class="fas fa-edit"></i> EditAccount</a></div><br>
                                   </div>
                                   <div class="my-1 mx-2 myAcc" style=" height:50px;">
                                        <div style=" font-size:22px; color:#28AB87"><a style="float: left; color:#28AB87" class="text-deco-none" href="myAccount.php?changePassword"><i style="padding-right:20px; color:#28AB87" class="fa fa-lock"></i> ChangePassword</a></div><br>
                                   </div>
                                   <div class="my-1 mx-2 myAcc" style=" height:50px;">
                                        <div style=" font-size:22px; color:#28AB87"><a style="float: left; color:#28AB87" class="text-deco-none" href="myAccount.php?deleteAccount"><i style="padding-right:20px; color:#28AB87" style="padding-right:24px;" class="fas fa-trash"></i>Delete Account</a></div><br>
                                   </div>
                                   <div class="my-1 mx-2 myAcc" style=" height:50px;">
                                        <div style=" font-size:22px; color:#28AB87"><a style="float: left; color:#28AB87" class="text-deco-none" href="../includes/logout.inc.php"><i style="padding-right:20px; color:#28AB87" class="fa fa-sign-out"></i> Logout</a></div><br>
                                   </div>
                              </div>
                          </div>
                          <div style="width:70%" class="white b-rad-2 shadow-sm">
                              <div class="pt-4">
                                   <?php
                                        if(isset($_GET['myOrders']) || isset($_GET['acc'])){
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
