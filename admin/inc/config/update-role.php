<?php
require_once('./function/load.php');
$json = array();
##<------------------------------- Role --------------------------->
if (!empty($_POST['role1'])) {

    $new_role = "";
    foreach ($_POST['role1'] as $key) {
        $new_role .= $key . "@@@";
    }
} else {
    $json['status'] = 2;
    $json['msg'] = "Please select a role.";
}

##<xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Role xxxxxxxxxxxxxxxxxxxxxxxxxxx>
##<------------------------------- Role Name --------------------------->
if (!isset($_POST['new_role_name1']) || empty($_POST['new_role_name1']) || trim($_POST['new_role_name1']) == "") {
    $json['status'] = 1;
    $json['msg'] = "Please enter role name.";
} else {
    $role_name = $action->database->text_filter($_POST['new_role_name1']);
}
##<xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Role Name xxxxxxxxxxxxxxxxxxxxxxxxxxx>

##<------------------------------- Role Name --------------------------->
if (!isset($_POST['hidden_id']) | empty($_POST['hidden_id']) || trim($_POST['hidden_id']) == "") {
    $json['status'] = 10;
    $json['msg'] = "Oops. some data are missing.";
} else {
    $hidden_id = $action->database->text_filter($_POST['hidden_id']);
}
##<xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Role Name xxxxxxxxxxxxxxxxxxxxxxxxxxx>
if (!empty($role_name) && !empty($new_role) && !empty($hidden_id)) {

    $action->database->update_query("tbl_role", ['role_name' => $role_name, 'role' => $new_role], "id= '{$hidden_id}'");
    if ($action) {
        $json['status'] = 40;
        $json['msg'] = "Record Successfully Updated .";
    } else {
        $json['status'] = 10;
        $json['msg'] = "Something error Occured. Continue !";
    }
}
echo json_encode($json);
