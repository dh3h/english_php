<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['hangman']) && !empty(($_POST['hangman']))) {
    $hangman = ($_POST['hangman']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Words Now...';
}


$date = date("d M Y H:i:s");
if (!isset($json['status'])) {

    if (isset($_POST['hidden_id']) && !empty($action->database->text_filter($_POST['hidden_id']))) {
        $hidden_id = $action->database->text_filter($_POST['hidden_id']);

        if ((!empty($hangman))&& !empty($hidden_id)) {
            // echo "hfghjkddfg";
            $update = $action->database->update_query('tbl_hangman', [ 'content' => $hangman], "id='{$hidden_id}'");
            if ($action) {
                $json['status'] = 100;
                $json['msg'] = 'Updated Successfully';
            } else {
                $json['status'] = 101;
                $json['msg'] = 'An Error Occured';
            }
        }
    } else {
        if (!isset($json['status']) && empty($hidden_id)) {
            $field['content'] = $hangman;
            $insert = $action->database->insert_query("tbl_hangman", $field);
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
