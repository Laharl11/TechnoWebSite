<?php
    session_start();

    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $con= mysqli_connect('localhost', 'root', '','philnance');
        if ($con->connect_error){
            die ('Connection failed : ' .$con->connect_error);
        } else{
            $query = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST['Email']."'");
            if(mysqli_num_rows($query)) {
                $user = $query->fetch_assoc();
                $hashPassword = $user["password"];
                if(password_verify($inputPassword, $hashPassword)){
                    $_SESSION['id'] = $user["userID"];
                    $_SESSION['email'] = $user["email"];
                    //redirect to user main page
                    header("location: MainPage.php");
                    //echo $_SESSION['id'];
                }else{
                    $_SESSION['UserLoginError'] = "yes";
                    header("location: loginPage.php");
                }
            }else{
                $_SESSION['UserLoginError'] = "yes";
                header("location: loginPage.php");
            }
        }
   }
    
?>