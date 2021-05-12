<?php
    session_start();
    require_once("include/connection.php");
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "select * from users where email = '$email'";
        $runQuery = mysqli_query($conn , $query);

        if (mysqli_num_rows($runQuery) > 0) {

            $user = mysqli_fetch_assoc($runQuery);
            $isCorrect = password_verify($password , $user['password']);

            if ($isCorrect) {
                $_SESSION["email"] = $email;
                header("location: index.php");
            } else {
                $_SESSION['errors'] = "incorrect password";
                header("location: login.php");

            }

        } else {
            // array_push( , "email not found");
            $_SESSION['errors'] = "email not found";
            header("location: login.php");
        }
    }
?>