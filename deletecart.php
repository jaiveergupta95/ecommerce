<?php
	if(!isset($_POST['btnnn'])){
		echo "";
	}else{
	$productiddss=$_POST['iddd'];
    include("db/connection.php");
	$qrryy="DELETE FROM `cart` WHERE `p_id`='$productiddss'";
    if($run=mysqli_query($db,$qrryy)){
		$back = $_SERVER['HTTP_REFERER'];
        echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
	}else{
		echo "error!";
	}
	
	}
	?>