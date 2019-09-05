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
                <div class="slide-in">
                    <h1 style="font-size:32px;" class="p-2"> Contact Us</h1>
                    <div class="container">
                        We'd love to hear from you. Send us a message we will respond you as soon as possible.
                    </div>
                </div>
                <div class="fade-in">
                    <div class="container">
                        <form action="includes/contact.inc.php" method="POST">
                            <input type="text" class="input-field" name="c-name" placeholder="Your Name..."><br>
                            <input type="text" class="input-field" name="c-email" placeholder="Your email address..."><br>
                            <input type="text" class="input-field" name="c-subject" placeholder="Subject..."><br>
                            <textarea rows="4" class="input-field" name="c-message" cols="50" type="text" placeholder="Your Message..."></textarea><br>
                            <button type="submit" class="button-field" name="contact-submit">Send email</button>
                        </form>
                    </div>
                </div>
    </body>
 </html>
<?php
     require "./footer.php";
?>