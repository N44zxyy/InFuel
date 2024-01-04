<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hlmsaid']==0)) {
  header('location:logout.php');
  } else{

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Fuel Delivery Management System || View Order Details</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
 <?php include_once('includes/header.php');?>
    <div class="container-fluid page-body-wrapper">
      
      <?php include_once('includes/sidebar.php');?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 >View Order Details</h3>
               
                  <div class="table-responsive pt-3">

                    <?php
                  $eid=$_GET['editid'];
$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.ID as orderid,tblstate.ID,tblstate.State,tblcity.ID,tblcity.City,tblcity.Stateid,tblfuelstation.ID,tblfuelstation.OwnerID,tblfuelstation.Stateid,tblfuelstation.Cityid,tblfuelstation.NameoffuelStation,tblfuelstation.LocationoffuelStation,tblfuelprice.ID,tblfuelprice.Typeoffuel as type,tblfuelprice.TodayFuelprice, tblorderfuel.ID,tblorderfuel.ordernum,tblorderfuel.UserID,tblorderfuel.Stateid,tblorderfuel.Cityid,tblorderfuel.fuelStationid,tblorderfuel.Typeoffuel,tblorderfuel.FuelPrice,tblorderfuel.Dateoffueldelivery,tblorderfuel.Timeoffueldeliver,tblorderfuel.Quantityoffuel,tblorderfuel.DeliveryAddress,tblorderfuel.ModeofPayment,tblorderfuel.OrderDate,tblorderfuel.Remark,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID join tblstate on tblstate.ID=tblorderfuel.Stateid join tblcity on tblcity.ID=tblorderfuel.Cityid join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid join tblfuelprice on tblfuelprice.ID=tblorderfuel.Typeoffuel  where tblorderfuel.ID=:eid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <table class="table table-bordered">
       
  <tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">
    Customer Details : (Order Number: <?php  echo $orderno=($row->ordernum);?>)</th>
  </tr>
  <tr>
    <th>Full Name</th>
    <td colspan="6"><?php  echo $row->FullName;?></td></tr>
      <tr>
     <th>Mobile Number</th>
    <td colspan="6"><?php  echo $row->MobileNumber;?></td></tr>
    <tr>
    <th>Email</th>
    <td colspan="6"><?php  echo $row->Email;?></td>
  </tr>
  <tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">
    Fuel Station Details</th>
  </tr>
   <tr>
    <th>Name of Fuel Station</th>
    <td><?php  echo $row->NameoffuelStation;?></td>
    <th>State of Fuel Station</th>
    <td colspan="4"><?php  echo $row->State;?></td>
    
  </tr>
  
  <tr>
    <th>City of Fuel Station</th>
    <td><?php  echo $row->City;?></td>
    <th >Address of Fuel Station</th>
     <td colspan="4"><?php  echo $row->LocationoffuelStation;?></td>
    
  </tr>

   <tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">
    Order Details</th>
  </tr>
  <tr>
    
    <th>Order Received State</th>
    <td><?php  echo $row->State;?></td>
    <th>Order Received City</th>
    <td><?php  echo $row->City;?></td>
    <th>Type of Fuel</th>
    <td><?php  echo $row->type;?></td>
  </tr>
 
  <tr>
    
    <th>Fuel Price</th>
    <td><?php  echo $row->FuelPrice;?></td>
    <th>Fuel Delivery Date</th>
    <td><?php  echo $row->Dateoffueldelivery;?></td>

    <th>Fuel Delivery Time</th>
    <td><?php  echo $row->Timeoffueldeliver;?></td>
  </tr>
  <tr>
    
    <th>Quantity of fuel(in ltr)</th>
    <td><?php  echo $row->Quantityoffuel;?></td>
    <th>Delivery Address</th>
    <td><?php  echo $row->DeliveryAddress;?></td>

    <th>Mode of Payment</th>
    <td><?php  echo $row->ModeofPayment;?></td>
  </tr>
  <tr>
   
    <th>Order Final Status</th>
   <td> <?php  $status=$row->Status;
    
if($row->Status=="Confirmed")
{
  echo "Your order has been confirmed";
}
if($row->Status=="On The Way")
{
  echo "Fuel Delivery Boy is on the way";
}
if($row->Status=="Delivered")
{
 echo "Fuel order has been delivered";
}
if($row->Status=="Cancelled")
{
 echo "Fuel order has been cancelled";
}

if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
    <th>Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td  colspan="4"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  
  <td colspan="4"><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>  

  </tr>
<?php 

if ($status=="Delivered"){
?> 
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Invoice History</th> 
  </tr>
  <tr>
    <th>#</th>
    <th>Order Quantity(in ltr)</th>
<th>Fuel Price(per ltr)</th>

<th>Total Price</th>


<tr>
  <td><?php echo $cnt;?></td>
  <td><?php  echo $qf=$row->Quantityoffuel;
?></td>
 <td>$<?php  echo $fp=$row->FuelPrice;?></td> 
   
   <td>$<?php  echo $gt= $fp*$qf;?></td> 
</tr>
</tr>
<tr><th>
  Grand Total
</th><td colspan="6" style="text-align: center;color: red">$<?php  echo $gt;?></td></tr>

</table><?php }?>
   
  <?php $cnt=$cnt+1;}} ?>
 

  
    
                                            
                                    </table>
                                     <?php 
$oid=$_GET['oid'];
   if($status!=""){
$ret="select tbltracking.Remark,tbltracking.Status,tbltracking.UpdationDate from tbltracking where tbltracking.OrderNumber =:oid";
$query = $dbh -> prepare($ret);
$query-> bindParam(':oid', $oid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" style="color: blue" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
foreach($results as $row)
{               ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row->Remark;?></td> 
  <td><?php  echo $row->Status;
?></td> 
   <td><?php  echo $row->UpdationDate;?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>

<?php  }  
?>
       
 </div>
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
<?php }  ?>