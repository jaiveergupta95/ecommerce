<?php
include('db/connection.php');
 $id=$_GET['Catid']; 
  //primary ref id 

  ?>

  <Select id="id" name="SubCatId" required>

    <option value="">--Select location--</option>

  <?php

  

  $engQuery=mysqli_query($con,"select * from subcategory where CatgoyId = '$id'");

 while($Row=mysqli_fetch_array($engQuery))

 {

  

  ?>

  

  

  <option value="<?php echo $Row['SubCatgoyId']; ?>"><?php echo $Row['SubCategoryName']; ?></option>

  <?php } ?>

  </Select>

  