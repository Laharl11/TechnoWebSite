<?php
    session_start();

    $Email = $_POST['Email'];
    $inputPassword = $_POST['Password'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con= mysqli_connect('localhost', 'root', '','philnance');
        if ($con->connect_error){
            die ('Connection failed : ' .$con->connect_error);
        } else{
            $query = mysqli_query($con, "SELECT * FROM 'login' WHERE Email = '".$Email."'");
            if(mysqli_num_rows($query)) {
                $user = $query->fetch_assoc();
                $hashPassword = $user["Password"];
               
                if($inputPassword == $user["Password"]){
                    #$_SESSION['adminID'] = $user["adminID"];
                    $_SESSION['Email'] = $user["Email"];
                    header("location: blank.html");
                }
                else{
                    $_SESSION['LoginError'] = "yes";
                    header("location: loginAdminPage.php");
                }
            }else{
                $_SESSION['LoginError'] = "yes";
                header("location: loginAdminPage.php");
            }
        }
   }
?>