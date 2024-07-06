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
    <div class="pageTitle">News</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <ul class="listview image-listview media mb-2">
        <?php
        $select_news_list = $action->database->query_sql("SELECT * FROM `tbl_news` WHERE status = 1;");
        if ($select_news_list) {
            foreach ($select_news_list as $data_news_list) {
                $inputString = $data_news_list['news_title'];
                $wordLimit = 12;
                $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);
                //  ID to encrypt
                $id = $data_news_list['id'];
                // Encrypt the ID
                $encryptedId = $action->database->encryptId($id, $secretKey);
        ?>
                <li>

                    <a href="practice-news-view.php?view_id=<?= @$encryptedId ?>" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/app-assets/new-1.png" alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                <?= @$shortenedString; ?>

                                <div class="text-muted">Top. Moderate </div>
                                <span class="badge badge-primary"><?= @$data_news_list['date'] ?>. 30coins</span>
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