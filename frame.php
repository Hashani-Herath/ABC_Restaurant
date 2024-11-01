<?php
@include('config.php');

?>

<!-- style -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>


.header{
   position: fixed;
   top:0;
   left:0;
   display: flex;
   width: 100%;
   height: 100px;
   align-items: center;
   justify-content: center;
   background: linear-gradient(to bottom, #ccff66 0%, #ff9933 100%);
   opacity: 0.5;
}





.logo{
    display: flex;
    flex-direction:row;
    position: absolute;
    width: 100px;
    margin-bottom:5px;
    
    
}
.footer{
    position: fixed;
    display:flex;
    width: 100%;
    text-align: center;
    justify-content: center;
    background: linear-gradient(to bottom, #ccff66 0%, #ff9933 100%);;
    opacity: 0.6;
    font-weight: 600px;
    bottom:0;
    left:0;
}
.nav1{
  width:100%;
  height:50%;
  display:flex;
  align-items:center;
  justify-content:right;
  padding-right:20px;

}

.nav2{
    position:absolute;
    display:flex;
    flex-direction:row;
    gap:30px;

}

.nav2 span,.a{
  border:solid 1px black;
  padding:0 20px;
  color:white;
  opacity:1;
  background:crimson;

}

/* profile */



.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 100px;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 100px;
}



.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  left: 25px;
  font-size: 36px;
  margin-right: 50px;
  color:white;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}








</style>



</head>
<body>





<div class="header">
    <div class="logo">
        <img src="images/ABC.png" style="max-width: 100px" alt="">
    </div>
    <div class="nav1" >
    <div class="nav2" style='cursor:pointer; padding:0'>
    <span onclick="openNav()">Profile</span>
    <a href="logout.php" class="a" style='color:white' >logout</a>
</div>

    </div>
</div>



<footer class="footer">
    <h2>COPYRIGHT &copy ABC ALL RIGHTS RESERVED</h2>
</footer>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "500px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>




</body>








