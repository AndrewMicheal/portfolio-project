<?php
    session_start();
    require_once("include/header.php");
    $query = "select * from projects";
    $runQuery = mysqli_query($conn , $query);
    $results = mysqli_fetch_all($runQuery , MYSQLI_ASSOC);
    
?>
<?php if(!isset($_SESSION['email'])) {?>
    <a href="login.php" class = "btn btn-primary">Login</a>
<?php }?>
<?php if(isset($_SESSION['email'])) {?>
    <a href="logout.php" class = "btn btn-danger">Logout</a>
    <a href="add-project.php" class = "btn btn-primary">Add Project</a>
<?php } ?>


<div class="container my-5 py-5">
    <div class="row">
        <?php foreach($results as $result) { ?>
            <div class="col-md-4 my-3">
                <img class = "w-100" src="images/<?php echo $result['img'] ?>" alt="">
                <h2 class = "my-3 text-center"><?php echo $result['name'] ?></h2>
                <a href="show-project.php?id=<?php echo $result['id'] ?>" class = "btn btn-primary my-3">View Details</a>
                <?php if (isset($_SESSION['email'])) { ?>
                    <a href="edit.php?id=<?php echo $result['id'] ?>" class = "btn btn-success my-3">Edit</a>
                    <a href="delete.php?id=<?php echo $result['id'] ?>" class = "btn btn-danger my-3">Delete</a>
                <?php }?>
            </div>
        <?php } ?>
    </div>
</div>