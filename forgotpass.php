<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}

elseif($_SESSION['logged_in'] == 'True') {
  header('Location: index.php');
}

else{
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}
error_reporting(0);

 require 'src/header.php';
 

 ?>

<p align="center" style="margin-top:50px"><a href="sign.php" style="color:red; font-size:20px">Back to Login</a></p>


<div class="container-fluid center-align sign">
  <div class="container">

  <div class="row">
    <div class="col s12">
       <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Forgot Password</a></li>
       </ul>
    </div>

<div class="container forms">
 <div class="row">


      <div id="test1" class="col s12 left-align">
     <?php require 'includes/signupconfirmation.php'; ?>

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
             <input id="icon_prefix" type="password" name="passwordold" class="validate">
             <label for="icon_prefix">Old Password</label>
           </div>
		   <div class="input-field col s12 meh">
             <i class="material-icons prefix">lock</i>
             <input id="icon_prefix" type="password" name="passwordnew" class="validate">
             <label for="icon_prefix">Enter New Password</label>
           </div>
		   <div class="input-field col s12 meh">
             <i class="material-icons prefix">lock</i>
             <input id="icon_prefix" type="password" name="passworddbnew1" class="validate">
             <label for="icon_prefix">Re-Enter New Password</label>
           </div>
           <?php //require 'includes/loginconfirmation.php';?>
               <div class="center-align">
                   <button type="submit" name="sumbit" class="btn button-rounded waves-effect waves-light ">Submit</button>
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


  <?php require 'src/footer.php'; ?>
