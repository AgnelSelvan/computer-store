<?php
    require "./includes/dbh.inc.php";
    session_start();
?>
<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
    <div class="w-100 d-flex flex-row white">
            <div class="container d-flex flex-row">
                  <a href="index.php">
                      <img class="img1" src="./img/cpu.png" alt="logo">
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
                            <div><button type="submit" class="text-deco-none signup-button-field mr-2 text-black pr-1 b-0" name="logout-submit">Logout</button></div>
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
          
          <h1 style="font-size:32px;" class="my-1 slide-in">ABOUT</h1>
          <div class="container fade-in">
                    <div class="container">
                        <div class="my-2">
                            <h3 align="left">Pick Parts. Build Your PC. Compare And Share.</h3>
                            <div class="b-1 text-black mb-1"></div>
                            <p align="left">PCPartPicker provides computer part selection, compatibility, and pricing guidance for do-it-yourself computer builders. Assemble your virtual part lists with PCPartPicker and we'll provide compatibility guidance with up-to-date pricing from dozens of the most popular online retailers. We make it easy to share your part list with others, and our community forums provide a great place to discuss ideas and solicit feedback.</p>
                         </div>
                         <div class="my-2">
                            <h3 align="left">Simplified Building</h3>
                            <div class="b-1 text-black mb-1"></div>
                            <p align="left">Part lists broken out by filterable categories to ensure you include all the necessary components.
                            Automatic compatibility guidance limits choices to parts known to be compatible, and warns you if you pick incompatible parts.
                            Easy sharing through Twitter, Facebook, part list permalinks, as well as auto-generated markup text for Reddit and many forums.</p> 
                         </div>
                         <div class="my-2">
                            <h3 align="left">Price Tracking</h3>
                            <div class="b-1 text-black mb-1"></div>
                            <p align="left">Continuously updated prices from dozens of the most popular online retailers.
                            Configurable mail-in rebates and sales tax rates - easily enable/disable mail-in rebates and per-retailer tax rates in price calculations.
                            Price history charts for both parts and part lists.
                            Price trending on a part category basis lets you see what is happening to prices on a macro level.</p>
                         </div>
                         <div class="my-2">
                            <h3 align="left">Price Alerts</h3>
                            <div class="b-1 text-black mb-1"></div>
                            <p align="left">Part price alerts let you set price thresholds on specific parts - get notified by email when a retailer offers a price lower than your set amount.Parametric price alerts let you set price alerts on an entire product category with customizable filters.</p>
                         </div>
                         <div class="my-2">
                            <h3 align="left">Community</h3>
                            <div class="b-1 text-black mb-1"></div>
                            <p align="left">Forums provide a great place to solicit ideas and part list feedback.
    Completed Builds posted by users let you see a range of builds, filterable by part types.</p>
                         </div>
                    </div>
               </div>
    </body>
 </html>
<?php
     require "./footer.php";
?>