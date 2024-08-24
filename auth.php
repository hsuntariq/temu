<?php 
    session_start();
    include './config.php';
    if(isset($_SESSION['username'])){
        header("Location: $base_url");
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './boot_css.php' ?>
    <title>Temu | Authenticate</title>
    <style>
    .sign_up_form,
    .sign_in_form,
    .right,
    .left {
        transition: all 0.7s;
    }
    </style>
</head>

<body>


    <?php 
        if(isset($_SESSION['invalid_user'])){
    ?>

    <div style="width: 20%;background:#FE7731;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-x text-white fw-bolder p-2 bg-danger"></i>
        <?php echo $_SESSION['invalid_user'] ?>
    </div>

    <?php

}
    unset($_SESSION['invalid_user']);
?>
    <?php 
        if(isset($_SESSION['strong_password_error'])){
    ?>

    <div style="width: 50%;background:#FE7731;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white fw-medium p-2 rounded-2 position-fixed ">
        <i style="clip-path: circle();" class="bi bi-x text-white fw-bolder p-2 bg-danger"></i>
        <?php echo $_SESSION['strong_password_error'] ?>
    </div>

    <?php

}
    unset($_SESSION['strong_password_error']);
?>


    <div class="container-fluid d-flex justify-content-center align-items-center"
        style="background-color: #F4F4F7;height:100vh">

        <div style="height: 517px;" class=" text-center card rounded-3 border-0 shadow-lg">
            <ddiv class="d-flex justify-content-center align-items-center">

                <div class="left sign-in-form p-5 w-50 d-flex flex-column">

                    <h1 class="display-6 fw-bold">
                        Sign In
                    </h1>
                    <div class="d-flex justify-content-center gap-3 fs-2">
                        <i class="bi bi-house"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-google"></i>
                    </div>
                    <p class="text-center my-3">
                        Or use your account
                    </p>
                    <form action="./login.php" method="POST">

                        <input required type="email" name="email" placeholder="Enter your email..."
                            class="form-control my-2" style="background-color: #F5F5F5;">
                        <input required type="password" name="password" placeholder="Enter your password..."
                            class="form-control mt-2" style="background-color: #F5F5F5;">
                        <p class="text-center fw-bold p-0">
                            Forgot your password?
                        </p>
                        <button style="background-color: #FE7731;" class="rounded-pill shadow btn w-50 d-block mx-auto">
                            Sign In
                        </button>
                    </form>
                </div>
                <div class="sign-up-form bg-white p-5 w-50 d-flex flex-column position-absolute">

                    <h1 class="display-6 fw-bold">
                        Sign Up
                    </h1>
                    <div class="d-flex justify-content-center gap-3 fs-2">
                        <i class="bi bi-house"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-google"></i>
                    </div>
                    <p class="text-center my-3">
                        Or use your account
                    </p>
                    <form action="./sign-up.php" method="POST">

                        <input required type="text" name="name" placeholder="Enter your name..."
                            class="form-control my-2" style="background-color: #F5F5F5;">
                        <input required type="email" name="email" placeholder="Enter your email..."
                            class="form-control my-2" style="background-color: #F5F5F5;">
                        <input required type="password" name="password" placeholder="Enter your password..."
                            class="form-control mt-2" style="background-color: #F5F5F5;">
                        <input required type="text" name="phone" placeholder="Enter your phone..."
                            class="form-control mt-2" style="background-color: #F5F5F5;">
                        <p class="text-center fw-bold p-0">
                            Already a user ? <span class="text-primary fw-bold login"
                                style="cursor: pointer;">Login</span>
                        </p>
                        <button style="background-color: #FE7731;" class="rounded-pill shadow btn w-50 d-block mx-auto">
                            Sign Up
                        </button>
                    </form>
                </div>
                <div class="right w-50 rounded-3 rounded-start-0  d-flex flex-column gap-3 p-5 justify-content-center align-items-center"
                    style="background:radial-gradient(#FE7731,#FE7531,#FE3731);height:517px;">
                    <h2 class="display-6 greeting text-center text-white fw-bold">
                        Salam, Customer
                    </h2>
                    <p class="text-center text-white greeting-text">
                        Enter your credentials to start your dream shopping journey!
                    </p>
                    <button class="btn sign-up btn-outline-light rounded-pill">
                        Sign Up
                    </button>
                </div>
            </ddiv </div>


        </div>

        <?php include './boot_js.php' ?>


        <script>
        let left = document.querySelector('.left')
        let sign_up_form = document.querySelector('.sign-up-form')
        let sign_in_form = document.querySelector('.sign-in-form')
        let right = document.querySelector('.right')
        let sign_up = document.querySelector('.sign-up')
        let greeting = document.querySelector('.greeting')
        let greeting_text = document.querySelector('.greeting-text')
        let login = document.querySelector('.login')
        let flash = document.querySelector('.flash-message');

        sign_up_form.style.visibility = 'hidden'
        sign_up_form.style.opacity = '0'
        // sign_up_form.style.zIndex = '-1'
        sign_up_form.style.left = '0'
        sign_up.addEventListener('click', () => {

            if (sign_up.innerText == 'Sign Up') {


                right.style.transform = 'translateX(-100%)'
                left.style.transform = 'translateX(100%)'
                right.classList.remove('rounded-start-0')
                right.classList.add('rounded-end-0')
                sign_up_form.style.visibility = 'visible'
                sign_up_form.style.opacity = '1'
                sign_up_form.style.transform = 'translateX(100%)'
                greeting.innerText = 'Welcome Back!'
                greeting_text.innerText = "Welcome back,let's login to start the shopping journey"
                sign_up.innerHTML = 'Sign In'
            } else {
                right.style.transform = 'translateX(0%)'
                left.style.transform = 'translateX(-0%)'
                right.classList.add('rounded-start-0')
                right.classList.remove('rounded-end-0')
                sign_up_form.style.visibility = 'hidden'
                sign_up_form.style.opacity = '0'
                sign_up_form.style.transform = 'translateX(0%)'
                greeting.innerText = 'Salam Customer'
                greeting_text.innerText = "  Enter your credentials to start your dream shopping journey!"
                sign_up.innerHTML = 'Sign Up'
            }


        })
        login.addEventListener('click', () => {

            right.style.transform = 'translateX(0%)'
            left.style.transform = 'translateX(-0%)'
            right.classList.add('rounded-start-0')
            right.classList.remove('rounded-end-0')
            sign_up_form.style.visibility = 'hidden'
            sign_up_form.style.opacity = '0'
            sign_up_form.style.transform = 'translateX(0%)'
            greeting.innerText = 'Salam Customer'
            greeting_text.innerText = "  Enter your credentials to start your dream shopping journey!"
            sign_up.innerHTML = 'Sign Up'




        })


        setTimeout(() => {
            flash.style.transform = 'translate(-50%,-100px) scale(0)'
            flash.style.opacity = 0
        }, 2000);
        </script>

</body>

</html>