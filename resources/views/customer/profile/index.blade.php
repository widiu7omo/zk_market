<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">

    <title>Website title - bootstrap html template</title>

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>


    <!-- plugin: fancybox  -->
    <script src="plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
    <link href="plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">


    <!-- Font awesome 5 -->
    <link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="css/mobile.css" rel="stylesheet" type="text/css"/>


    <!-- custom javascript -->
    <script src="js/script.js" type="text/javascript"></script>

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

        });
        // jquery end
    </script>

</head>
<body>


<!-- =============== screen-wrap =============== -->
<div class="screen-wrap">


    <header class="app-header bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i class="fa fa-arrow-left"></i></a>
        <div class="header-right"> <a href="#" class="btn-header">Log out</a></div>
    </header> <!-- section-header.// -->


    <main class="app-content">

        <section class="padding-x pb-3 bg-primary text-white">
            <figure class="icontext align-items-center mr-4" style="max-width: 300px;">
                <img class="icon icon-md rounded-circle" src="images/avatars/1.jpg">
                <figcaption class="text">
                    <p class="h5 title">Mr. Jackson</p>
                    <p class="text-white-50">+13012345678</p>
                </figcaption>
            </figure>
        </section>

        <section class="padding-around">
            <ul class="row">
                <li class="col-4">
                    <a href="#" class="btn-card-icontop btn">
                        <span class="icon"> <i class="fa fa-heart"></i> </span>
                        <small class="text text-center"> Wishlist </small>
                    </a>
                </li>
                <li class="col-4">
                    <a href="#" class="btn-card-icontop btn">
                        <span class="icon"> <i class="fa fa-shopping-basket"></i> </span>
                        <small class="text text-center"> Purchases</small>
                    </a>
                </li>
                <li class="col-4">
                    <a href="#" class="btn-card-icontop btn">
                        <span class="icon"> <i class="fa fa-wallet"></i> </span>
                        <small class="text text-center"> Wallet</small>
                    </a>
                </li>
            </ul>
        </section>

        <hr class="divider">

        <section class="padding-top">
            <h5 class="title-section padding-x">Orders</h5>
            <nav class="nav-list">
                <a class="btn-list" href="#">
                    <span class="float-right badge badge-warning">3</span>
                    <span class="text">On proccess</span>
                </a>
                <a class="btn-list" href="#">
                    <span class="float-right badge badge-success">1</span>
                    <span class="text">Shipped</span>
                </a>
                <a class="btn-list" href="#">
                    <span class="float-right badge badge-secondary">0</span>
                    <small class="title"></small>
                    <span class="text">Unpaid</span>
                </a>
            </nav>
        </section>
        <hr class="divider">
        <section class="padding-top">
            <h5 class="title-section padding-x">Account</h5>
            <nav class="nav-list">
                <a class="btn-list" href="#">
                    <i class="icon-control fa fa-chevron-right"></i>
                    <span class="text">Notifications</span>
                </a>
                <a class="btn-list" href="#">
                    <i class="icon-control fa fa-chevron-right"></i>
                    <span class="text">Settings</span>
                </a>
                <a class="btn-list" href="#">
                    <i class="icon-control fa fa-chevron-right"></i>
                    <span class="text">Support</span>
                </a>
            </nav>
        </section>

        <hr class="divider">
        <section class="padding-top">
            <h5 class="title-section padding-x">Personal</h5>
            <nav class="nav-list">
                <a class="btn-list" href="page-profile-edit.html">
                    <i class="icon-action fa fa-pen"></i>
                    <small class="title">Username</small>
                    <span class="text">@vosidiy</span>
                </a>
                <a class="btn-list" href="page-profile-edit.html">
                    <i class="icon-action fa fa-pen"></i>
                    <small class="title">Email</small>
                    <span class="text">myname@gmail.com</span>
                </a>
            </nav>
        </section>
        <br>

        <p class="text-center my-4"><a href="index.html" class="btn btn-light"> <i class="fa fa-arrow-left"></i> <span class="text">More pages</span></a></p>


    </main>

    <!-- nav-bottom -->
    @include('customer/_partials/navbar')


</div>
<!-- =============== screen-wrap end.// =============== -->



</body>
</html>
