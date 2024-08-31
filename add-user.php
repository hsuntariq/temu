<?php
    session_start();
    include './config.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name,'./user_images/' . $filename);
    $join_name = $name[0] . $name[1];
    $unique_id = str_pad(rand(0,99999),5);
    $username = $join_name . $unique_id;
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{7,}$/';

    //insert into db
     $insert = "INSERT INTO users (name,email,password,phone,role,image,username) VALUES ('{$name}','{$email}','{$password}','{$phone}','{$role}','{$filename}','{$username}')";

    if(preg_match($pattern,$password) ){
        mysqli_query($connection,$insert);
        $_SESSION['user_success'] = 'User added successfully';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }else{
         $_SESSION['strong_password_error'] = 'Password should be atleast 6 characters,must contain a number,special character and an uppercase letter';
            
        header("Location: {$_SERVER['HTTP_REFERER']}");
        
    }



?>