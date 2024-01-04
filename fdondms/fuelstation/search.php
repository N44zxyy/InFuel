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
 
  <title>Fuel Delivery Management System||Search Fuel Order</title>
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
                 <h4>Search by Order No./Mobile No. </h4>
                 <br>
               <form id="basic-form" method="post">
                                <div class="form-group">
                                   
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Order No./Name/Mobile No."></div>
                                
                              
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>
                  <div class="table-responsive pt-3">
                      <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                    <table class="table table-bordered">
                      <thead>
                       <tr>
                                               <th>S.No</th>
                                        <th>Order Number</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                        <th>Action</th>
                                            </tr>
                      </thead>
                      <tbody>

                                              
                        <tr class="table-info">
                           <?php
                           $ownerid=$_SESSION['uid'];
$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email, tblorderfuel.ordernum,tblorderfuel.OrderDate,tblorderfuel.ID as orderid, tblorderfuel.UserID,tblorderfuel.Status from  tblorderfuel join tbluser on tbluser.ID= tblorderfuel.UserID
join tblfuelstation on tblfuelstation.ID=tblorderfuel.fuelStationid 
where tblfuelstation.OwnerID=:ownerid && tblorderfuel.ordernum like '$sdata%' || tbluser.MobileNumber like '$sdata%' || tbluser.FullName like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->bindParam(':ownerid',$ownerid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                         <td><?php echo htmlentities($cnt);?></td>
                                        <td><?php  echo htmlentities($row->ordernum);?></td>
                                        <td><?php  echo htmlentities($row->FullName);?></td>
                                        <td><?php  echo htmlentities($row->MobileNumber);?></td>
                                        <td><?php  echo htmlentities($row->Email);?></td>
                                             <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Status);?>
                  </td>
                  <?php } ?>         
                  <td><?php  echo htmlentities($row->OrderDate);?></td>
                 
                                        <td><a class="btn btn-sm btn-primary" href="view-order-detail.php?editid=<?php echo htmlentities ($row->orderid);?>&&oid=<?php echo htmlentities ($row->ordernum);?>">View</a></td>
                        </tr>
                       <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
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