<?php
include_once 'frame.php';
@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<!-- profile details -->
<?php
$name = $_SESSION['user_name'];
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
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      
      <a href="products.php" class="btn">view products</a>
   </div>

</div>

</body>


</html>