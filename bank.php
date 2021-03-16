
<?php 
include('includes/config.php');
include('includes/function.php');
 session_start();
 if(!isset($_SESSION['uname'])) {
    echo "<script>window.open('login.php','_self')</script>";  
  }
  else{
     $uname=$_SESSION['uname']; 
      
      
 
?>    

<!DOCTYPE html>
    <html>
    
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="keywords" content="footer, address, phone, icons" />
    
    	<title>EasyCashInvestments||BANK DETAILS</title>
    
    	
    	
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
        <a class="nav-link" href="investdashboard.php?uname=<?php echo $uname;?>">My Account</a>
      </li><li class="nav-item">
        <a class="nav-link" href="invest.php">Invest</a>
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
                     <li class="list-group-item font-weight-bold  px-0"><a href="investdashboard.php?uname=<?php echo $uname;?>"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Account</h5></a></li> 
                     <li class="list-group-item font-weight-bold  px-0"><a href="bank.php"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Bank Details</h5></a></li>
                       <li class="list-group-item font-weight-bold  px-0"><a href="password.php"><h5><i class="fas fa-key"></i> &nbsp; Password</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="profile.php"><h5><i class="fa fa-user"></i> &nbsp; Profile</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="logout.php"><h5><i class="fas fa-key"></i> &nbsp; Logout</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="transaction.php"><h5><i class="fas fa-money-check-alt"></i> &nbsp; Transactions</h5></a></li>
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
                          <h1 class='display-4'>Welcome,$fname !</h1>
                        ";
                       }
                     }
                  ?>
                 
                 <p class="lead">This is Easy Cash Investments, where with your capital, we invest and pay you back with a 50% increase.
                 </p>
            </div>
         
              <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center font-weight-bold display-5 font-italic">
                 BANK DETAILS
            </div>
            <form action= "bank.php" method="post">
               <div class="form-group">
                 <label for="name">Name in Full</label>
                 <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name in Full">
               </div>
  
              <div class="form-group">
                <label for="bnumber">Bank Account Number</label>
                <input type="number" class="form-control" id="bnumber" name="bnumber" placeholder="Enter bank account number">
              </div>
  
  
             <div class="form-group">
               <label for="bname">Enter Bank Name</label>
               <input type="text" class="form-control" id="bname" name="bname" placeholder="Enter Bank Name">
            </div>
            <input type="submit" class="btn btn-primary botton_edit" name="Bank" value="Submit Bank Details">
          </form>
        </div>
        <div class="col-md-6 mt-3 form-edit">
            <div class="card text-center">
               <div class="card-header">
                 Account Details
              </div>
             <div class="card-body">
                 <?php
                    
                    $get_detail = "SELECT * FROM bank WHERE uname = '$uname'";
                    $detail_query = mysqli_query($conn, $get_detail);
                    while($detail_row = mysqli_fetch_assoc($detail_query)){
                        $bank_name = $detail_row['b_name'];
                        $bank_number = $detail_row['acc_no'];
                        $full_name = $detail_row['f_name'];
                        echo"
                        
                            <h5 class='card-title'>
                             <span>
                                NAME: 
                             </span>
                              $full_name 
                            </h5>
                           <p class='card-text'>
                              <span>BANK: </span>$bank_name
                           </p>
    
                          </div>
                          <div class='card-footer text-dark'>
                          <div class='font-weight-bold'>
                             <span>Account No: </span>$bank_number
                          </div>
                        
                        ";
                    }
                 ?>
            
    <div class="mt-2 mx-2">
      <!-- <a href="bank.php?bank=update" class="btn btn-primary text-light">Edit</a>
       <a href="investdashboard.php?bank=delete" class="btn btn-primary text-light">DELETE</a>-->
       </div>
  </div>
</div>
        </div>
    </div>
   
    
</div> 
            </div>
<?php
    
    if(isset($_POST['Bank'])){
        $uname = $_SESSION['uname'];
        $name = $_POST['name'];
        $bname = $_POST['bname'];
        $bnumber = $_POST['bnumber'];
        $get_bank = "INSERT INTO bank (uname,f_name,b_name,acc_no) VALUES ('$uname','$name','$bname','$bnumber')";
        $bank_query = mysqli_query($conn, $get_bank);
        if($bank_query){
            echo "<script>alert('Your Bank Details ave been Successfully Uploaded')</script>";
            
            echo "<script>window.open('investdashboard.php?bank','_self')</script>";

        }
        if(isset($_GET['Bank'])=='delete'){
         
        $uname = $_SESSION['uname'];
        $delete_bank = "DELETE FROM bank WHERE uname = '$uname' AND acc_no = '$bnumber'";
        $delete_bank = mysqli_query($conn, $delete_bank);
        if($delete_bank){
            echo "<script>alert('Your Bank Details have been Successfully Deleted')</script>";
            
            echo "<script>window.open('investdashboard.php?bank','_self')</script>";

        }
    }
    }
    
    
    
    
    
    
    ?>


  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/all.min.js"></script>
  
  
  </body>
</html>
<?php
}
?>