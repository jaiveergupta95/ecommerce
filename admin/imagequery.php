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
$hidden1=$_POST['hidden1'];
$hidden2=$_POST['hidden2'];
$hidden3=$_POST['hidden3'];


//image1
$imgname1=$_FILES['img1']['name'];
$imgtempname1=$_FILES['img1']['tmp_name'];
unlink("productimage/$hidden1");
move_uploaded_file($imgtempname1,"productimage/$imgname1");

//image2
$imgname2=$_FILES['img2']['name'];
$imgtempname2=$_FILES['img2']['tmp_name'];
unlink("productimage/$hidden2");
move_uploaded_file($imgtempname2,"productimage/$imgname2");
//image3
$imgname3=$_FILES['img3']['name'];
$imgtempname3=$_FILES['img3']['tmp_name'];
unlink("productimage/$hidden3");
move_uploaded_file($imgtempname3,"productimage/$imgname3");


$qry="UPDATE `product` SET `Image1`='$imgname1',`Image2`='$imgname2',`Image3`='$imgname3' WHERE ProcuctId='$id'";

$run=mysqli_query($con,$qry);

if($run==true)
{	?>
	<script>
	alert('Images has beeen updateted sucessfully');
	window.open('imageedit.php?iddd=<?php echo $id;?>','_self');
	</script>
	<?php
}else
{
	echo "<script>alert('Error!')</script>";

}



}
?>
