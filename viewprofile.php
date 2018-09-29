<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
  $nav ='includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}

require 'includes/header.php';
require $nav; 
include("db/connection.php");
$idd=$_SESSION['id'];
$qry="select * from users where id='$idd'";
$run=mysqli_query($db,$qry);
$row=mysqli_fetch_array($run);

?>

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span></span>User
				<span></span>Profile
			</h3>
			<!-- //tittle heading -->
			<d
			<!-- form -->
				<div class="contact-grids1 w3agile-6" style="margin-left:350px">
					<div class="row">
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label">Email Id :-</label></b> &nbsp <?php echo $row['email'];?>						
						</div>						
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label">Full Name :-</label></b>&nbsp <?php echo $row['firstname']." ".$row['lastname'];?>	&nbsp <a href="changeprofile.php"style="font-size:13px">Edit</a>
						</div>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label">Address :-</label></b>&nbsp <?php echo $row['address'];?>	&nbsp <a href="changeprofile.php" style="font-size:13px">Edit</a>
						</div>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label">Country :-</label></b>&nbsp <?php echo $row['country'];?>&nbsp	<a href="changeprofile.php" style="font-size:13px">Edit</a>
						</div>&nbsp &nbsp 
						<a href="changepasword.php">Change Password</a>
					</div>
				</div>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->
 <?php require 'includes/footer.php'; ?>
