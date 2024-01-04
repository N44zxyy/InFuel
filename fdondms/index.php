<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE HTML> 
<html lang="en">
<head>
<title>Fuel Delivery Management System || About Us Page</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css1/bootstrap.css" rel='stylesheet' type='text/css' />  
<link href="css1/style.css" rel='stylesheet' type='text/css' />
<link href="css1/font-awesome.css" rel="stylesheet"> 			<!-- font-awesome icons -->
<!-- //Custom Theme files -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<!-- //fonts -->
<!-- js -->
<script src="js1/jquery-1.11.1.min.js"> </script>	
<script src="js1/bootstrap.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>	 
<script src="js1/menu_jquery.js"></script> <!-- pop-up -->	
<!-- //js -->
</head>
<body>
	<?php include_once('includes/header.php');?> 
	<!-- about -->
	<div class="about">
		<div class="aboutw3-agileinfo">
			<!-- container -->
			<div class="container">
				<h2 class="agileits-title">About us</h2>
			</div>
			<!-- //container -->
		</div>
		<!-- about-bottom -->
		<div class="about-bottom">
			<!-- container -->
			<div class="container">
				<div class="about-agileinfo">
					<div class="col-md-6 about-w3grid">
						<img src="images1/s7.jpg" alt="" />
					</div>
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
					<div class="col-md-6 about-w3grid"> 
						
						<p><?php  echo htmlentities($row->PageDescription);?>.</p><?php $cnt=$cnt+1;}} ?>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- container -->
		</div>
		<!-- about-bottom -->
	z
	</div>
	<!-- //about -->
<?php include_once('includes/footer.php');?>
	<!-- smooth-scrolling-of-move-up --> 
	<script type="text/javascript" src="js1/move-top.js"></script>
	<script type="text/javascript" src="js1/easing.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script> 
	<!-- //smooth-scrolling-of-move-up -->
</body>
</html>