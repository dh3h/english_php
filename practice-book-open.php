<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php');
if (isset($_GET['chapter_id']) && !empty($action->database->text_filter($_GET['chapter_id']))) {
    $chapter_id = $action->database->text_filter($_GET['chapter_id']);
    $select_chapter_list_id = $action->database->query_sql("SELECT * FROM `tbl_books_chapter` WHERE id = '{$chapter_id}' and status = 1;");
    if ($select_chapter_list_id) {
        foreach ($select_chapter_list_id as $data_chapter_view) {
        }
    }
} else {
    // Redirect to another page after 1 second
    header("refresh:1;url=practice-news.php");
    exit();
}
?>

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Books Read</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <img src="assets/img/app-assets/book-read.jpg" alt="image" style="height: 30vh;" class="imaged img-fluid">
    <div class="wide-block pt-2 pb-1">
        <div class="section-title text-danger">Read the article given below</div>
        <h4 style="margin-bottom: 0px;"><?= @$data_chapter_view['lession_title'] ?></h4>
        <p>Chapter Phrases :</p>
        <p class="lead">
        <?= @$data_chapter_view['lession_title'] ?> 
        </p>
    </div>
</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>