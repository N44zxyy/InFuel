<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hlmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {

 $tof=$_POST['tof'];
$tfp=$_POST['tfp'];
$eid=$_GET['editid'];
$sql="update tblfuelprice set Typeoffuel=:tof,TodayFuelprice=:tfp where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':tof',$tof,PDO::PARAM_STR);
$query->bindParam(':tfp',$tfp,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

 $query->execute();
         echo '<script>alert("Fuel details has been updated")</script>';
  
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Fuel Delivery Management System || Fuel details</title>
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
                  <h3>Fuel details</h3>
                 <br>
                  <form class="forms-sample" method="post">
                    <?php
                                $eid=$_GET['editid'];
$sql="SELECT * from tblfuelprice where ID =:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Type of Fuel</label>
                       <select class="form-control" id="tof" name="tof" value="" required='true'>
                        <option value="<?php  echo htmlentities($row->Typeoffuel);?>"><?php  echo htmlentities($row->Typeoffuel);?></option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Today Fuel Price</label>
                       <input type="text" class="form-control" id="tfp" name="tfp" value="<?php  echo htmlentities($row->TodayFuelprice);?>" required='true'>
                        
                    </div><?php $cnt=$cnt+1;}} ?>
                 <br>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                   
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