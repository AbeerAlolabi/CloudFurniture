<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    $host="sql300.epizy.com";
    $dbUsername="epiz_25969122";
    $dbPassword="APE2E0ezRBDK";
    $dbName="epiz_25969122_cloudfurniture";
    //creat connection

    $conn= mysqli_connect($host, $dbUsername, $dbPassword, $dbName );

    $sql="SELECT * FROM `sign_up` WHERE email='$email' AND password='$password';";
    $query=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($query);

    if($num>0){
        echo "<script type='text/javascript'> alert('Welcome!');</script>";
        header("Location: ../upload_image.php?signup=success");
              
        }
    else{
        $alert="<script type='text/javascript'> alert('incorrect email Or Password, Try Again! If You Do not have Account sign up now to post your furniture');</script>";
        echo $alert;
        header("Location: ../index.html");
           }
?>