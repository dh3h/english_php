<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php');
if (isset($_GET['view_id']) && !empty($action->database->text_filter($_GET['view_id']))) {
    $encryptedId = $action->database->text_filter($_GET['view_id']);
    // Decrypt the ID
    $view_id = $action->database->decryptId($encryptedId, $secretKey);
    $select_news_list_id = $action->database->query_sql("SELECT * FROM `tbl_news` WHERE id = '{$view_id}' and status = 1;");
    if ($select_news_list_id) {
        foreach ($select_news_list_id as $data_new_view) {
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
    <div class="pageTitle">News Details</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->



<!-- App Capsule -->
<div id="appCapsule">
    <img src="./assets/img/app-assets/news.jpg" alt="image" style="height: 30vh;" class="imaged img-fluid">
    <div class="wide-block pt-2 pb-1">
        <div class="section-title text-danger">Read the News given below</div>
        <h4 style="margin-bottom: 0px;"><?= @$data_new_view['news_title'] ?></h4>
        <p>Read Phrases :</p>
        <p class="lead">
            <?= @$data_new_view['news_details'] ?>
        </p>
    </div>
</div>
<!-- * App Capsule -->


<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>