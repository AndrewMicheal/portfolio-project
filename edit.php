<?php
    require_once("include/connection.php");
    require_once("include/header.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "select * from projects where id = $id";
        $runQuery = mysqli_query($conn , $query);
        $result = mysqli_fetch_assoc($runQuery);
       echo $result['name'];
    }
?>

<div class="container py-5">
    <form action="handle-edit-project.php?id=<?php echo $result['id'] ?>" method = "POST" enctype="multipart/form-data">
        <label class = "mt-2">Name * : </label>
        <input type="text" class = "form-control" value = "<?php echo $result['name']?>" name = "name" placeholder = "please enter project name">
        <label class = "mt-2">Description * : </label>
        <textarea  name="desc" class = "form-control" placeholder = "please enter description"><?php echo $result['description'] ?></textarea>
        <label class = "mt-2">Image * : </label>
        <input type="file" class = "form-control" name = "file">
        <label class = "mt-2">website url : </label>
        <input value =  <?php echo $result['url'] ?> type="text" class = "form-control" name = "url" placeholder = "enter website url">
        <label class = "mt-2">repo url : </label>
        <input value = <?php echo $result['repo'] ?> type="text" class = "form-control" name = "repo" placeholder = "enter github url">
        <button class = "btn btn-success mt-4" type = "submit" name = "submit">Edit</button>
    </form>
</div>

<?php require_once("include/footer.php"); ?>