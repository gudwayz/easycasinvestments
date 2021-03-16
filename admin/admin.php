   <?php
   include('includes/config.php');
   include('includes/function.php');
   session_start();
   if(!isset($_SESSION['email'])){
       
     echo"<script>window.open('login.php','_self')</script>";
   }
   else{
    $email = $_SESSION['email'];
    
    if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $tmp_image =  $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_image,"profile/$image");
    $level = $_POST['level'];
    
    
    $admin_select = "INSERT INTO admin (fname, lname, uname, email, phone, pass,image,level) VALUES ('$fname','$lname','$uname','$email','$phone','$pass','$image','$level')";
    $admin_query = mysqli_query($conn,$admin_select);
    
    if($admin_query){
        echo"<script>alert('New Administrator has been added')</script>";
        
            echo"<script>window.open('admin.php','_self')</script>";
        
        
    }
    else{
        echo"<script>alert('Adding of admin was invalid')</script>";
        echo"<script>window.open('admin.php','_self')</script>";
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
    
    	<title>EasyCashInvestments||Admin Dashboard</title>
    
    	
    	
      <link rel="stylesheet" href="assets/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="assets/all.min.css" type="text/css">
    
      <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="assets/style.css">
      <link rel="stylesheet" href="assets/jsgrid-theme.min.css">
      <link rel="stylesheet" href="assets/jsgrid.min.css">
    
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand text-white " href="index.php">EasyCashInvestments</a>
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
                <img src="../g1.jpg" class="card-img-top" alt="...">
                <div class="card-header text-center">
                    
                 <?php
                 
                 if(isset($_SESSION['email'])){
                    $uname = $_SESSION['uname'];
                    $get_name = "SELECT * FROM admin WHERE email = '$email'";
                    $name_query = mysqli_query($conn, $get_name);
                    while($name_row = mysqli_fetch_assoc($name_query)){
                        $fname = $name_row['fname'];
                        echo"$fname";
                        
                    }
                 }
                  ?>
                </div>
      
                <div class="card-body">
                   <ul class="list-group list-group-flush">
                      <?php
                      if(isset($_SESSION['email'])){
                    $email = $_SESSION['email'];
                    $get_level = "SELECT * FROM admin WHERE email = '$email'";
                    $level_query = mysqli_query($conn, $get_level);
                    while($level_row = mysqli_fetch_assoc($level_query)){
                          $level = $level_row['level'];
                          $uname = $level_row['uname'];
                          
                          if($level ="super"){
                            echo"
                             <li class='list-group-item font-weight-bold px-0'>
                             <a href='index.php'><h4><i class='fas fa-hand-holding-usd'></i> &nbsp; dashboard</h4></a></li>
                             
                             <li class='list-group-item font-weight-bold  px-0'>
                             <a href='admin.php'><h4><i class='fas fa-users'></i> &nbsp;Add Admin</h4></a>
                             </li>
                      
                     <li class='list-group-item font-weight-bold  px-0'><a href='merging.php'><h5><i class='fas fa-money-check-alt'></i> &nbsp; Merge </h5></a></li>
                        <li class='list-group-item font-weight-bold  px-0'><a href='user.php'><h4><i class='fas fa-cart-arrow-down'></i> &nbsp;user</h4></a></li>
                     <li class='list-group-item font-weight-bold  px-0'><a href='merging.php'><h5><i class='fas fa-money-check-alt'></i> &nbsp; Merge </h5></a></li>
                       <li class='list-group-item font-weight-bold  px-0'><a href='password.php'><h5><i class='fas fa-key'></i> &nbsp; Password</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='profile.php'><h5><i class='fas fa-key'></i> &nbsp; Profile</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='logout.php'><h5><i class='fas fa-key'></i> &nbsp; Logout</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='transaction.php'><h5><i class='fas fa-key'></i> &nbsp; Transactions</h5></a></li>
                       ";
                              
                          }
                          else{
                          echo" <li class='list-group-item font-weight-bold  px-0'><a href='index.php'><h4><i class='fas fa-hand-holding-usd'></i> &nbsp; dashboard</h4></a></li>
                      <li class='list-group-item font-weight-bold  px-0'><a href='user.php'><h4><i class='fas fa-cart-arrow-down'></i> &nbsp; Add user</h4></a></li>
                     <li class='list-group-item font-weight-bold  px-0'><a href='merging.php'><h5><i class='fas fa-money-check-alt'></i> &nbsp; Merge </h5></a></li>
                       <li class='list-group-item font-weight-bold  px-0'><a href='password.php'><h5><i class='fas fa-key'></i> &nbsp; Password</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='profile.php'><h5><i class='fas fa-key'></i> &nbsp; Profile</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='logout.php'><h5><i class='fas fa-key'></i> &nbsp; Logout</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='transaction.php'><h5><i class='fas fa-key'></i> &nbsp; Transactions</h5></a></li>
                       
                       ";
                              
                          }
                    }
                      }
                      ?>
                     
                      </ul>
               </div>
              </div>
          </div>
          <div class="col-md-10 mt-2 mb-1">
              <div class="jumbotron">
                  <?php
                 if(isset($_SESSION['email'])){
                    $email = $_SESSION['email'];
                    $get_name = "SELECT * FROM admin WHERE email = '$email'";
                    $name_query = mysqli_query($conn, $get_name);
                    while($name_row = mysqli_fetch_assoc($name_query)){
                        $fname = $name_row['fname'];
                        echo"<h1 class='display-5'>Welcome, $fname!</h1>";
                    }
                 }
                  ?>
                 
                 <p class="lead">This is Easy Cash Investments, where with your capital, we invest and pay you back with a 50% increase.
                 </p>
                 <hr>
                 <p> <h3 class="text-dark">Kindly Register new Admin</h3></p>
                
      
          </div>
              <div class=""></div>
             <div class="container-fluid">
              <div class="row">
                 <div class="col-md-2"></div>
                 <div class="col-md-8 p-2">
                     
                   <form class="needs-validation mt-4" action="admin.php" method="post" novalidate>
                     <div class="form-row">
                       <div class="col-md-6 mb-3">
                         <label for="fname">First name</label>
                           <input type="text" class="form-control" id="fname" name= "fname" value="<?php if(isset($_POST['fname'])){echo $fname;} ?>" required>
                              <div class="valid-feedback">
                                 Looks good!
                             </div>
                        </div>
                       <div class="col-md-6 mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="<?php if(isset($_POST['lname'])){echo $lname;} ?>" required>
                        <div class="valid-feedback">
                          Last name good!
                        </div>
                       </div>
                    </div>
                     <div class="form-row">
                         <div class="col-md-6 mb-3">
                           <label for="uname">Username</label>
                           <input type="text" class="form-control" id="uname" name="uname" value="<?php if(isset($_POST['uname'])){echo $uname;} ?>" required>
                          <div class="valid-feedback">
                             Looks good!
                          </div>
                        </div>
                         <div class="col-md-6 mb-3">
                           <label for="email">E-Mail</label>
                           <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])){echo $email;} ?>" required>
                           <div class="valid-feedback">
                             Good Email
                          </div>
                    </div>
                         <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php if(isset($_POST['phone'])){echo $phone;} ?>" required>
               <div class="valid-feedback">
                 Good phone number
               </div>
              </div>
               <div class="col-md-6 mb-3">
                  <label for="level">Admin Type</label>
                  <select class="custom-select" id="level" name="level" required>
                      <option selected disabled value="">Choose...</option>
                      <option value="super">super</option>
                      <option value="Admin">Admin</option>
                      
                  </select>
                  <div class="invalid-feedback">
                     Please select an admin level.
                  </div>
                 </div>
                   </div>
                     <div class="form-row">
                       <div class="col-md-10 mb-3">
                         <label for="pass">Image</label>
                         <input type="file" class="form-control" placeholder="Please insert your picture" id="image" name="image" value="<?php if(isset($_FILES['image'])){echo $image;} ?>">
                         
                       </div>
                       <div class="col-md-8 mb-3">
                         <label for="pass">Password</label>
                         <input type="password" class="form-control" id="pass" name="pass" value="<?php if(isset($_POST['pass'])){echo $pass;} ?>" required>
                         <div class="valid-feedback">
                          Password is strong
                        </div>
                       </div>
                    </div>
                    
              
                    <div class="form-row">
                  
                
                 <!--<div class="col-md-3 mb-3">
      <label for="validationCustom05">Zip</label>
      <input type="text" class="form-control" id="validationCustom05" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>-->
             </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="term" value="yes" id="terms" required>
                        <label class="form-check-label" for="terms">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                           You must agree before submitting.
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                     <div class="col-md-12 mb-3 d-flex justify-content-center">
                    <button class="px-5 btn btn-primary" type="submit" name="submit">Add Admin</button>
                    </div>
                    </div>
                      
                
                
            </form>
       </div>
        <div class="col-md-2"></div>
    </div>
</div>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

          </div>
     </div>
 </div>




  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/jsgrid.min.js"></script>
  <script src="assets/all.min.js"></script>
  
  </body>
</html>
<?php
}
?>