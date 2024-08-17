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
    <title>Temu | view deals</title>
</head>

<body>
    <?php 
        if(isset($_SESSION['delete_success'])){
    ?>

    <div style="width: 20%;background:#FE7731;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-check2-circle text-white fw-bolder p-2 bg-success"></i>
        <?php echo $_SESSION['delete_success']?>
    </div>

    <?php 
        }
        unset($_SESSION['delete_success']);
            ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 sidebar">
                <?php include './admin-sidebar.php' ?>
            </div>
            <div class="col-xl-10 col-lg-9 p-0 ">
                <?php include './admin-header.php' ?>

                <div class="my-4 container">
                    <table class="table table-bordered text-center  table-striped text-capitalize">
                        <thead style="background: #FE7731;">
                            <tr>
                                <th>id</th>
                                <th>Deals </th>
                                <th>List Price</th>
                                <th>Discount price</th>
                                <th>image</th>
                                <th>Status</th>
                                <th>Update Status </th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include './config.php';
                                $select = "SELECT * FROM deals";
                                $result = mysqli_query($connection,$select);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>

                                <td> <?php echo $row['id'] ?> </td>
                                <td> <?php echo $row['name'] ?> </td>
                                <td> Rs.<?php echo $row['price'] ?> </td>
                                <td> Rs. <?php echo $row['discount'] ?> </td>
                                <td> Rs. <?php echo $row['discount'] ?> </td>
                                <td class="d-flex align-items-center justify-content-center gap-2">
                                    <?php 
                                            echo $row['status'] == 1 ? ' <div class="p-1 rounded-circle bg-success"></div> active' : ' <div class="bg-secondary p-1 rounded-circle"></div> InActive'
                                        ?>
                                </td>
                                <td>
                                    <a href="./update-status.php?id=<?php echo $row['id'] ?>&status=<?php echo $row['status'] ?>"
                                        class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                </td>

                                <td>
                                    <a href="./delete-category.php?id=<?php echo $row['id'] ?>"
                                        class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>


                            <?php 
                                    }}

                                    
                                        ?>

                            <?php include './boot_js.php';
                    unset($_SESSION['empty_name']);
                    unset($_SESSION['empty_sub_name']);
                    unset($_SESSION['empty_price']);
                    unset($_SESSION['empty_filename']);
                    unset($_SESSION['not_allowed_ext']);    
                    unset($_SESSION['category_error']);    
    
    ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <?php 
    include "./boot_js.php"
?>

    <script src="./app.js"></script>
</body>

</html>