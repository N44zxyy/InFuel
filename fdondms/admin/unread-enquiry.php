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
$sql="delete from tblcontact where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'unread-enquiry.php'</script>";     
}

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Fuel Delivery Management System||View Unread Enquiry</title>
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
                  <h3 >View Unread Enquiry</h3>
               
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                       <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date of Enquiry</th>
                                        <th>Action</th>
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        
                           <?php
$sql="SELECT * from  tblcontact where IsRead is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <tr class="table-info">
                         <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row->Name);?></td>
                                        <td><?php  echo htmlentities($row->Email);?></td>
                                        <td><?php  echo htmlentities($row->EnquiryDate);?></td>
                                        <td><a href="view-enquiry.php?viewid=<?php  echo htmlentities($row->ID);?>"><button class="btn btn-primary">View</button></i></a>

                                          <a class="btn btn-danger" href="unread-enquiry.php?delid=<?php echo ($row->ID);?>"  onclick="return confirm('Do you really want to Delete ?');">Delete</a>

                                        </td>
                        </tr>
                         <?php $cnt=$cnt+1;}} else{ ?>
                          <tr>
                            <td colspan="5" style="color:red;">No Records available.</td>
                          </tr>
                        <?php } ?>
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