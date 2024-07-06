<?php
require_once('function/load.php');
$json = array();
if (isset($_POST['inactive']) && isset($_POST['table_name'])) {

    $id = $action->database->text_filter($_POST['inactive']);

    $action->database->update_query($_POST['table_name'], ['status' => 0], "id ='{$id}'");
    if ($action) {
        $json['status'] = 3;
        $json['msg'] = "Status Successfully Inactive!!";
    } else {
        $json['status'] = 4;
        $json['msg'] = "Oops.. Something wrong. Please try after sometime!!!";
    }
} elseif (isset($_POST['active']) && isset($_POST['table_name'])) {
    $id = $action->database->text_filter($_POST['active']);

    $action->database->update_query($_POST['table_name'], ['status' => 1], "id ='{$id}'");
    if ($action) {
        $json['status'] = 1;
        $json['msg'] = "Status Successfully Active!!";
    } else {
        $json['status'] = 2;
        $json['msg'] = "Oops.. Something wrong. Please try after sometime!!!";
    }
}
echo json_encode($json);
?>