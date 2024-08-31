<?php 
    session_start();
    include './config.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{7,}$/';
    $username = uniqid();
    
    $join_name = $name[0] . $name[1];
    $unique_id = str_pad(rand(0,99999),5);
    $username = $join_name . $unique_id;
      $insert = "INSERT INTO users (name,email,password,phone,username) VALUES ('{$name}','{$email}','{$password}','{$phone}','{$username}')";

     if(preg_match($pattern,$password) ){

          try {
             mysqli_query($connection,$insert);
             $_SESSION['username'] = $name;
             $_SESSION['unique_name'] = $username;
             $_SESSION['user_id']= mysqli_insert_id($connection);
             header("Location: $base_url");
         } catch (Exception $e) {
            
              if($e->getCode() == 1064){
                  $_SESSION['duplicate_email'] = 'Email already exists!';
                  header("Location: {$_SERVER['HTTP_REFERER']}");
                  

                 }
             }
            
         }else{
             $_SESSION['strong_password_error'] = 'Password should be atleast 6 characters,must contain a number,special character and an uppercase letter';
            
             header("Location: {$_SERVER['HTTP_REFERER']}");
     }

?>