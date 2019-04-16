<?php
session_start();

include 'functions.php';    
protect_page();

 if(isset($_POST['submit'])) {
     
    include 'database.php';
     
    $username = $_SESSION['u_username'];
    $current_password = mysqli_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_escape_string($conn, $_POST['confirm_password']);
         
    if(empty($username) || empty($current_password) || empty($new_password) || empty(confirm_password)) {
        header("Location: ../changepassword.php");
        exit();
    } else { //check if its admin or user
        if(isset($_SESSION['a_number'])) {
            $number = $_SESSION['a_number'];
            $sql = "SELECT * FROM admins WHERE lower(admin_adminname) = '$username' && admin_number = '$number'";
            $result = mysqli_query($conn, $sql);
            $checkresult = mysqli_num_rows($result);
            if($checkresult < 1) { //invalid admin
               header("Location: ../login.php?invaidadmin");
               session_destroy();
               exit();
            } else if($checkresult > 0) { //valid admin
               if($row = mysqli_fetch_assoc($result)) {
                   $hashedpasswordcheck = password_verify($current_password, $row['admin_password']);
                   if($hashedpasswordcheck == false) {
                       header("Location: ../changepassword.php?change=error");
                       exit();
                   } else if($hashedpasswordcheck == true) {
                       if($new_password != $confirm_password) {
                           header("Location: ../changepassword.php?change=confirm");
                           exit();
                       } else {
                            $hashedpassword = password_hash($new_password, PASSWORD_DEFAULT);
                            $sql = "UPDATE admins SET admin_password = '$hashedpassword' WHERE lower(admin_adminname) = '$username'";
                            mysqli_query($conn, $sql);
                            if(mysqli_affected_rows($conn) > 0) {
                                header("Location: ../index.php?change=success");
                                exit();
                            } else {
                                echo 'Database Error';
                                exit();
                            }
                       }
                   }
               }
            }
        } else if(isset($_SESSION['u_username'])) {
            $sql = "SELECT * FROM users WHERE lower(user_username) = '$username'";
            $result = mysqli_query($conn, $sql);
            $checkresult = mysqli_num_rows($result);
            if($checkresult == false) { //check if valid user
                header("Location: ../login.php?invaliduser");
                session_destroy();
                exit();
            } else if($checkresult == true) { //valid user
                if($row = mysqli_fetch_assoc($result)) {
                    $hashedpasswordcheck = password_verify($current_password, $row['user_password']);
                    if($hashedpasswordcheck < 1) {
                        header("Location: ../changepassword.php?change=error");
                        exit();
                    } else if($hashedpasswordcheck > 0) {
                        if($new_password != $confirm_password) {
                            header("Location: ../changepassword.php?change=confirm");
                            exit();
                        } else {
                            $hashedpassword = password_hash($new_password, PASSWORD_DEFAULT);
                            $sql = "UPDATE users SET user_password ='$hashedpassword' WHERE lower(user_username) = '$username'";
                            mysqli_query($conn, $sql);
                            if(mysqli_affected_rows($conn) > 0) {
                                header("Location: ../index.php?change=success");
                                exit();
                            } else {
                                echo 'Database Error';
                                exit();
                            }
                        }
                    }
                }    
            }
        }
    }
     
} else {
    header("Location: ../login.php");
    exit();
}