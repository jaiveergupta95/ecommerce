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


if(isset($_GET['cart'])){
$ipaddress=$_GET['cart'];
include("db/connection.php");
$qry="SELECT * FROM `cart` WHERE `ip_add`='$ipaddress'";
$run=mysqli_query($db,$qry);
	

?>


	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span></span>Your
				<span></span>Carts
			</h3>
			<!-- //tittle heading -->
			<d
			<!-- form -->
				<div class="contact-grids1 w3agile-6" style="">
					<div class="row">
					<table  align="center">
					<tr>
					    <th><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Sr No</label>					
						</div>	</th>
						<th><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Item Name</label>					
						</div>	</th>					
						<th>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Category Name</label></b>
						</div></th>
						<th>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Price</label></b>
						</div></th>
						<th>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Quantity </label></b>
						</div></th>
						<th>
						<div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Total</label></b>
						</div></th><th><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label" style="color:red; font-size:18px">Remove</label></b>
						</div>
						</tr>
						<hr>
						<?php 
						$num=0;
						$tamount=0;
						while($row=mysqli_fetch_array($run)){
						$num++;
						$veer=$row['p_id']."<br>";	
						$qurry="SELECT * FROM `product` WHERE `ProcuctId`='$veer'";
						$runn=mysqli_query($db,$qurry);	
						$roww=mysqli_fetch_array($runn);
						$tamount+=$roww['SelllingPrice'];

						?>
						<tr>
						<td><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label"><?php echo $num; ?></label>					
						</div>	</td>
						<td><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label"><?php echo $roww['Productuname'];?></label>					
						</div>	</td>
						<td><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label"><?php echo $roww['ProductName'];?></label>					
						</div>	</td>
						<td><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label">&#8377; <?php echo $roww['SelllingPrice'];?></label>					
						</div>	</td>
						<td><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label"><?php echo 1; ?></label>					
						</div>	</td>
						<td><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<b><label class="col-form-label"> &#8377; <?php echo $roww['SelllingPrice']; ?></label>					
						</div>	</td>
						<td><a href="jai.php"><div class="col-md-12 col-sm-12 contact-form1 form-group">
							<form action="deletecart.php" method="post"><b><label class="col-form-label"> &nbsp &nbsp &nbsp  </label>
							<input type="hidden" name="iddd" value="<?php echo $roww['ProcuctId'];?>">
							<button type="submit" name="btnnn">X</button>
							</form>				
						</div></a>	</td>
						</tr>
						<?php }}?>
					 </table>
					
					</div>
					 <h4 style="float:right">Total Amount: &#8377;<?php echo $tamount; ?>&nbsp; &nbsp; &nbsp; <a href="#"><button type="button" class="btn btn-danger">CHECK OUT</button></a></h4>
				</div>
			<!-- //form -->
		</div>
	</div>
	
	<!-- //contact -->
 <?php require 'includes/footer.php'; ?>
