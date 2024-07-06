<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['lesson_details']) && !empty(($_POST['lesson_details']))) {
    $lesson_details = ($_POST['lesson_details']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Lesson Details';
}

if (isset($_POST['chapter_name']) && !empty($action->database->text_filter($_POST['chapter_name']))) {
    $chapter_name = $action->database->text_filter($_POST['chapter_name']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Chapter Name';
}

if (isset($_POST['book_id']) && !empty($action->database->text_filter($_POST['book_id']))) {
    $book_id = $action->database->text_filter($_POST['book_id']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Books Name';
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
            
            $field['book_id'] = $book_id;
            $field['lession_title'] = $chapter_name;
            $field['lession_details'] = $lesson_details;
            $field['date'] = $date;
            $insert = $action->database->insert_query("tbl_books_chapter", $field);
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
