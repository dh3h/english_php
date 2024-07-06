<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php')
?>
<!-- App Header -->
<div class="appHeader no-border transparent position-absolute">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Maintenance</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">

    <div class="error-page">
        <img src="assets/img/app-assets/maintenance.png" alt="alt" class="imaged square w200">
        <h1 class="title mt-4">We are working on it!</h1>
        <div class="text mb-5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>

        <div class="fixed-footer">
            <div class="row">
                <div class="col-12">
                    <a href="challange.php" class="btn btn-primary btn-lg btn-block">Go Back</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- * App Capsule -->

<?php
// require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>