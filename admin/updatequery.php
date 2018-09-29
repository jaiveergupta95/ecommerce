<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}
include('adminifo.php');				

include('header.php');
//include('titlehead.php');

?>
<div class="admintitle">

<h2 align="center"> Welcome to Admin Dashboard</h2>
<h5> <a style="float:right; margin-top:-90px; margin-right:30px; font-size:18px; color:#FFFFFF"href="logout.php">Log out</a></h5>
<h5> <a style="float:left; margin-top:-90px; margin-right:30px; font-size:18px; color:#FFFFFF"href="updateproduct.php">Back</a></h5>

</div>

<?php
if(isset($_POST['btnnn']))
{
include('db/connection.php');

$id=$_POST['hidden'];
$productid=$_POST['productid'];
$categoryid=$_POST['categoryid'];
$subcatid=$_POST['subcatid'];
$ProductNamejai=$_POST['ProductNamejai'];
$Productunameveer=$_POST['Productunameveer'];
$desciption=$_POST['desciption'];
$shoetdis=$_POST['shoetdis'];
$brandname=$_POST['brandname'];
$color=$_POST['color'];
$size=$_POST['size'];
$mrp=$_POST['mrp'];
$sellp=$_POST['sellp'];
$actpric=$_POST['actpric'];
$machprice=$_POST['machprice'];
$stattus=$_POST['stattus'];
//$qry="UPDATE `product` SET `CategoryId`='$categoryid' WHERE ProcuctId='$id'";
$qry="UPDATE `product` SET `CategoryId`='$categoryid',`SubCategoryId`='$subcatid',`ProductName`='$ProductNamejai',
`Productuname`='$Productunameveer',`Description`='$desciption',`ShortDescription`='$shoetdis',`BrandName`='$brandname',`Color`='$color',
`Size`='$size',`MRP`='$mrp',`SelllingPrice`='$sellp',`ActualPrice`='$actpric',`MarchantName`='$machprice',CreatedOn = NOW(),`Status`='$stattus' WHERE ProcuctId='$id'";


if($run=mysqli_query($con,$qry))
{	?>
	<script>
	alert('Data update sucessfully');
	window.open('updateform.php?sid=<?php echo $id;?>','_self'); 
	</script>
	<?php
}else
{
	echo "<script>alert('Error!')</script>";

}



}
?>
