<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}

$adminId =$_SESSION['id'];
include('db/connection.php');
$queryCat= mysqli_query($con,"select * from category where stattus='enable'");
if(isset($_POST['addproduct']))
{
$cname = $_POST['categoryName'];
$subcname = $_POST['SubCatId'];
$pname = $_POST['pname'];
$pcode = $_POST['pcode'];
$desc = $_POST['desc'];
$shortdesc = $_POST['shortdesc'];
$brandname = $_POST['brandname'];
$colorname = $_POST['colorname'];
$psize = $_POST['psize'];
$mrp = $_POST['mrp'];
$discount = $_POST['discount'];
$ap = $mrp+$mrp;
$sp = $ap-($ap*$discount/100);
//$new = $ap-$sp;
$marchname = $_POST['marchname'];
$img  = $_FILES['fimg'];
$fname = $img['name'];
$tname = $img['tmp_name'];
$fsize = $img['size'];
$ftype = $img['type'];	

$img1  = $_FILES['bimg'];
$fname1 = $img1['name'];
$tname1 = $img1['tmp_name'];
$fsize1 = $img1['size'];
$ftype1 = $img1['type'];	

$img2  = $_FILES['simg'];
$fname2 = $img2['name'];
$tname2 = $img2['tmp_name'];
$fsize2 = $img2['size'];
$ftype2 = $img2['type'];

$run="INSERT INTO `product`(`CategoryId`, `SubCategoryId`, `ProductName`, `Productuname`, `Description`, `ShortDescription`, `BrandName`,
 `Color`, `Size`, `MRP`, `SelllingPrice`, `ActualPrice`, `Image1`, `Image2`, `Image3`, `MarchantName`, `Status`, `CreatedOn`, `AdminId`) 
 VALUES ('$cname','$subcname','$pname','$pcode','$desc','$shortdesc','$brandname','$colorname','$psize','$mrp','$sp','$ap','$fname','$fname1','$fname2','$marchname','Enable',NOW(),'$adminId')";

if($exeCute = mysqli_query($con,$run))
{
   move_uploaded_file($tname,"productimage/$fname");
   move_uploaded_file($tname1,"productimage/$fname1");
   move_uploaded_file($tname2,"productimage/$fname2");

?>
<script>
alert("Product has been Uploded successfully ");
</script>
<?php }
else{ ?>
<script>
alert("Product Uploded Error");
</script>
<?php }
}
?>
<!DOCTYPE html>
<html>	
<head>
<title>Jaiveer gupta</title>
<link rel="icon" type="image" href="../images/jaiicon/android-icon-36x36.png" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

<!-----   Code For Dynamic Dropdown by Ajax Using Sub Category Start------>
<script src="js/pagechange.js"></script>
<!-----   Code For Dynamic Dropdown by Ajax Using Sub Category End------>
</head>
<body>
		<div class="containerw3layouts-agileits">
			<div class="w3layoutscontactagileits">
				
					<div id="wrapper">
							<form action="" name="register" method="post" enctype="multipart/form-data">
								<div id="login" class="animate w3layouts agileits form">
								<div class="ferry ferry-from">
										<label><h2>Insert Product !</h2></label>
								</div>
								<div class="ferry ferry-from">
										<label>Category Name :</label>
										<select name="categoryName" id="CatId" onChange="getBranch()" required>
											<option value="">Select Category</option>
											<?php while($fetchcat = mysqli_fetch_array($queryCat)){?>
											<option value="<?php echo $fetchcat['CatgoyId']; ?>"> <?php echo $fetchcat['CategoryName']; ?> </option>
											<?php } ?>
										</select>
									</div>
								<div class="ferry ferry-from">
								<div id="zonediv">
										<label>Subcategory Name :</label>
										<select name="categoryName" required>
											<option value="">Select Category</option>
										</select>
								</div>
									</div>
								<div class="ferry ferry-from">
										<label>Product Name :</label>
										<input type="text" name="pname" placeholder="Product Name" required>
							   </div>
							   <div class="ferry ferry-from">
										<label>Product Brand Name :</label>
										<input type="text" name="pcode" placeholder="Product Brand Name" required>
							   </div>
									<div class="ferry ferry-from">
										<label>Description :</label>
										<textarea name="desc" placeholder="Description...." required rows="5" cols="47"></textarea>
									</div>
									<div class="ferry ferry-from">
										<label>Short Description : </label>
										<textarea name="shortdesc" placeholder="Short Description..." required rows="5" cols="47"></textarea>
								  </div>
									<div class="ferry ferry-from">
										<label>Product Company : </label>
										<input type="text" name="brandname" placeholder="Product Company" required>
						    		</div>
									<div class="ferry ferry-from">
										<label>Color : </label>
										<input type="text" name="colorname" placeholder="Color Name" required>		<span id="mobile"></span>
									</div>
									<div class="ferry ferry-from">
										<label>Size :</label>
										<input type="text" name="psize" placeholder="Size...." required>
									</div>
									<div class="ferry ferry-from">
										<label>MRP(Marchant Price) :</label>
										<input type="number" name="mrp" placeholder="Price...." style="height:25px; width:100%" required>
										<span id="password"></span>
									</div>
									<div class="ferry ferry-from">
										<label>Discount : (User Price) :</label>
											<select name="discount">
												<option value="0">0%</option>
												<option value="5">5%</option>
												<option value="7">7%</option>
												<option value="10">10%</option>
												<option value="20">20%</option>
												<option value="25">25%</option>
												<option value="30">30%</option>
												<option value="35">35%</option>
												<option value="40">40%</option>
												<option value="50">50%</option>
											</select>
									</div>
									<div class="ferry ferry-from">
										<label>Front Image :</label>
										<input type="file" name="fimg" style="height:25px; width:100%" required>
									</div>
									<div class="ferry ferry-from">
										<label>Back Image :</label>
										<input type="file" name="bimg" style="height:25px; width:100%" required>
									</div>
									<div class="ferry ferry-from">
										<label>Side Image :</label>
										<input type="file" name="simg"  style="height:25px; width:100%" required>
									</div>
									<div class="ferry ferry-from">
										<label>Marchant Name :</label>
										<select name="marchname">
											<option value="">Select Marchant Name</option>
											<option value="Altos Enterprise Ltd">Altos Enterprise Ltd</option>
											<option value="Avon">Avon</option>
											<option value="Rocket Kommerce LLP"> Rocket Kommerce LLP </option>
											<option value="Deal Day">Deal Day </option>
										</select>
										
									</div>
									<div class="wthreesubmitaits">
									<br>
										<input type="submit" name="addproduct" value="Add Product">
									</div>
								</div>
								<a href="index.php">Back to admin </a>   
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