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
				Searched Product
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
                        if(isset($_GET['search'])){
							include("db/connection.php");
                            $search_query = $_GET['userquery'];
                            $getpro = "select * from product where ProductName LIKE '%$search_query%' || Productuname LIKE '%$search_query%'";
                            $runpro = mysqli_query($db, $getpro); 
                            while($row=mysqli_fetch_array($runpro)){
                                $proid = $row['ProcuctId'];
                                $catid = $row['CategoryId'];
						        $productna = $row['Productuname'];
                                $image = $row['Image1'];
                                $pricemrp = $row['ActualPrice'];
                                $pricedis = $row['SelllingPrice'];                                
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
												<span class="item_price">&#8377;<?php echo $pricemrp?></span>
												<del>&#8377;<?php echo $pricedis;?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="Samsung Galaxy J7" />
														<input type="hidden" name="amount" value="200.00" />
														<input type="hidden" name="discount_amount" value="1.00" />
														<input type="hidden" name="currency_code" value="USD" />
														<input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " />
														<input type="submit" name="submit" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
						</div> <?php } }?>
							
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