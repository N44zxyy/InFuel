<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
 if(!empty($_POST['fid'])){
 $fid=$_POST['fid'];
$sql="SELECT TodayFuelprice from tblfuelprice  where ID=:fid";
$query = $dbh -> prepare($sql);
$query->bindParam(':fid',$fid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
?>
<?php
foreach($results as $rw)
{               ?>
 <option value="<?php echo $rw->TodayFuelprice;?>"><?php echo $rw->TodayFuelprice;?></option>
<?php }} ?>