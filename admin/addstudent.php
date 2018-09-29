<?php
session_start();

if($_SESSION['uid'])
{	
	include('adminifo.php');				
}
else{
	header('location:../login.php');
}
?>


<?php

include('header.php');
include('titlehead.php');


?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">
<table width="70%" border="1" align="center" style="color:#FFFFFF; font-size:20px">
  <tr>
    <td>Roll no:</td>
    <td><input type="text" name="rollno" placeholder="Enter your Roll name" size="25" required></td>
  </tr>
  <tr>
    <td>Full name:</td>
    <td><input type="text" name="name" placeholder="Enter your Full name" size="25" required></td>
  </tr>
  <tr>
    <td>City:<d>
    <td><input type="text" name="city" placeholder="Enter your city name" size="25"  required></td>
  </tr>
  <tr>
    <td>Parants phone no:</td>
    <td><input type="text" name="pcon" placeholder="Enter your parants contect number" size="25" required></td>
  </tr>
  <tr>
    <td>Standerd:</td>
    <td><input type="number" name="std" placeholder="Enter standerd" size="25" required></td>
  </tr>
  <tr>
    <td>Image:</td>
    <td><input type="file" name="img" required></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn" value="submit"></td>
  </tr>
  <tr>
</table>

</form>
</body>
</html>


<?php
if(isset($_POST['btn']))
{

include('../dbcon.php');
$rollno=$_POST['rollno'];
$name=$_POST['name'];
$city=$_POST['city'];
$pcon=$_POST['pcon'];
$std=$_POST['std'];
$imgname=$_FILES['img']['name'];
$imgtempname=$_FILES['img']['tmp_name'];

move_uploaded_file($imgtempname,"../dataimages/$imgname");


$qry= "INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standerd`, `image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imgname')";

$run=mysqli_query($con,$qry);

if($run==true)
{
	echo "<script>alert('Data insert sucessfully')</script>";
}else
{
	echo "<script>alert('Error!')</script>";

}



}
?>
