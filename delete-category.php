<?php 
    session_start();
    include './config.php';
    $id = $_GET['id'];
    $delete = "DELETE FROM category WHERE id = $id";
    mysqli_query($connection,$delete);
    $_SESSION['delete_success'] = 'Category Deleted Successfully!';
    header("Location: {$_SERVER['HTTP_REFERER']}")
?>