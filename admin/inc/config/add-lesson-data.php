<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['lesson_name']) && !empty($action->database->text_filter($_POST['lesson_name']))) {
    $lesson_name = $action->database->text_filter($_POST['lesson_name']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Lesson Name';
}

if (isset($_POST['select_phase_name']) && !empty($action->database->text_filter($_POST['select_phase_name']))) {
    $select_phase_name = $action->database->text_filter($_POST['select_phase_name']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Select Phase Name';
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
            $field['phase_id'] = $select_phase_name;
            $field['lesson_name'] = $lesson_name;
            $field['date'] = $date;
            $insert = $action->database->insert_query("tbl_lesson", $field);
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
