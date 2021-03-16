<?php 
//database connection config

include('includes/config.php');

include('includes/function.php');

session_start();

if(!isset($_SESSION['uname'])){
   echo "<script>window.open('login.php','_self')</script>";  
}
else{

?>

<div class="container-fluid bg-secondary">
     <div class="row"> 
      <div class="col-md-6 mt-3 mb-1">
          
       <h4 class="text-light text-center text- border py-2">TOTAL AMOUNT INVESTED:</h4>   
      </div>
    
     
      <div class='col-md-6 mt-3 mb-1'>
                      <h4 class='text-light text-center text- border py-2'><span></span>100000</h4> 
                   </div>
                  <div class='col-md-6 my-1'>
                     <h4 class='text-light text-center text- border py-2'>EXPECTED PROFIT</h4>
                 </div>
                <div class='col-md-6 my-1'>
                 <h4 class='text-light text-center text- border py-2'><span></span>15000</h4>
               </div>
               <div class='col-md-6 mt-1 mb-3'>
                 <h4 class='text-light text-center text- border py-2'>TOTAL AMOUNT TO WITHDRAW</h4>
               </div>
              <div class='col-md-6 mt-1 mb-3'><h4 class='text-light text-center text- border py-2'><span></span>10000</h4>
          
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
      <th scope="col">amount</th>
      <th scope="col">payment upload</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
      
      
    </tr>
  </thead>
  <tbody>
      <?php
         $i=1;
        $invest_get = "SELECT * FROM invest WHERE uname = '$uname'";
        $query_invest = mysqli_query($conn, $invest_get) ;
        $invest_row = mysqli_fetch_assoc($query_invest);
        while($invest_row){
           $id = $invest_row['invest_id'];
           $ref_no = $invest_row['ref_no'];
           $uname = $invest_row['uname'];
           $amount = $invest_row['amount'];
           $date = $invest_row['date'];
           $amt_status = $invest_row['amt_status'];
           $upload = $invest_row['upload'];
           $i++;
        
        echo"
        
            <tr>
              <th scope='row'>< $i</th>
              <td>< $ref_no</td>
              <td> $date</td>
              <td> $uname</td>
              <td> $amount</td>
              <td> $upload</td>
              <td> $amt_status</td>
            </tr>
        
        ";
        }
      ?>
    
    
   
  </tbody>
</table>
</div>
<?php
}
?>