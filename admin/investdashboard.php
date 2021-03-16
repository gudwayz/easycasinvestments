<?php 
include('includes/config.php');
include('includes/function.php');
 session_start();
 if((isset($_SESSION['uname']))&&(isset($_POST['invest']))){
     $username = $_SESSION['uname'];
       
       $n = 20; 
       $result = bin2hex(random_bytes($n)); 
       $ref_no = 'ECI-'.substr($result,0,9); 

     $amount = $_POST['amount'];
     $date = date("d-m-y h:i:s");
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
          <div class="col-md-2 mt-2 mb-1">
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
                      <li class="list-group-item font-weight-bold  px-0"><a href="investdashboard.php?donor"><h4><i class="fas fa-hand-holding-usd"></i> &nbsp; Donor</h4></a></li>
                      <li class="list-group-item font-weight-bold  px-0"><a href="investdashboard.php?donee"><h4><i class="fas fa-cart-arrow-down"></i> &nbsp; Donee</h4></a></li>
                     <li class="list-group-item font-weight-bold  px-0"><a href="investdashboard.php?bank"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Bank Details</h5></a></li>
                       <li class="list-group-item font-weight-bold  px-0"><a href="investdashboard.php?password"><h5><i class="fas fa-key"></i> &nbsp; Password</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="investdashboard.php?profile"><h5><i class="fa fa-user"></i> &nbsp; Profile</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href=""><h5><i class="fas fa-key"></i> &nbsp; Logout</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="investdashboard.php?transaction"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Transactions</h5></a></li>
                      </ul>
               </div>
              </div>
          </div>
          <div class="col-md-10 mt-2 mb-1">
              <div class="jumbotron">
                  <?php
                  if(isset($_SESSION['uname'])){
                      $uname = $_SESSION['uname'];
                      $get_user = "SELECT * FROM user WHERE  uname='$uname'";
                      $user_query= mysqli_query($conn,$get_user);
                      while($row_user = mysqli_fetch_assoc($user_query)){
                       $fname = $row_user['fname'];
                        echo"
                          <h1 class='display-5'>Welcome,$fname !</h1>
                        ";
                       }
                     }
                  ?>
                 
                 <p class="lead">This is Easy Cash Investments, where with your capital, we invest and pay you back with a 50% increase.
                 </p>
                <p class="lead">Please kindly pay in the amount pledged to be invested into the account below, using the Reference Number  and after making payment scan and upload the details below  
                 </p>
                 <div class="row">
                    <div class="col-md-2">
                       <h4>NAME:</h4>
                    </div>
                    <div class="col-md-6"><h4>***************</h4></div>
                    <div class="col-md-3"></div>
                    
                    <div class="col-md-3">
                       <h4>BANK NAME:</h4>
                    </div>
                    <div class="col-md-5"><h4>***********</h4></div>
                    <div class="col-md-4"></div>
                    
                    <div class="col-md-3">
                       <h4>ACCOUN NUMBER:</h4>
                    </div>
                    <div class="col-md-3"><h4>***********</h4></div>
                    <div class="col-md-6"></div>
                 </div>
                 
                <hr>
      
          </div>
          <?php
          
              if(isset($_GET['donor'])){
                  include"donor.php";
              }
              elseif(isset($_GET['donee'])){
                    include"donee.php";   
              }
              elseif(isset($_GET['bank'])){
                    include"bank.php";   
              }
              elseif(isset($_GET['password'])){
                    include"password.php";   
              }
              elseif(isset($_GET['profile'])){
                    include"profile.php";   
              }
              elseif(isset($_GET['transaction'])){
                    include"transaction.php";   
              }
              else{
                    include"donee.php";   
              }
            
          ?>
     </div>
  </div>
 </div>




  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/all.min.js"></script>
  
  
  </body>
</html>