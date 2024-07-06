<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
$user_id = "000001";
?>

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Ask Teacher Chat</div>

</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <?php
    $select_ask_teacher_chat = $action->database->query_sql("SELECT from_user,to_user,message,date FROM tbl_ask_teacher WHERE from_user = '{$user_id}' OR to_user = '{$user_id}';");
    if ($select_ask_teacher_chat) {
        foreach ($select_ask_teacher_chat as $data_ask_teacher_chat) {
    ?>
            <div class="message-item mb-2 <?php if($data_ask_teacher_chat['from_user'] !== 'A'){ ?> user <?php } ?> ">
                <div class="content">
                    <div class="bubble">
                        <?= @$data_ask_teacher_chat['message'] ?>
                    </div>
                    <!-- <div class="footer">10:40 AM</div> -->
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
    <form id="form_data_users">

        <div class="form-group boxed" style=" width: max-content;">
            <div class="input-wrapper">
                <input type="hidden" name="user_id" class="form-control" value="<?= $user_id ?>">
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
<script>

</script>