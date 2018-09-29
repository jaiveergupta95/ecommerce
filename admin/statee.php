<?php
include('db/productCon.php');
 $id=$_GET['countryid']; 
  //primary ref id 

  ?>

  <Select id="id" name="state"  >

    <option value="">--Select location--</option>

  <?php

  

  $engQuery=mysqli_query($con,"select * from subcategory where CatgoyId = '$id'");

 while($Row=mysqli_fetch_array($engQuery))

 {

  

  ?>

  

  

  <option value="<?php echo $Row['SubCatgoyId']; ?>"><?php echo $Row['SubCategoryName']; ?></option>

  <?php } ?>

  </Select>

  