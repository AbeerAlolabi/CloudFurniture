<?php

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($fName)||!empty($lName) || !empty($gender) || !empty($city) || !empty($address) || !empty($phone) || !empty($email) || !empty($password)){
    $host="sql300.epizy.com";
    $dbUsername="epiz_25969122";
    $dbPassword="APE2E0ezRBDK";
    $dbName="epiz_25969122_cloudfurniture";
    //creat connection

    $conn= mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
   
    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }else{
        isset($_POST['submit']);
        $sql="INSERT INTO sign_up (fName, lName, gender, city, address, phone, email, password) VALUES('$fName','$lName','$gender','$city','$address', '$phone','$email', '$password');";

        $result=mysqli_query($conn,$sql);
        if($result==true){
            echo "<script> alert('Welcome, Now Log In To Post Your Furniture');</script>";
            header("Location: ../index.html?signup=success");
        
            }else{
                echo "<script> alert('Error, All field are required'); </script>";
                header("Location: ../signUp.html");}
    
    die();}}
?>