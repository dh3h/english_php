<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title> Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->
    <div class="appHeader transparent">
        <div class="left">
            <a href="" class="headerButton">
                <ion-icon name="chevron-back-outline" role="img" class="md hydrated" aria-label="chevron back outline"></ion-icon>
                Back
            </a>
        </div>

    </div>

    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="./assets/img/app-assets/login-image.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>Get started</h1>
                <h4>Fill the form to log in</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="page-register.php">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email1" placeholder="Email address">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password1" placeholder="Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-links mt-2">
                        <div>
                            <a href="page-register.php">Register Now</a>
                        </div>
                        <div><a href="page-register.php" class="text-muted">Forgot Password?</a></div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block rounded btn-lg mt-2"> <img src="./assets/img/app-assets/facebook-icon.png" class="pr-2" alt=""> Facebook</button>
                    <div class="form-links mt-1">
                        <!-- <button type="submit" class="btn btn-outline-primary rounded btn-block btn-lg mt-2"> <img src="./assets/img/app-assets/instagram-icon.png" class="pr-2" alt=""> Instagram</button> -->
                        <button type="submit" class="btn btn-outline-primary rounded btn-block btn-lg mt-2"> <img src="./assets/img/app-assets/google-icon.png" class="pr-2" alt=""> Google +</button>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block rounded btn-lg mt-2"> Login</button>
                    <!-- 
                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div> -->

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->



    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>


</body>

</html>