<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hlmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblcity where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage-city.php'</script>";     


}

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Fuel Delivery Management System||Manage City</title>
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
                  <h3 >Manage City</h3>
               
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                       <tr>
                                  <th>S.No</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Creation Date</th>
                                     <th>Action</th>
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        <tr class="table-info">
                           <?php
$sql="SELECT tblstate.ID as sid,tblstate.State,tblstate.CreationDate as scd,tblcity.CreationDate as ccd,tblcity.City,tblcity.ID as cid from tblstate join tblcity on tblstate.ID=tblcity.Stateid";
$query = $dbh -> prepare($sql);
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
                                        <td><?php  echo htmlentities($row->ccd);?></td>
                                        <td><a class="btn btn-sm btn-primary" href="edit-city.php?editid=<?php echo htmlentities ($row->cid);?>">Edit</a>  <a class="btn btn-sm btn-danger" href="manage-city.php?delid=<?php echo ($row->cid);?>"  onclick="return confirm('Do you really want to Delete ?');">Delete</a></td>
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