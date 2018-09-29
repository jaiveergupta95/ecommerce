<form action="" method="post" enctype="multipart/form-data">
<h3><a href="../login.php">Back to Admin ligin</a></h3>
<h3>  </h3>
<h2 align="center"> Admin Register</h2>
<table width="70%" border="1" align="center">
  <tr>
    <th>Full Name</th>
    <td><input type="text" name="name" placeholder="Enter your Full name" size="25" requried></td>
  </tr>
  <tr>
    <th>Email Id/User Name</th>
    <td><input type="email" name="email" placeholder="Enter your Email Id" size="25" requried></td>
  </tr>
  <tr>
    <th>Phone No</th>
    <td><input type="number" name="num" placeholder="Enter your Phone number" requried></td>
  </tr>
  <tr>
    <th>Password:</th>
    <td><input type="password" name="pass" placeholder="Enter your password" size="25" requried></td>
  </tr>
  <tr>
    <th>Image:</th>
    <td><input type="file" name="img"></td>
  </tr>
  <tr>
    <th>Qulification</th>
    <td>
	<input type="checkbox" name="quli[]" value="Java" placeholder="Enter your Qulification">Java
	<input type="checkbox" name="quli[]" value="PHP"placeholder="Enter your Qulification">PHP
	</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btn" value="submit">  <input type="reset" name="reset" ></td>
  </tr>
  <tr>
</table>
<p><a href="forgotpass.php" style="margin-left:300px">Forgot password</a></p>
</form>


<?php

if(isset($_POST['btn']))
{
include('../dbcon.php');

$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$enc=md5($pass);
$phone=$_POST['num'];
$imgname=$_FILES['img']['name'];
$imgtempname=$_FILES['img']['tmp_name'];
if(empty($name)||empty($email)||empty($pass))
{
	echo "<script>alert('Please fill up field')</script>";
}else{

$file=explode(".",$imgname);
$ext=$file[1];
$allow=array("pdf","png","gif","mp4","jpg");

if(!in_array($ext,$allow))
{
	echo "<script>alert('plese enter right formate image')</script>";
}else{
$quli=$_POST['quli'];
$qu=implode(",",$quli);
$qry="INSERT INTO `admin`(`username`, `password`, `fullname`, `phoneno`, `image`, `quilification`) VALUES ('$email','$enc','$name','$phone','$imgname','$qu')";
$run=mysqli_query($con,$qry);
move_uploaded_file($imgtempname,"../adminimages/$imgname");
if(!($run==true))
{
	echo "<script>alert('error')</script>";
}else{
 ?>
 
 <script>
 alert('sucessfull');
 window.location="../login.php";
 </script>
 <?php
 
}
}
}
}

?>
