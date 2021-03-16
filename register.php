<?php
include('includes/config.php');

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $term = $_POST['term'];
    
    $user_select = "INSERT INTO user (fname, lname, uname, email, phone, pass,contact, city, state, term) VALUES ('$fname','$lname','$uname','$email','$phone','$pass','$contact','$city','$state','$term')";
    $get_query = mysqli_query($conn,$user_select );
    
    if($get_query){
        echo"<script>alert('The Registration was Successful')</script>";
        if(isset($_GET['login'])){
            echo"<script>window.open('invest.php','_self')</script>";
        }
        else{
            echo"<script>window.open('index.php','_self')</script>";
        }
        
    }
    else{
        echo"<script>alert('The Registration was invalid')</script>";
        echo"<script>window.open('register.php','_self')</script>";
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

	<title>EasyCashInvestments||Register</title>

	
	
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
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="invest.php">Invest</a>
      </li>
      
      
    </ul>
       <ul class="text-inline my-2 my-lg-0">
         <li class="nav-item">
           <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
          <a class="btn btn-success dropdown-item" href="login.php"><i class="fa fa-user"></i>&nbsp;Login</a>
       <!--</div>-->
      </li>       
       </ul>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 p-2">
            <form class="needs-validation mt-4" action="register.php" method="post" novalidate>
                
                    
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
                 Looks good!
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
              </div>
               <div class="form-row">
               <div class="col-md-12 mb-3">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" value="<?php if(isset($_POST['pass'])){echo $pass;} ?>" required>
                <div class="valid-feedback">
                     Password is strong
               </div>
               </div>
               
              </div>
                    <div class="form-row">
               <div class="col-md-12 mb-3">
                <label for="contact">Address</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php if(isset($_POST['contact'])){echo $contact;} ?>" required>
                <div class="valid-feedback">
                     Looks good!
               </div>
               </div>
               
              </div>
              
                    <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                    <div class="invalid-feedback">
                      Please provide a valid city.
                    </div>
                 </div>
                 <div class="col-md-6 mb-3">
                  <label for="state">State</label>
                  <select class="custom-select" id="state" name="state" required>
                      <option selected disabled value="">Choose...</option>
                      <option value="Abia">Abia</option>
                      <option value="Adamawa">Adamawa</option>
                      <option value="Akwaibom">Akwaibom</option>
                      <option value="Anambra">Anambra</option>
                      <option value="Bauch1">Bauchi</option>
                      <option value="Bayelsa">Bayelsa</option>
                      <option value="Benue">Benue</option>
                      <option value="Borno">Borno</option>
                      <option value="Cross River">Cross River</option>
                      <option value="Ebonyi">Ebonyi</option>
                      <option value="Edo">Edo</option>
                      <option value="Kaduna">Kaduna</option>
                      <option value="Ekiti">Ekiti</option>
                      <option value="Enugu">Enugu</option>
                      <option value="Delta">Delta</option>
                      <option value="Gombe">Gombe</option>
                      <option value="Imo">Imo</option>
                      <option value="Jigawa">Jigawa</option>
                      <option value="FCT">FCT</option>
                      <option value="Kano">Kano</option>
                      <option value="Katsina">Katsina</option>
                      <option value="Kebbi">Kebbi</option>
                      <option value="Kwara">Kwara</option>
                      <option value="Kogi">Kogi</option>
                      <option value="Lagos">Lagos</option>
                      <option value="Niger">Niger</option>
                      <option value="Nassarawa">Nassarawa</option>
                      <option value="Ogun">Ogun</option>
                      <option value="Osun">Osun</option>
                      <option value="Ondo">Ondo</option>
                      <option value="Oyo">Oyo</option>
                      <option value="Plateau">Plateau</option>
                      <option value="Rivers">Rivers</option>
                      <option value="Sokoto">Sokoto</option>
                      <option value="Taraba">Taraba</option>
                      <option value="Yobe">Yobe</option>
                      <option value="Zamfara">Zamfara</option>
                      
                      
                      
                      
                  </select>
                  <div class="invalid-feedback">
                     Please select a valid state.
                  </div>
                 </div>
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
                    <button class="px-5 btn btn-primary" type="submit" name="submit">Submit form Here</button>
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



<script src = "assets/jquery.min.js"></script>
<script src = "assets/bootstrap.min.js"></script>
<script src = "assets/all.min.js"></script>
    
</body>
</html>