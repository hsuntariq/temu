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

    <div class="slider">
        <div class="front-image"></div>
    </div>

    <div class="container my-3 d-flex flex-column  jusitfy-content-center align-items-center">
        <img width="300px"
            src="https://aimg.kwcdn.com/material-put/1f79700000/93b1835a-b3e3-4fae-a7c7-1e7b23197fc6.png">
        <h3 class=" p-0" style="margin-top:-2rem">Categories</h3>
        <div class="d-flex gap-4">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://image.doba.com/dgd-TtqWfrDGScbp/kids-sneakers-boys-super-light-air-cushion-running-shoes-casual-outdoor-breathable-anti-slippery-sports-shoes-soft-jogging-flats.webp"
                    alt="">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://jdcorporateblog.com/wp-content/uploads/2017/12/5a14f6ebN5269b5ee.png" alt="">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://geekspeakcommerce.com/blog/wp-content/uploads/2016/02/5a.png" alt="">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://i0.wp.com/www.inspiringwit.com/wp-content/uploads/2023/01/Navy_LMBambini-14-scaled.jpg">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://blog.lengow.com/wp-content/uploads/2016/05/prince-george-1.png" alt="">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://img.fruugo.com/product/0/13/1525480130_0340_0340.jpg" alt="">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>

            <div class="d-flex flex-column align-items-center justify-content-center">
                <img width="150px" height="150px" class="rounded-circle"
                    src="https://img.fruugo.com/product/3/07/1345507073_max.jpg" alt="">
                <div class="from">
                    <h6 class="m-0 p-0">
                        From $0.98
                    </h6>
                </div>
                <h5>Product Name</h5>
            </div>











        </div>
    </div>












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