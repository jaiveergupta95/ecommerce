<?php
include('db/connection.php');

if(isset($_POST['InsertCat']))
{
$CatId  = isset($_POST['Catname'])?$_POST['Catname']:null;
$name  = isset($_POST['subname'])?$_POST['subname']:null;
$userId  = isset($_POST['userId'])?$_POST['userId']:null;

$sql = "insert into subcategory values('','$name','enable',NOW(),'$userId','$CatId')";
$query = mysqli_query($con,$sql);
if($query)
{

?>
<script>
alert('Sub Category has been created successfully'); 
window.open('product.php','_self')
</script>
<?php }
else
{?>
<script>
alert('Sub Category name already exist'); 
window.open('product.php','_self')
 </script>
<?php }
}
?>