<?php
    require_once("include/connection.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "delete from projects where id = $id";
        $runQuery = mysqli_query($conn , $query);
        header("location: index.php");
    }
?>