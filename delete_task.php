<?php 

include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = "Task removed succesfully";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
}

?>