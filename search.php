<?php
    $host="sql300.epizy.com";
    $dbUsername="epiz_25969122";
    $dbPassword="APE2E0ezRBDK";
    $dbName="epiz_25969122_cloudfurniture";
    //creat connection
    $conn= mysqli_connect($host, $dbUsername, $dbPassword, $dbName );
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Search</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="Keywords" content="Furniturs">
    <meta name="Description" content="Sell Your Furnitures Now!"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    
    
    <style>
        .catigory{
        display: inline-block; float: left;
        margin: 0.5vw;padding:0.5vw;
        }
        .searchIcon{
        background-color: transparent;font-weight: 700;
        font-size: 1.5vw;
        vertical-align:middle;color:white;background-color: rgb(14,7,68);}
        #search_table{
            text-align: left;
            color:rgb(14,7,68);}
        .searchIcon:hover{
            text-align: left;
            background-color:rgb(200,20,60);}
     <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
      body{margin-bottom: 2%;}
    </style>
</head>
    
<body>
    <header>
</header>
<div id="navbar">
  <a  href="index.html" >Home &nbsp;</a>
  <a href="furniture.html" >Furniture&nbsp;</a>
  <a href="kids.html" >Kids &nbsp;</a>
  <a href="" class="active">Search&nbsp;</a>
  <a href="review.html">Reviews&nbsp;</a>
  <a href="contactUs.html">Contact Us&nbsp;</a>
  <a href="Cart.php" >Shopping Cart &nbsp;</a>
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

    
<div style="margin-left:5vw;margin-right:5vw;">    
<form action="search.php" method="post" enctype="multipart/form-data">
 <tabl id="search_table" align="center" width=100% cellspacing=23px cellpadding=10% >
    <caption><h3 style="color: rgb(200,20,60);border-bottom: 1px solid rgb(200,20,60);"> Let Us Help You To Make Search Faster And Easier, Please Answer Those Questions:</h3></caption>
       <tr><td><h4>What Is The Type Of The Furniture?</h4>
         <div class="choices">
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"> <input type="checkbox" name="list[]" value="Living Room"  >Bed Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="Dining Room"  >Dining Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="Bed"  >Bed Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="Home Office"  >Home Office.</span></div>
           
           <h4>If You Are Looking For Kids Furniture, What Type Is It?</h4>
         <div class="choices">
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"> <input type="checkbox" name="list[]" value="Kids Bed Room"  >Kids Bed Room.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="Nursery"  >Nursery.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="Playroom"  >Playroom.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="Storage"/>  Storage.</span></div>
        
        <h4>What IS The Color Of The Furniture?</h4> <div class="choices">
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="colorful"  > Colorful.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"><input type="checkbox" name="list[]" value="classic"  >Classic Colors.</span>
            <span onmouseover="this.style.color='rgb(200,20,60)';" onmouseout="this.style.color='rgb(14,7,68)';" style="display: inline-block;"> <input type="checkbox" name="list[]" value="modern"  >Modern Colors.</span>
           &emsp;
            <button class="searchIcon" name="submit" type="submit">Search
            <img src="image/search--v2.png" alt="searchButton"/></button>
    </div>
</td></tr></tabl></form></div>
    
<?php
    if(isset($_POST['submit'])){
     $check=$_POST['list'];
     if(empty($check)){
        echo "you didn't check any choice";
        }else{
        $N = count($check);
        
        for($i=0; $i < $N; $i++)
        {
           $sql = " SELECT * FROM image WHERE type='$check[$i]' OR color= '$check[$i]';";
        $result= mysqli_query($conn, $sql); 

    while($row = mysqli_fetch_array($result)){
            echo "<div class='catigory' > <table><tr>" ;
            echo "<td><img src='image/".$row ['image']."''>";
             echo "<form id='texte'> <textarea name='text' cols='38' rows='5' placeholder='preview to the description of your photos. Please make it brief and clear'>";
            
                 echo "".$row['description'].",&ensp;Type:".$row['type'].",&ensp;Color:".$row['color'].",&ensp;Price:".$row['price']."</textarea></form></td>";
            echo "</tr></table></div>";
    }}   }}
    
?>
    <div style="align-content: center; text-align: center;border-top: 1px solid rgb(200,20,60); font-size: 2vw; color: rgb(14,7,68); margin-top:7vh"><a href="contactUs.html" style="text-decoration: none; color: inherit">
    <p style="display: inline-block"><img src="image/smallLocation.png" alt="locationIcon" class="smallIcon"/>Al-Abed Street Damascus, Syria&emsp;</p>
          <p style="display: inline-block"> <img src="image/smlallCallIcon.png" alt="callIcon" class="smallIcon"/>
          +963-991234567&emsp;</p>
          <p style="display: inline-block"><img src="image/smallEmail.png" alt="emailUs" class="smallIcon"/>cloudfurniture@outlook.com</p>
        </a></div>
    
    </body>

</html>

