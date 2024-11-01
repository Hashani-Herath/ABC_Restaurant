<?php

@include 'config.php';
include_once 'frame.php';

session_start();

if(!isset($_SESSION['super_admin_name'])){
   header('location:login_form.php');
}

?>
<script>
if($_SESSION['visit'] > 1){
   document.QuerySelectorall(".h3").style.display = "none";
}

</script>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>super admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
 
    


</head>
<body>

<!-- profile details -->
<?php
$name = $_SESSION['super_admin_name'];
$sql = "SELECT name,email,mobile FROM users WHERE name = '$name';";
$result = mysqli_query($conn, $sql);
$details = mysqli_fetch_assoc($result);
?>


<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<div class="details" style="color:white">
    <div class='name'>
      <h1><?php echo $details['name'] ?></h1>
    </div>
    <div class='email'>
      <h1><?php echo $details['email'] ?></h1>
    </div>
    <div class='number'>
      <h1>+94 <?php echo $details['mobile'] ?></h1>
    </div>
</div>
</div>




   
<div class="container">

   <div class="content">
      <h3>hi, <span>Boss</span></h3>
      <h1>welcome <span><?php echo $_SESSION['super_admin_name'] ?></span></h1>
      <p>this is the super admin page</p>
      
      <a href="admin_registration.php" class="btn">Register an Admin</a>
      <a href="products.php" class="btn">view products</a>
      <a href="create.edit.delete.php" target="_blank" class="btn">Create/Edit Items</a>

</div>
</div>


</body>
<?php
$_SESSION['access'] = 'super_admin_page.php';
?>

</html>