<?php
if (isset($_POST['signup'])) {

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $imgname = $_FILES['img']['name'];
  $imgtempname=$_FILES['img']['tmp_name'];
  $country = $_POST['country'];

  $encryptedpass = md5($password);

//$imgname=$_FILES['img']['name'];
//$imgtempname=$_FILES['img']['tmp_name'];
//move_uploaded_file($imgtempname,"../adminimages/$imgname");
//move_uploaded_file($imgtempname,"userimage/$imagename");


  include ('db/connection.php');

  //connecting & inserting data

  $query = "INSERT INTO users(email,firstname,lastname,password,address,image,country,role) 
  VALUES ('$email','$firstname','$lastname','$encryptedpass','$address','$imgname','$country','client')";

   if ($jai=mysqli_query($db,$query)) {
	move_uploaded_file($imgtempname,"userimage/$imgname");

	
	?>
	<script>alert('signuped successfully ')</script>
	
	<?php     

     } else {
      ?>
	<script>alert(' hdhhfhhfhhfhfh hdhhddone')</script>
	<?php
 
 }
}

//forgot password
if (isset($_POST['sumbit'])) {

  $email = $_POST['emaillog'];
  $passwordoldd = $_POST['passwordold'];
  $passwordneww = $_POST['passwordnew'];
  $passworddbnew1 = $_POST['passworddbnew1'];
  
  $encryptedpass = md5($passwordoldd);
  $encryptedpnew = md5($passwordneww);

  include ('db/connection.php');
  
  $queryy = "UPDATE users SET password='$encryptedpnew' WHERE email='$email' AND password='$encryptedpass'";
  
   if (!($passwordneww==$passworddbnew1)) {
	?>
	<script>
	alert('please match up passwords');
	</script>
	<?php

    } else {
      $jaii=mysqli_query($db,$queryy);

     ?>
	<script>
	alert('password updated successfully');
    window.open('sign.php','_self');

	</script>
	<?php
     }

} 



?>
