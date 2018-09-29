<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.';
}

elseif($_SESSION['logged_in'] == 'True') {
  header('Location: index.');
}

else{
  $nav ='includes/navconnected.';
  $idsess = $_SESSION['id'];
}
error_reporting(0);

 require 'src/header.';
 ?>

<p align="center" style="margin-top:50px"><a href="index." style="color:red; font-size:20px">Back to Home</a></p>

<div class="container-fluid center-align sign">
  <div class="container">

  <div class="row">
    <div class="col s12">
       <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Log In</a></li>
        <li class="tab col s3"><a  href="#test2">Sign Up</a></li>
       </ul>
   </div>

<div class="container forms">
 <div class="row">

<div id="test2" class="col s12 left-align">
     <div class="card">
       <div class="row">

    <form class="col s12" method="POST" enctype="multipart/form-data">
      <div class="row">

        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="email" name="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>

        <div class="input-field col s6">
          <select class="icons" name="country">
      <option value=""  disabled selected>Choose your country</option>
      <option value="India">India</option>
      <option value="Pakistan">Pakistan</option>
      <option value="srilanka">Sri Lanka</option>
    </select>
    <label>Country</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="firstname" class="validate" required>
          <label for="icon_prefix">First Name</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="lastname" class="validate" required>
          <label for="icon_prefix">Last Name</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="password" class="validate value1" required>
          <label for="icon_prefix">Password</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
          <label for="icon_prefix">Confirm Password</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">folder</i>
          <input id="icon_prefix" type="file" name="img" class="validate" required>
          <label for="icon_prefix"></label>
        </div>

        <div class="input-field col s6 meh">
          <i class="material-icons prefix">location_on</i>
          <input id="icon_prefix" type="text" name="address" class="validate" required>
          <label for="icon_prefix">Address</label>
        </div>
		


<? require 'includes/signupconfirmation.'; ?>

            <div class="center-align">
                <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">Sign up</button>
            </div>

            <p>By Registering, you agree that you've read and accepted our <a href="">User Agreement</a>,
              you're at least 18 years old, and you consent to our <a href="">Privacy Notice and receiving</a>
              marketing communications from us.</p>
      </div>
    </form>
  </div>
     </div>
     </div>
      <div id="test1" class="col s12 left-align">

        <div class="card">
          <div class="row">
       <form class="col s12" method="POST">

           <div class="input-field col s12">
             <i class="material-icons prefix">email</i>
			 
             <input id="icon_prefix" type="text" name="emaillog" class="validate" value=''>
             <label for="icon_prefix">Email</label>
           </div>
           <div class="input-field col s12 meh">
             <i class="material-icons prefix">lock</i>
             <input id="icon_prefix" type="password" name="passworddb" class="validate">
             <label for="icon_prefix">Password</label>
           </div>
		   <a href="forgotpass." style="color:Red">Forgot Password</a>
           <? require 'includes/loginconfirmation.';?>
               <div class="center-align">
                   <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Login</button>
               </div>

       </form>
	   
     </div>
        </div>

      </div>
      </div>
      </div>
   </div>
  </div>
</div>


  <? require 'src/footer.'; ?>
