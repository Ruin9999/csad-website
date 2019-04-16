<?php

if(isset($_POST['submit'])) {
     
    include_once 'database.php';
    
    $adminname = mysqli_escape_string($conn, $_POST['adminname']);
    $loweradminname = strtolower($adminname);
    $password = mysqli_escape_string($conn, $_POST['password']);
    $number = mysqli_escape_string($conn, $_POST['number']);
    $authcode = mysqli_escape_string($conn, $_POST['authcode']);
    
    //ERROR HANDLES
    //Check if authcode is correct
    if(empty($adminname) || empty($number) || empty($authcode) || empty($password)) {
        header("Location: ../registeradmin.php?register=empty");
        exit();
    } else {
        $sql = "SELECT * FROM admins WHERE lower(admin_adminname) = '$loweradminname' OR admin_number '$adminname'";
        $result = mysqli_query($conn, $sql);
        $checkresult = mysqli_num_rows($result); //Check is there's already admin registered under that adminname
        if($checkresult < 1){ //no registered admin
            $sql = "SELECT * FROM users WHERE lower(user_username) = '$loweradminname'";
            $result = mysqli_query($conn, $sql);
            $checkresult = mysqli_num_rows($result);
            if($checkresult < 1) { //no registered user
                //Start registering admin
                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
                //Add admin to database
                $sql = "INSERT INTO admins (admin_adminname, admin_password, admin_number) VALUES ('$adminname', '$hashedpassword', '$number');";
                mysqli_query($conn, $sql);
                if(mysqli_affected_rows($conn) > 0) {
                    header("Location: ../login.php?register=success");
                    exit();
                } else {
                    echo'Database Error';
                    exit();
                }
            } else if($checkresult > 0) { //registered user
                header("Location: ../registeradmin.php?register=usertaken");
                exit();
            } else { //unexpected error
                header("Location: ../registeradmin.php");
                exit();
            }
        } else if($checkresult > 0) { //registered admin
            header("Location: ../registeradmin.php?register=usertaken");
            exit();
        } else { //unexpected error
            header("Location: ../registeradmin.php");
            exit();
        }
    }
} else {
    header("Location: ../registeradmin.php");
    exit();
}