<?php
include('db/connection.php');
$name  = isset($_POST['name'])?$_POST['name']:null;
$email  = isset($_POST['email'])?$_POST['email']:null;
$mobile  = isset($_POST['mobile'])?$_POST['mobile']:null;
$password  = isset($_POST['password'])?$_POST['password']:null;
$img  = isset($_FILES['img'])?$_FILES['img']:null;
$fname = $img['name'];
$tname = $img['tmp_name'];
$fsize = $img['size'];
$ftype = $img['type'];
if(isset($_POST['register']))
{
$enc = base64_encode($password); 
$url = "upload/";
$sql = "insert into register values('','$name','$email','$mobile','$fname','$enc',NOW(),'1')";
$query = mysqli_query($con,$sql);
if($query)
{
move_uploaded_file($tname,$url.$fname);
?>
<script>
alert('Register success'); 
window.location="login.php";
</script>
<?php }
else
{?>
<script>
alert('Email Id already registered'); 
window.location = 'index.html';
 </script>
<?php }
}
?>