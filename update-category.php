<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <?php include './boot_css.php' ?>
    <title>TEMU | Update Category</title>
    <style>
    .text-orange {
        color: #fe7731;
    }

    .bg-orange {
        background: #fe7731 !important;

    }
    </style>
</head>

<body>


    <?php 
        $c_name = $_GET['category_name'];
        $c_sub = $_GET['category_sub'];
        $c_price = $_GET['category_price'];
        $c_image = $_GET['category_image'];
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 sidebar">
                <?php include './admin-sidebar.php' ?>
            </div>
            <div class="col-xl-10 col-lg-9 p-0">
                <?php include './admin-header.php' ?>
                <div class="my-4 mx-auto p-4 col-xl-5 col-lg-7 col-md-9 col-sm-10">

                    <div class="card p-5 shadow border-0 my-5">
                        <h1 class="display-4 text-center text-orange">
                            Update Category
                        </h1>
                        <form action="./update-category-data.php" enctype="multipart/form-data" method="POST">
                            <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input value="<?php echo $c_name ?>" name="name" type="text" placeholder="e.g Food"
                                    class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_name'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_name']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <input value="<?php echo $c_sub ?>" name="sub_name" type="text"
                                    placeholder="e.g Biscuits" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_sub_name'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_sub_name']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Category starting price</label>
                                <input value="<?php echo $c_price ?>" name="price" type="number" placeholder="e.g Rs.50"
                                    class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_price'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_price']}
                                        </p>";
                                    }
                                ?>
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
                            <img width="70px" height="70px" class="my-3 d-block preview-image"
                                src="./<?php echo $c_image ?>" alt="Preview Image">
                            <button class="btn text-white bg-orange w-100 my-2">
                                Update Category
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './boot_js.php' ?>
    <script src="./app.js"></script>
</body>

</html>