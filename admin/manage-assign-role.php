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
                        <h4 class="mb-sm-0 font-size-18">Manage Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Users</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Users List <span class="text-muted fw-normal ms-2">
                            </span></h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                        <div>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#firstmodal"> Assign New Role</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

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
                                                <label class="form-check-label" for="checkAll">Sno.</label>
                                            </div>
                                        </th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Role </th>
                                        <th scope="col">Date</th>
                                        <th style="width: 80px; min-width: 80px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="load_role_data">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->

        <!-- End Page-content -->

        <!-- new data modal dialog -->
        <div class="modal fade" id="update_role" aria-hidden="true" aria-labelledby="exampleModalToggleLabel12" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="modal-body">
                            <form id="update_role_form">

                            </form>
                        </div>
                        <button type="button" class="d-none btn btn-default btn-close" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- new data modal dialog -->
        <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Role & Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                    <div class="modal-body">
                        <form id="add_new_role" autocomplete="off">
                            <div class="modal-body">

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="font-weight-semibold" for="new_role_name">Role Name:</label>
                                        <input type="text" class="form-control" name="new_role_name" id="new_role_name" value="<?= @$data['f_name']; ?>" placeholder="Role name">
                                        <span class="mt-1 new_role_name"></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label class="font-weight-semibold mt-3">Role Permission</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <span class="role_permisson mt-2 mb-2"></span>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="All" value="All" class="form-check-input" placeholder="Role Name">
                                            <label for="All">All</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_staff" value="Manage Staff" class="form-check-input" placeholder="Role Name">
                                            <label for="manage_staff">Manage Staff</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_banner" value="Banner" class="form-check-input" placeholder="">
                                            <label for="manage_banner">Banner</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_about" value="About Us" class="form-check-input" placeholder="">
                                            <label for="manage_about">About Us</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_service" value="Our Service" class="form-check-input" placeholder="">
                                            <label for="manage_service">Our Service</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_testimonial" value="Testimonials" class="form-check-input" placeholder="">
                                            <label for="manage_testimonial">Testimonials</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_blogs" value="Blogs" class="form-check-input" placeholder="">
                                            <label for="manage_blogs">Blogs</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_gallery" value="Gallery Image" class="form-check-input" placeholder="">
                                            <label for="manage_gallery">Gallery Image</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_client_logo" value="Client Logos" class="form-check-input" placeholder="">
                                            <label for="manage_client_logo">Client Logos</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_why_choose_us" value="Why choose Us" class="form-check-input" placeholder="">
                                            <label for="manage_why_choose_us">Why choose Us</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_our_employee" value="Our Employee" class="form-check-input" placeholder="">
                                            <label for="manage_our_employee">Our Employee</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="role[]" id="manage_project" value="Manage Projects" class="form-check-input" placeholder="">
                                            <label for="manage_project">Manage Projects</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer mt-2">
                                    <!-- Toogle to second dialog -->
                                    <button class="btn btn-primary" data-bs-target="#secondmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Submit</button>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("./inc/footer.php");
    require_once("./inc/script.php");
    ?>