<?php
session_start();

require_once ('config.php');
include_once ('frame.php');

if(!isset($_SESSION['access'])){
    header('location:login_form.php');
}

// php for create

if(isset($_POST['submit1'])){
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    $select = "INSERT INTO item (item_name, price, description, image) VALUES('$item_name', '$price', '$description','menu/$image');";
    mysqli_query($conn, $select);

    $select ="INSERT INTO images (image) VALUES('$image');";
    mysqli_query($conn, $select);
    
}

// php for edit

if(isset($_POST['submit2'])){

    $update = $_POST['update'];
    $value = $_POST['value'];
    $item_name = $_POST['item_name'];

    $select = "UPDATE item SET $update = '$value' WHERE item_name = '$item_name' ;";
    mysqli_query($conn, $select);

}

// php for deletion
if(isset($_POST['submit3'])){


    $item_name = $_POST['item_name'];

    $select = "DELETE FROM item WHERE item_name = '$item_name'; ";
    mysqli_query($conn, $select);

}

// php for going back
if(isset($_POST['back'])){
    echo ("location:../products.php");
}





?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create/edit/delete</title>

     <!-- style -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        *{
            font-family: 'Poppins', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; border:none;
            text-decoration: none;
        }

        body{
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align: center;
        }    

        .form{
            display:flex;
            flex-direction:row;
            gap:40px;
            margin-top:110px;
            padding:20px;
            box-sizing: border-box;
        }

        .create_form{
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;

        }
        .create{
            display:inherit;
            border: solid 1px red;
            flex-direction:column;
            gap:10px;
            width:500px;
            height:40vh;
            margin:40px 20px;
            padding:10px 10px;
            box-sizing: border-box;
        }

        .edit_form{
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;

        }
        .edit{
            display:inherit;
            border: solid 1px red;
            flex-direction:column;
            gap:10px;
            width:500px;
            height:40vh;
            margin:40px 20px;
            padding:10px 10px;
            box-sizing: border-box;
        }

        .delete_form{
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;

        }
        .delete{
            display:inherit;
            border: solid 1px red;
            flex-direction:column;
            gap:10px;
            width:500px;
            height:40vh;
            margin:40px 20px;
            padding:10px 10px;
            box-sizing: border-box;
        }

        input{
            border: solid 1px green;
            height:50px;
            font-size:20px;
            text-align:center;
        }
        textarea{
            border: solid 1px green;
            height:50px;
            font-size:20px;
            text-align:center;
        }

        select{
            border: solid 1px green;
            height:50px;
            font-size:20px;
            text-align:center;
        }

        .delete_form input{
            font-size:20px;

        }

        .view{
            position:absolute;
            bottom:20px;
            display:flex;
            flex-direction: row;
            justify-content:center;
            gap:100px;
            padding:20px;
            margin-bottom:70px;
            height:10vh;
        }

        .view a{
            border: solid 1px red;
            height:4em;
            width:10em;
            align-items:center;
            justify-content:center;
            font-size:18px;

        }
        
        span.text{
            text-align:center;
            font-size: 25px;
        }

        .create input[type='submit']{
            position: relative;
            bottom: -10px;
        }
        .edit input[type='submit']{
            position: relative;
            bottom: -30px;
        }
        .delete input[type='text']{
            position: relative;
            bottom: -60px;
        }
        .delete input[type='submit']{
            position: relative;
            bottom: -180px;
        }

        .nav2 span{
            display:none;
        }

        @media only screen and (max-width: 768px) {
            .form{
                flex-direction:column;
                
            }

            .create_form{
                width:200px;
            }
            .edit_form{
                width:200px;

            }
            .delete_form{
                width:200px;
                margin-bottom:300px;
            }
       }

      
        


        
    </style>
    

    </head>

    <body>
    <div class='form'>

    <!-- form for create -->
    <div class="create_form">
        <form action="" method="POST" class="create">
            <h2>Add Items</h2>
            <input type="text" name ="item_name"placeholder="Enter the Item Name" required>
            <input type="num" name ="price"placeholder="Enter the Item Price" required>
            <textarea name ="description"placeholder="Enter the description" rows="3" cols="10" required></textarea>
            <input type="text" name ="image"placeholder="Enter the image Name With The Extension" required>

            <input type="submit" name ='submit1' value= 'Click' >
            </form>    
    </div>
    
    
    
    <!-- form for edit -->
    <div class="edit_form">
         <form action="" method="POST" class="edit">
            <h2>Edit Items</h2>
            <input type="text" name ="item_name"placeholder="Enter the Item Name" required>
            <div class="select">
                <label for="update"><span class='text'>Select items you want to update</span></label>
                <select name="update" id="update">
                  <option value="item_name">item_name</option>
                  <option value="price">price</option>
                  <option value="description">description</option>
                  <option value="image">image</option>
                </select>
            </div>
            <input type="text" name="value"  placeholder="Enter the new value" required>
            <input type="submit" name ='submit2' value= 'Click' > 
    
            </form> 
              
    </div>


      <!-- form for deletion -->
      <div class="delete_form">
      <form action="" method="POST" class="delete">
            <h2>Delete Items</h2>
            <input type="text" name ="item_name" placeholder="Enter the Item Name To Remove" required>
            <input type="submit" name ='submit3' value= 'Click' >
        </form>    

       

      </div>
    </div>

    <div class="view">
    <a href="products.php" class="btn"><span class="text">view products</span></a>
    <a href="<?php echo $_SESSION['access']?>" class="btn"><span class="text">Go Back</span></a>
    </div>
    </body>
    
    
    </html>
 