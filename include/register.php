<?php

if(isset($_POST['submit'])) {
    
    include_once 'database.php';
    
    $username = mysqli_escape_string($conn, $_POST['username']);
    $lowerusername = strtolower($username);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $mail = mysqli_escape_string($conn, $_POST['mail']);    
    $name = mysqli_escape_string($conn, $_POST['name']);
    
    //ERROR HANDLES
    //Check if username is admin
    if($username != "admin") {
        //Check if inputs are empty
        if(empty($username) || empty($email) || empty($password) || empty($mail) || empty($name)) {
            header("Location: ../register.php?register=empty");
            exit();
        } else {
            //Check if username
            $sql = "SELECT * FROM users WHERE lower(user_username) = '$lowerusername'";
            $result = mysqli_query($conn, $sql);
            $checkresult = mysqli_num_rows($result);
            if($checkresult > 0) { //User not avail in users table
                header("Location: ../register.php?register=usertaken");
                exit();
            } else if($checkresult < 1) {//User avail in users table
                //Check if username is avail in admins table
                $sql = "SELECT * FROM admins WHERE lower(admin_adminname) = '$lowerusername'";
                $result = mysqli_query($conn, $sql);
                $checkresult = mysqli_num_rows($result);
                if($checkresult > 0) { //User not avail in admins table
                    header("Location: ../register.php?register=usertaken");
                    exit();
                } else if($checkresult < 1) {//User avail in admins table
                    //Start regsitering user
                    $hashedpassword  = password_hash($password, PASSWORD_DEFAULT);
                    //Add user to database
                    $sql = "INSERT INTO users (user_username, user_email, user_password, user_mail, user_name) VALUES ('$username', '$email', '$hashedpassword', '$mail', '$name');";
                    mysqli_query($conn, $sql);
                    if(mysqli_affected_rows($conn) > 0) {
                        header("Location: ../login.php?register=success");
                        exit();
                    } else {
                        echo'Database Error';
                        exit();
                    }
                } else { //Unexpected Error
                    header("Location: ../register.php");
                    exit();
                }
            } else { //Unexpected Error
                header("Location: ../regsiter.php");
                exit();
            }
        }
    } else {
        header("Location: ../registeradmin.php");
        exit();
    }
} else {
    header("Location: ../register.php");
    exit();
}