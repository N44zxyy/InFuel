<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{
  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Fuel Delivery Management System|| Between Dates Reports</title>
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
                  <h3>Between Dates Reports</h3>
                 <br>
                  <form class="forms-sample" method="post" action="between-date-reprtsdetails.php">
                    
                    <div class="form-group">
                      <label for="exampleInputName1">From Date:</label>
                       <input type="date" class="form-control" id="fromdate" name="fromdate" value="" required='true'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">To Date:</label>
                     <input type="date" class="form-control" id="todate" name="todate" value="" required='true'>
                    </div>
                   <div class="form-group">
                      <label for="exampleInputEmail3">Choose Fuel Station:</label>
                     <select class="form-control" id="fuelsta" name="fuelsta" value="" required='true' onChange="getCity(this.value);">
                         <option value="">Choose the Fuel Station</option>
                         <?php 
                         $ownerid=$_SESSION['uid'];
$sql2 = "SELECT tblfuelstation.ID,tblfuelstation.OwnerID,tblfuelstation.NameoffuelStation,tblfuelstationowner.FullName from   tblfuelstation join  tblfuelstationowner on tblfuelstationowner.ID=tblfuelstation.OwnerID where tblfuelstation.OwnerID=:ownerid";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row2)
{          
    ?>  
<option value="<?php echo htmlentities($row2->ID."$".$row2->NameoffuelStation);?>"><?php echo htmlentities($row2->NameoffuelStation);?></option>
 <?php } ?> 
                       </select>
                    </div>
                 <br>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                   
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
</body>

</html>
<?php }  ?>