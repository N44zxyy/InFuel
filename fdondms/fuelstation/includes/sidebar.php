<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <?php
$uid=$_SESSION['uid'];
$sql="SELECT FullName,Email from  tblfuelstationowner where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <div class="user-image">
            <img src="../admin/images/faces/face28.png">
          </div>
          <div class="user-name">
              <?php  echo $row->FullName;?>
          </div>
          <div class="user-designation">
             <?php  echo $row->Email;?>
          </div>
        </div><?php $cnt=$cnt+1;}} ?>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class='fas fa-gas-pump'></i>
              <span class="menu-title" style="padding-left:20px;">Fuel Station</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-fuel-station.php">Add Fuel Station</a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-fuel-station.php">Manage Fuel Station</a></li>
               
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Order of Fuel</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="new-order.php">New Fuel Order</a></li>
                <li class="nav-item"> <a class="nav-link" href="confirmed-order.php">Confirmed Fuel Order</a></li>
                <li class="nav-item"> <a class="nav-link" href="ontheway-order.php">Delivery Boy On The Way</a></li>
                <li class="nav-item"> <a class="nav-link" href="fuel-delivered.php">Fuel Delivered</a></li>
                <li class="nav-item"> <a class="nav-link" href="fuel-order-cancelled.php">Order Cancelled</a></li>
                <li class="nav-item"> <a class="nav-link" href="all-fuel-order.php">All Fuel Order</a></li>
                
              </ul>
            </div>
          </li>
        
         
         
          <li class="nav-item">
            <a class="nav-link" href="between-dates-reports.php">
              <i class="icon-help menu-icon"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>
         
          
          <li class="nav-item">
            <a class="nav-link" href="search.php">
              <i class="icon-search"></i>
              <span class="menu-title" style="padding-left: 25px;">Search</span>
            </a>
          </li>
          
        </ul>
      </nav>

      <script src="../js/a076d05399.js"></script>