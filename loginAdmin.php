<?php
    session_start();

    $email = $_POST['AdminEmail'];
    $inputPassword = $_POST['AdminPassword'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con= mysqli_connect('localhost', 'root', '','contact');
        if ($con->connect_error){
            die ('Connection failed : ' .$con->connect_error);
        } else{
            $query = mysqli_query($con, "SELECT * FROM tb_admin WHERE email = '".$email."'");
            if(mysqli_num_rows($query)) {
                $user = $query->fetch_assoc();
                $hashPassword = $user["password"];
                
                if($inputPassword == $user["password"]){
                    $_SESSION['adminID'] = $user["adminID"];
                    $_SESSION['adminEmail'] = $user["email"];
                    header("location: adminappointments.php");
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