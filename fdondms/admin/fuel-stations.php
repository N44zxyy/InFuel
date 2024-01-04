<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hlmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Fuel Delivery Management System||Manage Fuel Station</title>
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
                  <h3 ><?php echo $_GET['username'];?>'s' Fuel Stations</h3>
               
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                       <tr>
                                  <th>S.No</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Name of Petrol Pump</th>
                                        <th>Location of Petrol Pump</th>
                                        <th>Creation Date</th>
                              
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        <tr class="table-info">
                           <?php
                           $uid=$_GET['fid'];
$sql="SELECT tblstate.ID as sid,tblstate.State,tblcity.ID as cid,tblcity.Stateid,tblcity.City,tblfuelstation.ID as fsid,tblfuelstation.OwnerID,tblfuelstation.Stateid as fssid,tblfuelstation.Cityid as fscid,tblfuelstation.NameoffuelStation,tblfuelstation.LocationoffuelStation,tblfuelstation.CreationDate from tblfuelstation join tblstate on tblstate.ID=tblfuelstation.Stateid join tblcity on tblcity.ID=tblfuelstation.Cityid where tblfuelstation.OwnerID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                         <td><?php echo htmlentities($cnt);?></td>
                                       
                                        <td><?php  echo htmlentities($row->State);?></td>
                                        <td><?php  echo htmlentities($row->City);?></td>
                                        <td><?php  echo htmlentities($row->NameoffuelStation);?></td>
                                        <td><?php  echo htmlentities($row->LocationoffuelStation);?></td>
                                        <td><?php  echo htmlentities($row->CreationDate);?></td>
                               
                        </tr>
                        <?php $cnt=$cnt+1;}} ?>
                      </tbody>
                    </table>
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
<?php } ?>