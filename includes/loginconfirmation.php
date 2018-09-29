<?php

if (isset($_POST['login'])) {


$email = $_POST['emaillog'];
$password=md5($_POST['passworddb']);
include 'db/connection.php';
//$email=mysqli_real_escape_string($connection, $email);
$query = "SELECT * FROM users WHERE email='$email' && password = '$password'";
$selectquery = mysqli_query($db, $query);


if (!$selectquery) {
	?>
	<script>alert('faild query')</script>
	<?php
}
$row = mysqli_fetch_array($selectquery);

$user_id = $row['id'];
$user_email = $row['email'];
$user_password = $row['password'];
$user_firstname= $row['firstname'];
$user_lastname= $row['lastname'];
$user_address= $row['address'];
$user_image= $row['image'];
$user_country= $row['country'];
$user_role = $row['role'];

if ($email !== $user_email && $password !== $user_password) {
echo "<div class='center-align meh'>
  <h5 class='red-text'>Your username or password is wrong</h5>
</div>";
}



else{
  if($user_role == 'admin'){

    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['image'] = $user_image;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'admin';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=http://localhost/phpproject/jaiveer/adminn/index.php' />";
  }

    else {
    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['image'] = $user_image;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['logged_in']= 'True';
    $back = $_SERVER['HTTP_REFERER'];
    echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
    }
 }
}

?>
