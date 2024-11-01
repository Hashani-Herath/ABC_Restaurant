<?php
session_start();
@include 'config.php';
require_once 'frame.php';



$sql = "SELECT * FROM item";
$data = mysqli_query($conn,$sql);
?>

<style>
    *{
    }

    
    
       .header{
        opacity: 1;
       }

      

       .footer{
        display:none;
       }
       .inside{
        position:absolute;;
        left:0;
        right:0;
        display:flex;
        flex-direction:column;
        align-items: center;
        justify-content: center;
        text-align:center;
        z-index: -1;



       }
       .item{
        display:inline-grid;
        grid-template-columns:auto auto auto;
        gap:10px;
        margin-top:110px;
        margin-bottom: 20px;

       }

      
       
       .image{
        margin:10px;
        padding:10px;
        opacity:0.8;

       }
        
       .footer1{
        grid-area:footer;
        width: 100%;
        text-align: center;
        justify-content: center;
        background: linear-gradient(to bottom, #ccff66 0%, #ff9933 100%);;
        opacity:1;
       }

       .nav2 span{
            display:none;
        }
        

       @media only screen and (max-width: 768px) {
            .item{
                grid-template-columns:auto auto;
            }
       }

       @media only screen and (max-width: 576px) {
            .item{
                grid-template-columns:auto;
            }
       }


        

        

</style>






<div class="inside">
<div class="item">

<?php while($row = mysqli_fetch_assoc($data)):?>
        <div class="image">
        <img src="<?php echo $row['image'];?>" style="width:250px; height:180px"  alt="">
         <div class="name">
            <h2><?php echo $row['item_name'];?></h2>
            <h2>LKR <?php echo $row['price'];?>.00</h2>
            <textarea style="font-size:20px;"><?php echo $row['description'];?></textarea>
         </div>
        </div>
<?php endwhile;?>
</div>





<footer class="footer1">
    <h2>COPYRIGHT &copy ABC ALL RIGHTS RESERVED</h2>
</footer>

</div>







