<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
$err = "";
if (isset($_GET["user_id"]) && !empty($action->database->text_filter($_GET["user_id"]))) {
    $err = "<script> history.back(); </script>";
    $get_id = $action->database->text_filter($_GET["user_id"]);
    $select_admin = $action->database->query_sql("SELECT * FROM `tbl_admin` WHERE uid != 'Super Admin' AND uid = '{$get_id}';");
    if ($select_admin) {
        $err = "";
        foreach ($select_admin as $data_admin) {
        }
    }
}
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Admin User's</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="./">Dashboard
                                    </a></li>
                                <li class="breadcrumb-item active">Add Admin User's</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Admin User's</h4>
                    </div>
                    <div class="card-body">

                        <form id="admin_user_data">
                            <input type="hidden" name="hidden_id" value="<?= @$data_admin['id'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">User Name :</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="user_name" placeholder="Enter User Name here" value="<?= @$data_admin['user_name'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">User Email :</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="user_email" placeholder="Enter User Email here" value="<?= @$data_admin['user_email'] ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">User Phone No. :</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="user_phone" placeholder="Enter User Phone No. here" value="<?= @$data_admin['phone_no'] ?>" maxlength="10">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">User Password :</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="user_password" placeholder="Enter User password here">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label" for="validationTooltip01">Confirm Password :</label>
                                        <input type="text" class="form-control" id="validationTooltip01" name="confirm_password" placeholder="Enter User Confirm password here" >
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
                <!-- end card -->
            </div> <!-- end col -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php
    require_once("./inc/footer.php");
    require_once("./inc/script.php");
    ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result).width(450).height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="assets/js/pages/pass-addon.init.js"></script>