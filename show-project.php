<?php
    require_once("include/connection.php");
    require_once("include/header.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("location: index.php");
    }

    $query = "select * from projects where id = $id";
    $runQuery = mysqli_query($conn , $query);
    $project = mysqli_fetch_assoc($runQuery);

?>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="images/<?php echo $project['img']?>" class = "w-100" alt="">
        </div>
        <div class="col-md-6">
            <?php echo $project['name'] ?>
            <p><?php echo $project['description'] ?></p>
            <a href = "<?php echo $project['url'] ?>" class = "btn btn-primary"><?php echo $project['name'] ?></a>
            <a href = "<?php echo $project['repo'] ?>" class = "btn btn-danger">Repo</a>
        </div>
    </div>
</div>