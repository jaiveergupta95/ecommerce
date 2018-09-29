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

<body>
	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span style="color:red; font-size:40px">Our New Products</span>
		   </h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<!---<h3 class="heading-tittle text-center font-italic">New Brand Mobiles</h3>--->
							<div class="row">
							<?php 
							include("db/connection.php");
							$qury = "select * from product order by RAND() LIMIT 0,9";
                            $run = mysqli_query($db, $qury); 
                            while($row=mysqli_fetch_array($run)){
                           $proid = $row['ProcuctId'];
                           $catid = $row['CategoryId'];
						   $productna = $row['Productuname'];
                           $image = $row['Image1'];
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
													<a href="single.php?catnam=<?php echo $row['Productuname']; ?>&ppid=<?php echo $row['ProcuctId']; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.php?catnam=<?php echo $row['Productuname']; ?>&ppid=<?php echo $row['ProcuctId']; ?>"><?php echo $productna;?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">&#8377;<?php echo $pricedis?></span>
												<del>&#8377;<?php echo $pricemrp;?></del>
												<span class="item_price" style="font-size:14px"><?php echo $dis;?>% off</span>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="index.php" method="post">
													<fieldset>		
														<input type="hidden" name="proid" value="<?php echo $row['ProcuctId']; ?>" />
														<input type="submit" name="addcart" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
							      </div> <?php } ?>
							
							</div>
						</div>
						<!-- //first section -->
					
					</div>
				</div>
				<!-- //product left -->

				
			
			</div>
		</div>
	</div>

	<?php include('includes/footer.php'); ?>