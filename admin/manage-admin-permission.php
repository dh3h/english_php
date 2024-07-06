<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
if (in_array("Manage Staff", $roleview) || in_array("All", $roleview)) {
} else {
    $error = true; // Replace this with your actual error-checking condition

    if ($error) {
        // Display an error message or perform any necessary actions

        // Redirect back to the previous page after a delay using JavaScript
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '   window.history.back();'; // Go back to the previous page
        echo '}, 3);'; // 3 milliseconds (3 seconds) delay, you can adjust this
        echo '</script>';
        exit(); // Stop executing the rest of the script
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
                        <h4 class="mb-sm-0 font-size-18">Manage Admin User's</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Admin User's</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Admin User's List <span class="text-muted fw-normal ms-2">
                                <?php
                                $total_list = $action->database->query_sql("SELECT COUNT(id) FROM tbl_services;");
                                ?>
                                (<?= @$total_list[0]['COUNT(id)'] ?>)
                            </span></h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <a href="./add-admin-user.php" class="btn btn-light"><i class="bx bx-plus me-1"></i> Add New </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-4">
                                <div class="row">
                                    <form id="add_form_assign_role">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3 position-relative">
                                                    <label class="form-label" for="permission_staff">Select Users :</label>
                                                    <select id="permission_staff" class="form-control w-100" name="permission_users">
                                                        <option selected disabled>Select Users</option>
                                                        <?php
                                                        $select_admin = $action->database->query_sql("SELECT * FROM `tbl_admin` WHERE NOT uid = 'Super Admin';");
                                                        if ($select_admin) {
                                                            foreach ($select_admin as $data_admin) {
                                                        ?>
                                                                <option value="<?= @$data_admin['uid'] ?>"> <?= @$data_admin['user_name'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3 position-relative">
                                                    <label class="form-label" for="validationTooltip02">Assign Role :</label>
                                                    <select class="form-control" name="role_id" id="load_role_for_permission">
                                                        <option selected disabled> Select Assign Role </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
                                                <button type="submit" class="btn btn-primary" id="permission_staff_button"> Submit form </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- multi select input Example -->

                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="data1-table" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check font-size-16">
                                                <input type="checkbox" class="form-check-input" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Role Assign</th>
                                        <th scope="col">user Phone No.</th>

                                        <th scope="col">Status</th>
                                        <th style="width: 80px; min-width: 80px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="load_members_with_roles">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php
    require_once("./inc/footer.php");
    require_once("./inc/script.php");
    ?>