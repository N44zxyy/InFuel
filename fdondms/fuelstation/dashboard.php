
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{



  ?><!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Fuel Delivery Management System || Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="../vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  
</head>
<body>
  <div class="container-scroller">
   
    <?php include_once('includes/header.php');?>
  
    <div class="container-fluid page-body-wrapper">
     
      <?php include_once('includes/sidebar.php');?>
     
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <?php
$uid=$_SESSION['uid'];
$sql="SELECT FullName,Email from  tblfuelstation where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
              <h4 class="font-weight-bold text-dark">Hi, welcome back! <?php  echo $row->FullName;?></h4>
              <?php $cnt=$cnt+1;}} ?>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
              <div class="row flex-grow">
                <div class="col-sm-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                         <?php 
                         $ownerid=$_SESSION['uid'];
                        $sql1 ="SELECT * from  tblfuelstation join tblfuelstationowner on tblfuelstationowner.ID=tblfuelstation.OwnerID where tblfuelstation.OwnerID=:ownerid";
$query1 = $dbh -> prepare($sql1);
$query1->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totfs=$query1->rowCount();
?>
                          <h4 class="card-title">Total Fuelstation</h4>
                          <h4><?php echo htmlentities($totfs);?></h4>
                          <hr />
                           <a href="manage-fuel-station.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
                    </div>
              &nbsp;&nbsp;
                    <div class="card">
                     <div class="card-body">
                         <?php 
                          $ownerid=$_SESSION['uid'];
                        $sql2 ="SELECT * from  tblorderfuel  join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblorderfuel.Status is null and tblfuelstation.OwnerID=:ownerid";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$neworder=$query2->rowCount();
?>
                          <h4 class="card-title">New Fuel Order</h4>
                          <h4><?php echo htmlentities($neworder);?></h4>
                          <hr />
                           <a href="new-order.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
                    </div>
                    
        &nbsp;&nbsp;
            
                    <div class="card">
                     <div class="card-body">
                         <?php 
                          $ownerid=$_SESSION['uid'];
                        $sql3 ="SELECT * from  tblorderfuel  join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblorderfuel.Status='Confirmed' and tblfuelstation.OwnerID=:ownerid";
$query3 = $dbh -> prepare($sql3);
$query3->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$conorder=$query3->rowCount();
?>
                          <h4 class="card-title">Confirmed Order</h4>
                          <h4><?php echo htmlentities($conorder);?></h4>
                          <hr />
                           <a href="confirmed-order.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
                    </div>
                    
              &nbsp;&nbsp;
                    <div class="card" style="border: red solid 1px;">
                      <div class="card-body" >
                         <?php 
                          $ownerid=$_SESSION['uid'];
                        $sql4 ="SELECT * from  tblorderfuel  join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblorderfuel.Status='Cancelled' and tblfuelstation.OwnerID=:ownerid";
$query4 = $dbh -> prepare($sql4);
$query4->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$canorder=$query4->rowCount();
?>
                          <h4 class="card-title" style="color:red">Cancelled Order</h4>
                          <h4 style="color:red"><?php echo htmlentities($canorder);?></h4>
                          <hr />
                           <a href="fuel-order-cancelled.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
                    </div>
                    
                </div>
               

                <div class="col-sm-12 grid-margin stretch-card" >
                    <div class="card" style="border: blue 1px solid;">
                      <div class="card-body">
                        <?php 
                          $ownerid=$_SESSION['uid'];
                        $sql5 ="SELECT * from  tblorderfuel  join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblorderfuel.Status='On The Way' and tblfuelstation.OwnerID=:ownerid";
$query5 = $dbh -> prepare($sql5);
$query5->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$otworder=$query5->rowCount();
?>
                          <h4 class="card-title" style="color:blue">Delivery Boy On The Way</h4>
                          <h4 style="color:blue"><?php echo htmlentities($otworder);?></h4>
                          <hr />
                           <a href="ontheway-order.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
                    </div>&nbsp;&nbsp;&nbsp;

                    <div class="card" style="border: green solid 1px;">
                      <div class="card-body">
                        <?php 
                          $ownerid=$_SESSION['uid'];
                        $sql6 ="SELECT * from  tblorderfuel  join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblorderfuel.Status='Delivered' and tblfuelstation.OwnerID=:ownerid";
$query6 = $dbh -> prepare($sql6);
$query6->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$delorder=$query6->rowCount();
?>
                          <h4 class="card-title" style="color:green">Order Delivered</h4>
                          <h4 style="color:green"><?php echo htmlentities($delorder);?></h4>
                          <hr />
                           <a href="fuel-delivered.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
                    </div>
                    
              &nbsp;&nbsp;&nbsp;

                    <div class="card">
                      <div class="card-body">
                        <?php 
                          $ownerid=$_SESSION['uid'];
                        $sql6 ="SELECT * from  tblorderfuel  join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where  tblfuelstation.OwnerID=:ownerid";
$query6 = $dbh -> prepare($sql6);
$query6->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$delorder=$query6->rowCount();
?>
                          <h4 class="card-title">All Orders </h4>
                          <h4><?php echo htmlentities($delorder);?></h4>
                          <hr />
                           <a href="all-fuel-order.php"><h5 class="text-dark font-weight-bold mb-2">View Detail</h5></a>
                          
                      </div>
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
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html><?php } ?>

