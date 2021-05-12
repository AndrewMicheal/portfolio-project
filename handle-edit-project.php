<?php 
    require_once("include/connection.php");
    if (isset($_POST['submit']) && isset($_GET['id']) ) {
        $id = $_GET['id'];
        $name = htmlspecialchars($_POST['name']);
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
        $imageQuery = "select img from projects where id = $id";
        $res = mysqli_query($conn , $imageQuery);
        $img = mysqli_fetch_assoc($res);
        $oldNameImg = $img['img'];
        echo $oldNameImg;
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

        if (!filter_var($url,FILTER_VALIDATE_URL)) {
            array_push($errors , "website url must be valid url");
        }

        if (!filter_var($repo,FILTER_VALIDATE_URL)) {
            array_push($errors , "github must be valid url");
        }

        if (empty($errors)) {
            if (empty($fileName)) {
                $query = "update projects set name = '$name' , description = '$desc' , img = '$oldNameImg' , url = '$url' , repo = '$repo' where id = $id";
                $runQuery = mysqli_query($conn , $query);
                header("location: index.php");

            } else {
                $query = "update projects set name = '$name' , description = '$desc' , img = '$newImageName' , url = '$url' , repo = '$repo' where id = $id";
                $runQuery = mysqli_query($conn , $query);
                move_uploaded_file($fileTmpName , "images/$newImageName");
                header("location: index.php");
            }
        } else {
            echo "error";
        }
    }
?>