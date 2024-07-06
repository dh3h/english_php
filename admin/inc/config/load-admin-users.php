<?php
 require_once('./function/load.php');

if(isset($_POST['role_id']) && !empty($action->database->text_filter($_POST['role_id']))){
    $id = $action->database->text_filter($_POST['role_id']);
 
  $result = $action->database->query_sql("SELECT * FROM tbl_admin WHERE uid = '{$id}'");
  if($result){
      foreach ($result as $data) {
   
        $sql = $action->database->query_sql("SELECT * FROM `tbl_role`");
      if ($sql) {

          foreach ($sql as $op_data22) { ?>
          <option value="<?= @$op_data22['id']; ?>" <?php if(isset($data['role']) && $data['role'] === $op_data22['id']){echo "Selected";} ?>><?= @$op_data22['role_name']; ?></option>

          <?php }
      } else {
          return false;
      }
}
}else{
  return false;
}
}

?>
