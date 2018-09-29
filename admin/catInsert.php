<?php
include('db/connection.php');
$name  = isset($_POST['name'])?$_POST['name']:null;
$userId  = isset($_POST['userId'])?$_POST['userId']:null;

if(isset($_POST['register']))
{
$name  = isset($_POST['name'])?$_POST['name']:null;
$userId  = isset($_POST['userId'])?$_POST['userId']:null;

$sql = "insert into category (CategoryName,Stattus,CreatedOn,AdminId) values('$name','enable',NOW(),$userId)";
$query = mysqli_query($con,$sql);
if($query)
{  ?>

<script>
alert('Category has been created successfully'); 
window.open('product.php','_self')
</script>
<?php }
else
{?>
<script>
alert('Category name already exist'); 
window.open('product.php','_self')
 </script>
<?php }
}
?>