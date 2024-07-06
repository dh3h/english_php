<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php')
?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="./" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Practice</div>
    <div class="right">
        <!-- <a href="javascript:;" class="headerButton">
                <ion-icon name="videocam-outline"></ion-icon>
            </a> -->
        <!-- <a href="javascript:;" class="headerButton">
                <ion-icon name="call-outline"></ion-icon>
                <span class="badge badge-danger">1</span>
            </a> -->
    </div>
</div>
<!-- * App Header -->
<!-- App Capsule -->
<div id="appCapsule">
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <a href="challange.php">
                    <div class="card product-card" style="background: antiquewhite;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/chalanges.png" class="image" style="width: 30%;" alt="product image">
                            <h2 class="title">Challenges</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="practice-tips.php">
                    <div class="card product-card" style="background: #d7fae1;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/tips.png" class="image" style="width: 21%;" alt="product image">
                            <h2 class="title">Tips</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="practice-news.php">
                    <div class="card product-card" style="background: #d8d7fa;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/news.png" class="image" style="width: 21%;" alt="product image">
                            <h2 class="title">News</h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 mt-2">
                <a href="practice-artical.php">
                    <div class="card product-card" style="background: #d7faf9;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/artical.png" class="image" style="width: 30%;" alt="product image">
                            <h2 class="title">Articles</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="practice-game.php">
                    <div class="card product-card" style="background: #edc7ef;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/game.png" class="image" style="width: 20%;" alt="product image">
                            <h2 class="title">Games</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="practice-video.php">
                    <div class="card product-card" style="background: #f5fad7;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/video.png" class="image" style="width: 20%;" alt="product image">
                            <h2 class="title">Videos</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="">
                    <div class="card product-card" style="background: #d7faed;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/audio.png" class="image" style="width: 25%;" alt="product image">
                            <h2 class="title">Audios</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 mt-2">
                <a href="practice-books.php">
                    <div class="card product-card" style="background: #cabbf7;">
                        <div class="card-body text-center">
                            <img src="./assets/img/icon/book.png" class="image" style="width: 20%;" alt="product image">
                            <h2 class="title">Books</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>