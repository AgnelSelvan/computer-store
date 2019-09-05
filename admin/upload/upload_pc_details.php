<?php
error_reporting(0);
    require "../../includes/dbh.inc.php";
    include('../../functions/functions.php');
    uploadCompleteBuild();
?>

<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="../../customstyle.css">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>
    <body class="bg-color">
        <div class="w-100 d-flex flex-row white">
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

        <div class="container text-center">
            <div class="p-3 b-rad-5 fade-in white mt-lg">
                        <h2 class="text-left">Upload Completed Builds</h2>
                        <div class="b-1 mb-2"></div>
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
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div class="p-1">
                                <input class="chse_file" type="file" name="file">
                            </div>
                            <div style="font-size:14px;">
                                <div align="left" style="padding:10px 0px;">
                                    <div><input class="input-field" type="text" name="compName" placeholder="Computer Name..."></div>
                                    <div class="" align="left">
                                        Computer Type:
                                        <select name="comp_type" style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" id="comp_type">
                                            <?php
                                                $query = "SELECT * FROM pctype;";
                                                $check = mysqli_query($conn, $query);
                                                if($check){
                                                    while ($row = mysqli_fetch_assoc($check)) {
                                                        echo"<option>{$row['pcTypeName']}</option>";
                                                    }
                                                }
                                                else{
                                                    echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div align="left" style="padding:10px 0px;">
                                     Motherboard details: <!--<input type="text" name="motherboard" class="input-field" placeholder="Enter motherboard type...(AMD or Intel)"> -->
                                    <!-- <input type="text" name="processor" class="input-field" placeholder="Enter processor..."> -->
                                    <select name="motherboard" style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" id="motherboard">
                                    <?php
                                        $query = "SELECT * FROM motherboardtype;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['motherboardName']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                    <select name="processor" style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" id="processor">
                                    <?php
                                        $query = "SELECT * FROM processorlist;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['processorName']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                
                                <div align="left" style="padding:10px 0px;">
                                    Harddisk details:<input class="input-field" type="number" name="harddisk" placeholder="Enter HardDisk capacity...">TB
                                </div>


                                <div align="left" style="padding:10px 0px;">
                                    Monitor details:<!-- <input type="text" name="monitorCompany" class="input-field" placeholder="Enter Monitor Company name..."> -->
                                    <select name="monitorCompany" style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" id="monitorCompany">
                                    <?php
                                        $query = "SELECT * FROM monitorcompany;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['monitorCompName']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                    <input type="number" name="monitorDisplay" class="input-field" placeholder="Enter monitor display size...">INCH
                                </div>


                                <div align="left" style="padding:10px 0px;">
                                     Graphics Card details:<!--<input type="text" name="graphicsCardType" class="input-field" placeholder="Enter graphics card type..."> -->
                                     <select style="background: gray;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" name="graphicsCardType" id="graphicsCardType">
                                    <?php
                                        $query = "SELECT * FROM graphicscardcompany;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['graphicsCradComp']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                    <input type="number" name="graphicsCard" placeholder="Enter Graphics card capacity" class="input-field">GB
                                </div>


                                <div align="left" style="padding:10px 0px;">
                                     Keyboard details:<!--<input type="text" name="keyboardCompany" class="input-field" placeholder="Enter keyboard company..."> -->
                                     <select style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" name="keyboardCompany" id="keyboardCompany">
                                    <?php
                                        $query = "SELECT * FROM iocompany;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['CompName']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div align="left" style="padding:10px 0px;">
                                 Mouse details:<!--<input type="text" name="mouseCompany" class="input-field" placeholder="Enter mouse company..."> -->
                                 <select style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" name="mouseCompany" id="mouseCompany">
                                    <?php
                                        $query = "SELECT * FROM iocompany;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['CompName']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div align="left" style="padding:10px 0px;">
                                 Speaker details:<!--<input type="text" name="speakerCompany" class="input-field" placeholder="Enter Speaker company..."> -->
                                 <select style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" name="speakerCompany" id="speakerCompany">
                                    <?php
                                        $query = "SELECT * FROM iocompany;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['CompName']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div align="left" style="padding:10px 0px;">
                                RAM details:<input type="text" name="ramType" class="input-field" placeholder="DDR3 or DDR4">
                                    <!-- <input type="text" name="ramCompany" class="input-field" placeholder="Enter RAM Company..."> -->
                                    <select style="background: #181818;color: #fff;padding: 10px;margin-left:20px;height: 40px;font-size: 12px;box-shadow: 0 5px 25px rgba(0, 0, 0, .4); 
      outline: none;" name="ramCompany" id="ramCompany">
                                    <?php
                                        $query = "SELECT * FROM ramcompany;";
                                        $check = mysqli_query($conn, $query);
                                        if($check){
                                            while ($row = mysqli_fetch_assoc($check)) {
                                                echo"<option>{$row['ramCompany']}</option>";
                                            }
                                        }
                                        else{
                                            echo"<p style='color:red; font-size:12px;'>Somthing went wrong! Please try again</p>";
                                        }
                                    ?>
                                    </select>
                                    <input type="number" name="ramCapacity" class="input-field" placeholder="Enter RAM capacity">GB
                                </div>

                                <div align="left" style="padding:10px 0px;">
                                    Enter Price:<input type="number" class="input-field" name="pcDetailPrice" placeholder="Enter Price...">                                
                                </div>
                            </div>
                            <div>
                                <input class="btn button-field text-deco-none" type="submit" name="upload" value="Upload">
                            </div>
                        </form>
            </div> 
        </div>
    </body>
 </html>