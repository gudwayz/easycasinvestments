<?php 
include('includes/config.php');
include('includes/function.php');
session_start();
if(!isset($_SESSION['uname'])){
   echo "<script>window.open('login.php','_self')</script>";  
}




?>

<div class="container-fluid bg-secondary">
     <div class="row">
        <?php $ref = $_SESSION['ref'];
         echo "<script>alert('$ref')</script>"; ?>
      <div class="col-md-6 my-1">
          <h4 class="text-light text-center text- border py-2">REFERENCE No.</h4>
      </div>
      <div class="col-md-6 my-1">
          <h4 class="text-light text-center text- border py-2"><span></span><?php  echo('global $ref_no') ?></h4>
      </div>
     
         
     
      <div class="col-md-6 mt-3 mb-1">
       <h4 class="text-light text-center text- border py-2">TOTAL AMOUNT TO BE INVESTED:</h4>   
      </div>
      <div class="col-md-6 mt-3 mb-1">
         <h4 class="text-light text-center text- border py-2"><span></span><?php echo $amount ?></h4> 
      </div>
      
      <div class="col-md-9 my-1">
             <form>
                 <div class="input-group mb-3">
         <input type="file" class="form-control py-2" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
           <button class="btn btn-success py-2" type="button" name="image" id="button-addon2">Upload Scanned Payment Details</button>
        </div>
      </div> 
             </form>
        </div>
      
      
    </div>
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
                        <h3 class='text-dark text-center font-weight-bold pt-5'>(Donor)&nbsp;Easy Cash Investment Details For $fname</h3>
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
      <th scope="col">Receiver</th>
      <th scope="col">amount</th>
      <th scope="col">payment upload</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2"></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>