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
require $nav; ?>


<?php
include("db/connection.php");
$subcn=$_GET['subname'];
$subbid=$_GET['subid'];
$subbiid=$_GET['catid'];
?>

<body>

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<?php 
					$quy="SELECT * FROM `category` WHERE `CatgoyId`='$subbiid'";
					$rrun=mysqli_query($db,$quy);
					$roww=mysqli_fetch_array($rrun);
					?>
					<li><?php echo $roww['CategoryName']; ?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				
				<span style="color:red; font-size:40px"><?php echo strtoupper($subcn);?></span>
				<span></span>
				<span></span></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
							<?php 
							$prorun = "select * from  product where SubCategoryId='$subbid' && Status='Enable'";
                            $run =mysqli_query($db,$prorun); 
							while($row = mysqli_fetch_array($run)){
                                 //echo $row['ActualPrice'];
								 $pricemrp = $row['ActualPrice'];
						         $divder=$pricemrp/100;
                                 $pricedis = $row['SelllingPrice'];  
						         $dis=($pricemrp-$pricedis)/$divder;
							       ?>
						
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">											
											<img src="adminn/productimage/<?php echo $row['Image1']; ?>" alt="" height="160 px" width="100 px">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.php?catnam=<?php echo $roww['CategoryName']; ?>&ppid=<?php echo $row['ProcuctId']; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.php?catnam=<?php echo $roww['CategoryName']; ?>&ppid=<?php echo $row['ProcuctId']; ?>"><?php echo $row['Productuname']; ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">&#8377;<?php echo $row['SelllingPrice']; ?></span>
												<del>&#8377;<?php echo $row['ActualPrice']; ?></del>
												<span class="item_price" style="font-size:14px"><?php echo $dis ;?>% off</span>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="" method="post">
													<fieldset>		
														<input type="hidden" name="proid" value="<?php echo $row['ProcuctId']; ?>" />
														<input type="submit" name="addcart" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>

										</div>
									</div>
								</div>
								</hr>
								
								<?php } ?>
							</div>
						</div>
						<!-- //first section -->
						
						
					</div>
				</div>
				<!-- //product left -->
				
			
			</div>
		</div>
	</div>
	<!-- //top products -->

	

		<?php include('includes/footer.php'); ?>