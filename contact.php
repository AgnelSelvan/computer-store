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
        <title>Computer-Store | Contact</title>
        <link rel="shortcut icon" type="image/png" href="img/favicon.png" >
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="sha384-rtJEYb85SiYWgfpCr0jn174XgJTn4rptSOQsMroFBPQSGLdOC5IbubP6lJ35qoM9" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../customstyle.css">
        <style>
            @media screen and (max-width:600px){
                .responsive-container{
                    margin: 0px;
                    padding:0px;
                    display: flex;
                    flex-direction: column;
                    min-width: 80vw;
                }
            }
        </style>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            jQuery(document).ready(function() {
            jQuery('.toggle-nav').click(function(e) {
                jQuery(this).toggleClass('active');
                jQuery('.menu ul').toggleClass('active');

                e.preventDefault();
            });
            });
        </script>
    </head>
    <body>
    <div style="position:sticky;top:0px;z-index:1;height:8%;" class="d-flex flex-col w-100 white shadow-sm">
                <div class="d-flex jcsb">
                    <div class="d-flex flex-row">
                        <div>
                            <a href="indexcopy.php"><img class="img1" src="img/cpu.png" alt=""></a>
                        </div>
                        <div class="hamburger">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                        <div class="menu">
                            <ul class="ls-none active current-item">
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="index.php">Home</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/system-build.php">SystemBuild</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="builds/completed_build.php">CompletedBuild</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="about.php">About</a></li>
                                <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <a class="toggle-nav" href="#">&#9776;</a>
                        </div>
                    </div>
                    <div class="mt-sm">
                        <?php
                            loginORnot();
                        ?>
                    </div>
                </div>
            </div>
                <div class="slide-in container responsive-container">
                    <div class="container  responsive-container">
                        <div style=" height:45px; font-size:18px;" class="py-sm pl-2 my-1 b-rad-2 shadow-sm white text-left"><a style="color:#28AB87;" class="text-deco-none" href="../index.php">Home</a> > Contact Us</div>
                    </div>
                    <div class="white b-rad-2 shadow-md container responsive-container pb-2">
                        <h1 style="font-size:32px;" class="p-2"> Contact Us</h1>
                        <div class="container pb-1">
                            We'd love to hear from you. Send us a message we will respond you as soon as possible.
                        </div>
                    
                        <div class="fade-in">
                            <div class="container sm-container">
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