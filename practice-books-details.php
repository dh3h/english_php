<?php
require_once('./inc/head.php');
require_once('./inc/sidebar.php');
if (isset($_GET['book_id']) && !empty($action->database->text_filter($_GET['book_id']))) {
    $book_id = $action->database->text_filter($_GET['book_id']);
} else {
    // Redirect to another page after 1 second
    header("refresh:1;url=practice-books.php");
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
    <div class="pageTitle">Books Details</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <ul class="listview image-listview media mb-2">
        <?php
        $select_book_list_id = $action->database->query_sql("SELECT * FROM `tbl_books_chapter` WHERE book_id = '{$book_id}' and status = 1;");
        if ($select_book_list_id) {
            foreach ($select_book_list_id as $data_book_view) {
                // print_r($select_book_list_id);
                 $inputString = $data_book_view['lession_title'];
                $wordLimit = 12;
                $shortenedString = $action->database->getFirstWords($inputString, $wordLimit);
        ?>

        <?php
            }
        }
        ?>
        <li>
            <a href="practice-book-open.php?chapter_id=<?= @$data_book_view['id'] ?>" class="item">

                <div class="in">
                    <div>
                        <?= @$shortenedString ?>...
                    </div>

                </div>
                <div class="imageWrapper">
                    <img src="assets/img/app-assets/bookmark.png" alt="image" class="imaged w36">
                </div>
            </a>
        </li>


    </ul>


</div>
<!-- * App Capsule -->
<?php
require_once('./inc/bottom-btn.php');
// require_once('./inc/footer.php');
require_once('./inc/script.php');
?>