<!-- header-top -->
  <div class="header-top">
    <!-- container -->
    <div class="container">
      
      <div class="w3layouts-details">
        <ul>
          <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <li><a href="mailto:@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php  echo htmlentities($row->Email);?></a></li>
          <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php  echo htmlentities($row->MobileNumber);?></li><?php $cnt=$cnt+1;}} ?>
        </ul>
      </div>
      <div class="clearfix"> </div>
    </div>
    <!-- //container -->
  </div>
  <!-- //header-top -->
  <!-- header -->
  <div class="header">
    <!-- container -->
    <div class="container">
      <div class="header-bottom">
        <div class="w3ls-logo">
          <h1><a href="index.php">Fuel Delivery<span> Management System</span></a></h1>
        </div>
       
        <div class="clearfix"> </div>
      </div>
      <div class="top-nav">
        <nav class="navbar navbar-default">
          <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu           
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="home-icon"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
              <li><a href="index.php">Home</a></li>
            
              <li><a href="contact.php">Contact</a></li>
              <li><a href="admin/login.php">Admin</a></li>
              <li><a href="fuelstation/login.php">Fuel Station Owner</a></li>
              <li><a href="user/login.php">User</a></li>
              
            </ul> 
            <div class="clearfix"> </div>
          </div>  
        </nav>  
      </div>
    </div>
    <!-- //container -->
  </div>
  <!-- //header -->