<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php')
?>

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Books</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <ul class="listview image-listview media mb-2">
        <?php
        $select_books_list = $action->database->query_sql("SELECT * FROM `tbl_books` WHERE status = 1;");
        if ($select_books_list) {
            foreach ($select_books_list as $data_books_list) {
                // print_r($data_books_list);
                $inputString = $data_books_list['book_name'];
                $wordLimit = 12;
                $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);

        ?>
                <li>
                    <a href="practice-books-details.php?book_id=<?= @$data_books_list['id'] ?>" class="item">

                        <div class="in">
                            <div>
                                <?= @$shortenedString ?>
                                <!-- <div class="text-muted">Top. easy </div> -->
                                <span class="badge badge-primary"><?= @$data_books_list['date'] ?>. 30coins</span>
                            </div>

                        </div>
                        <div class="imageWrapper">
                            <img src="assets/img/app-assets/book.jpg" alt="image" class="imaged w64">
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