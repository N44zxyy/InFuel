<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <?php
$uid=$_SESSION['uuid'];
$sql="SELECT FullName,Email from  tbluser where ID=:uid";
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
            <a class="nav-link" href="order-fuel.php">
              <i class='fas fa-gas-pump'></i>
              <span class="menu-title" style="padding-left: 10px;">Order your fuel</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order-status.php">
             <i class="fa fa-file"></i>
              <span class="menu-title" style="padding-left: 10px;">Order Status</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="search.php">
              <i class="icon-search"></i>
              <span class="menu-title" style="padding-left: 10px;">Search</span>
            </a>
          </li>
          
        </ul>
      </nav>

      <script src="../js/a076d05399.js"></script>
