<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hlmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {

 $stateid=$_POST['stateid'];
$city=$_POST['city'];
$eid=$_GET['editid'];
$sql="update tblcity set Stateid=:stateid,City=:city where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':stateid',$stateid,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

 $query->execute();
         echo '<script>alert("City has been updated")</script>';
  
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Fuel Delivery Management System || Update City</title>
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
                  <h3>Update City</h3>
                 <br>
                  <form class="forms-sample" method="post">
                    <?php
                                $eid=$_GET['editid'];
$sql="SELECT tblstate.ID as sid,tblstate.State,tblstate.CreationDate as scd,tblcity.CreationDate as ccd,tblcity.City,tblcity.ID as cid from tblstate join tblcity on tblstate.ID=tblcity.Stateid where tblcity.ID =:eid";
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
                      <label for="exampleInputName1">State</label>
                       <select class="form-control" id="stateid" name="stateid" required='true'>
                         <option value="<?php echo htmlentities($row->Stateid);?>"><?php echo htmlentities($row->State);?></option>
                         <?php 

$sql2 = "SELECT * from   tblstate ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->State);?></option>
 <?php } ?> 
                       </select>
                    </div>
<div class="form-group">
                      <label for="exampleInputName1">City</label>
                       <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlentities($row->City);?>" required='true'>
                    </div>
                    <?php $cnt=$cnt+1;}} ?>
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
  <script src="../vendors/typeahead.../js/typeahead.bundle.min.js"></script>
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