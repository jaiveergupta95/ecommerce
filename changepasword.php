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
				<span></span>Change 
				<span></span>Password
			</h3>
			<!-- //tittle heading -->
			<d
			<!-- form -->
				<div class="contact-grids1 w3agile-6" style="margin-left:350px">
					<div class="row">
						
						<div class="col-md-6 col-sm-6 contact-form1 ">
							<form method="post" action=""><h3>New Password</h3></br><input type="text" placeholder="********" name="pass" required />	<input type="submit" name="btn" />	</form>		
						</div>
						
						
						</form>	
					</div>
				</div>
			<!-- //form -->
		</div>
	</div>
	
	<?php
	if(!isset($_POST['btn'])){?>
	
		<?php 	
	}else{
	$passs=$_POST['pass'];
	$enctpt=md5($passs);
	
	include("db/connection.php");
	$qqry="update users set password='$enctpt' where id='$idd'";
    if($run=mysqli_query($db,$qqry)){
		?><script>alert('Password has been changed successsfully!')</script><?php
	}else{echo "quy errere";}	
	}
	?>
	<!-- //contact -->
 <?php require 'includes/footer.php'; ?>
