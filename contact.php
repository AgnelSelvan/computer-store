<?php
    require "./includes/dbh.inc.php";
    include('./functions/functions.php');
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
    </head>
    <body>
    <div style="position:sticky;top:0px;z-index:1;" class="w-100 d-flex flex-row white">
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
                        loginORnot();
                      ?>
                </div>
                </div>
                <div class="slide-in container">
                    <div class="container">
                        <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > Contact Us</div>
                    </div>
                    <div class="white b-rad-2 shadow-md container pb-2">
                        <h1 style="font-size:32px;" class="p-2"> Contact Us</h1>
                        <div class="container pb-1">
                            We'd love to hear from you. Send us a message we will respond you as soon as possible.
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
                    </div>
                </div>
    </body>
 </html>
<?php
     require "./footer.php";
?>