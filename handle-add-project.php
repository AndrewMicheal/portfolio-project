<?php
    require_once("include/connection.php");
    session_start();
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $desc = htmlspecialchars(trim($_POST['desc']));
        $file = $_FILES['file'];
        $url = htmlspecialchars(trim($_POST['url']));
        $repo = htmlspecialchars(trim($_POST['repo']));
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $randomStr = uniqid();
        $ext = pathinfo($fileName , PATHINFO_EXTENSION);
        $newImageName = "$randomStr.$ext";
        $errors = [];
        if(empty($name)) {
            array_push($errors , "name is required");
        } elseif (strlen($name) < 5 || strlen($name) > 255) {
            array_push($errors , "name must be between 5 and 255");
        } elseif (!is_string($name) && is_numeric($name)) {
            array_push($errors , "name must be string");
        }

        if(empty($desc)) {
            array_push($errors , "description is required");
        } elseif (strlen($desc) < 5 || strlen($desc) > 1000) {
            array_push($errors , "description must be between 5 and 1000");
        }

        if ($fileError > 0) {
            array_push($errors , "there is an error while uploading the file");
        }

        if (!filter_var($url,FILTER_VALIDATE_URL)) {
            array_push($errors , "website url must be valid url");
        }

        if (!filter_var($repo,FILTER_VALIDATE_URL)) {
            array_push($errors , "github must be valid url");
        }

        if (empty($errors)) {
           $query = "insert into projects(name , description , img, url , repo) values('$name','$desc','$newImageName','$url','$repo')";
           $runQuery = mysqli_query($conn , $query);
           move_uploaded_file($fileTmpName , "images/$newImageName");
           header('location: index.php');
        } else {
            $_SESSION['error-handle-form'] = $errors;
            header("location: add-project.php");
        }
    }
?>