<?php
    require "header.php"
?>
<body class="bg-color">
    
    <main class=" bg-color h-min-100">
            <div class="d-flex jcc m-4">
                <div style="width:350px;" class="fade-in shadow-lg white py-3 px-2 b-rad-6 ">
                    <h1 style="font-size:30px;" class="text-center py-1">Login</h1>
                        <center><?php
                                    if (isset($_GET["error"])){
                                        if($_GET["error"] == "emptyfields"){
                                            echo'<p style="color:red; font-size:14px;" class="signuperror">Please fill in all the details. </p>';
                                        }
                                        if($_GET["error"] == "nouser"){
                                            echo"<p style='color:red; font-size:14px;' class='signuperror'>No user exists!</p>";
                                        }
                                        if($_GET["error"] == "wrongpassword"){
                                            echo"<p style='color:red; font-size:14px;' class='signuperror'>Wrong password!</p>";
                                        }
                                    }
                                    if(isset($_GET["login"])){
                                        if($_GET["login"] == 'notlogin'){
                                            echo"<p style='font-size:14px;'>Please login first</p>";
                                        }
                                    }
                                ?>
                            </center>
                    <div class="d-flex jcc">
                    <form action="includes/login.inc.php" method="post">
                        <input class="input-field-l" type="text" name="mailuid" placeholder="Username/E-mail..."><br>
                        <input class="input-field-l" type="password" name="pwd" placeholder="Password..."><br>
                        <div class="text-right m-1"><a href="forget-pwd.php" class=" text-deco-none forgetpass" >Forget Password?</a></div>
                        <div class="text-center my-1"> <button type='submit' style="width:150px; font-size:20px;" class="btn button-field text-deco-none" name='login-submit'>Login</button></div>
                    </form>
                    </div>
                </div>
            </div>
    </main>

</body>