<?php 
session_start();
    include './config.php';
    // get the current page url
    $current_page = $_SERVER['HTTP_REFERER'];
    // extract data form the form
    $name = $_POST['name'];
    $sub_name = $_POST['sub_name'];
    $price = $_POST['price'];
    // extract image from the form
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $allowed_exts = ['jpg','jpeg','gif'];
    $break = explode('.',$filename);
    $ext = end($break);



    if($name == ''){
        $_SESSION['empty_name'] = 'Please enter category name';
    }
    else if($sub_name == ''){
        $_SESSION['empty_sub_name'] = 'Please enter sub category';
    }
    else if($price == ''){
        $_SESSION['empty_price'] = 'Please enter price';
    }
    else if($filename == ''){
        $_SESSION['empty_file'] = 'Please choose a file';
    }else if(!in_array($ext,$allowed_exts)){
        $_SESSION['not_allowed_ext'] = 'jpg,jpeg and gif are allowed';
    }
    
    else{

     // move the images to the folder
     move_uploaded_file($tmp_name,'./category_images/' . $filename);

     // add data to the backend
     $insert = "INSERT INTO category (category_name,sub_category_name,price,image) VALUES ('{$name}','{$sub_name}',$price,'{$filename}')";

     try{
         mysqli_query($connection,$insert);
         $_SESSION['category_success'] = 'Category Inserted Successfully🎁';
     }catch(mysqli_sql_exception $e){
         if($e->getCode() == 1064){
            $_SESSION['category_error'] = 'Duplicate Entry';
         }else{
             echo "error";
         }
     }

 }
 header("Location: $current_page");

?>