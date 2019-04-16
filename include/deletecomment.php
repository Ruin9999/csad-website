<?php
if(isset($_POST['commentdelete'])) {
    
    include_once 'database.php';
    
    $commentid = mysqli_escape_string($conn, $_POST['commentid']);
    
    $sql = "DELETE FROM comments WHERE comment_id = '$commentid'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../comments.php?delete=success");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}