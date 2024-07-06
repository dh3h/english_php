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
                        <h4 class="mb-sm-0 font-size-18">Add Listen Select The Correct Sentence</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="fill-in-the-blank.php">Listen Select The Correct Sentence List</a></li>
                                <li class="breadcrumb-item active">Listen Select The Correct Sentence</li>
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
                            <h4 class="card-title">Listen Select The Correct Sentence</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" id="listen_select_the_correct_sentence_form">
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
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Enter Question :</label>
                                            <textarea name="question" class="form-control" id="about_discriptions" placeholder="Enter Question Here..."></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Options ID: 1</label>
                                        <input type="text" id="options1" class="form-control" placeholder="Enter Options 1">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Options ID: 2</label>
                                        <input type="text" id="options2" class="form-control" placeholder="Enter Options 2">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Options ID: 3</label>
                                        <input type="text" id="options3" class="form-control" placeholder="Enter Options 3">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Options ID: 4</label>
                                        <input type="text" id="options4" class="form-control" placeholder="Enter Options 4">
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Enter the Correct ID Option's</label>
                                        <input type="text" id="correct_ans" class="form-control" placeholder="Enter The Options ID here">
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