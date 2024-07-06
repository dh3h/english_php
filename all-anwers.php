<?php
require_once('./inc/head.php');
require_once('./inc/menu.php');
require_once('./inc/sidebar.php');
if (isset($_GET['question_id']) && !empty($action->database->text_filter($_GET['question_id']))) {
    $question_id = $action->database->text_filter($_GET['question_id']);
    $select_student_question = $action->database->query_sql("SELECT * FROM `tbl_students_questions_ask` WHERE id = '{$question_id}';");
    if ($select_student_question) {
        foreach ($select_student_question as $data_student_question) {
        }
    }
} else {
    // Redirect to another page after 1 second
    header("refresh:1;url=ask-a-questions.php");
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
    <div class="pageTitle">All Answers</div>
    <div class="right">
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <div class="card">
        <div class="card-body" style="background: #6d70d766;">
            <h4> <?= @$data_student_question['questions_users'] ?></h4>
            <div class="row mt-1">
                <div class="col-6">
                    <div class="text-muted"> <?= @$data_student_question['date'] ?> </div>
                </div>
                <div class="col-6" style="text-align: end;">
                    <!-- <div class="text-muted"><ion-icon name="chatbox-outline"></ion-icon> 532 </div> -->
                </div>
            </div>
        </div>
    </div>



    <div class="wide-block pt-2 pb-2">

        <!-- comment block -->
        <div class="comment-block">
            <?php
            $select_student_aswers = $action->database->query_sql("SELECT tbl_student_answers.id,tbl_student_answers.user_id,tbl_student_answers.answere,tbl_student_answers.ques_id ,tbl_student_answers.date, tbl_user.name,tbl_user.pic,tbl_user.user_pro_image, tbl_user.city,tbl_user.state FROM `tbl_student_answers` INNER JOIN tbl_user ON tbl_student_answers.user_id = tbl_user.user_uid WHERE ques_id = '{$question_id}';");
            if ($select_student_aswers) {
                foreach ($select_student_aswers as $data_student_answere) {
            ?>
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <?php
                            $user_pic = $data_student_answere['user_pro_image'];
                            if ($user_pic !== null && $user_pic !== "" && $user_pic !== '0') {
                            ?>
                                <img src="./upload/<?= @$user_pic ?>" alt="00000" class="imaged w32 rounded">
                            <?php
                            } else {
                            ?>
                                <img src="./assets/img/app-assets/avtar.png" alt="44444" class="imaged w32 rounded">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <a>
                                    <h4 class="title"><?= @$data_student_answere['name'] ?><br><span class="time"><?= @$data_student_answere['city'] ?>, <?= @$data_student_answere['state'] ?></span></h4>
                                </a>
                                <span class="time"><?= @$data_student_answere['date'] ?></span>
                            </div>
                            <div class="text">
                                <?= @$data_student_answere['answere'] ?>
                            </div>
                            <!-- <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart-outline" role="img" class="md hydrated" aria-label="heart outline"></ion-icon>
                                    Like (523)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline" role="img" class="md hydrated" aria-label="chatbubble outline"></ion-icon>
              Reply 
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <!-- * item -->
            <?php
                }
            }
            ?>
            <div class="fab-button text bottom-right">
                <a href="type-answers.php?question_id=<?= @$question_id ?>" class="fab" style="padding: 12px; font-size: 12px; margin-bottom: 10px;margin-top: 10px;">
                    <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                    Ask Your Answers
                </a>
            </div>
        </div>
        <!-- * comment block -->

    </div>


</div>
<!-- * App Capsule -->
<?php
require_once('./inc/script.php');
?>