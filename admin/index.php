<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}
 require ('adminifo.php');

 ?>
 
 <?php
include('header.php');
?>
<div class="admintitle">
<h5> <a style="float:left; margin-top:1px; margin-left:30px; font-size:18px; color:#FFFFFF" href="../index.php">Home Page</a></h5>
<h2 align="center"> Welcome to Admin Dashboard</h2>
<h5> <a style="float:right; margin-top:-90px; margin-right:30px; font-size:18px; color:#FFFFFF" href="logout.php">Log out</a></h5>

</div>



<div class="jai">
<table width="50%" align="center" border="0"  style="font-size:20px; color:#000099; margin-left:460px ">
<tr>
	<td>1.</td><td><a href="product.php">Add Category and Subcategary</a></td>
</tr>

<tr>
	<td>2.</td><td><a href="Addproduct.php">Add product</a></td>
</tr><tr>
	<td>2.</td><td><a href="updateproduct.php">View Product,Edit and Delete</a></td>
</tr>
<?php
/*<tr>
	<td>3.</td><td><a href="deletestudent.php">Delete student Details</a></td>
</tr>*/
?>
</table>



</div>

</body>
</html>
 
