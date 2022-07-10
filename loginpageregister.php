<?php

$txt = $_POST['UserName'];
$email = $_POST['Email'];
$pswd = $_POST['Password'];


$con=mysqli_connect("localhost", "root", "", "vaccicareph");

if ($con -> connect_error){

    die ('Connection failed : ' .$con->connect_error);
} else{


    $stmt - $con->prepare("insert into registration(UserName, Email, Password) values(?,?,?)");
    $stmt -> bind_param ("ssi", $txt, $email, $pswd);
    $stmt -> execute();
    echo "Registration successful";
    $stmt -> close();
    $con -> close();
}
?>