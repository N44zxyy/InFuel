<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <?php
$aid=$_SESSION['hlmsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <div class="user-image">
            <img src="images/faces/face28.png">
          </div>
          <div class="user-name">
              <?php  echo $row->AdminName;?>
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
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">State</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-state.php">Add State</a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-state.php">Manage State</a></li>
               
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">City</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-city.php">Add City</a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-city.php">Manage City</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Fuel Price</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-fuelprice.php">Add Fuel Price</a></li>
                <li class="nav-item"> <a class="nav-link" href="manage-fuelprice.php">Manage Fuel Price</a></li>
                
              </ul>
            </div>
          </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="about-us.php"> About Us </a></li>
                <li class="nav-item"> <a class="nav-link" href="contact-us.php"> Contact Us </a></li>
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
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">Enquiry</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="unread-enquiry.php">Unread Enquiry</a></li>
                <li class="nav-item"> <a class="nav-link" href="read-enquiry.php">Read Enquiry</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search.php">
              <i class="icon-search"></i>
              <span class="menu-title" style="padding-left: 25px;">Search</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reg-users.php">
              <i class="icon-head"></i>
              <span class="menu-title" style="padding-left: 25px;">Reg Users</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="reg-fuelstationowner.php">
              <i class="icon-head"></i>
              <span class="menu-title" style="padding-left: 25px;">Reg Fuel Station Owner</span>
            </a>
          </li>
        </ul>
      </nav>