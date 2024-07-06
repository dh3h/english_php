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
                        <h4 class="mb-sm-0 font-size-18">Add Conversation</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="fill-in-the-blank.php">Conversation</a></li>
                                <li class="breadcrumb-item active">Conversation</li>
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
                            <h4 class="card-title">Conversation</h4>
                        </div>
                        <div class="card-body">
                            <form class="profile-form" id="conversation_form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Select Lesson</label>
                                            <select name="lesson_id" class="form-control" id="">
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
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Conversation Title</label>
                                            <input type="text" name="conversation_title" class=" form-control" placeholder="Enter Conversation Title">
                                        </div>
                                        <div class="col-sm-12 m-b30">
                                            <label class="form-label">Conversation</label>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row" id="add_more_convo">
                                                        <div class="col-6 mt-3">
                                                            <div class="row">
                                                                <div class="col-2 pe-0">
                                                                    <select class="convos_type form-control">
                                                                        <option value="u">User</option>
                                                                        <option value="b">Bot</option>
                                                                    </select>   
                                                                </div>
                                                                <div class="col-10 convo_type_parent ps-0">
                                                                    <input type="text" class="convos_text form-control" placeholder="Enter Conversation">
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="button" id="add_more_convo_btn" class="btn-block btn btn-outline-primary">+ Add
                                                        More</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
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