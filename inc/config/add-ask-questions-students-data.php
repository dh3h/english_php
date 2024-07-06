<?php
require_once("../../admin/inc/config/function/load.php");
$json = array();

if (isset($_POST['student_questions_ask']) && !empty($action->database->text_filter($_POST['student_questions_ask']))) {
    $student_questions_ask = $action->database->text_filter($_POST['student_questions_ask']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Your Questions ';
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
    $field['questions_users'] = $student_questions_ask;
    $field['date'] = $date;
    $insert = $action->database->insert_query("tbl_students_questions_ask", $field);
    if ($insert) {
        $json['status'] = 100;
        $json['msg'] = "Data Saved Successfully";
    } else {
        $json['status'] = 101;
        $json['msg'] = "Error Occured";
    }
}


echo json_encode($json);
