<?php
session_start();

if(isset($_POST['submit'])){
    
    include_once 'database.php';
    
    $username = strtolower(mysqli_real_escape_string($conn, $_POST['username']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //ERROR HANDLES
    if(empty($username) || empty($password)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM admins WHERE lower(admin_adminname) = '$username' OR admin_number = '$username'"; //Check if login user is admin
        $result = mysqli_query($conn, $sql);
        $checkresult = mysqli_num_rows($result);
        if($checkresult < 1) { //Check if login user is user
            $sql = "SELECT * FROM users WHERE lower(user_username) = '$username' OR user_email = '$username'";
            $result = mysqli_query($conn, $sql);
            $checkresult = mysqli_num_rows($result);
            if($checkresult < 1) { //Invalid user
                header("Location: ../index.php?login=error");
                exit();
            } else if($checkresult > 0){ //Valid user
                if($row = mysqli_fetch_assoc($result)) {
                    //Dehasing password for user
                    $hashedpasswordcheck = password_verify($password, $row['user_password']);
                    if($hashedpasswordcheck == false) { //Check for password
                        header("Location: ../index.php?login=error");
                        exit();
                    } else if ($hashedpasswordcheck == true) { //Log in user
                        $_SESSION['u_username'] = $row['user_username'];
                        $_SESSION['u_email'] = $row['user_email'];
                        $_SESSION['u_name'] = $row['user_name'];
                        $_SESSION['u_mail'] = $row['user_mail'];
                        header("Location: ../index.php?login=success");
                        exit();
                    } else {
                        header("Location: ../index.php"); //unexpected error sends back to main page
                        exit();
                    }
                }
            }
        } else if ($checkresult > 0) { //Log in admin
            if($row = mysqli_fetch_assoc($result)) {
                //Dehasing pasword for admin
                $hashedpasswordcheck = password_verify($password, $row['admin_password']);
                if($hashedpasswordcheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } else if ($hashedpasswordcheck == true) {
                    //Log in admin
                    $_SESSION['u_username'] = $row['admin_adminname'];
                    $_SESSION['a_number'] = $row['admin_number']; //we can use this to verify if the session is admin
                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php");
                    exit();
                }
            }
        } else {
            header("Location: ../index.php");
            exit();
        }
    }
    
    
} else {
    header("Location: ../index.php");
    exit();
}