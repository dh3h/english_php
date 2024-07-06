<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['config']) && !empty(($_POST['config']))) {
    $config = ($_POST['config']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Config Name';
}

if (isset($_POST['question']) && !empty($action->database->text_filter($_POST['question']))) {
    $question = $action->database->text_filter($_POST['question']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Questions Name';
}

if (isset($_POST['lesson_id']) && !empty($action->database->text_filter($_POST['lesson_id']))) {
    $lesson_id = $action->database->text_filter($_POST['lesson_id']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Select lesson Name';
}

$date = date("d M Y H:i:s");
if (!isset($json['status'])) {

    if (isset($_POST['hidden_id']) && !empty($action->database->text_filter($_POST['hidden_id']))) {
        $hidden_id = $action->database->text_filter($_POST['hidden_id']);

        if ((!empty($user_name))  && !empty($date) && !empty($hidden_id)) {
            // echo "hfghjkddfg";
            $update = $action->database->update_query('tbl_admin', ['user_name' => $user_name, 'user_email' => $user_email, 'phone_no' => $user_phone, 'user_password' => $user_password, 'date' => $date], "id='{$hidden_id}'");
            if ($action) {
                $json['status'] = 40;
                $json['msg'] = 'Updated Successfully';
            } else {
                $json['status'] = 10;
                $json['msg'] = 'An Error Occured';
            }
        }
    } else {
        if (!isset($json['status']) && empty($hidden_id)) {
            $field['lesson_id'] = $lesson_id;
            $field['question'] = $question;
            $field['config'] = $config;
            $field['date'] = $date;
            $insert = $action->database->insert_query("tbl_correct_sentence", $field);
            if ($insert) {
                $json['status'] = 100;
                $json['msg'] = "Data Saved Successfully";
            } else {
                $json['status'] = 101;
                $json['msg'] = "Error Occured";
            }
        }
    }
}

echo json_encode($json);
