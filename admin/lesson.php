<?php
require_once("./inc/head.php");
require_once("./inc/header.php");
require_once("./inc/sidebar.php");
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
                        <h4 class="mb-sm-0 font-size-18">Lesson List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Lesson List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <form class="needs-validation" id="lesson_submit_data">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="mb-3">
                                                            <select name="select_phase_name" class="form-control form-select">
                                                                <option value="" selected disabled>Select Phase Name</option>
                                                                <?php
                                                                $select_phase_list = $action->database->query_sql("SELECT * FROM `tbl_phase` WHERE status = 1;");
                                                                if ($select_phase_list) {
                                                                    foreach ($select_phase_list as $data_phase_list) {
                                                                ?>
                                                                        <option value="<?= @$data_phase_list['id'] ?>"><?= @$data_phase_list['phase_name'] ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="lesson_name" placeholder="Enter Lesson here">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div> <!-- end col -->


                            </div>

                            <div class="table-responsive">
                                <table id="table-data" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Phase Name</th>
                                            <th>Lesson Name</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                            <th>Action's</th>
                                        </tr>
                                    </thead>


                                    <tbody id="load_lesson_data">

                                    </tbody>
                                </table>

                            </div>
                            <!-- end table responsive -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    <!-- end main content-->

</div>
<!-- END layout-wrapper -->
<?php
require_once("./inc/footer.php");
require_once("./inc/script.php");
?>