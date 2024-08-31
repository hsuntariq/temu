<?php 
session_start();
    $name = $_GET['name'];
    $description = $_GET['description'];
    $category = $_GET['category'];
    $discount_price = $_GET['discount_price'];
    $actual_price = $_GET['actual_price'];
    $rating = $_GET['rating'];
    $image = $_GET['image'];
    $video = $_GET['video'];
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './boot_css.php' ?>
    <link rel="stylesheet" href="./styles.css">
    <title>Temu | <?php echo $name ?></title>
    <style>
    .rating {
        direction: rtl;
        display: flex;
        gap: 5px;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 2rem;
        color: #ddd;
        cursor: pointer;
    }

    .rating input:checked~label {
        color: gold;
    }

    .rating label:hover,
    .rating label:hover~label {
        color: gold;
    }

    input[type='text'] {
        box-shadow: none !important;
    }

    .container,
    .row {
        overflow: visible;
        /* Ensure parent elements have visible overflow */
    }
    </style>
</head>

<body>
    <?php include './navbar.php' ?>
    <?php 
        if(isset($_SESSION['rating_success'])){
    ?>

    <div style="width: 10%;background:#ACDDDE;top:20px;left:50%;transform:translateX(-50%);transition:all 0.9s;overflow:hidden"
        class="flash-message shadow-lg rounded-3 text-center text-white fw-medium p-2 rounded-pill position-fixed ">
        <i style="clip-path: circle();" class="bi bi-check bg-success text-white fw-bolder "></i>
        <?php echo $_SESSION['rating_success'] ?>
    </div>


    <?php 
        }
        unset($_SESSION['rating_success']);
    ?>

    <div class="container my-3 ">

        <!-- find the data relavent to the category id -->
        <?php 
        include './config.php';
        $getData = "SELECT * FROM category WHERE id = $category";
        $result = mysqli_query($connection,$getData);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
     ?>
        <p class="text-sm text-secondary m-0">
            Home > <?php echo $row['category_name'] ?> > <?php echo $row['sub_category_name'] ?> > <?php echo $name ?>
        </p>
        <?php }}?>


        <div class="row ">
            <div class="col-lg-6">
                <div class="card border-0">

                    <div class="row">
                        <div class="col-1 p-0">
                            <div class="bg-danger w-100" style="height:60px"></div>
                            <div class="bg-primary w-100" style="height:60px"></div>
                            <div class="bg-info w-100" style="height:60px"></div>
                        </div>
                        <div class="col-11 p-0">
                            <img width="100%" height="700px" style="object-fit: cover;"
                                src="./product_images/<?php echo $image?>" alt="">
                        </div>
                    </div>

                </div>
                <?php 
                        include './config.php';
                        $count = "SELECT COUNT(id) AS total_reviews FROM reviews WHERE product_id = $id";
                        $count_data = mysqli_query($connection,$count);
                        if(mysqli_num_rows($count_data) > 0){
                            while($row_count = mysqli_fetch_assoc($count_data)){
                                ?>


                <div class="d-flex gap-3 align-items-center my-3">
                    <h5><?php echo $row_count['total_reviews'] ?> reviews</h5>
                    <p>|</p>
                    <h5>
                        4.3 🌟🌟🌟🌟🌟
                    </h5>
                </div>
                <div class="d-flex">

                    <h6>Item reviews (<?php echo $row_count['total_reviews'] ?>) </h6>
                    <?php 
                            }
                        }else{
                            echo "<h5>No reviews yet</h5>";
                        }
                    ?>
                </div>
                <form action="./add-review.php" method="POST"
                    class="d-flex jusitfy-content-between align-items-center border rounded-3 my-2">
                    <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>">
                    <input type="text" placeholder="add a review..." name="review" class="form-control border-0">

                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="star5">
                        <label for="star5">★</label>
                        <input type="radio" name="rating" value="4" id="star4">
                        <label for="star4">★</label>
                        <input type="radio" name="rating" value="3" id="star3">
                        <label for="star3">★</label>
                        <input type="radio" name="rating" value="2" id="star2">
                        <label for="star2">★</label>
                        <input type="radio" name="rating" value="1" id="star1">
                        <label for="star1">★</label>
                    </div>

                    <button class="bg-transparent border-0">
                        <i class="bi bi-send "></i>
                    </button>
                </form>
                <hr>


                <?php 
                    include './config.php';
                    $join = "SELECT users.id AS user_id,users.username,users.image,products.id AS product_id,reviews.id AS review_id,reviews.review,reviews.rating,reviews.likes,reviews.dislikes FROM reviews JOIN users ON reviews.user_id = users.id JOIN products ON reviews.product_id = products.id ORDER BY(reviews.id) DESC LIMIT 5";
                    $join_result = mysqli_query($connection,$join);
                    if(mysqli_num_rows($join_result) > 0){
                        while($join_row = mysqli_fetch_assoc($join_result)){
                ?>
                <div class="d-flex">
                    <?php 
                                    if($join_row['image'] != NULL){
                                        echo "<img width='40px' height='40px' class='rounded-circle' src='{$join_row['image']}'>";
                                    }else{
                                        echo "<img width='40px' height='40px' class='rounded-circle' src='https://beforeigosolutions.com/wp-content/uploads/2021/12/dummy-profile-pic-300x300-1.png' >";
                                    }
                                ?>
                    <h6><?php echo $join_row['username'] ?></h6>
                </div>
                <div class="d-flex">
                    <?php 
                                    for ($i=0; $i < $join_row['rating']; $i++) { 
                                        echo "⭐";
                                    }
                                ?>
                </div>

                <p class="text-secondary mb-2">
                    <?php echo $join_row['review'] ?>
                </p>

                <?php }}?>

                <button class="btn btn-outline-dark rounded-pill">
                    See all reviews
                </button>

            </div>
            <div class="col-lg-6 position-relative" style="max-height:900px">
                <div class="card border-0" id="stickyDiv">

                    <p>
                        <?php echo $description ?>
                    </p>
                    <h6 class="d-flex align-items-center text-orange"><sub style="font-size: 0.7rem;">Rs.</sub>
                        <span class="dis-pri fs-4">
                            <?php echo $discount_price ?>
                        </span>
                        .<sub style="font-size: 0.5rem;">00</sub>
                    </h6>
                    <h6>Color:</h6>
                    <div class="d-flex w-75 gap-3 text-center my-3">
                        <div class="card">
                            <img width="100%"
                                src="https://img.kwcdn.com/product/Fancyalgo/VirtualModelMatting/d1a53d52f6d7381ddbdfae8dc9d77a8b.jpg?imageView2/2/w/800/q/70/format/webp"
                                alt="">
                            <h6>Army Green</h6>
                        </div>
                        <div class="card">
                            <img width="100%"
                                src="https://img.kwcdn.com/product/Fancyalgo/VirtualModelMatting/d1a53d52f6d7381ddbdfae8dc9d77a8b.jpg?imageView2/2/w/800/q/70/format/webp"
                                alt="">
                            <h6>Army Green</h6>
                        </div>
                        <div class="card">
                            <img width="100%"
                                src="https://img.kwcdn.com/product/Fancyalgo/VirtualModelMatting/d1a53d52f6d7381ddbdfae8dc9d77a8b.jpg?imageView2/2/w/800/q/70/format/webp"
                                alt="">
                            <h6>Army Green</h6>
                        </div>
                        <div class="card">
                            <img width="100%"
                                src="https://img.kwcdn.com/product/Fancyalgo/VirtualModelMatting/d1a53d52f6d7381ddbdfae8dc9d77a8b.jpg?imageView2/2/w/800/q/70/format/webp"
                                alt="">
                            <h6>Army Green</h6>
                        </div>
                    </div>
                    <h6>Size(PK):</h6>
                    <div class="d-flex flex-wrap">
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                        <div class="border my-1 mx-1 p-1 rounded-pill">
                            11.5 Little kid
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- here goes the products -->


        <div class="row">
            <?php 
                include './config.php';
                $select_products = "SELECT * FROM products WHERE category = $category";
                $product_result = mysqli_query($connection,$select_products);
                if(mysqli_num_rows($product_result) > 0){
                    while($product_row = mysqli_fetch_assoc($product_result)){
            ?>


            <a href="./single-product.php?id=<?php echo $product_row['id'] ?>&name=<?php echo $product_row['name'] ?>&discount_price=<?php echo $product_row['discount'] ?>&actual_price=<?php echo $product_row['price'] ?>&description=<?php echo $product_row['description'] ?>&image=<?php echo $product_row['image'] ?>&video=<?php echo $product_row['video'] ?>&category=<?php echo $product_row['category'] ?>&rating=<?php echo $product_row['rating'] ?>"
                class="col-xl-3 text-dark text-decoration-none col-lg-4 col-md-6   ">
                <div style="height: 400px;" class="card desc-card border-0 shadow my-2  p-2 ">
                    <div class="d-flex flex-column gap-2 position-relative">
                        <div class="media-wrapper position-relative ">
                            <img width="100%" style="object-fit:cover;" height="290px" class="product-image"
                                src="./product_images/<?php echo $product_row['image'] ?>" alt="">

                            <video width="100%" height="290px" style="object-fit:cover;display:none"
                                class=" product-video" autoplay loop muted
                                src="./product_videos/<?php echo $product_row['video'] ?>"></video>

                            <?php 
                                if($product_row['video'] != ''){
                                    echo " <i class='bi bi-play bg-secondary fs-5 start-0 text-white position-absolute bottom-0 d-flex justify-content-center align-items-center m-1 '
                                        style='clip-path: circle();'></i>"; 
                                }
                            ?>

                        </div>
                        <p class="text-sm m-0 desc  ">
                            <?php echo $product_row['description'] ?>
                        </p>
                        <div style="width: 300px;background:rgba(255,255,255,0.8);font-size:0.6rem"
                            class="text-sm fw-medium  z-3 overlay-paragraph p-3 rounded-3 position-fixed">
                        </div>
                        <div class="d-flex flex-wrap justify-content-around align-items-center">
                            <i class="bi bi-lightning-charge-fill text-orange"></i>
                            <h6 class="d-flex align-items-center text-orange"><sub style="font-size: 0.7rem;">Rs.</sub>
                                <span class="dis-pri">
                                    <?php echo $product_row['discount'] ?>
                                </span>
                                .<sub style="font-size: 0.5rem;">00</sub>
                            </h6>
                            <p class="text-secondary text-sm text-decoration-line-through" style="font-size:0.7rem">
                                Rs. <span class="pri"><?php echo $product_row['price'] ?></span> .00
                            </p>
                            <p class="text-sm text-secondary">
                                2.9k+ sold
                            </p>
                            <div class="border dis rounded-2 text-sm">
                                -74%
                            </div>
                        </div>
                        <div class="d-flex align-items-center  gap-2">
                            <div class="bg-dark-subtle d-flex position-relative" style="height:3px;width:50%">
                                <div class="d-flex align-items-center position-absolute"
                                    style="top:50%;transform:translateY(-50%)">
                                    <div class="bg-dark bg-dark" style="height:3px;width:100px"></div>
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                            <h6 style="font-size:0.7rem">01:22:31:53</h6>
                            <div class="self-align-end d-flex justify-content-end w-25">
                                <i class="bi bi-cart-plus fs-4 self-align-end"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </a>



            <?php 
                    }}
?>

        </div>


    </div>








    <script>
    let menu_icon = document.querySelector('.menu-icon')
    let flash = document.querySelector('.flash-message')
    let underlay = document.querySelector('.underlay')
    let sidebar = document.querySelector('.sidebar')
    let close = document.querySelector('.bi-x-lg')
    let discounts = document.querySelectorAll('.dis')
    let dis_price = document.querySelectorAll('.dis-pri')
    let act_price = document.querySelectorAll('.pri')
    let description = document.querySelectorAll('.desc')
    let overlay_para = document.querySelectorAll('.overlay-paragraph')
    let desc_card = document.querySelectorAll('.desc-card border-0')
    let media_wrapper = document.querySelectorAll('.media-wrapper')
    let product_image = document.querySelectorAll('.product-image')
    let product_video = document.querySelectorAll('.product-video')

    let sticky = document.querySelector('#stickyDiv')
    let bar = document.querySelector('.top-bar')
    bar.style.position = 'sticky';
    bar.style.top = 0
    bar.style.zIndex = 222
    bar.style.transition = 'all 0.3s'
    // sticky.style.transition = 'all 0.1s'

    window.addEventListener('scroll', () => {
        if (pageYOffset > 50 && pageYOffset < 100) {
            bar.style.transform = 'translateY(-110%)'
        } else if (pageYOffset < 50) {
            bar.style.transform = 'translateY(0)'
            sticky.style.transform = 'translateY(0px)';
        } else if (pageYOffset >= 100) {
            setTimeout(() => {
                bar.style.transform = 'translateY(0%)'
                sticky.style.transform = 'translateY(100px)';
            }, 1000)

        }
    })


    window.addEventListener('scroll', () => {
        if (pageYOffset >= 100 && pageYOffset < 1060) {
            sticky.style.position = 'fixed';
            sticky.style.width = '33%';
            sticky.style.top = '4px';

            // sticky.style.top = '100px';


        } else {
            sticky.style.position = 'relative';
            sticky.style.top = '4px';
            sticky.style.width = '100%';
            sticky.style.transform = 'translateY(0px)';

        }








    })





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


    setTimeout(() => {
        flash.style.transform = 'translate(-50%,-100px) scale(0)'
        flash.style.opacity = 0
    }, 2000);















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