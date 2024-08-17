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
        if(isset($_SESSION['product_success'])){
    ?>

    <div style="width: 20%;background:#FE7731;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-check2-circle text-white fw-bolder p-2 bg-success"></i> Product
        Inserted
        Successfully!
    </div>

    <?php 
        }else if(isset($_SESSION['product_error'])){
            ?>

    <div style="width: 10%;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message bg-danger text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-x text-white fw-bolder p-1 bg-warning"></i>
        <?php 
                echo $_SESSION['product_error']
            ?>
    </div>

    <?php }
        unset($_SESSION['product_success']);
        unset($_SESSION['product_error']);
    ?>


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
                            Add Product
                        </h1>
                        <form action="./add-product-data.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input name="name" type="text" placeholder="e.g Food" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_name'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_name']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category" class="form-control" id="">
                                    <?php 
                                    include './config.php';
                                    $select_category = "SELECT * FROM category";
                                    $result_category = mysqli_query($connection,$select_category);
                                    if(mysqli_num_rows($result_category) > 0 ){
                                        while($row_category = mysqli_fetch_assoc($result_category)){
                                ?>
                                    <option value="<?php echo $row_category['id']?>">

                                        <?php echo $row_category['category_name'] ?>
                                    </option>

                                    <?php }}?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Product starting price</label>
                                <input name="price" type="number" placeholder="e.g Rs.50" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_price'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_price']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Product Discount</label>
                                <input name="discount" type="number" placeholder="e.g Rs.50" class="form-control">
                                <?php 
                                    if(isset($_SESSION['discount'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['discount']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>

                                <textarea class="form-control" name="description" rows="10" cols="" id=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Category Image</label>
                                <input name="image" required type="file" placeholder="e.g Rs.50"
                                    class="form-control image-input">
                                <?php 
                                    if(isset($_SESSION['empty_filename'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_filename']}
                                        </p>";
                                    }
                                    if(isset($_SESSION['not_allowed_ext'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['not_allowed_ext']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Category Video</label>
                                <input name="video" type="file" placeholder="e.g Rs.50"
                                    class="form-control video-input">
                                <?php 
                                    if(isset($_SESSION['empty_filename'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_filename']}
                                        </p>";
                                    }
                                    if(isset($_SESSION['not_allowed_ext'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['not_allowed_ext']}
                                        </p>";
                                    }
                                ?>
                            </div>

                            <img width="70px" height="70px" class="  my-3  preview-image" src="" alt="Preview Image">
                            <video autoplay loop muted width="150px" height="300px" class="  my-3  preview-video" src=""
                                alt="Preview Video"></video>
                            <button class="btn text-white bg-orange w-100 my-2">
                                Add Product
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