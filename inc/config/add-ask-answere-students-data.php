<?php
require_once("../../admin/inc/config/function/load.php");
$json = array();

if (isset($_POST['answere_user']) && !empty($action->database->text_filter($_POST['answere_user']))) {
    $answere_user = $action->database->text_filter($_POST['answere_user']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Your Answere ';
}

if (isset($_POST['question_id']) && !empty($action->database->text_filter($_POST['question_id']))) {
    $question_id = $action->database->text_filter($_POST['question_id']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Something Error';
}

if (isset($_POST['user_id']) && !empty($action->database->text_filter($_POST['user_id']))) {
    $user_id = $action->database->text_filter($_POST['user_id']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Something Error';
}

$date = date("d M Y");
if (!isset($json['status'])) {
    $field['user_id'] = $user_id;
    $field['ques_id'] = $question_id;
    $field['answere'] = $answere_user;
    $field['date'] = $date;
    $insert = $action->database->insert_query("tbl_student_answers", $field);
    if ($insert) {
        $json['status'] = 100;
        $json['msg'] = "Data Saved Successfully";
    } else {
        $json['status'] = 101;
        $json['msg'] = "Error Occured";
    }
}


echo json_encode($json);
