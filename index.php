<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include './boot_css.php' ?>
    <link rel="stylesheet" href="./styles.css">
    <title>Temu | Shop for clothing,Shoes & Jewellery</title>

</head>

<body>
    <?php include './navbar.php' ?>

    <section class="slider">
        <div class="front-image"></div>
    </section>

    <section class="container my-3 d-flex flex-column  jusitfy-content-center align-items-center">
        <img width="300px"
            src="https://aimg.kwcdn.com/material-put/1f79700000/93b1835a-b3e3-4fae-a7c7-1e7b23197fc6.png">
        <h3 class=" p-0" style="margin-top:-2rem">Categories</h3>
        <div class="d-flex gap-4">

            <?php 
                include './config.php';
                $select = "SELECT * FROM category";
                $result = mysqli_query($connection,$select);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>


            <section class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle border"
                    src="./category_images/<?php echo $row['image'] ?>" alt="temu category image"
                    style="object-fit:contain">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From Rs. <?php echo $row['price'] ?>
                    </h6>
                </div>
                <h5>
                    <?php echo $row['category_name'] ?>
                </h5>
            </section>

            <?php }}?>










        </div>
    </section>












    <script>
    let menu_icon = document.querySelector('.menu-icon')
    let underlay = document.querySelector('.underlay')
    let sidebar = document.querySelector('.sidebar')
    let close = document.querySelector('.bi-x-lg')

    menu_icon.addEventListener('click', () => {

        underlay.style.transform = 'translateX(0)'
        underlay.style.opacity = '1'
        sidebar.style.transform = 'translateX(0%)'



    })
    close.addEventListener('click', () => {
        sidebar.style.transform = 'translateX(-100%)'
        underlay.style.opacity = '0'
        underlay.style.transform = 'translateX(-100%)'

    })
    </script>



</body>

</html>