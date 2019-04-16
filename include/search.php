<?php
if(isset($_POST['searchsubmit'])) {
    session_start();
    $search = $_POST['search'];
    if(empty($search)) {
        unset($_SESSION['search']);
        header("Location: ../index.php#media");
        exit();
    } else {
        $_SESSION['search'] = $search;
        header("Location: ../index.php#media");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}