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
foreach($results as $rw)
{               ?>
 <option value="<?php echo $rw->cid;?>"><?php echo $rw->City;?></option>
<?php }} ?>