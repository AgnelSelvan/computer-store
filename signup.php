<?php
    require "header.php";
?>
<body class="bg-color">
    <main class=" bg-color h-min-100">
        <div class="d-flex jcc m-4">
            <div style="width:350px;" class="fade-in shadow-lg white py-3 px-2 b-rad-6 ">
                <h1 style="font-size:30px;" class="text-center py-1">Signup</h1>
                <div class="container">
                    <?php
                        if (isset($_GET["signup"])){
                            if($_GET["signup"] == "success" ){
                            echo'<p style="color:green; font-size:14px;" class="signupsuccess">Signup Successfull!</p>';
                        }
                        
                        }
                        elseif (isset($_GET["error"])){
                            if($_GET["error"] == "invalidmobilenumber")
                            {
                                echo'<p style="color:red; font-size:14px;">Invalid mob number</p>';
                            }
                            elseif($_GET["error"] == "emptyfield"){
                                echo'<p style="color:red; font-size:14px;">Please fill in all the details. </p>';
                            }
                            elseif($_GET["error"] == "useremailtaken"){
                                echo'<p style="color:red; font-size:14px;">Username and Email taken</p>';
                            }elseif($_GET["error"] == "emailtaken"){
                                echo'<p style="color:red; font-size:14px;">Email taken</p>';
                            }
                            elseif($_GET["error"] == "usertaken"){
                                echo'<p style="color:red; font-size:14px;">Username taken</p>';
                            }
                            elseif ($_GET["error"] == "passwordcheck") {
                                echo'<p style="color:red; font-size:14px;" class="text-center">Password is not matching</p>';
                            }
                        }
                        
                    ?>
                </div>
                <div class="d-flex jcc">
                    <form action="includes/signup.inc.php" method="post">
                        <input class="input-field-l" type="text" name="uid" placeholder="Username"/><br>
                        <input class="input-field-l" type="email" name="mail" placeholder="Email"/><br>
                        <input class="input-field-l" type="text" name="mobnum" placeholder="Enter your mobile number...">
                        <input class="input-field-l" type="password" name="pwd" placeholder="Password"><br>
                        <input class="input-field-l" type="password" name="pwd-repeat" placeholder="Repeat password"><br>
                        <div class="text-center my-1"><button style="width:150px; font-size:20px;" class="btn button-field text-deco-none" type="submit" name="signup-submit">Signup</button></div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>