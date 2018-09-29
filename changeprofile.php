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
				<span></span>Profile
			</h3>
			<!-- //tittle heading -->
			<d
			<!-- form -->
				<div class="contact-grids1 w3agile-6" style="margin-left:350px">
					<div class="row">
					<form action="" method="post">
					<table align="center">
							<tr><th><b><label class="col-form-label">Email Id :-</label></b></th>  <td><?php echo $row['email'];?></td></tr>
							<tr><th><b><label class="col-form-label">First Name :-</label></b></th>  <td><input type="text" name="fname" value="<?php echo $row['firstname'];?>" />&nbsp <a href="#" style="font-size:15px; color:red">change</a></td></tr>
							<tr><th><b><label class="col-form-label">Last Name :-</label></b></th>  <td><input type="text" name="lasname" value="<?php echo $row['lastname'];?>" />&nbsp <a href="#" style="font-size:15px; color:red">change</a></td></tr>
							<tr><th><b><label class="col-form-label">Address:-</label></b></th>  <td><input type="text" name="add" value="<?php echo $row['address'];?>" />&nbsp <a href="#" style="font-size:15px; color:red">change</a></td></tr>
							<tr><th><b><label class="col-form-label">Country:-</label></b></th>  <td><input type="text" name="cont" value="<?php echo $row['country'];?>" />&nbsp <a href="#" style="font-size:15px; color:red">change</a></td></tr>
							
							<tr><td colspan="2"><input type="submit" value="Submit" name="btnn"></td></tr>
							
						
				    </table>
					</form>
					</div>
				</div>
			<!-- //form -->
		</div>
	</div>
	
	
	<?php
	if(!isset($_POST['btnn'])){?>
	
		<?php 	
	}else{
	$fname=$_POST['fname'];
	$lasname=$_POST['lasname'];
	$add=$_POST['add'];
	$cont=$_POST['cont'];
	include("db/connection.php");
	$qqry="update users set firstname='$fname',lastname='$lasname',address='$add',country='$cont' where id='$idd'";
    if($run=mysqli_query($db,$qqry)){
		?><script>
		alert('Profile has been changed successsfully!');
		window.open('viewprofile.php','_self');
		</script><?php
	}else{echo "quy errere";}	
	}
	?>
	<!-- //contact -->
 <?php require 'includes/footer.php'; ?>
