<?php
include('includes/config.php');
include('includes/function.php');

session_start();
if(!isset($_SESSION['uname'])){
    
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

	<title>EasyCashInvestments||EasyCash</title>

	
	
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

  <div class="collapse navbar-collapse" id="navbarSupportedContent dflex justify-content-end">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="investdashboard.php?uname=<?php echo $uname;?>">My Account</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="invest.php">Invest</a>
      </li
      
      <li class="nav-item">
        <a class="nav-link" href="#footer-center">Contact us</a>
      </li>
      
      
    </ul>
       <ul class="text-inline my-2 my-lg-0 ml-0 pl-0">
         <li class="nav-item pl-0 ml-0">
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

<div class="jumbotron">
 <?php
    if(isset($_SESSION['uname'])){
        
        $uname = $_SESSION['uname'];
        $get_user = "SELECT * FROM user WHERE  uname='$uname'";
    
        $user_query= mysqli_query($conn,$get_user);
       while($row_user = mysqli_fetch_assoc($user_query)){
           $fname = $row_user['fname'];
           $lname = $row_user['lname'];
           echo"<h1 class='display-5'>Welcome, $fname!</h1>";
       };
       
   
    }
    
    ?>
  
  <p class="lead">This is Easy Cash Investments, where with your capital, we invest and pay you back with a 50% increase.</p>
  <hr class="my-2">
  <p>it uses a system where you are merged with a client that pays you your capital with 50% increase on your capital after five (5) days.</p>
 </div>
 
 <div class="container-fluid bg-secondary">
     <form action="investdashboard.php" method="post">
    <div class="row"> 
      <div class="col-md-11">
          <h4 class="text-light" >Please indicate how much you want to invest in easy cash investments
          </h4>
      </div>
      
         <div class="col-md-6 my-5">
        <div class="input-group mb-3">
       <div class="input-group-prepend">
          <span class="input-group-text">N</span>
       </div>
      <input type="number" step="5000" min="5000" name="amount" class="form-control" aria-label="Amount (to the nearest Naira starting from N5000)" placeholder="Amount starting from N5000" required>
      <div class="input-group-append">
         <span class="input-group-text">.00</span>
     </div>
    </div>
     </div>
      <?php
      $n = 20; 
       $result = bin2hex(random_bytes($n)); 
       $ref_no = 'ECI-'.substr($result,0,9);
       ?>
     <input type="hidden" name="ref_no" value="<?php echo $ref_no;?>" />
     <div class="col-md-6 my-5">
        <input class="btn btn-primary" type="submit" name="invest" value="INVEST NOW"></button>
     </div> 
     <h5 class="font-italic text-light text-center text- border">NB: On clicking the invest now button, you will be issued a reference number and the payment details uploaded when you are merged with another investor</h5>
     
      </form>
      
    </div>
 </div>








	<footer class="footer-distributed">
     	<div class="footer-left">
          <img src="g4.jpg">
				<h3>About<span>Easy Cash investments</span></h3>

				<p class="footer-links spacing">
					<a href="index.php">Home</a>
					|
					
					<a href="about.php">About</a>
					|
					<a href="#footer-center">Contact</a>
				</p>

				<p class="footer-company-name spacing">	&#169; 2020 easy cash investments.</p>
			</div>

			<div class="footer-center" id="footer-center">

				<div>
					<i class="fa fa-phone"></i>
					<p>(+234)0817-1838-455</p><br><br>
                                     <p> <i class="fab fa-whatsapp"></i> &nbsp; (+234)0817-1838-455</P><br><br>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:easycashinvestments.com">&nbsp;Easycashinvestments522@gmail.com</a></p>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about spacing">
					<span>About the company</span>
					easy cash investments is a platform design to render selfless services to people in other to alliviate their standard of living.</p>
				<div class="footer-icons">
					<a href="https://www.facebook.com/102890888236589?referrer=whatsapp"><i class="fab fa-facebook"></i></a>
					<a href="www.twitter.com"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
				</div>
			</div>
                            <center>
                            <u> BEWARE OF SCAMMERS WITH SIMILAR PLATFORM </u>
                                 <i> There alot of scammers with this similar platform, be advice to make your enquiry
                                   before making your payment, we are here to serve you better, feel free to contact us
                                   if any casualties springs up through that whatsapp line. </i>
                             </center>
                               <div>
                               <u> OUR BONUS FOR EACH MEMBER WHO REFERS SOMEONE </u>
                                 <i>any member who refers one person is entitle to 10% of the persons investment,
                                    all you've got to do its to send us the prove via the whatsapp line </i>
                               </div>
		</footer>
  
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/all.min.js"></script>
  
  
  </body>
</html>
<?php }?>