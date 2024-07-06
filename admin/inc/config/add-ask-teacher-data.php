<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['message']) && !empty($action->database->text_filter($_POST['message']))) {
    $message = $action->database->text_filter($_POST['message']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Message';
}

if (isset($_POST['to_user']) && !empty($action->database->text_filter($_POST['to_user']))) {
    $to_user = $action->database->text_filter($_POST['to_user']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Something Error';
}

$date = date("d M Y H:i:s");
if (!isset($json['status'])) {

        $field['to_user'] = $to_user;
        $field['message'] = $message;
        $field['from_user'] = 'A';
        $field['date'] = $date;
        $insert = $action->database->insert_query("tbl_ask_teacher", $field);
        if ($insert) {
            $json['status'] = 100;
            $json['msg'] = "Data Saved Successfully";
        } else {
            $json['status'] = 101;
            $json['msg'] = "Error Occured";
        }
}

echo json_encode($json);
