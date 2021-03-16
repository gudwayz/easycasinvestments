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
                     <li class="list-group-item font-weight-bold  px-0"><a href="bank.php"><h5><div class="d-flex justify-content-around"><i class="fas fa-money-check-alt mr-1"></i><span class="text-center"> Upload Bank Details</span></div></h5></a></li>
                       <li class="list-group-item font-weight-bold  px-0"><a href="password.php"><h5><i class="fas fa-key"></i> &nbsp; Password</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href="profile.php"><h5><i class="fa fa-user"></i> &nbsp; Profile</h5></a></li>
                       <li class="list-group-item font-weight-bold px-0"><a href=" logout.php"><h5><i class="fas fa-key"></i> &nbsp; Logout</h5></a></li>
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
                 <P><h4>Kindly change your Password below</h4></P>
                <hr>
            </div>
            
                          <div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 p-2">
            <form class="needs-validation mt-4" action="password.php" method="post" novalidate>
                
                    
                    <div class="form-row">
                       <div class="col-md-11 mb-3">
                         <label for="opass">Old Password</label>
                         <input type="password" class="form-control" id="opass" name= "opass" value="<?php if(isset($_POST['opass'])){echo $opass;} ?>" required>
                        </div>
                       <div class="col-md-11 mb-3">
                         <label for="npass">New Password</label>
                         <input type="password" class="form-control" id="npass" name="npass" value="<?php if(isset($_POST['npass'])){echo $npass;} ?>" required>
                       </div>
                       <div class="col-md-11 mb-3">
                         <label for="rnpass">Retype New Password</label>
                         <input type="password" class="form-control" id="rnpass" name="rnpass" value="<?php if(isset($_POST['rnpass'])){echo $rnpass;} ?>" required>
                       </div>
                   </div>
                    
               
                    
              
                    
                    
                    <div class="form-row">
                     <div class="col-md-12 mb-3 d-flex justify-content-center">
                    <button class="px-5 btn btn-primary" type="submit" name="submit">Change Password</button>
                    </div>
                    </div>
                      
                
                
            </form>
       </div>
        <div class="col-md-2"></div>
    </div>
</div>




             
          </div>
     </div>
   </div>

<?
    if(isset($_POST['submit'])){
     $opass = $_POST['opass'];
      $npass = $_POST['npass'];
       $rnpass = $_POST['rnpass'];
        $uname = $_SESSION['uname'];
        
        
         if($rnpass == $npass){
             if($rnpass!== $opass){
             $pass="UPDATE user SET pass = '$rnpass' WHERE uname = '$uname'";
             $pass_query = mysqli_query($conn,$pass);
             if($pass_query){
                  echo"<script>alert('The password was changed successfully')</script>";
             echo"<script>window.open('password.php','_self')</script>";
             }
             else
             {echo"<script>alert('Error updating the password')</script>";
                 
             }
         }
             
         }
         
         
         else{
             echo"<script>alert('The password did not correspond')</script>";
             echo"<script>window.open('password.php','_self')</script>";
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