  <!-- footer -->
  <div class="footer"> 
    <div class="container">
      <div class="footer-agileinfo">
        <div class="col-md-6 footer-right">
          <h5>Fuel Delivery Management System</h5>
          <?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          
          <div class="footer-right-map">
            <p style="color: white"><?php  echo htmlentities($row->PageDescription);?>.</p> <?php $cnt=$cnt+1;}} ?>
          </div>
        </div>
        <div class="col-md-6 footer-left"> 
          <div class="w3-agileitsicons">
            <h3 style="color: white;">Contact Us</h3> 
          </div>
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
          <div class="f-address">
            <p class="text"><?php  echo htmlentities($row->PageDescription);?></p>
            <p class="number">+<?php  echo htmlentities($row->MobileNumber);?></p><?php $cnt=$cnt+1;}} ?>
          </div>
          <div class="copyright">
            <p>© 2022 Fuel Delivery Management System </p>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div> 
  </div>
  <!-- //footer -->