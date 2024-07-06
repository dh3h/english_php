<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
require_once('./inc/sidebar.php');
$user_id = '000001';
?>


<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Chat Community</div>

</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <?php
    $select_chat_community = $action->database->query_sql("SELECT * FROM `tbl_chat_community`");
    if ($select_chat_community) {
        foreach ($select_chat_community as $data_chat_community) {
    ?>

            <div class="message-item mb-2 <?php if ($data_chat_community['user_id'] === $user_id) { ?> user <?php } ?> ">
                <div class="content">
                    <div class="bubble">
                        <?= @$data_chat_community['message'] ?>
                    </div>
                    <div class="footer"><?=  @$data_chat_community['date'] ?></div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<!-- * App Capsule -->

<!-- chat footer -->
<div class="chatFooter">
    <form id="form_chat_community">

        <div class="form-group boxed" style=" width: max-content;">
            <div class="input-wrapper">
                <input type="hidden" name="user_id" class="form-control" value="<?= @$user_id ?>">
                <input type="text" class="form-control" id="message_inp" name="message" placeholder="Type a message...">
                <i class="clear-input">
                    <ion-icon name="close-circle"></ion-icon>
                </i>
            </div>
        </div>
        <button type="submit" class="btn btn-icon btn-primary rounded">
            <ion-icon name="send"></ion-icon>
        </button>
    </form>
</div>
<!-- * chat footer -->

<?php
require_once('./inc/script.php');
?>