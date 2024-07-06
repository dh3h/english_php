<?php
require_once('./inc/config/function/load.php');
if($action->session->get("login_user_id") != ""){
    $action->session->delete("login_user_email");
    $action->session->delete("login_user_id");
}
header("location:./auth-login.php");
exit();
?>