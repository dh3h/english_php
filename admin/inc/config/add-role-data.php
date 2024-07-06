<?php
require_once('./function/load.php');
$json = array();

if (!empty($_POST['role'])) {
    $new_role = "";
    foreach ($_POST['role'] as $key) {
        $new_role .= $key . "@@@";
    }
    $new_role = rtrim($new_role, '@@@');
    $new_role =  $action->database->text_filter($new_role);
} else {
    $json["status"] = 10;
    $json["msg"] = "Please atleast one permission !!";
}

// role name
if (isset($_POST['new_role_name']) && !empty($action->database->text_filter($_POST['new_role_name']))) {
    $role_name = $action->database->text_filter($_POST['new_role_name']);
} else {
    $json["status"] = 10;
    $json["msg"] = "Please enter a role name !!";
}
##<------------------------------- hidden_id --------------------------->
if (isset($_POST['hidden_id']) && !empty($action->database->text_filter($_POST['hidden_id']))) {
    $hidden_id = $action->database->text_filter($_POST['hidden_id']);
} else {
    $hidden_id = "";
}

if (empty($hidden_id) && (!isset($json) || empty($json))) {
    $result = $action->database->query_sql("SELECT * FROM tbl_role WHERE role_name = '{$role_name}'");
    if ($result) {
        $json['status'] = 1;
        $json['msg'] = "Role already registered.";
    } else {
        $field['role_name'] = $role_name;
        $field['role'] = $new_role;
        $field['date'] = date('Y-m-d H:m:s');
        $insert = $action->database->insert_query("tbl_role", $field);
        if ($insert) {
            $json["status"] = 40;
            $json["msg"] = "Record Successfully Saved.";
        } else {
            $json["status"] = 10;
            $json["msg"] = "Something error Occured. Continue.";
        }
    }
} elseif (!empty($hidden_id) && (!isset($json) || empty($json))) {
    $success = $action->database->update_query("tbl_role", ['role_name' => $role_name, 'role' => $new_role], "id= '{$hidden_id}'");
    if ($success) {
        $json["status"] = 40;
        $json["msg"] = "Record Successfully Updated.";
    } else {
        $json["status"] = 10;
        $json["msg"] = "Something error Occured. Continue.";
    }
}
echo json_encode($json);
