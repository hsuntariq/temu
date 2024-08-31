<?php 
    session_start();
    include './config.php';
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];
    $insert = "INSERT INTO reviews (review,rating,user_id,product_id) VALUES ('{$review}',$rating,$user_id,$post_id)";
    mysqli_query($connection,$insert);
    $_SESSION['rating_success'] = 'Review Added';
    header("Location: {$_SERVER['HTTP_REFERER']}");
?>