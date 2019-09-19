<style>
     .content-table{
                  border-collapse: collapse;
                  margin: 25px 0;
                  font-size: 0.9rem;
                  min-width: 400px;
                  width: 90%;
                  height:50%;
             }
             .content-table thead tr{
                  background: #009879;
                  color: white;
                  text-align: left;
                  font-weight: bold;
             }
             .content-table th,
             .content-table td{
                    padding: 12px 15px;
             }
             .content-table tbody tr{
                  border-bottom: 1px solid #dddddd;
             }
             .content-table tbody tr:nth-last-of-type(even){
                  background: #f3f3f3;
             }
             .content-table tbody tr:last-of-type{
               border-bottom: 2px solid #009879;
             }
</style>
<div class="">
     <h1 style="font-size:30px;color:#003426;">My Orders</h1> 
     <p style="color:gray; margin:30px;">If u have any question, feel free to <a href="../contact.php">Contact us</a>. Our Customer service work <strong>24 &#10006; 7</strong> </p>
     <div class="mx-4">
          <hr>
     </div>
     <div class="mt-3">
          <center>
               <table class="content-table">
                         <?php
                              
                              echo"<thead>
                              <tr>
                                   <th>ON:</th>
                                   <th>Things:</th>
                                   <th>Quantity:</th>
                                   <th>Amount:</th>
                                   <th>Order Date:</th>
                                   <th>Paid/Unpaid</th>
                                   <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>";
                              $i=1;
                              $userID = $_SESSION['userId'];
                              $selectorder = "SELECT * FROM orders WHERE userID='$userID'";
                              $orderquery = mysqli_query($conn, $selectorder);
                              while ($orderrow = mysqli_fetch_array($orderquery)) {
                                   $quantity = $orderrow['partQty'];
                                   $partID = $orderrow['partID'];
                                   $pcID = $orderrow['pcID'];
                                   if($partID !== 0){
                                        $selectpart = "SELECT * FROM pcpart WHERE pcPartID='$partID'";
                                        $partquery = mysqli_query($conn, $selectpart);
                                        while($partrow = mysqli_fetch_array($partquery)){
                                             $dob = $orderrow['date'];
                                             $paymentMethod = $orderrow['paymentMethod'];
                                             if($paymentMethod === "cod"){
                                                  $payment ="Unpaid";
                                             }
                                             else{
                                                  $payment = "Paid";
                                             }
                                             $result = explode('-',$dob);
                                             $date = $result[2];
                                             $month = $result[1];
                                             $year = $result[0];
                                             $new = $date.'/'.$month.'/'.$year;
                                             $partKeyword = $partrow['partKeyword'];
                                             $partPrice = $partrow['price'];
                                             $selectcomp = "SELECT * FROM pcpartcomp WHERE pcPartID='$partKeyword'";
                                             $compquery = mysqli_query($conn, $selectcomp);
                                             while($comprow = mysqli_fetch_array($compquery)){
                                                  $compName = $comprow['pcPartComponents'];
                                                  
                                                  echo"
                                                  <tr>
                                                       <td>".$i."</td>
                                                       <td>".$compName."</td>
                                                       <td>".$quantity."</td>
                                                       <td>".$partPrice."</td>
                                                       
                                                       <td>$new</td>
                                                       <td>$payment</td>
                                                       <td>Dispatched</td>
                                                  </tr>
                                                  
                                                  ";
                                             }
                                        }
                                   }
                                   elseif($pcID !== 0){
                                        
                                   }
                                   else{
                                        echo"No items to display";
                                   }
                                   $i += 1;
                              }
                              echo "</body>";
                         ?>
               </table>
          </center>
     </div>
</div>