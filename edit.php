<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    mysqli_query($con, $query);

    $_SESSION['message'] = 'Task updated succesfully';
    $_SESSION['message_type'] = 'info';
    header("Location: index.php");
}
?>

<?php include("includes/header.php") ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card car-body">
                <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>"
                        class="form-control" placeholder="Update title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" placeholder="Update Description" class="form-control"><?php echo $description ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>