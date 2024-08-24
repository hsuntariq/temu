<?php 
    session_start();
    include './config.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
    $result = mysqli_query($connection,$select);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['username'] = $row['name'];
            $_SESSION['user_image'] = $row['image'];
            $_SESSION['unique_name'] = $row['username'];
            header("Location: $base_url");
        }
    }else{
        $_SESSION['invalid_user'] = 'User does not exist!';
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

?>