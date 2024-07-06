<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php');
if (isset($_GET['view_id']) && !empty($action->database->text_filter($_GET['view_id']))) {
    $view_id = $action->database->text_filter($_GET['view_id']);
    $select_video_view_id = $action->database->query_sql("SELECT * FROM `tbl_videos` WHERE id = '{$view_id}' and status = 1;");
    if ($select_video_view_id) {
        foreach ($select_video_view_id as $data_video_view) {
        }
    }
} else {
    // Redirect to another page after 1 second
    header("refresh:1;url=practice-news.php");
    exit();
}
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
    <div class="pageTitle">Videos Details</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-3 mb-2">
        <div class="section-title">Watch Full Video carefully</div>

        <div class="wide-block pt-2 pb-2">
            <p>
                Take notes on important points, and consider each option carefully before selecting. Stay
                focused
                and review your choices to ensure accuracy.
            </p>
        </div>
        <?php
        $videoId = $data_video_view['video_link'] // Replace with your actual video ID
        ?>
        <iframe style="width: 100vw; " src="https://www.youtube.com/embed/<?php echo $videoId; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>


    <!-- chat footer -->
    <div class="chatFooter">
        <!-- <div class="row"> -->
        <a href="videos-test-view.php?view_id=<?= $view_id ?>" type="button" class="btn btn-primary btn-block">Start Your test</a>
        <!-- </div> -->
    </div>
    <!-- * chat footer -->
</div>

<!-- * App Capsule -->
<?php
// require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>