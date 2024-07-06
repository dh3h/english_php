<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['confirm_password']) && !empty($action->database->text_filter($_POST['confirm_password']))) {
    $confirm_password = sha1($action->database->text_filter($_POST['confirm_password']));
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter User confirm Password';
}

if (isset($_POST['user_password']) && !empty($action->database->text_filter($_POST['user_password']))) {
    $user_password = sha1($action->database->text_filter($_POST['user_password']));
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter User Password';
}

if (isset($_POST['user_phone']) && !empty($action->database->text_filter($_POST['user_phone']))) {
    $user_phone = $action->database->text_filter($_POST['user_phone']);
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter User Phone No.';
}

if (isset($_POST['user_email']) && !empty($action->database->text_filter($_POST['user_email']))) {
    $user_email = $action->database->text_filter($_POST['user_email']);
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter User Email';
}

if (isset($_POST['user_name']) && !empty($action->database->text_filter($_POST['user_name']))) {
    $user_name = $action->database->text_filter($_POST['user_name']);
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter your User Name';
}

$user_id = 'NPA'. rand(99999,10000);
 
$date = date('D M Y');
if (!isset($json['status'])) {
    if ($user_password === $confirm_password) {
        if (strlen($user_password) != 5 && $user_password == 5 && $user_password >= 5) {
            $json['status'] = 10;
            $json['msg'] = 'password must be greater then 5 characters';
        } else {

            if (isset($_POST['hidden_id']) && !empty($action->database->text_filter($_POST['hidden_id']))) {
                $hidden_id = $action->database->text_filter($_POST['hidden_id']);
                if ((!empty($user_name)) && !empty($user_email) && !empty($user_phone) && (!empty($user_password) && !empty($date) && !empty($hidden_id))) {
                    // echo "hfghjkddfg";
                    $update = $action->database->update_query('tbl_admin', ['user_name' => $user_name, 'user_email' => $user_email, 'phone_no' =>$user_phone, 'user_password' => $user_password, 'date' => $date], "id='{$hidden_id}'");
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
                    $field['uid'] = $user_id;
                    $field['user_name'] = $user_name;
                    $field['user_email'] = $user_email;
                    $field['phone_no'] = $user_phone;
                    $field['user_password'] = $user_password;
                    $field['date'] = $date;
                    $insert = $action->database->insert_query("tbl_admin", $field);
                    if ($insert) {
                        $json['status'] = 40;
                        $json['msg'] = "Data Saved Successfully";
                    } else {
                        $json['status'] = 10;
                        $json['msg'] = "Error Occured";
                    }
                }
            }
        }
    } else {
        $json['status'] = 10;
        $json['msg'] = "Oops! Your Password Did't Match";
    }
}

echo json_encode($json);
