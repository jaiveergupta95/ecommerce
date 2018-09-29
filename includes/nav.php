<?php include("db/connection.");?>

<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Follow Us On
						<a class="icon fb" href="https://www.facebook.com/profile.?id=100004192456779" style="color:white; margin-left:10px">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a class="icon fb" href="https://twitter.com/JaiveerGupta98" style="color:white; margin-left:10px">
							<i class="fab fa-twitter"></i>
						</a>
						<a class="icon fb" href=" https://plus.google.com/109168151451317096448  " style="color:white; margin-left:10px">
							<i class="fab fa-google-plus-g"></i>
						</a>
						<a class="icon fb" href="https://www.linkedin.com/in/jaiveer-gupta-5412b7169/" style="color:white; margin-left:10px">
							<i class="fab fa-linkedin-in"></i>
						</a>
						<a class="icon fb" href="https://in.pinterest.com/jaiveergupta/" style="color:white; margin-left:10px">
							<i class="fab fa-pinterest"></i>
						</a>
					</p>
				</div>
				
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
								<i class="fas fa-map-marker mr-2"></i>Select Location</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="contact." class="text-white">
								 Contect Us </a>
						</li>
						<li class="text-center border-right text-white">
							<a href="sign." class="text-white">
								 Log In </a>
						</li>
						<li class="text-center text-white">
							<a href="sign."  class="text-white">
								Register </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
<!----- cart session ---->
<? 
function getipadd() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function cart(){
    if(isset($_POST['addcart'])){
        include("db/connection.");
        $ip = getipadd();
        $prooid = $_POST['proid'];;
        $qqqry = "select * from cart where ip_add='$ip' AND p_id='$prooid'";
        $run= mysqli_query($db, $qqqry); 
        if(mysqli_num_rows($run) > 0){
            echo "<script>alert('already cart added')</script>";
        }else {
            $insertpcart = "insert into cart (p_id,ip_add) values ('$prooid','$ip')";
            $runn = mysqli_query($db, $insertpcart); 
			if($runn){
            echo "";
			}else{echo "<script>alert('query arror!')</script>";}
        }
    }
}
cart();

function totalcart(){
    if(isset($_GET['addcart'])){
        include("db/connection.");
        $ip = getipadd();
        $getcart = "select * from cart where ip_add='$ip'";
        $runnn = mysqli_query($db, $getcart);
        $row = mysqli_num_rows($runnn);
    }else{
        include("db/connection.");
        $ip = getipadd();
        $getcart = "select * from cart where ip_add='$ip'";
        $runnn = mysqli_query($db, $getcart);
        $cartrow = mysqli_num_rows($runnn);
    }
    echo $cartrow;
}  


?>
<!----- //cart end ---->


	<!-- Button trigger modal(select-location) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>
				<i class="fas fa-map-marker"></i> Please Select Your Location</h3>
			<select class="list_of_cities">
				
				<optgroup label="Alabama">
					<option>Birmingham</option>
					<option>Montgomery</option>
					<option>Mobile</option>
					<option>Huntsville</option>
					<option>Tuscaloosa</option>
				</optgroup>
				
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->

	
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1 class="text-center">
						<a href="index." class="font-weight-bold font-italic">
							<img src="images/logo2.png" alt=" " class="img-fluid" style="height:50px; width:50px; margin-top:20px">JAIVEER
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							
							<form class="form-inline" action="result." method="get">
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="userquery"required>
								<button class="btn my-2 my-sm-0" type="submit" name="search">Search</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="showcart." method="get" class="last">
									<input type="hidden" name="cart" value="<? echo getipadd()?>" />
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i><b style="font-size:22px; color:yellow; margin-right:20px"><? totalcart();?></b>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index."><b>Home</b>
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<? 
								$cat = "select * from  category where stattus='enable'";
								$run =mysqli_query($db,$cat);

								while($row = mysqli_fetch_array($run))
								{
								
						?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="jaiis." role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<? echo "<b>".$row['CategoryName']."</b>";?>
							</a>
							<div class="dropdown-menu">
								
									<div class="row">
										<div class="col-sm-12 multi-gd-img">
											<ul class="multi-column-dropdown">
											
											<?
											$subcat = "select * from  subcategory where CatgoyId = '".$row['CatgoyId']."'";
											$runsub = mysqli_query($db,$subcat);
											while($sub = mysqli_fetch_array($runsub)){
											?>
											
											    <li>
													<a href="product.?catid=<? echo $sub['CatgoyId'];?>&subname=<? echo $sub['SubCategoryName'];?>&subid=<? echo $sub['SubCatgoyId'];?>">&nbsp; &nbsp;&nbsp; <? echo $sub['SubCategoryName'] ;?></a>
												</li>
											<? } ?>
												
												
											</ul>
										</div>
										
										
									</div>
								
							</div>
						</li><? }?>
						
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->