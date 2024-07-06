<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
require_once('./inc/sidebar.php');
if (isset($_GET['question_id']) && !empty($action->database->text_filter($_GET['question_id']))) {
    $question_id = $action->database->text_filter($_GET['question_id']);
}else{
    // Redirect to another page after 1 second
    header("refresh:1;url=ask-a-questions.php");
    exit();
}
$user_id = "000001";

?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Type a Answers</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <div class="wide-block pb-1 pt-2">

        <form id="student_answere_ask_form">

            <div class="form-group boxed">
                <div class="input-wrapper">
                    <label class="label" for="address5">Answers</label>
                    <input type="hidden" name="user_id" value="<?= @$user_id ?>">
                    <input type="hidden" name="question_id" value="<?= @$question_id ?>">
                    <textarea id="address5" name="answere_user" rows="2" class="form-control"></textarea>
                    <i class="clear-input">
                        <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                    </i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
        </form>

    </div>
</div>
<!-- * App Capsule -->

<?php
require_once('./inc/script.php');
?>