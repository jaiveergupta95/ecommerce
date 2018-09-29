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

//mail function

if(isset($_POST['btn']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
if(empty($name)||empty($email)||empty($subject)||empty($message))
	{
		echo "<script>alert('Please fill all fileld')</script>";
		
	}else{
		$to ="jaiveergupta95@gmail.com";
		$msg="Name:-"." ".$name."\n";
		$msg.="Email:-"." ".$email."\n";
		$msg.="Massage:-"." ".$message."\n";
		$header="From:-"." ".$email;
		if(mail($to,$subject,$msg,$header))
		{
		echo "<script>alert('Your mail has been sent')</script>";
		}else
		{
		echo "<script>alert('Try again later error!')</script>";
		}
	}

}


?>

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>ontact
				<span>U</span>s
			</h3>
			<!-- //tittle heading -->
			<div class="row contact-grids agile-1 mb-5">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Address</h4>
						<p>New Delhi
							<label>India</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Call Us</h4>
						<p>+91-7400232198
							<label>+91-8851588763</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
						<p>
							<a href="mailto:info@example.com">jaiveergupta95@gmail.com</a>
							<label>
								<a href="mailto:info@example.com">binod95@gmail.com</a>
							</label>
						</p>
					</div>
				</div>
			</div>
			<!-- form -->
			<form action="#" method="post">
				<div class="contact-grids1 w3agile-6">
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name" placeholder="" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">E-mail</label>
							<input type="email" class="form-control" name="email" placeholder="" required="">
						</div>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<label class="col-form-label">Subject</label>
							<input type="text" class="form-control" name="subject" placeholder="" required="">
						</div>
						
					</div>
					<div class=" animated wow slideInUp form-group">
						<label class="col-form-label">Message</label>
						<textarea name="message" class="form-control" placeholder="" required=""> </textarea>
					</div>
					<div class="contact-form">
						<input type="submit" value="Submit" name="btn">
					</div>
				</div>
			</form>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->
 <?php require 'includes/footer.php'; ?>
