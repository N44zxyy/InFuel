<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
 if(!empty($_POST['cityid'])){
 $cid=$_POST['cityid'];
$sql="SELECT tblcity.ID as cid,tblcity.City from tblcity  where tblcity.Stateid=:cid";
$query = $dbh -> prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
?>
<option value="">Select City</option>
<?php
foreach($results as $rw)
{               ?>
 <option value="<?php echo $rw->cid;?>"><?php echo $rw->City;?></option>
<?php }}

 if(!empty($_POST['ctyid'])){
 $ctid=$_POST['ctyid'];
$sql="SELECT ID,NameoffuelStation,LocationoffuelStation from tblfuelstation  where tblfuelstation.Cityid=:ctid";
$query = $dbh -> prepare($sql);
$query->bindParam(':ctid',$ctid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); ?>
<option value="">Select Fuel Station</option>
<?php
foreach($results as $rw)
{               ?>
 <option value="<?php echo $rw->ID;?>"><?php echo $rw->NameoffuelStation;?> (<?php echo $rw->LocationoffuelStation;?>)</option>
<?php }} ?>