    <?php
   include('includes/config.php');
   include('includes/function.php');
   session_start();
   if(!isset($_SESSION['email'])){
       
     echo"<script>window.open('login.php','_self')</script>";
   }
   else{
   $email = $_SESSION['email']
   ?>
    <!DOCTYPE html>
    <html>
    
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="keywords" content="footer, address, phone, icons" />
    
    	<title>EasyCashInvestments||Merging</title>
    
    	
    	
      <link rel="stylesheet" href="assets/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="assets/all.min.css" type="text/css">
    
      <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="assets/style.css">
    
    </head>
    <body>
        
        <!-- Modal -->
<div class="modal fade" id="bankdetails" tabindex="-1" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bank Details upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?
        $upload1=$_SESSION['upload'];
        
        ?>
       <img src="../scanned/<?echo $upload1; ?>" class="card-img-top img-fluid" height = 60vh alt='bank Details'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        
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
                    $email = $_SESSION['email'];
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
                      <li class="list-group-item font-weight-bold  px-0"><a href="index.php"><h4><i class="fas fa-hand-holding-usd"></i> &nbsp; dashboard</h4></a></li>
                       <li class='list-group-item font-weight-bold  px-0'><a href='user.php'><h4><i class='fas fa-cart-arrow-down'></i> &nbsp;user</h4></a></li>
                     <li class='list-group-item font-weight-bold  px-0'><a href='merging.php'><h5><i class='fas fa-money-check-alt'></i> &nbsp; Merge </h5></a></li>
                       <li class='list-group-item font-weight-bold  px-0'><a href='password.php'><h5><i class='fas fa-key'></i> &nbsp; Password</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='profile.php'><h5><i class='fas fa-key'></i> &nbsp; Profile</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='logout.php'><h5><i class='fas fa-key'></i> &nbsp; Logout</h5></a></li>
                       <li class='list-group-item font-weight-bold px-0'><a href='transaction.php'><h5><i class='fas fa-key'></i> &nbsp; Transactions</h5></a></li>
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
      
              </div>
              <div class="">
                  <a href="merging.php?mer=merge" class="btn btn-primary text-light">Merged</a>
                  <a href="merging.php?mer=unmerge" class="btn btn-primary text-light">Unmerge</a>
              </div>
              
             
               <div class="table-responsive">
                  <h3 align="center">List of investments</h3>
                  <div id="jsGrid">
                      <form action="merging.php" method="post" enctype="multipart/form-data">
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
                              <th scope="col">Update Payment</th>
                              <th scope="col">Duration</th>
                            </tr>
                       </thead>
                       <tbody>
        <?php
        if(!isset($_GET['mer'])){
             $i=1;
            $email = $_SESSION['email'];
           $get_allinvest = "SELECT * FROM invest  WHERE mer_status = 'unmerged' ORDER BY 1 DESC";
           $invest_query = mysqli_query($conn,$get_allinvest);
           $invest_count = mysqli_num_rows($invest_query);
           if($invest_count>0){
               while($invest_row = mysqli_fetch_assoc($invest_query)){
               
            $ref_no = $invest_row['ref_no'];
            $invest_id = $invest_row['invest_id'];
            $uname = $invest_row['uname'];
            $amount = $invest_row['amount'];
            $amt_status = $invest_row['amt_status'];
            $upload = $invest_row['upload'];
            $_SESSION['upload']=$upload;
            $date = $invest_row['date'];
           
            echo"
               <tr>   
                   <th scope='row'>$i</th>
                   <td>$ref_no</td>
                   <td>$date</td>
                   <td>$uname</td>
                   <td>$amount</td>
                   <td><button class='btn btn-success' data-toggle='modal' data-target='#bankdetails'>$upload</button></td>
                   <td>$amt_status</td>
                  
                               <td>
                               <form action='merging.php' method='post'><input type='hidden' name='update' value='$invest_id'><button type='submit'class='btn btn-success' name='pay'>pay Status</button></form></td>
                   
               </tr>
            ";
            $i++;
           }
           }
           else{
               echo"
               <tr>   
                   <td colspan='5'>You Don't have any Merged investor</th>
                   
                   
               </tr>
            ";
           }
           
             }
                 
            $email = $_SESSION['email'];
            $merg =$_GET['mer'];
            if(isset($_GET['mer'])){
             $merg = $_GET['mer'];
             if($merg =='unmerge'){
                $i=1;
                $email = $_SESSION['email'];
                $get_allinvest = "SELECT * FROM invest  WHERE mer_status = 'unmerged' ORDER BY 1 DESC";
                $invest_query = mysqli_query($conn,$get_allinvest);
                while($invest_row = mysqli_fetch_assoc($invest_query)){
               
                     $ref_no = $invest_row['ref_no'];
                     $invest_id = $invest_row['invest_id'];
                     $uname = $invest_row['uname'];
                     $amount = $invest_row['amount'];
                     $amt_status = $invest_row['amt_status'];
                     $upload = $invest_row['upload'];
                     $_SESSION['upload']=$upload;
                    $date = $invest_row['date'];
           
                    echo"
                           <tr>   
                               <th scope='row'>$i</th>
                               <td>$ref_no</td>
                               <td>$date</td>
                               <td>$uname</td>
                               <td>$amount</td>
                               <td><button class='btn btn-success' data-toggle='modal' data-target='#bankdetails'>$upload</button></td>
                               <td>$amt_status</td>
                               
                               <td>
                               <form action='merging.php' method='post'><input type='hidden' name='update' value='$invest_id'><button type='submit'class='btn btn-success' name='pay'>pay Status</button></form></td>
                               
                               
                           </tr>
                        ";
                        $i++;
                     }
                }}
                
             if(isset($_GET['mer'])){
                $merg = $_GET['mer'];  
                if($merg =='merge'){
                 
                  $i=1;
                  $email = $_SESSION['email'];
                  $get_allinvest = "SELECT * FROM invest  WHERE mer_status <> 'unmerged' ORDER BY 1 DESC";
                  $invest_query = mysqli_query($conn,$get_allinvest);
                  while($invest_row = mysqli_fetch_assoc($invest_query)){
               
                        $ref_no = $invest_row['ref_no'];
                        $invest_id = $invest_row['invest_id'];
                        $uname = $invest_row['uname'];
                        $amount = $invest_row['amount'];
                        $amt_status = $invest_row['amt_status'];
                        $upload = $invest_row['upload'];
                        $_SESSION['upload']=$upload;
                        $date = $invest_row['date'];
                       
                        echo"
                           <tr>   
                               <th scope='row'>$i</th>
                               <td>$ref_no</td>
                               <td>$date</td>
                               <td>$uname</td>
                               <td>$amount</td>
                               <td><button class='btn btn-success' data-toggle='modal' data-target='#bankdetails'>$upload</button></td>
                               <td>$amt_status</td>
                               <td><form action='merging.php' method='post'><input type='hidden' name='update' value='$invest_id'><button type='submit'class='btn btn-success' name='pay'>pay Status</button></form></td>
                               
                           </tr>
                        ";
                        $i++;
                       }
            
             }
               else{
                   echo"
                      <tr>   
                        <td colspan='5'>You Don't have any Merged investor</th>
               </tr>
            ";
           }
            }
             
             
             
     
        ?>
                           
                       </tbody>
                </table>
                    </form>
                  </div>
              </div> 
              
          </div>
      </div>
    </div>

 <?php
              if(isset($_POST['pay'])){
                        
                        $invest_id = $_POST['update'];
                        echo"<script>alert('$invest_id')</script>";
                        $paid = "paid";
                        
                            $update_invest = "UPDATE invest SET amt_status = '$paid' WHERE invest_id = '$invest_id'";
                            
                            $run_update = mysqli_query($conn,$update_invest);
                            
                            if($run_update){
                                
                                echo "<script>window.open('merging.php','_self')</script>";
                                
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