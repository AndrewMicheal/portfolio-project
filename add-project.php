<?php 
    require_once("include/header.php"); 
    session_start();
?>

<div class="container py-5">
    <form action="handle-add-project.php" method = "POST" enctype="multipart/form-data">
        <label class = "mt-2">Name * : </label>
        <input type="text" class = "form-control" name = "name" placeholder = "please enter project name">
        <label class = "mt-2">Description * : </label>
        <textarea name="desc" class = "form-control" placeholder = "please enter description"></textarea>
        <label class = "mt-2">Image * : </label>
        <input type="file" class = "form-control" name = "file">
        <label class = "mt-2">website url : </label>
        <input type="text" class = "form-control" name = "url" placeholder = "enter website url">
        <label class = "mt-2">repo url : </label>
        <input type="text" class = "form-control" name = "repo" placeholder = "enter github url">
        <button class = "btn btn-success mt-4" type = "submit" name = "submit">Add</button>
    </form>
    <?php if (isset($_SESSION['error-handle-form'])) {?>
        <?php foreach($_SESSION['error-handle-form'] as $error) {?>
            <h5 class = "my-5"><?php echo $error ?></h5>
        <?php }?>
    <?php } ?>

    <?php unset($_SESSION['error-handle-form']); ?>
</div>

<?php require_once("include/footer.php") ?>