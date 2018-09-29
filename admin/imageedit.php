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

$idd=$_GET['iddd'];
$qry= "SELECT * FROM `product` WHERE `ProcuctId`='$idd'";
$run=mysqli_query($con,$qry);
$data=mysqli_fetch_array($run);

?>

<form action="imagequery.php" method="post" enctype="multipart/form-data">
<table width="70%" border="1" align="center" style="color:black; font-size:20px">
 
  <tr>
    <td>Image1:</td>
    <td><img src="productimage/<?php echo $data['Image1']; ?>" height="50px" width="50px"><input type="file" name="img1" value="" required /></td>
  </tr>
  <tr>
    <td>Image2:</td>
    <td><img src="productimage/<?php echo $data['Image2']; ?>" height="50px" width="50px"><input type="file" name="img2" value="" required /></td>
  </tr>
  <tr>
    <td>Image3:</td>
    <td><img src="productimage/<?php echo $data['Image3']; ?>" height="50px" width="50px"><input type="file" name="img3" value=""required /></td>
  </tr>
  <tr>
  	<td><input type="hidden" name="hidden" value="<?php echo $idd;?>">
	<input type="hidden" name="hidden1" value="<?php echo $data['Image1'];?>">
	<input type="hidden" name="hidden2" value="<?php echo $data['Image2'];?>">
	<input type="hidden" name="hidden3" value="<?php echo $data['Image3'];?>"></td>
    <td align="left"><input type="submit" name="btnnn" value="submit"></td>
  </tr>
  <tr>
  
</table>




</form>

</body>
</html>





