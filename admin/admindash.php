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
?>
<div class="admintitle">
<h2 align="center"> Welcome to Admin Dashboard</h2>
<h5> <a style="float:right; margin-top:-90px; margin-right:30px; font-size:18px; color:#FFFFFF"href="../logout.php">Log out</a></h5>

</div>



<div class="jai">
<table width="50%" align="center" border="0"  style="font-size:20px; color:#000099; margin-left:460px ">
<tr>
	<td>1.</td><td><a href="addstudent.php">Add student Details</a></td>
</tr>
<tr>
	<td>2.</td><td><a href="updatestudent.php">Update/Delete student Details</a></td>
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


