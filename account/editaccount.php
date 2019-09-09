<div class="container">
     <style>
          .input-field-f{
          border:1px solid #28AB87;
          padding: 15px;
          margin: 10px;
          width: 400px;
          outline: none;
     }
     .input-field-f:hover{
          border:2px solid #28AB87;
          outline: none;
          transition: ease-in-out, width .35s ease-in-out;
     }
     .input-field-f:focus{
          width: 450px;
          border:2px solid #28AB87;
          outline: none;
     }
     </style>
     <?php
          if(isset($_POST['update'])){
               $userID = $_SESSION['userId'];
               $username = $_POST['username'];
               $email = $_POST['email'];
               $address = $_POST['address'];
               $city = $_POST['city'];
               $country = $_POST['country'];
               $mobnumber = $_POST['mobnumber'];

               $file = $_FILES['file'];
               $fileName = $_FILES['file']['name'];
               $fileTmpName = $_FILES['file']['tmp_name'];
               $folder = "userimages/".$fileName;
               move_uploaded_file($fileTmpName, $folder);

               $update= "UPDATE users SET uidUsers='$username',emailUsers='$email', mobNumber='$mobnumber', address='$address', country='$country',
                    state='$state', userImage='$folder' WHERE isUsers='$userID';
                ";
               $check = mysqli_query($conn, $update);
               if($check){
                    header("LOCATION: myAccount.php?editAccount?update=success");
               }
               else{
                    header("LOCATION: myAccount.php?editAccount?update=unsuccess");
               }
          }
     ?>
     <h1 style="color:#003426">Edit Your Account</h1>
     <div style="font-size:18px;" class="mt-3">
          <form action="myAccount.php?editAccount" method="POST">
              <div class="container">
                    <div>
                         <input style="width:300px;" type="text" name="username" placeholder="Enter your name..." class="input-field b-rad-2">
                    </div>
                    <div>
                         <input  style="width:300px;" type="text" name="email" placeholder="Enter your email..." class="input-field b-rad-2">
                    </div>
                    <div>
                         <textarea style="width:300px;" name='address' placeholder="Enter your Address..." class="input-field b-rad-2"></textarea>
                    </div>
                    <div>
                         <input  style="width:300px;" type="text" name="city" placeholder="Enter your City..." class="input-field b-rad-2">
                    </div>
                    <div>
                         <input style="width:300px;" type="text" name="country" placeholder="Enter your Country..." class="input-field b-rad-2">
                    </div>
                    <div>
                         <input style="width:300px;" type="text" name="mobnumber" placeholder="Enter your Mobile number..." class="input-field b-rad-2">
                    </div>
                    <div>
                         <input style=" padding:10px;" type="file" name="file">
                    </div>
                    <button style="padding:10px 14px;margin-top:20px;width:170px;background:#28AB87; border:none; color:white;" type="submit" name="update" class="b-rad-2 shadow-md"><img style="padding-right:5px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAAAmJLR0QA/4ePzL8AAAFTSURBVDgRvcG9TpNhGADQx69pGaxu3ETLPagjDkRJ4RaIWqjsumLD0oRd04hyJ14ACgpVxi4QBq1DCdgjxe9Nf6LEiXPipilZtuPAz/gfFh3JRc5IK8bJbBratabiduQkrZhkE30rspjgjw8xySL67sUlFW0nuppKEYZ+GZiPESVHWIkwq+1C0oxAyyo6CpFYxq7MkmPjuhFaEW7ZRy0SO1iLsOTYuG7krOJtJA5RiUtmtV1IXkVOFZ1I/MCdyKloO9HVVIqcMnqR6KEc13AX3yNxiEpcwxwOIvEejbiiasu+np59W6pxxTq2I7GMj7IIL50bd+5FhII91CJR8g1PZN6Y9lqmjo5ijHiMvvsydaeSU89kHjgzsBCTNNH3VMGMhxoa5s0oqDvDRkyTaRr65LmqsrI56/YwsCGLv/HIV9M6FuLfFNW880VPz2fbaopxw34Dr2y+yb2Py6cAAAAASUVORK5CYII=">UpdateNow</button>
               </div>
          </form>
     </div>
</div>