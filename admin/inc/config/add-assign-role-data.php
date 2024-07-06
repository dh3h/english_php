<?php
require_once('./function/load.php');
$json = array();

if (isset($_POST['role_id']) && !empty($action->database->text_filter($_POST['role_id']))) {
    $role = $action->database->text_filter($_POST['role_id']);
    // echo $role;
} else {
    $json['status'] = 10;
    $json['msg'] = 'Please Select a role !!';
}

/*******
 * Role or Permission *
 *******/
if (isset($_POST['permission_users']) && !empty($action->database->text_filter($_POST['permission_users']))) {
    $permission_users = $action->database->text_filter($_POST['permission_users']);
} else {
    $json['status'] = 10;
    $json['msg'] = 'Please select a user !!';
}

if (!isset($json['status']) && !empty($role) && !empty($permission_users)) {
 
    $update = $action->database->update_query('tbl_admin', ['role' => $role], "uid ='{$permission_users}'");
    
    if ($update) {
        $json['status'] = 40;
        $json['msg'] = 'Permission Successfully granted.!!';
    } else {
        $json['status'] = 10;
        $json['msg'] = 'Something error Occured. Continue. !!';
    }
    // }
}
echo json_encode($json);
