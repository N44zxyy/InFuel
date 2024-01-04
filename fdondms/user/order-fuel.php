<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uuid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    $ordernum=mt_rand(100000000, 999999999);
    $uid=$_SESSION['uuid'];
 $stateid=$_POST['stateid'];
$city=$_POST['city'];
$afs=$_POST['afs'];
$tof=$_POST['tof'];
$fprice=$_POST['fprice'];
$dofd=$_POST['dofd'];
$tofd=$_POST['tofd'];
$qof=$_POST['qof'];
$fda=$_POST['fda'];
$mop=$_POST['mop'];
$sql="insert into tblorderfuel(ordernum,UserID,Stateid,Cityid,fuelStationid,Typeoffuel,FuelPrice,Dateoffueldelivery,Timeoffueldeliver,Quantityoffuel,DeliveryAddress,ModeofPayment)values(:ordernum,:uid,:stateid,:city,:afs,:tof,:fprice,:dofd,:tofd,:qof,:fda,:mop)";
$query=$dbh->prepare($sql);
$query->bindParam(':ordernum',$ordernum,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':stateid',$stateid,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':afs',$afs,PDO::PARAM_STR);
$query->bindParam(':tof',$tof,PDO::PARAM_STR);
$query->bindParam(':fprice',$fprice,PDO::PARAM_STR);
$query->bindParam(':dofd',$dofd,PDO::PARAM_STR);
$query->bindParam(':tofd',$tofd,PDO::PARAM_STR);
$query->bindParam(':qof',$qof,PDO::PARAM_STR);
$query->bindParam(':fda',$fda,PDO::PARAM_STR);
$query->bindParam(':mop',$mop,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
     echo '<script>alert("Your order has been sent successfully. Order Number is "+"'.$ordernum.'")</script>';
echo "<script>window.location.href ='order-fuel.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Fuel Delivery Management System || Order of fuel</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
<script>
function getCity(val) { 
    //alert(val);
  $.ajax({
type:"POST",
url:"get-city.php",
data:'cityid='+val,
success:function(data){
$("#city").html(data);
}});
}

function getAfs(val) { 
    //alert(val);
  $.ajax({
type:"POST",
url:"get-city.php",
data:'ctyid='+val,
success:function(data){
$("#afs").html(data);
}});
}

function getFprice(val) { 
    //alert(val);
  $.ajax({
type:"POST",
url:"get-price.php",
data:'fid='+val,
success:function(data){
$("#fprice").html(data);
}});
}
 </script>
</head>

<body>
  <div class="container-scroller">
  
    <?php include_once('includes/header.php');?>
    
    <div class="container-fluid page-body-wrapper">
   
     <?php include_once('includes/sidebar.php');?>
   
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Order Your Fuel</h3>
                 <br>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">State</label>
                       <select class="form-control" id="stateid" name="stateid" value="" required='true' onChange="getCity(this.value);">
                         <option value="">Choose the State</option>
                         <?php 
$sql2 = "SELECT * from   tblstate ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->State);?></option>
 <?php } ?> 
                       </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputName1">City</label>
                       <select class="form-control" id="city" name="city" value="" required='true' onChange="getAfs(this.value);">
                        <option value="">Select</option></select>
                    </div>
                 <br>
                 <div class="form-group">
                      <label for="exampleInputName1">Available Fuel Station</label>
                       <select class="form-control" id="afs" name="afs" value="" required='true'>
                        <option value="">Select</option></select>
                    </div>
                 <div class="form-group">
                      <label for="exampleInputName1">Type of Fuel</label>
                       <select class="form-control" id="tof" name="tof" onChange="getFprice(this.value);" required='true'>
                        <option value="">Choose Fuel Type</option>
                        <?php 
$sql2 = "SELECT * from   tblfuelprice ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->Typeoffuel);?></option>

 <?php } ?> 
                        
                      </select>
                    </div>

 <div class="form-group">
                      <label for="exampleInputName1">Price of Fuel(perlitre)</label>
                       <select class="form-control" id="fprice" name="fprice"  required='true'>
                        <option value=""></option>
 



                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Date of Delivery</label>
                       <input type="date" class="form-control" id="dofd" name="dofd" value="" required='true'>
                        
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Time of Delivery</label>
                       <input type="time" class="form-control" id="tofd" name="tofd" value="" required='true'>
                        
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Quantity of Fuel(in ltr)</label>
                       <input type="text" class="form-control" id="qof" name="qof"  pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
            title="This should be a number with up to 2 decimal places." required='true'>
                        
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Fuel Delivery Address</label>
                       <textarea class="form-control" id="fda" name="fda" value="" required='true'></textarea>
                    </div>
                 <br>
                 <div class="form-group">
                      <label for="exampleInputName1">Payment Mode</label>
                      <select class="form-control" id="mop" name="mop" value="" required='true'>
                        <option value="COD">COD</option>
                        <option value="UPI">UPI</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="Credit Card">Credit Card</option>
                      </select>
                    </div>
                 <br>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Order</button>
                   
                  </form>
                </div>
              </div>
            </div>
  
          
          </div>
        </div>
        <!-- content-wrapper ends -->
      <?php include_once('includes/footer.php');?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
  <script>
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
   // alert(maxDate);
    $('#dofd').attr('min', maxDate);
});
</script
</body>

</html>
<?php }  ?>