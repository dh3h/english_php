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
                        <h4 class="mb-sm-0 font-size-18">Add story</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Story.php">story List</a></li>
                                <li class="breadcrumb-item active">story</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Story</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" id="story_form_data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select lesson Name :</label>
                                            <select name="lesson_id" class="form-control form-select">
                                                <option value="" selected disabled>Select lesson Name</option>
                                                <?php
                                                $select_lesson_list = $action->database->query_sql("SELECT * FROM `tbl_lesson` WHERE status = '1';");
                                                if ($select_lesson_list) {
                                                    foreach ($select_lesson_list as $data_lesson_list) {
                                                ?>
                                                        <option value="<?= @$data_lesson_list['id'] ?>"><?= @$data_lesson_list['lesson_name'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Story Title</label>
                                        <input type="text" name="story_titile" class="form-control" placeholder="Enter Story Title Here...">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Story :</label>
                                            <textarea name="story" class="form-control" id="about_discriptions" placeholder="Enter Story Here..."></textarea>

                                        </div>
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->


            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Minia.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="#!" class="text-decoration-underline">Themesbrand</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php
// require_once("./inc/footer.php");
require_once("./inc/script.php");
?>