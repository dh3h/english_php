<?php
require_once('function/load.php');
$json = array();
$idx = trim($_POST['del_id']);
$table_name = trim($_POST['table_name']);

$select1 = $action->database->select_assoc($table_name,$idx);
if($select1){
  foreach($select1 as $data){
    if(isset($data['file'])){
      if(file_exists('../../../upload/'.$data['file'])){
        unlink('../../../upload/'.$data['file']);
      }
      else if(file_exists('../../../upload/banner/'.$data['file'])){
        unlink('../../../upload/banner/'.$data['file']);
      }
    }
  }
}
$action->database->delete($table_name,$idx);
if($action->database){
  $json['status'] = 1;
  $json['msg'] ="Record successfully Deleted!!";
}
else{
  $json['status'] = 2;
  $json['msg'] ="Oops.. Something wrong. Please try after sometime!!!";
}
echo json_encode($json);
?>