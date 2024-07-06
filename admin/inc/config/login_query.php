<?php
require_once("function/load.php");
$json = array();

if (isset($_POST['user_password']) && !empty($action->database->text_filter($_POST['user_password']))) {
    $user_password = sha1($action->database->text_filter($_POST['user_password']));
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter your Password';
}

if (isset($_POST['user_email']) && !empty($action->database->text_filter($_POST['user_email']))) {
    $user_email = $action->database->text_filter($_POST['user_email']);
} else {
    $json['status'] = 10;
    $json['msg'] = 'Oops! Enter Your UserEmail';
}

if (!isset($json['status'])) {
    if (isset($user_email) && !empty($user_email) && isset($user_password) && !empty($user_password)) {
        $user_data = $action->database->query_sql("SELECT * FROM `tbl_admin` WHERE user_email = '{$user_email}' AND user_password = '{$user_password}' AND status = 1;");

        if ($user_data) {
            foreach ($user_data as $data) {
                $action->session->set("login_user_id", $data['uid']);
                $action->session->set("login_user_email", $data['user_email']);
                $action->session->set("log_user_role", $data['role']);
                // $action->session->set("")
                $session_id = $action->session->get("login_user_id");
                $session_email = $action->session->get("login_user_email");
                if (isset($session_id)) {
                    $json['status'] = 40;
                    $json['msg'] = 'Welcome to dashboard';
                }
            }
        } else {
            $json['status'] = 10;
            $json['msg'] = 'Oops! Wrong Email Or Password';
        }
    }
}

echo json_encode($json);
