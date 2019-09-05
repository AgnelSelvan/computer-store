<?php
    require "header.php"
?>

<main>
        <div class="body-div">
            <section class="index-section">
                <h1 class="login-heading">Forget Password?</h1>
                <?php
                    if(isset($_GET["mail"])){
                        if($_GET["mail"]=='sent'){
                            echo"<p class='signupsuccess'>Verification link has been sent to ur mail</p>";
                        }
                    }
                    if(isset($_GET["user"])){
                        if($_GET["user"]=='nouser'){
                            echo"<p class='signuperror'>No User exists!</p>";
                        }
                    }
                ?>
                <form action="" method="GET">
                    <input type="text" name="frtPwdEmail" placeholder="Enter your mail...">
                    <button type="submit" name="frgtPwd-submit">Submit</button>
                </form>
                
            </section>
        </div>
</main>
<?php
require './includes/dbh.inc.php';
    if(isset($_GET['frgtPwd-submit'])){
        
        require './includes/emailController.inc.php';

        $mailCheckinDb = $_GET['frtPwdEmail'];
        
            $query = "SELECT * FROM users WHERE emailUsers='$mailCheckinDb';";
            $connect = mysqli_query($conn, $query);
            if($connect){
                $data = mysqli_fetch_array($connect);
                if($data){
                    sendVerificationEmail($mailCheckinDb);
                    $query = "INSERT INTO pwd_table VALUES(null, '$mailCheckinDb');";
                    $check = mysqli_query($conn, $query);
                    
                    header("location: forget-pwd.php?mail=sent");
                }
                else{
                    header("location: forget-pwd.php?user=nouser");
                }
            }
            else{
                header("location: forget-pwd.php?error=sqlerror");
            }
        }

    
?>