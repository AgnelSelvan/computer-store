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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     </head>
     <body>
          <div class="w-100 d-flex flex-row white">
                <div class="container d-flex flex-row">
                    <a href="index.php">
                        <img class="img1" src="../img/cpu.png" alt="logo">
                    </a>
                    <ul class="d-flex flex-row ls-none ">
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="index.php">Home</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/system-build.php">SystemBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/completed_build.php">CompletedBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="about.php">About</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="container">
                        <?php
                            if(isset($_SESSION['userId'])){
                              echo'<form action="includes/logout.inc.php" method="post">
                              <div class="d-flex jcfe">
                              <div style="margin-top:10px;"><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="includes/logout.inc.php" name="logout-submit">Logout</a></div>
                              </div>
                              </form>';
                          }
                          else{
                              echo'
                              <div class="container d-flex flex-row jcfe">
                                  <div ><a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="signup.php">Signup</a></div>
                                  <div><a class="text-deco-none text-black pr-1 mr-2 nav" href="login.php" class="loginphp">Login</a></div>
                              </div>
                              ';
                          }
                        ?>
                </div>
          </div>
          <div class="primary bg-color">
               <div class="container">
                    <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > My Account</div>
                    <div class="d-flex">
                          <div style="width:30%;" class="white mr-1 b-rad-2 shadow-sm ">
                              <div style="background:#eeeeee;" class="b-rad-2"> 
                                   <div class="pt-1"><img style="width:90%;" class="b-rad-2" src="../haha.jpeg" alt="My photo"/></div>
                                   <div style="font-size:20px;" class="m-1"><i class="material-icons mx-1 mb-2">person</i>Name: Mr.Agnel Selvan</div>
                              </div>
                              <div class="my-3 mx-2">
                                   <div class="my-2">
                                        <div style=" font-size:24px; color:#28AB87" class='m-1 profile <?php if(isset($_GET['myOrders'])){echo'linkactive';}?>'><a style="float: left;" class="text-deco-none" href="myAccount.php?myOrders"><i style="padding-right:24px;" class="material-icons">view_list</i>My Orders</a></div><br>
                                   </div>
                                   <div class="my-2">
                                        <div style=" font-size:24px; color:#28AB87" class='m-1 profile <?php if(isset($_GET['editAccount'])){echo'linkactive';}?>'><a style="float: left;" class="text-deco-none" href="myAccount.php?editAccount"><img style="padding-right:24px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAdklEQVRIx2NgGAVAoL66o0ZjdfsHzVXt4VQ3HGhwAxD/h+I/6ms6YmhpAQj/popPNFa12eOyBBhk76nl6gZsloDihJpBgm5JAzUNh7q4vYMWkYmOHWhpeP2o4aOG08FwqAW0M5yABfXUKnppZzgOC6hn+CjABQA9zTJfDzuYPAAAAABJRU5ErkJggg==">Edit Account</a></div><br>
                                   </div>
                                   <div class="my-2">
                                        <div style=" font-size:24px; color:#28AB87" class='m-1 profile <?php if(isset($_GET['changePassword'])){echo'linkactive';}?>'><a style="float: left;" class="text-deco-none" href="myAccount.php?changePassword"><img style="padding-right:24px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAj0lEQVRIx2NgGAVAoLG6vUF9dXsHzQwH4v8gTHVLkA2nuiXYDKelT8AG0zKSB5kF2qsa2NRXd3QCNT3DFc7IBpJsASiS8BlMsQVAxU/Bmla1WdIkiEjRoL62zRqq/gnZFhATXBqr21ppZcETkOGghDGacSgDmqvby/GEcz0tLamnpU/qaRUHoLK+YbQxAAIAGfH0e4msKQoAAAAASUVORK5CYII=">Change Password</a></div><br>
                                   </div>
                                   <div class="my-2">
                                        <div style=" font-size:24px; color:#28AB87" class='m-1 profile <?php if(isset($_GET['deleteAccount'])){echo'linkactive';}?>'><a style="float: left;" class="text-deco-none" href="myAccount.php?deleteAccount"><i style="padding-right:24px;" class="material-icons">delete</i>Delete Account</a></div><br>
                                   </div>
                                   <div class="my-2">
                                        <div style=" font-size:24px; color:#28AB87" class='m-1 profile <?php if(isset($_GET['logout'])){echo'linkactive';}?>'><a style="float: left;" class="text-deco-none" href="../includes/logout.inc.php"><img style="padding-right:24px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAd0lEQVRIx2NgGLZAc1WHt8bq9idA/J8Afqy2usOTZAtAGokwHIzV17Q/IseC/6TgUQsGjwXqq9s7aGoBOFURYwklFhBlCanhjDV/4LOEGhYAcT3Nggiv4VSwoJ6WkdwwmpOHjgW0rXBA1SAxloAMV1/V7jF8Gw8AqRdDbiMaXNIAAAAASUVORK5CYII=">Logout</a></div><br>
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
