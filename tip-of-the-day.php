<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
// require_once('./inc/sidebar.php')
?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Tip Of The Day</div>

</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <?php
    $select_tip_of_the_day = $action->database->query_sql("SELECT * FROM `tbl_tip_day` ORDER BY id DESC;");
    if ($select_tip_of_the_day) {
        foreach ($select_tip_of_the_day as $data_tip_of_the_day) {
    ?>
            <div class="message-item">
                <img src="./assets/img/app-assets/avtar.png" alt="avatar" class="avatar">
                <div class="content">
                    <div class="title">Teacher</div>
                    <div class="bubble">
                        <?= @$data_tip_of_the_day['tip_text'] ?>
                    </div>
                    <div class="footer">10:40 PM</div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<!-- * App Capsule -->
<?php
require_once('./inc/script.php');
?>