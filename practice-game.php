<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php')
?>
<!-- loader -->
<div id="loader">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- * loader -->
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Games</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <!-- <div class="section mt-2">Play and learn with other students and win coins and tickets</div> -->
    <div class="section">
        <div class="row mt-3">
            <div class="col-6">
                <a href="game-tea-start.php">
                    <div class="card text-white">
                        <img src="assets/img/app-assets/tea.webp" class="card-img overlay-img" alt="image">
                        <div class="card-img-overlay" style="background: rgb(0 0 0 / 6%);">
                            <div class="" style="text-align: center; color:white;">
                                Tea
                            </div>
                        </div>
                        <!-- <div class="card-footer" style="text-align: center; background: #9346d0; color:white;">
                            0 Points
                        </div> -->
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="maintenance.php">
                    <div class="card bg-dark text-white">
                        <img src="assets/img/app-assets/images.png" class="card-img overlay-img" alt="image">
                        <div class="card-img-overlay" style="background: rgb(0 0 0 / 6%);">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="game-Human-hang-game.php">
                    <div class="card bg-dark text-white">
                        <img src="./assets/img/app-assets/hgb.jpg" class="card-img overlay-img" alt="image">
                        <div class="card-img-overlay" style="background: rgb(0 0 0 / 6%);">
                            <div class="" style="text-align: center;">
                                <!-- Human Hang Game -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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