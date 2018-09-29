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
include('db/connection.php');

$idd=$_GET['sid'];
$qry= "SELECT * FROM `product` WHERE `ProcuctId`='$idd'";
$run=mysqli_query($con,$qry);
$data=mysqli_fetch_array($run);

?>

<form action="updatequery.php" method="post" enctype="multipart/form-data">
<table width="70%" border="1" align="center" style="color:black; font-size:20px">
  <tr>
    <td>Product Id:</td>
    <td><input type="number" name="productid" value="<?php echo $data['ProcuctId'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Category Id:</td>
    <td><input type="number" name="categoryid" value="<?php echo $data['CategoryId'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Sub Category Id:</td>
    <td><input type="number" name="subcatid" value="<?php echo $data['SubCategoryId'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Product Name:</td>
    <td><input type="text" name="ProductNamejai" value="<?php echo $data['ProductName'];?>" required ></td>
  </tr>
  <tr>
  <tr>
    <td>Brand Name:</td>
    <td><input type="text" name="Productunameveer" value="<?php echo $data['Productuname'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Description:</td>
    <td><input type="text" name="desciption" value="<?php echo $data['Description'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Short Description:</td>
    <td><input type="text" name="shoetdis" value="<?php echo $data['ShortDescription'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Branch Name:</td>
    <td><input type="text" name="brandname" value="<?php echo $data['BrandName'];?>" required></td>
  </tr>
  <tr>
  <tr>
    <td>Color:</td>
    <td><input type="text" name="color" value="<?php echo $data['Color'];?>" required></td>
  </tr>
  <tr>
    <td>Size:</td>
    <td><input type="text" name="size" value="<?php echo $data['Size'];?>" required></td>
  </tr>
  <tr>
    <td>MRP:<d>
    <td><input type="number" name="mrp" value="<?php echo $data['MRP'];?>" required></td>
  </tr>
  <tr>
    <td>Selling Price:</td>
    <td><input type="number" name="sellp" value="<?php echo $data['SelllingPrice'];?>" required></td>
  </tr>
  <tr>
    <td>Actual Price:</td>
    <td><input type="number" name="actpric" value="<?php echo $data['ActualPrice'];?>" required></td>
  </tr>
  <tr>
    <td>Images:</td>
    <td><a href="imageedit.php?iddd=<?php echo $idd?>">Images Edit</a></td>
  </tr>
  <!---<tr>
    <td>Image1:</td>
    <td><img src="productimage/<?php echo $data['Image1']; ?>" height="20px" width="20px"><input type="file" name="img1" value="" required /></td>
  </tr>
  <tr>
  <tr>
    <td>Image2:</td>
    <td><img src="productimage/<?php echo $data['Image2']; ?>" height="20px" width="20px"><input type="file" name="img2" value="" required /></td>
  </tr>
  <tr><tr>
    <td>Image3:</td>
    <td><img src="productimage/<?php echo $data['Image3']; ?>" height="20px" width="20px"><input type="file" name="img3" value=""required /></td>
  </tr>-->
  <tr>
    <td>Marchant name:</td>
    <td><input type="text" name="machprice" value="<?php echo $data['MarchantName'];?>" required></td>
  </tr>
  <tr>
    <td>Status:</td>
    <td><input type="text" name="stattus" value="<?php echo $data['Status'];?>" required></td>
  </tr>
  <tr>
  	<td><input type="hidden" name="hidden" value="<?php echo $idd;?>"></td>
    <td align="left"><input type="submit" name="btnnn" value="submit"></td>
  </tr>
  <tr>
</table>

</form>
</body>
</html>





