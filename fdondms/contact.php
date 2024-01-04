<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
     
    $sql="insert into tblcontact(Name,Email,Message) values(:name,:email,:message)";
    $query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);

$query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Fuel Delivery Management System | Contact Page</title>

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
	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="contact-agileinfo">
				<h2 class="agileits-title">Contact</h2>
			</div> 
			<div class="agile-address">
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
				<div class="col-md-4 address-grids">
					<h4>Address :</h4>
					<ul>
						<li><p><?php  echo htmlentities($row->PageDescription);?></p>
						</li>
					</ul>
				</div>
				<div class="col-md-4 address-grids agileits">
					<h4>Phone :</h4>
					<p>+<?php  echo htmlentities($row->MobileNumber);?></p>
					
				</div>
				<div class="col-md-4 address-grids">
					<h4>Email :</h4>
					<p><?php  echo htmlentities($row->Email);?></p>
				</div>
				<div class="clearfix"> </div>
			</div><?php $cnt=$cnt+1;}} ?>
			<div class="contact-agileinfom">
				<h4>Miscellaneous Information:</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sheets containing Lorem Ipsum passages, 
					sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.It was popularised in the 1960s with the release of Letraset
					  and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			</div>	
			<div class="contact-form agileits-w3layouts">
				<h4>Contact Form</h4>
				<form action="#" method="post">
					<input type="text" placeholder="Name" required="" name="name">
					<input type="email" placeholder="Email" required="" name="email">
					
					<textarea placeholder="Message" required="" name="message"></textarea>
					<button class="btn1 btn-1 btn-1b w3-agile" name="submit">Submit</button>
				</form>
			</div>	
		</div>
	</div>
	<!-- //contact -->
	<!-- footer -->
	<?php include_once('includes/footer.php');?> 
	<!-- //footer -->
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