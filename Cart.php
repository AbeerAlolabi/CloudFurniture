<?php
    session_start();
    $host="sql300.epizy.com";
    $dbUsername="epiz_25969122";
    $dbPassword="APE2E0ezRBDK";
    $dbName="epiz_25969122_cloudfurniture";
    //creat connection
 $conn= mysqli_connect($host, $dbUsername, $dbPassword, $dbName );
  

    
   
    #$con =$conn 
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link type="text/css" rel="stylesheet" href="../css/style.css"/>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
            font-size: 1vw;
        }
        .title2{
            text-align: center;
            color: rgb(200,20,60);
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: rgb(200,20,60);
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>
    <header>
</header>
<div id="navbar">
  <a  href="index.html" >Home &nbsp;</a>
  <a href="furniture.html">Furniture&nbsp;</a>
  <a href="kids.html">Kids &nbsp;</a>
  <a href="search.php">Search&nbsp;</a>
  <a href="review.html">Reviews&nbsp;</a>
  <a href="contactUs.html">Contact Us&nbsp;</a>
  <a href="" class="active"  >Shopping Cart</a>
  <a href="javascript:void(0)" onclick=" document.getElementById('loginFrame').style.visibility=('visible');">Log In&nbsp;</a></div>

   <form action="php/checking.php" id="loginFrame" >
      <table>
       <tr>
           <td><label name="email">UserName:</label><br/></td>
           <td><label name="Password">Password:</label><br/></td>
           <td ><input type="submit" value="submit" id="submit" style="font-size: 0px;visibility: hidden;width: 0px;"></td>
       </tr>
       <tr>
           <td><input type="email" id="email" size="18px" placeholder="example@example.com"></td>
            <td><input type="password" id="password" size="18px"></td>
        </tr>
        <tr><td colspan="2"><a href="signUp.html">Creat Account Now, It’s quick and easy.</a></td>
        </tr>
     </table>
    </form>
    <script>
        var Enter = document.getElementById("myInput");
        Enter.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("myBtn").click();
         }
        });
    </script>


    <div class="container" style="width: 65%">
        <h2>Shopping Cart</h2>
        <?php
            $query = "SELECT * FROM image ";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <?php echo "<img src='image/".$row ['image']."'class='img-responsive'>";?>
                                <h5 class="text-info"><?php echo $row["type"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["type"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="25%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="15%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>SYP <?php echo $value["product_price"]; ?></td>
                            <td>
                                 <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> SYP</td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right"> <?php echo number_format($total, 2); ?> SYP</th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
        <div style="clear: both"></div>
        <?php 

        $customer_name = $_POST['customer_name'];
        $customer_address = $_POST['customer_address'];
        $customer_phone = $_POST['customer_phone'];
        $gallery_city = $_POST['gallery_city'];
        $gallery_street = $_POST['gallery_street'];
        $gallery_phone = $_POST['gallery_phone'];
        $type = $value["item_name"];
        $price = $total;
        $order_date= $_POST['order_date'];
        if(isset($_POST['submit'])){
           $quary = " INSERT INTO oorder (customer_name, customer_address, customer_phone, gallery_city, gallery_street, gallery_phone, type, price, order_date) VALUES ('$customer_name','$customer_address', '$customer_phone','$gallery_city','$gallery_street', '$gallery_phone', '$type', '$price', '$order_date' );";
        }
        
            $rsult = mysqli_query($conn,$quary);
            #if(mysqli_num_rows($rsult) > 0) {
        ?>
        <h3 class="title2">Customer Information</h3>
        <div class="table-responsive" style="margin-bottom: 1%">
            <table class="table table-bordered">
            <tr>
                <th width="12%">customer_name</th>
                <th width="12%">customer_address</th>
                <th width="12%">customer_phone</th>
                <th width="13%">gallery_city</th>
                <th width="12%">gallery_street</th>
                <th width="12%">gallery_phone</th>
                <th width="13%">type</th>
                <th width="14%">price</th>
                
                </tr><style>img{background-color: }</style>

                <form action="Cart.php" method="post">
                        <tr>
                            <td><input type='text' name='customer_name' maxligth='20' placeholder='please, enter your name'/></td>
                            <td><input type='text' name='customer_address' maxlength="50" placeholder='please, enter your address'/> </td>
                            <td><input type='number' name='customer_phone' placeholder='09________'/> </td>
                            <td><select name="gallery_city"><option value="base" selected>Please Select</option><option value="Damascus">1_Damascus</option><option value="Homs">2_Homs</option><option value="Aleepo">3_Aleppo</option><option value="Latakia">4_Latakia</option><option value="Hama">5_Hama</option></select> </td>
                            
                            <td><select name="gallery_street"><option value="base" selected>Please Select</option><option value="Al-Abed Street">1_Al-Abed Street</option><option value="Al-Midan">2_Al-Midan</option><option value="Al-Qudsy Street">3_Al-Qudsy Street</option><option value="Haroun Roundabout">4_Haroun Roundabout</option><option value="comming soon">5_comming soon</option></select> </td>
                            
                            <td><select name="gallery_phone"><option value="base" selected>Please Select</option><option value="09912345632">1_ 09912345632</option><option value="0912677620">2_ 0912677620</option><option value="0944406207">3_ 944406207</option><option value="0994442036">4_  994442036</option><option value="0">-----</option></select> </td>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td>
                                 <?php echo $total ?> SYP</td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>
                            <th align="right"> <?php $total ?> SYP</th>
                    </tr><tr > <td colspan="5" style="border:none;"><p>The order will be ready in the selected Cloud Furniture gallery with in a week after the order's date.<br/> The order's data :<input type="date" name="order_date"/> </p></td>
                        </tr><tr><td colspan="5" style="font-size:20px;"><input type='submit' name='submit' value='confirm' size="70" class="btn btn-success"/></td></tr></form>
                <?php ?>      
            </table>
        </div>

    </div>
  <div style="align-content: center; text-align: center;border-top: 1px solid rgb(200,20,60); font-size: 2vw; color: rgb(14,7,68);"><a href="contactUs.html" style="text-decoration: none; color: inherit">
    <p style="display: inline-block"><img src="image/smallLocation.png" alt="locationIcon" class="smallIcon"/>Al-Abed Street Damascus, Syria&emsp;</p>
          <p style="display: inline-block"> <img src="image/smlallCallIcon.png" alt="callIcon" class="smallIcon"/>
          +963-991234567&emsp;</p>
          <p style="display: inline-block"><img src="image/smallEmail.png" alt="emailUs" class="smallIcon"/>cloudfurniture@outlook.com</p>
        </a></div>


</body>
</html>
    