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
    <div class="pageTitle">Videos</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <ul class="listview image-listview media mb-2">
        <?php
        $select_video_list = $action->database->query_sql("SELECT * FROM `tbl_videos` WHERE status = 1;");
        if ($select_video_list) {
            foreach ($select_video_list as $data_video_list) {
                $inputString = $data_video_list['video_title'];
                $wordLimit = 12;
                $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);
        ?>
                <li>
                    <a href="videos-details.php?view_id=<?= @$data_video_list['id'] ?>" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/app-assets/videos.png" alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                            <?= @$shortenedString ?>
                                <!-- <div class="text-muted">Top. easy </div> -->
                                <span class="badge badge-primary"><?= @$data_video_list['date'] ?>. 30coins</span>
                            </div>

                        </div>
                    </a>
                </li>
        <?php
            }
        }
        ?>

    </ul>


</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>