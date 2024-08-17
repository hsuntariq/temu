<?php 
    session_start();
    include './config.php';
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $description = $_POST['description'];
    //get image and video

    // get the image
    $product_image = $_FILES['image']['name'];
    $product_image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($product_image_tmp,'./product_images/' . $product_image );
    // get the video
    $product_video = $_FILES['video']['name'];
    $product_video_tmp = $_FILES['video']['tmp_name'];
    move_uploaded_file($product_video_tmp,'./product_videos/' . $product_video );

    //send the data to the database
    $insert = "INSERT INTO products (name,category,description,image,price,discount,video) VALUES ('{$name}',$category,'{$description}','{$product_image}',$price,$discount,'{$product_video}')";

    //execute

    mysqli_query($connection,$insert);

    $_SESSION['product_success'] = 'Product added successfully!';

    header("Location: {$_SERVER['HTTP_REFERER']}");
    



    ?>