<section class="p-3 top-bar" style="background-color: #151B23;">

    <nav class=" d-flex text-white position-relative  align-items-center" ">
        <i class=" bi bi-list fs-2 menu-icon"></i>
        <div class="logo">
            <img width="100px" src="https://pngimg.com/d/amazon_PNG25.png" alt="">
        </div>
        <div class="location d-flex align-items-center">
            <div class="icon align-self-end">
                <i class="bi bi-geo-alt"></i>
            </div>
            <div class="text">
                <p class="p-0 m-0 text-sm">
                    Deliver to <br> <b>Pakistan</b>
                </p>
            </div>
        </div>
        <div class="search-bar d-flex col-xl-8 col-lg-6 col-sm-5    ">
            <span class="all d-flex px-2 rounded-start-2 justify-content-center align-items-center">
                <p class="m-0 p-0">All </p> <i class="bi bi-chevron-down fs-6"></i>
            </span>

            <input placeholder="Search Temu" type="text" class="form-control rounded-0">

            <span class="search-icon px-3  d-flex px-2 justify-content-center align-items-center rounded-end-2"
                style="background:#D5933B">
                <div class="bi bi-search"></div>
            </span>
        </div>

        <div class="language d-flex">

            <div class="flag">
                <i class="bi bi-globe-americas"></i>
            </div>
            <div class="flag-text d-flex">
                <p class="m-0 p-0"> EN </p>
                <i class="bi bi-chevron-down fs-6"></i>
            </div>
        </div>




        <div class="sign-in">
            <?php 
                if(isset($_SESSION['username'])){
                    
                    $isImage = 'https://i0.wp.com/rssoeroto.ngawikab.go.id/wp-content/uploads/2022/07/user-dummy-removebg.png?ssl=1';
                    
                    if(isset($_SESSION['user_image'])){
                        $isImage = $_SESSION['user_image'] == NULL ? 'https://i0.wp.com/rssoeroto.ngawikab.go.id/wp-content/uploads/2022/07/user-dummy-removebg.png?ssl=1' : $_SESSION['user_image'];
                    }


                    echo "<div class='dropdown '>
                    <button class='text-capitalize dropdown-toggle text-white font-medium bg-transparent border-0' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                      <img width='30px' height='30px' src='{$isImage}' > 
                      Salam {$_SESSION['username']} <br>
                      <span class='w-100'>{$_SESSION['unique_name']}</span>  
                    </button>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='#'> <i class='bi bi-copy me-2 text-info'></i> Update Profile</a></li>
                        <li><a class='dropdown-item' href='./logout.php'> <i class='bi bi-power text-danger me-2'></i> Logout</a></li>
                    </ul>
                    </div>";
                }else{
                    echo "<a href='./auth.php' class='p-0 m-0 text-sm text-white fw-medium text-decoration-none'>
                     Hello,sign in
                    </a><br>
                    <a href='./auth.php' class='text-sm text-white fw-medium text-decoration-none fw-bolder m-0 p-0'>Accounts & Lists</a>";
                }
            ?>

        </div>
        <div class="returns">
            <p class="p-0 m-0 text-sm">
                Returns
            </p>
            <h6 class="text-sm fw-bold m-0 p-0">& Orders</h6>
        </div>
        <div class="cart d-flex">
            <div class="d-flex flex-column">
                <h6 class="text-sm fw-bold p-0 m-0">0</h6>
                <i class="bi bi-cart4 fs-3"></i>
            </div>
        </div><br>

    </nav>
    <div class="search-bar2 d-flex col-xl-8 col-lg-6 col-sm-5    ">
        <span class="all d-flex px-2 rounded-start-2 justify-content-center align-items-center">
            <p class="m-0 p-0">All </p> <i class="bi bi-chevron-down fs-6"></i>
        </span>

        <input placeholder="Search Temu" type="text" class="form-control rounded-0">

        <span class="search-icon px-3  d-flex px-2 justify-content-center align-items-center rounded-end-2"
            style="background:#D5933B">
            <div class="bi bi-search"></div>
        </span>
    </div>
</section>
<?php include './sidebar.php' ?>