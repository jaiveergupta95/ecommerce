<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}
include('adminifo.php');				

include('header.php');
include('titlehead.php');

$idd=$_GET['sid'];
include('db/connection.php');
$qry1="SELECT * FROM `product` WHERE `ProcuctId`='$idd'";
$run1=mysqli_query($con,$qry1);
$data=mysqli_fetch_array($run1);
echo $data['Image1'];
unlink("productimage/".$data['Image1']);
unlink("productimage/".$data['Image2']);
unlink("productimage/".$data['Image3']);


$qry="DELETE FROM `product` WHERE `ProcuctId`='$idd'";

if($run=mysqli_query($con,$qry))
{
		?><script>alert('Deleted successfully done');
		window.open('updateproduct.php?sid=<?php echo $idd; ?>','_self');
		</script>
		<?php

}else
{
	echo "erorr!";
}

?>
