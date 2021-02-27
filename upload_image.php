<?php
    $host="sql300.epizy.com";
    $dbUsername="epiz_25969122";
    $dbPassword="APE2E0ezRBDK";
    $dbName="epiz_25969122_cloudfurniture";
    //creat connection
        
  if(isset($_POST['upload'])){
      
        $conn= mysqli_connect($host, $dbUsername, $dbPassword, $dbName );
    
        $target = "image/".basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            
            $file = $_FILES['file'];
            $image = $_FILES['image']['name'];
            $text = $_POST['text'];
            $type = $_POST['type'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $msg="";
        if(!empty($file)||!empty($text)||!empty($type)||!empty(color)||!empty($price)){
            $sql = " INSERT INTO image (image, description, type, color, price) VALUES ('$image','$text', '$type','$color','$price');";
            mysqli_query($conn, $sql);
            
                echo "<script type='text/javascript'>alert('Uploading IS Done!You Can Add Another Image By Refreshing The Page ');</script>";
                }else{
                    echo "<script type='text/javascript'>alert('All Fields Are Required');</script>";
                }
  }
   
?>

<!DOCTYPE html>
<html>
<head>
    <title> Upload Images</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="Keywords" content="Furniturs">
    <meta name="Description" content="Sell Your Furnitures Now!"/>
    <link type="text/css" rel="stylesheet" href="../css/signUp.css"/>
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <link type="text/css" rel="stylesheet" href="../css/css.css"/>
    <style>
        body{ margin: 0;
              background-size: cover;
        }
        #uploadInf{
            
            margin: 0;
            padding: 0;
            position: absolute;
            left: 6%;right: 6%;
        }
        
        .choices{
            font-size: 1.5vw;
            font-weight: 500;
            
        }
        #texte{
            display: inline;
        }
        .click_up{color:white; font-weight: 600; background-color: rgb(14,7,68); text-align: left;font-size: 1.5vw;padding: 3px;border-radius: 2px;   
        }
        .click_up :hover{
            color:white; font-weight: 600; background-color: rgb(200,20,60); text-align: left;
        }
        .click{color:white; font-weight: 600; background-color: rgb(14,7,68); text-align: center;font-size: 1.5vw;padding: 3px;border-radius: 2px;}
        .click:hover{color:white; font-weight: 600; background-color: rgb(200,20,60); text-align: center;}
        
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        body {margin-bottom: 2%;}
        
        #navbar{border-bottom: 1px solid rgb(200,20,60);
            padding-left: 3.5vw;
        }
    </style>
</head>
    
<body>

<div id="navbar">
  <a  href="index.html" >Home &nbsp;</a>
  <a href="furniture.html" >Furniture&nbsp;</a>
  <a href="kids.html" >Kids &nbsp;</a>
  <a href="search.php">Search&nbsp;</a>
  <a href="review.html">Reviews&nbsp;</a>
  <a href="contactUs.html">Contact Us&nbsp;</a>
  <a href="Cart.php" >Shopping Cart &nbsp;</a>
  <a href="upload_image.php" class="active" >Upload Image &nbsp;</a>
</div>
    
<form method="post" action="upload_image.php" enctype="multipart/form-data">  
   <table id="uploadInf"  align="center" cellpadding="10">
       <caption><h3 style="color:rgb(14,7,68);text-align: center; ">Congratulations! You are on the right way to sell your furniture.<span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';">Describe it now</span></h3></caption>
       <tr>
          <td>
            <div id="content">
                <input type="hidden" name="size" value="10000000"/>
                <div class="click_up">
                    <input type="file" name="image" required/>
           
                </div>
                <div>
                    <textarea name="text" cols="70" rows="4" placeholder="Say Something about the image of your furniture ...." required></textarea>
                </div>
        
            <?php
                $conn= mysqli_connect($host, $dbUsername, $dbPassword, $dbName );
                $sql = "SELECT * FROM image WHERE image='$image' AND description='$text';";
                $result =mysqli_query($conn, $sql);
      
            while($row = mysqli_fetch_array($result)){
                echo "<div id='img_div' >";
                echo "<img src='image/".$row ['image']."'width='300' height='200'>";
                echo "<form id='texte'> <textarea name='text' cols='25' rows='13' placeholder='preview to the description of your photos. Please make it brief and clear'>";
            
                echo "".$row['description'].",&ensp;Type:".$row['type'].",&ensp;Color:".$row['color'].",&ensp;Price:".$row['price']."</textarea></form>";
            echo "</div>";
            }
           ?>
        </div>
      </td>
           
    <td>
      <h4>What Is The Type Of Your Furniture?</h4><div class="choices">
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"> <input type="radio" name="type" value="Living Room" required >Living Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="type" value="Dining Room" required >Dining Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="type" value="Bed" required >Bed Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="type" value="Home Office" required >Home Office.</span></div><br/>
       <div class="choices">
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"> <input type="radio" name="type" value="Kids Bed Room" required >Kids Bed Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="type" value="Nursery" required >Nursery.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="type" value="Playroom" required >Playroom.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="type" value="Storage" required >Storage.</span></div>
      <h4>What IS The Color Type of Your Furniture?</h4> <div class="choices">
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="color" value="colorful" required > Colorful.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="radio" name="color" value="classic" required >Classic Colors.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"> <input type="radio" name="color" value="modern" required >Modern Colors.</span></div>
       <h4 >How Much Is it??</h4> 
            <input type="number" name="price" id="price" placeholder="please,write price here in SYP ... " size=40 required>
        
    
    </td>
  </tr>
       
  <tr>
    <td colspan="2" align="center">
        <input type="reset" value="Reset" class="click"/>
          <input type="submit" value="Upload" name="upload" class="click" />
    </td>
  </tr>
      
</table>
</form> 
    
        
    </body>
</html>