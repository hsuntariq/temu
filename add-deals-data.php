<?php 
session_start();
    include './config.php';
    // get the current page url
    $current_page = $_SERVER['HTTP_REFERER'];
    // extract data form the form
    $name = $_POST['name'];
    $discount = $_POST['discount'];
    $price = $_POST['price'];
    $time= $_POST['time'];
    $status= $_POST['status'];
    // extract image from the form
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $allowed_exts = ['jpg','jpeg','gif','png'];
    $break = explode('.',$filename);
    $ext = end($break);



    if($name == ''){
        $_SESSION['empty_name'] = 'Please enter category name';
    }
    else if($discount == ''){
        $_SESSION['empty_sub_name'] = 'Please enter sub category';
    }
    else if($price == ''){
        $_SESSION['empty_price'] = 'Please enter price';
    }
    else if($time == ''){
        $_SESSION['empty_time'] = 'Please enter time';
    }
    else if($filename == ''){
        $_SESSION['empty_file'] = 'Please choose a file';
    }else if(!in_array($ext,$allowed_exts)){
        $_SESSION['not_allowed_ext'] = 'jpg,jpeg and gif are allowed';
    }
    
    else{

     // move the images to the folder
     move_uploaded_file($tmp_name,'./deal_images/' . $filename);

     // add data to the backend
     $insert = "INSERT INTO deals (name,discount,price,time,image,status) VALUES ('{$name}','{$discount}',$price,'{$time}','{$filename}',$status)";

     try{
         mysqli_query($connection,$insert);
         $_SESSION['deals_success'] = 'Deals Inserted Successfully🎁';
     }catch(mysqli_sql_exception $e){
         if($e->getCode() == 1064){
            $_SESSION['deals_error'] = 'Duplicate Entry';
         }else{
             echo "error";
         }
     }

 }
 header("Location: $current_page");

?>