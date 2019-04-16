<?php
if(isset($_POST['submit'])) {
        
    include_once 'database.php';
    
    $newfiletitle = $_POST['filetitle'];
    $newfiletitle = strtolower(str_replace(" ", "-", $newfiletitle));
    $newfiledesc = $_POST['filedesc'];
    
    $file = $_FILES["file"];
    
    $filename = $file['name'];
    $filetmpname = $file['tmp_name'];
    $filesize = $file['size'];
    $fileerror = $file['error'];
    $filetype = $file['type'];
    
    $fileext = explode(".", $filename);
    $fileactualext = strtolower(end($fileext));
    
    $allowed = array("jpg", "jpeg", "png");
    if(in_array($fileactualext, $allowed)) { //valid file type
        if($fileerror == 0) { //if file had no error
            if($filesize < 1000000) { //file small enough
                $newfilename = $newfiletitle.".".uniqid('', true).".".$fileactualext;
                $filedestination = "../images/hotreads/".$newfilename;
                $sql = "SELECT * FROM gallery";
                $result = mysqli_query($conn, $sql);
                $checkresult = mysqli_num_rows($result);
                $imgorder = $checkresult + 1;
                $sql = "INSERT INTO gallery (gallery_title, gallery_desc, gallery_imgfullname, gallery_order) VALUES ('$newfiletitle', '$newfiledesc', '$newfilename', '$imgorder')";
                mysqli_query($conn, $sql);
                move_uploaded_file($filetmpname, $filedestination);
                header("Location: ../index.php#reads?upload=success");
                exit();
            } else { //file too big
                echo 'File size too big!';
            }
        } else { //file had errors
            echo 'File error!';
        }
    } else { //invalid file type
        echo 'File type not allowed!';
        exit();
    }
} else { //enetered through url
    header("Location: ../index.php");
    exit();
}