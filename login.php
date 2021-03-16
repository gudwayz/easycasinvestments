<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Easy Cash Investments">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link href="all.min.css" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&amp;family=Roboto&amp;display=swap" rel="stylesheet">
    <title>EAsy Cash Investments</title>
       <link href="assets/bootstrap.min.css" rel="stylesheet">
       <link href="assets/all.min.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>
<body>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100 mt-5">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="g1.jpg" alt="Easy Cash Investments" class="brand_logo">
                </div>
            </div>

            <div class="d-flex justify-content-center form-container">
                <form action="login.php" method="post">
                    <div class="input-group mt-5">
                        <div class="input-group-append">
                           <span class="input-group-text">
                                <i class="fa fa-user"></i>
                           </span>
                        </div>
                        <input type="text" placeholder= "Enter Username or Phone number" name="unamephone" id="unamephone" class="form-control input-user" required>
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-append">
                             <span class="input-group-text">
                               <i class="fa fa-key"></i>
                             </span>
                        </div>
                        <input type="password" placeholder= "Enter password" name="pass" id="password" class="form-control input-password" required>
                    </div>

                    <div class="form-group">
                     <div class="custom-control custom-check">
                         <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
                         <label for="customControlInline" class="custom-control-label">Remember me</label>
                     </div>

                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-success W-75">Login</button>

                    </div>
                    
                </form>
                
            </div>

            <div class="mt-3">
                    <div class="d-flex justify-content-center">
                        Don't have an account?
                        <a href="register.php?login" class="ml-2">Sign Up</a>
                    </div>
            </div>

            
            <div class="mt-3">
                    <div class="d-flex justify-content-center">
                        <a href="login.php?forgot" class="ml-2">Forgot password?</a>
                    </div>
            </div>
        </div>
    </div>

</div>

<?php
include('includes/config.php');

if(isset($_POST['submit'])){
    
    $unamephone = $_POST['unamephone'];
    $pass = $_POST['pass'];
    $get_user = "SELECT * FROM user WHERE  pass='$pass'";
    
    $user_query= mysqli_query($conn,$get_user);
    $count = mysqli_num_rows($user_query);
   
    if($count>0)
    {
      $user_row = mysqli_fetch_assoc($user_query); 
      $uname = $user_row['uname'];
      $phone = $user_row['phone'];
       
      if($uname==$unamephone|| $phone==$unamephone){
         $get_invest=  "SELECT * FROM invest WHERE username = '$uname'";
         $invest_query= mysqli_query($conn,$get_invest );
         $invest_count = mysqli_num_rows($invest_query);
         if($invest_count>0){
                 $_SESSION['uname']=$uname;
                 echo"<script>alert('The Login was Successful')</script>";
                 echo"<script>window.open('investdashboard.php','_self')</script>";
         }
         else{
             
             $_SESSION['uname']=$uname;
             echo"<script>alert('The Login was Successful')</script>";
             echo"<script>window.open('invest.php','_self')</script>"; 
          
            }
        
        }
        else{
            echo"<script>alert('The username or Phone number  was invalid')</script>";
        echo"<script>window.open('login.php','_self')</script>";
        }
        
    }
    else{
        echo"<script>alert('The Password was invalid')</script>";
        echo"<script>window.open('login.php','_self')</script>";
    }
    
    
}



?>




<script src = "assets/jquery.min.js"></script>
<script src = "assets/bootstrap.min.js"></script>
<script src = "assets/all.min.js"></script>
    
</body>
</html>