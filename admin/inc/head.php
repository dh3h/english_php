<?php
require_once('config/function/load.php');
if ($action->session->get("login_user_email") != "" && $action->session->get("login_user_id") != "") {

    if ($action->session->get("log_user_role") != "") {
        $session_role = $action->session->get("log_user_role");
    }


    $sql1 = "SELECT * FROM tbl_role WHERE id = '{$session_role}'  ";
    $select = $action->database->query_sql($sql1);

    if ($select) {
        foreach ($select as $data_role) {
            $role_id = $data_role['id'];
            $role_name = $data_role['role_name'];
            $role = $data_role['role'];
        }
    }
    $roleview = explode("@@@", @$role);
} else {
    header("location:auth-login.php");
}
$select_setting = $action->database->query_sql("SELECT * FROM `tbl_setting`");
if ($select_setting) {
    foreach ($select_setting as $data_setting) {
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= @$data_setting['seo_titile'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../upload/<?= @$data_setting['favicon_icon'] ?>">

    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
</head>