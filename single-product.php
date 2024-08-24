<?php 
    $name = $_GET['name'];
    $description = $_GET['description'];
    $category = $_GET['category'];
    $discount_price = $_GET['discount_price'];
    $actual_price = $_GET['actual_price'];
    $rating = $_GET['rating'];
    $image = $_GET['image'];
    $video = $_GET['video'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './boot_css.php' ?>
    <link rel="stylesheet" href="./styles.css">
    <title>Temu | <?php echo $name ?></title>
</head>

<body>
    <?php include './navbar.php' ?>

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

            </div>
            <div class="col-lg-6">
                <div class="card border-0">

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
    let desc_card border - 0 = document.querySelectorAll('.desc-card border-0')
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