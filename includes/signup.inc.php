<?php 
if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';
    require_once 'emailController.inc.php';
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $mobNumber = $_POST['mobnum'];

    function validate_phone_number($phone)
    {
         
         $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
         
         $phone_to_check = str_replace("-", "", $filtered_phone_number);
         if (strlen($phone_to_check) < 10) {
            return false;
         } else {
           return true;
         }
    }

    if(empty($mobNumber) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
        header("Location: ../signup.php?error=emptyfield"); 
        exit();
    }
    
    elseif($password !== $passwordRepeat ){
        header("Location: ../signup.php?error=passwordcheck");
        exit();
    }
    elseif(validate_phone_number($mobNumber) == false){
        header("Location: ../signup.php?error=invalidmobilenumber");
        exit();
    }
    else {
        $sql = "SELECT uidUsers FROM  users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        $sqlemail = "SELECT uidUsers FROM  users WHERE emailUsers=?";
        $stmtemail = mysqli_stmt_init($conn);
        if( !(mysqli_stmt_prepare($stmt, $sql) && mysqli_stmt_prepare($stmtemail, $sqlemail) ) ){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_param($stmtemail, "s", $email);
            mysqli_stmt_execute($stmtemail);
            mysqli_stmt_store_result($stmtemail);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            $resultCheckemail = mysqli_stmt_num_rows($stmtemail);
            if(($resultCheckemail && $resultCheck) > 0){
                header("Location:../signup.php?error=useremailtaken");
                exit();
            }
            
            elseif($resultCheckemail > 0){
                header("Location:../signup.php?error=emailtaken");
                exit();
            }
            elseif($resultCheck > 0){
                header("Location:../signup.php?error=usertaken");
                exit();
            }
            else{

                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, mobNumber) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if( !mysqli_stmt_prepare($stmt, $sql) ){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    
                    

                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $mobNumber);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                    
                }
            
            }
        }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: ../signup.php?signup");
    exit();
}