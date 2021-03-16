
<?php
$timezone = date_default_timezone_get();

date_default_timezone_set('$timezone');



    function getfname(){
        if((isset($_SESSION['uname']))&&(isset($_POST['invest']))){
            $uname = $_SESSION['uname'];
            $get_user = "SELECT * FROM user WHERE  uname='$uname'";
            $user_query= mysqli_query($conn,$get_user);
            while($row_user = mysqli_fetch_assoc($user_query)){
                        $fname = $row_user['fname'];
              return $fname;
          
            }
        }
        
    }
    
    function getinvest(){
            $invest_total = 0;
            //$invest_profit=0;
            //$invest_withdraw=0;
            $uname = $_SESSION['uname'];
            echo "<script> alert('$uname')</script>";
           $invest_select = "SELECT * FROM invest WHERE username = '$uname'";
           $invest_query = mysqli_query($conn, $invest_select);
           while($invest_row = mysqli_fetch_assoc($invest_query)){
               $sub_total= $invest_row['amount'];
               $sub_profit = $sub_total*0.5;
               $sub_total= $invest_row['invest_id'];
               $invest_num = mysqli_num_rows($invest_query);
               $invest_profit += $sub_profit;
               $invest_total += $sub_total;
                $invest_withdraw=$invest_total+$invest_profit;
           }
           echo $invest_total;
     }
               

?>