<?php

$UserName = $_POST['UserName'];
$Email = $_POST['Email'];
$Password = $_POST['Password'];


$con=mysqli_connect("localhost", "root", "", "philnance");

if ($con -> connect_error){

    die ('Connection failed : ' .$con->connect_error);
} else{


    $stmt - $con->prepare("insert into registration(UserName, Email, Password) values(?,?,?)");
    $stmt -> bind_param ("ssi", $UserName, $Email, $Password);
    $stmt -> execute();
    echo "Registration successful";
    $stmt -> close();
    $con -> close();
}
?>