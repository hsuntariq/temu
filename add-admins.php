<?php 

    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './boot_css.php'?>
    <link rel="stylesheet" href="./styles.css">
    <style>
    .text-orange {
        color: #fe7731;
    }

    .bg-orange {
        background: #fe7731 !important;

    }

    .my-form::-webkit-scrollbar {
        width: 0;
    }

    .my-form:hover::-webkit-scrollbar {
        width: 5px;
    }

    .my-form::-webkit-scrollbar-thumb {
        border-radius: 50px;
        background-color: lightgray;
    }
    </style>
    <title>
        Temu | Products
    </title>
</head>

<body>



    <?php 
        if(isset($_SESSION['user_success'])){
    ?>

    <div style="width: 20%;background:#FE7731;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-check2-circle text-white fw-bolder p-2 bg-success"></i> User added
        successfully
    </div>

    <?php 
        }else if(isset($_SESSION['strong_password_error'])){
?>
    <div style="width: 70%;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white bg-danger fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-check2-circle text-white fw-bolder p-2 bg-success"></i>
        <?php echo $_SESSION['strong_password_error'] ?>
    </div>
    <?php
    unset($_SESSION['user_success']);
        unset($_SESSION['strong_password_error']);
}?>



    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-2 col-lg-3 sidebar">
                <?php include './admin-sidebar.php'  ?>
            </div>
            <div class="col-xl-10 col-lg-9 p-0">
                <?php include './admin-header.php' ?>
                <div class="container col-xl-5 col-lg-7 col-md-9 col-sm-10">
                    <div class=" my-form card p-5 shadow border-0 my-5" style="height:80vh;overflow-y:scroll">
                        <h1 class="display-4 text-center text-orange">
                            Add User
                        </h1>
                        <form action="./add-user.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="">Admin Name</label>
                                <input name="name" type="text" placeholder="e.g Saad" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_name'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_name']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" placeholder="e.g. example@example.com" class="form-control"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input name="password" type="password" placeholder="e.g Rs.50" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_price'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_price']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input name="phone" type="text" placeholder="e.g +92 3115 21 45 8" class="form-control">
                                <?php 
                                    if(isset($_SESSION['discount'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['discount']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control ">
                                    <option value="user" class="d-flex w-100 jusitfy-content-between">
                                        User
                            </div>

                            </option>
                            <option value="admin">Admin</option>
                            <option value="super-admin">Super admin</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="">image</label>

                        <input type="file" name="image" id="" class="form-control">
                    </div>



                    <img width="70px" height="70px" class="  my-3  preview-image" src="" alt="Preview Image">

                    <button class="btn text-white bg-orange w-100 my-2">
                        Add User
                    </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>


    <?php include './boot_js.php';
        unset($_SESSION['empty_name']);
        unset($_SESSION['empty_sub_name']);
        unset($_SESSION['empty_price']);
        unset($_SESSION['empty_filename']);
        unset($_SESSION['not_allowed_ext']);
    
    ?>


    <script>
    let preview_image = document.querySelector('.preview-image');
    let preview_video = document.querySelector('.preview-video');
    let image_input = document.querySelector('.image-input');
    let video_input = document.querySelector('.video-input');
    let flash = document.querySelector('.flash-message');
    preview_image.style.display = 'none'
    preview_video.style.display = 'none'

    image_input.addEventListener('input', (e) => {
        const file = e.target.files[0];
        const image_url = URL.createObjectURL(file)
        preview_image.src = image_url;
        preview_image.style.display = 'block'
    })
    video_input.addEventListener('input', (e) => {
        const file = e.target.files[0];
        const video_url = URL.createObjectURL(file)
        preview_video.src = video_url;
        preview_video.style.display = 'block'
    })



    setTimeout(() => {
        flash.style.transform = 'translate(-50%,-100px) scale(0)'
        flash.style.opacity = 0
    }, 2000);
    </script>



</body>

</html>