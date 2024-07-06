<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php');
if (isset($_GET['view_id']) && !empty($action->database->text_filter($_GET['view_id']))) {
    $encryptedId = $action->database->text_filter($_GET['view_id']);
    // Decrypt the ID
    // $secretKey = "9151220081_ENGLISHAPP"; // Replace with your own secret key
    $view_id = $action->database->decryptId($encryptedId, $secretKey);
    $select_artical_list_id = $action->database->query_sql("SELECT * FROM `tbl_articals` WHERE id = '{$view_id}' and status = 1;");
    if ($select_artical_list_id) {
        foreach ($select_artical_list_id as $data_artical_view) {
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
    <div class="pageTitle">Artical Details</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <img src="assets/img/app-assets/artical-page.jpg" alt="image" style="height: 30vh;" class="imaged img-fluid">
    <div class="wide-block pt-2 pb-1">
        <div class="section-title text-danger">Read the article given below</div>
        <h4 style="margin-bottom: 0px;"><?= @$data_artical_view['title_name'] ?></h4>
        <p>Holi Phrases :</p>
        <p class="lead">
            <?= @$data_artical_view['artical_disc'] ?>
        </p>
    </div>
</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>