<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include './boot_css.php' ?>
    <link rel="stylesheet" href="./styles.css">
    <title>Temu | Shop for clothing,Shoes & Jewellery</title>


    <style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        margin: 0 !important;
        padding: 0 !important;
    }


    .offers {
        margin: 2rem 0;
        padding: 1rem;
        background-image: url('https://www.freevector.com/uploads/vector/preview/7863/FreeVector-Space-Vector-Graphics.jpg');
        color: white;
        background-position: center center;
    }

    .text-sm {
        font-size: 0.9rem;
    }


    .text-orange {
        color: #fe7731 !important;
    }

    .my-deals {
        overflow: auto;
        transition: all 0.90s;
        /* Ensure that scrollbar can appear */
    }

    .my-deals::-webkit-scrollbar {
        transition: all 0.90s;

        height: 0;
    }

    .my-deals:hover::-webkit-scrollbar {
        height: 5px !important;
    }


    .my-deals::-webkit-scrollbar-thumb {
        background-color: gray;
        border-radius: 10px;
    }

    .my-cat {
        overflow-x: auto;
        overflow-y: hidden !important;
        transition: all 0.90s;
        width: 100%;
        /* Ensure that scrollbar can appear */
    }

    .my-cat::-webkit-scrollbar {
        transition: all 0.90s;

        height: 0;
    }

    .my-cat:hover::-webkit-scrollbar {
        height: 5px !important;
    }


    .my-cat::-webkit-scrollbar-thumb {
        background-color: gray;
        border-radius: 10px;
    }

    .categories {
        /* overflow-x: auto; */

    }
    </style>

</head>

<body>
    <?php include './navbar.php' ?>

    <section class="slider">
        <div class="front-image"></div>
    </section>

    <section style="overflow: hidden;"
        class="container categories my-3 d-flex flex-column jusitfy-content-center align-items-center">
        <img width="300px"
            src="https://aimg.kwcdn.com/material-put/1f79700000/93b1835a-b3e3-4fae-a7c7-1e7b23197fc6.png">
        <h3 class=" p-0" style="margin-top:-2rem">Categories</h3>
        <div class="d-flex my-cat gap-4">

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
    <!-- deals & offers -->
    <section class="deals container my-3">
        <div class="d-flex offers gap-3 rounded-2 align-items-center justify-content-center">
            <i class="bi bi-lightning-charge-fill">
            </i>
            <h2><i>Lightining Deals</i></h2>
            <p class="fw-bold text-sm">Limited time offer</p>
            <i class="bi bi-chevron-right"></i>
        </div>
        <section class="my-deals row" style="overflow-x:scroll">
            <?php 
                include './config.php';
                $select = "SELECT * FROM deals WHERE status = 1";
                $result = mysqli_query($connection,$select);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-lg-3">
                <div class="card border-0 shadow my-2  p-2">
                    <div class="d-flex flex-column gap-4">

                        <img width="100%" src="./deal_images/<?php echo $row['image'] ?>" alt="">
                        <div class="d-flex flex-wrap justify-content-around align-items-center">
                            <i class="bi bi-lightning-charge-fill text-orange"></i>
                            <h6 class="d-flex align-items-center text-orange"><sub style="font-size: 0.7rem;">Rs.</sub>
                                <span class="dis-pri">
                                    <?php echo $row['price'] ?>
                                </span>
                                .<sub style="font-size: 0.5rem;">00</sub>
                            </h6>
                            <p class="text-secondary text-sm text-decoration-line-through">
                                Rs. <span class="pri"><?php echo $row['discount'] ?></span> .00
                            </p>
                            <p class="text-sm text-secondary">
                                2.9k+ sold
                            </p>
                            <div class="border dis rounded-2 text-sm">
                                -74%
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-dark-subtle d-flex position-relative" style="height:3px;width:50%">
                                <div class="d-flex align-items-center position-absolute"
                                    style="top:50%;transform:translateY(-50%)">
                                    <div class="bg-dark bg-dark" style="height:3px;width:100px"></div>
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                            <h6 style="font-size:0.7rem">01:22:31:53</h6>
                        </div>
                    </div>
                </div>

            </div>
            <?php 
                    }}
        ?>
        </section>
    </section>



    <!-- products -->


    <div class="container ">
        <img width="250px" style="margin-bottom: -1.5rem;" class="d-block mx-auto"
            src="https://aimg.kwcdn.com/material-put/1f79700000/93b1835a-b3e3-4fae-a7c7-1e7b23197fc6.png" alt="">
        <h2 class=" text-center text-capitalize">Explore your intersts</h2>
        <div class="d-flex my-4 align-items-center gap-3">
            <?php 
                $select_category = "SELECT * FROM category";
                $result_category = mysqli_query($connection,$select_category);
                if(mysqli_num_rows($result_category) > 0 ){
                    while($row_category = mysqli_fetch_assoc($result_category)){
            ?>
            <div class="col-1">
                <div class="card rounded-pill d-flex justify-content-center align-items-center text-center px-4"
                    style="height: 50px;">

                    <p class="text-sm m-0 fw-medium">
                        <?php echo $row_category['category_name'] ?>
                    </p>
                </div>
            </div>
            <?php }}?>
        </div>



        <section class="my-deals row" style="overflow-x:scroll">
            <?php 
                include './config.php';
                $select = "SELECT * FROM products";
                $result = mysqli_query($connection,$select);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-lg-3">
                <div style="height: 400px;" class="card desc-card border-0 shadow my-2  p-2 ">
                    <div class="d-flex flex-column gap-2 position-relative">
                        <div class="media-wrapper position-relative ">
                            <img width="100%" style="object-fit:cover;" height="290px" class="product-image"
                                src="./product_images/<?php echo $row['image'] ?>" alt="">

                            <video width="100%" height="290px" style="object-fit:cover;display:none"
                                class=" product-video" autoplay loop muted
                                src="./product_videos/<?php echo $row['video'] ?>"></video>

                            <?php 
                                if($row['video'] != ''){
                                    echo " <i class='bi bi-play bg-secondary fs-5 start-0 text-white position-absolute bottom-0 d-flex justify-content-center align-items-center m-1 '
                                        style='clip-path: circle();'></i>"; 
                                }
                            ?>

                        </div>
                        <p class="text-sm m-0 desc  ">
                            <?php echo $row['description'] ?>
                        </p>
                        <div style="width: 300px;background:rgba(255,255,255,0.8);font-size:0.6rem"
                            class="text-sm fw-medium  z-3 overlay-paragraph p-3 rounded-3 position-fixed">
                        </div>
                        <div class="d-flex flex-wrap justify-content-around align-items-center">
                            <i class="bi bi-lightning-charge-fill text-orange"></i>
                            <h6 class="d-flex align-items-center text-orange"><sub style="font-size: 0.7rem;">Rs.</sub>
                                <span class="dis-pri">
                                    <?php echo $row['discount'] ?>
                                </span>
                                .<sub style="font-size: 0.5rem;">00</sub>
                            </h6>
                            <p class="text-secondary text-sm text-decoration-line-through" style="font-size:0.7rem">
                                Rs. <span class="pri"><?php echo $row['price'] ?></span> .00
                            </p>
                            <p class="text-sm text-secondary">
                                2.9k+ sold
                            </p>
                            <div class="border dis rounded-2 text-sm">
                                -74%
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-dark-subtle d-flex position-relative" style="height:3px;width:50%">
                                <div class="d-flex align-items-center position-absolute"
                                    style="top:50%;transform:translateY(-50%)">
                                    <div class="bg-dark bg-dark" style="height:3px;width:100px"></div>
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                            <h6 style="font-size:0.7rem">01:22:31:53</h6>
                        </div>
                    </div>
                </div>

            </div>
            <?php 
                    }}
        ?>
        </section>


    </div>







    <script>
    let menu_icon = document.querySelector('.menu-icon')
    let underlay = document.querySelector('.underlay')
    let sidebar = document.querySelector('.sidebar')
    let close = document.querySelector('.bi-x-lg')
    let discounts = document.querySelectorAll('.dis')
    let dis_price = document.querySelectorAll('.dis-pri')
    let act_price = document.querySelectorAll('.pri')
    let description = document.querySelectorAll('.desc')
    let overlay_para = document.querySelectorAll('.overlay-paragraph')
    let desc_card = document.querySelectorAll('.desc-card')
    let media_wrapper = document.querySelectorAll('.media-wrapper')
    let product_image = document.querySelectorAll('.product-image')
    let product_video = document.querySelectorAll('.product-video')

    act_price.forEach((item, index) => {
        let dis = item.innerText
        let convertedAmount = parseInt(dis);
        let discountConvertedAmount = parseInt(dis_price[index].innerText)
        let finalAmount = convertedAmount - discountConvertedAmount
        let discountPer = (finalAmount / convertedAmount) * 100
        discounts[index].innerText = `${discountPer.toFixed(0)}%`

    })


    media_wrapper.forEach((item, index) => {
        item.addEventListener('mouseenter', () => {
            setTimeout(() => {
                if (product_video[index].src.length > 37) {
                    product_video[index].style.display = 'block'
                    product_image[index].style.display = 'none'
                }
            }, 500)
        })
    })
    media_wrapper.forEach((item, index) => {
        item.addEventListener('mouseleave', () => {
            setTimeout(() => {
                if (product_video[index].src.length > 37) {

                    product_video[index].style.display = 'none'
                    product_image[index].style.display = 'block'
                }
            }, 500)
        })
    })


    description.forEach((item, index) => {
        item.style.whiteSpace = 'nowrap'; // Prevent wrapping
        item.style.overflow = 'hidden'; // Hide overflowed text
        item.style.textOverflow = 'ellipsis'; // Show ellipsis if text overflows
    })



    overlay_para.forEach((item, index) => {
        item.innerText = description[index].innerText
        item.style.display = 'none'
    })

    overlay_para.forEach((item, index) => {
        let data = item.innerText.substring(0, 400);
        item.innerText = data + '...'
    })





    desc_card.forEach((item, index) => {
        item.addEventListener('mouseenter', (e) => {
            // let card_height = item.getBoundingClientRect()
            setTimeout(() => {
                let x = e.clientX;
                let y = e.clientY;
                overlay_para[index].style.top = `${y}px`;
                overlay_para[index].style.left = `${x-60}px`;
                overlay_para[index].style.display = 'block'
                // overlay_para[index].style.transform = `translate(${x}px,${y}px)`
            }, 500);
            // overlay_para[index].style.transform =
        })
    })
    desc_card.forEach((item, index) => {
        item.addEventListener('mouseleave', () => {

            setTimeout(() => {
                overlay_para[index].style.display = 'none'
            }, 500);


        })
    })






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