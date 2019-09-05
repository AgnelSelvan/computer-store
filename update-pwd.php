<?php
    require "header.php"
?>

<main>
        <div class="body-div">
            <section class="index-section">
                <h1 class="login-heading">Update Password</h1>
                <?php
                    if(isset($_GET["update"])){
                        if($_GET["update"] == "success"){
                        echo"<p class='signupsuccess'>Password updated successfully</p>";
                        
                        }
                        elseif($_GET["update"] == "unsuccess"){
                            echo"<p class='signupserror'>Password not updated</p>";
                        }
                    }
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "passwordwrong"){
                        echo"<p class='signuperror'>Password does not match</p>";
                        }
                        elseif($_GET["error"] == "unsuccess"){
                            echo"<p class='signupserror'>Update problem</p>";
                            header("location: forget-pwd.php");
                        }

                    }
                    
                ?>
                <div class="form">
                <form action="" method="GET">
                        <input type="password" name="up-pwd" placeholder="Enter your new password..."><br>
                        <input type="password" name="up-pwd-repeat" placeholder="Repeat Password..."><br>
                        <button type='submit' name='update-submit'>Submit</button>
                        <?php
                    if(isset($_GET["update"])){
                        if($_GET["update"] == "success"){
                        
                        echo"<div style='padding-left:28%' class='logincard'><a style='pointer:cursor' href='login.php'>Back to Login</a></div>";
                        }
                    }
                ?>
                    </form>
                
                </div>
                
            </section>
        </div>
</main>
<?php
    require './includes/dbh.inc.php';
    
    if(isset($_GET['update-submit'])){
        $password = $_GET['up-pwd'];
        $passwordCheck = $_GET['up-pwd-repeat'];
        if($password != $passwordCheck){
            header("location: update-pwd.php?error=passwordwrong");
        }
        else{
           
            $takeMail = "SELECT min(idpwd),emailVerify from pwd_table;";
            $check = mysqli_query($conn, $takeMail);
            if($check){
                $data = mysqli_fetch_array($check);
                $realdata = $data[1];

                $hashedUpdatedPwd = password_hash($password, PASSWORD_DEFAULT);
                $query = "UPDATE users SET pwdUsers='$hashedUpdatedPwd' WHERE emailUsers='$realdata';";
                $connect = mysqli_query($conn, $query);
                if($connect){
                    $query = "DELETE FROM pwd_table WHERE emailVerify='$realdata'; ";
                    $check = mysqli_query($conn, $query);
                    if($check){
                        header("location: update-pwd.php?delete=success");
                    }
                    header("location: update-pwd.php?update=success");
                }
                else{
                    header("location: update-pwd.php?update=unsuccess");
                }
            }
            else{
                header("location: update-pwd.php?error=sqlerror");
            }
            
        }

    }
?>