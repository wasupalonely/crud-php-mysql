<?php

include("db.php");

if(isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Task Saved successfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>