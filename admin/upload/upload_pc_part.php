<?php
error_reporting(0);
    require "../../includes/dbh.inc.php";
    if(isset($_POST['upload'])){
        $file = $_FILES['file'];
        //print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        //print_r($fileTmpName);

        $folder = "uploadedimages/".$fileName;
        move_uploaded_file($fileTmpName, $folder);

        // $partTitle = $_POST['productTitle'];
        // $description = $_POST['description'];
        // $quantity = $_POST['qty'];
        // $partKeyword = $_POST['ComponentName'];
        // $price = $_POST['price'];
        // if (empty($partTitle) || empty($description) || empty($quantity) || empty($price)) {
        //     header("LOCATION: upload_pc_part.php?error=emptyfield");
        // }
        // else{
        //     $insertQuery = "INSERT INTO pcpart VALUES(NULL, '$partTitle', '$folder', '$partKeyword', '$description', '$quantity', '$price')";
        //     $checkInsert = mysqli_query($conn, $insertQuery);
        //     if($checkInsert){
        //         header('location: upload_pc_part.php?data=success');
        //     }
        //     else{
        //         header('location: upload_pc_part.php?data=unsuccess');
        //     }
        // }
        $partTitle = $_POST['productTitle'];
        $partKeyword = $_POST['ComponentName'];
        $partDesc = $_POST['description'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $insertQuery = "INSERT INTO pcpart VALUES(NULL, '$partTitle', '$folder', '$partKeyword', '$partDesc', '$qty', '$price');";
        $checkInsert = mysqli_query($conn, $insertQuery);
        if($checkInsert){
            header("LOCATION: upload_pc_part.php?data=success");
        }
        else{
            header("LOCATION: upload_pc_part.php?data=unsuccess");

        }
    }

?>

<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="../../customstyle.css">
        <!-- <script src="https://cdn.tiny.cloud/1/g7o4z05jsgoapee04981d3pi0xxyrcayr0uvx8ksuj65krhm/tinymce/5/tinymce.min.js"></script>        <script>tinymce.init({selector:'textarea'});</script> -->
    </head>
    <body class="bg-color">
        <div class="w-100 mb-1 d-flex flex-row white">
            <div class="container d-flex flex-row">
                <a href="index.php">
                    <img class="img1" src="../../img/cpu.png" alt="logo">
                </a>
                <ul class="d-flex flex-row ls-none ">
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../index.php">Home</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../builds/system-build.php">SystemBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../builds/completed_build.php">CompletedBuild</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../about.php">About</a></li>
                        <li class="p-1"><a class="pl-1 text-deco-none text-black nav" href="../../contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="container d-flex jcfe">
                <a class="text-deco-none signup-button-field mr-2 text-black pr-1" href="../../index.php">User</a>
            </div>
        </div>
        <div class="container text-left">
                <div class=" container white p-2 b-rad-2 shadow-md">
                    <h3 class="text-center">Upload PC Details</h3>
                    <?php
                            if(isset($_GET['data'])){
                                if($_GET['data'] == "success"){
                                    echo"<p style='color:green; font-size:12px;'>Upload successfull!</p>";
                                }
                                else{
                                    echo"<p style='color:red; font-size:12px;'>Upload unsuccessfull!</p>";
                                }
                            }
                            if(isset($_GET['error'])){
                                if($_GET['error'] == "emptyfield"){
                                    echo"<p style='color:red; font-size:12px;'>Please do fill all required details</p>";
                                }
                            }
                    ?>
                    <div class="pt-lg">
                        <form method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <th><b>Choose a file:</b></th>
                                    <th>
                                    <input type="hidden" name="size" value="1000000">
                                    <div class="p-1">
                                        <input class="chse_file" type="file" name="file">
                                    </div>
                                </th>
                                </tr>
                                <tr>
                                    <th><b>Product Keyword : </b></th>
                                    <th>
                                        <select name="ComponentName" id="" style="margin-bottom:10px; border-radius:5px; background: #181818;color: #fff;padding: 10px;margin-left:20px;height:35px;font-size: 12px;outline: none;">
                                            <option value="selectAnOption">selectAnOption</option>
                                            <?php
                                                $query = "SELECT * FROM pcPartComp;";
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    while($row = mysqli_fetch_assoc($check)){
                                                        $pcPartID = $row['pcPartID'];
                                                        echo"<option value='$pcPartID'>{$row['pcPartComponents']}</option>";
                                                    }
                                                }
                                                else{
                                                    echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                                }
                                            ?>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th><b>Product Title:</b></th>
                                    <th>
                                        <input class="input-field-l" type="text" name="productTitle" placeholder="Enter product title...">
                                    </th>
                                </tr>
                                <tr>
                                    <th><b>Product description:</b></th>
                                    <th class="pl-1">
                                        <textarea rows="20" cols="50" class="input-field-l" name="description" placeholder="Enter the description..."></textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <th><b>Enter Quantity</b></th>
                                    <th><input class="input-field-l" type="number" name="qty" placeholder="Enter Quantity..."></th>
                                </tr>
                                <tr>
                                    <th>Enter Price:</th>
                                    <th><input class="input-field-l" type="number" name="price" placeholder="Enter Price..."></th>
                                </tr>
                            </table>
                            <div class="text-center mt-1">
                                <input class="btn button-field text-deco-none" type="submit" name="upload" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
 </html>