<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './boot_css.php' ?>
    <link rel="stylesheet" href="./styles.css">
    <title>Temu</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 sidebar">
                <?php include './admin-sidebar.php' ?>
            </div>
            <div class="col-xl-10 col-lg-9 content p-0">
                <header class="p-3 shadow">
                    <h2 class="text-dashboard" style="color: #FE7731;">Dashboard</h2>
                </header>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card border-0 text-center p-3 shadow-lg my-5">
                                <i class="bi bi-person fs-1"></i>
                                <p class="display-6">
                                    2500
                                </p>
                                <p class="text-secondary">
                                    Welcome
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card border-0 text-center p-3 shadow-lg my-5">
                                <i class="bi bi-person fs-1"></i>
                                <p class="display-6">
                                    2500
                                </p>
                                <p class="text-secondary">
                                    Welcome
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card border-0 text-center p-3 shadow-lg my-5">
                                <i class="bi bi-person fs-1"></i>
                                <p class="display-6">
                                    2500
                                </p>
                                <p class="text-secondary">
                                    Welcome
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="card border-0 text-center p-3 shadow-lg my-5">
                                <i class="bi bi-person fs-1"></i>
                                <p class="display-6">
                                    2500
                                </p>
                                <p class="text-secondary">
                                    Welcome
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php 
        include './boot_js.php'
    ?>


</body>

</html>