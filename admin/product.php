<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}

//error_reporting(0);
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html>	
<head>
<title>Jaiveer Gupta </title>
<link rel="icon" type="image" href="../images/jaiicon/android-icon-36x36.png" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
<script>
function validate()
{
if(document.register.name.value=='')
{
document.getElementById('name').innerHTML="Please Enter your name !"
document.register.name.focus();
return false;
}
re  =/^[A-Za-z\s]+$/i;
if(!re.test(document.register.name.value))
{
document.getElementById('name').innerHTML="Please enter only string !";
document.register.name.focus();
return false;
}
else{
document.getElementById('name').innerHTML="";
}
/*if(document.register.email.value=='')
{
document.getElementById('email').innerHTML="Please Enter your valid email id !";
document.register.email.focus();
return false;
}
re = /^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/
if(!re.test(document.register.email.value)){
document.getElementById('email').innerHTML="Please Enter your valid format of email(ie : demo@example.com)!"
document.register.email.focus();
return false;
}
else{
document.getElementById('email').innerHTML="";
}
if(document.register.mobile.value=='')
{
document.getElementById('mobile').innerHTML="Please Enter your mobile number ";
document.register.mobile.focus();
return false;
}
re=/^[6-9][0-9]{9}$/
if(!re.test(document.register.mobile.value))
{
document.getElementById('mobile').innerHTML="Please Enter your valid mobile number ";
document.register.mobile.focus();
return false;
}
else{
document.getElementById('mobile').innerHTML="";
}
if(document.register.img.value=='')
{
document.getElementById('img').innerHTML="Please choose an image !"
document.register.img.focus();
return false;
}
else{
document.getElementById('img').innerHTML="";
}
if(document.register.password.value=='')
{
document.getElementById('password').innerHTML="Please Enter your Secure password !"
document.register.password.focus();
return false;
}
re= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,16}$/
if(!re.test(document.register.password.value))
{
document.getElementById('password').innerHTML="Please Enter your Secure password(minimum 1 Capital alphabets, minimum 2 small alphabets, 3 digit and 1 special symbol)!"
document.register.password.focus();
return false;
}
else{
document.getElementById('password').innerHTML="";
}*/
}
</script>
</head>
<body>
		<div class="containerw3layouts-agileits">
			<div class="w3layoutscontactagileits">
				<div id="wrapper">
							<form action="" name="register" method="post" enctype="multipart/form-data">
								<div id="login" class="animate w3layouts agileits form">
									<div class="ferry ferry-from">
										<label><h2>Add Category</h2></label>
										
									</div>
									<div class="ferry ferry-from">
										<label>Category Name :</label>
										<input type="text" name="name" placeholder="Name" onChange="validate()" onclick="validate()">
										<span id="name"></span>
									</div>
									<div class="ferry ferry-from">										
										<input type="hidden" name="userId" value="<?php echo $id ?>" >
									</div>
									<?php require('catInsert.php');?>

									<div class="wthreesubmitaits">
									<br>
										<input type="submit" name="register" value="Insert Category" onclick="validate()">
									</div>
								</div>
								</form>
						</div>
			</div>
		</div><br/>
<?php 
include('db/connection.php');
$fetchcat = "select * from category where Stattus='enable'";
$runquery = mysqli_query($con,$fetchcat);
?>
		<div class="containerw3layouts-agileits">
			<div class="w3layoutscontactagileits">
				<div id="wrapper">
							<form action="subcatInsert.php" name="sub" method="post" enctype="multipart/form-data">
								<div id="login" class="animate w3layouts agileits form">
									<div class="ferry ferry-from">
										<label><h2>Add Sub Category</h2></label>
										
									</div>
									<div class="ferry ferry-from">
										<label>Category Name :</label>
										<select name="Catname" required>
											<option value="">Select Category</option>
											<?php 
											while($catname = mysqli_fetch_array($runquery))
											{
											?>
											
											<option value="<?php echo $catname['CatgoyId']; ?>"><?php echo $catname['CategoryName']; ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="ferry ferry-from">
										<label>Sub Category Name :</label>
										<input type="text" name="subname" placeholder="Sub Category Name" required>
									</div>
									<div class="ferry ferry-from">
										
										<input type="hidden" name="userId" value="<?php echo $id ?>" >
								
									</div>
									<div class="wthreesubmitaits">
									<br>
										<input type="submit" name="InsertCat" value="Insert Sub Category" onclick="validate()">
									</div>
								</div>
							<a href="index.php">Back to admin </a>    <a href="AddProduct.php" style="margin-left:200px">Add Product</a>
								</form>
						</div>
			</div>
		</div>

		<div class="w3lsfooteragileits">
			<p> &copy; 2018 Doctor Availability Form. All Rights Reserved | Design by <a href="http://w3layouts.com" target="=_blank">W3layouts</a></p>
		</div>
		<!-- Necessary-JavaScript-Files-&-Links -->
			<!-- Date-Picker-JavaScript -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script  src="js/jquery-ui.js"></script>	
<script  src="js/wickedpicker.js"></script>	

				<script type="text/javascript">
					$(function() {
						$( "#datepicker,#datepicker1,#datepicker2" ).datepicker();
					});
				</script>
				
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>

			<!-- //Date-Picker-JavaScript -->
		<!-- //Necessary-JavaScript-Files-&-Links -->
	

</body>
</html>