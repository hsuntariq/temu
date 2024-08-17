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
    </style>
    <title>
        Temu | Deals & Offers
    </title>
</head>

<body>



    <?php 
        if(isset($_SESSION['deals_success'])){
    ?>

    <div style="width: 20%;background:#FE7731;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-check2-circle text-white fw-bolder p-2 bg-success"></i> Category
        Inserted
        Successfully!
    </div>

    <?php 
        }else if(isset($_SESSION['deals_error'])){
            ?>

    <div style="width: 10%;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message bg-danger text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-x text-white fw-bolder p-1 bg-warning"></i>
        <?php 
                echo $_SESSION['deals_error']
            ?>
    </div>

    <?php }
        unset($_SESSION['deals_success']);
        unset($_SESSION['deals_error']);
    ?>


    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-2 col-lg-3 sidebar">
                <?php include './admin-sidebar.php'  ?>
            </div>
            <div class="col-xl-10 col-lg-9 p-0">
                <?php include './admin-header.php' ?>
                <div class="container col-xl-5 col-lg-7 col-md-9 col-sm-10">
                    <div class="card p-5 shadow border-0 my-5">
                        <h1 class="display-4 text-center text-orange">
                            Add Deals & Offers
                        </h1>
                        <form action="./add-deals-data.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label for="">Deal Name</label>
                                <input name="name" type="text" placeholder="e.g Today" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_name'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_name']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Discount</label>
                                <input name="discount" type="number" placeholder="e.g Biscuits" class="form-control">
                                <?php 
                                    if(isset($_SESSION['empty_sub_name'])){
                                        echo "<p class='text-danger p-0 m-0 fw-bold'>
                                            {$_SESSION['empty_sub_name']}
                                        </p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">List Price</label>
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
                                <label for="">Time</label>
                                <input name="time" type="time" placeholder="e.g remaining time"
                                    class="form-control image-input">

                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input name="image" type="file" class="form-control image-input">

                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-select" id="">
                                    <option class="form-control" value="1">Active</option>
                                    <option class="form-control" value="0">In active</option>
                                </select>

                            </div>
                            <img width="70px" height="70px" class="  my-3  preview-image" src="" alt="Preview Image">
                            <button class="btn text-white bg-orange w-100 my-2">
                                Add Deal
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


    <script src="./app.js"></script>



</body>

</html>