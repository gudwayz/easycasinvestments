<?php 
include('includes/config.php');
include('includes/function.php');
 session_start();
   //Expire the session if user is inactive for 30 minutes or more.
   $expireAfter = 30;
 
//Check to see if our "last action" session variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
    }
    
}
  if(!isset($_SESSION['uname'])) {
    echo "<script>window.open('login.php','_self')</script>";  
  }
  else{
      
      
 if((isset($_SESSION['uname']))&&(isset($_POST['invest']))){
     $username = $_SESSION['uname'];
      $ref_no = $_POST['ref_no'];
      $_SESSION['ref_no']=$ref_no;
     $amount = $_POST['amount'];
      $_SESSION['amount']=$amount;
     date_default_timezone_set('Africa/Lagos');
     $date = date('Y/m/d H:i:s');
     $amt_status = "unpaid";
     $mer_status = "unmerged";
     $upload = "";
     
     $get_invest = "INSERT INTO invest (ref_no, uname,amount,date,amt_status,mer_status,upload) VALUES ('$ref_no','$username','$amount','$date','$amt_status','$mer_status','$upload')";
     $invest_query = mysqli_query($conn, $get_invest);
     if($invest_query){
         echo "<script>alert('You have invested Now')</script>";
     }
     else{
         echo "<script>alert('Please Re-invest again')</script>";
         echo "<script>window.open('invest.php','_self')</script>";
     }
     
 }
?>    

<!DOCTYPE html>
    <html>
    
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="keywords" content="footer, address, phone, icons" />
    
    	<title>EasyCashInvestments||investDasboard</title>
    
    	
    	
      <link rel="stylesheet" href="assets/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="assets/all.min.css" type="text/css">
    
      <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="style.css">
    
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand text-white " href="index.html">EasyCashInvestments</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invest.php">Contact us</a>
          </li>
          
          
        </ul>
           <ul class="text-inline my-2 my-lg-0">
             <li class="nav-item">
               <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
              <a class="btn btn-success dropdown-item" href="logout.php"><i class="fa fa-user"></i>&nbsp;Logout</a>
           <!--</div>-->
          </li>       
           </ul>
      </div>
    </nav>
    
    <div class="container-fluid">
      <div class="row"> 
          <div class="col-md-3 mt-2 mb-1">
              <div class="card" style="width: 13rem;">
                <img src="g1.jpg" class="card-img-top" alt="...">
                <div class="card-header text-center">
                  <?php
                  if(isset($_SESSION['uname'])){
                      $uname = $_SESSION['uname'];
                      $get_user = "SELECT * FROM user WHERE  uname='$uname'";
                      $user_query= mysqli_query($conn,$get_user);
                      while($row_user = mysqli_fetch_assoc($user_query)){
                       $fname = $row_user['fname'];
                        echo"
                         <h3> $fname </h3>";
                         }
                     }
                  ?>
                </div>
      
                <div class="card-body">
                   <ul class="list-group list-group-flush">
                     <li class="list-group-item font-weight-bold  px-0"><a href="investdashboard.php"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Account</h5></a></li> 
                     <li class="list-group-item font-weight-bold  px-0"><a href="bank.php"><h5><div class="d-flex justify-content-around"><i class="fas fa-money-check-alt mr-1"></i><span class="text-center"> Upload Bank Details</span></div></h5></a></li>
                       <li class="list-group-item font-weight-bold  px-0"><a href="password.php"><h5><i class="fas fa-key"></i> &nbsp; Password</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="profile.php"><h5><i class="fa fa-user"></i> &nbsp; Profile</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href=""><h5><i class="fas fa-key"></i> &nbsp; Logout</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="transaction.php"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Transactions</h5></a></li>
                      </ul>
               </div>
              </div>
          </div>
          <div class="col-md-9 mt-2 mb-1">
              <div class="jumbotron">
                  <?php
                  if(isset($_SESSION['uname'])){
                      $uname = $_SESSION['uname'];
                      $get_user = "SELECT * FROM user WHERE  uname='$uname'";
                      $user_query= mysqli_query($conn,$get_user);
                      while($row_user = mysqli_fetch_assoc($user_query)){
                       $fname = $row_user['fname'];
                        echo"
                          <h3 class='display-5'>Welcome,$fname!</h3>
                        ";
                       }
                     }
                  ?>
                 
                 <p class="lead">This is Easy Cash Investments, where with your capital, we invest and pay you back with a 50% increase.
                 </p>
                <p class="lead">Please kindly pay in the amount pledged to be invested into the account below, using the Reference Number  and after making payment scan and upload the details below
                and also using this whatsapp link
                
                <!--<div class="my-2"><a href="https://wa.me/message/7GQL5ACUFEPHO1"> <h4 class="text-warning">whatsapp chat link &nbsp; <span class="fab fa-whatsapp"></span></h4></a></div>-->
                 </p>
                 
                 <div class="row">
                    <div class="col-md-2">
                       <h4>NAME:</h4>
                    </div>
                    <div class="col-md-6"><h4>Goodday Goodman</h4></div>
                    <div class="col-md-3"></div>
                    
                    <div class="col-md-3">
                       <h4>BANK NAME:</h4>
                    </div>
                    <div class="col-md-5"><h4>Providus Bank</h4></div>
                    <div class="col-md-4"></div>
                    
                    <div class="col-md-3 my-1">
                       <h4>ACCOUNT No:</h4>
                    </div>
                    <div class="col-md-3 my-1"><h4>9909586718</h4></div>
                    <div class="col-md-6"></div>
                 </div>
                 
                <hr>
      
          </div>
         <div class="container-fluid bg-secondary">
     <?php
            if(!isset($_POST['submit'])){
               $refe_no = $_SESSION['ref_no'];
                $amount = $_SESSION['amount']; 
               echo"
                    <div class='row'>
      <div class='col-md-6 my-1'>
          <h4 class='text-light text-center text- border py-2'>REFERENCE No.</h4>
      </div>
      <div class='col-md-6 my-1'>
          <h4 class='text-light text-center text- border py-2'><span></span>$refe_no</h4>
      </div>
     
         
     
      <div class='col-md-6 mt-3 mb-1'>
          
       <h4 class='text-light text-center text- border py-2'>TOTAL AMOUNT TO BE INVESTED:</h4>   
      </div>
      <div class='col-md-6 mt-3 mb-1'>
         <h4 class='text-light text-center text- border py-2'><span></span>$amount</h4> 
      </div>
      
      <div class='col-md-9 my-1'>
          <h4 class='text-light mt-2 font-italic'>Please upload the scanned payment slip here</h4>
             <form method='post' action='investdashboard.php' enctype='multipart/form-data'>
                 <div class='input-group mb-3'>
                    <input type='file' class='form-control py-2' name='scan' placeholder='Scanned Payment Details' aria-label='Scanned Payment Details' aria-describedby='button-addon2'>
                   <div class='input-group-append'>
           <button class='btn btn-success py-2' type='submit' name='scan' id='button-addon2'>Upload</button>&nbsp;&nbsp;
        <a class='btn btn-success' href='https://wa.me/message/7GQL5ACUFEPHO1' target='_blank'><span class='fab fa-whatsapp'></span></a>
        </div>
                </div> 
             </form>
        </div>
      
      
    </div>           
               "; 
                
            }
            ?>
            <?php
            $refe_no = $_POST['ref_no'];
            if(isset($_POST['scan'])){
    
              $scan = $_FILES['scan']['name'];
              $tmp_scan = $_FILES['scan']['tmp_name'];
             move_uploaded_file($tmp_scan,"scanned/$scan");
                  $amount = $_SESSION['amount'];
                $refi_no = $_SESSION['ref_no'];
                
            $update_invest="UPDATE invest SET upload ='$scan' WHERE ref_no='$refi_no'";
            $update_query = mysqli_query($conn,$update_invest);
           if($update_query){
           echo "<script>alert('You have uploaded your payment Details')</script>";
          
           echo"
                     <div class='row d-none'>
      <div class='col-md-6 my-1'>
          <h4 class='text-light text-center text- border py-2'>REFERENCE No.</h4>
      </div>
      <div class='col-md-6 my-1'>
          <h4 class='text-light text-center text- border py-2'>$refi_no</h4>
      </div>
     
         
     
      <div class='col-md-6 mt-3 mb-1'>
          
       <h4 class='text-light text-center text- border py-2'>TOTAL AMOUNT TO BE INVESTED:</h4>   
      </div>
      <div class='col-md-6 mt-3 mb-1'>
         <h4 class='text-light text-center text- border py-2'><span></span> $amount</h4> 
      </div>
      
      <div class='col-md-9 my-1'>
          <h4 class='text-light mt-2 font-italic'>Please upload the scanned payment slip here</h4>
             <form method='post' action='investdashboard.php' enctype='multipart/form-data'>
                 <div class='input-group mb-3'>
                    <input type='file' class='form-control py-2' name='scan' placeholder='Payment Details' aria-label='Scanned Payment Details' aria-describedby='button-addon2'>
                   <div class='input-group-append'>
           <button class='btn btn-success py-2' type='submit' name='scan' id='button-addon2'>Upload</button>&nbsp;&nbsp;
           <a class='btn btn-success' href='https://wa.me/message/7GQL5ACUFEPHO1' target='_blank'><span class='fab fa-whatsapp'></span></a>
        </div>
                </div> 
             </form>
             
        </div>
      
      
    </div>       
           
           
           ";
         }
         else{echo"
                <div class='row'>
      <div class='col-md-6 my-1'>
          <h4 class='text-light text-center text- border py-2'>REFERENCE No.</h4>
      </div>
      <div class='col-md-6 my-1'>
          <h4 class='text-light text-center text- border py-2'><span></span> $refi_no</h4>
      </div>
     
         
     
      <div class='col-md-6 mt-3 mb-1'>
          
       <h4 class='text-light text-center text- border py-2'>TOTAL AMOUNT TO BE INVESTED:</h4>   
      </div>
      <div class='col-md-6 mt-3 mb-1'>
         <h4 class='text-light text-center text- border py-2'><span></span> $amount</h4> 
      </div>
      
      <div class='col-md-9 my-1'>
          <h4 class='text-light mt-2 font-italic'>Please upload the scanned payment slip here</h4>
             <form method='post' action='investdashboard.php' enctype='multipart/form-data'>
                 <div class='input-group mb-3'>
                    <input type='file' class='form-control py-2' name='scan' placeholder='Scanned Payment Details' aria-label='Scanned Payment Details' aria-describedby='button-addon2'>
                   <div class='input-group-append'>
           <button class='btn btn-success py-2' type='submit' name='scan' id='button-addon2'>Upload</button>&nbsp;&nbsp;
           <a class='btn btn-success' href='https://wa.me/message/7GQL5ACUFEPHO1' target='_blank'><span class='fab fa-whatsapp'></span></a>
        </div>
                </div> 
             </form>
             
        </div>
      
      
    </div>    
         
         ";}
}


?>
 
    
</div>


          <div class="container-fluid">
    <?php
                  if(isset($_SESSION['uname'])){
                      $uname = $_SESSION['uname'];
                      
                      $get_user = "SELECT * FROM user WHERE  uname='$uname'";
                      $user_query= mysqli_query($conn,$get_user);
                      while($row_user = mysqli_fetch_assoc($user_query)){
                       $fname = $row_user['fname'];
                        echo"
                        <h5 class='text-dark text-center font-weight-bold pt-5'>Easy Cash Investment Details For $fname</h5>
                        ";
                         }
                     }
                  ?>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">S/No</th>
      <th scope="col">Ref No</th>
      <th scope="col">Date</th>
      <th scope="col">Investor</th>
      <th scope="col">amount</th>
      <th scope="col">payment upload</th>
      <th scope="col">Status</th>
      <th scope="col">Duration</th>
      <th scope="col">button</th>
    </tr>
  </thead>
  <tbody>
    
        <?php
          if(isset($_GET['uname'])|| isset($_SESSION['uname'])){
             $username = $_SESSION['uname'];
           $i=1;
            
           $get_invest = "SELECT * FROM invest WHERE uname = '$username' ORDER BY 1 DESC";
           $invest_query1 = mysqli_query($conn,$get_invest);
           while($invest_row = mysqli_fetch_assoc($invest_query1)){
               
            $ref_no = $invest_row['ref_no'];
            $invest_id = $invest_row['invest_id'];
            $uname = $invest_row['uname'];
            $amount = $invest_row['amount'];
            $amt_status = $invest_row['amt_status'];
            $upload = $invest_row['upload'];
            $date = $invest_row['date'];
            date_default_timezone_set('Africa/Lagos');
            $datenow = date('d-m-y h:i:s');
            $date1 = strtotime( $date);
            $date2 = strtotime($datenow);
             $days=($date2 - $date1)/60/60/24;
            //$diff = abs($date2-$date1);
           // $years = floor($diff / (365*60*60*24)); 
            //$months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
            //$days = floor(($diff - $years * 365*60*60*24 -$months*30*60*60*24)/ (60*60*24)); 
            echo"
               <tr>   
                   <th scope='row'>$i</th>
                   <td>$ref_no</td>
                   <td>$date</td>
                   <td>$uname</td>
                   <td>$amount</td>
                   <td>$upload</td>
                   <td>$amt_status</td>
                   <td></td
                   <td></td>
                   
               </tr>
            ";
            $i++;
           }
        }
        ?>
      
    
  </tbody>
</table>
</div>
     </div>
  </div>
 </div>




  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/all.min.js"></script>
  
  
  </body>
</html>
<?php
}
?>