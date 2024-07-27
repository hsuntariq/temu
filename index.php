<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/a/a6/Temu_logo.svg" type="image/x-icon">
    <?php include './boot_css.php' ?>
    <style>
    .text-sm {
        font-size: 0.7rem;
    }

    .all {
        background-color: #ACADAE;

    }

    .menu-icon {
        display: none;
        transform: translateY(-5px);

    }

    .search-bar2 {
        display: none !important;
    }


    nav {
        justify-content: space-around;
    }

    .underlay {
        position: fixed;
        top: 0;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        width: 100vw;
        transition: all 0.4s ease-in;
        transform: translateX(-100%);
        display: none;
    }


    .sidebar {
        transition: all 0.3s
    }


    @media only screen and (max-width:800px) {

        .location,
        .language,
        .returns {
            display: none !important;
        }

        .menu-icon {
            display: block;
        }


        .underlay {
            display: block !important;
        }

    }


    @media only screen and (max-width:650px) {
        .search-bar {
            display: none !important;
        }


        nav {
            justify-content: flex-start !important;

        }


        .search-bar2 {
            display: flex !important;
            width: 100%;
            margin: 0.5rem auto;
        }

        .cart {
            position: absolute;
            right: 0;
        }

        .sign-in {
            position: absolute;
            right: 10%;
        }



    }
    </style>
    <title>Temu | Shop for clothing,Shoes & Jewellery</title>

</head>

<body>
    <?php include './navbar.php' ?>














    <script>
    let menu_icon = document.querySelector('.menu-icon')
    let underlay = document.querySelector('.underlay')
    let sidebar = document.querySelector('.sidebar')
    let close = document.querySelector('.bi-x-lg')

    menu_icon.addEventListener('click', () => {
        underlay.style.transform = 'translateX(0)'
        underlay.style.opacity = '1'
        sidebar.style.transform = 'translateX(0)'
    })
    close.addEventListener('click', () => {
        sidebar.style.transform = 'translateX(-100%)'
        underlay.style.opacity = '0'
    })
    </script>



</body>

</html>