<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}
include('adminifo.php');				


include('header.php');
include('titlehead.php');

?>

<form action="updateproduct.php" method="post">

<table style=" margin-top:10px" align="center" border="1">
  <tr>
    <th>Select Category Name</th>
    <td><select name="std" >
	<?php 
	include('db/connection.php');
	$squy="select * from category;";
	$srun=mysqli_query($con,$squy);
	?>
		<option value="">select any option</option>
		<?php 
		while($data = mysqli_fetch_array($srun)){
		?>
		<option value="<?php echo $data['CatgoyId']?>"><?php echo $data['CategoryName'];?></option> <?php }?>
		
	    </select>
		</td>
    <!--<th>Enter Product Name</th>
    <td><input type="text" name="name" placeholder="enter student name"  require></td>--->
	<th><input type="submit" name="btn" value="search"></th>
  </tr>
</table>

</form>
<h1 style="color:#FFFF00">
<table width="80%" style="color:black"align="center" border="1">
  <tr style=" font-size:18px; background:#000000; color:white">
    <th>Number</th>
	<th>Categry N</th>
    <th>Product Brand</th>
	<th>Description</th>
    <th>MRP</th>
    <th>Act Pr</th>
	<th>Sell Pr</th>
	<th>Image 1</th>
	<th>Marchant N</th>
	<th>Status</th>
	<th>Edit & Delete</th>
  </tr>

<?php
if(isset($_POST['btn']))
{
include('db/connection.php');

$stdd=$_POST['std'];
//$numm=$_POST['name'];
//$qry="SELECT * FROM `student` WHERE `standerd`='$std' AND `name` LIKE '%num%'";
$qry="SELECT * FROM product WHERE CategoryId='$stdd'";
$run=mysqli_query($con,$qry);

$row= mysqli_num_rows($run);
if(!($row>0))
{
echo "<script>alert('no recoad found')</script>";
}else{
$count=0;
while($data = mysqli_fetch_array($run)){
$count++;
?>
  <tr align="center">
    <td><?php echo $count; ?></td>
	<td><?php echo $data['ProductName']; ?></td>
	<td><?php echo $data['Productuname']; ?></td>
	<td><?php echo $data['Description']; ?></td>
	<td><?php echo $data['MRP']; ?></td>
	<td><?php echo $data['ActualPrice']; ?></td>
	<td><?php echo $data['SelllingPrice']; ?></td>
    <td><img style="height:50px; width:50px" src="productimage/<?php echo $data['Image1']; ?>" /></td>
    <td><?php echo $data['MarchantName']; ?></td>
    <td><?php echo $data['Status']; ?></td>
    <td><a href="updateform.php?sid=<?php echo $data['ProcuctId']; ?>&mai=<?php echo $data['Productuname']; ?>">Edit</a>&nbsp;&nbsp;<a href="deleteproduct.php?sid=<?php echo $data['ProcuctId']; ?>">Delete</a></td>
  </tr>

<?php	
}?>
</table>
<?php
}
}
?>

