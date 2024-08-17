<?php 
    $id = $_GET['id'];
    $status = $_GET['status'];
    $statusValue = $status == 1 ? 0 : 1;
    
    include './config.php';
    $update = "UPDATE deals SET status = $statusValue WHERE id = $id";
    mysqli_query($connection,$update);
    header("Location: {$_SERVER['HTTP_REFERER']}")

?>