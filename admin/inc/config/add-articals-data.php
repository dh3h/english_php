<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['articals_details']) && !empty(($_POST['articals_details']))) {
    $articals_details = ($_POST['articals_details']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Artical Details';
}

if (isset($_POST['articals_title']) && !empty($action->database->text_filter($_POST['articals_title']))) {
    $articals_title = $action->database->text_filter($_POST['articals_title']);
} else {
    $json['status'] = 101;
    $json['msg'] = 'Oops!! Enter Artical Title';
}

$date = date("d M Y H:i:s");
if (!isset($json['status'])) {

    if (isset($_POST['hidden_id']) && !empty($action->database->text_filter($_POST['hidden_id']))) {
        $hidden_id = $action->database->text_filter($_POST['hidden_id']);

        if ((!empty($user_name))  && !empty($date) && !empty($hidden_id)) {
            // echo "hfghjkddfg";
            $update = $action->database->update_query('tbl_admin', ['user_name' => $user_name, 'user_email' => $user_email, 'phone_no' => $user_phone, 'user_password' => $user_password, 'date' => $date], "id='{$hidden_id}'");
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
            
            $field['title_name'] = $articals_title;
            $field['artical_disc'] = $articals_details;
            $field['date'] = $date;
            $insert = $action->database->insert_query("tbl_articals", $field);
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
